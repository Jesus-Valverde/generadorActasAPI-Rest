<!-- Inclusión de la plantilla Header -->
<?php
    $root = '/home/lisi4150/public_html/generadorActasAPI-Rest/';
    include_once($root . 'views/templates/header.php');
?>
<!-- Contenido principal -->
<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <!-- Título -->
    <h1 class="display-4 fw-normal text-body-emphasis">Empieza a generar actas</h1>
    <!-- Descripción e imagen -->
    <p class="fs-5 text-body-secondary">Es tan fácil como irte a la opción del listado de actas que aparece arriba.</p>
    <img src="./views/img/1.png" alt="Ejemplo de las actas" class="img-thumbnail">
</div>

<!-- Inclusión de la plantilla Footer -->
<?php
    include_once($root . 'views/templates/footer.php');
?>