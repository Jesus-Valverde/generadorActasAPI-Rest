<?php
    // Incluimos el controlador de las actas.
    $root = '/home/lisi4150/public_html/Bloque4/EvaluacionBloque3_JMVP/';
    require_once($root . 'controllers/controladorActas.php');

    // Obtener los datos del formulario
    $lugar = $_POST['txtLugar'];
    // Si el campo está vacio, llenar el campo con el valor predeterminado
    if($lugar == ''){
        $lugar = "MAZATLAN, SINALOA, MEXICO";
    }
    $contenido = $_POST['txtContenido'];
    $observaciones = $_POST['txtObservaciones'];

    // Instanciamos nuestro Controlador.
    $objController = new actasController(); 
    // Guardamos el acta con los datos del formulario.
    $objController->saveActa($lugar, $contenido, $observaciones);
?>
 