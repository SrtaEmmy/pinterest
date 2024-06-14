let xhr = new XMLHttpRequest();
let containerImgs = document.getElementById('container-imgs');
let containerAlert = document.querySelector('.alert-container');

let closeButton = document.querySelector('.close');

// cerrar modal
closeButton.addEventListener('click', () => {
    let modal = document.getElementById('modalCambio');
    modal.style.display = 'none';
});

// manejar respuesta
xhr.onreadystatechange = () =>{
    if (xhr.readyState === 4 && xhr.status === 200) {
        
        // alerta
        let div = document.createElement('div');
        div.classList.add('alert', 'alert-success');
        div.setAttribute('role', 'alert');

        // boton de cambiar
        let button = document.createElement('button');
        button.setAttribute('id', 'cambiar');
        button.classList.add('btnCrear');
        button.textContent = 'Cambiar';
        button.addEventListener('click', ()=>{
            // abrir modal
            let modal = document.getElementById('modalCambio');
            modal.style.display = 'block';
        });

        div.appendChild(document.createTextNode('Guardado en favoritos '));
        div.appendChild(button);

        containerAlert.appendChild(div);

        setTimeout(() => {
            div.parentNode.removeChild(div);
        }, 4000);
    }
}


// enviamos el id y la url de la imagen a php
export function addFavotios(idFoto, urlFoto) {
    xhr.open('GET', `addFavorito.php?idFoto=${idFoto}&urlFoto=${urlFoto}&carpeta=favoritos`, true);
    xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
    xhr.send(); 
}
