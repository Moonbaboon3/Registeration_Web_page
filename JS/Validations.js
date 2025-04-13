// Password Validation Functions
function validatePassword() {
  const password = document.getElementById("password");
  const passwordError = document.getElementById("password-error");

  // Reset previous errors
  password.setCustomValidity("");
  passwordError.textContent = "";

  // Check if empty
  if (!password.value) {
    password.setCustomValidity("Password is required!");
    passwordError.textContent = "*Password is required!*";
    return false;
  }

  // Check length
  if (password.value.length < 8) {
    password.setCustomValidity("Password must be at least 8 characters!");
    passwordError.textContent = "*Password must be at least 8 characters!*";
    return false;
  }

  // Check for number
  if (!/\d/.test(password.value)) {
    password.setCustomValidity("Password must contain at least 1 number!");
    passwordError.textContent = "*Password must contain at least 1 number!*";
    return false;
  }

  // Check for special character
  if (!/[!@#$%^&*()\-_=+{};:,<.>]/.test(password.value)) {
    password.setCustomValidity(
      "Password must contain at least 1 special character!"
    );
    passwordError.textContent =
      "*Password must contain at least 1 special character!*";
    return false;
  }
  return true;
}

function validateConfirmPassword() {
  const password = document.getElementById("password");
  const confirm_password = document.getElementById("confirm_password");
  const confirmError = document.getElementById("confirm-error");

  // Reset previous errors
  confirm_password.setCustomValidity("");
  confirmError.textContent = "";

  // Check if empty
  if (!confirm_password.value) {
    confirm_password.setCustomValidity("Confirm Password is required!");
    confirmError.textContent = "*Confirm Password is required!*";
    return false;
  }

  // Check if passwords match
  if (password.value !== confirm_password.value) {
    confirm_password.setCustomValidity(
      "Confirm Password should match Password!"
    );
    confirmError.textContent = "*Passwords do not match!*";
    return false;
  }

  return true;
}

// Keep all your existing functions below
function resetValidation() {
  const whatsappNumberInput = document.getElementById("whatsappNumber");
  const validateButton = document.getElementById("validateWhatsapp");
  validateButton.classList.remove(
    "validate-whatsapp-button-valid",
    "validate-whatsapp-button-invalid"
  );
  if (whatsappNumberInput.validationMessage === "Invalid Whatsapp Number!") {
    whatsappNumberInput.setCustomValidity("");
  }
}

function callWhatsappApi(phoneNumber) {
  const url = `https://whatsapp-data1.p.rapidapi.com/number/${phoneNumber}`;
  const options = {
    method: "GET",
    headers: {
      "x-rapidapi-key": "78b5ca5932msh295ad583a51d6b9p14c98ajsn02f021869243",
      "x-rapidapi-host": "whatsapp-data1.p.rapidapi.com",
    },
  };
  return fetch(url, options);
}

async function callWhatsappApiMock(phoneNumber) {
  console.log(`Mock API called for: ${phoneNumber}`);
  return new Promise((resolve) => {
    setTimeout(
      () =>
        resolve({
          ok: true,
          status: 200,
          json: async () => ({ isUser: phoneNumber.startsWith("20") }),
        }),
      500
    );
  });
}

async function validateWhatsappNumber() {
  resetValidation();
  const whatsappNumberInput = document.getElementById("whatsappNumber");
  const validateButton = document.getElementById("validateWhatsapp");
  const phoneNumber = whatsappNumberInput.value;
  validateButton.disabled = true;
  const isValidInput = whatsappNumberInput.checkValidity();
  const isValid = isValidInput && (await isValidWhatsappNumber(phoneNumber));
  if (isValid === true) {
    validateButton.classList.add("validate-whatsapp-button-valid");
    whatsappNumberInput.setCustomValidity("");
  } else if (isValid === false) {
    validateButton.classList.add("validate-whatsapp-button-invalid");
    if (isValidInput) {
      whatsappNumberInput.setCustomValidity("Invalid Whatsapp Number!");
    }
  } else {
    whatsappNumberInput.setCustomValidity("Failed to validate try again!");
  }
  validateButton.disabled = false;
  whatsappNumberInput.reportValidity();
  return isValid;
}

validatedNumber = null;
async function isValidWhatsappNumber(phoneNumber) {
  if (validatedNumber && phoneNumber === validatedNumber) {
    return true;
  }
  validatedNumber = null;
  try {
    const response = await callWhatsappApiMock(phoneNumber);
    const result = await response.json();
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

// Modified validateForm function to include password validation
async function validateForm(event) {
  event.preventDefault();

  // Validate all fields
  const whatsappValidation = validateWhatsappNumber();
  const isPasswordValid = validatePassword();
  const isConfirmValid = validateConfirmPassword();

  await whatsappValidation;

  if (!isPasswordValid || !isConfirmValid || !event.target.checkValidity()) {
    // Focus on the first invalid field
    if (!isPasswordValid) {
      document.getElementById("password").focus();
    } else if (!isConfirmValid) {
      document.getElementById("confirm_password").focus();
    }
    return false;
  }
  event.target.submit();
}
