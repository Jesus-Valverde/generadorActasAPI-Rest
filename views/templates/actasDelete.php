<?php
    // Incluimos el controlador de las actas.
    $root = '/home/lisi4150/public_html/Bloque4/EvaluacionBloque3_JMVP/';
    require_once($root . 'controllers/controladorActas.php');

    // Capturamos el ID de la URL (pasado por GET).
    $id = $_GET["id"];

    // Instanciamos nuestro Controlador.
    $objController = new actasController(); 
    // Mandamos a llamar la funcion para eliminar el acta incorporando el ID que deseemos eliminar.
    $objController->deleteActa($id);
?>
 