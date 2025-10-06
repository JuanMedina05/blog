<?php
// logout
if(isset($_GET['logout'])){
    unset($_SESSION['user']);
    header('location:index.php');
    exit();
}

if(!isset($_SESSION['user'])){
    $_SESSION['user'] = null;
}

// login
if(isset($_POST['usr']) && isset($_POST['pswd'])){
    $usr = $db->real_escape_string($_POST['usr']);
    $pswd = md5($_POST['pswd']);

    $q = "SELECT * FROM user WHERE name='$usr' AND password='$pswd'";
    $result = $db->query($q);

    if($row = $result->fetch_assoc()){
        $_SESSION['user'] = new User($row['username'],$row['id']);
        header('location:index.php'); // redirigir al inicio tras login
        exit;
    }
}

// si no hay usuario logueado → mostrar login
if(!$_SESSION['user']){
    require_once('views/login.phtml');
    exit;
}

// si llega aquí es porque hay usuario
require_once("controllers/movieController.php");