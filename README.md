# ForumAPI

ForumAPI for a single page application

Developed with Symfony and API Platform

## Install

  Clone the application from git

`$ git clone https://github.com/mutergfp/ForumAPI.git`

> From project directory

  Install dependencies

`$ composer install`

  Create the database

`$ php bin/console doctrine:database:create`

  Persist tables in the database

`$ php bin/console doctrine:migrations:migrate`

## Set up JWT Cetification files

  Make JWT certification files directory

`$ mkdir -p config/jwt`

  Generate private.pem

  >The key must be : **admin**

`$ openssl genpkey -out config/jwt/private.pem -aes256 -algorithm rsa -pkeyopt rsa_keygen_bits:4096`

  Generate public.pem

`$ openssl pkey -in config/jwt/private.pem -out config/jwt/public.pem -pubout`

## API Usage

  Start the server

`$ symfony serve`

  API Interface :

> Look at the URL : https://localhost:8000/api/

  Create an admin :

`$ curl -X POST -H "Content-Type: application/json" http://localhost:8000/api/auteurs -d '{"username":"admin","roles": ["ROLE_ADMIN"],"password":"admin"}'`

  Get the JWT : 

`$ curl -X POST -H "Content-Type: application/json" http://localhost:8000/api/login_check -d '{"username":"admin", "password":"admin"}'`
