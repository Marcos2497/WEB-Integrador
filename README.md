<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Integrador (LogicRoute): Diseño Y Aplicaciones en la WEB</title>
</head>
<body>
    <h1>Proyecto Integrador (LogicRoute): Diseño Y Aplicaciones en la WEB</h1>
    <h2><span class="section-icon">🚀</span> ¡Bienvenido al Proyecto <code>modelo-simulacion</code>!</h2>
    <p>
        Este repositorio contiene la implementación del caso integrador de <strong>Diseño y Aplicaiones en la WEB</strong>, desarrollado en <strong>Laravel 11, PHP 8.2.12+, Livewire 3 y MariaDB/MySQL</strong>. El objetivo es dearrollar un sistema de logística de transporte de alimentos balanceados, permitiendo el manejo de usuario con susrespectivos roles y permisos, gestion de tipo de alimentos, alimentos , stock, galpones.
    </p>
    <h2><span class="section-icon">🛠️</span> Requisitos del Sistema</h2>
    <p>Asegúrate de tener instalado lo siguiente para correr el proyecto:</p>
    <ul>
        <li><strong>PHP:</strong> Versión <code>8.2</code> o superior.</li>
        <li><strong>Composer:</strong> Última versión.</li>
        <li><strong>Node.js y NPM:</strong> Para la compilación de assets frontend (Vite).</li>
        <li><strong>MariaDB / MySQL Server:</strong> Para la base de datos.</li>
        <li><strong>Git:</strong> (Recomendado para clonar el repositorio).</li>
    </ul>
    <div class="highlight note">
        <strong>Recomendación:</strong> Para Windows, <strong>Laragon</strong> o <strong>XAMPP</strong> simplifican la configuración de PHP, Composer, Node.js y el servidor de base de datos.
    </div>
    <h2><span class="section-icon">⚙️</span> Configuración y Ejecución del Proyecto</h2>
    <p>Sigue estos pasos para poner en marcha el proyecto en tu máquina local:</p>
    <h3>1. Clonar el Repositorio</h3>
    <p>Si aún no lo tienes, clona el proyecto desde tu sistema de control de versiones (por ejemplo, Git):</p>
    <pre><code>git clone &lt;URL_DEL_REPOSITORIO&gt; modelo-simulacion
cd modelo-simulacion</code></pre>
    <h3>2. Instalar Dependencias de PHP</h3>
    <p>Usa Composer para instalar todas las dependencias de Laravel:</p>
    <pre><code>composer install</code></pre>
    <h3>3. Configurar el Archivo <code>.env</code></h3>
    <p>Copia el archivo de ejemplo <code>.env.example</code> para crear tu archivo de configuración:</p>
    <pre><code>cp .env.example .env
    <h3>4. Generar la Clave de Aplicación</h3>
    <p>Laravel necesita una clave de aplicación única para la seguridad:</p>
    <pre><code>php artisan key:generate</code></pre>
    <h3>5. Crear la Base de Datos</h3>
    <p>Asegúrate de haber creado la base de datos <code>integrador_dw</code> en tu servidor MariaDB/MySQL. Puedes hacerlo desde una herramienta como phpMyAdmin, DBeaver, o la terminal:</p>
    <pre><code># Si estás en la terminal de MariaDB/MySQL (conectado con mysql -u root -p)
CREATE DATABASE integrador_ms CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;</code></pre>
    <h3>6. Ejecutar las Migraciones de Base de Datos</h3>
    <p>Esto creará las tablas necesarias en tu base de datos:</p>
    <pre><code>php artisan migrate</code></pre>
    <h3>7. Instalar Dependencias de Frontend</h3>
    <p>Para compilar los assets de frontend (Vite), instala las dependencias de Node.js:</p>
    <pre><code>npm install</code></pre>
    <h3>8. Iniciar el Servidor de Desarrollo</h3>
    <p>Finalmente, inicia el servidor de desarrollo de Laravel:</p>
    <pre><code>php artisan serve</code></pre>
    <p>Ahora puedes acceder a la aplicación en tu navegador, usualmente en <a href="http://127.0.0.1:8000"><code>http://127.0.0.1:8000</code></a> o <a href="http://localhost:8000"><code>http://localhost:8000</code></a>.</p>

</body>
</html>
