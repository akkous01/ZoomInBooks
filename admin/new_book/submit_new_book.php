<?php
// define variables and set to empty values
$Title_err = $ISBN_err = $Writer_err = $Publisher_err = $Pages_err = $Persentage_of_images_err = $Min_age_err = $Max_age_err = $Price_err = $Cover_err = $Back_cover_err = "";
$Title = $ISBN = $Writer = $Publisher = $Pages = $Persentage_of_images =  $Min_age = $Max_age = $Price = $Link = $Cover = $Back_cover = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  if (empty($_POST["Title"])) {
    $Title_err = "Title is required";
  } else {
    $Title = test_input($_POST["Title"]);
  }

  if (empty($_POST["ISBN"])) {
    $ISBN_err = "ISBN is required";
  } else {
    $ISBN = test_input($_POST["ISBN"]);
  }
  
  if (empty($_POST["Writer"])) {
    $Writer_err = "Writer is required";
  } else {
    $Writer = test_input($_POST["Writer"]);
  }


  $Illustrator = test_input($_POST["Illustrator"]);
  
  if (empty($_POST["Publisher"])) {
    $Publisher_err = "Publisher is required";
  } else {
    $Publisher = test_input($_POST["Publisher"]);
  }

  if (empty($_POST["Pages"])) {
    $Pages_err = "Pages is required";
  } else {
    $Pages = test_input($_POST["Pages"]);
  }

  if (empty($_POST["Persentage_of_images"])) {
    $Persentage_of_images_err = "Persentage of images is required";
  } else {
    $Persentage_of_images = test_input($_POST["Persentage_of_images"]);
  }

  if (empty($_POST["Min_age"])) {
    $Min_age_err = "Minimun age is required";
  } else {
    $Min_age = test_input($_POST["Min_age"]);
  }
  
   if (empty($_POST["Max_age"])) {
    $Max_age_err = "Maximun age is required";
  } else {
    $Max_age = test_input($_POST["Max_age"]);
  }

   if (empty($_POST["Price"])) {
    $Price_err = "Price is required";
  } else {
    $Price = test_input($_POST["Price"]);
  }

  $Link = test_input($_POST["Link"]);

  if (empty($_FILES["Cover"]["name"])){
  	$Cover_err = "Cover is required";
  } else {
  	$Cover=$_FILES["Cover"]["name"]; 
  }

  if (empty($_FILES["Back_cover"]["name"])){
  	$Back_cover_err = "Back Cover is required";
  } else {
  	$Back_cover=$_FILES["Back_cover"]["name"]; 
  }


  // NEW BOOK ENTRY
  $new_book_query = $conn->prepare("INSERT INTO books (ISBN, Title, Writer, Illustrator, Publisher, Pages, Persentage_of_images, Min_age, Max_age, Cover, Back_cover, Link, Price) VALUES ('{$ISBN}', '{$Title}', '{$Writer}', '{$Illustrator}', '{$Publisher}', '{$Pages}', '{$Persentage_of_images}', '{$Min_age}', '{$Max_age}', '{$Cover}', '{$Back_cover}', '{$Link}', '{$Price}' )");
  $new_book_query->execute();

  // GET BOOK ID
  $book_id_query = $conn->prepare("SELECT * FROM books ORDER BY Book_id DESC LIMIT 0, 1");
  $book_id_query->execute();
  $book_id= $book_id_query->fetchAll(PDO::FETCH_ASSOC);

  $book_id = (integer) $book_id[0]['Book_id'];

  // GET KEYWORDS
  $max_keyword_id_query = $conn->prepare("SELECT * FROM keywords ORDER BY Keyword_id DESC LIMIT 0, 1");
  $max_keyword_id_query->execute();
  $max_keyword_id= $max_keyword_id_query->fetchAll(PDO::FETCH_ASSOC);

  $max_keyword_id = (integer) $max_keyword_id[0]['Keyword_id'];

 
  for ($i = 1 ; $i <= $max_keyword_id ; $i++){
    if (!empty($_POST['K'.$i])){
      $books_keywords_query = $conn->prepare("INSERT INTO books_keywords (Book_id, Keyword_id) VALUES ('{$book_id}','{$i}')");
      $books_keywords_query->execute();
    }
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!-- UPLOAD FILE MYSQL PHP -->
<!-- http://talkerscode.com/webtricks/upload%20image%20to%20database%20and%20server%20using%20HTML,PHP%20and%20MySQL.php
 -->
