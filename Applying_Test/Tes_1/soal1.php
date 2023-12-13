<?php

function A000124($n) {
    return ($n * ($n + 1) / 2) + 1;
}

echo "Masukkan jumlah bilangan: ";
$input = intval(trim(fgets(STDIN)));


for ($i = 1; $i <= $input; $i++) {
    $output = A000124($i);
    echo $output;
    if ($i != $input) {
        echo "-";
    }
}


?>
