# BQ Company Limited — PHP + MySQL Reference Website

A small database-driven organizational website for learning how front end, PHP back end and MySQL work together.

## Stack
HTML + CSS + JavaScript + PHP + MySQL/SQL

## Setup with XAMPP
1. Install XAMPP.
2. Start Apache and MySQL.
3. Put this folder inside `C:\xampp\htdocs\`.
4. Open phpMyAdmin.
5. Import `database.sql`.
6. Visit `http://localhost/bq-company/`.

## Admin demo
URL: `http://localhost/bq-company/admin/login.php`
Username: `admin`
Password: `bq12345`

These credentials are for local learning only. Change authentication before production use.

## Project flow
Browser → HTML/CSS/JavaScript → PHP → MySQL → PHP → Browser

## Files
- `index.php` — public website
- `database.php` — MySQL connection
- `database.sql` — database and sample data
- `style.css` — responsive design
- `script.js` — mobile navigation
- `admin/login.php` — demo login
- `admin/dashboard.php` — edit company, add/delete services
- `admin/logout.php` — logout

## Learning goals
Use this project to understand dynamic database-driven websites and CRUD operations.

For production, add password hashing, CSRF protection, stronger authentication, validation, HTTPS, secure environment variables and backups.
