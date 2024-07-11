# Project Documentation

## Overview

This project is a comprehensive web application designed for a car dealership named AutoGallery. It facilitates both the dealership's management and its customers through various functionalities such as user authentication, URL shortening for marketing purposes, and customer inquiries about buying or selling cars.

### Technologies Used

- **PHP**: Server-side scripting for handling backend logic, including session management, user authentication, and database interactions.
- **JavaScript**: Used on the client side to enhance user interaction, particularly in form handling and UI toggling.
- **HTML/CSS**: Structure and styling of the web application's pages.

### Key Features

1. **User Authentication**: Allows users to register, log in, and log out. Sessions are managed securely with PHP to ensure that user data is protected.
2. **URL Shortener**: An admin-only feature that enables the creation of shortened URLs for easier sharing and tracking.
3. **Car Enquiry Form**: A dynamic form that lets potential buyers or sellers submit inquiries about cars. The form's state changes based on the user's intent (buying or selling), which is handled through JavaScript.

### File Structure

- `index.php`: The landing page that provides users with the option to log in or register.
- `main.php`: The main dashboard that users see after logging in, showcasing various cars available at AutoGallery.
- `enquiryform.php`: Contains the car enquiry form for users interested in buying or selling cars.
- `urlshortener.php`: A page accessible only by admins for creating shortened URLs.
- `includes/`:
  - `config_session.inc.php`: Configures session parameters for enhanced security.
  - `dbh.inc.php`: Handles the database connection.
  - `login/`:
    - `login.inc.php`: Processes user login requests.
    - `login_view.inc.php`: Contains the HTML form for user login.
  - `logout.inc.php`: Handles user logout.
  - `register/`:
    - `register.inc.php`: Processes user registration requests.
    - `register_view.inc.php`: Contains the HTML form for user registration.
  - `urlshortener.inc.php`: Backend script for creating and managing shortened URLs.

### Security Measures

- Sessions are configured to use cookies only, with strict mode enabled to prevent the use of uninitialized session IDs.
- Passwords are hashed before being stored in the database, ensuring that user credentials are securely managed.
- Input validation is performed both on the client and server sides to mitigate the risks of SQL injection and cross-site scripting (XSS).

### Setup and Installation

1. Clone the repository to your local machine.
2. Set up a PHP server environment (e.g., XAMPP, WAMP, MAMP, or LAMP).
3. Import the provided SQL file into your MySQL database to create the necessary tables.(not necessary)
4. Configure the database connection in `includes/dbh.inc.php` with your database credentials.
5. Access the project by navigating to `localhost/[project_folder_name]` in your web browser.

### Contributing

Contributions to the project are welcome. Please follow the standard fork-and-pull request workflow. Ensure that your code adheres to the project's coding standards and include detailed descriptions of any changes made.

### License
No license