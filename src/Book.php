<?php
namespace Myvendor\Myproject;
class Book{
    private $id;
    private $title;
    private $Author;
    private $Isbn;
    private $status;

    public function __construct($id,$title,$Author,$ISBN,$status = "available") {
        $this ->id = $id;
        $this ->title = $title;
        $this -> Author = $Author;
        $this ->Isbn = $ISBN;
        $this ->status = $status;
    }
    public function getId() { return $this ->id; }
    public function getTitle() { return $this ->title; }
    public function getAuthor() { return $this -> Author; }
    public function getIsbn() { return $this -> Isbn; }
    public function getStatus() { return $this -> status; }
    public function setId($id){
        $this ->id = $id;
    }
    public function setTitle($title){
        $this ->title = $title;
    }
    public function setAuthor($Author){
        $this -> Author = $Author;
    }
    public function setIsbn($ISBN){
        $this -> Isbn = $ISBN;}
    public function setStatus($status){
        $this -> Status = $status;}
    
}