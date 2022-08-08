<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>File Upload</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1 class="mt-5 text-center"> File Uploads</h1>
            <form method="post" enctype="multipart/form-data" class="m-3">
                <!-- bootstrap code-->
                <div class="input-group">
                    <input type="file" class="form-control" id="file" name="file" aria-describedby="file" aria-label="Upload" required>
                    <button class="btn btn-primary" type="submit" name="send" id="send">Send</button>
                </div>
            </form>
        </div>

    <?php 
        // if post send exists
        if(isset($_POST['send'])){
            // SuperGlobal files contains the information about the file

            // validations 
            // size of the file in bytes
            $maxSize = 2097152;  // 2 MB

            // file foemats
            $typesFiles = array("jpg","png", "jpeg", "mp4", "pdf");

            // getting type from server
            $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

            // if the size ir correct 
            if ($_FILES['file']['size'] >= $maxSize){
                echo '<div class = "alert alert-danger" 
                role ="alert">File size is bigger than 2MB. Please select other</div>';
            } else{
                //if the extension is correct 
                if(in_array($type, $typesFiles)){
                    // a ok file => put in a folder
                    $folder = "images/";
                    if(!is_dir($folder)){
                        mkdir($folder, 0755);
                    }

                    // temporary value
                    $tmp = $_FILES['file']['tmp_name'];
                    $newName = uniqid(). ".$type";

                    // sendo to server
                    if (move_uploaded_file($tmp, $folder.$newName)){
                        echo '<div class = "alert alert-success" role ="alert">Upload completed</div>';
                    } else{
                        echo '<div class = "alert alert-danger" role ="alert">Error in upload</div>';
                    }

                } else {
                    echo '<div class = "alert alert-danger" role ="alert">this type isnt allowed, use ('. $typesFiles.')"</div>';
                }
            }
        }
    ?>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>