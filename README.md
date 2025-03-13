# 📦 Inventory Management System

This project is an **Laravel-based** inventory management system that allows you to manage products, suppliers, customers, stock entries, and exits, with a user-friendly interface and real-time charts.

## 🚀 Features

- Full CRUD for **Users, Customers, Suppliers, and Products**.
- **Stock Entries and Exits** management with validations.
- Dashboard with **Chart.js** visualizations.
- SoftDeletes support for restoring deleted items.
- Responsive design with **Tailwind CSS**.
- Built with **Laravel Jetstream** and **Livewire** for authentication, user management, and interactive UI components.

![welcome](https://github.com/user-attachments/assets/0ce0a73a-6a14-4d3e-9668-6a451d199f4a)
![dashboard](https://github.com/user-attachments/assets/51024722-d5fa-4b5c-8be3-23ffc43cf7a3)



## 📌 Requirements

Before installing the project, make sure you have:

- PHP 8.x
- Composer
- Node.js and NPM
- MySQL or PostgreSQL

## 🛠 Installation

Follow these steps to set up the project in your environment:

1. Clone the repository:
   ```bash
   git clone https://github.com/cawtoz/stocket.git
   cd stocket
   ```
2. Install PHP and Node.js dependencies:
   ```bash
   composer install
   npm install && npm run build
   ```
3. Configure environment variables:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Set up the database in the `.env` file:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```
5. Run migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```
6. Compile frontend assets (Jetstream & Livewire):
   ```bash
   npm run dev
   ```
7. Start the server:
   ```bash
   php artisan serve
   ```

## 📂 Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── ProductController.php
│   │   ├── SupplierController.php
│   │   ├── CustomerController.php
│   │   ├── StockEntryController.php
│   │   ├── StockExitController.php
│   │   ├── DashboardController.php
├── Models/
│   ├── Product.php
│   ├── Supplier.php
│   ├── Customer.php
│   ├── StockEntry.php
│   ├── StockExit.php
resources/
├── views/
│   ├── dashboard.blade.php
│   ├── products/
│   ├── suppliers/
│   ├── customers/
│   ├── entries/
│   ├── exits/
```
