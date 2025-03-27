function validateConfirmPassword() {
    const password = document.getElementById('password');
    const confirm_password = document.getElementById('confirm_password')
    confirm_password.setCustomValidity(password.value == confirm_password.value ? "" : "Confirm Password should match Password!")
}
function resetValidation() {
    const whatsappNumberInput = document.getElementById("whatsappNumber");
    const validateButton = document.getElementById("validateWhatsapp");
    validateButton.classList.remove("validate-whatsapp-button-valid", "validate-whatsapp-button-invalid");
    if (whatsappNumberInput.validationMessage === "Invalid Whatsapp Number!") {
        whatsappNumberInput.setCustomValidity("");
    }
}
async function validateWhatsappNumber() {
    resetValidation();
    const whatsappNumberInput = document.getElementById("whatsappNumber");
    const validateButton = document.getElementById("validateWhatsapp");
    const phoneNumber = whatsappNumberInput.value;
    validateButton.disabled = true;
    const isValidInput = whatsappNumberInput.checkValidity();
    const isValid = isValidInput && await isValidWhatsappNumber(phoneNumber);
    if (isValid === true) {
        validateButton.classList.add("validate-whatsapp-button-valid");
        whatsappNumberInput.setCustomValidity("");
    }
    else if (isValid === false) {
        validateButton.classList.add("validate-whatsapp-button-invalid");
        if (isValidInput) {
            whatsappNumberInput.setCustomValidity("Invalid Whatsapp Number!");
        }
    }
    else {
        whatsappNumberInput.setCustomValidity("Failed to validate try again!");
    }
    validateButton.disabled = false;
    whatsappNumberInput.reportValidity();

}
validatedNumber = null;
async function isValidWhatsappNumber(phoneNumber) {
    if (validatedNumber && phoneNumber === validatedNumber) {
        return true;
    }
    validatedNumber = null;

    const url = `https://whatsapp-data1.p.rapidapi.com/number/${phoneNumber}`;
    const options = {
        method: 'GET',
        headers: {
            'x-rapidapi-key': '78b5ca5932msh295ad583a51d6b9p14c98ajsn02f021869243',
            'x-rapidapi-host': 'whatsapp-data1.p.rapidapi.com'
        }
    };

    try {
        const response = await fetch(url, options);
        const result = await response.json()
        if (response.status == 200) {
            const isUser = result["isUser"];
            if (isUser) {
                validatedNumber = phoneNumber;
                return true;
            }
            return false;
        }
    } catch (error) {
        console.error(error);
        return null;
    }

}
async function validateForm(event) {
    event.preventDefault();
    const whatsappValidation = validateWhatsappNumber();
    validateConfirmPassword();
    await whatsappValidation;
    if (!event.target.checkValidity()) {
        return false;
    }
    event.target.submit();
}