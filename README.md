# ForumAPI

ForumAPI for a single page application

Developed with Symfony and API Platform

## Install

  Clone the application from git

`git clone https://github.com/mutergfp/ForumAPI.git`

  Install dependencies

`composer install`

## API Usage

  API Interface :

> Look at the URL : https://localhost:8000/api/

  Create an admin :

`curl -X POST -H "Content-Type: application/json" http://localhost:8000/api/auteurs -d '{"username":"admin","roles": ["ROLE_ADMIN"],"password":"admin"}'`

  Get the JWT : 

`curl -X POST -H "Content-Type: application/json" http://localhost:8000/api/login_check -d '{"username":"admin", "password":"admin"}'`
