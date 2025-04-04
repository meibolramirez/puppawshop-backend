# 🐾 PupPawShop - E-Commerce Backend

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Livewire](https://img.shields.io/badge/Livewire-4e56a6?style=for-the-badge&logo=livewire&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)

Aplicación de página única *(Single Page Application)* de comercio electrónico especializada en productos para mascotas. \
Cuenta con un panel de administración para la gestión de productos y categorías.

## Instalación y configuración

### Requisitos de sistema
- PHP ^8.2
- MySQL ^5.7
- Composer ^2.5
- Node.js ^18

### Instalación
```
# Clonar repositorio 
git clone git@github.com:meibolramirez/puppawshop-backend.git
cd puppawshop-backend

# Instalar dependencias
composer install
npm install && npm run build

# Configurar ambiente local
cp .env.example .env
php artisan key:generate
```
### Configuración de base de datos
```
# Crear base de datos (MySQL)
mysql -u root -p -e "CREATE DATABASE puppawshop"

# Update .env
DB_DATABASE=puppawshop
DB_USERNAME=root
DB_PASSWORD=

# Ejecutar migraciones
php artisan migrate --seed
```

### Ejecución del proyecto
```
# Inicializar servidor local
php artisan serve

# Assets de frontedn (modo dev)
npm run dev

# O para producción
npm run build
```

## ✨ Funcionalidades

### Panel de Administración
- **Gestiónd de Productos** (operaciones CRUD)
  - Ver listado de productos con sus imágenes
  - Agregar un nuevo producto
      - Con validaciones de campos del formulario 
  - Editar producto existente
    - Con validaciones de campos del formulario
  - Eliminar productos
      - Prompt de confirmación de eliminación
           
- **Gestión de Categorías** (opearaciones CRUD)
  - Ver listado de categorías
  - Agregar un nueva categoría
      - Con validaciones de campos del formulario 
  - Editar categoría existente
    - Con validaciones de campos del formulario
  - Eliminar categorías
      - Prompt de confirmación de eliminación 

### Tienda
- Navegación
  - Página principal con los productos por categoría
  - Productos: página con todos los productos existentes
  - Detalle de producto: página con los detalles del producto específico con enlace a productos relacionados por categoría

- Autenticación
  - Inicio de sesión
    - Si el rol del usuario es administrador-> Panel de Administración
    - Si el rol del usuario es usuario-> Tienda
  - Cerrar sesión         

- Carrito de compra
  - Agregar al producto al carrito
    - Redirecionamiento a autenticación de usuario
    - Detalle y conteo de productos agregados al carrito
      - Modificación de cantidad de productos  

## 🛠️ Tecnologías utilizadas

| Tecnología | Propósito |
|------------|---------|
| Laravel 11 | Framework PHP |
| Livewire 3 | Componentes frontend reactivos |
| MySQL | Almacenamiento de bases de datos |
| Tailwind CSS | Estilos |
| Alpine.js | Elementos de interfaz interactivos |
| Laravel Sanctum | Autenticación de API |

## Modelos y componentes

### Modelos

- Productos
- Categorías
- Usuarios
- Carrito

Para la creación de los modelos se utiliza artisan
```
php artisan make:model NombreModelo -m
```
El parámetro -m se pasa para crear las migraciones del modelo junto con el mismo

**Ejemplo modelo producto**

![image](https://github.com/user-attachments/assets/57bb8d9a-61fa-487f-a0dc-32d81491ab53)

### Migraciones

Las migraciones se crearon en conjunto con los modelos. Para cada modelo hay una migración para crear la tabla correspondiente al modelo con las columnas necesarias.

**Ejemplo migración productos**

![image](https://github.com/user-attachments/assets/3bdcb852-e7d0-4c0d-abee-f80b9521d683)

### Componentes y vistas

Para la creación de las vistas y componentes se utiliza livewire

```
php artisan livewire:make Componente
```
Se crea tanto el componente como la vista. Un archivo .php de construccióncomponente y otro .blade.php de la vista html.

**Ejemplo de componentes  vistas**

Componente de 'agregar Categoría en el panel de Administración'

![image](https://github.com/user-attachments/assets/0c494050-7681-4bb3-8d2e-03a53ba7e004)

Vista de 'agregar Categoría en el panel de Administración'

![image](https://github.com/user-attachments/assets/f2cb3a7a-64f8-4069-90cd-ea7bdec7e2b8)

### Middlewares y Rutas

### Layouts

El sistema tiene dos layouts
- Para los componentes de la tienda
  - Header, footer 
- Para los componentes del panel de Administración
  - Componente con código html para el menú del panel 

### Middleware

El sistema sólo tiene un middleware para verificar si el usuario logueado tiene rol de administrador o no

![image](https://github.com/user-attachments/assets/039ae7e5-9ec1-4ef4-a072-52a84401cff4)

### Rutas

Se configuran rutas para el direccionamiento. Las rutas del panel de administración están agrupadas por el middleware para el usuario administrador.

![image](https://github.com/user-attachments/assets/3ccf544e-cb49-435b-aa9e-1f004ff4ab19)

## Screenshots

### Para guests y usuarios no administradores

**Página Principal**

![image](https://github.com/user-attachments/assets/6d07db8d-c091-4d12-ac21-ddc08caba2b4)

**Detalle de Producto**

![image](https://github.com/user-attachments/assets/836fb320-7abe-45fa-9985-5cceb89bdbd4)

** Inicio de Sesión **
Agregar al carrito como usuario no logueado, redirecciona al login

![image](https://github.com/user-attachments/assets/96f21eb0-4f64-45a9-80af-e3da5d1a7c6f)

Una vez logueado se puede ver el carrito y el botón de cerrar sesión

![image](https://github.com/user-attachments/assets/dadc4353-0980-48d1-8c2e-3bb271296313)

Al ir al carrito se observa el producto agregado

![image](https://github.com/user-attachments/assets/fc7fcc87-b4f7-47ee-b462-51994514eb64)

El logout redicciona a la página principal

![image](https://github.com/user-attachments/assets/e3ea5395-d71e-4d6e-90b3-9b5fca7a966a)

Al darle click en Iniciar Sesión e iniciar sesion con usuario administrador, redirecciona al panel de administración

![image](https://github.com/user-attachments/assets/e518677a-44ca-417b-97d2-a003d15034c0)

![image](https://github.com/user-attachments/assets/a4bef0ce-4c19-4adf-9995-bdca6bc378f8)

**Panel de Administració**

**Productos**

Listado

![image](https://github.com/user-attachments/assets/7584a1cb-6c3b-4ab9-83e6-37285d9ddbaf)

Editar

![image](https://github.com/user-attachments/assets/630f20d9-d1ad-4e3b-9030-70a0c414fb82)

Eliminar

![image](https://github.com/user-attachments/assets/644567d4-cb85-4888-b378-25795710c255)

**Categorías**

Listado

![image](https://github.com/user-attachments/assets/3d30ad65-96f1-4cd0-9aeb-c3ee16697664)

Editar

![image](https://github.com/user-attachments/assets/27f8696e-9193-4ab8-832e-a755a172b575)

Eliminar

![image](https://github.com/user-attachments/assets/4670b078-1530-4136-bf97-a1609a9cb178)

## Licencia
Fines académicos









