<?php
include "../../Database/MySqlConnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["New_subcategory"])) {
    header("Location: ../index.php");
    exit();
  } else {
   	$New_subcategory = test_input($_POST["New_subcategory"]);
  }

  if (empty($_POST["select_category"])){
    header("Location: ../index.php");
    exit();
  }else{
    $Category_id = $_POST["select_category"];
  }

	// NEW CATEGORY ENTRY
	try{ 
		$New_subcategory_query = $conn->prepare("INSERT INTO subcategories (Name_of_subcategory, Category_id) VALUES ('{$New_subcategory}', '{$Category_id}')");
		$New_subcategory_query->execute();
		
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