<?php
// 1.

$colors = ["red", "green", "blue", "yellow", "purple", "orange", "pink", "brown"];
function displayColoredDivs($colors) {
    shuffle($colors);
    $uniqueColors = array_slice($colors, 0, 4);

    foreach ($uniqueColors as $color) {
        echo "<div style='
            width: 100px; 
            height: 100px; 
            display: inline-block; 
            margin: 10px; 
            background-color: $color;'></div>";
    }
}
displayColoredDivs($colors);

// 2.

function generateCalendar($m) {
    if ($m < 1 || $m > 12) {
        echo "Error: Expected value in range 1-12";
        return;
    }

    $year = date("Y");
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $m, $year);
    $firstDay = date("w", strtotime("$year-$m-0"));

    $monthName = date("F", mktime(0, 0, 0, $m, 1, $year));

    echo "<h2 style='text-align: center;'>$monthName $year</h2>";
    echo "<table style='
        border-collapse: collapse; 
        width: 100%; 
        border: 1px solid black; 
        text-align: center;'>";
    echo "<tr style='background-color: #f2f2f2;'>
        <th style='padding: 8px; border: 1px solid black;'><em>Mon</em></th>
        <th style='padding: 8px; border: 1px solid black;'><em>Tue</em></th>
        <th style='padding: 8px; border: 1px solid black;'><em>Wed</em></th>
        <th style='padding: 8px; border: 1px solid black;'><em>Thu</em></th>
        <th style='padding: 8px; border: 1px solid black;'><em>Fri</em></th>
        <th style='padding: 8px; border: 1px solid black;'><em>Sat</em></th>
        <th style='padding: 8px; border: 1px solid black;'><em>Sun</em></th>
    </tr>";

    $currentDay = 1;

    for ($row = 0; $currentDay <= $daysInMonth; $row++) {
        echo "<tr>";
        for ($col = 0; $col < 7; $col++) {
            if ($row == 0 && $col < $firstDay || $currentDay > $daysInMonth) {
                echo "<td style='padding: 8px; border: 1px solid black;'></td>";
            } else {
                echo "<td style='padding: 8px; border: 1px solid black;'>$currentDay</td>";
                $currentDay++;
            }
        }
        echo "</tr>";
    }

    echo "</table>";
}
generateCalendar(12);
