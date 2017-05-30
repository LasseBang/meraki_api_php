<form method="post">
<table border="0" width="400px">
    <tr>
        <td>API Key</td>
        <td><input type="text" name="apikey"></td>
    </tr>
        <tr>
        <td></td>
        <td><input type="submit" value="list organizations"></td>
    </tr>
</form>
<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $apikey = $_POST['apikey'];

 
 
     
    $url = "https://dashboard.meraki.com/api/v0/organizations";
 
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
    
    
            echo '<table border=1>';
            echo '<tr>';
            echo '<td>ID</td>';
            echo '<td>Name</td>';
            echo '</tr>';
    
                foreach ($data as $value) {
                echo '<tr>';
                echo '<td>' . $value->id . '</td>';                
                echo '<td>' . utf8_decode($value->name) . '</td>';
                echo '</tr>';
            }
            echo '</table>';

}
?>
