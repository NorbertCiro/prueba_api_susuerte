# Proyecto PHP con Docker

Este es un proyecto PHP que utiliza Docker para facilitar el desarrollo y despliegue. Incluye funcionalidades de CRUD, consumo de una API pública. El proyecto está estructurado siguiendo el patrón MVC y utiliza MySQL para el almacenamiento de datos.

## Requisitos

- Docker
- Docker Compose

## Estructura del Proyecto

- **`docker-compose.yml`**: Define los servicios de Docker para PHP, MySQL y phpMyAdmin.
- **`Dockerfile`**: Configura el entorno de PHP con Apache.
- **`config/database.php`**: Configuración de la conexión a la base de datos.
- **`controllers/UserController.php`**: Controlador para manejar las solicitudes de usuario.
- **`models/UserModel.php`**: Modelo para interactuar con la base de datos.
- **`views/`**: Vistas para la aplicación.
- **`index.php`**: Punto de entrada principal de la aplicación.

## Instalación

1. **Clona el repositorio:**

    ```bash
    git clone https://github.com/tu_usuario/tu_repositorio.git
    cd tu_repositorio
    ```

2. **Construye y despliega los contenedores con Docker Compose:**

    ```bash
    docker-compose up --build
    ```

    Este comando construye las imágenes de Docker y levanta los contenedores definidos en `docker-compose.yml`.

## Configuración

1. **Base de datos:**
   
   - MySQL está configurado en el archivo `docker-compose.yml` con el nombre `prueba_api_susuerte`.
   - Las credenciales están configuradas en `docker-compose.yml`.

2. **PHP:**
   
   - La configuración de PHP y Apache se maneja a través del `Dockerfile`.

## Uso

1. **Accede a la aplicación web:**

    Una vez que los contenedores estén en funcionamiento, puedes acceder a la aplicación web a través de (http://localhost:8000/app).

2. **phpMyAdmin:**

    Puedes acceder a phpMyAdmin en [http://localhost:8080](http://localhost:8080) para gestionar la base de datos.

## Desarrollo

- **Agregar un nuevo usuario:**
  
  Completa el formulario de creación de usuario en la página principal.

- **Editar un usuario existente:**
  
  Accede al formulario de edición desde la página de usuarios y actualiza la información del usuario.

- **Eliminar un usuario:**
  
  Utiliza el botón de eliminar en la lista de usuarios.

## Pruebas

Puedes realizar pruebas unitarias y funcionales para verificar el comportamiento de la aplicación. Asegúrate de que todas las dependencias estén instaladas y configuradas.

## Documentación

La documentación del proyecto está incluida en los comentarios del código fuente y en el archivo `README.md`.

