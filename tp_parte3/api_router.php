<?php
require_once './libs/router/router.php';

require_once './libs/jwt/jwt.middleware.php';

require_once './app/middlewares/guard-api.middleware.php';
require_once './app/controllers/categories-api.controller.php';
require_once 'app/controllers/pelicula.api.controller.php';
require_once './app/controllers/auth-api.controller.php';

// instancio el router
$router = new Router();

// --- Middleware que valida el token JWT (para todos los endpoints) ---
$router->addMiddleware(new JWTMiddleware());

// --- Rutas públicas de categorias ---
$router->addRoute('auth/login', 'GET', 'AuthApiController', 'login');
$router->addRoute('categoria', 'GET', 'CategoryApiController', 'getCategories');
$router->addRoute('categoria/:id', 'GET', 'CategoryApiController', 'getCategory');
// --- Rutas de películas ---
$router->addRoute('peliculas', 'GET', 'PeliculaApiController', 'getAll');
$router->addRoute('peliculas/:id', 'PUT', 'PeliculaApiController', 'update');

// --- Middleware que exige autenticación y rol válido ---
$router->addMiddleware(new GuardMiddleware());

// --- Rutas protegidas ---
$router->addRoute('categoria', 'POST', 'CategoryApiController', 'insertCategory');

// --- Ejecuta el enrutamiento ---
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);