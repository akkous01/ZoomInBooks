<?php 

session_start();
// $book_id = $_SESSION["book_id"];
$book_id = 10;

$mark1 = $mark2 = $mark3 = $mark4 = $mark5 = ""; 

// $mark4 = "style='display:none'";
// $mark2 = "style='display:none'";

// if($_SESSION["ithiki"] == 0){
// 	$mark1 = "style='display:none'";
// }
// if($_SESSION["sindesi"] == 0){
// 	$mark2 = "style='display:none'";
// }
// if($_SESSION["epipleon"] == 0){
// 	$mark3 = "style='display:none'";
// }
// if($_SESSION["gramatiki"] == 0){
// 	$mark4 = "style='display:none'";
// }
// if($_SESSION["analisi"] == 0){
// 	$mark5 = "style='display:none'";
// }

include "../Database/MySqlConnect.php";

// Teleftea 5 biblia
$book_query = $conn->prepare("SELECT * FROM books WHERE Book_id='{$book_id}' ");

$book_query->execute();

$book = $book_query->fetchAll(PDO::FETCH_ASSOC);

$Title = $book[0]["Title"];
$ISBN = $book[0]["ISBN"];
$Writer = $book[0]["Writer"];
$Illustrator = $book[0]["Illustrator"];
$Publisher = $book[0]["Publisher"];
$Pages = $book[0]["Pages"];
$Persentage_of_images =  $book[0]["Persentage_of_images"];
$Min_age_no_read = $book[0]["Min_age_no_read"];
$Min_age_read = $book[0]["Min_age_read"];
$For_parents = $book[0]["For_parents"];
$Price = $book[0]["Price"];
$Hard_copy = $book[0]["Hard_copy"];
$E_book = $book[0]["E_book"];
$Audio_book = $book[0]["Audio_book"];
$Link = $book[0]["Link"];
$Curriculum = $book[0]["Curriculum"];
$Cover = $book[0]["Cover"];
$Back_cover = $book[0]["Back_cover"];



?>