<?php
session_start();
?>
<html>
<head>
    <script src="./js/index.js">
    </script>
    <link rel="stylesheet" type="text/css" href="./styles/style.css">
</head>
<body>
<?php
//$_GET, $_POST - глобальні масиви
function form()
{
    echo '<form method="post" action="handler.php">';
    echo 'Login: <input type="text" name="login" /><br>';
    echo '<button type="submit">OK</button>';
    echo '</form>';
}
form();
if(isset($_COOKIE) && isset($_COOKIE["login"]))
{
    echo 'Hello '.$_COOKIE["login"];
}
?>
</body>
</html>
