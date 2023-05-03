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
