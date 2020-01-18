//This code is called the moment the user places a booking

var isOK        = false;

var cpt          = 0;

var isTreat = false;

                       

function CashCollect(){

            var phone    = $('#Phone-num').val();

            var amount = $('#Amount').val();

            var receiver = $('#ReceiverId').val();

                       

            if(isTreat)     return;

            isTreat = true;

                       

            var cashResult        = '';

            var checkResult      = '';

                       

            if($.trim(phone) === ''){

                        alert('Enter a phone number');

                        return;

            }

            if($.trim(amount) === ''){

                        alert('Enter the value of amount');

                        return;

            }

            if($.trim(receiver) === ''){

                        alert('Enter a receiver');

                        return;

            }

            $('#status-img').attr('src','../<?=_FMTESTDIR?>img/loader.gif').trigger('refresh');

            $('#waitingId').html('Waiting payment...').trigger('refresh');

            $('#status-Payment').show();

            cpt  = 0;

                       

            $.ajax({

                        type: 'POST',

                        url: 'https://sandbox.momodeveloper.mtn.com/collection/v1_0/requesttopay',

                        data:{'from':'CashCollect', phone:phone, amount:amount, receiver:receiver},

                        async: true,

                        dataType: "json",

                        success:function(data1){

                                   cashResult    = data1.placepayment;

                                   cashResult    = cashResult.split(',');

                                              

                                   $('#payment-text').html(cashResult[1]).trigger('refresh');

                                   if(cashResult[0] == 1){

                                               checkResult = cashResult[1];

                                               checkResult = checkResult.split('=');

                                               checkPayment(checkResult[1], receiver);

                                   }

                                   else{

                                               $('#payment-text').html('Error code:'+cashResult[0]+', '+cashResult[1]).trigger('refresh');

                                               $('#status-img').attr('src','../<?=_FMTESTDIR?>img/close2.png').trigger('refresh');

                                               $('#waitingId').html('').trigger('refresh');

                                   }

                                   $('#priority').val(0);

                        },

                                   error: function(e){console.log('function accountSocialLoading.php?placepayment :'+e.responseText);}

            }).always(function(){

            });

}

           

function checkPayment(paymentID,receiver){

            var status = '';

            var x = setInterval(function(){

                        $.ajax({

                                   type: 'POST',

                                   url: 'https://sandbox.momodeveloper.mtn.com/collection/v1_0/requesttopay',

                                   data:{'from':'checkpayment', paymentID:paymentID, receiver:receiver},

                                   async: true,

                                   dataType: "json",

                                   success:function(data2){

                                               status = data2.checkpayment;

                                               status = status.split('|');

                                               if(status[0] == 1){

                                                           isOK = true;

                                               }

                                   },error: function(e){

                                               console.log('function accountSocialLoading.php?checkpayment :'+e.responseText);

                                   }

                        }).always(function(){

                                   cpt += 1;

                                   if((cpt == 12) || isOK){                // break the timer after 2 minutes or when successful payment

                                               clearInterval(x);

                                               if(isOK){

                                                           $('#payment-text').html('Successuf collect!!!').trigger('refresh');

                                                           $('#status-img').attr('src','../<?=_FMTESTDIR?>img/checkbox.png').trigger('refresh');

                                               }

                                               else{

                                                           $('#payment-text').html('Error code:'+status[0]+', '+status[1]).trigger('refresh');

                                                           $('#status-img').attr('src','../<?=_FMTESTDIR?>img/close2.png').trigger('refresh');

                                               }

                                               $('#waitingId').html('').trigger('refresh');

                                               isOK   = false;

                                               cpt      = 0;

                                               isTreat = false;

                                   }

                        });

            },10000);                                                                            // repeat check payment every 10 secondes

}

?>