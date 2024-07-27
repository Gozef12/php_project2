<?php
require __DIR__ . '/vendor/autoload.php';

use Myvendor\Myproject\EBook;
use Myvendor\Myproject\Database;


        $id = $_POST["id"];
        $title = $_POST["title"];
        $author = $_POST["author"];
        $isbn = $_POST["isbn"];
        $fileFormat = $_POST["FileFormat"];

        $book = new EBook($id, $title, $author, $isbn, "available", $fileFormat);

        $da = new Database();
        $da->AddBook($book);
    

