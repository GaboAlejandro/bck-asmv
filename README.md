# bck-asmv
Appointments for dead

This project was generated with [Laravel] version 5.8.27.

Control de versiones
Version	Description
0.0.1	Version inicial proyecto separado por modulos BACKEND
Pre-Requesitos
[Laravel] version 5.8.27.

MySQL

COMPOSER

GIT

Para instalar y ejecutar proyecto

  git clone https://github.com/GaboAlejandro/bck-asmv.git
  
  cd rsp-back
 
  composer install
  
  rename .env.example .env
    -> Change DB_DATABASE: my_database
    -> Change DB_USERNAME: my_user
 
  php artisan migrate
  
  php artisan key:generate
  
  php artisan serve
