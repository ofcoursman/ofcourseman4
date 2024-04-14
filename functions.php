<?php

function spocitajPocetObrazkov($cestaKAdresaru) {
    $cestaKAdresaru = __DIR__ . '/' . $cestaKAdresaru;

    $adresar = opendir($cestaKAdresaru);

    $pocetObrazkov = 0;

    while (($subor = readdir($adresar)) !== false) {
        $cestaKSuboru = $cestaKAdresaru . '/' . $subor;

        if (is_file($cestaKSuboru)) {
            if (exif_imagetype($cestaKSuboru)) {
                $pocetObrazkov++;
            }
        }
    }

    closedir($adresar);

    return $pocetObrazkov;
}

?>
