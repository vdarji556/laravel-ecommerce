# Laravel E-Commerce Website

A full-stack e-commerce web application built with **Laravel, PHP, MySQL, Blade, HTML, CSS, JavaScript and Bootstrap**.

This project includes customer authentication, product browsing, shopping cart, checkout, order management and a complete admin panel for managing products, categories, customers and orders.

---

## 🚀 Features

### 👤 Customer Features

- Customer Registration
- Customer Login / Logout
- Browse Products
- Browse Products by Category
- Product Details
- Multiple Product Images
- Product Price and Sale Price
- Product Stock
- Add Product to Cart
- Update Cart Quantity
- Remove Product from Cart
- Cart Subtotal
- Login Required Before Checkout
- Checkout Form
- COD Payment Option
- Online Payment Method Selection
- Place Order
- My Orders
- Order Details
- Order Status Tracking

---

## 🔐 Admin Panel

The project includes a separate admin panel for managing the e-commerce website.

### Admin Dashboard

- Total Categories
- Total Products
- Total Orders
- Total Customers
- Pending Orders
- Processing Orders
- Delivered Orders
- Quick Actions

### Category Management

- Add Category
- View Categories
- Edit Category
- Delete Category
- Category Image Upload
- Category Description
- Active / Inactive Status

### Product Management

- Add Product
- View Products
- Edit Product
- Delete Product
- Product Image Upload
- Multiple Product Images
- Delete Individual Product Images
- Product Category
- SKU
- Price
- Sale Price
- Stock Management
- Active / Inactive Status

### Order Management

- View All Orders
- View Order Details
- Customer Information
- Delivery Address
- Ordered Products
- Order Total
- Payment Method
- Payment Status
- Update Order Status

Order statuses:

- Pending
- Processing
- Shipped
- Delivered
- Cancelled

### Customer Management

- View All Customers
- Customer Name
- Email
- Phone
- Registration Date
- Total Orders
- Customer Details
- View Customer Orders

---

## 🛠️ Technologies Used

### Backend

- PHP
- Laravel

### Frontend

- Blade
- HTML5
- CSS3
- JavaScript
- Bootstrap
- Bootstrap Icons

### Database

- MySQL

### Development Environment

- XAMPP
- Composer
- Git
- GitHub

---

## 📂 Project Structure

```text
laravel-ecommerce/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   └── MainController.php
│   │   │
│   │   └── Middleware/
│   │
│   └── Models/
│
├── bootstrap/
│
├── config/
│
├── database/
│   └── migrations/
│
├── public/
│   └── uploads/
│       ├── categories/
│       └── products/
│
├── resources/
│   └── views/
│       ├── admin/
│       └── ...
│
├── routes/
│   └── web.php
│
├── storage/
│
├── tests/
│
├── .env.example
├── artisan
├── composer.json
└── README.md
