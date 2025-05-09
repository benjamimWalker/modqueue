
![Project logo](https://raw.githubusercontent.com/benjamimWalker/modqueue/master/assets/modqueue.png)

## Overview

**ModQueue** is a Laravel-based, multi-service system that simulates **scalable, asynchronous content moderation** — just like you'd find in large social platforms.

ModQueue is split into two independent services:

- **Content API**: Accepts and lists user-generated content.
- **Moderation Worker**: Asynchronously processes moderation using an AI mock service.

Together, they form a production-grade simulation of a **microservice architecture** with job queues, separation of concerns, and automated testing.

## Technology

Key Technologies used:

* Laravel 12 (for both services)
* MySQL
* RabbitMQ
* Docker + Docker Compose
* PestPHP

## Getting started

> [!IMPORTANT]  
> You must have Docker and Docker Compose installed on your machine.

* Clone the repository:
```sh
git clone https://github.com/benjamimWalker/modqueue.git
```

* Go to the project folder:
```sh
cd modqueue
```

* Prepare environment files:
```sh
cp content-api/.env.example content-api/.env && cp moderation-worker/.env.example moderation-worker/.env
```

* Build the containers:
```sh
docker compose up -d
```

* Install composer dependencies:
```sh
docker compose exec content-api-php composer install && docker compose exec moderation-worker composer install
```

* Run the migrations:
```sh
docker compose exec content-api-php php artisan migrate
```

* You can now execute the tests:
```sh
docker compose exec content-api-php php artisan test
```

* And access the documentation at:
```sh
http://localhost:8080/docs/api
```

And also access RabbitMQ dashboard (username guest, password guest) at:
```sh
http://localhost:15672
```

* Ultimately, to execute the moderation worker, run:
```sh
docker compose exec moderation-worker php artisan queue:work
```

## How to use

### 1 - Create your content

![Content creation image](https://raw.githubusercontent.com/benjamimWalker/modqueue/master/assets/create_content.png)

### 2 - Check your content

![Content fetching image](https://raw.githubusercontent.com/benjamimWalker/modqueue/master/assets/list_contents.png)

### 3 - Check the moderation 

![Content fetching image](https://raw.githubusercontent.com/benjamimWalker/modqueue/master/assets/list_moderation_logs.png)



## Features

The main features of the application are:
- Real-time queue-based communication using Laravel Jobs + RabbitMQ.
- Microservice-style separation between content handling and moderation logic.
- Full test coverage with PestPHP, including.
- Clean, maintainable Laravel 11 code with proper architecture.

Made with ❤️ and Laravel.
[Benjamim] - [benjamim.sousa@gmail.com]
Github: [@benjamimWalker](https://github.com/benjamimWalker)