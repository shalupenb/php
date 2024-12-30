<?php

require_once 'Menu.php';

$menu = new Menu();

$menu->AddMenuItem('Home', '/home');
$menu->AddMenuItem('About', '/about');
$menu->AddMenuItem('Photo', '/photo');
$menu->AddMenuItem('Contact Us', '/contact');
$menu->AddMenuItem('Login', '/login');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Example</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        main {
            margin-top: 60px;
            padding: 20px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<?php
$menu->PrintMenu(1000, 60, '#007bff', '#ffffff');
?>

<main>
    <h1>Welcome to the Website</h1>
    <p>Here you can navigate through the website using the menu above.</p>
</main>
</body>
</html>
