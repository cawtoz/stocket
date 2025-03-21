FROM php:8.3-apache

# Instalación de dependencias en el contenedor
RUN apt -y update; apt install -y openssl zip unzip git sqlite3
RUN apt clean && rm -rf /var/lib/apt/lists/*

# Instalación  de extensiones de PHP mediante helper docker-php-ext-install de la imagen
# https://github.com/mlocati/docker-php-extension-installer
ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN install-php-extensions bcmath gd imap intl sqlite3 tidy xsl zip curl odbc pgsql pdo_pgsql mysqli pdo_mysql

# Habilitar extension de Apache
RUN a2enmod rewrite

# Cambiar el Directorio Raíz de Apache
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

#  Copiar el Código de la Aplicación Laravel a una ruta dentro del contenedot 
COPY . /var/www/html

# Establecer el Directorio de Trabajo: Esto significa que todos los comandos posteriores que se ejecuten en el contenedor se harán desde este directorio
WORKDIR /var/www/html

# Instalación de composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalación de dependencias usando composer en el proyecto de laravel
RUN composer install

# Establecer permisos
RUN chown -R www-data:www-data /var/www/html/storage
RUN chown -R www-data:www-data /var/www/html/bootstrap/cache
RUN chmod -R 777 /var/www/html/storage
RUN chown -R 777 /var/www/html/bootstrap/cache

RUN php artisan key:generate
