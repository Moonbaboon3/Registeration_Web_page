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
 
        $query = "SELECT * FROM users WHERE user_name = '$_POST[user_name]'";
        $result = mysqli_query($conn, $query);
        //return results as number of rows
        $count = mysqli_num_rows($result);
       
            if($count> 0)
            {
                echo "<span style=' color: red; font-size: 0.9rem; font-weight: bold;' > Username is already taken</span>";
                echo "<script>$('#submit').prop('disabled, true');</script>";
           

            }
            else
            {
                echo "<span style='color: green; font-size: 0.9rem; font-weight: bold;'> Username is available to use</span>";
                echo "<script>$('#submit').prop('disabled, false');</script>";
          
                
            }
    

                if (!empty($_POST['full_name'])) {
                    $full_name = $_POST['full_name'];
                    $user_name = $_POST['user_name'];
                    $phone     = $_POST['phone'];
                    $whatsnum  = $_POST['whatsapp_number'];
                    $address   = $_POST['address'];
                    $password  = $_POST['password'];
                    $email     = $_POST['email'];
                    $image     = $_POST['user_image'];
                  echo $user_name;
                    $sql = "INSERT INTO users 
                            VALUES ('$user_name', '$full_name', '$password', '$address', '$image', '$email', '$phone', '$whatsnum')";
                    mysqli_query($conn, $sql);
                   

                }
                
            
        }
            mysqli_close($conn);
    
    


    
   

    //gets input from user and adds it to query 


    
    
    


?>