FROM php:8.2-apache

# Instala tanto o PDO quanto o MYSQLI (para garantir que seu código funcione)
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Copia os arquivos
COPY . /var/www/html/

# Permissões
RUN chmod -R 755 /var/www/html/