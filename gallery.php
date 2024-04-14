<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<header>
    <img src="Obrazky/logo2.png" alt="logo2.png">
    <h1>ITE</h1>
</header>
<nav>
    <div>
    <ul class="nav">
        <li><a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-fw fa-search"></i> Search</a></li>
        <li><a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a></li>
        <li><a href="kalkulacka.php"><i class="fa fa-fw fa-user"></i> Kalkulačka</a></li>
        <li class="has-submenu">
            <a href="#">Gallery</a>
            <ul class="submenu">
                <?php
                $galleryPath = 'GALERIA';
                $selectedGallery = isset($_GET['gallery']) ? $_GET['gallery'] : '';

                if (is_dir($galleryPath)) {
                    $subdirectories = glob($galleryPath . '/*', GLOB_ONLYDIR);
                    foreach ($subdirectories as $subdirectory) {
                        $subdirectoryName = basename($subdirectory);
                        $isActive = ($selectedGallery === $subdirectoryName) ? 'active' : '';
                        echo '<li><a class="' . $isActive . '" href="gallery.php?gallery=' . urlencode($subdirectoryName) . '">' . $subdirectoryName . '</a></li>';
                    }
                }
                ?>
            </ul>
        </li>
    </ul>
    </div class="active">
</nav>

<div id="gallery-container">
    <?php
    if ($selectedGallery) {
        $galleryPath = 'GALERIA/' . $selectedGallery;

        if (is_dir($galleryPath)) {
            $images = glob($galleryPath . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
            foreach ($images as $image) {
                echo '<img src="' . $image . '" alt="Gallery Image">';
            }
        } else {
            echo 'Invalid gallery selected.';
        }
    } else {
        echo 'Please select a gallery.';
    }
    ?>
</div>


<?php
include 'functions.php';

$cestaKAdresaru = 'GALERIA/' . $selectedGallery;

$pocetObrazkov = spocitajPocetObrazkov($cestaKAdresaru);

echo 'Počet obrázkov v galérii: ' . $pocetObrazkov;
?>
<footer>
    <p>&copy; 2023 My Website - <a href="https://icons.getbootstrap.com/?utm_source=cdnjs&utm_medium=cdnjs_link&utm_campaign=cdnjs_library">Email</a> </p>
</footer>
</body>
</html>
</body>
</html>
