build: 
	docker-compose up -d --build
	composer install

rebuild:
	docker-compose down
	docker-compose up -d --build
	composer update
