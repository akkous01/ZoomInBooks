<?php
/**
 * Created by PhpStorm.
 * User: HpPC
 * Date: 16-Jun-16
 * Time: 2:37 PM
 */
session_start();
include "../MySqlConnect.php";

$book_query = $conn->prepare("SELECT * FROM `books` WHERE book_id=".$_SESSION['book_id'].";");
$book_query->execute();

$book= $book_query->fetchAll(PDO::FETCH_ASSOC);
if($book){
    print_r($book);
}else{
    print("error");
}


?>

