<?php
session_start(); // Для збереження даних між сторінками

if (!isset($_SESSION['page'])) {
    $_SESSION['page'] = 1;
    $_SESSION['score'] = 0;
    $_SESSION['page1_score'] = 0;
    $_SESSION['page2_score'] = 0;
}

$page = $_SESSION['page'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($page === 1) {
        // Оцінка відповідей 1-ї сторінки
        $correct_answers = ['1' => 'A', '2' => 'B', '3' => 'C', '4' => 'D', '5' => 'A', '6' => 'B', '7' => 'C', '8' => 'D', '9' => 'A', '10' => 'B'];
        $user_answers = $_POST['answers'] ?? [];
        $score = 0;
        foreach ($correct_answers as $question => $correct) {
            if (isset($user_answers[$question]) && $user_answers[$question] === $correct) {
                $score++;
            }
        }
        $_SESSION['page1_score'] = $score; // 1 бал за кожну правильну відповідь
    }

    if ($page === 2) {
        // Оцінка відповідей 2-ї сторінки
        $correct_answers = [
            '1' => ['A', 'B'], '2' => ['C'], '3' => ['C', 'D'], '4' => ['A'], '5' => ['B', 'C'],
            '6' => ['B'], '7' => ['B', 'C', 'D'], '8' => ['B', 'D'], '9' => ['A', 'C'], '10' => ['A', 'B', 'C']
        ];
        $user_answers = $_POST['answers'] ?? [];
        $score = 0;
        foreach ($correct_answers as $question => $correct) {
            if (isset($user_answers[$question]) && !array_diff($correct, $user_answers[$question])) {
                $score++;
            }
        }
        $_SESSION['page2_score'] = $score * 3; // 3 бали за кожну правильну відповідь
    }

    if ($page === 3) {
        // Оцінка відповідей 3-ї сторінки
        $correct_answers = ['1' => 'word1', '2' => 'word2', '3' => 'word3', '4' => 'word4', '5' => 'word5',
            '6' => 'word6', '7' => 'word7', '8' => 'word8', '9' => 'word9', '10' => 'word10'];
        $user_answers = $_POST['answers'] ?? [];
        $score = 0;
        foreach ($correct_answers as $question => $correct) {
            if (isset($user_answers[$question]) && strtolower(trim($user_answers[$question])) === strtolower($correct)) {
                $score++;
            }
        }
        $_SESSION['score'] = $_SESSION['page1_score'] + $_SESSION['page2_score'] + $score * 5; // 5 балів за кожну правильну відповідь
    }

    $_SESSION['page']++;
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Рендеринг сторінок
function renderPage1() {
    echo '<form method="POST">';
    for ($i = 1; $i <= 10; $i++) {
        echo "<p>Питання $i: ";
        foreach (['A', 'B', 'C', 'D'] as $option) {
            echo "<label><input type='radio' name='answers[$i]' value='$option' required> $option</label> ";
        }
        echo '</p>';
    }
    echo '<button type="submit">Next</button>';
    echo '</form>';
}

function renderPage2() {
    echo '<form method="POST">';
    for ($i = 1; $i <= 10; $i++) {
        echo "<p>Питання $i: ";
        foreach (['A', 'B', 'C', 'D'] as $option) {
            echo "<label><input type='checkbox' name='answers[$i][]' value='$option'> $option</label> ";
        }
        echo '</p>';
    }
    echo '<button type="submit">Next</button>';
    echo '</form>';
}

function renderPage3() {
    echo '<form method="POST">';
    for ($i = 1; $i <= 10; $i++) {
        echo "<p>Питання $i: <input type='text' name='answers[$i]' placeholder='Слово'></p>";
    }
    echo '<button type="submit">Finish</button>';
    echo '</form>';
}

function renderResults() {
    echo '<h1>Результат</h1>';
    echo '<p>Ваш результат: ' . $_SESSION['score'] . ' балів.</p>';
    session_destroy(); // Очистити дані
}

// Вибір сторінки для відображення
if ($page === 1) {
    renderPage1();
} elseif ($page === 2) {
    renderPage2();
} elseif ($page === 3) {
    renderPage3();
} else {
    renderResults();
}
?>
