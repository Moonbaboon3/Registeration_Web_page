<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration App</title>

</head>
<link rel="stylesheet" type="text/css" href="signin.css">

<?php
if (!empty($_POST['username']) && !empty($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
}
?>

<body>
    <?php include "Header.php" ?>
    <form method="post" class="signin-form">
        <label for="username">Username: </label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password: </label>
        <input type="password" id="password" password="password" required>
        <button type="submit">Retrieve Info</button>
    </form>
    <?php include "Footer.php" ?>
</body>

</html>