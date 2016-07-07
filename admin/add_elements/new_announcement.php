<?php
include "../../Database/MySqlConnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["announcement_content"])) {
      $error = "Error in announcement content";
    	header("Location: ../messages/fail.php?error=".$error);
    	exit();
  	} else {
    	$announcement_content = test_input($_POST["announcement_content"]);
  	}

	try{ 
		$announcement_content_query = $conn->prepare("INSERT INTO announcements (announcement_content, announcement_date) VALUES ('{$announcement_content}', now())");
		$announcement_content_query->execute();
    $succ = "New announcement added!";
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
 
