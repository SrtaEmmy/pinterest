<?php 
 session_start();

if(isset($_POST['id_img']) && isset($_POST['nombre_carpeta'])){
    $id_eliminar = $_POST['id_img'];
    $nombre_carpeta = $_POST['nombre_carpeta'];

    foreach ($_SESSION['carpetas'] as $carpeta) {
        
        if($nombre_carpeta == $carpeta['nombre']){

            $array_actual = &$carpeta['arrayCarpeta']; //"&" modificamos directamente el array original

            foreach ($array_actual as $clave => $valor) {
                if($valor['id_img'] == $id_eliminar){
                    unset($array_actual[$clave]);
                    
                    echo json_encode($array_actual);
                    break; 
                }
            }
        }
    }

}  
 
 
?>