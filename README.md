## Instalación del entorno

### Requisitos

- Instalar Docker y Docker-compose

- Instalar Composer

### Pasos para lanzar la demo

- Descargamos el proyecto.

> git clone https://github.com/MarkVue1989/NSTaskManagerBack

- Hacemos un docker compose up del docker-compose.yml del proyecto, aquí lanzamos la base de datos, hay que estar en el directorio del proyecto.

> docker compose up -d

- Instalamos las dependencias

> composer install

- Inicializamos el .env del proyecto, hay un fichero llamado .env.example con la información necesario, simplemente hacer una copia y renombrarlo como .env

- Arrancar el proyecto.

> php artisan serve

