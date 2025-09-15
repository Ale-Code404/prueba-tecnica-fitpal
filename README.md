# Technical Test - Fitpal (Laravel API)

**Premisa:** Desarrollar una API para la creación y gestión de cursos y usuarios, incluyendo autenticación y administración de recursos.

## Stack

-   PHP 8.4
-   Laravel 12
-   MySQL 8.0
-   Redis
-   Docker

## Objetivo y funcionalidades

El sistema de gestión de cursos y horarios es una herramienta para la asignación de horarios a diversas clases por parte de docentes, de manera que un estudiante puede tomar una o varias clases en el horario que más le parezca.

Este sistema puede ser esencialmente util de integrar en instituciones educativas o ambientes de asignación de encuentros como talleres o convenciones al proveer una forma sencilla de apuntarse a una clase o curso, con un dia de inicio y un horario establecido.

## Arquitectura de la solución

La solución está basada en una arquitectura de servicios desacoplados, orientados a una sola responsabilidad y utilizando el patrón repositorio para la abstracción de la capa de datos. Esto permite mayor mantenibilidad, escalabilidad y facilidad de pruebas.

Los contextos del sistema estan diseñados sobre la arquitectura DDD, dicha visión promueve el desacoplamiento con la infraestructura del sistema y facilita la migración y desarrollo del sistema a largo plazo al no depender de la implementación.

En **/app** se encuentran los controladores HTTP, modelos Eloquent, providers y requests. La lógica de negocio y los repositorios se encuentran en **/src**, siguiendo una estructura de carpetas por contexto de dominio:

```
├── app
│   ├── Console
│   ├── Http
│   │   ├── Controllers
│   │   └── Requests
│   ├── Models
│   └── Providers
├── src
│   ├── Auth
│   ├── Course
│   ├── User
│   └── Shared
```

Los servicios de dominio, DTOs, casos de uso y repositorios se ubican en **src/**, mientras que la capa de infraestructura y las implementaciones concretas de los repositorios se encuentran en subcarpetas `Infra` y `Persistence`.

## Ejecución del proyecto

Este proyecto utiliza Docker para facilitar la ejecución de las dependencias necesarias. Los comandos principales son:

```bash
docker compose up --build -d
```

Ejecutar las migraciones y los seeders:

```bash
docker compose exec app php artisan migrate --seed
```

Genera un par de llaves y un cliente para los tokens de acceso

```bash
docker compose exec -it app php artisan passport:keys --force && php artisan passport:client --personal
```

Si todo sale bien, la API estará disponible en **http://localhost:8080**

## Paso a paso sugerido

1. Arranca el proyecto usando Docker
2. Ejecuta migraciones y seeders
3. Crea un cliente para generar los tokens de acceso.
4. Puedes acceder usando el usuario administrador por defecto (desde los seeders, contraseña **password**)

## Componentes del sistema

-   [x] Pruebas de integración
-   [x] Redis para caching
-   [x] Uso de capas/responsabilidades bien marcadas
-   [x] Documentación técnica de la API autogenerada en **/docs/api**
-   [x] Desarrollo de una API con GraphQL para el manejo cursos y horarios

## Documentación y pruebas

La documentación de la API se genera automáticamente y está disponible en **https://localhost:8080/docs/api**. Permite probar los endpoints y visualizar los esquemas de peticiones y respuestas.

La herramientra de prueba y visualización de la API GraphQL se encuentra en **https://localhost:8080/graphiql**

### Ejecutar las pruebas

```bash
docker compose exec -it app php artisan test
```
