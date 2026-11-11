# Hospedagem alternativa (Render, Koyeb, Fly...) do site PHP. Mesmo banco TiDB da Vercel.
FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql mysqli \
 && a2enmod rewrite headers

# VERCEL=1 liga o modo de produção do código: TiDB com SSL e cookies seguros (HTTPS).
ENV VERCEL=1

# Tudo que não for arquivo existente cai no index.php, como no vercel.json.
RUN printf '<Directory /var/www/html>\n  AllowOverride None\n  Require all granted\n  RewriteEngine On\n  RewriteCond %%{REQUEST_FILENAME} !-f\n  RewriteCond %%{REQUEST_FILENAME} !-d\n  RewriteRule ^ /index.php [L]\n</Directory>\n' > /etc/apache2/conf-available/app.conf \
 && a2enconf app

COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html/uploads 2>/dev/null || true

# Render/Koyeb passam a porta em $PORT.
CMD ["sh", "-c", "sed -i \"s/Listen 80/Listen ${PORT:-80}/; s/:80>/:${PORT:-80}>/\" /etc/apache2/ports.conf /etc/apache2/sites-enabled/000-default.conf && apache2-foreground"]
