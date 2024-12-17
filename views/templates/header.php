<?php
    // Obtener el archivo actual
    $archivoActual = basename($_SERVER['PHP_SELF']);
    // Ruta raíz del servidor
    $root = '/home/lisi4150/public_html/generadorActasAPI-Rest/';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- @Author: Jesús Manuel Valverde Pérez -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de actas</title>
    <!-- Conexión para Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Conexión para FontAwesome -->
    <script src="https://kit.fontawesome.com/3fba46eebd.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Contenedor principal -->
    <div class="container py-3">
        <header>
            <!-- Nav Bar -->
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                <!-- Logo -->
                <div class="d-flex align-items-center text-decoration-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2" viewBox="0 0 512 512"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                    <span class="fs-4">Generador de actas</span>
                </div>

                <!-- Nav menu -->
                <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                    <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="<?php echo $archivoActual === 'index.php' ? './index.php' : '../../index.php'; ?>"><i class="fa-solid fa-house"></i> Inicio</a>
                    <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="<?php echo $archivoActual === 'index.php' ? 'views/templates/lstActas.php' : './lstActas.php'; ?>"><i class="fa-solid fa-list"></i> Listado de actas</a>
                </nav>
            </div>
        </header>
    </div>