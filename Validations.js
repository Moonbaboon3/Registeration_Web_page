function validateConfirmPassword(event) {
    const password = document.getElementById('password');
    const confirm_password = document.getElementById('confirm_password')
    confirm_password.setCustomValidity(password.value == confirm_password.value ? "" : "Confirm Password should match Password!")
}
function validateWhatapNumber() {

}
function validateForm(event) {
    validateConfirmPassword();
}