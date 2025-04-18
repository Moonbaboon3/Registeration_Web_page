<?php

use Dom\Mysql;

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "web_based_a1";
$conn = "";
try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass);
    mysqli_select_db($conn,$db_name);
    } 
    catch(mysqli_sql_exception){
        echo "Could not connect!";
    }
 
    //user starts typing in user_name input field
    if(!empty($_POST['user_name'])){
        $user_name = $_POST['user_name'];
        //retrieve from db matching row with same user_name
 
        $query = "SELECT * FROM user WHERE user_name = '$_POST[user_name]'";
        $result = mysqli_query($conn, $query);
        //return results as number of rows
        $count = mysqli_num_rows($result);
       
            if($count> 0)
            {
                echo "<span style=' color: red; font-size: 0.9rem; font-weight: bold;' > Username is already taken</span>";
                echo "<script>$('#submit').prop('disabled, true');</script>";
           

            }
            elseif($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_FILES["user_image"]))
            {
                echo "<span style='color: green; font-size: 0.9rem; font-weight: bold;'> Username is available to use</span>";
                echo "<script>$('#submit').prop('disabled, false');</script>";
          
                
            }
            #print_r($_FILES["user_image"]);
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["user_image"])) {
                //sets director for the photo and appends the directory into file path using the image's name
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["user_image"]["name"]);
                $uploadOk = 1;
                //use built int path info to check for type of photo before saving
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                    $user_image_error = "Sorry, only JPG, JPEG, PNG  files are allowed.";
                    $uploadOk = 0;
                }

                if ($uploadOk == 0) {
                    $user_image_error = "Sorry, your file was not uploaded.";
                } else {
                        //use move uploaded file  which was uploaded using enctype in form into target file
                        //save path into $user_image to save into database
                    if (move_uploaded_file($_FILES["user_image"]["tmp_name"], $target_file)) {
                        $user_image = $target_file; 
                    } else {
                        $user_image_error = "Sorry, there was an error uploading your file.";
                    }
                }
            }

                if (!empty($_POST['full_name']) && !empty($_POST['user_name']) && !empty($_POST['phone']) && !empty($_POST['whatsapp_number']) && !empty($_POST['address']) && !empty($_POST['password']) && !empty($_POST['email'])) {
     
                    $full_name = $_POST['full_name'];
                    $user_name = $_POST['user_name'];
                    $phone     = $_POST['phone'];
                    $whatsnum  = $_POST['whatsapp_number'];
                    $address   = $_POST['address'];
                    $password  = $_POST['password'];
                    $email     = $_POST['email'];

                    $sql = "INSERT INTO user (user_name, full_name, password, address, image, email, phone, whatsapp_number)
                            VALUES ('$user_name', '$full_name', '$password', '$address', '$user_image', '$email', '$phone', '$whatsnum')";
                    mysqli_query($conn, $sql);
                    echo "Registered Successfully!";

                }
                
            }
            mysqli_close($conn);
?>