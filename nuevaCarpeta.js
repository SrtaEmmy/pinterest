
let containerFolders = document.querySelector('.container-folders');
let cuerpoModal = document.getElementById('cambio-cuerpo');
let containerAlert = document.querySelector('.alert-container');
let inputNombre = document.getElementById('nombre');
let modalCrear = document.getElementById('exampleModal');
let bsModal = new bootstrap.Modal(modalCrear);
let modalCambio = document.getElementById('modalCambio');
let bootsModal = new bootstrap.Modal(modalCambio);


function nuevaCarpeta() {
    let nombreCarpeta = document.getElementById('nombre');
    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            bsModal.hide();


            let carpetas = JSON.parse(xhr.response);

            // mostrar ultima carpeta del array(la que acaba de crear)
            let ultimaCarpeta = carpetas[carpetas.length - 1];


            let a = document.createElement('a');
            a.setAttribute('href', `carpetaPersonalizada.php?nombre=${ultimaCarpeta.nombre}`);
            a.textContent = ultimaCarpeta.nombre;
            a.classList.add('carpeta')

            containerFolders.appendChild(a);


            // mostrar solo el botón de la última carpeta en el modal de cambio
            let button = document.createElement('button');
            button.textContent = ultimaCarpeta.nombre;
            button.classList.add('btn');
            button.classList.add('carpetaBtn');
            cuerpoModal.appendChild(button);

            let botones = document.querySelectorAll('#cambio-cuerpo button');
            console.log(botones);

            inputNombre.value = '';

            // alerta
            let div = document.createElement('div');
            div.classList.add('alert', 'alert-success');
            div.setAttribute('role', 'alert');
            div.innerHTML = `Se ha creado la carpeta <b>${ultimaCarpeta.nombre}</b>`;

            containerAlert.appendChild(div);

            setTimeout(() => {
                div.parentNode.removeChild(div);
            }, 2000);


            // agregar evento a cada boton
            carpetas.forEach(carpeta => {

                let carpetaSeleccionada = carpeta.nombre;

                botones.forEach(boton => {
                    boton.addEventListener('click', () => {


                        // solicitud ajax para mover la foto de carpeta
                        let xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = () => {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                               console.log('ocultar el modal2');
                               
                                bootsModal.hide()
                            }
                        };
                        xhr.open('GET', `moverCarpeta.php?carpeta=${carpetaSeleccionada}`, true);
                        xhr.send();
                    })
                });
            });
        }
    }


    xhr.open('GET', `nuevaCarpeta.php?nombreCarpeta=${encodeURIComponent(nombreCarpeta.value)}`);
    xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
    xhr.send();
    
}


