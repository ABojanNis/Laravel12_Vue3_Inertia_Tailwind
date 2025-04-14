# Laravel12_Vue3_Inertia_Tailwind

This is a complete Single Page Application (SPA) from the ground up using the modern VILT stack — Laravel 12, Vue 3, Inertia.js, and Tailwind CSS. This full-stack project covers everything from authentication and routing to database management and responsive frontend design.

## Table of Contents

- [Prerequisites](#prerequisites)
- [Setup Instructions](#setup-instructions)
- [Running the Application](#running-the-application)

## Prerequisites

Before you start, ensure you have the following installed:

- Docker: [Install Docker](https://docs.docker.com/get-docker/)
- Docker Compose: [Install Docker Compose](https://docs.docker.com/compose/install/)
- Composer: [Install Composer](https://getcomposer.org/download/)
- PHP (Optional, if you want to run it outside Docker)

## Setup Instructions

1. **Clone the Repository**

Clone the project to your local machine:
```bash
git clone <your-repo-url>
cd <your-repo-folder>
```

2. **Set Up Environment Variables**

Copy the .env.example to a new .env file:
```bash
cp .env.example .env
```

Edit the .env file and configure your database credentials:
```bash
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_user
DB_PASSWORD=your_password
```

3. **Build and Start Docker Containers**

Use Docker Compose to build and start the containers:
```bash
docker-compose up -d --build
```

This will build the containers defined in docker-compose.yml, including PHP, Nginx, PostgreSQL, and Redis.

4. **Install Dependencies with Composer**

Install PHP dependencies inside the app container:
```bash
docker exec -it Laravel12_Vue3_Inertia_Tailwind_php composer install
```

If you need to install a specific package, you can run:
```bash
docker exec -it Laravel12_Vue3_Inertia_Tailwind_php composer require <package-name>
```

5. **Install front-end dependencies using npm**

Install Frontend Dependencies inside the app container:
```bash
docker exec -it Laravel12_Vue3_Inertia_Tailwind_php npm install
````

6. **Generate Application Key**

Run the following command to generate a new Laravel application key:
```bash
docker exec -it Laravel12_Vue3_Inertia_Tailwind_php php artisan key:generate
```

7. **Migrate the Database**

Run the database migrations to set up the required tables:
```bash
docker exec -it Laravel12_Vue3_Inertia_Tailwind_php php artisan migrate --seed
```

## Running the Application

1. **Start Vite Dev Server**
```bash
1. docker exec -it Laravel12_Vue3_Inertia_Tailwind_php npm run dev
```

2. **Access the Application in Your Browser**

After the containers are up, visit **http://localhost** in your browser. You should see your Laravel app running.
