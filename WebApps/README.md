# PaperTrail Book Store

## Project Overview
PaperTrail is an online book store built with PHP that enables users to browse books, create an account to view exclusive member books, manage their account information and add and remove items to a shopping cart.  

## Key Features
* User Authentication (Sign up, Sign in, Sign out)
* Session Management
* Account Management (View, Update, Delete)
* Shopping Cart Functionality
* Restricted Member-only and unrestricted Non-Member Book Sections

## Learning Implementation
This project uses numerous concepts from the Web Application Development module. Focusing on PHP session management, authentication, and CRUD operations.

## Session Management
The application uses PHP sessions to manage user states across the site, as taught in the "Login with Sessions" lab sheet by Dr Robert Smith:
* Session initialization in Views/Layouts/Header.php
* Session destruction during logout in Controllers/sign_out_process.php
* Session usage for cart management in Models/cart.php

## User Authentication
The login system was built with reference to the lab "Login with Sessions labsheet 2023" by Dr Robert Smith:
* Login verification in Controllers/sign_in_process.php
* Access control for member-only pages in Views/membersBooks.php
* Session-based authentication checks throughout the application

## Database Connectivity
Database connections use PDO as recommended in the "Building a no-frills PHP CRUD App" tutorial, as taught by Dr Robert Smith:
* Connection established in Config/DBconnect.php
* Prepared statements for all database interactions to prevent SQL injection
* Separation of connection logic from business logic

## CRUD Operations
The project implements full CRUD functionality as outlined in the lectures Build a no-frills PHP CRUD App with routing – Part 1 & Part 2:
* Create: User registration in Controllers/sign_up_process.php
* Read: Displaying products in Views/Shop.php and Views/membersBooks.php
* Update: User account updates in Controllers/updateAccount.php
* Delete: Account deletion in Controllers/deleteAccount.php

## Input Sanitization
User input is sanitized to prevent XSS attacks as taught in the course:
* Implementation of the escape() function in common.php
* Consistent usage throughout the application

## Shopping Cart Implementation
The Shopping cart was developed based on concepts learned in the Web Application development module, as taught by Dr Robert Smith
* Session Management: The cart uses PHP sessions to store and manage cart data across multiple web pages. This implementation applied the session handling methods taught in the "Login with Sessions" Lab
* From Processing: The carts operations, add, update and delete, rely on processing data submitted through from using POST method. This uses principals of form handling and POST processing covered in the "Building a no-frills CRUD APP"


## Project Structure
* /Config - Database configuration
* /Controllers - Application logic
* /Database - SQL initialization files
* /Models - Data models
* /Views - User interface files

## Contribution Statement
All work in this project was completed by me individually. The project structure and techniques were built by using course lectures and lab materials, particularly the "Login with Sessions" and "Building a no-frills PHP CRUD App" tutorials provided in the module.

## References
* Course lectures and lab materials from Web Application Development module
   * Build a no-frills PHP CRUD App with routing – part 1 – Dr Robert Smith
   * Build a no-frills PHP CRUD App with routing – part 2 – Dr Robert Smith
   * Login with Sessions labsheet 2023 – Dr Robert Smith
