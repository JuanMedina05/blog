<?php 
class PostRepository{
    public static function getPostById($idPost){
        $db = Connection::connect();
        $q="SELECT * FROM post WHERE id=".$idPost;
        $result = $db->query($q);
        if($row=$result->fetch_assoc()){
            return new Post($row['title'],$row['datetime'],$row['text'],$row['id']);
        }
        return null;
    }
    public static function getPosts(){
        $db = Connection::connect();
        $q="SELECT * FROM post";
        $result=$db->query($q);
        $posts=array();
        while ($row = $result->fetch_assoc()){
            $posts[]= new Post($row['title'],$row['datetime'],$row['text'],$row['id']);
        }
        return $films;
    }
    public static function addPost($title,$datetime,$text,$id){
        $db = Connection::connect();
        $q="INSERT INTO post VALUES (NULL, '".$_POST.",";
    }
}
?>