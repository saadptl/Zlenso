# Zlenso - E-Commerce Web Application

A full-featured e-commerce platform built with PHP, MySQL (PDO), Bootstrap, and JavaScript. Designed as a Bachelor's capstone project, Zlenso provides a complete end-to-end online shopping experience for customers along with a comprehensive administration dashboard for store owners.

---

## 🌟 Key Features

### 🛍️ Customer Experience
- **Product Catalog & Browsing**: Multi-level category filtering, search functionality, featured products, latest arrivals, and popular items.
- **Product Details**: Multi-image galleries, size & color selectors, stock availability, pricing, and product descriptions.
- **Shopping Cart**: Real-time cart management, item quantity updates, and cart deletion.
- **Checkout & Multi-Payment Options**:
  - Cash on Delivery (COD)
  - Bank Transfer
  - PayPal Integration
- **Customer Account Portal**:
  - Registration & login with CSRF protection and password hashing (MD5).
  - Profile management, password updates, and billing/shipping address management.
  - Order history tracking and payment status review.
- **Responsive Design**: Mobile-friendly layout powered by Bootstrap and jQuery.

### ⚙️ Admin Dashboard
- **Product Management**: Add, update, and manage products, image uploads, product variations (sizes, colors), and inventory.
- **Order Management**: Track customer orders, update shipping and payment statuses.
- **Category Management**: Top-level, mid-level, and end-level category hierarchies.
- **Site Settings & Customization**: Manage banners/sliders, FAQs, contact details, social links, and SEO metadata.

---

## 🛠️ Technology Stack

- **Backend**: PHP (PDO for secure database interactions)
- **Database**: MySQL / MariaDB
- **Frontend**: HTML5, CSS3, JavaScript, jQuery, Bootstrap
- **Icons & Styling**: Font Awesome, Ionicons
- **Payment Modules**: PayPal, Bank Transfer, COD

---

## 🚀 Getting Started

### Prerequisites
- [XAMPP](https://www.apachefriends.org/) or [WampServer](https://www.wampserver.com/) (recommended PHP 7.4 / 8.x)
- MySQL / MariaDB

### Installation & Setup

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/saadptl/Zlenso.git
   ```

2. **Move to Web Root**:
   Move or copy the project folder to your web server's root directory:
   - For XAMPP: `C:/xampp/htdocs/Zlenso`
   - For WAMP: `C:/wamp64/www/Zlenso`

3. **Import Database**:
   - Open **phpMyAdmin** (`http://localhost/phpmyadmin`).
   - Create a new database named `ecommerceweb`.
   - Import the SQL dump located at:
     ```
     DATABASE FILE/ecommerceweb.sql
     ```

4. **Configure Database Connection**:
   Update `admin/inc/config.php` if your local MySQL settings differ:
   ```php
   $dbhost = 'localhost';
   $dbname = 'ecommerceweb';
   $dbuser = 'root';
   $dbpass = '';
   ```

5. **Run the Project**:
   - Start Apache and MySQL services in XAMPP/WAMP.
   - Open your browser and navigate to:
     - **Storefront**: `http://localhost/Zlenso`
     - **Admin Panel**: `http://localhost/Zlenso/admin`

---

## 🔑 Default Credentials

- **Admin Portal**: `http://localhost/Zlenso/admin`
  - **Email**: `admin@mail.com`
  - **Password**: `Password@123`

---

## 📄 License
This project was developed for academic purposes as a Bachelor's project.
