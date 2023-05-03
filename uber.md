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

