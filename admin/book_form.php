<?php
// define variables and set to empty values
$Title_err = $ISBN_err = $Writer_err = $Illustrator_err = "";
$Title = $ISBN = $Writer = $Illustrator = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["Title"])) {
    $Title_err = "Title is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<h3>Νέο Βιβλίο</h3>

<form method="post" action="#">
	<div class="row uniform">

		<h4>Τίτλος Βιβλίου</h4>
		<div class="10u$ 12u$(xsmall)">
			<input type="text" name="Title" id="Title" value="" placeholder="Τίτλος Βιβλίου" />
		</div>
		
		<h4>ISBN</h4>
		<div class="6u$ 12u$(xsmall)">
			<input type="text" name="ISBN" id="ISBN" value="" placeholder="ISBN" />
		</div>

		<h4>Συγγραφέας</h4>
		<div class="6u$ 12u$(xsmall)">
			<input type="text" name="Writer" id="Writer" value="" placeholder="Συγγραφέας" />
		</div>

		<h4>Εικονογράφος</h4>
		<div class="6u$ 12u$(xsmall)">
			<input type="text" name="Illustrator" id="Illustrator" value="" placeholder="Εικονογράφος" />
		</div>

		
		<div class="6u$ 12u$(xsmall)">
			<input type="text" name="Publisher" id="Publisher" value="" placeholder="Εκδόσεις" />
		</div>
		
		<div class="6u$ 12u$(xsmall)">
			<input type="number" name="Pages" id="Pages" value="" placeholder="Σελίδες" />
		</div>

		<div class="6u$ 12u$(xsmall)">
			<input type="double" name="Persentage_of_images" id="Persentage_of_images" value="" placeholder="Ποσοστό Εικόνων" />
		</div>
		
	</div>
</form>
