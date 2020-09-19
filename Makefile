IMAGE_NAME = architectors/patterns
IMAGE_TAG = latest
CONTAINER_NAME = patterns
WORK_DIR = $(shell PWD)
APP_DIR = /patterns


.PHONY: build # Build an image
build:
	docker build -t $(IMAGE_NAME):$(IMAGE_TAG) --no-cache --force-rm .

.PHONY: create # Create a docker container
create:
	docker create -i -p 127.0.0.1:9001:9000 --name $(CONTAINER_NAME) \
	--mount type=bind,source=$(WORK_DIR),target=$(APP_DIR) \
	$(IMAGE_NAME):$(IMAGE_TAG)

.PHONY: drop # Remove the docker container
drop:
	docker rm -f $(CONTAINER_NAME)

.PHONY: start # Start the docker container
start:
	docker start $(CONTAINER_NAME)

.PHONY: stop # Stop the docker container
stop:
	docker stop $(CONTAINER_NAME)

.PHONY: prune # Remove docker containers and the docker image
prune:
	make drop; \
	docker rmi $(IMAGE_NAME):$(IMAGE_TAG)

.PHONY: install # Install app dependencies
install:
	docker exec $(CONTAINER_NAME) composer install

.PHONY: bash # Launch bash session
bash:
	docker exec -it $(CONTAINER_NAME) bash

.PHONY: check-style # Check the code style
check-style:
	docker exec $(CONTAINER_NAME) composer check-style

.PHONY: tests # Run unit tests
tests:
	docker exec $(CONTAINER_NAME) composer test