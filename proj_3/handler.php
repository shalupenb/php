<?php
session_start();
//var_dump($_GET);
if(isset($_POST["login"]) && !empty($_POST["login"]))
{
    setcookie("login", $_POST["login"], time()+(60*5), httponly: true);
    header("Location: index.php");
}