
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
<?php include 'header.php'?>
<?php
$full_name_error = $user_name_error = $phone_error = $whatsapp_number_error = $address_error = $email_error = $password_error = $confirm_password_error = $user_image_error = "";
$full_name = $user_name = $phone = $whatsapp_number = $address = $email = $password = $confirm_password = $user_image = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["full_name"])){
        $full_name_error = "*Full Name is required!*";
    }
    else{
        $full_name = $_POST["full_name"];
    }
    if(empty($_POST["user_name"])){
        $user_name_error = "*Username is required!*";
    }
    else{
        $user_name = $_POST["user_name"];
    }
    if(empty($_POST["phone"])){
        $phone_error = "*Phone Number is required!*";
    }
    else{
        $phone = $_POST["phone"];
    }
    if(empty($_POST["whatsapp_number"])){
        $whatsapp_number_error = "*WhatsApp Number is required!*";
    }
    else{
        $whatsapp_number = $_POST["whatsapp_number"];
    }
    if(empty($_POST["address"])){
        $address_error = "*Address is required!*";
    }
    else{
        $address = $_POST["address"];
    }
    if(empty($_POST["email"])){
        $email_error = "*Email is required!*";
    }
    else{
        $email = $_POST["email"];
    }
    if(empty($_POST["password"])){
        $password_error = "*Password is required!*";
    }
    else{
        $password = $_POST["password"];
    }
    if(empty($_POST["confirm_password"])){
        $confirm_password_error = "*Confirm Password is required!*";
    }
    else{
        $confirm_password = $_POST["confirm_password"];
    }
    if(empty($_POST["user_image"])){
        $user_image_error = "*User Image is required!*";
    }
    else{
        $user_image = $_POST["user_image"];
    }
}
?>
    <div class="index-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-container" method="POST">
            <h1 class="registerh1">Register</h1>
            <div class="input-outer-container">
                <div class="input-inner-container">
                    <div class="lol">
                    <p class="input-label">Full Name</p>
                    <img src="signature.png" class="input-icon" alt="">
                    </div>
                
                <input type="text" class="input-field" name="full_name"  placeholder="Enter Your Full Name" autofocus autocomplete="off"  >
                <p class="error"><?php echo $full_name_error ?></p>
                </div>

                <div class="input-inner-container">
                <div class="lol">
                    <p class="input-label">Username</p>
                    <img src="user.png" class="input-icon" alt="">
                    </div>
                <input type="text" class="input-field" name="user_name"  placeholder="Enter Your Username" autofocus autocomplete="off" >
                <p class="error"><?php echo $user_name_error ?></p>
                </div>

                
                
            </div>

            <div class="input-outer-container">
                <div class="input-inner-container">
                <div class="lol">
                    <p class="input-label">Phone Number</p>
                    <img src="phone-call.png" class="input-icon" alt="">
                    </div>
                <input type="text" class="input-field" name="phone"  placeholder="Enter Your Phone Number" autofocus autocomplete="off" >
                <p class="error"><?php echo $phone_error ?></p>
                </div>

                <div class="input-inner-container">
                <div class="lol">
                    <p class="input-label">WhatsApp Number</p>
                    <img src="whatsapp.png" class="input-icon" alt="">
                    </div>
                <input type="text" class="input-field" name="whatsapp_number"  placeholder="Enter Your WhatsApp Number" autofocus autocomplete="off" >
                <p class="error"><?php echo $whatsapp_number_error ?></p>
                </div>

                
                
            </div>

            <div class="input-outer-container">
                <div class="input-inner-container">
                <div class="lol">
                    <p class="input-label">Address</p>
                    <img src="location-pin.png" class="input-icon" alt="">
                    </div>
                <input type="text" class="input-field" name="address"  placeholder="Enter Your Address" autofocus autocomplete="off" >
                <p class="error"><?php echo $address_error ?></p>
                </div>

                <div class="input-inner-container">
                <div class="lol">
                    <p class="input-label">Email</p>
                    <img src="gmail.png" class="input-icon" alt="">
                    </div>
                <input type="email" class="input-field" name="email"  placeholder="Enter Your Email" autofocus autocomplete="off" >
                <p class="error"><?php echo $email_error ?></p>
                </div>

                
                
            </div>

            <div class="input-outer-container">
                <div class="input-inner-container">
                <div class="lol">
                    <p class="input-label">Password</p>
                    <img src="hide.png" class="input-icon" alt="">
                    </div>
                <input type="password" class="input-field" name="password"  placeholder="Must be at least 8 characters." autofocus autocomplete="off" >
                <p class="error"><?php echo $password_error ?></p>
                </div>

                <div class="input-inner-container">
                <p class="input-label">Confirm Password</p>
                <input type="password" class="input-field" name="confirm_password"  placeholder="Enter to Confirm" autofocus autocomplete="off" >
                <p class="error"><?php echo $confirm_password_error ?></p>
                </div>

                
                
            </div>

           <div class="input-outer-container">
             <div class="input-inner-container">
                <p class="input-label">Upload Profile Picture</p>
                <input type="file" class="input-field" name="user_image" accept="image/*">
             </div>
           </div>
           <button class="register-button">Register</button>
        </form>
    </div>
    <?php include 'Footer.php'?>
</body>
</html>
