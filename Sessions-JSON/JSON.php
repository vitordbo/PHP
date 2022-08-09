<?php

    // What is JSON?
    // JSON stands for JavaScript Object Notation, and is a syntax for storing and exchanging data.

    // Since the JSON format is a text-based format, it can easily be sent to and from a server,
    // and used as a data format by any programming language.

    // consist in transform data (like an array) to text and vice versa 
    // PHP has some built-in functions to handle JSON

    // json_encode() => convert array/obj in text, JSON string
    // json_decode() => convert a JSON string (text) in a array/obj
     
    //  https://viacep.com.br/ws/59625320/json/
    // only a text 
    $Simpletext = '  
    {
        "cep": "59625-320",
        "logradouro": "Rua Sinhá Leite",
        "complemento": "",
        "bairro": "Presidente Costa e Silva",
        "localidade": "Mossoró",
        "uf": "RN",
        "ibge": "2408003",
        "gia": "",
        "ddd": "84",
        "siafi": "1759"
    } ';

    //echo "<pre>$Simpletext</pre>";

    /*
    // turning this text in a object 
    $data = json_decode($Simpletext); // can turn into a array adding true after $text 
    var_dump($data);

    // get data like a object 
    echo "<br><br>" . $data->cep;

    $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    echo "<br>";
    echo "<pre>$json</pre>";
    */
    
    // recive from html 
    $text = $_POST['text'];
    $dataFromHtml = json_decode($text, true); // text became a array

    // add other thing 
    $dataFromHtml['name'] = "Vitor"; // add other thing in the array

    // send back like a text
    $jsonFromHtml = json_encode($dataFromHtml);

    echo $jsonFromHtml;

?>