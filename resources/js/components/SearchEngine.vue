<template>
    <div class="container">
        <div class="row justify-content-center">
         
            <div class="card col-lg-8">
  
                <div class="card-body">
                    <h5 class="card-title">  WHERE TO ?</h5>
                   <form @submit.prevent="searchBus" >
                       <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="from_city">From</label>
                                <select class="form-control" id="from_city"
                                v-model="fromCity"
                                >
                                <option value="" disabled selected>Select Where you are coming from</option>
                                <option  v-for="route in routes" :key='route.id'>{{route.origin}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="to_city">To</label>
                                
                                <select class="form-control" id="to_city"
                                 v-model="toCity"
                                 @change="changeResults"
                                >
                                <option value="" disabled selected>Select Where you are going</option>
                                 <option v-for="route in routes" :key='route.id' >{{route.destination}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="travel_date">Travel Date</label>
                               <date-picker  v-model="travelDate" :config="options"></date-picker>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit"> Find Buses </button>
                   </form>
                </div>
                </div>
                

                  <div class="card col-lg-8" :class="[spinner == true || errMsg==='' ? 'mt-4' : '']">

                    <div class="d-flex justify-content-center" v-if="spinner">
                        <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                      
                    <div class="alert alert-danger mt-4" role="alert" v-if="errMsg">
                       <p> We could not understand your request please try again </p>
                    </div>
                    <p v-if="buses.lenght != 0">
                    <ul class="list-unstyled ">
                        <li class="media"  v-for="(bus, index) in buses" :key="bus.id">
                            <img src="assets/images/plcholder.png" class="mr-3" alt="..." width="55">
                            <div class="media-body">
                            <h5 class="mt-0 mb-1"> {{bus.name}}</h5>
                                <p> <strong>Dept Est Time:</strong> 05 :30 AM &nbsp; | &nbsp; <strong>Arrv Est Time:</strong> 08 :30 AM</p>
                                <hr>
                                <p>  <strong>Ratings: </strong> <i class="fas fa-star" ></i>
                                <i class="fas fa-star" ></i><i class="fas fa-star" ></i><i class="fas fa-star" ></i> &nbsp; | &nbsp; <strong>Seats:</strong>  &nbsp; {{bus.num_seats}}
                                    <button class="btn btn-success float-right" data-toggle="modal" data-target="#myModal" @click="selectedBus(index)"> REQUEST BOOKING </button>
                                </p>
                            </div>
                        </li>
                        
                    </ul>
                </p>
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
            <form >
        <div class="modal-body">
                <div class="input-group mb-3 input-group-sm">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Number of Seats</span>
                    </div>
                    <input type="number" class="form-control" min="1" max="100" v-model="number_seats">
                </div>                
                <div class="input-group mb-3 input-group-sm">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Phone Number</span>
                    </div>
                    <input type="number" class="form-control" v-model="phoneNumber" required>
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
          <button class="btn btn-success" @click="bookNow()" >BOOK NOW</button>
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
            'routes'
        ],
      data() {
          return{
              spinner : false,
              buses : [],
              fromCity:'',
              toCity:'',
              errMsg:'',
              requestBus:[],
              phoneNumber:'',
              number_seats:1,
              travelDate: null,
                options: {
               
                format: 'DD/MM/YYYY h:mm',
                useCurrent: false,
                showClear: true,
                showClose: true,
                }
          }
      },
      created(){
           this.travelDate = this.$moment().add(1, 'days').format('DD/MM/YYYY h:mm');
      },
      watch: {
        toCity: function (value, oldValue) { 
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
             bookNow(){
                 if(this.number_seats > 0 && this.phoneNumber !=''){
                     axios.post('/booknow', {
                        'bus_id':this.requestBus.bus_id,
                        'route_id':this.requestBus.route_id,
                        
                        'number_seats':this.number_seats,
                        'phone_number':this.phoneNumber,

                     }).then(res => {
                         alart('done');
                     })
                 }
             },
             cancel(){
                
                this.requestBus=[]
                this.number_seats=1
            
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
</style>