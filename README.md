

# user guide

## setup

1. configure mysql in the relevant places
2. run the project with "php artisan serve"
3. call the sales table creation endpoint - POST "http://localhost:8000/salesCreateTable"

## API (web.php)
create sale page - "http://localhost:8000/newSale"
show sales list - "http://localhost:8000/list"

## Tests

some basic API tests in ApiTest.php. sales table should exists for the tests to pass (should not be the case but I had some trouble with mocking features).


