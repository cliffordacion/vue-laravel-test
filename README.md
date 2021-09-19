
# Test Project using vuejs on laravel
# Application Function
- User registration
- User Login
- Home page with all possible combination given a list of face parts
- upload a face part




# Installation
1) git clone https://github.com/cliffordacion/vue-laravel-test.git

2) go to project root directory
	```
	cd vue-laravel-test
	```
3) install php dependencies
	```
	composer install
	```
4) install javascript and other frontend dependencies
	```
	yarn
	```
5) create laravel `.env` file
	```
	cp .env.example .env
	```
6) Create application key
	```
	php artisan key:generate	// Laravel app key
	```
7) Create symlink from storage to public to access uploaded videos
	```
	php artisan storage:link
	```
8) edit .env to update database credentials and server information

9) Run migration and seeds
    ```
    php artisan migrate --seed
    ```

10) compile vue files
	```
	yarn watch
	```