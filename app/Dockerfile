FROM debian:latest

RUN apt-get update -y && apt-get install -y apache2 locales-all micro php libapache2-mod-php php-sqlite3

COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

RUN a2ensite 000-default.conf
#RUN a2dissite 000-default

EXPOSE 80

# Create folder for SQLite
RUN mkdir /var/www/db/

COPY ./database/todoDB.sqlite3 /var/www/db/todoDB.sqlite3
#COPY ./database/todoDB.sqlite3 /var/www/html/todoDB.sqlite3

# Add permissions for writeable database
#RUN chmod 777 /var/html/database/todoDB.sqlite3
RUN chmod 777 /var/www/db
RUN chmod 777 /var/www/db/todoDB.sqlite3


CMD ["apachectl", "-D", "FOREGROUND"]