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

