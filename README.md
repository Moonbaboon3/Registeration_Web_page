# User Registration Form - Project Overview

## Features & Requirements

This project involves developing a user registration form with both **client-side and server-side validation**. Below are the core requirements and functionalities:

### **1. User Personal Details (Form Fields)**

The form collects the following user details:

- **Full Name** (`full_name`)
- **Username** (`user_name`)
- **Phone Number** (`phone`)
- **WhatsApp Number** (`whatsapp_number`)
- **Address** (`address`)
- **Password** (`password`)
- **Confirm Password** (`confirm_password`)
- **User Image** (`user_image`)
- **Email** (`email`)

### **2. Client-Side Validations**

Before submission, the form will enforce the following client-side validations:

- All fields are **mandatory**.
- `full_name` and `email` must be of **correct types**.
- `password` and `confirm_password` must **match**.
- `password` must be at least **8 characters long**, containing at least **one number** and **one special character**.

### **3. UI Design Enhancements**

- The registration webpage will include a **custom-designed header and footer** to enhance the user experience.

### **4. Server-Side Validations**

- A **Users table** will be maintained in the database.
- The system will check if the **username already exists** before allowing registration.
- If the username is already taken, the user will receive an **alert to choose another username**.
- **AJAX** will be used to perform real-time username validation.

### **5. User Image Upload**

- The **user image** will be uploaded to the server.
- The image **name** will be stored in the database, or both the **image and the name** may be stored in the database.

### **6. WhatsApp Number Validation**

- A **button** will be added beside the `whatsapp_number` field to verify if the number is valid.
- The system will use the third-party API **MDBI WhatsApp Number Validator**:  
  [https://rapidapi.com/finestoreuk/api/whatsapp-number-validator3](https://rapidapi.com/finestoreuk/api/whatsapp-number-validator3)
- The user will receive an **alert** indicating whether the WhatsApp number is valid or not.

## Technologies Used

- **Frontend:** HTML, CSS, JavaScript (AJAX for real-time validation)
- **Backend:** PHP & MySQL
- **API Integration:** MDBI WhatsApp Number Validator API
- **Validation:** Client-side (JavaScript) & Server-side (PHP)

## Setup & Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/Moonbaboon3/Registeration_Web_page.git
   ```
2. Set up the database:
   - Import the `database.sql` file into your MySQL database.
   - Configure `config.php` with your database credentials.
3. Start a local server using XAMPP or any PHP-supported environment.
4. Access the registration form via `http://localhost/your-folder/register.php`.

## Contributions

Contributions and improvements are welcome! Feel free to open a pull request or suggest enhancements.

---

### **Authors:**

NAME:
1- Mohammed Abdallah Ahmed Abdelrahman 20220833
2- Mazen Wael Hussein Bahaa 20221115
3- Gatjuat Wicteat Riek 20220935
4- Omer Yassir Abdelmoneim Ahmed 20220799
5- Mustafa Ammar Mahmoud Haj abdou 20220672
6- Amr Mahmoud Abdelmoein 20200767
