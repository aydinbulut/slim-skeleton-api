# Slim Framework 3 Skeleton Application

Use this skeleton application to quickly setup and start working on a new API application with Slim Framework 3. 

## Features
* Phinx, DB migration package. [Documentation](http://docs.phinx.org/en/latest/)
* Laravel's validator package to validate requests easily. [Documentation](https://laravel.com/docs/6.x/validation)
* Monolog for logging. [Documentation](https://github.com/Seldaek/monolog)
* Eloquent (Laravel's ActiveRecord style ORM) [Documentation](https://laravel.com/docs/6.x/database)
* Symfony Debug package [Documentation](https://symfony.com/doc/current/components/debug.html)
* Slim JWT Auth package to use JWT for auth. [Documentation](https://packagist.org/packages/tuupola/slim-jwt-auth)
* nannehuiges/jsend A simple PHP implementation of the JSend specification. [Documentation](https://packagist.org/packages/nannehuiges/jsend)
* Symfony Dotenv package for managing configuration value securely. [Documentation](https://symfony.com/doc/current/components/dotenv.html)

## Prerequisite
You must install Docker desktop application for you personal computer.

## Install the Application

Run following commands to install your new Slim 3 Framework skeleton.

### Clone the repo
```bash
git clone git@github.com:aydinbulut/slim-php-skeleton.git
```

### Run following command in "src/" directory to install dependencies
```bash
cd src
composer install
```

### Set configuration
Rename .env-example file to .env and set credits for DB connection.

### To run the application in development, you can run following Docker commands 
```bash
cd [my-app-name]
docker-compose up -d
```

After that, open `http://localhost` in your browser or with an API client application like Postman.

That's it! Now go build something cool.

## NOTES*
* You must have Docker desktop application
* Ensure `logs/` is web writable.