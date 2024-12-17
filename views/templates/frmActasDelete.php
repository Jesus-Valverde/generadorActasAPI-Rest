<?php
    $root = '/home/lisi4150/public_html/generadorActasAPI-Rest/';
    // Inclusión de la plantilla Header.
    include_once($root . 'views/templates/header.php');
    // Incluimos el controlador de las actas
    require_once($root . 'controllers/controladorActas.php');
    
    // Capturamos el ID de la URL (pasado por GET).
    $id = $_GET["id"];
?>

<!-- Contenedor de la confirmación para eliminar -->
<div class="container py-3">
    <!-- Título -->
    <h1 class="fs-3 text-body-primary">Eliminar acta</h1>
    <!-- Cuerpo del mensaje de confirmación -->
    <p class="fs-5 text-body-secondary">¿Estas seguro que deseas borrar este registro? ID: <?php echo($id);?></p>
    <a href="./actasDelete.php?id=<?php echo($id);?>" class="btn btn-danger">Borrar</a>
    <a href="./lstActas.php" class="btn btn-primary">Cancelar</a>
</div>

<?php
    // Inclusión de la plantilla Footer.
    include_once($root . 'views/templates/footer.php');
?>