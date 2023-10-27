<?php
include("./conexion.php");

// Compruebe si se ha hecho clic en el botón de registro o no
if (isset($_POST['edit_data'])) {
    // recuperar datos del formulario
    $id = $_POST['edit_id'];
    $Idproducto = $_POST['edit_Idproducto'];
    $nombre = $_POST['edit_Nombreproducto'];
    $idmarca = $_POST['edit_Idmarca'];
    $tipodulce = $_POST['edit_Tipodedulce'];
    $cont = $_POST['edit_contenido'];
    $pesoUni = $_POST['edit_Pesounidad'];
    $precioUni = $_POST['edit_Preciounidad'];
    $precioPaq = $_POST['edit_Preciopaquete'];

    // consulta
    $sql = "UPDATE tbl_producto SET Idproducto='$Idproducto', Nombreproducto='$nombre', Idmarca='$idmarca', Tipodedulce='$tipodulce', contenido='$cont', Pesounidad='$pesoUni', Preciounidad='$precioUni', Preciopaquete ='$precioPaq' WHERE id = '$id'";
    $query = mysqli_query($db, $sql);

    //Comprueba si la consulta se guardó correctamente
    if ($query)
        header('Location: ./index.php?update=sukses');
    else
        header('Location: ./index.php?update=gagal');
} else
    die("Acceso denegado...");
