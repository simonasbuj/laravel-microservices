# Laravel Microservice

A Laravel application that demonstrates a microservice pattern using RabbitMQ.

- When new data is inserted into the database, the app sends a message to RabbitMQ.
- Another worker listens to RabbitMQ and processes the messages asynchronously.

---

## Getting Started

1. Start the API and all dependencies

   `./vendor/bin/sail up -d`

   This will start Laravel Sail along with required services (MySQL, RabbitMQ, etc.).

2. Run database migrations

   `./vendor/bin/sail artisan migrate`

   This will create the necessary tables in your database.

3. Start the queue listener

   `php artisan queue:work`

   This worker will process messages sent to RabbitMQ.

---

## Sending Messages

You can send a message to RabbitMQ in two ways:

1. Using a test command

   php artisan test_command

   This triggers a sample message to verify that your setup is working.

2. Creating a new post via API

   Send a POST request to create a new post:
    ```
   POST http://localhost:81/api/post
   Content-Type: application/json

   {
       "title": "postman 23",
       "user_id": 1,
       "likes": 1,
       "image": "img"
   }
    ```
   This will automatically send a message to RabbitMQ for processing.

---

## Notes

- Ensure that RabbitMQ is running before dispatching messages.
- The queue listener must be running to process messages asynchronously.
- You can monitor the queue using RabbitMQ management UI if installed.
