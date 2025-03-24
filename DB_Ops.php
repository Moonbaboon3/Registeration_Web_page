<?php

use Dom\Mysql;

    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name ="web_based_a1";
    $conn ="";
    try{
    $conn = mysqli_connect($db_server, $db_user, $db_pass);
    mysqli_select_db($conn,$db_name);
    }

    catch(mysqli_sql_exception){
        echo "Could not connect!";
    }

    $check =$_POST["userinput"];
    //gets input from user and adds it to query 
    $query ='select username from user_names where username= "'.$check.'"';
    $result = mysqli_query($conn,$query);
    //if a result is found then the result is the table
    if(mysqli_fetch_array($result)){

        echo "This username already exists";
    }
    else{
        //if not its creates a new query and adds it to the table
        $query = 'insert into user_names values  ("'.$check.'")';
        mysqli_query($conn,$query);
        echo "thise username doesnt exist";
    }
    //close connection to database to free up space
    mysqli_close($conn);

?>