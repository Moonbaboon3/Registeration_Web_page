<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration App</title>

</head>

<body>
    <?php include 'header.php' ?>
    <?php
    $phone_regex = '/^\+?[0-9]{10,}$/';
    $full_name_error = $user_name_error = $phone_error = $whatsapp_number_error = $address_error = $email_error = $password_error = $confirm_password_error = $user_image_error = "";
    $full_name = $user_name = $phone = $whatsapp_number = $address = $email = $password = $confirm_password = $user_image = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["full_name"])) {
            $full_name_error = "*Full Name is required!*";
        } else {
            $full_name = htmlspecialchars($_POST["full_name"]);
        }
        if (empty($_POST["user_name"])) {
            $user_name_error = "*Username is required!*";
        } else {
            $user_name = $_POST["user_name"];
        }
        if (empty($_POST["phone"])) {
            $phone_error = "*Phone Number is required!*";
        } else {
            $phone = $_POST["phone"];
            if (!preg_match($phone_regex, $phone)) {
                $phone_error = "*Invalid phone number format!*";
            }
        }
        if (empty($_POST["whatsapp_number"])) {
            $whatsapp_number_error = "*WhatsApp Number is required!*";
        } else {
            $whatsapp_number = $_POST["whatsapp_number"];
            if (!preg_match($phone_regex, $whatsapp_number)) {
                $whatsapp_number_error = "*Invalid phone number format!*";
            }
        }
        if (empty($_POST["address"])) {
            $address_error = "*Address is required!*";
        } else {
            $address = $_POST["address"];
        }
        if (empty($_POST["email"])) {
            $email_error = "*Email is required!*";
        } else {
            $email = $_POST["email"];
        }

        // Password validation
        if (empty($_POST["password"])) {
            $password_error = "*Password is required!*";
        } else {
            $password = $_POST["password"];
            // Check password length (at least 8 characters)
            if (strlen($password) < 8) {
                $password_error = "*Password must be at least 8 characters!*";
            }
            // Check for at least 1 number
            elseif (!preg_match('/[0-9]/', $password)) {
                $password_error = "*Password must contain at least 1 number!*";
            }
            // Check for at least 1 special character
            elseif (!preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $password)) {
                $password_error = "*Password must contain at least 1 special character!*";
            }
        }

        // Confirm password validation
        if (empty($_POST["confirm_password"])) {
            $confirm_password_error = "*Confirm Password is required!*";
        } else {
            $confirm_password = $_POST["confirm_password"];
            // Check if passwords match
            if (!empty($password) && $password != $confirm_password) {
                $confirm_password_error = "*Passwords do not match!*";
            }
        }

        if (empty($_POST["user_image"])) {
            $user_image_error = "*User Image is required!*";
        } else {
            $user_image = $_POST["user_image"];
        }

    }
    ?>
    <div class="index-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="validateForm()"
            class="form-container" method="POST">
            <div class="register_conatainer">
                <h1 class="registerh1">Register</h1>
            </div>

            <div class="input-outer-container">
                <div class="input-inner-container">
                    <div class="lol">
                        <p class="input-label">Full Name</p>
                    </div>
                    <div class="im_input">
                        <input type="text" class="input-field" name="full_name" placeholder="Enter Your Full Name"
                            value="<?php echo $full_name ?>" autofocus autocomplete="off" required>
                        <img src="assets/signature.png" class="input-icon" alt="">
                    </div>
                    <p class="error"><?php echo $full_name_error ?></p>
                </div>

                <div class="input-inner-container">
                    <div class="lol">
                        <p class="input-label">Username</p>
                    </div>
                    <div class="im_input">
                        <input type="text" class="input-field" name="user_name" placeholder="Enter Your Username"
                            value="<?php echo $user_name ?>" autofocus autocomplete="off"
                            onsubmit="server_request(this.value)" required>
                        <img src="assets/user.png" class="input-icon" alt="">
                    </div>
                    <p class="error" id="username_error"><?php echo $user_name_error ?></p>
                </div>
            </div>

            <div class="input-outer-container">
                <div class="input-inner-container">
                    <div class="lol">
                        <p class="input-label">Phone Number</p>
                    </div>
                    <div class="im_input">

                        <input type="tel" class="input-field" name="phone" placeholder="Enter Your Phone Number"
                            value="<?php echo $phone ?>" autofocus autocomplete="off" pattern="^\+?[0-9]{10,}$"
                            required>
                        <img src="assets/phone-call.png" class="input-icon" alt="">
                    </div>
                    <p class="error"><?php echo $phone_error ?></p>
                </div>

                <div class="input-inner-container">
                    <div class="lol">
                        <p class="input-label">WhatsApp Number</p>
                    </div>
                    <div class="im_input">
                        <input type="tel" class="input-field" name="whatsapp_number" id="whatsappNumber"
                            oninput="resetValidation()" pattern="^\+?[0-9]{10,}$" value="<?php echo $whatsapp_number ?>"
                            placeholder="Enter Your WhatsApp Number" autofocus autocomplete="off" required>
                        <img src="assets/whatsapp.png" class="input-icon" alt="">
                    </div>

                    <button class="validate-whatsapp-button" onclick="validateWhatsappNumber()" type="button"
                        id="validateWhatsapp">Validate WhatsApp
                        Number</button>
                    <p class="error"><?php echo $whatsapp_number_error ?></p>
                </div>
            </div>

            <div class="input-outer-container">
                <div class="input-inner-container">
                    <div class="lol">
                        <p class="input-label">Address</p>
                    </div>
                    <div class="im_input">
                        <input type="text" class="input-field" name="address" placeholder="Enter Your Address" autofocus
                            value="<?php echo $address ?>" autocomplete="off" required>
                        <img src="assets/location-pin.png" class="input-icon" alt="">
                    </div>
                    <p class="error"><?php echo $address_error ?></p>
                </div>

                <div class="input-inner-container">
                    <div class="lol">
                        <p class="input-label">Email</p>
                    </div>
                    <div class="im_input">
                        <input type="email" class="input-field" name="email" placeholder="Enter Your Email" autofocus
                            value="<?php echo $email ?>" autocomplete="off" required>
                        <img src="assets/gmail.png" class="input-icon" alt="">
                    </div>
                    <p class="error"><?php echo $email_error ?></p>
                </div>
            </div>

            <div class="input-outer-container">
                <div class="input-inner-container">
                    <div class="lol">
                        <p class="input-label">Password</p>
                    </div>
                    <div class="im_input">
                        <input type="password" class="input-field password-field" name="password" id="password"
                            placeholder="Must be at least 8 characters with 1 number and 1 special character" autofocus
                            oninput="validateConfirmPassword()" autocomplete="off" required>
                    </div>
                    <img src="assets/lock.png" class="input-icon toggle-password" onclick="togglePassword(this)"
                        alt="Toggle Password">
                    <p class="error"><?php echo $password_error; ?></p>
                </div>
                <div class="input-inner-container">
                    <p class="input-label">Confirm Password</p>
                    <div class="im_input">
                        <input type="password" class="input-field password-field" name="confirm_password"
                            oninput="validateConfirmPassword(event)" id="confirm_password"
                            placeholder="Enter to Confirm" autofocus autocomplete="off" required>
                        <img src="assets/lock.png" class="input-icon toggle-password" onclick="togglePassword(this)"
                            alt="Toggle Password">
                    </div>
                    <p class="error"><?php echo $confirm_password_error; ?></p>
                </div>
            </div>
            <div class="input-outer-container">
                <div class="input-inner-container">
                    <p class="input-label">Upload Profile Picture</p>
                    <input id="fileInput" type="file" class="input-field_img" name="user_image" accept="image/*"
                        onchange="previewImage(event)" required>
                    <div id="dropArea" class="image-preview-container">
                        <img id="imagePreview" src="#" alt="Image Preview" class="image-preview" style="display: none;">
                    </div>
                </div>
            </div>
            <button type="submit" value="Submit" class="register-button">Register</button>
        </form>
    </div>
    <?php include 'Footer.php' ?>
    <script src="API_Ops.js">
    </script>
    <script src="Load_Image.js"></script>
    <script src="Validations.js"></script>
</body>

</html>