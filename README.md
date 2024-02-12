# TechPosts

Welcome to the TechPost repository! This website provides a platform for users to share and discuss their thoughts, ideas, and experiences through written content.

## Features

- **Create Posts**: Users can create new posts by providing a title, content, and image.
- **View Posts**: All posts are displayed on the homepage, allowing users and guests to browse through existing posts.
- **Edit Posts**: Users can edit their own posts, updating the title, content, and image if needed.
- **Delete Posts**: Users have the ability to delete their own posts if they no longer wish to keep them.
- **Add Comments**: Users have the ability to add comments on all posts.
- **Delete Comments**: Users have the ability to delete thier own comments.
- **Authentication**: User authentication is integrated to ensure secure access to post creation and management functionalities.

## Technologies Used

- **Laravel**: The backend of the application is built using the Laravel framework, providing robust features and efficient development.
- **MySQL**: The application uses MySQL as the database management system to store post data and comments.
- **HTML/CSS/JavaScript**: The frontend of the application is built using HTML and CSS using laravel blades.

## Getting Started

To get started with the TechPosts App, follow these steps:

1. Clone the repository to your local machine:
  ```bash
       git clone https://github.com/amrsaleem/TechPosts.git 
```
2. Install the project dependencies using Composer:
```bash
	composer install 
```

3. Create a `.env` file by copying the `.env.example` file and updating the database configuration:
```bash
	`cp .env.example .env` 
```
4. Generate an application key:
```bash
	php artisan key:generate`
```
5. Run database migrations to create the necessary tables:
```bash
	php artisan migrate
```
6. Start the Laravel development server:
```bash
	php artisan serve
```
7. Access the application in your web browser at `http://localhost:8000`.
