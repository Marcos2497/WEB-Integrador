# Proyecto Integrador (LogicRoute): Diseño y Aplicaciones en la WEB

## 🚀 ¡Bienvenido al Proyecto `LogicRoute`!

Este repositorio contiene la implementación del caso integrador de **Diseño y Aplicaciones en la WEB**, desarrollado en **Laravel 11, PHP 8.2.12+, Livewire 3 y MariaDB/MySQL**.

El objetivo es desarrollar un sistema de logística de transporte de alimentos balanceados, permitiendo el manejo de usuarios con sus respectivos roles y permisos, gestión de tipo de alimentos, alimentos, stock, y galpones.

---

## 🛠️ Requisitos del Sistema

Asegúrate de tener instalado lo siguiente para correr el proyecto:

- **PHP:** Versión `8.2` o superior.
- **Composer:** Última versión.
- **Node.js y NPM:** Para la compilación de assets frontend (Vite).
- **MariaDB / MySQL Server:** Para la base de datos.
- **Git:** (Recomendado para clonar el repositorio).

> **Recomendación:** Para Windows, **Laragon** o **XAMPP** simplifican la configuración de PHP, Composer, Node.js y el servidor de base de datos.

---
## ⚙️ Configuración y Ejecución del Proyecto

Sigue estos pasos para poner en marcha el proyecto en tu máquina local:

### 1. Clonar el Repositorio

Si aún no lo tienes, clona el proyecto desde tu sistema de control de versiones (por ejemplo, Git):

```bash
git clone https://github.com/Marcos2497/WEB-Integrador
cd WEB-Integrador
```

### 2. Instalar Dependencias de PHP
Usa Composer para instalar todas las dependencias de Laravel
```bash
composer install 
```

### 3. Configurar el Archivo `.env`
```bash
cp .env.example .env
```
### 4. Generar la Clave de Aplicación

Laravel necesita una clave de aplicación única para la seguridad:
```bash
php artisan key:generate
```

### 5. Ejecutar las Migraciones de Base de Datos
Esto creará las tablas necesarias en tu base de datos:
```bash
php artisan migrate --seed
``` 

### 6. Instalar Dependencias de Frontend

Para compilar los assets de frontend (Vite), instala las dependencias de Node.js:
```bash
npm install
```

### 7. Iniciar el Servidor de Desarrollo
Finalmente, inicia el servidor de desarrollo de Laravel:
```bash
php artisan serve
```
### 8. Iniciar el Servidor Frontend con vite
```bash
npm run dev
```

Ahora puedes acceder a la aplicación en tu navegador, usualmente en http://127.0.0.1:8000 o http://localhost:8000.

