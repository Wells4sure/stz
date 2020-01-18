<template>
    <div class="container">
        <div class="row justify-content-center">
         
            <div class="card col-lg-8">
  
                <div class="card-body" >
                    <h5 class="card-title">  WHERE TO ?</h5>
                   <form @submit.prevent="searchBus" >
                       <div class="form-row">
                            <div class="form-group col-md-4" style="border: 1px solid #e3e3e3;">
                                <label for="from_city">From</label>
                                <select class="form-control" id="from_city"
                                v-model="fromCity"
                                >
                                <option value="" disabled selected>Select Where</option>
                                <option  v-for="from_city in from_cities" :key='from_city.id'>{{from_city.origin}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4"  style="border: 1px solid #e3e3e3;">
                                <label for="to_city">To</label>
                                
                                <select class="form-control" id="to_city"
                                 v-model="toCity"
                                 @change="changeResults"
                                >
                                <option value="" disabled selected>Select Where </option>
                                 <option v-for="to_city in to_cities" :key='to_city.id' >{{to_city.destination}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4"  style="border: 1px solid #e3e3e3;">
                                <label for="travel_date">Travel Date</label>
                               <date-picker id="travel_date" v-model="travel_date" :config="options"></date-picker>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                        <button class="primaryBtn font24 latoBlack widgetSearchBtn " type="submit"> Search </button>
                        </div>
                   </form>
                </div>
                </div>
                

                  <div class="card col-lg-8" :class="[spinner == true || errMsg==='' ? 'mt-4' : '']" id="result-box">

                    <div class="d-flex justify-content-center" v-if="spinner">
                        <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                      
                    <div class="alert alert-danger mt-4 dotted-line" role="alert" v-if="errMsg">
                       <p> We could not understand your request please try again </p>
                    </div>
                    
                    <h3 class="py-4 text-center dotted-line" v-if="buses.length > 0">
                        SEARCH RESULTS
                        </h3>
                    <ul class="list-unstyled ">
                        <li class="media dotted-line result-media py-4"  v-for="(bus, index) in buses" :key="bus.id" >
                            <img src="assets/images/plcholder.png" class="mr-3" alt="..." width="55">
                            <div class="media-body">
                            <h3 class="mt-0 mb-1"> {{bus.name}}</h3>
                                <p> <strong>Dept Est Time:</strong> {{bus.bus_time | moment('h:mm DD/MM/YYYY')}} &nbsp; | &nbsp; <strong>Arrv Est Time:</strong> 13 :30 PM</p>
                                <hr>
                                <p>  <strong>Ratings: </strong> <i class="fas fa-star" ></i>
                                <i class="fas fa-star" ></i><i class="fas fa-star" ></i><i class="fas fa-star" ></i> &nbsp; | &nbsp; <strong>Seats:</strong>  &nbsp; {{bus.num_seats}}
                                    <button class="btn btn-success float-right" data-toggle="modal" data-target="#myModal" @click="selectedBus(index)"> REQUEST BOOKING </button>
                                </p>
                            </div>
                        </li>
                            <hr>
                        
                        
                    </ul>
                
            </div>
        </div>
<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header py-4">
          <h4 class="modal-title" style="display:block;">{{requestBus.name}} </h4> 
          <p class="myText py-4">K {{requestBus.price}} / Ticket &nbsp; <small> From : {{fromCity}} | To : {{toCity}} </small> </p>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form @submit.prevent="booknow()">
        <div class="modal-body" >
            <div class="d-flex justify-content-center">
                <img src="assets/images/mtn.jpg" alt="Pay With MTN MOMO" width="150" height="100">
            </div>
            <p style="margin:10px; text-aling:center;">Pay with your mtn momo </p>
                    <div class="d-flex justify-content-center" v-if="spinner2">
                        <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                <div class="alert alert-danger" v-if="errMsg2">
                   Invalid phone number or number of seats please try again

                </div>                
                <div class="alert alert-primary" v-if="resMsg">
                  {{resMsg.msg}}
                </div>
                <div class="input-group mb-3 input-group-sm">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Number of Seats</span>
                    </div>
                    <input type="number" class="form-control" min="1" max="100" v-model="number_seats"  @change="clearMsg()">
                </div>                
                <div class="input-group mb-3 input-group-sm">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Phone Number</span>
                    </div>
                    <input type="number" class="form-control" v-model="phoneNumber" required @change="clearMsg()">
                </div>
                <div class="input-group mb-3 input-group-sm d-flex" >
                    <div class="p-2 bg-info flex-fill">
                        <h1>TOTAL</h1>
                    </div>
                    <div class="p-2 bg-warning flex-fill">

                        <h1>K {{parseFloat(result()).toFixed(2)}}</h1> 
                    </div>
                   
                   
                  
                </div>
            
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" @click="cancel()">CANCEL</button>
          <button class="btn btn-success" type="submit" data-toggle="modal" data-target="#exampleModal" >BOOK NOW</button>
        </div>
        </form>

      </div>
    </div>
  </div>



    </div>
</template>

<script>
    import datePicker from 'vue-bootstrap-datetimepicker';
    import 'eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css';

    export default {
        components: {
            'date-picker': datePicker
        },
        
        props:[
            'from_cities',
            'to_cities',
        ],
      data() {
          return{
              spinner : false,
              spinner2 : false,
              buses : [],
              fromCity:'',
              toCity:'',
              errMsg:'',
              errMsg2:'',
              resMsg:'',
              requestBus:[],
              phoneNumber:'',
              number_seats:1,
              travel_date: null,
                options: {
               
                format: 'DD/MM/YYYY h:mm',
                useCurrent: false,
                showClear: true,
                showClose: true,
                }
          }
      },
      created(){
           this.travel_date = this.$moment().add(1, 'days').format('DD/MM/YYYY h:mm');
      },
      watch: {
        toCity: function (value, oldValue) { 
            this.buses =[];
            this.searchBus();
        },

      },
         methods: {
              result: function () {
                return parseFloat(this.requestBus.price) * parseFloat(this.number_seats);
              },
             searchBus(){
                 this.spinner =true;
                 this.errMsg =''
                 //send a search request
                axios.post('/search', {
                    'fromCity':this.fromCity,
                    'toCity':this.toCity
                }).then(res => {
                    this.spinner =false;
                    this.buses= res.data;

                }).catch(err =>{
                    this.spinner =false;
                   this.errMsg =err.response.data.errors
                })
             },

             selectedBus(index){
                 this.requestBus=this.buses[index]
             },
             changeResults(){
                 if(this.fromCity !=''){
                     this.searchBus();
                 }else{
                     console.log('enter From city');
                 }
             },
             booknow(){
                 if(this.number_seats > 0 && this.phoneNumber !=''){
                     this.spinner2 = true;
                     //convert the date
                     let td =this.travel_date;
                     td= this.$moment().format('YYYY-MM-DD h:mm');
                     axios.post('/booknow', {
                        'bus_id':this.requestBus.bus_id,
                        'route_id':this.requestBus.route_id,
                         'number_seats':this.number_seats,
                        'travel_date':td,
                        'phone_number':this.phoneNumber,
                        'total_amnt':parseFloat(this.result()).toFixed(2),
                        
                     }).then(res => {
                         this.spinner2 =false;
                        this.resMsg=res.data;
                        return window.location.assign("/",8000)
                     }).catch(err=>{
                          this.spinner2 =false;
                         this.errMsg2 =err.response.data.errors;
                     })
                 }
             },
             cancel(){
                
                this.requestBus=[]
                this.number_seats=1
            
             },
            clearMsg(){
                this.errMsg2='';
                this.resMsg ='';
            }
         },
    }
</script>
<style lang="scss" scoped>
    .myText{
            position: absolute;
            left: 20px;
            top: 25px;
    }
    .dotted-line{
        border-bottom: 2px dotted dodgerblue;
    }
    .result-media{
        padding: 6px;
    }
    #result-box{
         box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.16);
    }
</style>