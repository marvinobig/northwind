FROM ubuntu

RUN apt update && apt upgrade -y && apt install -yq expect
RUN apt update && apt install -qq -y software-properties-common && add-apt-repository ppa:ondrej/php -y
RUN apt update && apt install -qq -y php
RUN apt update && apt install -y php-sqlite3

WORKDIR /usr/src/northwind

COPY . /usr/src/northwind

CMD ["php", "-S", "0.0.0.0:8080"]

EXPOSE 8080