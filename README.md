# Cube Intersection
Script that calculates the volume of the intersection of two cubes.

## Getting started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites
You need to install [docker](https://www.docker.com/) and [docker-compose](https://docs.docker.com/compose/).

### Installing
Download the project source code using git clone.
In the project folder, run the command to get up the docker:

```
$ docker-compose up -d
```
Update the project dependencies:

```
$ docker-compose exec php composer update
```

Execute the script:
```
$ docker-compose exec php php bin/intersect.php
```

## Running the tests
You can also run the unit tests written for the domain classes:
```
$ docker-compose exec php php vendor/phpunit/phpunit/phpunit
```

## Authors
* **Andreu Ros**

## License
This project is licensed under the MIT License - see the LICENSE.md file for details