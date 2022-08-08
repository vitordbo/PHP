<?php

    //File handling is an important part of any web application. 
    //You often need to open and process a file for different tasks.

    /*
    PHP has several functions for creating, reading, uploading, and editing files.
    Be careful when manipulating files!

    You can do a lot of damage if you do something wrong. Common errors are: 
    editing the wrong file, filling a hard-drive with garbage data, and deleting the
    content of a file by accident.

    fopen() -> open / create 
    fwrite() -> write on the file
    fclose() -> close the file
    feof() -> checks if the "end-of-file" (EOF) has been reached
    fgets() ->  is used to read a single line from a file
    file_get_contents() -> read all file and put in a string
    file_put_contents() -> create a file
    unlink() -> delete a file
    copy() -> copy a file
    */

    $folder = "files/";

    if (!is_dir($folder)){
        mkdir($folder, 0755);
    }

    // dynamic file 
    $fileName = date('y-m-d-H-i-s'). ".txt";

    //The first parameter of fopen() contains the name of the file to be opened 
    //the second parameter specifies in which mode the file should be opened
    $file = fopen($folder.$fileName, 'a+'); //https://www.php.net/manual/en/function.fopen.php

    //The first parameter of fwrite() contains the name of the file to write to and the second parameter is the string to be written.
    fwrite($file, '1 line using php' . PHP_EOL);
    fwrite($file, '2 line using php' . PHP_EOL);
    fclose($file);

    copy('files/test.txt', 'files/test2.txt'); // copy one file to other file

    // reading a file => if exists and if is a file
    if (file_exists($folder.$fileName) && is_file($folder.$fileName)){
        $openFile = fopen($folder.$fileName, 'r');  // r-> only to read

        while (!feof($openFile)){  // read until the end
            echo fgets($openFile). "<br>";

        }

        //echo file_get_contents($openFile); =>  more easy way to read a complete file
        fclose($openFile); 
    }

    // creating a html file using php
    $htmlFile = "index.html";
    $h1 = "<h1>Vítor</h1>";
    file_put_contents($htmlFile, '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>created by php</title>
    </head>
    <body>' 
        .$h1.   
    '</body>
    </html>');


    // to delete all files
    /*
        // if folder exists
        if(is_dir($folder)){
            foreach(scandir($folder) as $file){ //deleting all files in the folder 
                $path = $folder.$file;
                if (is_file($path)){
                    unlink($path);
                }
            }
        }
        rmdir($folder) // delete the folder
    */

?>