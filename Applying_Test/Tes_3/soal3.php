<?php

function isBalanced($expression) {
    $stack = [];
    $mapping = [')' => '(', '}' => '{', ']' => '['];

    for ($i = 0; $i < strlen($expression); $i++) {
        $char = $expression[$i];

        if (in_array($char, array_values($mapping))) {
            array_push($stack, $char);
        } elseif (in_array($char, array_keys($mapping))) {
            if (empty($stack) || array_pop($stack) != $mapping[$char]) {
                return "NO";
            }
        }
    }

    return empty($stack) ? "YES" : "NO";
}


echo "Masukkan tanda kurung: ";
$userInput = trim(fgets(STDIN));


$result = isBalanced($userInput);


echo "Hasil: " . $result . "\n";

?>
