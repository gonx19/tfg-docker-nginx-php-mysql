FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql

# Crear usuario sin privilegios para ejecutar la app
RUN useradd -u 1001 -r -s /sbin/nologin appuser \
    && chown -R appuser:appuser /var/www/html

COPY --chown=appuser:appuser ./app /var/www/html/

# Ejecutar Apache como usuario no-root
USER appuser
