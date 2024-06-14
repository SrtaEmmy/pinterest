<?php 
 session_start();

 if(!isset($_SESSION['carpetas'])){
    $_SESSION['carpetas'] = array();
 }

if($_SERVER['REQUEST_METHOD']==='GET' ){

    if(isset($_GET['nombreCarpeta']) && !empty($_GET['nombreCarpeta'])){
        $nombreCarpeta = urlencode($_GET['nombreCarpeta']);

        if(!isset($_SESSION[$nombreCarpeta])){
            $_SESSION[$nombreCarpeta] = array();
        }

       $_SESSION['carpetas'][] = ['arrayCarpeta'=> $_SESSION[$nombreCarpeta], 'nombre'=>$nombreCarpeta];
       echo json_encode($_SESSION['carpetas']);

        
    }else{

        // si el usuario ha cargado la pagina, devolver las carpetas actuales
        if(isset($_GET['cargar'])){
            echo json_encode($_SESSION['carpetas']);
        }else{
            echo json_encode(['success'=> false, 'message'=> 'el campo está vacío']);
        }
    }
    
}
 
 
?>