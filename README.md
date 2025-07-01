# Ecommerce Platform

*Your one-stop shop for modern online retail.*

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

<p align="center">
  <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
</p>

---

## Project Overview

Ecommerce Platform is a full-featured online store solution built with Laravel, Livewire, and Tailwind CSS. It enables businesses and entrepreneurs to launch a scalable, customizable, and modern web shop. 

- **What is it?** A web application for selling products online.
- **Who is it for?** Small to medium businesses, startups, and developers seeking a Laravel-based ecommerce solution.
- **What problem does it solve?** Provides a ready-to-use, extensible platform for online sales, user management, and order processing.

## Tech Stack

- **Backend:** Laravel 12, PHP 8.2
- **Frontend:** Livewire, Tailwind CSS 4.1, Vite, Preline 3.1.0
- **Database:** SQLite (default, can be changed)
- **Main Libraries:** Filament, Livewire, Axios, Pest (testing)

## Installation & Setup

1. **Clone the repository:**
   ```bash
   git clone <repo-url>
   cd ecommerce
   ```
2. **Install PHP dependencies:**
   ```bash
   composer install
   ```
3. **Install Node.js dependencies:**
   ```bash
   npm install
   ```
4. **Copy environment file:**
   ```bash
   cp .env.example .env
   # If .env.example is missing, create .env manually based on Laravel defaults
   ```
5. **Generate application key:**
   ```bash
   php artisan key:generate
   ```
6. **Run migrations:**
   ```bash
   php artisan migrate
   ```
7. **(Optional) Seed the database:**
   ```bash
   php artisan db:seed
   ```
8. **Start the development servers:**
   ```bash
   npm run dev
   php artisan serve
   ```

## Running Tests

- **PHPUnit:**
  ```bash
  php artisan test
  ```
- **Pest:**
  ```bash
  ./vendor/bin/pest
  ```

## Folder Structure

```
├── app/            # Backend application logic (Models, Http, Livewire, Filament)
├── bootstrap/      # Laravel bootstrap files
├── config/         # Configuration files
├── database/       # Migrations, seeders, factories, SQLite db
├── public/         # Public assets (index.php, images, css, js)
├── resources/      # Views, JS, CSS
├── routes/         # Route definitions (web.php, console.php)
├── tests/          # Unit and feature tests
├── vendor/         # Composer dependencies
```

## Environment & Access

- Configure your `.env` file for database, mail, and other services as needed.
- Default uses SQLite (`database/database.sqlite`).
- For production, set up appropriate DB, mail, and cache drivers.

## Features

- 🛒 Product catalog & detail pages
- 🔍 Product search & filtering
- 🛍️ Shopping cart (add, update, remove, clear)
- 👤 User authentication (register, login, logout)
- 💳 Checkout & order processing
- 📦 Order history & account info
- 🎨 Responsive UI with Tailwind CSS & Preline
- ⚡ Real-time updates with Livewire
- 🧪 Unit & feature tests (PHPUnit, Pest)

## Roadmap

- [ ] Add payment gateway integration
- [ ] Admin dashboard for product management
- [ ] User reviews & ratings
- [ ] API endpoints for mobile apps
- [ ] Multi-language support

## Contributing

Contributions are welcome! Please fork the repo and submit a pull request. 
- Follow [Conventional Commits](https://www.conventionalcommits.org/) for commit messages.
- Ensure all tests pass before submitting.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---
