function eliminar(id, carpeta) {
    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = () =>{
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.response);
            
            document.getElementById(id).remove();
            document.getElementById(`btn_${id}`).remove();
        }
    }

    
    xhr.open('POST', `eliminar.php`, true);
    xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
    xhr.send(`id_img=${id}&nombre_carpeta=${carpeta}`);
    
    
}