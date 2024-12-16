<?php
//----------3
function renderCircles($count = 10) {
    echo "<div style='display: flex;'>";
    for ($i = 0; $i < $count; $i++) {
        echo "<div style='width: 50px; height: 50px; border-radius: 50%; background-color: blue; margin: 5px;'></div>";
    }
    echo "</div>";
}
renderCircles();
//----------4
function binaryToHex($binary) {
    $decimal = bindec($binary);
    $hex = dechex($decimal);
    return $hex;
}
echo "<p>Number 1010 in hex: " . binaryToHex("1010") . "</p>";
