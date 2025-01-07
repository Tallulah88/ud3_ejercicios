## Respuestas al Ejercicio 4

1. ¿Qué hace el método `create` de la clase `Schema`?
   - Define una nueva tabla en la base de datos con las columnas y configuraciones especificadas.

2. ¿Qué hace `$table->string('email')->primary();`?
   - Crea una columna de texto llamada `email` y la define como clave primaria.

3. ¿Cuántas tablas hay definidas? Indica el nombre de cada tabla.
   - Hay 11 tablas definidas:
     - `users`
     - `password_reset_tokens`
     - `sessions`
     - `cache`
     - `cache_locks`
     - `jobs`
     - `job_batches`
     - `failed_jobs`
