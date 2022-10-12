<?php
//print_r($_POST);
if (empty($_POST["oculto"]) || empty($_POST["txtnomProducto"]) || empty($_POST["txtmarProducto"]) || empty($_POST["txtnomComprador"]) || empty($_POST["txtPrecio"])) {
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once 'model/conexion.php';
$nom_producto = $_POST["txtnomProducto"];
$mar_producto = $_POST["txtmarProducto"];
$nom_comprador = $_POST["txtnomComprador"];
$precio = $_POST["txtPrecio"];

$sentencia = $bd->prepare("INSERT INTO productos(nombre_producto,marca_producto,nombre_comprador,precio) VALUES (?,?,?,?);");
$resultado = $sentencia->execute([$nom_producto, $mar_producto, $nom_comprador, $precio]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}