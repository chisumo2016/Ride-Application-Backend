## UBER APPLICATION
    . Have frondend directory
    . Have  backend directory
## SETTING UP THE BACKEND
    . Create a project
            composer create-project laravel/laravel .

## CREATE MODEL DRIVER AND TRIP
       php artisan make:model Driver --migration 
       php artisan make:model Trip --migration 
## DEFINE MIGRATION 
    . Define all migration 

##  MASS ASSIGMENT
        . add the mass assigment to all model using guarded

## ADD RELATIONSHIP
    . start with User Model
    . All models

## BUILDING AND API ROUTE
    . Create the login controller
        php artisan make:controller LoginController

    .Send the nofication
        php artisan make:notification LoginNeedsVerification

    .Read 
            https://laravel-notification-channels.com/about/https://laravel-notification-channels.com/about/
            https://laravel-notification-channels.com/twilio/

        .Installation
            composer require laravel-notification-channels/twilio

        .Config
            open env file
    . Continue to implemente the logic in  Login controller
    . Continue to implemente the logic in app/Notifications/LoginNeedsVerification.php

    . Install https://httpie.io/cli
        .> httpie
        .sudo php artisan serve --port=8080

        . Open anotther window
                http POST backend.test/api/login phone=7729794039
    . Beare Authorozation
            http GET backend.test/api/user 'Authorization: Bearer 1|RhPEXtCOvv9xY5sB7CKYdJzQZ6So5M0zEPV5Hemt'

    SO FAR SO GOOO
        - We have an abilitty to login in with tokenn associate with a particular user.

## DRIVER CONTROLLER
    . Create a Driver Controller
        php artisan make:controller DriverController
    . Add the endpoint for driver
    .Add logic inside the controoller
    .TEST ENDPOINT
        http GET backend.test/api/driver 'Authorization: Bearer 1|RhPEXtCOvv9xY5sB7CKYdJzQZ6So5M0zEPV5Hemt'
        http POST backend.test/api/driver 'Authorization: Bearer 1|RhPEXtCOvv9xY5sB7CKYdJzQZ6So5M0zEPV5Hemt' Accept:application/json

    . Add data
            http POST backend.test/api/driver 'Authorization: Bearer 1|RhPEXtCOvv9xY5sB7CKYdJzQZ6So5M0zEPV5Hemt' Accept:application/json color=White licence_plate=FAL23J make=Honda model=Accord name=Bernard year=2013

## CREATE ROUTE FOR TRIP AND CONTROLLER
    - Create a trip controller
         php artisan make:controller TripController
    - Create the api endpoint for trip
    - Implement the logic inside the controller 
    - TESTED

## ADD THREE ROUTE INSIDE THE TRIP AS POST
    - please add three route 
        . a driver accept a trip
        . a driver has started taking a passenger too their destination
        . a driver has ended a trip
        . update the driver's current location
    - These will be fired via events tthrough websocket 

    - TEST THIS END POINT 
            php artisan migrate:refresh --path=/database/migrations/2023_05_03_065517_create_trips_table.php
            http POST backend.test/api/trip 'Authorization: Bearer 1|RhPEXtCOvv9xY5sB7CKYdJzQZ6So5M0zEPV5Hemt' destination_name=Startbucks destination:='{"lat":12.325336, "lng":23.359230}' origin:='{"lat": 35.293583, "lng":39.203905}'
            http GET backend.test/api/trip/1 'Authorization: Bearer 1|RhPEXtCOvv9xY5sB7CKYdJzQZ6So5M0zEPV5Hemt'

    
## CREATE AN EVENTS IN WEBSOCKETS 
    - We need to push an event which can consumed by real time event
        eccept: Passenger to get the notificcaation , let him/her how is coming to collect 
            1: Dispatch an event
                php artisan make:event TripAcceptedEvent
                php artisan make:event TripStartedEvent
                php artisan make:event TripEndedEvent
                php artisan make:event TripLocationUpdatedEvent

    - We have four events in the Envents folder

            2: Second Package which can be consumed by front end .
                https://github.com/soketi/soketi
                https://beyondco.de/docs/laravel-websockets/getting-started/introduction
                https://github.com/beyondcode/laravel-websockets

                composer require beyondcode/laravel-websockets --with-all-dependencies
                php artisan vendor:publish --provider="BeyondCode\LaravelWebSockets\WebSocketsServiceProvider" --tag="migrations"
                php artisan migrate
                composer require pusher/pusher-php-server "~3.0" or
                composer require pusher/pusher-php-server
                 php artisan websockets:serve  
    - SET UP THE FOLLOWING IN .env filee
                BROADCAST_DRIVER=pusher
            
                PUSHER_APP_ID=laravel
                PUSHER_APP_KEY=mykey
                PUSHER_APP_SECRET=secret
                PUSHER_HOST=127.0.0.1
                PUSHER_PORT=6001
                PUSHER_SCHEME=http

            TEST  php artisan websockets:serve    OK

    - Websocket will not push that , unless we have a client attach to them
    - Attach the front end to the backend .
    FINISH THE BACKEND
    
