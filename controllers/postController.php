<?php

// nuevo post
if (isset($_GET["newPost"])) {
    require_once("views/newPostView.phtml");
    exit();
}

// ver post individual
if (isset($_GET['id'])) {
    $post = PostRepository::getPostById($_GET['id']);
    require_once 'views/showPostView.phtml';
    exit();
}

// ver listado de posts
$posts = PostRepository::getPosts();
require_once("views/postsView.phtml");