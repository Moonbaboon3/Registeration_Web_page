<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration App</title>
</head>

<body>
    <?php include 'header.php' ?>
   
    
    <div class="index-container">
        <form action="DB_Ops.php" onsubmit="return validateForm()" class="form-container" method="POST" enctype="multipart/form-data">
            <div class="register_conatainer">
                <h1 class="registerh1">Register</h1>
            </div>

            <div class="input-outer-container">
                <div class="input-inner-container">
                    <div class="lol">
                        <p class="input-label"><span style="color: red;">*</span> Full Name</p>
                    </div>
                    <div class="im_input">
                        <input type="text" class="input-field" name="full_name" placeholder="Enter Your Full Name"
                            autofocus autocomplete="off" required>
                        <img src="assets/signature.png" class="input-icon" alt="">
                    </div>
                    <p class="error"></p>
                </div>

                <div class="input-inner-container">
                    <div class="lol">
                        <p class="input-label"><span style="color: red;">*</span> Username</p>
                    </div>
                    <div class="im_input">
                        <input type="text" class="input-field" name="user_name" id="user_name" onkeyup="checkUsername()"
                            placeholder="Enter Your Username" required>
                        <img src="assets/user.png" class="input-icon" alt="">
                    </div>
                    <span id="check_username" ></span>
                    <p class="error" ></p>

                </div>
            </div>

            <div class="input-outer-container">
                <div class="input-inner-container">
                    <div class="lol">
                        <p class="input-label"><span style="color: red;">*</span> Phone Number</p>
                    </div>
                    <div class="im_input">

                        <input type="tel" class="input-field" name="phone" placeholder="Enter Your Phone Number"
                             autofocus autocomplete="off" pattern="^\+?[0-9]{10,}$"
                            required>
                        <img src="assets/phone-call.png" class="input-icon" alt="">
                    </div>
                    <p class="error"></p>
                </div>

                <div class="input-inner-container">
                    <div class="lol">
                        <p class="input-label"><span style="color: red;">*</span> WhatsApp Number</p>
                    </div>
                    <div class="im_input">
                        <input type="tel" class="input-field" name="whatsapp_number" id="whatsappNumber"
                            oninput="resetValidation()" pattern="^\+?[0-9]{10,}$"
                            placeholder="Enter Your WhatsApp Number" autofocus autocomplete="off" required>
                        <img src="assets/whatsapp.png" class="input-icon" alt="">
                    </div>

                    <button class="validate-whatsapp-button" onclick="validateWhatsappNumber()" type="button"
                        id="validateWhatsapp">Validate WhatsApp
                        Number</button>
                    <p class="error"></p>
                </div>
            </div>

            <div class="input-outer-container">
                <div class="input-inner-container">
                    <div class="lol">
                        <p class="input-label"><span style="color: red;">*</span> Address</p>
                    </div>
                    <div class="im_input">
                        <input type="text" class="input-field" name="address" placeholder="Enter Your Address" autofocus
                             autocomplete="off" required>
                        <img src="assets/location-pin.png" class="input-icon" alt="">
                    </div>
                    <p class="error"></p>
                </div>

                <div class="input-inner-container">
                    <div class="lol">
                        <p class="input-label"><span style="color: red;">*</span> Email</p>
                    </div>
                    <div class="im_input">
                        <input type="email" class="input-field" name="email" placeholder="Enter Your Email" autofocus
                            autocomplete="off" required>
                        <img src="assets/gmail.png" class="input-icon" alt="">
                    </div>
                    <p class="error"></p>
                </div>
            </div>

            <div class="input-outer-container">
                <!-- Password Field -->
                <div class="input-inner-container">
                    <div class="lol">
                        <p class="input-label"><span style="color: red;">*</span> Password</p>
                    </div>
                    <div class="im_input" style="position: relative;">
                        <input type="password" class="input-field password-field" name="password" id="password"
                            placeholder="Must be at least 8 characters with 1 number and 1 special character"
                            oninput="validatePassword()" required>
                        <img src="assets/lock.png" class="input-icon"
                            style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"
                            onclick="togglePasswordVisibility(this)" alt="Toggle Password">
                    </div>
                    <p class="error" id="password-error"></p>
                </div>

                <!-- Confirm Password Field -->
                <div class="input-inner-container">
                    <div class="lol">
                        <p class="input-label"><span style="color: red;">*</span> Confirm Password</p>
                    </div>
                    <div class="im_input" style="position: relative;">
                        <input type="password" class="input-field password-field" name="confirm_password" id="confirm_password"
                            placeholder="Re-enter your password"
                            oninput="validateConfirmPassword()" required>
                        <img src="assets/lock.png" class="input-icon"
                            style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"
                            onclick="togglePasswordVisibility(this)" alt="Toggle Password">
                    </div>
                    <p class="error" id="confirm-error"></p>
                </div>
            </div>
            <div class="input-outer-container">
                <div class="input-inner-container">
                    <p class="input-label"><span style="color: red;">*</span> Upload Profile Picture</p>
                    <input id="fileInput" type="file" class="input-field_img" name="user_image" accept="image/*"
                        onchange="previewImage(event)" required>
                    <div id="dropArea" class="image-preview-container">
                        <img id="imagePreview" src="image" alt="Image Preview" class="image-preview"
                            style="display: none;">
                    </div>
                </div>
            </div>
            <button name="submit" type="submit" value="Submit" class="register-button" id="submit">Register</button>
        </form>
    </div>
    <?php include 'Footer.php' ?>
    <script src="JS/API_Ops.js">
    </script>
    <script src="JS/Load_Image.js"></script>
    <script src="JS/Validations.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="JS/check_username.js"></script>
</body>

</html>
