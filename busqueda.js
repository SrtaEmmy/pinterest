import { addFavotios } from './addFavorito.js';
let modal = document.createElement('div');
modal.innerHTML = `
<div class="modal fade" id="modalImg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        aqui va la imagen
      </div>
      <div class="modal-footer">
        breve descripcion
      </div>
    </div>
  </div>
</div>`;
document.body.appendChild(modal);

let btnBuscar = document.getElementById('buscar');
let elemento = document.getElementById('inputBuscar');
let foto = document.getElementById('fotoBusqueda');
let containerImgs = document.getElementById('container-img');
let spinner = document.getElementById('spinner');
let menuButton = document.getElementById('menuButton');
let xhr = new XMLHttpRequest();
let msnry;
imagesLoaded(containerImgs, function () {//comprobar si se han cargado imagenes
    msnry = new Masonry(containerImgs, {
        itemSelector: '.grid-item',
        columnWidth: 230,
        // percentPosition: true
    });
});

// manejar respuesta 
xhr.onreadystatechange = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
        let resultados = JSON.parse(xhr.response);
        console.log(resultados);

        let btnsFav = document.querySelectorAll('.btnFav');
        console.log(btnsFav);
        btnsFav.forEach(boton => {
            boton.remove();
        });

        resultados.forEach(resultado => {
            let div = document.createElement('div');
            div.innerHTML = `
            <div class="image-container grid-item">
                <div class="image-wrapper">
                    <img id="img${resultado.id}" src="${resultado.urls.small}" alt="...">
                    <button class="btn btn-lg fav-button" id="addFav${resultado.id}"><i class="bi bi-heart-fill" style="color: white"></i></button>
                </div>
            </div> `;
        
            let img = div.querySelector(`#img${resultado.id}`);
            img.addEventListener('click', function () {
                
                document.getElementById('modalImg').querySelector('.modal-body').innerHTML = `<img src="${resultado.urls.small}" alt="...">`;
                document.getElementById('modalImg').querySelector('.modal-footer').innerHTML = resultado.description || 'No hay descripción disponible';
                new bootstrap.Modal(document.getElementById('modalImg')).show();
            });
        
            let btnFavorito = div.querySelector(`#addFav${resultado.id}`);
            btnFavorito.addEventListener('click', function () {
                addFavotios(`addFav${resultado.id}`, resultado.urls.small);
            });
        
            containerImgs.appendChild(div);
            imagesLoaded(containerImgs, function () {
                msnry.appended(div);
                msnry.layout();
            });
        });

        // Ocultar el spinner
        spinner.style.display = 'none';
    }
}

const buscarElemento = () => {
        // si campo de busqueda esta vacio
        if (elemento.value.trim() === '') {
            alert('Por favor, ingrese un término de búsqueda.');
            return; 
        }

    // eliminar resultados busqueda anterior
    let imgsAnteriores = document.querySelectorAll('img');
    imgsAnteriores.forEach(img => img.remove());

    // Mostrar spinner
    spinner.style.display = 'block';

    xhr.open('GET', `buscar.php?busqueda=${encodeURIComponent(elemento.value)}`, true);
    xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
    xhr.send();
}

btnBuscar.addEventListener('click', () => {
    buscarElemento();

    menuButton.style.display = 'none';
});
