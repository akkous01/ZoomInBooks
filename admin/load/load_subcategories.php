<?php 
	//Database initialization
	include "../Database/MySqlConnect.php";
	if(isset($_POST['category_id']) && !empty($_POST['category_id'])) {
		$category_id = $_POST['category_id'];
		// SUBCATEGORIES
		$subcategories_query = $conn->prepare("SELECT * FROM subcategories WHERE Category_id = {$category_id}");
		$subcategories_query->execute();

		$subcategories= $subcategories_query->fetchAll(PDO::FETCH_ASSOC);
		// $categories_check_box .= "<br><br><hr>";
		$output = "";
		for($j = 0; $j < count($subcategories) ; $j++){
			$subcategory_id = (integer) $subcategories[$j]['Subcategory_id'];
			$subcategory_name = (string)$subcategories[$j]['Name_of_subcategory'];
			$output .= "<option value='{$subcategory_id}'>{$subcategory_name}</option>";
		}

		echo $output;
	}
?>
	
