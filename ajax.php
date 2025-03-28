<?php
include 'DB_Ops.php';



    if(!empty($_POST{'user_name'})){
        $username = $_POST['user_name'];
        $query ="SELECT * FROM user WHERE user_name ='" .$_POST["user_name"] . "'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
       

            if($count> 0)
            {
                echo "<span style=' color: red; font-size: 0.9rem; font-weight: bold;' > Username is already taken</span>";
                echo "<script>$(#submit).prop('disabled, true');</script>";
            }
            else
            {
                echo "<span style='color: green; font-size: 0.9rem; font-weight: bold;'> Username is available to use</span>";
                echo "<script>$(#submit).prop('disabled, false');</script>";
            }
           
        }
    




?>