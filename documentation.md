# Modern Matrimony - Matchmaking Platform Documentation

## Table of Contents
1. [Introduction](#introduction)
2. [Project Setup](#project-setup)
3. [Customization](#customization)
4. [Usage](#usage)
5. [Adding New Features](#adding-new-features)
6. [Troubleshooting](#troubleshooting)

## Introduction
Modern Matrimony is a matchmaking platform designed to help individuals find their perfect match. The platform offers a range of features to facilitate user registration, profile creation, search and matchmaking, communication, and admin management.

## Project Setup
### Prerequisites
- PHP 8+
- MySQL
- Web server (e.g., Apache, Nginx)
- Composer (for dependency management)

### Installation Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/Liyakath1995/matrimony.git
   ```
2. Navigate to the project directory:
   ```bash
   cd matrimony
   ```
3. Set up the database:
   - Create a MySQL database.
   - Import the provided `database.sql` file to set up the schema and sample data.
4. Configure the project:
   - Update the `config.php` file with your database connection settings.
   - Set up email services by configuring PHPMailer in the `config.php` file.
5. Run the project:
   - Start your local server (e.g., using XAMPP or WAMP).
   - Access the project in your browser.

## Customization
### Changing the Visual Design
- Modify the `styles.css` file to change the color scheme, fonts, and layout.
- Update the HTML templates to reflect the desired design changes.

### Adding New Pages
- Create a new HTML file for the page.
- Add the necessary PHP logic to handle the page's functionality.
- Update the navigation links in the header to include the new page.

## Usage
### User Registration
- Users can register by filling out the registration form on the `register.html` page.
- The registration process includes email verification and profile completion.

### Profile Management
- Users can create and manage their profiles using the multi-step form on the `profile.html` page.
- The profile includes personal details, religion/caste preferences, education/career details, family information, and partner preferences.

### Search & Matchmaking
- Users can search for profiles using advanced filters on the `profile-listing.html` page.
- The platform includes a "Suggested Matches" algorithm and match percentage calculator.

### Communication System
- Users can express interest in other profiles and send secure messages.
- The notification center keeps users informed about interactions.

### Admin Features
- Admins can manage user profiles, verify profiles, handle reports, and view analytics on the admin dashboard.

## Adding New Features
### Implementing New Functionality
- Identify the required changes in the database schema, PHP logic, and HTML templates.
- Update the `database.sql` file to include new tables or fields.
- Modify the PHP files to handle the new functionality.
- Update the HTML templates to include the new features.

### Testing New Features
- Ensure that the new features are thoroughly tested before deploying to production.
- Use sample data to test the functionality and identify any issues.

## Troubleshooting
### Common Issues
- Database connection errors: Ensure that the `config.php` file has the correct database connection settings.
- Email verification issues: Verify that PHPMailer is correctly configured in the `config.php` file.
- Profile creation problems: Check that all required fields are filled out and that the form submission is handled correctly.

### Debugging Tips
- Use error logging to identify and troubleshoot issues.
- Check the browser console for JavaScript errors.
- Review the server logs for any PHP errors or warnings.

For further assistance, refer to the project's GitHub repository or contact the support team.
