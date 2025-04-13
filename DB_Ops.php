<?php

use Dom\Mysql;

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "web_based_a1";
$conn = "";
try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass);
    mysqli_select_db($conn, $db_name);
} catch (mysqli_sql_exception) {
    echo "Could not connect!";
}

//user starts typing in user_name input field
if (!empty($_POST{
    'user_name'})) {
    $username = $_POST['user_name'];
    //retrieve from db matching row with same user_name
    $query = "SELECT * FROM user WHERE user_name ='" . $_POST["user_name"] . "'";
    $result = mysqli_query($conn, $query);
    //return results as number of rows
    $count = mysqli_num_rows($result);


    if ($count > 0) {
        echo "<span style=' color: red; font-size: 0.9rem; font-weight: bold;' > Username is already taken</span>";
        echo "<script>$('#submit').prop('disabled, true');</script>";
    } else {
        echo "<span style='color: green; font-size: 0.9rem; font-weight: bold;'> Username is available to use</span>";
        echo "<script>$('#submit').prop('disabled, false');</script>";
    }
}






/*
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
    //gets input from user and adds it to query 
    $full_name = $_POST['full_name'] ;
    $user_name = $_POST['user_name'] ;
    $phone     = $_POST['phone'] ;
    $whatsnum  = $_POST['whatsapp_number'];
    $address   = $_POST['address'];
    $password  = $_POST['password'];
    $email     = $_POST['email'];
    $image     = $_POST['image'];

    $sql = "INSERT INTO User 
    VALUES ($full_name,$user_name, $phone, $whatsnum, $address , $password, $emai , $image)";

    if($conn->query($sql) === TRUE)
    {
        echo "New record created successfully";
    }
    else 
    {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
        

        $conn->close();
   }
*/
