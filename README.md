# Welcome To CimaFlix 
## Setup The Project 

```
before starting ensure that wsl is set correctly with docker desktop installed and wsl 2 enabled 
```
### 1- Clonning the project 
- git clone https://github.com/ouss2022aich/CimaFlix.git
- cd CimaFlix
### 2- Setting .env 
- cp .example.env .env
- replace these in the .env file : 
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password
```
### 3- Setting Docker Container
- go to the wsl terminal and type : 
```
docker run --rm \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php82-composer:latest \
    composer install
```
### 4- Install Dependencies   

- start laravel sail envirenment :  ``` ./vendor/bin/sail up -d ```
- install npm dependencies : ```./vendor/bin/sail npm i```

### 5- Generate Encryption Key 
- generate the key using this command ```./vendor/bin/sail artisan key:generate```

### 5- migrations 
- run migratations : ```./vendor/bin/sail artisan migrate:fresh ```


### 6- Pupolate Storylines  Data
- command : ```./vendor/bin/sail db:seed```

