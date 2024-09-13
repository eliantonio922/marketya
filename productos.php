<div class="row mt-1">
    <?php
    // Definimos los elementos por página
    $elementosPorPagina = 6;

    // Obtenemos la página seleccionada de la solicitud, si no existe, se usa la página 1
    $paginaSel = isset($_REQUEST['pagina']) ? (int)$_REQUEST['pagina'] : 1;
    $paginaSel = max($paginaSel, 1); // Asegurarse de que sea al menos 1

    // Calculamos el inicio del límite para la consulta SQL
    $inicioLimite = ($paginaSel - 1) * $elementosPorPagina;

    // Conectar a la base de datos
    $con = mysqli_connect("localhost", "root", "", "ecommerce");
    if (!$con) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Construimos la consulta SQL con el límite para la paginación
    $query = "SELECT id, nombre, precio, imagen FROM productos LIMIT ?, ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ii", $inicioLimite, $elementosPorPagina);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    // Iteramos sobre los resultados para mostrar los productos
    while ($row = mysqli_fetch_assoc($res)) {
    ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card border-primary">
                <img class="card-img-top img-thumbnail" src="<?php echo htmlspecialchars($row['imagen']); ?>" alt="" style="height: 450px; object-fit: contain;">
                <div class="card-body">
                    <h2 class="card-title"><strong><?php echo htmlspecialchars($row['nombre']); ?></strong></h2>
                    <p class="card-text"><strong>Precio:</strong> <?php echo htmlspecialchars($row['precio']); ?></p>
                    <a href="index.php?modulo=detalleproducto&id=<?php echo urlencode($row['id']); ?>" class="btn btn-primary">Ver</a>
                </div>
            </div>
        </div>
    <?php
    }
    mysqli_stmt_close($stmt);

    // Consultamos el número total de registros sin límite para calcular las páginas
    $queryTotal = "SELECT COUNT(*) as cuenta FROM productos";
    $resTotal = mysqli_query($con, $queryTotal);
    $rowTotal = mysqli_fetch_assoc($resTotal);
    $totalRegistros = $rowTotal['cuenta'];

    // Calculamos el total de páginas
    $totalPaginas = ceil($totalRegistros / $elementosPorPagina);

    if ($totalPaginas > 1) { // Si hay más de una página, mostramos la paginación
    ?>
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php if ($paginaSel > 1) { ?>
                    <li class="page-item">
                        <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo ($paginaSel - 1); ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Anterior</span>
                        </a>
                    </li>
                <?php } ?>

                <?php for ($i = 1; $i <= $totalPaginas; $i++) { ?>
                    <li class="page-item <?php echo ($paginaSel == $i) ? "active" : ""; ?>">
                        <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php } ?>

                <?php if ($paginaSel < $totalPaginas) { ?>
                    <li class="page-item">
                        <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo ($paginaSel + 1); ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    <?php
    }
    mysqli_close($con);
    ?>
</div>
