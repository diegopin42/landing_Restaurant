FROM php:8.3-apache

# 1. Instalar dependencias del sistema y driver para PostgreSQL
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm \
    libpq-dev \
    git

# 2. Instalar extensiones de PHP necesarias
RUN docker-php-ext-install pdo pdo_pgsql mbstring gd

# 3. Habilitar mod_rewrite de Apache (Vital para las rutas de Laravel)
RUN a2enmod rewrite

# 4. Configurar Apache para que apunte a la carpeta /public de Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 5. Ajustar Apache para que escuche el puerto que Render nos asigne
RUN sed -i "s/Listen 80/Listen \${PORT}/g" /etc/apache2/ports.conf
RUN sed -i "s/:80/:\${PORT}/g" /etc/apache2/sites-available/000-default.conf

# 6. Preparar el directorio de trabajo y copiar archivos
WORKDIR /var/www/html
COPY . .

# 7. Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 8. Instalar dependencias de PHP SIN ejecutar scripts automáticos (Evita Error 1)
RUN composer install --no-dev --no-scripts --optimize-autoloader

# 9. Instalar dependencias de Node y compilar assets (Tailwind/Vite)
RUN npm install && npm run build

# 10. Configurar permisos para storage y cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# 11. Comando de inicio (Runtime)
# Aquí es donde Laravel ya tiene acceso a la DB de Render para migrar y descubrir paquetes
CMD php artisan package:discover --ansi && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan migrate --force && \
    apache2-foreground
