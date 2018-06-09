Products Bidding Simple Laravel App
=======================

Products Bidding Simple Laravel App.

This is one of the fun tests I was given.


Requirements
============

* Laravel 5.6

Installation
============
Clone the project to your machine

    git clone https://github.com/Teethedev/products-bidding-simple-app.git

Update the database details in .env

Install the packages

    composer install
    npm install

Configuring the search engine for the products
 
     php artisan scout:import "App\Product"

Open an account with algolia and configure your algolia details in .env
  
     ALGOLIA_APP_ID=id
     ALGOLIA_SECRET=secret

Copy the assets

    npm run dev

Run the migrations and seeders

    php artisan migrate --seed
  
 Generate app key
 
    php artisan key:generate

