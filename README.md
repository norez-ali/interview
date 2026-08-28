# Subscription Management System

A Laravel 13 application that provides user authentication, subscription plan management, and Stripe payment integration.

The project demonstrates Laravel CRUD operations, authentication with Laravel Breeze, database migrations and seeders, and integration with Stripe Checkout for processing payments in Stripe Test Mode.

---

## Features

- User Registration
- User Login / Logout
- Authentication using Laravel Breeze
- Subscription Plan Management
- Create Subscription Plans
- View Subscription Plans
- Edit Subscription Plans
- Delete Subscription Plans
- Stripe Checkout Payment Integration
- Stripe Test Mode Payment
- Payment Success Handling
- Payment Cancellation Handling
- MySQL Database
- Database Seeder with sample subscription plans

---

## Technologies Used

- **Laravel 13**
- **PHP**
- **MySQL**
- **Laravel Breeze**
- **Blade**
- **Tailwind CSS**
- **Stripe Checkout**
- **Composer**
- **Node.js / npm**
- **Vite**

---

## Requirements

Make sure the following are installed on the system:

- PHP 8.2 or higher
- Composer
- Node.js
- npm
- MySQL
- Git

A Stripe account is also required for payment testing.

---

## Installation & Setup

### 1. Clone the Repository

```bash
git clone <repository-url>
```

Navigate into the project:

```bash
cd <project-folder>
```

---

### 2. Install PHP Dependencies

```bash
composer install
```

---

### 3. Install Frontend Dependencies

```bash
npm install
```

---

### 4. Configure Environment

Create the `.env` file from `.env.example`.

```bash
cp .env.example .env
```

For Windows, you can also manually copy `.env.example` and rename it to `.env`.

The required environment configuration will be provided separately along with the project.

The `.env` file contains:

- Application configuration
- Database configuration
- Stripe configuration

---

### 5. Generate Application Key

```bash
php artisan key:generate
```

---

### 6. Create MySQL Database

Create a MySQL database and configure the database credentials in `.env`.

Example:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=interview
DB_USERNAME=root
DB_PASSWORD=
```

---

### 7. Run Database Migrations

```bash
php artisan migrate
```

This will create all required database tables.

---

### 8. Run Database Seeder

The project includes a `SubscriptionPlanSeeder` that inserts sample subscription plans into the database.

Run:

```bash
php artisan db:seed
```

The seeder creates sample plans such as:

- Basic
- Standard
- Premium
- Business
- Enterprise

---

### 9. Start Laravel Development Server

```bash
php artisan serve
```

The application will be available at:

```text
http://127.0.0.1:8000
```

---

### 10. Start Vite

In a separate terminal:

```bash
npm run dev
```

Keep Vite running during development.

---

## Default Application Flow

### Registration

A new user can register through the Laravel Breeze registration page.

### Login

After registration, the user can log in using their credentials.

### Dashboard

After successful authentication, the user is redirected to the dashboard.

From the dashboard, the user can access:

**Manage Subscriptions**

---

## Subscription Plan Management

The subscription management section provides CRUD functionality.

Each subscription plan contains:

| Field         | Description                    |
| ------------- | ------------------------------ |
| Name          | Name of the subscription plan  |
| Monthly Price | Price associated with the plan |

Available operations:

- View all plans
- Create a plan
- Edit a plan
- Delete a plan
- Make a payment for a plan

---

## Stripe Payment Integration

The application uses **Stripe Checkout** for payment processing.

The integration is configured for **Stripe Test Mode**, so no real payment is processed.

When a user selects a subscription plan:

```text
Select Plan
    ↓
Click Pay
    ↓
Laravel creates Stripe Checkout Session
    ↓
User is redirected to Stripe Checkout
    ↓
Test Payment
    ↓
Successful Payment
    ↓
Redirect back to Laravel
```

The Stripe credentials are provided separately in the `.env` file.

---

## Stripe Test Card

For testing a successful payment, use:

```text
Card Number: 4242 4242 4242 4242
Expiry Date: Any future date
CVC: Any 3 digits
ZIP / Postal Code: Any valid value
```

This card works only in Stripe Test Mode and does not charge real money.

---

## Useful Artisan Commands

### Run migrations

```bash
php artisan migrate
```

### Run seeders

```bash
php artisan db:seed
```

### Run a specific seeder

```bash
php artisan db:seed --class=SubscriptionPlanSeeder
```

### Reset database and run migrations

```bash
php artisan migrate:fresh
```

### Reset database and run migrations + seeders

```bash
php artisan migrate:fresh --seed
```

### Clear application cache

```bash
php artisan optimize:clear
```

### List application routes

```bash
php artisan route:list
```

### Start Laravel server

```bash
php artisan serve
```

---

## Frontend Commands

Install frontend dependencies:

```bash
npm install
```

Run Vite development server:

```bash
npm run dev
```

Build frontend assets for production:

```bash
npm run build
```

---

---

## Complete Setup Commands

After cloning the repository, the complete setup can be performed using:

```bash
composer install
npm install
php artisan key:generate
php artisan migrate
php artisan db:seed
```

Then start the application:

```bash
php artisan serve
```

And in another terminal:

```bash
npm run dev
```

Open:

```text
http://127.0.0.1:8000
```

---

## Environment Configuration

The `.env` file will be provided separately.

It contains the required configuration for:

- Application
- MySQL database
- Stripe Test Mode

Please ensure the provided `.env` file is placed in the root directory of the project before running the application.

---

## Notes

- The application uses Stripe **Test Mode** for payment testing.
- No real transactions are processed.
- Database sample data is provided through Laravel seeders.
- Laravel Breeze is used for authentication.
- Subscription plans are managed through standard Laravel CRUD operations.
