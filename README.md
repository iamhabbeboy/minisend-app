## Minisend
Setup procedures

### Install necessary package
Run `npm install` and `composer install` to install necessary packages.
### Rename the env file
Rename the `.env.example` to `.env` and add your `database` on this row in the file `DB_DATABASE=`
### Migration
Run migration `php artisan migrate` to create all the tables required
### Seeder
A dummy data is created to at random to make setup easy. use 
`php artisan db:seed`

### Run Vue app test (jest)
Run the test with `npm run test`
### Start app 
Run the app with `php artisan serve`

### Job Listener 
Run `php artisan queue:listen` to listen to mail queue.


