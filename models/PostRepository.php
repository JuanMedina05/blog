<?php 
class PostRepository {

    public static function getPostById($idPost) {
        $db = Connection::connect();
        $idPost = intval($idPost); // protección contra inyección
        $q = "SELECT * FROM post WHERE id = $idPost";
        $result = $db->query($q);

        if ($row = $result->fetch_assoc()) {
            // Asumiendo que Post tiene constructor (title, datetime, text, id)
            return new Post($row['title'], $row['datetime'], $row['text'], $row['id']);
        }

        return null;
    }

    public static function getPosts() {
        $db = Connection::connect();
        $q = "SELECT * FROM post ORDER BY datetime DESC";
        $result = $db->query($q);

        $posts = [];
        while ($row = $result->fetch_assoc()) {
            $posts[] = new Post($row['title'], $row['datetime'], $row['text'], $row['id']);
        }

        return $posts;
    }

    public static function addPost($title, $datetime, $text, $user_id) {
        $db = Connection::connect();

        // Escapar los valores
        $title = $db->real_escape_string($title);
        $text = $db->real_escape_string($text);
        $datetime = $db->real_escape_string($datetime);
        $user_id = intval($user_id);

        $q = "INSERT INTO post (title, datetime, text, user_id) 
              VALUES ('$title', '$datetime', '$text', $user_id)";

        return $db->query($q);
    }
}
?>