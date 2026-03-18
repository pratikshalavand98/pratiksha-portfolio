# 🌐 Pratiksha Portfolio

A modern, responsive portfolio website built using **HTML, CSS, JavaScript, PHP, and MySQL** with a fully functional contact system powered by **EmailJS**.

---

## 🚀 Live Demo

🔗[ https://your-live-portfolio-link.com  ](https://pratiksha-portfolio.infinityfreeapp.com/)

---

## 📸 Preview
<img width="1896" height="855" alt="image" src="https://github.com/user-attachments/assets/ddb768b9-503e-42d8-bb1c-ba305bd2452d" />
<img width="1895" height="859" alt="image" src="https://github.com/user-attachments/assets/1de9fccc-8691-4769-a1e6-23a462e9d078" />
<img width="1902" height="872" alt="image" src="https://github.com/user-attachments/assets/fe6eb770-699f-47d1-862a-edeb23e3abf1" />

---

## 🚀 Features

- Responsive and modern UI
- Contact form with:
  - Data stored in database
  - Email notification to admin
  - Auto-reply to user
- Smooth animations and effects
- Clean and GitHub-ready code

---

## 🛠️ Technologies Used

- HTML5, CSS3, JavaScript
- PHP
- MySQL
- EmailJS
- InfinityFree Hosting

---

## ⚙️ Setup Guide (Step-by-Step)

---
### 🔹 1. Clone Repository
```bash
git clone https://github.com/pratikshalavand98/pratiksha-portfolio.git
```
**🔹 2. Setup Database (InfinityFree)**

Go to InfinityFree Control Panel

Open MySQL Databases

Create a new database

Open phpMyAdmin

Run this SQL:
```bash
CREATE TABLE contact_form (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```
**🔹 3. Configure Database Connection**

Update your PHP file:
```bash
$DB_HOST = "your_host";
$DB_USER = "your_username";
$DB_PASS = "your_password";
$DB_NAME = "your_database";
```
⚠️ Do NOT upload real credentials to GitHub

**🔹 4. Setup EmailJS**

Go to https://www.emailjs.com/

Create an account and login

Go to Email Services

Add Gmail (or any service)

Copy your Service ID

Go to Email Templates

Create:

✅ Admin Template (for receiving messages)

✅ Auto Reply Template (for users)

Replace in your code:
```bash
emailjs.init("YOUR_PUBLIC_KEY");

emailjs.sendForm("YOUR_SERVICE_ID", "ADMIN_TEMPLATE_ID", form);
emailjs.sendForm("YOUR_SERVICE_ID", "AUTO_REPLY_TEMPLATE_ID", form);
```
**🔹 5. Upload to InfinityFree**

Open File Manager

Go to htdocs folder

Upload all project files

Ensure:

Main file = index.php

Images and asset paths are correct

**🔹 6. Test Your Website**

Fill the contact form

Check:

✅ Data saved in database

✅ Admin email received

✅ User auto-reply received

**🔐 Security Notes**

Never expose:

Database credentials

EmailJS keys

Disable error reporting in production:
```bash
error_reporting(0);
```
**👩‍💻 Author**

**Pratiksha Lavand**__
Aspiring Cloud Architect ☁️

🔗 GitHub: https://github.com/pratikshalavand98

🔗 LinkedIn: https://www.linkedin.com/in/pratiksha-lavand-4ba4002a2/


