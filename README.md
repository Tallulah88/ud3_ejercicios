## Respuestas al Ejercicio 4

1. ¿Qué hace el método `create` de la clase `Schema`?
   - Define una nueva tabla en la base de datos con las columnas y configuraciones especificadas.

2. ¿Qué hace `$table->string('email')->primary();`?
   - Crea una columna de texto llamada `email` y la define como clave primaria.

3. ¿Cuántas tablas hay definidas? Indica el nombre de cada tabla.
   - Hay 8 tablas definidas:
     - `users`
     - `password_reset_tokens`
     - `sessions`
     - `cache`
     - `cache_locks`
     - `jobs`
     - `job_batches`
     - `failed_jobs`

## Respuestas al Ejercicio 5

1. ¿Cuántas tablas aparecen ahora?
   - Ahora hay 9 tablas definidas, estando la nueva de `migrations`:
     - `users`
     - `password_reset_tokens`
     - `sessions`
     - `cache`
     - `cache_locks`
     - `jobs`
     - `job_batches`
     - `failed_jobs`
     - `migrations`

## Respuestas al Ejercicio 6

1. `php artisan migrate`
   - Ejecuta todas las migraciones pendientes.

2. `php artisan migrate:status`
   - Muestra el estado de las migraciones (ejecutadas o pendientes).

3. `php artisan migrate:rollback`
   - Revierte la última tanda de migraciones ejecutadas.

4. `php artisan migrate:reset`
   - Revierte todas las migraciones.

5. `php artisan migrate:refresh`
   - Revierte todas las migraciones y las ejecuta nuevamente desde el inicio.

6. `php artisan make:migration`
   - Crea un nuevo archivo de migración.

7. `php artisan migrate --seed`
   - Ejecuta las migraciones y luego los seeders configurados.
