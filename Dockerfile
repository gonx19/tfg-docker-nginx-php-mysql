FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql

# Crear usuario sin privilegios para los workers de Apache
RUN useradd -u 1001 -r -s /sbin/nologin appuser

# Configurar Apache para que los workers corran como appuser
ENV APACHE_RUN_USER=appuser
ENV APACHE_RUN_GROUP=appuser

COPY --chown=appuser:appuser ./app /var/www/html/
