# Problem Statement

Build a pseudo web application to list real-estate properties and browse them.


# Technology Stack

This application is built on LAMP stack.

* PHP 5.5.X
* MySQL 5.6.X
* Yii 2.0.6

# How to Run

You must have installed all software mentioned above
 
To run:

* Goto `/src` directory
* Check if all required PHP modules are installed
		 
		php requirements.php
	If you found any error, please install that PHP extension
	
* Run composer create-project
* To load sample data 

	    ./yii migrate
    
* Start PHP's buil-in server

		php -S localhost:8080 -t web/
    
* Open [http://localhost:8080](http://localhost:8080) in your browser

## Demo
Live demo is also hosted at  [http://propertyguru.demo.abhi9.in](http://propertyguru.demo.abhi9.in)

# Implemented Feature

* Property search and listing
* Filter by various attributes
* Sorting
* Property Detail
* Location on Map
* Like property using local storage
* Intitutative design
