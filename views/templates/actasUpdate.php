<?php
    // Incluimos el controlador de las actas.
    $root = '/home/lisi4150/public_html/Bloque4/EvaluacionBloque3_JMVP/';
    require_once($root . 'controllers/controladorActas.php');

    // Obtener los datos del formulario
    $id = $_GET["id"];
    $lugar = $_POST['txtLugar'];
    $contenido = $_POST['txtContenido'];
    $observaciones = $_POST['txtObservaciones'];

    // Instanciamos nuestro Controlador.
    $objController = new actasController(); 
    // Modificamos el acta con los datos del formulario.
    $objController->updateActa($id, $lugar, $contenido, $observaciones);
?>
 