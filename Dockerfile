FROM php:8.0-apache

RUN apt-get update

RUN apt-get install -y \
    git \
    zip \
    curl \
    sudo \
    unzip \
    libicu-dev \
    libbz2-dev \
    libpng-dev \
    libjpeg-dev \
    libmcrypt-dev \
    libreadline-dev \
    libfreetype6-dev \
    g++

RUN docker-php-ext-install \
    bz2 \
    intl \
    bcmath \
    opcache \
    calendar \
    pdo \
    pdo_mysql \
    mysqli

ENV CI_ENVIRONMENT=production
ENV DB_HOST=localhost
ENV DB_DATABASE=ci4
ENV DB_USERNAME=root
ENV DB_PASSWORD=root
ENV DB_PORT=3306
ENV PHP_MEMORY_LIMIT=512M

RUN a2enmod rewrite headers

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY ./ /var/www/html/

RUN curl https://getcomposer.org/installer -o /var/www/html/composer.phar

RUN adduser www-data www-data
RUN chmod -R 777 /var/www/html/
RUN chown -R www-data:www-data /var/www/html/

WORKDIR /var/www/html/

RUN mv 000-default.conf /etc/apache2/sites-available/000-default.conf
RUN php composer.phar
RUN ./composer.phar install
RUN rm composer.phar


EXPOSE 80

# docker build -t elezioni:latest .

# docker run -d \
#     --name=elezioni \
#     --net=your-net \
#     -p 8080:80 \
#     -e BASE_URL="your-base-url" \
#     -e DB_HOST=localhost \
#     -e DB_DATABASE=ci4 \
#     -e DB_USERNAME=root \
#     -e DB_PASSWORD=root \
#     -e DB_PORT=3306 \
#     elezioni:latest

#     # -e SMTP_ADDRESS="youremail" \
#     # -e SMTP_PASSWORD="your-password" \
