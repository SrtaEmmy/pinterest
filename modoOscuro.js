let boton = document.getElementById('btnDarkMode');
let cuerpo = document.querySelector('body');
let texto = document.querySelector('h1');
let listBtn = document.querySelector('.bi-list');

let modoOscuro = localStorage.getItem('modoOscuro');

if (modoOscuro === 'true') {
    cuerpo.classList.add('modo-oscuro');
    texto.classList.add('modo-oscuro');
    listBtn.classList.add('modo-oscuro');
} else {
    cuerpo.classList.remove('modo-oscuro');
    texto.classList.remove('modo-oscuro');
    listBtn.classList.remove('modo-oscuro');
}

boton.addEventListener('click', function() {
    if (cuerpo.classList.contains('modo-oscuro')) {
        // Si  modo oscuro está activado, desactivar
        cuerpo.classList.remove('modo-oscuro');
        texto.classList.remove('modo-oscuro');
        listBtn.classList.remove('modo-oscuro');
        localStorage.setItem('modoOscuro', 'false');
    } else {
        // Si modo oscuro está desactivado, activar
        cuerpo.classList.add('modo-oscuro');
        texto.classList.add('modo-oscuro');
        listBtn.classList.add('modo-oscuro');
        localStorage.setItem('modoOscuro', 'true');
    }
});
