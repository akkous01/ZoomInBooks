<?php
// define variables and set to empty values
  
include "../../Database/MySqlConnect.php";
  
$Title = $ISBN = $Writer = $Publisher = $Pages = $Persentage_of_images =  $Min_age = $Max_age = $Price = $Link = $Cover = $Back_cover = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  if (empty($_POST["Title"])) {
    $_SESSION["Title_err"] = "Title is required";
    $_SESSION["error_found"] = 1;
    header("Location: ../index.php#new_book");
    exit();
  } else {
    $Title = test_input($_POST["Title"]);
     $_SESSION["Title_err"] = "";
  }

  if (empty($_POST["ISBN"])) {
    $_SESSION["ISBN"] = "ISBN is required";
    header("Location: ../index.php#new_book");
    exit();
  } else {
    $ISBN = test_input($_POST["ISBN"]);
    $_SESSION["ISBN"] = "";
  }
  
  if (empty($_POST["Writer"])) {
    $_SESSION["Writer_err"] = "Writer is required";
    header("Location: ../index.php#new_book");
    exit();
  } else {
    $Writer = test_input($_POST["Writer"]);
    $_SESSION["Writer_err"] = "";
  }


  $Illustrator = test_input($_POST["Illustrator"]);
  
  if (empty($_POST["Publisher"])) {
    $_SESSION["Publisher_err"] = "Publisher is required";
    header("Location: ../index.php#new_book");
    exit();
  } else {
    $Publisher = test_input($_POST["Publisher"]);
    $_SESSION["Publisher_err"] = "";
  }

  if (empty($_POST["Pages"])) {
    $_SESSION["Pages_err"] = "Pages is required";
    header("Location: ../index.php#new_book");
    exit();
  } else {
    $Pages = test_input($_POST["Pages"]);
    $_SESSION["Pages_err"] = "";
  }

  if (empty($_POST["Persentage_of_images"])) {
    $_SESSION["Persentage_of_images_err"] = "Persentage of images is required";
    header("Location: ../index.php#new_book");
    exit();
  } else {
    $Persentage_of_images = test_input($_POST["Persentage_of_images"]);
    $_SESSION["Persentage_of_images_err"] = "";
  }

  if (empty($_POST["Min_age"])) {
    $_SESSION["Min_age_err"] = "Minimun age is required";
    header("Location: ../index.php#new_book");
    exit();
  } else {
    $Min_age = test_input($_POST["Min_age"]);
    $_SESSION["Min_age_err"] = "";
  }
  
   if (empty($_POST["Max_age"])) {
    $_SESSION["Max_age_err"] = "Maximun age is required";
    header("Location: ../index.php#new_book");
    exit();
  } else {
    $Max_age = test_input($_POST["Max_age"]);
    $_SESSION["Max_age_err"] = "";
  }

   if (empty($_POST["Price"])) {
    $_SESSION["Price_err"] = "Price is required";
    header("Location: ../index.php#new_book");
    exit();
  } else {
    $Price = test_input($_POST["Price"]);
    $_SESSION["Price_err"] = "";
  }

  $Link = test_input($_POST["Link"]);

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

