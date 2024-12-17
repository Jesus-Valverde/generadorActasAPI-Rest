<?php
    $root = '/home/lisi4150/public_html/generadorActasAPI-Rest/';
    // Inclusión de la plantilla Header.
    include_once($root . 'views/templates/header.php');
    // Incluimos el controlador de las actas
    require_once($root . 'controllers/controladorActas.php');
    
    // Capturamos el ID de la URL (pasado por GET).
    $id = $_GET["id"];

    // Instanciamos controlador para ejecutar la consulta.
    $objActasController = new actasController();
    // Recuperamos los registros de la tabla en "filas".
    $row = $objActasController->readActasOnce($id);
?>

<!-- Contenedor del formulario para actualizar acta -->
<div class="container py-3">
    <!-- Título -->
    <p class="fs-3 text-body-primary">Modificar acta</p>
    <!-- Formulario -->
    <div class="form">
        <form class="was-validated" action="actasUpdate.php?id=<?= $row['id']?>" method="post">
            <!-- Campo id -->
            <div class="form-group mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" name="intId" id="id" value="<?= $row['id'] ?>" class="form-control" disabled>
            </div>
            <!-- Campo lugar -->
            <div class="form-group mb-3">
                <label for="lugar" class="form-label">LUGAR</label>
                <input type="text" name="txtLugar" id="lugar" value="<?= $row['lugar'] ?>" class="form-control" required>
                <div class="valid-feedback">Válido.</div>
                <div class="invalid-feedback">Por favor ingrese el lugar donde se generó el acta.</div>
            </div>
            <!-- Campo contenido -->
            <div class="form-group mb-3">
                <label for="contenido" class="form-label">CONTENIDO</label>
                <input type="text" name="txtContenido" id="contenido" value="<?= $row['contenido'] ?>" class="form-control" required >
                <div class="valid-feedback">Válido.</div>
                <div class="invalid-feedback">Por favor ingrese el contenido del acta.</div>
            </div>
            <!-- Campo observaciones -->
            <div class="form-group mb-3">
                <label for="observaciones" class="form-label">OBSERVACIONES</label>
                <input type="text" name="txtObservaciones" id="observaciones" value="<?= $row['observaciones'] ?>" class="form-control" required>
                <div class="valid-feedback">Válido.</div>
                <div class="invalid-feedback">Por favor ingrese observaciones.</div>
            </div>
            <!-- Botones para controlar el formulario -->
            <div class="col mb-3">
                <button type="submit" class="btn btn-primary">Modificar</button>
                <a href="<?php echo $baseUrl; ?>/EvaluacionBloque3_JMVP/views/templates/lstActas.php" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<?php
    // Inclusión de la plantilla Footer.
    include_once($root . 'views/templates/footer.php');
?>