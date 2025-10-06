<?php
require_once('models/User.php');
require_once('models/Post.php');

$db=Connection::connect();

require_once("controllers/userController.php");

if(!$_SESSION['user']){
    require_once("views/login.phtml");
}
?>