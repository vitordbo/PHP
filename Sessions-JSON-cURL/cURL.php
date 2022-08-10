<?php

    // cURl => allows you to connect and share informations wiht different servers using differents
    // types of protocol like https, ftp, gopher, telnet...

    // it is like Ajax from javascript in PHP

    // GET, POST, send and recive data directly from a URL

    // cURL get 
    // always init
    $ch = curl_init();

    // select the url 
    curl_setopt($ch, CURLOPT_URL,"http://viacep.com.br/ws/59625320/json/");
    
    // to return as a string by the server => Receive server response
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // execute the cURL
    $server_output = curl_exec($ch);

    // end the cURL
    curl_close ($ch);

    // show return 
    echo "<pre>$server_output</pre>";

    // ************************************
    // cURL post

    // always init
    $ch = curl_init();

    // select the url 
    curl_setopt($ch, CURLOPT_URL,"http://localhost/PHP/Sessions-JSON-cURL/TestPost.php");
    
    // to say tha is a post 
    curl_setopt($ch, CURLOPT_POST, 1);


    // things to send by post
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('value1' => 'Vitor', 'value2' => '20')));

    // to return as a string by the server => Receive server response
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // execute the cURL
    $server_output = curl_exec($ch);

    // end the cURL
    curl_close ($ch);

    // show return 
    echo "<pre>$server_output</pre>"
    
?>