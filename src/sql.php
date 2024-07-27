<?php
namespace Myvendor\Myproject;
use PDO;
use PDOException;

class Database{
    private $dbname = "simplelibrary";
    private $host = "localhost";
    private $dsn = "mysql:host = localhost;dbname=simplelibrary";
    private $dbuser = "root";
    private $dbpass = "";
    private $pdo;
    
    public function __construct() {
        try {
            $pdo = new PDO($this->dsn, $this->dbuser, $this->dbpass);
        
        }
        catch (PDOException $e) {
            echo "Connection failed". $e->getMessage();
        }
    }

    public function AddBook(EBook $book) {
        $query = "INSERT INTO books(id,title,author,isbn,format) Values(?,?,?,?,?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$book->getId(), $book->getTitle(), $book->getAuthor(),$book->getIsbn(),$book->getFileFormat()]);
        header("Location:../index.php");
    }

    public function ViewBooks(){
        $query = "SELECT * FROM books";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if(empty( $books )) {
            echo "there is no books here";
        }
        else {
            foreach($books as $book) {
                echo htmlspecialchars($book["id"]);
                echo htmlspecialchars($book["title"]);
                echo htmlspecialchars($book["author"]);
                echo htmlspecialchars($book["isbn"]);
                echo htmlspecialchars($book["stat"]);
                echo htmlspecialchars($book["format"]);
        }
    }}

    public function BorrowBook($id){
        $query = "UPDATE books SET stat = :value1 WHERE id = :value2;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':value1', "borrowed");
        $stmt->bindParam(':value2', $id);

        $value1 = "borrowed";
        $value2 = $id;
        $stmt->execute();
        header("Location:../index.php");

    }
};