# Usa PHP 8.3 con Apache
FROM php:8.3-apache

# Instalación de dependencias
RUN apt update && apt install -y \
    zip unzip git curl libpng-dev libonig-dev \
    && apt clean && rm -rf /var/lib/apt/lists/*

# Instalar extensiones PHP necesarias para Laravel
ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN install-php-extensions pdo pdo_mysql mbstring gd intl bcmath zip opcache

# Habilitar mod_rewrite en Apache (para que Laravel funcione bien con URLs amigables)
RUN a2enmod rewrite

# Configurar el directorio raíz de Apache para servir Laravel correctamente
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copiar los archivos de Laravel al contenedor
COPY . /var/www/html

# Establecer el directorio de trabajo en Laravel
WORKDIR /var/www/html

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Establecer permisos correctos
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 777 storage bootstrap/cache

# Generar clave de aplicación y cachear configuración
RUN php artisan key:generate
RUN php artisan config:cache
RUN php artisan route:cache

# Exponer el puerto de Apache
EXPOSE 80

# Iniciar Apache en primer plano
CMD ["apache2-foreground"]
