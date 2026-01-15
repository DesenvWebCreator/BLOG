FROM php:8.2-apache

# Instala a extensão necessária para o PHP conectar ao banco MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Copia todos os arquivos do seu blog para o servidor
COPY . /var/www/html/

# Dá permissão para o Apache ler os arquivos
RUN chown -R www-data:www-data /var/www/html/