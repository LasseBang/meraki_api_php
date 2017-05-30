<?php

    //API KEY
    $apikey = 'API KEY HERE';
    
    //THE NUMBER OF THE SSID YOU WANT TO CHANGE, the first have the nnumber 0, so the range is 0-14
    $ssid_number = 'SSID NUMBER';
    
    //NETWORK NUMBER, example L_9837438944354469994
    $network = 'NETWORK NUMBER';
    
    //ENTER NEW SSID NAME  HERE
    $ssid = 'NEW SSID NAME';
 
 
 
    $url = "https://dashboard.meraki.com/api/v0//networks/".$network."/ssids/".$ssid_number."";
 
    $headr = array();
    $headr[] = 'Content-Type: application/json';
    $headr[] = 'X-Cisco-Meraki-API-Key:  '.$apikey;    
     
  $curl = curl_init($url);  
         
        $data = array("name" => $ssid);
 
$json = json_encode($data);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER,$headr);
curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
 
// Make the REST call, returning the result
$response = curl_exec($curl);
if (!$response) {
    die("Connection Failure.n");
}
?>
