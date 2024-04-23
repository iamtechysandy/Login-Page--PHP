# Login-Page-PHP
User and admin login pannel with admin reset password as well change the status


# Login System with PHP and MySQL

A secure and scalable login system implemented using PHP and MySQL. This system provides user authentication with role-based access control, allowing administrators to manage users, roles, and permissions efficiently.

## Features

- **User Authentication:** Authenticate users securely using their email and password.
- **Role-Based Access Control (RBAC):** Differentiate between administrators and regular users, each with their own set of permissions and access levels.
- **Password Security:** Securely store passwords using hashing algorithms to protect user credentials.
- **Database-Driven Management:** Utilize a MySQL database to store user information, roles, and permissions, enabling efficient user management operations.
- **Bootstrap Integration:** Use Bootstrap 5 for a modern and responsive user interface design.

## Installation

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/iamtechysandy/Login-Page--PHP

    Database Setup:
        Import the database.sql file into your MySQL database to create the necessary tables.
        Configure the include/db.php file with your MySQL database credentials.

    Deployment:
        Deploy the project to your web server or localhost environment.
        Access the login page (login.php) in your browser to start using the system.

Usage

    Login: Log in with your registered email and password.
    Administrator Access:
        Administrators will be redirected to the Admin dashboard (admin/home.php).
        Admins can manage users, roles, and permissions, including user creation, role assignment, status changes, and password resets.
    User Access:
        Regular users will be directed to the User dashboard (user/home.php).
        Users can view their dashboard and perform actions based on their assigned roles and permissions.

Contributing

Contributions are welcome! If you have any suggestions, feature requests, or bug reports, please open an issue or submit a pull request.
