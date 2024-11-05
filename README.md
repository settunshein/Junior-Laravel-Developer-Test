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

## API Endpoints for Company
Here are the endpoints for managing company:
| Method | Endpoint                                | Description                         |
| ------ | --------------------------------------- | ----------------------------------- |
| POST   | http://localhost:8000/api/login         | Login                               |
| POST   | http://localhost:8000/api/logout        | logout                              |
| GET    | http://localhost:8000/api/company       | Fetch all company list              |
| POST   | http://localhost:8000/api/company       | Create a new company                |
| GET    | http://localhost:8000/api/company/{id}  | Fetch single company by company id  |
| PATCH  | http://localhost:8000/api/company/{id}  | Update company by company id        |
| DELETE | http://localhost:8000/api/company/{id}  | Delete company by company id        |

To test these endpoints with Postman:
- Open <code>Postman</code> and create a new request.
- Log in by sending a <code>POST</code> request to <code>http://localhost:8000/api/login</code> with your login credentials.
- Copy the <code>token</code> from the login response.
- Go to the <code>Header</code> tab and add the following keys and values.
  - **Key:** <code>Accept</code> **Value:** <code>application/json</code>
  - **Key:** <code>Content-Type</code> **Value:** <code>application/json</code>
  - **Key:** <code>Authorization</code> **Value:** <code>Bearer &lt;Paste Login Response Token&gt;</code>
- **Note:** You’ll need to add these keys values under the <code>Header</code> tag to access other endpoints.
<hr>
