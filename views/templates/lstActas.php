<?php
    $root = '/home/lisi4150/public_html/generadorActasAPI-Rest/';
    // Inclusión de la plantilla Header.
    include_once($root . 'views/templates/header.php');
    // Incluimos el controlador de las actas
    require_once($root . 'controllers/controladorActas.php');
    
    // Instanciamos controlador para ejecutar la consulta.
    $objActasController = new actasController();
    // Recuperamos los registros de la tabla en "filas".
    $rows = $objActasController->readActas();
?>

<!-- Contenedor principal -->
<div class="container py-3">
    <!-- Botón de captura de actas -->
    <div class="p-2">
        <a href="./frmActasSave.php" class="btn btn-primary">CAPTURAR ACTA</a>
    </div>
    
    <!-- Contenedor de la página -->
    <div class="card text-center">
        <!-- Titulo de la página -->
        <div class="card-header">
            LISTADO DE ACTAS
        </div>
        <!-- Tabla de las actas -->
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <!-- Titulo de los campos -->
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">FECHA</th>
                        <th scope="col">LUGAR</th>
                        <th scope="col">CONTENIDO</th>
                        <th scope="col">OBSERVACIONES</th>
                        <th scope="col">OPCIONES</th>
                    </tr>
                </thead>

                <!-- Cuerpo de la tabla -->
                <tbody>
                    <?php if($rows) : ?>
                        <?php foreach($rows as $row) : ?>
                            <tr>
                                <!-- Datos de las actas -->
                                <th><?= $row['id'] ?></th>
                                <th><?= $row['fecha'] ?></th>
                                <th><?= $row['lugar'] ?></th>
                                <th><?= $row['contenido'] ?></th>
                                <th><?= $row['observaciones'] ?></th>
                                <!-- Controles para las actas -->
                                <th>
                                    <!-- Modificar -->
                                    <a href="./frmActasUpdate.php?id=<?= $row['id']?>" class="btn btn-primary btn-small"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <!-- Borrar -->
                                    <a href="./frmActasDelete.php?id=<?= $row['id']?>" class="btn btn-danger btn-small"><i class="fa-solid fa-trash"></i></a>
                                    <!-- Imprimir -->
                                    <a href="./actaPrint.php?id=<?= $row['id']?>" class="btn btn-warning btn-small" target="_BLANK"><i class="fa-solid fa-print"></i></a>
                                </th>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <!-- Mensaje condicional si no existen registros -->
                            <td colspan="6" class="text-center">
                                No se encontraron actas registradas.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table> 
        </div>
    </div>

    <!-- Botón para regresar -->
    <div class="mx-auto p-2">
        <a href="../../index.php" class="btn btn-primary">REGRESAR</a>
    </div>
</div>

<?php
    // Inclusión de la plantilla Footer.
    include_once($root . 'views/templates/footer.php');
?>