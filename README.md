#  Tienda CRUD — Laravel 10

  

Sistema de administración de clientes y productos construido con Laravel 10, siguiendo buenas prácticas de desarrollo y arquitectura MVC.

  

---
##  Tabla de Contenidos

- [Descripción](#descripción)
- [Tecnologías](#tecnologías)
- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Configuración](#configuración)
- [Uso](#uso)
- [Estructura del Proyecto](#estructura-del-proyecto)
- [Funcionalidades](#funcionalidades)
- [Convenciones de Commits](#convenciones-de-commits)
- [Autor](#autor)
---
##  Descripción

**Tienda CRUD** es una aplicación web desarrollada con Laravel 10 que permite gestionar clientes y productos a través de un CRUD completo (Crear, Leer, Actualizar, Eliminar). Incluye validaciones, mensajes flash, paginación y una interfaz limpia con Bootstrap 5, hecha como tarea escolar.

---
##  Tecnologías

| Tecnología      | Versión | Uso                      |
| --------------- | ------- | ------------------------ |
| PHP             | ^8.1    | Lenguaje de programación |
| Laravel         | ^10.0   | Framework backend        |
| MySQL           | 8.0+    | Base de datos            |
| Bootstrap       | 5.3     | Estilos y componentes UI |
| Bootstrap Icons | 1.11    | Iconografía              |
| Blade           | —       | Motor de plantillas      |
| Eloquent ORM    | —       | Interacción con la BD    |

---
##  Requisitos
  
Antes de instalar, asegúrate de tener:
- PHP >= 8.1
- Composer >= 2.x
- MySQL >= 8.0
- Node.js >= 16 (opcional, para assets)
- Git
---
##  Instalación
### 1. Clonar el repositorio
```bash

git clone https://github.com/TU_USUARIO/tienda-crud.git

cd tienda-crud

```
### 2. Instalar dependencias de PHP
```bash

composer install

```
### 3. Copiar el archivo de entorno
```bash

cp .env.example .env

```
### 4. Generar la clave de la aplicación
```bash

php artisan key:generate

```
### 5. Configurar la base de datos
Edita el archivo `.env` con tus credenciales de MySQL:

```env

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=tienda

DB_USERNAME=tu_usuario

DB_PASSWORD=tu_contraseña

```
### 6. Ejecutar las migraciones

```bash

php artisan migrate

```
### 7. Iniciar el servidor de desarrollo

```bash

php artisan serve

```

Visita `http://127.0.0.1:8000` en tu navegador. 

  

---
##  Configuración

### Variables de entorno principales

| Variable      | Descripción                | Ejemplo                |
| ------------- | -------------------------- | ---------------------- |
| `APP_NAME`    | Nombre de la aplicación    | `Tienda CRUD`          |
| `APP_ENV`     | Entorno de ejecución       | `local` / `production` |
| `APP_DEBUG`   | Modo debug                 | `true` / `false`       |
| `DB_DATABASE` | Nombre de la base de datos | `tienda`               |
| `DB_USERNAME` | Usuario de MySQL           | `root`                 |
| `DB_PASSWORD` | Contraseña de MySQL        | `secret`               |

---
##  Uso
### Módulo Clientes

| Acción     | URL                       | Descripción                           |
| ---------- | ------------------------- | ------------------------------------- |
| Listado    | `GET /clientes`           | Ver todos los clientes con paginación |
| Crear      | `GET /clientes/create`    | Formulario de nuevo cliente           |
| Guardar    | `POST /clientes`          | Almacenar nuevo cliente               |
| Ver        | `GET /clientes/{id}`      | Detalle de un cliente                 |
| Editar     | `GET /clientes/{id}/edit` | Formulario de edición                 |
| Actualizar | `PUT /clientes/{id}`      | Guardar cambios                       |
| Eliminar   | `DELETE /clientes/{id}`   | Eliminar cliente                      |

---
### Módulo Productos

| Acción     | URL                        | Descripción                            |
| ---------- | -------------------------- | -------------------------------------- |
| Listado    | `GET /productos`           | Ver todos los productos con paginación |
| Crear      | `GET /productos/create`    | Formulario de nuevo producto           |
| Guardar    | `POST /productos`          | Almacenar nuevo producto               |
| Ver        | `GET /productos/{id}`      | Detalle de un producto                 |
| Editar     | `GET /productos/{id}/edit` | Formulario de edición                  |
| Actualizar | `PUT /productos/{id}`      | Guardar cambios                        |
| Eliminar   | `DELETE /productos/{id}`   | Eliminar producto                      |

---
## Estructura del Proyecto
```css

tienda-crud/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── ClienteController.php       # CRUD Resource de clientes
│   │   │   └── ProductoController.php      # CRUD Resource de productos
│   │   └── Requests/
│   │       ├── StoreClienteRequest.php     # Validación al crear cliente
│   │       ├── UpdateClienteRequest.php    # Validación al editar cliente
│   │       ├── StoreProductoRequest.php    # Validación al crear producto
│   │       └── UpdateProductoRequest.php   # Validación al editar producto
│   ├── Models/
│   │   ├── Cliente.php                     # Modelo Eloquent de cliente
│   │   └── Producto.php                    # Modelo Eloquent de producto
│   └── Providers/
│       └── AppServiceProvider.php          # Configuración de paginación Bootstrap
├── database/
│   └── migrations/
│       ├── xxxx_create_cliente_table.php   # Migración tabla cliente
│       └── xxxx_create_producto_table.php  # Migración tabla producto
├── lang/
│   └── es/
│       └── validation.php                  # Mensajes de validación en español
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php               # Layout base con Bootstrap 5
│       ├── clientes/
│       │   ├── index.blade.php             # Listado de clientes
│       │   ├── create.blade.php            # Formulario de creación
│       │   ├── edit.blade.php              # Formulario de edición
│       │   └── show.blade.php              # Detalle del cliente
│       ├── productos/
│       │   ├── index.blade.php             # Listado de productos
│       │   ├── create.blade.php            # Formulario de creación
│       │   ├── edit.blade.php              # Formulario de edición
│       │   └── show.blade.php              # Detalle del producto
│       └── welcome.blade.php               # Dashboard principal
└── routes/

    └── web.php                             # Definición de rutas Resource

```

---  
##  Funcionalidades
### Clientes
-  Registro de clientes con nombre, apellidos y RFC
-  Validación de RFC único en base de datos
-  Listado paginado (10 por página)
-  Vista de detalle
-  Edición con validación inteligente (ignora el propio RFC al editar)
-  Eliminación con confirmación
### Productos
-  Registro de productos con nombre, categoría, cantidad y precio
-  Validaciones numéricas para cantidad y precio
-  Formato de precio con 2 decimales
-  Listado paginado (10 por página)
-  Vista de detalle
-  Edición y eliminación con confirmación
### General
-  Dashboard con conteo de clientes y productos
-  Mensajes flash de éxito/error
-  Validaciones en español con Form Requests
-  Paginación con Bootstrap 5
-  Navbar responsivo con sección activa destacada
-  Confirmación de eliminación con `confirm()`
-  Arquitectura MVC limpia
---
##  Buenas Prácticas Aplicadas

- **Form Requests** — Validaciones separadas del controlador
- **Route Model Binding** — Resolución automática de modelos por ID
- **Mass Assignment Protection** — Uso de `$fillable` en modelos
- **Conventional Commits** — Mensajes de commit estandarizados
- **DRY (Don't Repeat Yourself)** — Layout Blade compartido
- **MVC** — Separación clara de responsabilidades
---
##  Convenciones de Commits

Este proyecto sigue la convención [Conventional Commits](https://www.conventionalcommits.org/):

| Prefijo     | Uso                       |
| ----------- | ------------------------- |
| `feat:`     | Nueva funcionalidad       |
| `fix:`      | Corrección de errores     |
| `chore:`    | Tareas de mantenimiento   |
| `refactor:` | Refactorización de código |
| `docs:`     | Cambios en documentación  |
| `style:`    | Cambios de estilo/formato |

---
### Ejemplos usados en este proyecto

```css

chore: initial Laravel 10 project setup

chore: configure database connection for tienda MySQL database

feat: add migrations for cliente and producto tables

feat: add Eloquent models for Cliente and Producto

feat: add Form Request validations for Cliente and Producto

feat: add resource controllers for Cliente and Producto

feat: register resource routes for clientes and productos

feat: add base Blade layout with Bootstrap 5 and navbar

feat: add Blade views for Cliente CRUD (index, create, edit, show)

feat: add Blade views for Producto CRUD (index, create, edit, show)

feat: add dashboard, Spanish pagination and i18n validation messages

docs: add project README

```

---
##  Autor
Desarrollado como proyecto de aprendizaje de Laravel 10.

- GitHub: [@Girunx14](https://github.com/Girunx14)
---
##  Licencia

Este proyecto es de uso educativo y está bajo la licencia [MIT](https://opensource.org/licenses/MIT).