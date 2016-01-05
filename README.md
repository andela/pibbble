## Pibbble

[![Build Status](https://travis-ci.org/andela/pibbble.svg)](https://travis-ci.org/andela/pibbble)
[![Coverage Status](https://coveralls.io/repos/andela/pibbble/badge.svg?branch=%28detached+from+f19f951%29&service=github)](https://coveralls.io/github/andela/pibbble?branch=%28detached+from+f19f951%29)

Pibbble is a web application developed with the Laravel framework. It is a show and tell for developers who would like to showcase their side projects for fellow developers, investors and other software enthusiasts.

Pibbble is a community of developers where they can ask one another about what they are working on. They can talk about current work, challenges and help analyse each other's project.

Pibbble is a place to promote, discover, and explore web applications.

## Cloning & Running the Pibbble Application

Clone this repository using: ~ git clone https://github.com/andela/pibbble.git

Then enter into the directory using: ~ cd pibbble

After this, install all the dependencies with: ~ composer install

Then run this command: ~ vagrant up

The application should be up and running. So entering pibbble.app/ into your browser brings up the application.

NOTE: There must be Virtual Box on your machine. You must also have vagrant & composer installed.

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

### Contributors

Oladipupo Isola, Wilson Omokoro, Surajudeen Akande, Ogunjimi Opeyemi & Christopher Ganga
