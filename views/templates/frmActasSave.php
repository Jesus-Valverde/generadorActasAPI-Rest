<?php
    $root = '/home/lisi4150/public_html/generadorActasAPI-Rest/';
    // Inclusión de la plantilla Header.
    include_once($root . 'views/templates/header.php');
?>

<!-- Contenedor del formulario -->
<div class="container py-3">
    <!-- Título del formulario -->
    <p class="fs-3 text-body-primary">Capturar acta</p>
    <!-- Formulario -->
    <div class="form">
        <form class="was-validated" action="actasInsert.php" method="post">
            <!-- Campo lugar -->
            <div class="form-group mb-3">
                <label for="lugar" class="form-label">LUGAR</label>
                <input type="text" name="txtLugar" id="lugar" placeholder="MAZATLAN, SINALOA, MEXICO" class="form-control">
                <div class="valid-feedback">Válido.</div>
                <div class="invalid-feedback">Por favor ingrese el lugar donde se generó el acta.</div>
            </div>
            <!-- Campo contenido -->
            <div class="form-group mb-3">
                <label for="contenido" class="form-label">CONTENIDO</label>
                <input type="text" name="txtContenido" id="contenido" class="form-control" required>
                <div class="valid-feedback">Válido.</div>
                <div class="invalid-feedback">Por favor ingrese el contenido del acta.</div>
            </div>
            <!-- Campo observaciones -->
            <div class="form-group mb-3">
                <label for="observaciones" class="form-label">OBSERVACIONES</label>
                <input type="text" name="txtObservaciones" id="observaciones" class="form-control" required>
                <div class="valid-feedback">Válido.</div>
                <div class="invalid-feedback">Por favor ingrese observaciones.</div>
            </div>
            <!-- Botones para controlar el formulario -->
            <div class="col mb-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="./lstActas.php" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<?php
    // Inclusión de la plantilla Footer.
    include_once($root . 'views/templates/footer.php');
?>