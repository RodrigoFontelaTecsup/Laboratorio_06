<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombre_producto = $_POST['txtnomProducto'];
    $marca_producto = $_POST['txtmarProducto'];
    $nombre_comprador = $_POST['txtnomComprador'];
    $precio = $_POST['txtPrecio'];
    

    $sentencia = $bd->prepare("UPDATE productos SET nombre_producto = ?, marca_producto = ?, nombre_comprador = ?,precio = ? where id = ?;");
    $resultado = $sentencia->execute([$nombre_producto, $marca_producto, $nombre_comprador, $precio, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }