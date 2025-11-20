FROM php:8.2-fpm

# Instalar extensiones
RUN apt-get update && apt-get install -y \
    zip unzip curl libonig-dev libzip-dev \
    && docker-php-ext-install pdo pdo_mysql

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copiar archivos del proyecto
COPY . .

# Instalar dependencias
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Permisos Laravel
RUN chmod -R 775 storage bootstrap/cache

CMD ["php-fpm"]