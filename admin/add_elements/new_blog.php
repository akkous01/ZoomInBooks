<?php
include "../../Database/MySqlConnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["blog_content"])) {
    	header("Location: ../index.php");
    	exit();
  	} else {
    	$blog_content = test_input($_POST["blog_content"]);
  }

  if (empty($_POST["blog_title"])) {
    header("Location: ../index.php");
    exit();
  } else {
    $blog_title = test_input($_POST["blog_title"]);
  }
	try{ 
		$blog_content_query = $conn->prepare("INSERT INTO blog (blog_title, blog_content, blog_date) VALUES ('{$blog_title}','{$blog_content}', now())");
		$blog_content_query->execute();
		header("Location: ../index.php");
	}catch(PDOException $e){
    	handle_sql_errors($selectQuery, $e->getMessage());
	}
}

function test_input($data) {
	$data = trim($data);
  	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
  	return $data;
}

function handle_sql_errors($query, $error_message){
    echo '<pre>';
    echo $query;
    echo '</pre>';
    echo $error_message;
    die;
}

?>
