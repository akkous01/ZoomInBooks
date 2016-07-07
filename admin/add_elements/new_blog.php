<?php
include "../../Database/MySqlConnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["blog_content"])) {
      $error = "Error in blog content";
      header("Location: ../messages/fail.php?error=".$error);
      exit();
  	} else {
    	$blog_content = test_input($_POST["blog_content"]);
  }

  if (empty($_POST["blog_title"])) {
      $error = "Error in blog title";
      header("Location: ../messages/fail.php?error=".$error);
      exit();
  } else {
    $blog_title = test_input($_POST["blog_title"]);
  }
	try{ 
		$blog_content_query = $conn->prepare("INSERT INTO blog (blog_title, blog_content, blog_date) VALUES ('{$blog_title}','{$blog_content}', now())");
		$blog_content_query->execute();
		
    $succ = "New blog article added!";
    header("Location: ../messages/success2.php?succ=".$succ);
    exit();

	}catch(PDOException $e){
      $error ="Error in databese.".$e->getMessage();
      header("Location: ../messages/fail.php?error=".$error);
      exit();
	}
}

function test_input($data) {
	$data = trim($data);
  	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
  	return $data;
}



?>
