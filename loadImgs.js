import { addFavotios } from './addFavorito.js';

let msnry;

// carga imagenes aleatorias cada vez que se recarga la pagina
window.addEventListener('load', () => {
    let grid = document.querySelector('.grid-container');
    let spinner = document.getElementById('spinner');

    // Mostrar el spinner
    spinner.style.display = 'block';

    const ACCESS_KEY = "qWD2wg-WqcMpnyidsafDGb0PpvxmNxlM8XX1LwW7bPc";
    const COUNT = 30;

    fetch(`https://api.unsplash.com/photos/random?client_id=${ACCESS_KEY}&count=${COUNT}`)
        .then(response => response.json())
        .then(data => {
            data.forEach(foto => {
                let div = document.createElement('div');
                div.innerHTML = `
                <div class="image-container grid-item">
                    <div class="image-wrapper">
                        <img id="img${foto.id}" src="${foto.urls.small}" alt="...">
                        <button class="btn btn-lg fav-button" id="addFav${foto.id}"><i class="bi bi-heart-fill" style="color: white"></i></button>
                    </div>
                </div> `;

                let img = div.querySelector(`#img${foto.id}`);
                img.addEventListener('click', function () {
                    document.getElementById('modalImg').querySelector('.modal-body').innerHTML = `<img src="${foto.urls.small}" alt="...">`;
                    document.getElementById('modalImg').querySelector('.modal-footer').innerHTML = foto.description || 'No hay descripción disponible';
                    new bootstrap.Modal(document.getElementById('modalImg')).show();
                });

                let btnFavorito = div.querySelector(`#addFav${foto.id}`);
                btnFavorito.addEventListener('click', function () {
                    addFavotios(`addFav${foto.id}`, foto.urls.small);
                });

                grid.appendChild(div);
            });

            // Comprobar si se han cargado imágenes
            imagesLoaded(grid, function () {
                msnry = new Masonry(grid, {
                    itemSelector: '.grid-item',
                    columnWidth: 230,
                });

                // Ocultar el spinner
                spinner.style.display = 'none';
            });
        });
});



