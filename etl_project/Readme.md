# ETL Project - User Data Processing

## Overview

This project demonstrates a simple Extract, Transform, Load (ETL) process using PHP and MySQL. It is designed to extract user data from a CSV file, perform basic data cleaning, and load the data into a MySQL database. This project is useful for understanding the basics of ETL operations and can be expanded to include more complex transformations or additional data sources such as APIs.

## Requirements

- XAMPP (or any other local server stack that includes Apache, MySQL, PHP)
- PHPMyAdmin for managing the MySQL database
- Access to the command line or terminal (for database setup)

## Setup Instructions

### 1. Environment Setup

Ensure that XAMPP is installed and running. Start the Apache and MySQL modules from the XAMPP control panel.

### 2. Database Configuration

- Open PHPMyAdmin from your browser (usually accessible at `http://localhost/phpmyadmin`).
- Create a new database named `etl_database`.
- Execute the following SQL command to create the `users` table:

```sql
CREATE TABLE users (
    user_id INT PRIMARY KEY,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    location VARCHAR(255) DEFAULT NULL,
    age INT DEFAULT NULL
);
```

### 3. Project Files Setup

- Clone the repository or download the project files to your local machine.
- Place the project folder in your XAMPP `htdocs` directory.
- Ensure the project structure is as follows:

```
/etl_project
    /index.php
    /db.php
    /etl.php
    /userdata.csv (your CSV file with user data)
```

## How to Run the Project

1. Open your web browser and navigate to `http://localhost/etl_project/index.php`.
2. You will see a simple webpage with a button labeled "Start ETL Process".
3. Click the button to initiate the ETL process. The system will read data from `userdata.csv`, clean it, and insert it into the MySQL database.
4. Once the process is complete, a message "ETL Process has been completed successfully." will be displayed.

## Project Structure

- **index.php** - The main entry point of the web application. It includes a form that triggers the ETL process.
- **db.php** - Contains the database connection setup.
- **etl.php** - Handles the logic for extracting, transforming, and loading the data.
- **userdata.csv** - A sample CSV file containing user data to be processed.
