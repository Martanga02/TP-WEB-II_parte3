
## Endpoints

### Autenticación

**GET /auth/login**
Obtener un token JWT utilizando **Basic Auth**.

---

### Categorías (público)

**GET /categoria** — listar categorías.
Permite filtrado opcional:

* `GET /categoria?nombre=texto`

**GET /categoria/:id** — ver una categoría por ID.

---

### Categorías (protegido — requiere JWT)

**POST /categoria** — crear una nueva categoría.
Requiere header:

```
Authorization: Bearer <token>
```

---

## Películas

### Películas (público)

**GET /peliculas** — listar todas las películas.
Permite filtrado opcional (si tu controlador lo soporta):

* `GET /peliculas?titulo=texto`
* `GET /peliculas?categoria=ID`

**GET /peliculas/:id** — obtener una película por ID.

---

### Películas (protegido — requiere JWT)

**PUT /peliculas/:id** — actualizar una película existente.
Requiere header:

```
Authorization: Bearer <token>
```

