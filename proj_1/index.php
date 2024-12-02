<?php
//$title = 'Bread';
//$count = 10;
//$price = 32.4;
//echo "<b>$title</b><br/><em>$count</em>";
//if($title==='Bread' OR $count===10)
//{
//    echo 'Я купив хліб';
//}
//else if($title==='Milk')
//{
//
//    echo 'Я купив Milk';
//}
//else
//{
//    echo 'Я НЕ купив хліб';
//}
//$res = ($count===10)?24:44;
//echo $res;
//
//switch ($title)
//{
//    case 'Milk':
//        break;
//    default:
//}
//+ - * / % ++ --
//define("PI", 3.14);
//$color = 'grey';
//echo "<div style='color: $color;'>".PI."</div";
//
//echo "<br/>";
//for($i = 1; $i <= 10; $i++)
//{
//    echo $i." ";
//}
//echo "<br/>";
//
//$k = 10;
//echo '<ul>';
//while($k>=0)
//{
//    echo "<li>".$k."</li>";
//    --$k;
//}
//echo "</ul>";
//$arr = [4,5,6,7,8,9];
//foreach($arr as $v)
//{
//    echo $v.' ';
//}
//echo "<br/>";

// 1.
echo "1.<br/>";
$name = "Danya";
echo "<p>Hello! My name is \"$name\".</p>";

// 2.
echo "2.<br/>";
$age = 20;
echo "<p>I’m $age.</p>";

// 3.
echo "3.<br/>";
$a = 5;
$b = 3;
$rez = $a + $b;
echo "<p>'$a' + '$b' = '$rez'</p>";

// 4.
echo "4.<br/>";
echo "<p>Before swap: a = $a, b = $b</p>";
$a = $a + $b;
$b = $a - $b;
$a = $a - $b;
echo "<p>After swap: a = $a, b = $b</p>";

// 5.
echo "5.<br/>";
echo '
<form method="post">
    <p>
        1. Which is the capital of Great Britain?
        <br>
        <input type="radio" name="q1" value="Paris"> Paris
        <input type="radio" name="q1" value="London"> London
        <input type="radio" name="q1" value="Berlin"> Berlin
        <input type="radio" name="q1" value="Rome"> Rome
    </p>
    <p>
        2. Select Fibonacci numbers:
        <br>
        <input type="checkbox" name="q2[]" value="2"> 4
        <input type="checkbox" name="q2[]" value="3"> 20
        <input type="checkbox" name="q2[]" value="4"> 8
        <input type="checkbox" name="q2[]" value="5"> 13
    </p>
    <p>
        3. Describe your favorite hobby:
        <br>
        <textarea name="q3" rows="4" cols="50"></textarea>
    </p>
    <button type="submit">Submit</button>
</form>';

// 6.
echo "6.<br/>";
$tag = "div";
$background_color = "lightblue";
$color = "darkblue";
$width = "200px";
$height = "100px";

echo $tag."<br/>".$background_color."<br/>".$color."<br/>".$width."<br/>".$height."<br/>";

echo "<$tag style='background-color: $background_color; color: $color; width: $width; height: $height;'>
    This is styled $tag element.
</$tag>";
