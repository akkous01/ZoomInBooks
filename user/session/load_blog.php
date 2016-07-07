<?php
	include "../Database/MySqlConnect.php";

	// Teleftea 5 biblia
	$blog_query = $conn->prepare("SELECT * FROM blog ORDER BY blog_date ");

	$blog_query->execute();

	$blog_data = $blog_query->fetchAll(PDO::FETCH_ASSOC);

	$blog_script = "";
	for($i=0 ; $i<count($blog_data); $i++){
		$blog_script = $blog_script ."<h4>".$blog_data[$i]['blog_title']."</h4><p>".$blog_data[$i]['blog_content']."</p><p>".$blog_data[$i]['blog_date']."<hr>";
	}


?>