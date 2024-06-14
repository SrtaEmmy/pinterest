<?php 
session_start();

if(!isset($_SESSION['favoritos'])){
    $_SESSION['favoritos'] = array();
}

if(isset($_GET['idFoto']) && isset($_GET['urlFoto'])){
    $id_imagen = $_GET['idFoto'];
    $url_imagen = $_GET['urlFoto'];

    $_SESSION['favoritos'][] = ['id_img' => $id_imagen, 'url' => $url_imagen];

    echo json_encode($_SESSION['favoritos']);
   
}   
?>