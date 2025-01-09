# Way of Working

Este proyecto está diseñado para gestionar notas, asignaturas y alumnos mediante una API REST creada en Laravel. A continuación, se describen los requisitos tecnológicos, la configuración necesaria y los pasos a seguir para poner en funcionamiento la aplicación.

## Requisitos Tecnológicos

### Docker
- Utilizado para configurar y ejecutar el contenedor de la base de datos MariaDB.
- Asegúrate de tener Docker instalado en tu sistema. Puedes descargarlo desde [Docker](https://www.docker.com/).

### Composer
- Necesario para gestionar las dependencias de Laravel.
- Asegúrate de tener Composer instalado. Descárgalo desde [Composer](https://getcomposer.org/).

### PHP
- Requiere PHP >= 8.1 con las extensiones necesarias para Laravel.

### Postman
- Utilizado para probar los endpoints de la API.
- El archivo de colección de Postman, Gestion Notas API.postman_collection.json, se encuentra en la raíz del proyecto.

---

## Pasos para Configurar el Entorno

### 1. Clonar el Repositorio

Clona el proyecto desde el repositorio GitHub:

```bash
git clone <URL_DEL_REPOSITORIO>
cd <NOMBRE_DEL_PROYECTO>
```

### 2. Configurar Docker para la Base de Datos

Construye la imagen de MariaDB desde el Dockerfile:

```bash
docker build -t mariadb-custom .
```

Inicia el contenedor de la base de datos:

```bash
docker run -d --name mariadb-server -e MYSQL_ROOT_PASSWORD=m1_s3cr3t -e MYSQL_DATABASE=gestion_notas -p 3306:3306 mariadb-custom
```

### 3. Conectar a la Base de Datos

Para conectarte al contenedor MariaDB:

```bash
docker exec -it mariadb-server mariadb -u root -p
```

Cuando te pida la contraseña, introduce: `m1_s3cr3t`.

Comandos útiles dentro de MariaDB:

```sql
SHOW DATABASES;
USE gestion_notas;
SHOW TABLES;
```

### 4. Configurar el Archivo .env

Copia el archivo `.env.example` y renómbralo como `.env`:

```bash
cp .env.example .env
```

Asegúrate de configurar las siguientes líneas en el archivo `.env` para conectar Laravel a la base de datos:

```env
DB_CONNECTION=mariadb
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestion_notas
DB_USERNAME=root
DB_PASSWORD=m1_s3cr3t
```

Genera la clave de la aplicación:

```bash
php artisan key:generate
```

### 5. Instalar las Dependencias

Ejecuta el siguiente comando para instalar todas las dependencias del proyecto:

```bash
composer install
```

### 6. Migrar las Tablas y Poblar la Base de Datos

Ejecuta las migraciones para crear las tablas necesarias:

```bash
php artisan migrate
```

Puebla la base de datos con datos de prueba:

```bash
php artisan db:seed
```

### 7. Iniciar el Servidor de Desarrollo

Inicia el servidor de Laravel:

```bash
php artisan serve
```

El servidor estará disponible en: [http://127.0.0.1:8000](http://127.0.0.1:8000).

---

## Pruebas con Postman

El archivo `Gestion Notas API.postman_collection.json` contiene todas las consultas necesarias para probar los endpoints. Este archivo se encuentra en la raíz del proyecto.

### Cómo Importar el Archivo en Postman

1. Abre Postman.
2. Haz clic en **Import**.
3. Selecciona el archivo `Gestion Notas API.postman_collection.json`.
4. Prueba los endpoints utilizando las rutas documentadas.

---

## Pruebas de la Base de Datos con Tinker

Tinker es una herramienta interactiva de Laravel que permite ejecutar comandos PHP en el contexto de la aplicación. A continuación, se detallan las pruebas que puedes realizar para verificar las relaciones y datos de la base de datos.

### Acceso a Tinker

Ejecuta el siguiente comando para iniciar Tinker desde la raíz del proyecto:

```bash
php artisan tinker
```

Una vez dentro de Tinker, puedes interactuar con los modelos, ejecutar consultas y verificar las relaciones.

### Pruebas de Relaciones

#### 1. Relación Many-to-Many (Alumno ↔ Asignatura a través de Notas)

Obtener un alumno y verificar las asignaturas asociadas:

```php
use App\Models\Alumno;
$alumno = Alumno::find(1); // Cambia el ID según los datos de prueba
$asignaturas = $alumno->asignaturas;
$asignaturas->toArray(); // Para visualizar las asignaturas en formato array
```

Obtener una asignatura y verificar los alumnos asociados:

```php
use App\Models\Asignatura;
$asignatura = Asignatura::find(1); // Cambia el ID según los datos de prueba
$alumnos = $asignatura->alumnos;
$alumnos->toArray(); // Para visualizar los alumnos en formato array
```

Verificar las notas de un alumno en cada asignatura:

```php
foreach ($alumno->asignaturas as $asignatura) {
    echo "Asignatura: " . $asignatura->nombre . ", Nota: " . $asignatura->pivot->nota . "\n";
}
```

#### 2. Relación One-to-One (Alumno ↔ Perfil)

Obtener un alumno y verificar su perfil:

```php
$perfil = $alumno->perfil;
$perfil->toArray(); // Para visualizar el perfil en formato array
```

Verificar que un perfil pertenece a un alumno:

```php
use App\Models\Perfil;
$perfil = Perfil::find(1); // Cambia el ID según los datos de prueba
$alumno = $perfil->alumno;
$alumno->toArray();
```

#### 3. Relación One-to-Many (Alumno ↔ Posts)

Obtener un alumno y verificar sus posts:

```php
$posts = $alumno->posts;
$posts->toArray(); // Para visualizar los posts en formato array
```

Verificar que un post pertenece a un alumno:

```php
use App\Models\Post;
$post = Post::find(1); // Cambia el ID según los datos de prueba
$alumno = $post->alumno;
$alumno->toArray();
```

#### 4. Relación Many-to-One (Notas ↔ Alumno y Asignatura)

Verificar la relación entre una nota, un alumno y una asignatura:

```php
use App\Models\Nota;
$nota = Nota::find(1); // Cambia el ID según los datos de prueba
$alumno = $nota->alumno;
$asignatura = $nota->asignatura;
$alumno->toArray();
$asignatura->toArray();
```

Verificar todas las notas de una asignatura:

```php
$notas = $asignatura->notas;
$notas->toArray();
```

---

## Detalles Adicionales

### Comandos útiles

- Limpiar la caché:

```bash
php artisan cache:clear
php artisan route:clear
php artisan config:clear
```

- Ver las rutas registradas:

```bash
php artisan route:list
```

### Estructura del proyecto

- `routes/api.php`: Archivo donde están definidas todas las rutas de la API.
- `app/Http/Controllers`: Controladores para manejar la lógica de los endpoints.
- `database/migrations`: Migraciones para crear las tablas de la base de datos.
- `database/seeders`: Seeders para poblar la base de datos con datos de prueba.

### Credenciales de la base de datos

- **Usuario**: root
- **Contraseña**: m1_s3cr3t

---

## Respuestas al Ejercicio 4

1. **¿Qué hace el método `create` de la clase `Schema`?**
   - Define una nueva tabla en la base de datos con las columnas y configuraciones especificadas.

2. **¿Qué hace `$table->string('email')->primary();`?**
   - Crea una columna de texto llamada `email` y la define como clave primaria.

3. **¿Cuántas tablas hay definidas? Indica el nombre de cada tabla.**
   - Hay 8 tablas definidas:
     - users
     - password_reset_tokens
     - sessions
     - cache
     - cache_locks
     - jobs
     - job_batches
     - failed_jobs

## Respuestas al Ejercicio 5

1. **¿Cuántas tablas aparecen ahora?**
   - Ahora hay 9 tablas definidas, estando la nueva de migrations:
     - users
     - password_reset_tokens
     - sessions
     - cache
     - cache_locks
     - jobs
     - job_batches
     - failed_jobs
     - migrations

## Respuestas al Ejercicio 6

1. **`php artisan migrate`**
   - Ejecuta todas las migraciones pendientes.

2. **`php artisan migrate:status`**
   - Muestra el estado de las migraciones (ejecutadas o pendientes).

3. **`php artisan migrate:rollback`**
   - Revierte la última tanda de migraciones ejecutadas.

4. **`php artisan migrate:reset`**
   - Revierte todas las migraciones.

5. **`php artisan migrate:refresh`**
   - Revierte todas las migraciones y las ejecuta nuevamente desde el inicio.

6. **`php artisan make:migration`**
   - Crea un nuevo archivo de migración.

7. **`php artisan migrate --seed`**
   - Ejecuta las migraciones y luego los seeders configurados.

## Respuesta al Ejercicio 8

### ¿Qué pasos debemos dar si queremos añadir el campo `$table->string('apellido');` a la tabla alumnos?

1. **Crear una nueva migración para modificar la tabla:**
   - Ejecutar el comando:

```bash
php artisan make:migration add_apellido_to_alumnos_table --table=alumnos
```

2. **Editar la migración:**
   - Abrir el archivo generado en `database/migrations/<timestamp>_add_apellido_to_alumnos_table.php`.
   - Añadir el siguiente código en la función `up()` para agregar la columna:

```php
Schema::table('alumnos', function (Blueprint $table) {
    $table->string('apellido')->after('nombre')->nullable(); // Añade la columna apellido
});
```

   - En la función `down()`, eliminar la columna:

```php
Schema::table('alumnos', function (Blueprint $table) {
    $table->dropColumn('apellido'); // Elimina la columna apellido
});
```

3. **Ejecutar la migración:**
   - Ejecutar el comando:

```bash
php artisan migrate
```

4. **Verificar la columna:**
   - Conectarse a la base de datos y verificar que la tabla `alumnos` incluye la columna `apellido`:

```sql
USE test2;
DESCRIBE alumnos;
