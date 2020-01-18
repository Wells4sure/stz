<?php
require 'vendor/autoload.php';

use AfricasTalking\SDK\AfricasTalking;
include 'ussd.php';

//set up your app credentials and initialize the SDK

$username = "sandbox";
$apiKey   = "64921e976ae3c3fddfcd6c1cf15dab26ced1d065e0e3900a9c71f92dcb76a794


";

$AT       = new Stz_Ticket($username, $apiKey);

$ticket  = $AT ->ticket();




// Sending the ticket
if(isset($_POST["phone"])){

    $recipients = [[
    "phoneNumber"  => $_POST["phone"],
    "Route" => $_POST["route"],
    "currencyCode"       => "ZMW",
    "amount"       =>$_POST["amount"]
    ]];
    try {
        $results = $airtime->send([
            "recipients" => $recipients
        ]);
        print_r($results);
    } catch(Exception $e) {
        echo "Error: ".$e->getMessage();
    }
}
 
// {
//     "invoiceId": "a427024deb60474c",
//     "externalId": "144-123-323",
//     "referenceId": "4943bb77-7417-4aec-8293-1c99796d4872",
//     "paymentReference": "08694e5c",
//     "payee": {
//       "partyIdType": "PARTY_CODE",
//       "partyId": "b12d7b22-3057-4c8e-ad50-63904171d18c"
//     },
//     "payeeFirstName": "Thulani",
//     "payeeLastName": "Rex",
//     "amount": 100,
//     "currency": "ZMW",
//     "status": "SUCCESSFUL", // PENDING, SUCCESSFUL or FAILED
//     "expiryDateTime": "2019-11-10T04:15:49.795Z"





?>
