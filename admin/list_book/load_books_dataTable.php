<?php
/**
 * Created by PhpStorm.
 * User: HpPC
 * Date: 16-Jun-16
 * Time: 5:10 PM
 */


$load_books_query = $conn->prepare("SELECT * FROM `books`;");
$load_books_query->execute();

$load_books_to_list=$load_books_query->fetchAll(PDO::FETCH_ASSOC);

?>