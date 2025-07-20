# 🛒 BEAUTIFY - Modern Laravel E-commerce Platform

*A comprehensive, feature-rich e-commerce solution built with Laravel, Livewire, and Filament Admin Panel.*

[![Laravel](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://php.net)
[![Livewire](https://img.shields.io/badge/Livewire-3.x-orange.svg)](https://livewire.laravel.com)
[![Filament](https://img.shields.io/badge/Filament-3.x-purple.svg)](https://filamentphp.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind-4.x-38B2AC.svg)](https://tailwindcss.com)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

---

## 📦 Project Overview

**BEAUTIFY** is a modern, full-featured e-commerce platform for fashion and beauty retailers. Built with Laravel 12, Livewire 3, and Filament Admin Panel, it provides a robust solution for online sales, featuring a responsive customer-facing website and a powerful admin dashboard. The platform supports product management, order fulfillment, user management, analytics, and more.

---

## 🔧 Features List

### 🛍️ Customer-Facing
- SEO-optimized homepage with featured products, categories, and promotions
- Advanced product search (autocomplete, filtering, rating filter)
- Responsive product catalog (pagination, sorting, grid/list view)
- Product detail pages (image galleries, reviews, variants)
- Persistent shopping cart (session & database, auto-merge on login)
- Secure checkout (COD & PayPal, order confirmation, address management)
- User account management (profile, order history, wishlist)
- Customer reviews & ratings (verified purchase, admin approval)
- Blog/articles section
- Newsletter subscription
- Progressive Web App (PWA) features
- Mobile-first, dark/light mode, smooth animations

### 🛠️ Admin Panel (Filament)
- Dashboard with sales analytics and key metrics
- Product management (CRUD, images, variants, categories, brands)
- Category & brand management (hierarchical)
- Order management (status tracking, fulfillment, invoices)
- User management (roles, permissions, activity monitoring)
- Content management (articles, blog posts, SEO tools)
- Review management (approval system)
- Sales reports and analytics
- Separate admin authentication and session

### ⚙️ Technical
- Authentication & authorization (multi-guard, role-based)
- Real-time interactions (Livewire)
- Advanced search & filtering
- SEO optimization (meta tags, OpenGraph, schema.org)
- Image management (optimization)
- Database seeding with sample data
- Testing suite (PHPUnit, Pest)
- Redis support for cache/session (recommended)

---

## 🧱 Tech Stack
- **Backend:** Laravel 12, PHP 8.2+
- **Frontend:** Livewire 3, Blade, Tailwind CSS 4.x, Preline UI, Vite
- **Admin Panel:** Filament 3.x
- **Database:** MySQL 8.0+, PostgreSQL 13+, or SQLite (dev)
- **Cache/Queue:** Redis (recommended)
- **Other:** Composer, Node.js 18+, npm, PHPUnit, Pest

---

## 🖥️ Installation & Setup

### Prerequisites
- PHP 8.2+
- Composer 2.0+
- Node.js 18+
- npm 9+
- MySQL 8.0+ / PostgreSQL 13+ / SQLite (dev)
- Git

### Steps
1. **Clone the Repository**
   ```bash
   git clone <your-repository-url>
   cd ecommerce
   ```
2. **Install PHP Dependencies**
   ```bash
   composer install
   ```
3. **Install Node.js Dependencies**
   ```bash
   npm install
   ```
4. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
5. **Database Configuration**
   - Edit `.env` with your DB credentials
   - For SQLite (dev): `touch database/database.sqlite`
6. **Run Migrations**
   ```bash
   php artisan migrate
   ```
7. **Seed the Database** (optional)
   ```bash
   php artisan db:seed
   ```
8. **Build Frontend Assets**
   ```bash
   npm run build
   ```
9. **Start Development Servers**
   ```bash
   php artisan serve
   npm run dev
   ```
10. **Access**
    - Customer: http://localhost:8000
    - Admin: http://localhost:8000/admin
    - Default admin: see `database/seeders/AdminSeeder.php`

### .env Keys (required, do not expose secrets)
```
APP_NAME=BEAUTIFY
APP_ENV=local
APP_KEY=...
APP_URL=http://localhost
DB_CONNECTION=mysql|pgsql|sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db
DB_USERNAME=your_user
DB_PASSWORD=your_pass
MAIL_MAILER=smtp
MAIL_HOST=...
MAIL_PORT=587
MAIL_USERNAME=...
MAIL_PASSWORD=...
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@yourdomain.com
# Admin session (see docs/SEPARATE_SESSIONS.md)
ADMIN_SESSION_DRIVER=database
ADMIN_SESSION_TABLE=admin_sessions
```

---

## 🔑 Access & Roles
- **User roles:** `customer`, `admin` (see `users.role` column)
- **Frontend:** Standard Laravel auth (`web` guard), routes like `/checkout`, `/account` require login
- **Admin Panel:** Separate `admin` guard/session, `/admin` protected by `AdminAccess` middleware
- **Session isolation:** User and admin can be logged in simultaneously (see `docs/SEPARATE_SESSIONS.md`)
- **Role management:** Only `admin` can access Filament panel and admin routes

---

## 💳 Payment Integration
- **Supported:** Cash on Delivery (COD), PayPal (simulated)
- **Checkout:** Payment method selection at checkout; PayPal is simulated for demo purposes
- **Admin:** Order resource supports multiple payment methods (see `app/Filament/Resources/OrderResource.php`)

---

## 🌐 Environment & Versions
- **PHP:** 8.2+
- **Laravel:** 12.x
- **Node.js:** 18+
- **npm:** 9+
- **MySQL:** 8.0+ / PostgreSQL 13+ / SQLite 3
- **Filament:** 3.x
- **Livewire:** 3.x
- **Tailwind CSS:** 4.x
- **Redis:** recommended for cache/session
- **OS:** Linux, macOS, Windows 10+ (dev)
- **Browsers:** Latest Chrome, Firefox, Safari, Edge

---

## 📁 Folder Structure
```
ecommerce/
├── app/
│   ├── Filament/         # Admin panel resources
│   ├── Http/             # Controllers, middleware
│   ├── Livewire/         # Livewire components
│   ├── Models/           # Eloquent models
│   └── Providers/        # Service providers
├── database/
│   ├── migrations/       # DB migrations
│   ├── seeders/          # DB seeders
│   └── factories/        # Model factories
├── resources/
│   ├── views/            # Blade templates
│   ├── css/              # Stylesheets
│   └── js/               # JavaScript
├── routes/               # Route definitions
├── public/               # Public assets
├── storage/              # File storage
└── ...
```

---

## 🛡️ Security Practices
- **Authentication:** Laravel guards for user/admin, hashed passwords
- **Authorization:** Role-based access, middleware for route protection
- **Validation:** All forms validated server-side (see controllers)
- **CSRF:** Enabled by default (see `VerifyCsrfToken` middleware)
- **Email verification:** Supported for users
- **Session isolation:** Separate sessions for admin/user
- **Cart security:** Cart items validated, user can only access own cart
- **Data protection:** Sensitive data hidden in models, `.env` excluded from VCS
- **Testing:** Feature tests for auth, cart, multi-guard, etc.

---

## 🚀 Deployment Notes
- **Production build:**
  ```bash
  composer install --optimize-autoloader --no-dev
  npm install
  npm run build
  cp .env.example .env # Edit for production
  php artisan migrate --force
  php artisan config:cache
  php artisan route:cache
  php artisan view:cache
  ```
- **Web server:** Nginx or Apache recommended
- **Cache:** Use Redis for sessions/cache in production
- **Storage:** Run `php artisan storage:link` for public file access
- **Environment:** Set `APP_ENV=production`, `APP_DEBUG=false`

---

## 👤 Authors / Contributors

- [Your Name Here]
- [Contributors...]

---

## 📚 Documentation & Support
- **Docs:** See code comments, `docs/` folder
- **Issues:** Use GitHub Issues for bugs/requests
- **Discussions:** GitHub Discussions for Q&A

---

**Made with ❤️ for the Laravel community**
