<?php
require __DIR__ . '/vendor/autoload.php';
use Myvendor\Myproject\Database;

$id = $_POST["id"];
$data = new Database();
$data->BorrowBook($id);

