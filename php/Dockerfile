FROM debian:stretch

RUN apt-get update && apt-get install -y \
    curl \
    ca-certificates

RUN apt-get install -y \
    apache2 \
    php7.0-fpm \
    php7.0-mysql \
    php7.0-mcrypt \
    php7.0-mbstring \
    php7.0-xml \
    php7.0-json \
    libapache2-mod-php7.0

RUN a2enmod rewrite
RUN usermod -u 1000 www-data
RUN groupmod -g 1000 www-data

RUN rm -rf /var/www/html && \
    ln -s /var/php/src /var/www/html
COPY php.ini /etc/php/7.0/apache2/php.ini
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
#RUN rm -f /etc/apache2/sites-available/000-default.conf && \
#    ln -s /var/php/dev/000-default.conf /etc/apache2/sites-available/000-default.conf
#RUN rm -f /etc/php/7.0/apache2/php.ini && \
#    ln -s /var/php/dev/php.ini /etc/php/7.0/apache2/php.ini

EXPOSE 80

CMD cp /var/php/cmd.sh /usr/local/bin/cmd.sh && \
    chmod +x /usr/local/bin/cmd.sh && \
    cmd.sh