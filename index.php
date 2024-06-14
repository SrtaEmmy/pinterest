<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        body.modo-oscuro {
            background-color: rgba(45, 45, 60, 0.961);
        }
    </style>

</head>

<body>
    <!-- spinner cargando -->
    <div class="container-spinner">
        <div id="spinner" class="spinner-border text-primary" role="status" style="display: none;">
            <span class="sr-only"></span>
        </div>
    </div>

    <div class="container">

        <!-- carpetas -->
        <button class="btn btn-lg" id="menuButton"><i class="bi bi-list"></i></button>

        <div class="container container-folders" id="foldersContainer">
            <button class='btn btn-lg' id='btnDarkMode'><i class="bi bi-moon-fill"></i></button>
            <button type="button" class=" btnCrear" data-bs-toggle="modal" data-bs-target="#exampleModal"
                data-bs-whatever="@mdo">Crear carpeta</button>
            <a href="favoritas.php" class="carpeta">Favoritos</a>
        </div>


        <!-- alertas -->
        <div class="alert-container"></div>

        <!-- buscador -->
        <div class="container-buscador">
            <input type="text" id='inputBuscar' placeholder="Buscador...">
            <button class="btn" id="buscar"><i class="bi bi-search" style="color: black;"></i></button>
        </div>

        <div id="container-img" class='grid-container'></div>


        <!-- modal cambio -->
        <div style="background: rgba(128, 128, 128, 0.8);" class="modal" id="modalCambio">
            <div class="modal-dialog">
                <div style="background: rgb(241, 237, 237); box-shadow: 0 0 5px black" class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Guardar en: </h5>
                    </div>
                    <div class="modal-body" id='cambio-cuerpo'>
                        <!-- boton crear -->
                       

                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary close" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- modal crear carpeta -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Carpeta</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nombre" class="col-form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="ej: Coches">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button id="btnCrear" type="button" onclick="nuevaCarpeta()" class="btnCrear">Crear</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- modal mostrar foto -->
        <div class="modal fade" id="modalImg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- foto -->
                    </div>
                    <div class="modal-footer">
                        <!-- descripcion -->
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="loadCarpetas.js"></script>
    <script src="nuevaCarpeta.js"></script>
    <script src="loadImgs.js" type="module"></script>
    <script src="busqueda.js" type="module"></script>
    <script src="addFavorito.js" type="module"></script>
    <script src="modoOscuro.js"></script>
    <script src="menu.js"></script>
</body>

</html>