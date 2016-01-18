## Pibbble

[![Build Status](https://travis-ci.org/andela/pibbble.svg)](https://travis-ci.org/andela/pibbble)
[![Coverage Status](https://coveralls.io/repos/andela/pibbble/badge.svg?branch=%28detached+from+f19f951%29&service=github)](https://coveralls.io/github/andela/pibbble?branch=%28detached+from+f19f951%29)

Pibbble is a web application developed with the Laravel framework. It is a show and tell for developers who would like to showcase their side projects for fellow developers, investors and other software enthusiasts.

Pibbble is a community of developers where they can ask one another about what they are working on. They can talk about current work, challenges and help analyse each other's project.

Pibbble is a place to promote, discover, and explore web applications.

## Running the Pibbble Application
Clone this repository:
```bash
git clone https://github.com/andela/pibbble.git
```
Then enter into the directory
``` bash
cd pibbble
```
Make sure you have [composer](https://getcomposer.org/) installed and use it to install the project dependencies:

```bash
composer install
```

## Setting Environment Variables for the Pibbble Application

After running the application on your machine, it is important to set up the environment variables.

This is done in the .env file which is in the root folder of the project.

Credentials for the database, mail service, cloudinary service and social login are in the .env file.

For the `database`, each of the following are supplied with corresponding values.
```
DB_HOST
DB_PORT
DB_DATABASE
DB_USERNAME
DB_PASSWORD
```
For the `mail` service, each of the following are also supplied with corresponding values.
```
MAIL_DRIVER
MAIL_HOST
MAIL_PORT
MAIL_USERNAME
MAIL_PASSWORD
MAIL_ENCRYPTION
```
For `cloudinary` service, each of the following are also supplied with corresponding values.
```
CLOUDINARY_API_KEY
CLOUDINARY_API_SECRET
CLOUDINARY_CLOUD_NAME
```
For login using **Github** and **Facebook**, the values for the following are needed.
```
GITHUB_ID
GITHUB_SECRET
GITHUB_URL
```
_&_
```
TWITTER_ID
TWITTER_SECRET
TWITTER_URL
```

To get up and running, we provide a database seed. To run this however, your environment should have a **Postgres database**. Setting up all these environments can be tricky, which is why we opted to use [laravel\homestead](https://laravel.com/docs/5.1/homestead) instead.

If you are using laravel\homestead and have the necessary config:
```bash
vagrant up
```
Then ssh into the homestead box:
```bash
vagrant ssh
```

## Database Seeding
The run the database seed in the project directory
```bash
php artisan db:seed
```
The application should be up and running. So entering pibbble.app/ into your browser brings up the application.

### Contributors

Oladipupo Isola, Wilson Omokoro, Surajudeen Akande, Ogunjimi Opeyemi & Christopher Ganga
