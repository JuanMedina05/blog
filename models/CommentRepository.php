<?php
class CommentRepository{
    public static function getCommentsByPost($post_id){
        $db=Connection::connect();
        $q="select * from comment where idpost=".$post_id
        $result=$db->query($q);
        $comments=array();
        while($row=$result->fetch_assoc()){
            $comments[]=new Comment($row['id'],...)
        }
        return $comments;
    }
    public static function addComment($content, $post_id, $author){
        $db=Connection::connect();
        $q="insert into comment values(NULL,'".$content."','".$post_id."',
    }
}