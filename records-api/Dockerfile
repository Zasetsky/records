FROM php:8.2-fpm

# Установка необходимых пакетов
RUN apt-get update && apt-get install -y \
	git \
	libpq-dev \
	zip unzip \
	&& docker-php-ext-install pdo pdo_pgsql

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
	&& composer --version

# Установка рабочей директории
WORKDIR /var/www/html

# Копирование исходников
COPY . .

# Настройка прав для nginx
RUN chown -R www-data:www-data /var/www/html \
	&& chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Копирование скрипта entrypoint
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Установка entrypoint
ENTRYPOINT ["sh", "/usr/local/bin/entrypoint.sh"]
