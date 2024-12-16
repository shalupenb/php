<?php
//phpinfo();
//die();
//$a = "test";
//function test($str)
//{
//    echo $str;
//}
//$name_func = "foo";
//
//test($name_func);
declare(strict_types=1);
function form():void
{
    echo "<form method='GET' action=''>";
    echo "<input type='text' name='name' placeholder='Name'>";
    echo "<input type='submit' name='submit' value='Submit'>";
    echo "</form>";
}
form();
if(isset($_GET['submit']) && !empty($_GET['name']))
{
    echo $_GET['name'];
}