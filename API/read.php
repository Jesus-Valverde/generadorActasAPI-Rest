<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Config/DataBase.php';
include_once '../Class/Productos.php';

$objBaseDatos = new DataBase();
$db = $objBaseDatos->connect();

$objActas = new Productos($db);

$actas = $objActas->getProductos();

if ($actas && is_array($actas) && count($actas) > 0) {
    echo json_encode($actas);
} else {
    http_response_code(404);
    echo json_encode(
        array('message'=> 'No se encontraron actas'));
}

?>