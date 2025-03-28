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
   
    //$check = "moh21";
    //gets input from user and adds it to query 
    /*$stmt = mysqli_stmt_init($conn);
    $query ="select COUNT(*) from user where user_name LIKE ?";
    if(mysqli_stmt_prepare($stmt, $query))
    {
        mysqli_stmt_bind_param($stmt, "s", $check);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) > 0)
        {
            echo "username already exits";
        }
        else{
            $sql = "INSERT INTO User (full_name, user_name, phone, whatsapp_number, address, password, email)
            VALUES ('Mohammed Abdallah', 'moh21', '091' , '+249 966 327 998', 'Sheikh Zayied' , '2004' , 'mohamed@email.com')";

            if($conn->query($sql) === TRUE){
                echo "New record created successfully";
            }else {
                echo "Error:" . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
   }*/
   
    
    
    
    
    /*$result = mysqli_query($conn,$query);
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
    mysqli_close($conn);*/

?>