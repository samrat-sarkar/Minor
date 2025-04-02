# 📚 Library Management System

## 📝 Description
A comprehensive Library Management System built with PHP and MySQL, featuring separate interfaces for administrators and users. This system provides efficient management of library resources, user accounts, and administrative functions.

## ✨ Features
- 👤 Dual User Interface (Admin & User)
- 🔐 Secure Login System
- 📖 Book Management
- 👥 User Management
- 📊 Administrative Dashboard
- 🎨 Responsive Design
- 🔒 Session Management
- 📱 Mobile-Friendly Interface

## 🚀 Installation

### 📥 Prerequisites
- PHP 7.x or higher
- MySQL 5.x or higher
- Web Server (Apache/Nginx)
- Web Browser

### ⚙️ Database Setup
1. Create a MySQL database named 'ABC'
2. Import the database schema (if provided)
3. Update database credentials in `config.php`:
   ```php
   define('DB_SERVER','localhost');
   define('DB_USER','ABC');
   define('DB_PASS','');
   define('DB_NAME','ABC');
   ```

### ⚙️ Application Setup
1. Clone the repository:
   ```bash
   git clone https://github.com/samrat-sarkar/Minor.git
   ```

2. Navigate to the project directory:
   ```bash
   cd Minor
   ```

3. Configure your web server to point to the project directory

## 💻 Usage

### 👤 User Access
1. Access the user interface through `index2.php`
2. Register a new account or login with existing credentials
3. Browse and manage library resources

### 👨‍💼 Administrator Access
1. Access the admin interface through `index.php`
2. Login with administrator credentials
3. Manage users, books, and system settings

## 🛠️ Technical Details
- Built with PHP and MySQL
- Uses session-based authentication
- Implements responsive CSS design
- Features secure password handling
- Includes input validation and sanitization

## 📁 Project Structure
```
Minor/
├── admin/           # Administrator interface files
├── user/           # User interface files
├── css/            # Stylesheet files
├── img/            # Image assets
├── Screenshot/     # Project screenshots
├── config.php      # Database configuration
├── index.php       # Admin login
├── index2.php      # User login
├── index3.php      # Additional functionality
└── home.php        # Admin dashboard
```

## ⚠️ Important Notes
- Ensure proper database configuration
- Set appropriate file permissions
- Keep credentials secure
- Regular backup of database recommended
- Use strong passwords

## 🤝 Contributing
We welcome contributions to improve the Library Management System! Here's how you can help:

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 👤 Author
- **Samrat Sarkar**
  - LinkedIn: [samratsarkar9999](https://www.linkedin.com/in/samratsarkar9999/)
  - Website: [samratsarkar.in](https://samratsarkar.in/)

## 📞 Support
If you encounter any issues or have questions, please:
1. Check the existing issues
2. Create a new issue with detailed information
3. Include system specifications and error messages

---

**Library Management System - Efficient Library Resource Management** 📚 