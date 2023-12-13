<?php

function denseRanking($totalPlayers, $scores, $gameCount, $gitsScores) {
    rsort($scores);
    $rankings = array();
    

    for ($i = 0; $i < $totalPlayers; $i++) {
        $rankings[$i] = -1;
    }
    

    $currentRank = 1;
    $rankings[0] = $currentRank;
    
    // Menyusun peringkat untuk setiap pemain
    for ($i = 1; $i < $totalPlayers; $i++) {
        if ($scores[$i] < $scores[$i - 1]) {
            $currentRank++;
        }
        $rankings[$i] = $currentRank;
    }
    

    $gitsRankings = array();
    for ($i = 0; $i < $gameCount; $i++) {
        $gitsScore = $gitsScores[$i];
        $index = array_search($gitsScore, $scores);
        $gitsRankings[] = $rankings[$index];
    }
    

    return $gitsRankings;
}


echo "Masukkan jumlah pemain: ";
$totalPlayers = intval(trim(fgets(STDIN)));

echo "Masukkan skor pemain (pisahkan dengan spasi): ";
$scores = array_map('intval', explode(' ', trim(fgets(STDIN))));

echo "Masukkan jumlah permainan GITS: ";
$gameCount = intval(trim(fgets(STDIN)));

echo "Masukkan skor permainan GITS (pisahkan dengan spasi): ";
$gitsScores = array_map('intval', explode(' ', trim(fgets(STDIN))));

$result = denseRanking($totalPlayers, $scores, $gameCount, $gitsScores);

echo "Hasil peringkat GITS: " . implode(' ', $result) . "\n";
?>
