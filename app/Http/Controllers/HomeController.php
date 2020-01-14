<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Operator;
use App\User;
use App\Bus;
use App\Route;
use App\BusRoute;
use App\bus_booking;
use Bmatovu\MtnMomo\Products\Collection;
use Bmatovu\MtnMomo\Exceptions\CollectionRequestException;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $from_cities =Route::select('origin')->distinct()->get();

        $to_cities =Route::select('destination')->distinct()->get();
      
      
        return view('frontend.home.index', compact('from_cities','to_cities'));
    }

    public function search(Request $request)
    {
       $this->validateSearch($request);
       //get rout_id 
       $route_id =Route::where([
           ['origin','=', $request->fromCity],
           ['destination','=', $request->toCity]
           ])->pluck('id');
 
       //search buses
        //check if bus is active
       $query =DB::table('bus_routes')
       ->join('buses', 'bus_routes.bus_id', '=', 'buses.id')
       ->join('operators', 'buses.operator_id', '=', 'operators.id')
       ->where('bus_routes.route_id', '=', $route_id)
       ->where('buses.active', '=', 1) //Gets only active buses
       ->get();
      return $query;
    }
    // Handles Booking Request
    public function booknow(Request $request){
        $this->validateBooking($request);
        
        $phone_number =$request->phone_number;
        $total_amnt =$request->total_amnt;
        
        //make Trans Id
        $partA = substr($phone_number, -3);
        $partB =uniqid();
        $partC =mt_rand(1,9999);

        $transactionId = $partA.$partB.'-'.$partC;

       
        //do the mtn thing
       
            $collection = new Collection();

             // Request a user to pay
            $momoTransactionId = $collection->transact( $transactionId, $phone_number, $total_amnt);
            $responceMsg= $collection->getTransactionStatus($momoTransactionId);
            
            $momoStatus =$responceMsg['status'];
            $paidAmnt =$responceMsg['amount'];
            $token_b = $responceMsg['payer'];
            $payerNum =$token_b['partyId'];
           
            if($momoStatus=='PENDING'){
                //Request user Pin
                return array('msg'=>"Enter your Pin to complete transaction")  ;

            }elseif($momoStatus=='SUCCESSFUL'){
                   //Record the booking
                   bus_booking::create([
                        'bus_id'=>$request->bus_id,
                        'route_id'=>$request->route_id,
                        'amount_paid'=>$paidAmnt,
                        'phone_number'=>$payerNum,
                        'number_seats'=>$request->number_seats,
                        'travel_date'=>$request->travel_date,
                        'transaction_number'=>$transactionId
                   ]);
                return array('msg'=>"Thank you for using Smart Tickets Zambia ;) Travel safely!");
                
           }elseif($momoStatus=='FAILED'){
            return array('msg'=>"Transaction failed try again letter")  ;
          
            }
         
 
        
    }




// ===================================================================================================== //
    // all the Validation
    public function validateBooking(Request $request)
    {
        $this->validate($request, [
            'bus_id' => 'required|integer|exists:buses,id',
            'route_id' => 'required|integer|exists:routes,id',
            'number_seats' => 'required|between:1,100',
            'phone_number' => 'required|min:9', //for zambian numbers |regex:(^096\d{7}$)
        ]);
    }
    public function validateSearch(Request $request)
    {
        $this->validate($request, [
            'fromCity' => 'required|string',
            'toCity' => 'required|string',
        ]);
    }
}
