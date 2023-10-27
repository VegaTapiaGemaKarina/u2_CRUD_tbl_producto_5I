<?php
include("./conexion.php");

//Compruebe si se ha hecho clic en el botón de registro o no
if (isset($_POST['tambah'])) {
    // recuperar datos del formulario
    $Idproducto = $_POST['Idproducto'];
    $nombre = $_POST['Nombreproducto'];
    $idmarca = $_POST['Idmarca'];
    $tipodulce = $_POST['Tipodedulce'];
    $cont = $_POST['contenido'];
    $pesoUni = $_POST['Pesounidad'];
    $precioUni = $_POST['Preciounidad'];
    $precioPaq = $_POST['Preciopaquete'];

    //consulta
    $sql = "INSERT INTO tbl_producto(Idproducto, Nombreproducto, Idmarca, Tipodedulce, contenido , Pesounidad, Preciounidad, Preciopaquete)
    VALUES('$Idproducto','$nombre', '$idmarca', '$tipodulce', '$cont', '$pesoUni', '$precioUni', '$precioPaq')";
    $query = mysqli_query($db, $sql);

    // ¿Comprueba si la consulta se guardó correctamente?
    if ($query)
        header('Location: ./index.php?status=sukses');
    else
        header('Location: ./index.php?status=gagal');
} else
    die("Acceso prohibido...");
