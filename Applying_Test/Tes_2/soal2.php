<?php

function denseRanking($totalPlayers, $scores, $numGames, $gameScores) {
    // Urutkan skor secara descending
    arsort($scores);

    // Buat array untuk menyimpan peringkat masing-masing pemain
    $ranking = array();

    $currentRank = 1;
    $prevScore = null;

    foreach ($scores as $score) {
        if ($score !== $prevScore) {
            // Jika skor belum ada dalam array peringkat, tambahkan dengan peringkat saat ini
            $ranking[$score] = $currentRank;
        }
        $currentRank++;
        $prevScore = $score;
    }

    // Hitung peringkat untuk setiap skor permainan GITS
    // Hitung peringkat untuk setiap skor permainan GITS
// Hitung peringkat untuk setiap skor permainan GITS
$result = array();
foreach ($gameScores as $gameScore) {
    if (($ranking[$gameScore]) || isset($ranking[$gameScore]) ) {
        // Jika skor permainan GITS ada dalam peringkat, tambahkan peringkat ke hasil
        $result[] = $ranking[$gameScore];
    } elseif ($gameScore >= $scores) {
        // Jika skor permainan GITS lebih dari skor permainan terbesar, set peringkat sebagai skor permainan GITS
        $result[] = $gameScore;
    } else {
        // Jika skor permainan GITS tidak ada dalam peringkat dan tidak lebih dari skor permainan terbesar, tambahkan tanda strip
        $result[] = '';
    }
}



    return $result;
}

// Read input for the total number of players
echo "Masukkan jumlah pemain: ";
$totalPlayers = intval(trim(readline()));

// Read input for the scores
echo "Masukkan skor pemain (pisahkan dengan spasi): ";
$inputScores = trim(readline());
$scores = array_map('intval', explode(' ', $inputScores));

// Read input for the number of games
echo "Masukkan jumlah permainan GITS: ";
$numGames = intval(trim(readline()));

// Read input for the game scores
echo "Masukkan skor permainan GITS (pisahkan dengan spasi): ";
$inputGameScores = trim(readline());
$gameScores = array_map('intval', explode(' ', $inputGameScores));

// Hitung Dense Ranking
try {
    $result = denseRanking($totalPlayers, $scores, $numGames, $gameScores);

    // Tampilkan hasil
    echo "Hasil Dense Ranking: " . implode(', ', $result) . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
