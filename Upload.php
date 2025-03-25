<?php
$target_dir = "uploads/userImages/";// final desitnation of the image
$target_file = $target_dir .basename($_FILES["fileToUpload"]["name"]); //full path to upload
//basename() used for security to ensure no invalid traversal into server files
$validUpload = 1; //flag to show upload is valid 
$uploadFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // take the extension of the upload
$str= "";
//validate File is an image
if(isset($_POST["submit"])){//checks that form is submited using post method
    $flag = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    //$_FILES["fileToUpload"]["tmp_name"] stores the temporary file location
    //flag gets size of image and false if not image
    if($flag !== false){//image size returned
        echo "File is an image of type -".$flag["mime"];
    }
    else{//file is not an image
        $str = $str ."File is not an image<br>";
        $validUpload = 0; // not valid
    }
}
//validate image type is allowed
if(
    $uploadFileType != "jpg" && $uploadFileType != "png" && $uploadFileType != "jpeg" 
    && $uploadFileType != "webp" && $uploadFileType !="svg"
){
    $str = $str. "  not valid image type, only accepts : JPG, JPEG, PNG, WEBP , and SVG files <br>";
    $validUpload = 0;
}
// validate image size
if($_FILES["fileToUpload"]["size"] > 2097152) // 2MB limit
{
    $str = $str. "  file is too large, Max 2MB <br>";
    $validUpload = 0;
}
// check if successful upload
if($validUpload){
    $str = "image uploaded successfully";
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { // move to traget location true if move successful otherwise false
        $str =  "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.<br>";
    } else {
        $str = "Sorry, there was an error uploading your file.<br>";
    }
}
else{//error during validating image upload
    $str = "sorry the image was not uploaded because ". $str . "<br>";
}

echo $str;