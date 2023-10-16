FROM ubuntu

RUN apt update && apt upgrade -y && apt install -yq expect
RUN apt update && apt install -qq -y software-properties-common && add-apt-repository ppa:ondrej/php -y
RUN apt update && apt install -qq -y php

WORKDIR /usr/src/northwind

COPY . /usr/src/northwind

RUN bash mssql-driver-install.sh

CMD ["php", "-S", "0.0.0.0:8080"]

EXPOSE 8080