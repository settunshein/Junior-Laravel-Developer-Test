## Prerequisites
- PHP (Version 8.0 or higher)
- Composer (Dependency Manager for PHP)
- MySQL (Database)
- npm (Dependy Manager for NodeJS)

## Installation
Clone the repository:
```
git clone <your-repo-url>
cd <your-repo-directory>
```

Install dependencies:
```
composer install
npm install && npm run dev
```

## Environment Setup
Generate an application key:
```
php artisan key:generate
```

Copy the .env.example file to create your .env file:
```
cp .env.example .env
```

Configure your database in the .env file:
```
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

Run database migrations and seeding file:
```
php artisan migrate:fresh --seed
```

To create the symbolic link, use the storage:link artisan command:
```
php artisan storage:link
```

Run the dev server:
```
php artisan serve
```
<hr>
