
## Run Locally

Clone the project

```bash
  git clone https://github.com/xtrap029/eastvantage_back.git
```

Go to the project directory

```bash
  cd eastvantage_back
```

Install dependencies

```bash
  composer install
```

Copy attached **.env** file to root folder

Create MySQL database with name **eastVantage**

Import migrations to the database

```bash
  php artisan migrate
``` 

Seed Roles table data

```bash
  php artisan db:seed --class=RolesSeeder
``` 

Start the server

```bash
  php artisan serve
```