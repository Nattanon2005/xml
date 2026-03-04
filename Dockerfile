FROM php:8.2-apache

# เปิด mod_rewrite
RUN a2enmod rewrite

# คัดลอกไฟล์ทั้งหมดไปยัง Apache
COPY . /var/www/html/

# เปิด port 80
EXPOSE 80