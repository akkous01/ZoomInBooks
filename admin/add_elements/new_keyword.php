<?php
include "../../Database/MySqlConnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["New_keyword"])) {
    header("Location: ../index.php");
    exit();
  } else {
   	$New_keyword = test_input($_POST["New_keyword"]);
  }

  // if (empty($_POST["select_category_2"])){
  //   header("Location: ../index.php");
  //   exit();
  // }else{
  //   $Category_id = $_POST["select_category_2"];
  // }

  if (empty($_POST["select_subcategory"])){
    header("Location: ../index.php");
    exit();
  }else{
    $Sucategory_id = $_POST["select_subcategory"];
  }

	// NEW CATEGORY ENTRY
	try{ 
		$New_keyword_query = $conn->prepare("INSERT INTO keywords (Name_of_keyword, Subcategory_id) VALUES ('{$New_keyword}', '{$Sucategory_id}')");
		$New_keyword_query->execute();
		
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