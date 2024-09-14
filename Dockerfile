# Usa una imagen base oficial de PHP con Apache
FROM php:8.0-apache

# Instala extensiones necesarias para tu aplicación PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copia los archivos del proyecto al contenedor
COPY index.php /var/www/html/
# COPY ./public /var/www/html/public/

# Copia el archivo de configuración del Apache
# COPY ./config/apache2.conf /etc/apache2/sites-available/000-default.conf

# Configura los permisos para los archivos de la aplicación
RUN chown -R www-data:www-data /var/www/html

# Habilita los módulos de Apache
RUN a2enmod rewrite

# Expone el puerto 80
EXPOSE 80
