#!/bin/bash

# Update package list and install Apache and PHP
apt-get update
apt-get install -y apache2 libapache2-mod-php

# Enable mod_rewrite, required for CakePHP's routing
a2enmod rewrite

# Set up Apache virtual host configuration for CakePHP
cat << EOF > /etc/apache2/sites-available/000-default.conf
<VirtualHost *:80>
    # Set the DocumentRoot to CakePHP's webroot
    DocumentRoot /var/www/html/app/webroot

    <Directory /var/www/html/app/webroot>
        Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Require all granted
    </Directory>

    # Error log location
    ErrorLog \${APACHE_LOG_DIR}/error.log
    CustomLog \${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
EOF

# Restart Apache to apply the configuration changes
service apache2 restart
