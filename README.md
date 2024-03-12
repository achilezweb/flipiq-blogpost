# Flipiq Blogpost Project

This project is a test application for managing posts via API using PHP 7.4 & PostgreSQL.

## Installation

Follow these steps to set up and install Blogpost Project:

### Prerequisites

- PHP 7.4
- [Composer](https://getcomposer.org/)
- PostgreSQL 13
- [NodeJS](https://nodejs.org/en/)
- [Docker](https://www.docker.com/products/docker-desktop)

### Clone the Repository

Clone the repository to your local machine:

```bash
git clone https://github.com/achilezweb/flipiq-blogpost.git
```

### Startup Docker Containers

```bash
# start containers
docker-compose up -d
```

### Install Dependencies
Navigate to the project directory and install PHP dependencies using Composer:

```bash
cd flipiq-blogpost
composer install
```

### Configure Environment Variables
Copy the .env.example file to create a new .env file:

```bash
cp .env.example .env
```

### Open the .env file and configure the following environment variables:

```bash
DB_CONNECTION: Set this to pgsql for PostgreSQL.
DB_HOST: Set the host of your PostgreSQL database.
DB_PORT: Set the port of your PostgreSQL database.
DB_DATABASE: Set the name of your PostgreSQL database.
DB_USERNAME: Set the username for accessing your PostgreSQL database.
DB_PASSWORD: Set the password for accessing your PostgreSQL database.
```

### Generate Application Key
Generate a new application key for the project:

```bash
php artisan key:generate
```

### Run Migrations
Run the database migrations to create the necessary tables:

```bash
#add 10 blog post seeds
php artisan migrate:fresh --seed
```

### Optional: Run NPM and Build

```bash
npm install && npm run dev
```

### Serve the Application
Start the local development server:

```bash
php artisan serve
```

The application will be available at http://localhost:8000.

### Usage
Use the web interface to view, create, show, update, and delete posts.
Use the API endpoints (/api/posts) to perform CRUD operations on posts programmatically.

```bash
GET /api/posts - list all the blog posts.
POST /api/posts - submit new blog posts.
BONUS:
GET /api/posts/{id} - show post by ID.
PUT /api/posts/{id} - update post by ID.
DELETE /api/posts/{id} - delete post by ID.
```
