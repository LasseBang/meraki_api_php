<?php
    //INSERT YOUR API KEY HERE, SEE README IF YOU NEED HELP TO FIND IT.
    $apikey = 'INSERT API KEY HERE';
    
    //INSERT YOUR ORG NUMBER HERE, SEE README IF YOU NEED HELP TO FIND IT.
    $org = 'INSERT ORG NUMBER HERE';
 
 
     
    $url = "https://dashboard.meraki.com/api/v0/organizations/".$org."/networks";
 
    $headr = array();
    $headr[] = 'Content-Type: application/json';
    $headr[] = 'X-Cisco-Meraki-API-Key:  '.$apikey;
 
    //cURL starts
    $crl = curl_init();
    curl_setopt($crl, CURLOPT_URL, $url);
    curl_setopt($crl, CURLOPT_HTTPHEADER,$headr);
    curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($crl, CURLOPT_HTTPGET,true);
    curl_setopt($crl, CURLOPT_FOLLOWLOCATION, true);
    $reply = curl_exec($crl);
 
    //error handling for cURL
    if ($reply === false) {
       // throw new Exception('Curl error: ' . curl_error($crl));
       print_r('Curl error: ' . curl_error($crl));
    }
    curl_close($crl);
    //cURL ends
    //
    //decoding the json data
 
 
 
    $data =  json_decode($reply);
 
    ?>
<h1>Network overview:</h1>
<table width='600px' border='1'>
    <tbody>
        <tr>
            <th>Name</th>
                        <th>Type</th>
 
        </tr>
            <?php    
            foreach ($data as $value) {
                echo '<tr>';
                echo '<td>' . utf8_decode($value->name) . '</td>';
                echo '<td>' . $value->type . '</td>';
                echo '</tr>';
            }
            ?>
    </tbody>
</table>
