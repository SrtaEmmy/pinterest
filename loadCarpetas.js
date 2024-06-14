
window.addEventListener('load', () => {

    let cuerpoModal = document.getElementById('cambio-cuerpo');
    let containerFolders = document.querySelector('.container-folders');
    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {

            let carpetas = JSON.parse(xhr.response);

            // mostrar carpetas al cargar la pagina
            carpetas.forEach(carpeta => {

                let a = document.createElement('a');
                a.setAttribute('href', `carpetaPersonalizada.php?nombre=${carpeta.nombre}`);
                a.classList.add('carpeta');
                a.textContent = carpeta.nombre;

                containerFolders.appendChild(a);
            });

            // mostrar botones de carpetas en el modal de cambio
            carpetas.forEach(carpeta => {
                // console.log(carpeta.nombre);

                let carpetaSeleccionada = carpeta.nombre;

                let button = document.createElement('button');
                button.textContent = carpeta.nombre;
                button.classList.add('carpetaBtn');
                button.classList.add('btn');
                button.addEventListener('click', () => {
                    
                    
                    // solicitud ajax para mover la foto de carpeta
                    let xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = () => {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            
                            // alerta
                            let div = document.createElement('div');
                            div.classList.add('alert', 'alert-success');
                            div.setAttribute('role', 'alert');
                            div.innerHTML = `Se ha guardado en <b>${carpeta.nombre}</b>`;

                            containerAlert.appendChild(div);

                            setTimeout(() => {
                                div.parentNode.removeChild(div);
                            }, 2000);

                        }
                    };
                    xhr.open('GET', `moverCarpeta.php?carpeta=${carpetaSeleccionada}`, true);
                    xhr.send();
                })
                cuerpoModal.appendChild(button);
            });




        }
    }

    xhr.open('GET', `nuevaCarpeta.php?cargar=true`, true);
    xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
    xhr.send();
});


