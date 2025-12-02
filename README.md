Laravel E-Commerce Website (Clothing Store)

A modern, minimal, and scalable Laravel-based e-commerce application designed for clothing products. The project includes an admin panel for product management and a WhatsApp-based checkout flow. Built with clean code structure and ready for future expansion to multiple product types.

Features
Storefront

Responsive and modern UI

Product listing with images, prices, and details

Category-wise filtering

WhatsApp checkout (auto pre-filled order message)

Admin Panel

Product CRUD (Add / Edit / Delete)

Category management

Image upload

Stock and pricing controls

Code & Architecture

Clean Laravel MVC structure

Scalable for multi-product e-commerce

Organized migrations, models, controllers, and views

Tech Stack

Laravel 10+

PHP 8+

MySQL

Blade + Tailwind CSS

Composer & NPM

WhatsApp checkout using pre-filled message URL

Installation & Setup
1. Clone the repository
git clone https://github.com/your-username/your-repo.git
cd your-repo

2. Install backend dependencies
composer install

3. Install frontend dependencies
npm install
npm run dev

4. Environment setup
cp .env.example .env


Update your database name, username, password in .env.

5. Generate app key
php artisan key:generate

6. Run migrations
php artisan migrate

7. Start development server
php artisan serve


Your app will be available at:
http://127.0.0.1:8000

WhatsApp Checkout Flow

When the user clicks “Order on WhatsApp”, a pre-filled message is generated:

Hello, I want to order:
Product: {Product Name}
Price: ₹{Price}
Quantity: {Qty}


This redirects the user to WhatsApp with the message ready to send.

Project Structure
app/
  Http/
  Models/
database/
  migrations/
resources/
  views/
  css/
  js/
routes/
  web.php
public/

Future Improvements

Cart and checkout system

Online payment gateway

User accounts & order history

Discount coupons

Multi-vendor support

License

This project is open-source and free to use.