FROM php:8.2-apache

# Instala a extensão para o MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Copia tudo para a pasta do servidor
COPY . /var/www/html/

# Dá permissão total de leitura para o Apache
RUN chmod -R 755 /var/www/html/

# Garante que o Apache procure o index.php mesmo que ele esteja em subpastas
RUN echo "DirectoryIndex index.php index.html" >> /etc/apache2/apache2.conf