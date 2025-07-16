# Registration Portal (PHP + MySQL)

A user registration and login system built using **PHP**, **MySQL**, and **XAMPP**. Includes features like user signup, login, password reset via email OTP, and a simple dashboard.

## 🔧 Technologies Used
- PHP
- MySQL (phpMyAdmin)
- HTML, CSS, Bootstrap
- PHPMailer (for sending OTP emails)
- XAMPP (as local server)

## 🚀 Features
- User registration with email
- Secure password hashing
- Login system
- Forgot password with OTP sent to email
- Password reset functionality
- Simple and clean UI using Bootstrap

## ⚙️ How to Run Locally

### 🖥 Requirements:
- XAMPP installed (with Apache and MySQL)
- A browser (Chrome, Firefox, etc.)

### 🛠 Steps:

1. Copy the project folder to `C:\xampp\htdocs\`
2. Start **Apache** and **MySQL** from the XAMPP control panel
3. Go to browser and open:  
http://localhost/registration-portal

4. Create the database:
- Open `http://localhost/phpmyadmin`
- Create a database (e.g., `registration`)
- Import the `registration.sql` file provided in the project

5. Set your email credentials in `mailer.php` or `forgot-password.php` (for OTP to work)

## 📬 Contact
Created by **Rajaji**  
[GitHub](https://github.com/rajaji711)
