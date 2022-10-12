<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from productos where id = ?;");
    $sentencia->execute([$codigo]);
    $productos = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">nombre_producto: </label>
                        <input type="text" class="form-control" name="txtnomProducto" required 
                        value="<?php echo $productos->nombre_producto; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">marca_producto: </label>
                        <input type="text" class="form-control" name="txtmarProducto" autofocus required
                        value="<?php echo $productos->marca_producto; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">nombre_comprador: </label>
                        <input type="text" class="form-control" name="txtnomComprador" autofocus required
                        value="<?php echo $productos->nombre_comprador; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio: </label>
                        <input type="step" class="form-control" name="txtPrecio" autofocus required
                        value="<?php echo $productos->precio; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $productos->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>