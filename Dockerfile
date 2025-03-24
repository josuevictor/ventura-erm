# Usar uma imagem base do PHP com Apache
FROM php:8.2-apache

# Instalar dependências do sistema e extensões do PHP
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \  # Adicionado para suporte ao PostgreSQL
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd pdo pdo_pgsql  # Adicionado pdo_pgsql

# Habilitar o módulo do Apache rewrite
RUN a2enmod rewrite

# Copiar o conteúdo do projeto para o contêiner
COPY . /var/www/html

# Definir permissões
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Instalar o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar dependências do Composer
RUN composer install --optimize-autoloader --no-dev

# Expor a porta 80
EXPOSE 80
