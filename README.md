## Minisend
Setup procedures

### Install necessary package
Run `npm install` and `composer install` to install necessary packages.
### Rename the env file
Rename the `.env.example` to `.env` and add your `database` on this row in the file `DB_DATABASE=`
### Migration
Run migration `php artisan migrate` to create all the tables required
### Seeder
A dummy data is created to make setup easy. use 
`php artisan db:seed`

### Run test (jest, phpunit) 
Run the test with `npm run test` and `./vendor/bin/phpunit` for phpunit
### Start app 
Run the app with `php artisan serve`

### Job Listener 
Run `php artisan queue:listen` to listen to mail queue.


