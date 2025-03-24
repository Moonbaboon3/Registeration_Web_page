function togglePassword(imgElement) {
    // Find the corresponding password input field
    let passwordField = imgElement.previousElementSibling;

    // Toggle password field type
    if (passwordField.type === "password") {
        passwordField.type = "text";
        imgElement.src = "assets/show.png"; // Change icon to "show"
    } else {
        passwordField.type = "password";
        imgElement.src = "assets/hide.png"; // Change icon back to "hide"
    }
}



///// for database
//a function that is called when a submit occurs 
function server_request(userinput) {
    //creates new xmlhttp request
    var dbajax = new XMLHttpRequest();
    //checks to see if the response  is Found and adds a new error message
    dbajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("username_error").innerHTML = this.responseText;
        }
    }

}
//opens path to db file sets async to true and sends the username
dbajax.open("post", "DB_Ops.php", true);
dbajax.send("user_input=" + userinput);
