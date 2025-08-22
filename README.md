# Student Management System (PHP, OOP MVC)

A modern, responsive Student Management System built with PHP OOP MVC architecture. Features a beautiful UI with authentication, CRUD operations for students, marks & attendance management, and comprehensive reporting.

## ✨ Features

### 🎨 **Modern UI/UX**
- **Responsive design** with mobile-friendly layout
- **Beautiful gradient header** with professional styling
- **Card-based interface** with shadows and rounded corners
- **Font Awesome icons** throughout the application
- **Color-coded status badges** for quick visual feedback
- **Performance indicators** with star ratings for high achievers

### 🔐 **Authentication**
- Session-based login/logout system
- Secure password hashing with bcrypt
- Protected routes with authentication middleware

### 👥 **Student Management**
- **CRUD operations**: Create, Read, Update, Delete students
- **Student profiles**: Name, email, phone, address
- **Bulk operations**: View all students with action buttons
- **Empty state handling** with helpful prompts

### 📊 **Marks Management**
- **Subject-wise marks** with customizable scoring
- **Percentage calculations** with visual indicators
- **Performance badges**: Excellent (80%+), Good (60%+), Needs Improvement (<60%)
- **Star ratings** for high-performing students

### 📅 **Attendance Tracking**
- **Daily attendance** with Present/Absent status
- **Date-based recording** with easy form interface
- **Visual status indicators** with color-coded badges
- **Attendance percentage** calculations

### 📈 **Reporting System**
- **Marks Report**: Average performance per student with performance indicators
- **Attendance Report**: Attendance percentage with status classifications
- **Empty state handling** for reports with no data
- **Performance categorization**: Excellent (90%+), Good (75%+), Needs Improvement (<75%)

## 🚀 Quick Start

### Requirements
- PHP 8.1+
- SQLite extension (bundled by default)

### Installation & Run
```bash
# Clone or navigate to project directory
cd /path/to/student-management-system

# Start the development server
php -S localhost:8080 -t public

# Open in browser
# http://localhost:8080
```

### Default Login
- **Username**: `admin`
- **Password**: `admin123`

## 🏗️ Architecture

### **MVC Structure**
```
├── public/index.php          # Front controller & routing
├── app/
│   ├── Core/                 # Core framework classes
│   │   ├── Autoloader.php    # PSR-4 autoloader
│   │   ├── Router.php        # Simple routing system
│   │   └── Database.php      # PDO database connection
│   ├── Controllers/          # Application controllers
│   │   ├── BaseController.php # Base controller with render method
│   │   ├── AuthController.php # Authentication logic
│   │   ├── StudentController.php # Student CRUD operations
│   │   └── ReportController.php # Report generation
│   ├── Models/               # Entity models
│   │   ├── User.php          # User entity
│   │   ├── Student.php       # Student entity
│   │   ├── Mark.php          # Mark entity
│   │   └── Attendance.php    # Attendance entity
│   ├── Repositories/         # Data access layer
│   │   ├── StudentRepository.php # Student CRUD operations
│   │   ├── MarkRepository.php # Mark operations
│   │   └── AttendanceRepository.php # Attendance operations
│   └── Services/             # Business logic services
│       └── AuthService.php   # Authentication service
├── views/                    # Presentation layer
│   ├── layout.php           # Main layout template
│   ├── auth/                # Authentication views
│   ├── students/            # Student management views
│   ├── marks/               # Marks management views
│   ├── attendance/          # Attendance views
│   └── reports/             # Report views
├── config/                  # Configuration files
│   └── config.php           # Application configuration
├── bootstrap/               # Application bootstrap
│   └── init.php             # Database initialization & seeding
└── storage/                 # Data storage
    └── database.sqlite      # SQLite database (auto-created)
```

### **Key Design Patterns**
- **MVC Pattern**: Separation of concerns
- **Repository Pattern**: Data access abstraction
- **Service Layer**: Business logic encapsulation
- **Dependency Injection**: Loose coupling
- **Template Method**: Base controller with render method

## 🎯 Usage Guide

### **Adding Students**
1. Login with admin credentials
2. Click "Add Student" button
3. Fill in student details (name, email, phone, address)
4. Save the student record

### **Managing Marks**
1. Navigate to student list
2. Click "Marks" button for a student
3. Add subject, score, and max score
4. View performance indicators and percentages

### **Tracking Attendance**
1. Navigate to student list
2. Click "Attendance" button for a student
3. Select date and mark Present/Absent
4. View attendance percentage and status

### **Generating Reports**
1. Use navigation menu to access reports
2. **Marks Report**: View average performance per student
3. **Attendance Report**: View attendance percentages and status

## 🛠️ Technical Details

### **Database Schema**
- **users**: Authentication data
- **students**: Student information
- **marks**: Subject-wise marks with scoring
- **attendance**: Daily attendance records

### **Security Features**
- Password hashing with bcrypt
- SQL injection prevention with prepared statements
- XSS protection with htmlspecialchars
- Session-based authentication

### **UI/UX Features**
- Responsive CSS Grid and Flexbox layouts
- CSS custom properties for theming
- Hover effects and transitions
- Accessibility-friendly design
- Mobile-first responsive design

## 📝 Notes

- **Educational Project**: Demonstrates OOP, MVC, routing, and modern PHP practices
- **Zero Configuration**: SQLite database auto-created on first run
- **Production Ready**: Includes security best practices and error handling
- **Extensible**: Clean architecture allows easy feature additions

## 🔧 Customization

### **Styling**
- Modify CSS variables in `views/layout.php` for theme changes
- Update color schemes in `:root` CSS variables
- Customize icons by changing Font Awesome classes

### **Features**
- Add new controllers in `app/Controllers/`
- Create new models in `app/Models/`
- Implement new repositories in `app/Repositories/`
- Add new views in `views/` directory

---

**Built with ❤️ using PHP, OOP, and modern web technologies**


