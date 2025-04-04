# Modern Matrimony - Matchmaking Platform

## Description
Modern Matrimony is a matchmaking platform designed to help individuals find their perfect match. The platform offers a range of features to facilitate user registration, profile creation, search and matchmaking, communication, and admin management.

## Core Requirements
- User Roles:
  - Seekers (Regular Users)
  - Admin Panel

## Essential Pages
- Homepage (Hero section, Featured Profiles, Statistics)
- Registration/Login (With email verification)
- User Profile Creation (Multi-step form)
- Profile Listing Page (With filters)
- Profile Detail Page
- Dashboard (User & Admin)
- Contact/Support Page

## Key Features
### User Registration
- Secure password hashing
- Email verification workflow
- Profile completion progress indicator

### Profile Management
- Personal Details (Name, Age, Gender)
- Religion/Caste Preferences
- Education/Career Details
- Family Information
- Partner Preferences
- Photo Gallery (With privacy controls)

### Search & Matchmaking
- Advanced filters (Age, Location, Religion, Profession)
- "Suggested Matches" algorithm
- Shortlist/Bookmark profiles
- Match Percentage Calculator

### Communication System
- Interest Expressing system
- Secure messaging system
- Notification center

### Admin Features
- User management (Activate/Deactivate profiles)
- Profile verification system
- Report management
- Analytics dashboard

## Technical Specifications
- Responsive Bootstrap layout
- MySQL Database Schema with:
  - Users table
  - Profiles table
  - Matches/Connections table
  - Messages table
  - Preferences table
- PHP OOP approach with MVC pattern
- AJAX form submissions
- Session-based authentication
- File upload handling (Profile pictures)

## Security Requirements
- SQL injection prevention
- XSS protection
- CSRF tokens
- Password reset functionality
- Role-based access control

## Special Components
- Compatibility percentage calculator (JS-based)
- Profile completeness meter
- Image slider for profile photos
- Data visualization charts for admin

## Additional Features
- Premium membership system
- Mobile app-like interface
- Dark/Light mode toggle
- Multi-language support scaffold

## Deliverables Requested
- Complete HTML/CSS template with Bootstrap components
- PHP backend logic with proper security measures
- MySQL database schema with relationships
- Sample AJAX implementations for dynamic features
- Admin panel interface
- Documentation for customization

## Visual Preferences
- Clean, professional design
- Pastel color scheme
- Easy navigation
- Mobile-first approach
- Accessibility compliant

## Special Notes
- Include PHPMailer integration for email services
- Implement jQuery for AJAX functionality
- Use prepared statements for all database operations
- Include pagination for profile listings
- Create search filter persistence in URLs

## Setup Instructions
1. Clone the repository: `git clone https://github.com/Liyakath1995/matrimony.git`
2. Navigate to the project directory: `cd matrimony`
3. Set up the database:
   - Create a MySQL database.
   - Import the provided `database.sql` file to set up the schema and sample data.
4. Configure the project:
   - Update the `config.php` file with your database connection settings.
   - Set up email services by configuring PHPMailer in the `config.php` file.
5. Run the project:
   - Start your local server (e.g., using XAMPP or WAMP).
   - Access the project in your browser.

For detailed customization and usage instructions, refer to the `documentation.md` file.
