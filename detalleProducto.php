<?php
$id = mysqli_real_escape_string($con, $_REQUEST['id'] ?? '');
$queryProducto = "SELECT id,nombre,descripcion, precio,existencia, imagen FROM productos where id='$id';  ";
$resProducto = mysqli_query($con, $queryProducto);
$rowProducto = mysqli_fetch_assoc($resProducto);
?>
<!-- Default box -->
<div class="card card-solid">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none"><?php echo $rowProducto['nombre'] ?></h3>
                <img src="<?php echo $rowProducto['imagen'] ?>" alt=""  style="height: 450px ; object-fit: contain" alt="imagen">
            </div>
                <div class="col-12 col-sm-6">
                <h3 class="my-3"><?php echo $rowProducto['nombre'] ?></h3>
                <p><?php echo $rowProducto['descripcion'] ?></p>

                <hr>
                <h4>Existencias: <?php echo $rowProducto['existencia'] ?></h4>

                <div class="bg-gray py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        $<?php echo ( $rowProducto['precio'])  ?>
                    </h2>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary btn-lg btn-flat" id="agregarCarrito" 
                    data-id="<?php echo $_REQUEST['id'] ?>"
                    data-nombre="<?php echo $rowProducto['nombre'] ?>"
                    data-precio="<?php echo $rowProducto['precio'] ?>"
                    >
                    <i class="fas fa-cart-plus fa-lg mr-2"></i>
                        Agrega al Carrito
                    </button>
                </div>
                <div class="mt-4">
                    Cantidad
                    <input type="number" class="form-control" id="cantidadProducto" value="1">
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"><?php echo $rowProducto['descripcion'] ?> </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->