<?php
    // Incluimos el controlador de las actas
    $root = '/home/lisi4150/public_html/generadorActasAPI-Rest/';
    require_once($root . 'controllers/controladorActas.php');

    // Capturamos el ID de la URL (pasado por GET).
    $id = $_GET["id"];

    // Instanciamos el controlador.
    $objActasController = new actasController();

    // Obtenemos los datos del acta.
    $row = $objActasController->readActasOnce($id);

    // Verificamos si se obtuvieron los datos correctamente
    if ($row) {
        // Supongamos que se obtuvo la fecha desde la base de datos
        $fechaOriginal = $row['fecha']; 
    } else {
        // Si no se encontraron registros, redirigir o manejar el error
        die("No se encontraron registros para el ID especificado.");
    }

    // Comprobamos si el sistema operativo es Windows para configurar la localización de la fecha
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        // Para Windows configuramos el locale a español
        setlocale(LC_TIME, 'spanish'); // Para sistemas Windows
    } else {
        // Para Linux/Unix configuramos el locale a español (España)
        setlocale(LC_TIME, 'es_ES.UTF-8'); // Para sistemas Linux/Unix
    }

    // Convertimos la fecha en un timestamp
    $timestamp = strtotime($fechaOriginal);

    // Verificamos si la conversión fue exitosa
    if ($timestamp === false) {
        die("La fecha proporcionada no es válida.");
    }

    // Formateamos la fecha en español en el formato deseado
    $fechaFormateada = mb_strtoupper(strftime('%e DE %B DE %Y', $timestamp));
?>



<html lang="es">
<head>
    <!-- @Author: Jesús Manuel Valverde Pérez -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimir acta No. <?= $row['id']?></title>
    <!-- Conexión para Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Conexión para FontAwesome -->
    <script src="https://kit.fontawesome.com/3fba46eebd.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Documento completo del Acta -->
    <div class="pricing-header p-5 pb-md-4 mx-auto">
        <!-- Título del acta con su ID -->
        <h1 class="display-4 fw-bold fs-2 text-body-emphasis text-center">ACTA NO. <?= $row['id']?></h1>
        <!-- Lugar y fecha donde se generó el acta -->
        <p class="fs-5 text-body-primary text-end fw-bold"><?= $row['lugar']?>, <?php echo $fechaFormateada?></p>
        <!-- Contenido del acta -->
        <p class="fs-5 text-body-primary text-justify fw-regular"><?= $row['contenido']?></p>
        <!-- Observaciones del acta -->
        <h1 class="display-4 fw-bold fs-3 text-body-emphasis ">OBSERVACIONES</h1>
        <p class="fs-5 text-body-primary text-justify fw-regular"><?= $row['observaciones']?></p>
    </div>
</body>
</html>