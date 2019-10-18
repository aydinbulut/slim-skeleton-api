# Slim Framework 3 Skeleton Application

I forked https://github.com/slimphp/Slim-Skeleton because it has Docker ENV. Forked repo uses Slim 4 but in this skeleton I used Slim 3.

Use this skeleton application to quickly setup and start working on a new API application with Slim Framework 3. 

##Features
* Phinx: DB migration package. [Documentation](http://docs.phinx.org/en/latest/) for Phinx.
* Laravel's validator package "illuminate/validation". [Documentation](https://laravel.com/docs/6.x/validation) for validator.
* 

## Prerequisite
You must install Docker desktop application for you personal computer.

## Install the Application

Run following commands to install your new Slim 3 Framework skeleton.

Clone the repo
```bash
git clone git@github.com:aydinbulut/slim-php-skeleton.git
```

Run following command in "src/" directory to install dependencies
```bash
composer install
```

To run the application in development, you can run following Docker commands 
```bash
cd [my-app-name]
docker-compose up -d
```
* You must have Docker desktop application
* Ensure `logs/` is web writable.

After that, open `http://localhost` in your browser or with a aPI client application like Postman.

That's it! Now go build something cool.
