<?php

$serv = "localhost";
$usuario = "root";
$contra = '';
$bdnombre= "bddulceria";

$db = mysqli_connect($serv, $usuario, $contra, $bdnombre);

if (!$db)
    die("Error de conexion: " . mysqli_connect_error());
