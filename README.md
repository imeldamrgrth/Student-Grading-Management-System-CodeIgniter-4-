# Student Grading Management System (CodeIgniter 4)

## Overview
A simple web-based application built using CodeIgniter 4 to manage student academic grades.
This system allows users to input, calculate, update, and manage student scores, including
final grades and pass/fail status, using a structured MVC architecture.

---

## Features
- Input student grades (UTS, UAS, Praktikum)
- Automatic final score calculation
- Grade and pass/fail status determination
- View, edit, and delete student records
- MVC (Model-View-Controller) architecture
- MySQL database integration

---

## Tech Stack
- PHP 8+
- CodeIgniter 4
- MySQL
- HTML / CSS
- Bootstrap

---

## Project Structure
- **Controllers**: Handle user requests and application flow
- **Models**: Manage database operations and grading logic
- **Views**: Handle user interface and data presentation
- **Public**: Store public assets such as CSS and images

---

## Configuration
The application requires a database connection to run properly.
Create a `.env` file in the project root and define your database credentials
according to your local environment.

Example:
```env
database.default.hostname = localhost
database.default.database = your_database_name
database.default.username = your_db_username
database.default.password = your_db_password
database.default.DBDriver = MySQLi
database.default.port = 3306

```

## Setup & Configuration
1. Clone this repository
2. Create and configure the `.env` file
3. Import the database schema into your MySQL database
4. Run the project using a local server (XAMPP, Laragon, or similar)
5. Access the application via `http://localhost:8080`

---

## Notes
This project was developed as an academic assignment to demonstrate
CRUD operations and MVC architecture using CodeIgniter 4.



