After cloning project, go to the root folder of project and run,

    composer install

After composer install successfully, create environment file from sample env.example and setup required credentials in .env file

    cp .env.example .env

After entering required values in .env generate app key by following command

    php artisan key:generate

create the database with same name used in .env file in your mysql and run following command

    php artisan migrate --seed

Finally run

    npm install

to compile assest


Description:
Admin should be able to add/edit/delete books
Customers should be able to search and filter according to multiple
attributes like title, author, publication date, isbn, genre

 Data must be paginated
 Use the following data source as an example to build your data set -
https://fakerapi.it/api/v1/books?_quantity=100

 Minimum 100 products
 focus on performance of the APIs
