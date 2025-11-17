# Etapa 1 — Dependencias de Laravel
FROM php:8.2-fpm AS build

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl

RUN docker-php-ext-install pdo pdo_mysql mbstring tokenizer xml pcntl

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copiar archivos del proyecto
COPY . .

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Optimizar Laravel
RUN php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear && \
    php artisan optimize


# Etapa 2 — Imagen final con Nginx + PHP-FPM
FROM php:8.2-fpm

# Instalar Nginx
RUN apt-get update && apt-get install -y nginx

WORKDIR /var/www

# Copiar archivos ya construidos de Laravel
COPY --from=build /var/www /var/www

# Copiar configuración Nginx
COPY ./docker/nginx.conf /etc/nginx/sites-available/default

# Permisos
RUN chown -R www-data:www-data /var/www

EXPOSE 80

CMD service nginx start && php-fpm