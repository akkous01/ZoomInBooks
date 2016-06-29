<?php 
	//Database initialization
//	include "../Database/MySqlConnect.php";

	// CATEGORIES
	$categories_query = $conn->prepare("SELECT * FROM categories ORDER BY Category_id");
	$categories_query->execute();

	$categories= $categories_query->fetchAll(PDO::FETCH_ASSOC);
	$categories_check_box = "";
	
	for($i = 0; $i <count($categories); $i++){
		$category_id = (integer) $categories[$i]['Category_id'];
		$category_name = (string)$categories[$i]['Name_of_category'];

		$categories_check_box .= "\r\n<div class='12u$'><h4>$category_name</h4>
			<span class='collapse_sub_categories'  id='cat$i'>
						<img  id='show_cat$i' src='images/show.png'>
						<img  id='hide_cat$i' src='images/hide.png' style='display:none'>
			</span>
		</div>";
		$categories_check_box .= "\r\n<div style='display:none;width:100%;' id='collapse_cat$i'>";
		// SUBCATEGORIES
		$subcategories_query = $conn->prepare("SELECT * FROM subcategories WHERE Category_id = {$category_id}");
		$subcategories_query->execute();

		$subcategories= $subcategories_query->fetchAll(PDO::FETCH_ASSOC);
		// $categories_check_box .= "<br><br><hr>";
		for($j = 0; $j < count($subcategories) ; $j++){
			$subcategory_id = (integer) $subcategories[$j]['Subcategory_id'];
			$subcategory_name = (string)$subcategories[$j]['Name_of_subcategory']."  ";
			$categories_check_box .= "\r\n<div style='width: 50%;'>
				<h5 style='color:grey;'width:50%'>$subcategory_name</h5>
				<span class='collapse_sub_categories' style='width:50%' id='sub$j'>
						<img  id='show_sub$j' src='images/show.png'>
						<img style='display:none'id='hide_sub$j' src='images/hide.png' >
				</span>
			";

			// KEYWORDS
			$keywords_query = $conn->prepare("SELECT * FROM keywords WHERE Subcategory_id = {$subcategory_id}");
			$keywords_query->execute();

			$keywords= $keywords_query->fetchAll(PDO::FETCH_ASSOC);
			$categories_check_box .= "\r\n<section id='collapse_sub$j' style='display:none'>";
			for($k = 0; $k < count($keywords) ; $k++){
				$keyword_id = (integer) $keywords[$k]['Keyword_id'];
				$keyword_name = (string)$keywords[$k]['Name_of_keyword'];
				$categories_check_box .= "\r\n<div class='size_of_keyword'><input type='checkbox' id='K{$keyword_id}' name='K{$keyword_id}'><label for='K{$keyword_id}'>{$keyword_name}</label></div>";
			}
			$categories_check_box .= "\r\n</section></div>";

		}
		$categories_check_box .="</div>";
	}

	echo $categories_check_box;
                    
?>

 <!-- "\r\n<div class='6u$ 12u$(small)'><input type='checkbox' id='C{$category_id}' name='C{$category_id}'><label for='C{$category_id}'>{$category_name}</label></div>";" -->