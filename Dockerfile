FROM phpdockerio/php80-fpm:latest
WORKDIR "/application"

RUN apt-get update && apt install php8.0-sqlite3