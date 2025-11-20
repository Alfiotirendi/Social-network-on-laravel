# FootballBook – Multi-user Social Network built with Laravel

FootballBook is a social network built with Laravel that allows users to register, log in, create posts, follow other users, like posts, and view detailed profile information.  
The project uses Laravel for backend logic, Blade for the frontend, and MySQL as the database.

## Main Features

### User Management
- User registration and login
- Logout and session management
- Personal profile page
- View other users' profiles
- Edit personal profile information
- User search bar

### Posts
- Create text posts
- View personal posts
- Feed with posts from followed users
- Dedicated page with all posts from a specific profile

### Social Interactions
- Post like system
- Like counter
- Follow/unfollow system
- Personalized feed based on followed profiles

## Technologies Used
- Laravel 12
- PHP 8.2
- Blade Templates
- MySQL
- TailwindCSS (if used)
- Eloquent ORM

## Installation and Setup

1. Clone the repository:
git clone https://github.com/your-username/footballbook.git
cd footballbook

2. Install dependencies:
composer install
npm install && npm run build

3. Copy the `.env` file and configure the database:
cp .env.example .env
# Set your database credentials inside `.env`:
# DB_DATABASE=footballbook
# DB_USERNAME=root
# DB_PASSWORD=yourpassword

4. Generate the application key:
php artisan key:generate

5. Run migrations:
php artisan migrate

6. Start the server:
php artisan serve

The project will be available at: http://localhost:8000

## Main Directory Structure

app/
  Models/              Eloquent models (User, Post, Like, Follow, ...)
  Http/Controllers/    Main controllers
resources/
  views/               Blade templates
routes/
  web.php              Application routes

## License
This project is distributed under the MIT License.
