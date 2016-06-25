<?php
// define variables and set to empty values
  
include "../../Database/MySqlConnect.php";
  
$Title = $ISBN = $Writer = $Publisher = $Pages = $Persentage_of_images =  $Min_age_no_read = $Min_age_read = $For_parents = $Price = $Hard_copy = $E_book = $Audio_book = $Link = $Curriculum = $Cover = $Back_cover = $Show_to_user ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  if (empty($_POST["Title"])) {
    header("Location: ../index.php#new_book");
    exit();
  } else {
    $Title = test_input($_POST["Title"]);
    
  }

  if (empty($_POST["ISBN"])) {
    header("Location: ../index.php#new_book");
    exit();
  } else {
    $ISBN = test_input($_POST["ISBN"]);
  }
  
  if (empty($_POST["Writer"])) {
    header("Location: ../index.php#new_book");
    exit();
  } else {
    $Writer = test_input($_POST["Writer"]);
  }


  $Illustrator = test_input($_POST["Illustrator"]);
  
  if (empty($_POST["Publisher"])) {
    header("Location: ../index.php#new_book");
    exit();
  } else {
    $Publisher = test_input($_POST["Publisher"]);
  }

  if (empty($_POST["Pages"])) {
    header("Location: ../index.php#new_book");
    exit();
  } else {
    $Pages = test_input($_POST["Pages"]);
  }

  if (empty($_POST["Persentage_of_images"])) {
    header("Location: ../index.php#new_book");
    exit();
  } else {
    $Persentage_of_images = test_input($_POST["Persentage_of_images"]);
  }

  if (empty($_POST["Min_age_no_read"])) {
    header("Location: ../index.php#new_book");
    exit();
  } else {
    $Min_age_no_read = test_input($_POST["Min_age_no_read"]);
  }
  
   if (empty($_POST["Min_age_read"])) {
    header("Location: ../index.php#new_book");
    exit();
  } else {
    $Min_age_read = test_input($_POST["Min_age_read"]);
  }

  if(! empty($_POST["For_parents"])){
    $For_parents = "1";
  }

  if (empty($_POST["Price"])) {
    header("Location: ../index.php#new_book");
    exit();
  } else {
    $Price = test_input($_POST["Price"]);
  }

  if(! empty($_POST["Hard_copy"])){
    $Hard_copy = "1";
  }
  
  if(! empty($_POST["E_book"])){
    $E_book = "1";
  }
  
  if(! empty($_POST["Audio_book"])){
    $Audio_book = "1";
  }

  $Link = test_input($_POST["Link"]);

   if (empty($_POST["Curriculum"])) {
    header("Location: ../index.php#new_book");
    exit();
  } else {
    $Curriculum = test_input($_POST["Curriculum"]);
  }

  if (empty($_FILES["Cover"]["name"])){
    $_SESSION["Cover_err"] = "Cover is required";
    header("Location: ../index.php#new_book");
    exit();
  } else {
    $target_dir = '../../Database/Covers/'; // upload directory
    $target_file = $target_dir . basename($_FILES["Cover"]["name"]);
    $Cover = basename($_FILES["Cover"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["Cover"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
        exit();
    }

    if ($_FILES["Cover"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
      exit();
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
      exit();
    }

    if (move_uploaded_file($_FILES["Cover"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["Cover"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit();
    }
  }

  if (empty($_FILES["Back_cover"]["name"])){
     $_SESSION["Back_cover_err"] = "Back Cover is required";
    header("Location: ../index.php#new_book");
    exit();
  } else {
  	$target_dir = '../../Database/Back_Covers/'; // upload directory
    $target_file = $target_dir . basename($_FILES["Back_cover"]["name"]);
    $Back_cover = basename($_FILES["Back_cover"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["Back_cover"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
        exit();
    }

    if ($_FILES["Back_cover"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
      exit();
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
      exit();
    }

    if (move_uploaded_file($_FILES["Back_cover"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["Back_cover"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit();
    }
  }

  if(! empty($_POST["Show_to_user"])){
    $Show_to_user = "1";
  }


  // NEW BOOK ENTRY
  $new_book_query = $conn->prepare("INSERT INTO books (ISBN, Title, Writer, Illustrator, Publisher, Pages, Persentage_of_images, Min_age_no_read, Min_age_read,For_parents, Cover, Back_cover, Link, Price, Hard_copy, E_book, Audio_book, Curriculum, Show_to_user) VALUES ('{$ISBN}', '{$Title}', '{$Writer}', '{$Illustrator}', '{$Publisher}', '{$Pages}', '{$Persentage_of_images}', '{$Min_age_no_read}', '{$Min_age_read}', '{$For_parents}', '{$Cover}', '{$Back_cover}', '{$Link}', '{$Price}', '{$Hard_copy}', '{$E_book}','{$Audio_book}', '{$Curriculum}', '{$Show_to_user}' )");
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

  header("Location: ../index.php");
  exit;


}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<!-- UPLOAD FILE MYSQL PHP -->
<!-- http://talkerscode.com/webtricks/upload%20image%20to%20database%20and%20server%20using%20HTML,PHP%20and%20MySQL.php -->

