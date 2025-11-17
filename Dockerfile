FROM php:8.2-fpm AS build

RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    zlib1g-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    unzip \
    git \
    && docker-php-ext-configure gd \
        --with-freetype=/usr/include \
        --with-jpeg=/usr/include \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        mbstring \
        xml \
        pcntl \
        intl \
        zip \
        gd

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copiar el proyecto
COPY . .

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

RUN php artisan optimize

# Imagen final
FROM php:8.2-fpm

# Instalar Nginx
RUN apt-get update && apt-get install -y nginx

WORKDIR /var/www

COPY --from=build /var/www /var/www

COPY ./docker/nginx.conf /etc/nginx/sites-available/default

RUN chown -R www-data:www-data /var/www

EXPOSE 80

CMD ["sh", "-c", "service nginx start && php-fpm"]