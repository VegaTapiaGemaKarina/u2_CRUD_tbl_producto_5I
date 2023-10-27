<?php include("./conexion.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Belajar Dasar CRUD dengan PHP dan MySQL">
    <title>Dulceria</title>

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- material icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="position: sticky !important;
    top: 0 !important; z-index : 99999 !important;">
        <div class="container-fluid container">
            <a class="navbar-brand" href="#">Dulceria</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link active text-sm-start text-center" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary ms-md-4 text-white" href="#">Inicia sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <!-- formulario Dulceria -->
        <div class="card mb-5">
            <!-- <div class="card-header">
               Práctica CRUD de PHP y MySQL
            </div> -->
            <!-- agregar datos -->
            <div class="card-body">
                <h3 class="card-title">Vega Tapia Gema Karina 5-I</h3>
                <p class="card-text">Tabla Productos</p>

                <!-- Alerta de mensaje  éxito agregado -->
                <?php if (isset($_GET['status'])) : ?>
                    <?php
                    if ($_GET['status'] == 'sukses')
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Datos agregados!</strong>
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    else
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Error al capturar datos!</strong>
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    ?>
                <?php endif; ?>


                <form class="row g-3" action="agregar.php" method="POST">

                    <div class="col-12">
                        <label for="Idproducto" class="form-label">Id Producto</label>
                        <input type="text" name="Idproducto" class="form-control" placeholder="Idproducto" required>
                    </div>
                    <div class="col-md-4">
                        <label for="Nombreproducto" class="form-label">Nombre del proucto</label>
                        <input type="text" name="Nombreproducto" class="form-control" placeholder="nombre" required>
                    </div>

                    <div class="col-md-4">
                        <label for="Idmarca" class="form-label">Id Marca</label>
                        <input type="text" name="Idmarca" class="form-control" placeholder="Razon social marca" required>
                    </div>

                    <div class="col-md-4">
                        <label for="Tipodedulce" class="form-label">Tipo de dulce</label>
                        <input type="text" name="Tipodedulce" class="form-control" placeholder="descripcion" required>
                    </div>

                    <div class="col-md-4">
                        <label for="contenido" class="form-label">Contenido</label>
                        <input type="text" name="contenido" class="form-control" placeholder="precio unidad" required>
                    </div>

                    <div class="col-md-4">
                        <label for="Pesounidad" class="form-label">Peso Unidad</label>
                        <input type="number" name="Pesounidad" class="form-control" placeholder="categoria" required>
                    </div>

                    <div class="col-md-4">
                        <label for="Preciounidad" class="form-label">Precio Unidad</label>
                        <input type="text" name="Preciounidad" class="form-control" placeholder="precio unidad" required>
                    </div>

                    <div class="col-md-4">
                        <label for="Preciopaquete" class="form-label">Precio Paquete</label>
                        <input type="text" name="Preciopaquete" class="form-control" placeholder="Precio Paquete" required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" value="daftar" name="tambah"><i class="fa fa-plus"></i><span class="ms-2">Agregar datos</span></button>
                    </div>
                </form>
            </div>
        </div>


        <!-- título de la tabla -->
        <h5 class="mb-3">Registro de Productos</h5>

        <div class="row my-3">
            <div class="col-md-2 mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Mostrar entradas</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3 ms-auto">
                <div class="input-group mb-3 ms-auto">
                    <input type="text" class="form-control" placeholder="Busca algo..." aria-label="cari" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>


        <!--Alerta de mensaje de delete -->
        <?php if (isset($_GET['eliminar'])) : ?>
            <?php
            if ($_GET['eliminar'] == 'sukses')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Datos eliminados!</strong>!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Error al eliminar datos!</strong>
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!--Editar -->
        <?php if (isset($_GET['update'])) : ?>
            <?php
            if ($_GET['update'] == 'sukses')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Datos actualizados!</strong>
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Error al editar!</strong>
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tabla -->
        <div class="table-responsive mb-5 card">
            <?php
            echo "<div class='card-body'>";

            echo "<table class='table table-hover align-middle bg-white'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col' class='text-center'>No</th>";
            echo "<th scope='col'>Idproducto</th>";
            echo "<th scope='col'>Nombreproducto</th>";
            echo "<th scope='col'>Idmarca</th>";
            echo "<th scope='col'>Tipodedulce</th>";
            echo "<th scope='col'>contenido</th>";
            echo "<th scope='col'>Pesounidad</th>";
            echo "<th scope='col'>Preciounidad</th>";
            echo "<th scope='col'>Preciopaquete</th>";
            echo "<th scope='col' class='text-center'>Acciones</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";



            $batas = 10;
            $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
            $pagina_awal = ($pagina > 1) ? ($pagina * $batas) - $batas : 0;

            $previous = $pagina - 1;
            $next = $pagina + 1;

            $data = mysqli_query($db, "SELECT * FROM tbl_producto");
            $jumlah_data = mysqli_num_rows($data);
            $total_pagina = ceil($jumlah_data / $batas);

            $data_mhs = mysqli_query($db, "SELECT * FROM tbl_producto LIMIT $pagina_awal, $batas");
            $no = $pagina_awal + 1;

            // $sql = "SELECT * FROM  tbl_producto";
            // $query = mysqli_query($db, $sql);




            while ($bddulceria = mysqli_fetch_array($data_mhs)) {
                echo "<tr>";
                echo "<td style='display:none'>" . $bddulceria['id'] . "</td>";
                echo "<td class='text-center'>" . $no++ . "</td>";
                echo "<td>" . $bddulceria['Idproducto'] . "</td>";
                echo "<td>" . $bddulceria['Nombreproducto'] . "</td>";
                echo "<td>" . $bddulceria['Idmarca'] . "</td>";
                echo "<td>" . $bddulceria['Tipodedulce'] . "</td>";
                echo "<td>" . $bddulceria['contenido'] . "</td>";
                echo "<td>" . $bddulceria['Pesounidad'] . "</td>";
                echo "<td>" . $bddulceria['Preciounidad'] . "</td>";
                echo "<td>" . $bddulceria['Preciopaquete'] . "</td>";

                echo "<td class='text-center'>";

                echo "<button type='button' class='btn btn-primary editButton pad m-1'><span class='material-icons align-middle'>edit</span></button>";

                //boton borrar
                echo "
                            <!-- Button trigger modal -->
                            <button type='button' class='btn btn-danger deleteButton pad m-1'><span class='material-icons align-middle'>delete</span></button>";
                echo "</td>";

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            if ($jumlah_data == 0) {
                echo "<p class='text-center'>No hay registros en la tabla.</p>";
            } else {
                echo "<p>Total $jumlah_data de registros</p>";
            }

            echo "</div>";
            ?>
        </div>

        <!-- pagina -->
        <nav class="mt-5 mb-5">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina > 1) ? "href='?pagina=$previous'" : "" ?>><i class="fa fa-chevron-left"></i></a>
                </li>
                <?php
                for ($x = 1; $x <= $total_pagina; $x++) {
                ?>
                    <li class="page-item"><a class="page-link" href="?pagina=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina < $total_pagina) ? "href='?pagina=$next'" : "" ?>><i class="fa fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav>

        <!--Editar-->
        <div class='modal fade' style="top:58px !important;" id='editModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' style="margin-bottom:100px !important;">
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Actualizar datos del producto</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>

                    <?php
                    $sql = "SELECT * FROM tbl_producto";
                    $query = mysqli_query($db, $sql);
                    $bddulceria = mysqli_fetch_array($query);
                    ?>

                    <form action='edit.php' method='POST'>
                        <div class='modal-body text-start'>
                            <input type='hidden' name='edit_id' id='edit_id'>

                            <div class="col-12 mb-3">
                                <label for="edit_Idproducto" class="form-label">Id Producto</label>
                                <input type="number" name="edit_Idproducto" id="edit_Idproducto" class="form-control" placeholder="1,2,3..." required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_Nombreproducto" class="form-label">Nombre de Producto</label>
                                <input type="text" name="edit_Nombreproducto" id="edit_Nombreproducto" class="form-control" placeholder="1,2,3..." required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_Idmarca" class="form-label">Id Marca</label>
                                <input type="text" name="edit_Idmarca" id="edit_Idmarca" class=" form-control" placeholder="1,2,3..." required>
                            </div>


                            <div class="col-12 mb-3">
                                <label for="edit_Tipodedulce" class="form-label">Tipo de dulce</label>
                                <input type="text" name="edit_Tipodedulce" id="edit_Tipodedulce" class=" form-control" placeholder="1,2,3..." required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_contenido" class="form-label">Contenido</label>
                                <input type="text" name="edit_contenido" class="form-control" id="edit_contenido" placeholder="1,2,3..." required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_Pesounidad" class="form-label">Peso Unidad</label>
                                <input type="number" name="edit_Pesounidad" id="edit_Pesounidad" class=" form-control" placeholder="apple" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_Preciounidad" class="form-label">Precio Unidad</label>
                                <input type="text" name="edit_Preciounidad" id="edit_Preciounidad" class=" form-control" placeholder="5000" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_Preciopaquete" class="form-label">Precio Paquete</label>
                                <input type="text" name="edit_Preciopaquete" id="edit_Preciopaquete" class=" form-control" placeholder="24/10/2023" required>
                            </div>

                        </div>
                        <div class='modal-footer'>
                            <button type='submit' name='edit_data' class='btn btn-primary'>Enviar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- capital eliminar-->
        <div class='modal fade' style="top:58px !important;" id='deleteModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Eliminar</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>


                    <form action='eliminar.php' method='POST'>

                        <div class='modal-body text-start'>
                            <input type='hidden' name='delete_id' id='delete_id'>
                            <p>¿Deseas continuar con esta accion?</p>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='deletedata' class='btn btn-primary'>Eliminar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- cerrar el contenedor -->
    </div>


    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Javascript bule with popper bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- editar function -->
    <script>
        $(document).ready(function() {
            $('.editButton').on('click', function() {
                $('#editModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#edit_id').val(data[0]);
                // no lo uso, porque es sólo un número incremental
                // $('#no').val(datos[1]);
                $('#edit_Idproducto').val(data[2]);
                $('#edit_Nombreproducto').val(data[3]);
                $('#edit_Idmarca').val(data[4]);
                $('#edit_Tipodedulce').val(data[5]);
                $('#edit_contenido').val(data[6]);
                $('#edit_Pesounidad').val(data[7]);
                $('#edit_Preciounidad').val(data[8]);
                $('#edit_Preciopaquete').val(data[9]);


            });
        });
    </script>

    <!-- eliminar function -->
    <script>
        $(document).ready(function() {
            $('.deleteButton').on('click', function() {
                $('#deleteModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#delete_id').val(data[0]);
            });
        });
    </script>

    <script>
        function clicking() {
            window.location.href = './index.php';
        }
    </script>
</body>

</html>