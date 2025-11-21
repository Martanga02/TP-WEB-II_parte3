---

# Categorias REST API

Este repositorio contiene una API REST simple para gestionar categorías de películas (géneros).

## Qué hay en este proyecto

* `api_router.php` - Entry point para los endpoints de la API.
* `app/controllers/` - Controladores, por ejemplo `categories-api.controller.php`, `auth-api.controller.php`.
* `app/models/` - Modelos, por ejemplo `categories.model.php`, `user.model.php`.
* `app/middlewares/` - Middlewares utilizados por la API (JWT y Guard).
* `libs/router/` - Librería ligera de ruteo usada por este proyecto.
* `libs/jwt/` - Librería para manejar JWT.
* `database/peliculas_db.sql` - Script SQL para crear la base de datos.
* `.htaccess` - Reglas Apache para soportar URL semánticas.

## Librería de ruteo

Este proyecto usa una librería interna para rutear peticiones ubicada en `libs/router/`.
Consulta la documentación de la librería de ruteo aquí:

`libs/router/README.md`

---

# Endpoints

## Autenticación

### **GET /auth/login**

Obtener un token JWT utilizando Basic Auth.

---

## Categorías (público)

### **GET /categoria**

Listar categorías.

Parámetros opcionales:

* `GET /categoria?nombre=texto`

### **GET /categoria/:id**

Ver una categoría por ID.

---

## Categorías (protegido — requiere JWT)

### **POST /categoria**

Crear una nueva categoría.

Header requerido:

```
Authorization: Bearer <token>
```

---

# Películas

## Películas (público)

### **GET /peliculas**

Listar todas las películas.

Permite filtrado opcional:

* `GET /peliculas?titulo=texto`
* `GET /peliculas?categoria=ID`

### **GET /peliculas/:id**

Obtener una película por ID.

---

## Películas (protegido — requiere JWT)

### **PUT /peliculas/:id**

Actualizar una película existente.

Header requerido:

```
Authorization: Bearer <token>
```

---

# Rutas configuradas en `api_router.php`

```php
$router->addRoute('peliculas', 'GET', 'PeliculaApiController', 'getAll');
$router->addRoute('peliculas/:id', 'PUT', 'PeliculaApiController', 'update');

// --- Middleware que exige autenticación y rol válido ---
$router->addMiddleware(new GuardMiddleware());

// --- Rutas protegidas ---
$router->addRoute('categoria', 'POST', 'CategoryApiController', 'insertCategory');
```

---
