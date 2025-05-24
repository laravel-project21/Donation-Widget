## About Donation Widget Project

This project is a donation widget built with Laravel 11 that integrates with Stripe using test credentials and supports connected accounts (Stripe Connect).

## Requirements
- PHP 8.2+
- Laravel 11
- Composer
- MySQL/SQLite
- Stripe account (test mode)

## Setup Instructions
1. **Clone the repository**
   - git clone https://github.com/laravel-project21/Donation-Widget.git
   - cd laravel-donation-widget

2. **Install dependencies**
   - composer install
   - npm install && npm run dev
  
3. **Set up .env file**
   
   Copy .env.example to .env and update the following:

   APP_NAME="Donation Widget"
   
   APP_URL=http://localhost:8000

   DB_CONNECTION=mysql
   
   DB_HOST=127.0.0.1
   
   DB_PORT=3306
   
   DB_DATABASE=laravel
   
   DB_USERNAME=root
   
   DB_PASSWORD=
   
   STRIPE_KEY=your_test_publishable_key
   
   STRIPE_SECRET=your_test_secret_key

4. **Run Migrations**

   php artisan migrate

5. **Start the Server**

   php artisan serve

## Assumptions
- Using Stripe test mode (no real money is processed).
- This project assumes Stripe Connect (Standard or Express accounts) is used for connected accounts.
- Donors are not required to log in; donation is done via a simple widget form.
- Each donation is linked to a Stripe connected account via account_id.
   
