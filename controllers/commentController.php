<?php

if(isset($_POST["addComment"])){
    CommentRepository::addComment($_POST["content"],$_GET['idpost']);
}