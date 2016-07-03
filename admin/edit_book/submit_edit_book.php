<?php


include "../../Database/MySqlConnect.php";
  
 $book_id =$Title = $ISBN = $Writer = $Publisher = $Pages = $Persentage_of_images =  $Min_age_no_read = $Min_age_read = $For_parents = $Price = $Hard_copy = $E_book = $Audio_book = $Link = $Curriculum = $Cover = $Back_cover = $Show_to_user ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 	$book_id = $_POST["id"];

  if (empty($_POST["Title"])) {
    echo "error in title";
    // header("Location: ../index.php#new_book");
    // exit();
  } else {
    $Title = test_input($_POST["Title"]);
    
  }

  if (empty($_POST["ISBN"])) {
    echo "error in isbn";
    // header("Location: ../index.php#new_book");
    // exit();
  } else {
    $ISBN = test_input($_POST["ISBN"]);
  }
  
  if (empty($_POST["Writer"])) {
    echo "error in witer";
    // header("Location: ../index.php#new_book");
    // exit();
  } else {
    $Writer = test_input($_POST["Writer"]);
  }


  $Illustrator = test_input($_POST["Illustrator"]);
  
  if (empty($_POST["Publisher"])) {
     echo "error in publicher";
    // header("Location: ../index.php#new_book");
    // exit();
  } else {
    $Publisher = test_input($_POST["Publisher"]);
  }

  if (empty($_POST["Pages"])) {
     echo "error in pages";
    // header("Location: ../index.php#new_book");
    // exit();
  } else {
    $Pages = test_input($_POST["Pages"]);
  }

  if (empty($_POST["Persentage_of_images"])) {
     echo "error in Persentage_of_images";
    // header("Location: ../index.php#new_book");
    // exit();
  } else {
    $Persentage_of_images = test_input($_POST["Persentage_of_images"]);
  }

  if (empty($_POST["Min_age_no_read"])) {
     echo "error in age min";
    // header("Location: ../index.php#new_book");
    // exit();
  } else {
    $Min_age_no_read = test_input($_POST["Min_age_no_read"]);
  }
  
   if (empty($_POST["Min_age_read"])) {
     echo "error in max age";
    // header("Location: ../index.php#new_book");
    // exit();
  } else {
    $Min_age_read = test_input($_POST["Min_age_read"]);
  }

  if(! empty($_POST["For_parents"])){
    $For_parents = "1";
  }

  if (empty($_POST["Price"])) {
     echo "error in price";
    // header("Location: ../index.php#new_book");
    // exit();
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

  $Curriculum = test_input($_POST["Curriculum"]);


  if (empty($_FILES["Cover"]["name"])){
  	$Cover = $_POST["same_cover"];
    
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

    unlink($target_dir.$_POST["same_cover"]);



  }

  if (empty($_FILES["Back_cover"]["name"])){
  	$Back_cover = $_POST["same_back_cover"];
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

    unlink($target_dir.$_POST["same_back_cover"]);
  }

  if(! empty($_POST["Show_to_user"])){
    $Show_to_user = "1";
  }


  try{ 
    $new_book_query = $conn->prepare("UPDATE books SET ISBN='{$ISBN}', Title='{$Title}', Writer='{$Writer}', Illustrator='{$Illustrator}', Publisher = '{$Publisher}', Pages='{$Pages}', Persentage_of_images='{$Persentage_of_images}', Min_age_no_read='{$Min_age_no_read}', Min_age_read = '{$Min_age_read}',For_parents = '{$For_parents}', Cover = '{$Cover}', Back_cover = '{$Back_cover}', Link = '{$Link}', Price = '{$Price}', Hard_copy = '{$Hard_copy}', E_book = '{$E_book}', Audio_book = '{$Audio_book}', Curriculum = '{$Curriculum}', Show_to_user = '{$Show_to_user}' WHERE Book_id = '{$book_id}' ");
    $new_book_query->execute();

    $delete_book_keywords_query = $conn->prepare("DELETE FROM books_keywords WHERE Book_id='{$book_id}'");
    $delete_book_keywords_query -> execute();

   
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
  }catch(PDOException $e){
     echo "ERROR";
  }


}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
