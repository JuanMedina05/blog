<?php 
class Post{
    private $title;
    private $datetime;
    private $text;
    private $id;
    public function __construct($title,$datetime,$text,$id){
        $this->title->$title;
        $this->datetime->$datetime;
        $this->text->$text;
        $this->id->$id;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getDatetime(){
        return $this->datetime;
    }
    public function text(){
        return $this->text;
    }
    public function getId(){
        return $this->id;
    }
}