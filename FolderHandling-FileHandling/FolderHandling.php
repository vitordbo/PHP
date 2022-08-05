<?php

    // folders can be created using mkdir
    $folder = "Folder created by php";
    // 2 folders => $folders = "folder/new-folder/";

    // creating 
    if(!is_dir($folder)){  // tests if alredy exists 
        mkdir($folder, 0755);  
        // https://www.php.net/manual/en/function.chmod.php => 0755 is a security question
    } else {
        //rename($folder, "new-name-for-the-folder"); => to rename a folder
        rmdir($folder); // to delete a folder => only if the folder is empty
    }
?>