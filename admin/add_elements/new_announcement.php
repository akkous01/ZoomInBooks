<?php
include "../../Database/MySqlConnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["announcement_content"])) {
    	header("Location: ../index.php");
    	exit();
  	} else {
    	$announcement_content = test_input($_POST["announcement_content"]);
  	}

	try{ 
		$announcement_content_query = $conn->prepare("INSERT INTO announcements (announcement_content, announcement_date) VALUES ('{$announcement_content}', now())");
		$announcement_content_query->execute();
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
