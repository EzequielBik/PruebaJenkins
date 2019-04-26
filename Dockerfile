FROM php:7.1.28-apache

ARG STAGE

MAINTAINER Ezequiel Bikiel <ezequielb@netlabs.com.ar>

############ from netlabs/lumen dockerfile ##############

# install missing extensions (and locales)
RUN apt-get update && apt-get install -y git zip locales

#RUN docker-php-ext-install mbstring zip pdo_mysql

# install composer
RUN php -r "readfile('https://getcomposer.org/installer');" | php -- --filename=composer --install-dir=/usr/local/bin && \
    composer global require hirak/prestissimo --no-plugins --no-scripts


# Generate locale for es_AR
RUN echo "es_AR.UTF-8 UTF-8" >> /etc/locale.gen 
RUN locale-gen

# enable apache modules
RUN a2enmod rewrite

# activate php error logs
RUN echo php_flag log_errors On > /etc/apache2/conf-enabled/php-log-errors.conf

ADD scripts/* /

#RUN  bash -c "if [ \"$STAGE\" == \"dev\" ] || [ \"$STAGE\" == \"test\" ]; \
#     then \
#       apt-get install -y php5-xdebug; \
#       docker-php-ext-enable /usr/lib/php5/20131226/xdebug.so; \
#       echo xdebug.max_nesting_level=500 >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
#     else \
#       rm /start_test.sh /wait_for.php; \
#     fi"

#clean up
RUN apt-get clean && \
        rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY configs/apache2/000-default.conf /etc/apache2/sites-available/

WORKDIR /var/www/html

ADD src /var/www/html

# Set file owner
RUN chown -R www-data:www-data /var/www/html
# install vendors

#RUN composer install

RUN bash -c "if [ \"$STAGE\" == \"production\" ] || [ \"$STAGE\" == \"\" ] || [ \"$STAGE\" == \"qa\" ]; \
    then \
      composer install --no-dev --no-interaction -o --no-ansi; \
      rm -rf /var/www/html/tests; \
    elif [ \"$STAGE\" == \"dev\" ] || [ \"$STAGE\" == \"test\" ]; \
    then \
      composer install --no-interaction -o --no-ansi; \
    fi"
      


EXPOSE 80

CMD /start.sh
