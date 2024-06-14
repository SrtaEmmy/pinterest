<?php session_start();
if (isset($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
}


?>

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
    <div class="container">
        <!-- spinner cargando -->
        <div class="container-spinner">
            <div id="spinner" class="spinner-border text-primary" role="status" style="display: none;">
                <span class="sr-only"></span>
            </div>
        </div>

        <!-- carpetas -->
        <button class="btn btn-lg" id="menuButton"><i class="bi bi-list"></i></button>

        <div class="container container-folders" id="foldersContainer">
            <button class='btn btn-lg' id='btnDarkMode'><i class="bi bi-moon-fill"></i></button>
            <button type="button" class=" btnCrear" data-bs-toggle="modal" data-bs-target="#exampleModal"
                data-bs-whatever="@mdo">Crear carpeta</button>
            <a href="index.php" class="carpeta">inicio</a>
            <a href="favoritas.php" class="carpeta">Favoritos</a>
        </div>

        <h1>Carpeta <?php echo $nombre ?></h1>

        <div class="grid-container">

            <?php foreach ($_SESSION['carpetas'] as $carpeta): ?>

                <?php if ($nombre == $carpeta['nombre']):
                    $carpetaActual = $carpeta['arrayCarpeta'] ?>

                    <?php if (empty($carpetaActual)): ?>
                        <p style="color: rgb(165, 163, 163)" >La carpeta <?php echo $nombre ?> está vacía</p>
                    <?php else: ?>

                        <?php foreach ($carpetaActual as $data): ?>
                            <div class=" grid-item">
                                <div class="image-wrapper">
                                    <img src="<?php echo $data['url'] ?>" id="<?php echo $data['id_img'] ?>" width="200" alt="">
                                </div>
                            </div>
                            
                        <?php endforeach ?>
                    <?php endif ?>
                <?php endif ?>
            <?php endforeach ?>
            <a class="h" href="" id='cambio-cuerpo'></a>
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
    <script>
        let msnry;
        // mansory
        let spinner = document.getElementById('spinner');

        // Mostrar spinner
        spinner.style.display = 'block';

        let grid = document.querySelector('.grid-container');
        imagesLoaded(grid, function () {//comprobar si se han cargado imagenes
            msnry = new Masonry(grid, {
                itemSelector: '.grid-item',
                columnWidth: 230,
            });

            // ocultar spinner
            spinner.style.display = 'none';
        });
    </script>
    <!-- <script src="eliminar.js"></script> -->
    <script src="loadCarpetas.js"></script>
    <script src="modoOscuro.js"></script>
    <script src="menu.js"></script>
</body>

</html>