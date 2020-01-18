<?php
// Author: Thulani Rex
//Place Payment

$AccountID             = (isset($_GET['receiver']))? $_GET['receiver'] : ((isset($_POST['receiver']))?$_POST['receiver']:0);

$Phonenumber     = (isset($_GET['phone']))? $_GET['phone'] : ((isset($_POST['phone']))?$_POST['phone']:0);

$Amount                 = (isset($_GET['amount']))? $_GET['amount'] : ((isset($_POST['amount']))?$_POST['amount']:0);



$mes_donnees =   array('MyAccountID'       => $AccountID, 'CustomerPhonenumber' => $Phonenumber, 'Amount' => $Amount);

$postdata = http_build_query($stz_return);

$opts = array('http' =>

            array(

                       'method'  => 'GET',

                       'header'  => 'Content-type: text/xml',

                       'CharSet' => 'utf-8',

                       'content' => $postdata

            )

);

$context       = stream_context_create($opts);

$UssdResult            = file_get_contents('https://sandbox.momodeveloper.mtn.com/collection/v1_0/requesttopay'.$AccountID.'&CustomerPhonenumber='.$Phonenumber.'&Amount='.$Amount, 1, $context);

header('Content-Type:text/javascript');

echo json_encode(

            array(

                       'placepayment' => nl2br($UssdResult)

            )

);

exit;



Embed checkpayment in php code


$AccountID   = (isset($_GET['receiver']))? $_GET['receiver'] : ((isset($_POST['receiver']))?$_POST['receiver']:0);

            $PaymentID = (isset($_GET['paymentID']))? $_GET['paymentID'] : ((isset($_POST['paymentID']))?$_POST['paymentID']:0);



            $mes_donnees =   array('accountID'  => $AccountID, 'paymentID' => $PaymentID);

            $postdata = http_build_query($mes_donnees);

            $opts = array('http' =>

                        array(

                                   'method'  => 'GET',

                                   'header'  => 'Content-type: text/xml',

                                   'CharSet' => 'utf-8',

                                   'content' => $postdata

                        )

            );

            $context       = stream_context_create($opts);

            $UssdResult = file_get_contents('https://sandbox.momodeveloper.mtn.com/collection/v1_0/requesttopay'.$AccountID.'&paymentID='.$PaymentID);

            header('Content-Type:text/javascript');

echo json_encode(

array(

                        'checkpayment' => nl2br($UssdResult)

            )

);

exit;
?>
