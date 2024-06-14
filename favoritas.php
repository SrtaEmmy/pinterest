<?php
session_start();

if (isset($_SESSION['favoritos'])) {
    $favoritos = $_SESSION['favoritos'];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idImg'])) {

    function filterById($element)
    {
        $id_imagen = $_POST['idImg'];
        return $element['id_img'] !== $id_imagen;
    }


    $_SESSION['favoritos'] = array_values(array_filter($_SESSION['favoritos'], 'filterById'));

    header('Location: favoritas.php');
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
        <!-- <div class="container container-folders">
            <button type="button" class=" btnCrear" data-bs-toggle="modal" data-bs-target="#exampleModal"
                data-bs-whatever="@mdo">Crear carpeta</button>
            <a href="favoritas.php" class="carpeta">Favoritos</a>
        </div> -->


        <h1>Favoritos</h1>
        <div class='grid-container'>

            <?php if (!empty($favoritos)): ?>
                <?php foreach ($favoritos as $favorito): ?>

                    <div class=" grid-item">
                        <div class="image-wrapper">
                            <form method="post">
                                <input type="hidden" name="idImg" value="<?php echo $favorito['id_img'] ?>">
                                <button class="btn" type="submit"><i class="bi bi-x-circle-fill"
                                        style="color: white;"></i></button>
                            </form>
                            <img src="<?php echo $favorito['url'] ?>" id="<?php echo $favorito['id_img'] ?>" alt="">
                        </div>
                    </div>

                <?php endforeach ?>
            <?php else: ?>
                <p class="texto">No hay favoritos aun</p>
            <?php endif ?>
            <a href="" id='cambio-cuerpo' style="display: none;"></a>

        </div>
    </div>




    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>

    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

    <script>
        let msnry;
        // mansory
        let grid = document.querySelector('.grid-container');
        let spinner = document.getElementById('spinner');

        // Mostrar spinner
        spinner.style.display = 'block';

        imagesLoaded(grid, function () {//comprobar si se han cargado imagenes
            msnry = new Masonry(grid, {
                itemSelector: '.grid-item',
                columnWidth: 230,
            });
            // Ocultar spinner
            spinner.style.display = 'none';
        });



    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="loadCarpetas.js"></script>
    <script src="nuevaCarpeta.js"></script>
    <script src="modoOscuro.js"></script>
    <script src="menu.js"></script>
</body>

</html>