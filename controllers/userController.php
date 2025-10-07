<?php

// logout
if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    header('Location: index.php');
    exit();
}

// login
if (isset($_POST['username']) && isset($_POST['password'])) {
    $q = 'SELECT * FROM user WHERE name="' . $_POST['username'] . '" 
          AND password="' . md5($_POST['password']) . '"';

    $result = $db->query($q);

    if ($row = $result->fetch_assoc()) {
        $_SESSION['user'] = new User($row['name'], $row['id']);
        header('Location: index.php');
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}

// si no hay usuario logueado → mostrar login
if (!$_SESSION['user']) {
    require_once('views/loginView.phtml');
    exit;
}
