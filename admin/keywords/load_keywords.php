<?php 
	//Database initialization
	include "../Database/MySqlConnect.php";

	// CATEGORIES
	$categories_query = $conn->prepare("SELECT * FROM categories ORDER BY Category_id");
	$categories_query->execute();

	$categories= $categories_query->fetchAll(PDO::FETCH_ASSOC);
	$categories_check_box = "";
	
	for($i = 0; $i <count($categories); $i++){
		$category_id = (integer) $categories[$i]['Category_id'];
		$category_name = (string)$categories[$i]['Name_of_category'];

		$categories_check_box .= "\r\n<div class='12u$'><h4>$category_name</h4></div>";

		// SUBCATEGORIES
		$subcategories_query = $conn->prepare("SELECT * FROM subcategories WHERE Category_id = {$category_id}");
		$subcategories_query->execute();

		$subcategories= $subcategories_query->fetchAll(PDO::FETCH_ASSOC);
		// $categories_check_box .= "<br><br><hr>";
		for($j = 0; $j < count($subcategories) ; $j++){
			$subcategory_id = (integer) $subcategories[$j]['Subcategory_id'];
			$subcategory_name = (string)$subcategories[$j]['Name_of_subcategory'];
			$categories_check_box .= "\r\n<div class='12u$'><h5 style='color:grey'>$subcategory_name</h5></div>";

			// KEYWORDS
			$keywords_query = $conn->prepare("SELECT * FROM keywords WHERE Subcategory_id = {$subcategory_id}");
			$keywords_query->execute();

			$keywords= $keywords_query->fetchAll(PDO::FETCH_ASSOC);


			for($k = 0; $k < count($keywords) ; $k++){
				$keyword_id = (integer) $keywords[$k]['Keyword_id'];
				$keyword_name = (string)$keywords[$k]['Name_of_keyword'];
				$categories_check_box .= "\r\n<div class='size_of_keywords'><input type='checkbox' id='{$keyword_id}' name='{$keyword_id}'><label for='{$keyword_id}'>{$keyword_name}</label></div>";
			}


		}
	}
	echo $categories_check_box;
	// if(isset($_POST["loadbtn"]))
	// {
	//     $id = (integer) $_POST["codes"];

	//     $query = "SELECT Name, Cost, Active FROM taxi_services WHERE SID = '$id' ";
	//     $result = mysql_query($query, $conn);
	//     $details = mysql_fetch_array($result);

	//     $savedName = $details["Name"];
	//     $savedCost = $details["Cost"];
	//     $savedActive = $details["Active"];
	// }

?>

 <!-- "\r\n<div class='6u$ 12u$(small)'><input type='checkbox' id='C{$category_id}' name='C{$category_id}'><label for='C{$category_id}'>{$category_name}</label></div>";" -->