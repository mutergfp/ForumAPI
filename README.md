# ForumAPI

ForumAPI for a single page application

Developed with Symfony and API Platform

## Install

  Clone the application from git

`git clone https://github.com/mutergfp/ForumAPI.git`

> From project directory

  Install dependencies

`composer install`

  Create the database

`php bin/console doctrine:database:create`

  Persist tables in the database

`php bin/console doctrine:migrations:migrate`

  Start the server

`symfony serve`

## API Usage

  API Interface :

> Look at the URL : https://localhost:8000/api/

  Create an admin :

`curl -X POST -H "Content-Type: application/json" http://localhost:8000/api/auteurs -d '{"username":"admin","roles": ["ROLE_ADMIN"],"password":"admin"}'`

  Get the JWT : 

`curl -X POST -H "Content-Type: application/json" http://localhost:8000/api/login_check -d '{"username":"admin", "password":"admin"}'`
