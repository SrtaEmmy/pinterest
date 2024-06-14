<?php 
session_start(); 
  


// moverCarpeta.php
if(isset($_GET['carpeta'])){
    $carpeta = $_GET['carpeta'];
    if(isset($_SESSION['carpetas'])) {
        $ultimoFavorito = end($_SESSION['favoritos']);
        
        // Buscar la carpeta correcta en $_SESSION['carpetas']
        foreach($_SESSION['carpetas'] as &$carpetaActual) {
            if($carpetaActual['nombre'] === $carpeta) {
                $carpetaActual['arrayCarpeta'][] = $ultimoFavorito;
                break;
            }
        }
        
        // Eliminar el último del array favoritos
        array_pop($_SESSION['favoritos']);
    }
}

 
 
?>