# Utiliza la imagen oficial de MariaDB
FROM mariadb:latest

# Establece las variables de entorno para la configuración de MariaDB
ENV MYSQL_ROOT_PASSWORD=m1_s3cr3t

# Expone el puerto 3306 para permitir conexiones a la base de datos
EXPOSE 3306
