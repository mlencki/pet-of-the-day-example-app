.PHONY: shell
shell:
	docker-compose -f docker-compose.dev.yml exec app /bin/ash

.PHONY: run
run:
	docker-compose -f docker-compose.dev.yml up -d

.PHONY: build
build:
	docker-compose -f docker-compose.dev.yml build --no-cache --pull

.PHONY: stop
stop:
	docker-compose -f docker-compose.dev.yml stop

.PHONY: restart
restart: stop run

