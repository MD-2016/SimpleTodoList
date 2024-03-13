FROM php:8.2-apache

#RUN apt-get update -y && apt-get install -y apache2 locales-all micro php libapache2-mod-php php-sqlite3

WORKDIR /var/www/html

COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

RUN a2ensite 000-default.conf
#RUN a2dissite 000-default

COPY . /var/www/html

EXPOSE 80

RUN apt-get update && apt-get install -y sqlite3 libsqlite3-dev



# Create folder for SQLite
RUN mkdir /var/www/database/

COPY ./database/todoDB.sqlite3 /var/www/database/todoDB.sqlite3
#COPY ./database/todoDB.sqlite3 /var/www/html/todoDB.sqlite3

# Add permissions for writeable database
#RUN chmod 777 /var/html/database/todoDB.sqlite3
#RUN chmod 777 /var/www/database
#RUN chmod 777 /var/www/database/todoDB.sqlite3
RUN chown -R www-data:www-data /var/www/html
RUN chown -R 775 /var/www/html/database
RUN chmod 777 /var/www/html/database/todoDB.sqlite3 




CMD ["apachectl", "-D", "FOREGROUND"]