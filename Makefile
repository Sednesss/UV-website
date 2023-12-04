build: 
	docker-compose up -d --build
	composer install

rebuild:
	docker-compose down
	docker-compose up -d --build
	composer update

app bash:
	docker exec -it under_vision_site_app bash

nginx bash:
	docker exec -it under_vision_site_nginx bash