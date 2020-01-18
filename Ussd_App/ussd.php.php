<!--
	Name: Smart Ticketing System (Omni Channel)
	Author: Thulani Rex
	Date: 04/11/19 11:59
	Description: Using MTN Momo APIs to integrate a seamless payment system for booking Bus tickets in Zambia via USSD, Web, Android, etc
-->

<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

$primary_key = "8ec65c19051a496a9646b00768684cc9";
$secondary_key = "f83289cc857c4500812777371c90ee5d";

$token_id = null;

if(SessionID[UserID].access==true)
{
	$token_id = new $token_id;

}

//USSD configurations
$xml = "<Message>
<Version Version=\"1.0\" />
<Response Type=\"OnUSSEvent\">
<SystemID>MTN</SystemID>
<UserID>USERNAME</UserID>
<Service>SERVICE</Service>
<Network ID=\"1\" MCC=\"655\" MNC=\"001\" />
<OnUSSEvent Type=\"Request\">
<USSContext SessionID=\"12345678\" NetworkSID=\"2576443669\"
MSISDN=\"0964870336\" Script=\"\"
ConnStr=\"*120*99*123#\" />
<USSText Type=\"TEXT\">REQ</USSText>
</OnUSSEvent>
</Response>
</Message>";


//Thisscript uses the SimpleXMLParser to generate objects from the xml input.
//This section loads the xml from a string into the $xml object
$Body = file_get_contents('php://input');
$xml=simplexml_load_string($Body) or die("Error: Cannot create object");


//First Check if the transaction is for USSD
if ((string)$xml->Response[0]['Type'] == "OnUSSEvent"){
	//Handle The Request Type Seperately
	if ((string)$xml->Response->OnUSSEvent[0]['Type'] == "Request"){
		if ((string)$xml->Response->OnUSSEvent->USSText == "REQ") {
			$resp = new SimpleXmlElement('<Message></Message>');
 			$ver = $resp->addChild("Version","");
			$ver->addAttribute("Version","1.0");
			$req = $resp->addChild("Request","");
			$req->addAttribute("Type","USSReply");
			$req->addAttribute("SessionID",$xml->Response->OnUSSEvent->USSContext[0]['SessionID']);
			$req->addAttribute("Flags","0");
			$user = $req->addChild("UserID",$higateuser);
			$user->addAttribute("Orientation","TR");
			$req->addChild("Password",$higatepass);
			$uss = $req->addChild("USSText","Welcome to Smart Ticketing Zambia\n
			1. Make a booking\n
			2. Show Available Buses\n
			3. Book for Many\n
			4. Routes and Fares\n
			5. Past Transactions \n
			6. Manange Account\n
			0. Exit");
			$uss->addAttribute("Type","Text");
			$xmlr = explode("\n", $resp->asXML(), 2);
			echo $xmlr[1];
		}else if ((string)$xml->Response->OnUSSEvent->USSText == "1") {
                        $resp = new SimpleXmlElement('<Message></Message>');
                        $ver = $resp->addChild("Version","");
                        $ver->addAttribute("Version","1.0");
                        $req = $resp->addChild("Request","");
                        $req->addAttribute("Type","USSReply");
                        $req->addAttribute("SessionID",$xml->Response->OnUSSEvent->USSContext[0]['SessionID']);
                        $req->addAttribute("Flags","0");
                        $user = $req->addChild("UserID",$higateuser);
                        $user->addAttribute("Orientation","TR");
                        $req->addChild("Password",$higatepass);
                        $uss = $req->addChild("USSText","".booking().$xml->Response->OnUSSEvent->USSContext[0]['MSISDN']."\nTo Exit send 0");
                        $uss->addAttribute("Type","Text");
			$xmlr = explode("\n", $resp->asXML(), 2);
                        echo $xmlr[1];
                }else if ((string)$xml->Response->OnUSSEvent->USSText == "2") {
			//Since this is the exit message notice that we set the flags to 1 instead of 0.
                        $resp = new SimpleXmlElement('<Message></Message>');
                        $ver = $resp->addChild("Version","");
                        $ver->addAttribute("Version","1.0");
                        $req = $resp->addChild("Request","");
                        $req->addAttribute("Type","USSReply");
                        $req->addAttribute("SessionID",$xml->Response->OnUSSEvent->USSContext[0]['SessionID']);
                        $req->addAttribute("Flags","1");
                        $user = $req->addChild("UserID",$higateuser);
                        $user->addAttribute("Orientation","TR");
                        $req->addChild("Password",$higatepass);
                        $uss = $req->addChild("USSText","".buses().$xml->Response->OnUSSEvent->USSContext[0]['MSISDN']."\nTo Exit send 0");
                        $uss->addAttribute("Type","Text");
			$xmlr = explode("\n", $resp->asXML(), 2);
                        echo $xmlr[1];
                }else{
                        $resp = new SimpleXmlElement('<Message></Message>');
                        $ver = $resp->addChild("Version","");
                        $ver->addAttribute("Version","1.0");
                        $req = $resp->addChild("Request","");
                        $req->addAttribute("Type","USSReply");
                        $req->addAttribute("SessionID",$xml->Response->OnUSSEvent->USSContext[0]['SessionID']);
                        $req->addAttribute("Flags","0");
                        $user = $req->addChild("UserID",$higateuser);
                        $user->addAttribute("Orientation","TR");
                        $req->addChild("Password",$higatepass);
                        $uss = $req->addChild("USSText","Command not understood.\n1. See your msisdn\n2. Exit");
                        $uss->addAttribute("Type","Text");
			$xmlr = explode("\n", $resp->asXML(), 2);
                        echo $xmlr[1];
                }
	}else{
		//I have handled open and close events just by accepting them.
		//You could check for them individually the same way as you check for the request if you want to do setup and teardown
		echo "<Response status='0'/>";
	}
}else{
	echo "<Response status='0'/>";
}


//WAP, LTE, TELCO SPECIFIC MESSAGE FOR ZICTA SPECTRUM AUTH...
if(!isset($form_data)) $error = true;
else if(isset($form_data)&&($auth.data==true))
{
        $apn_name = "apn" ;
        $zictaConn = $xml;
}
session_register();

?>
