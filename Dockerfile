FROM ubuntu:latest
ENV DEBIAN_FRONTEND noninteractive

WORKDIR /project1

RUN apt-get update
RUN apt-get install -y apache2
RUN apt-get install -y apache2-utils
RUN apt-get install -y php
RUN apt-get install -y php-bcmath
RUN apt-get install -y php-bz2
RUN apt-get install -y php-intl
RUN apt-get install -y php-gd
RUN apt-get install -y php-mbstring
RUN apt-get install -y php-mysql
RUN apt-get install -y php-zip
RUN apt-get clean
EXPOSE 80
CMD ["apache2ctl","-D","FOREGROUND"]
