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
