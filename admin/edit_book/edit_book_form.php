<?php
/**
 * Created by PhpStorm.
 * User: HpPC
 * Date: 16-Jun-16
 * Time: 2:37 PM
 */
session_start();
include "../../Database/MySqlConnect.php";

$book_query = $conn->prepare("SELECT * FROM `books` WHERE book_id=".$_SESSION['book_id'].";");
$book_query->execute();

$book_keywards_query = $conn->prepare("SELECT * FROM `books_keywords` WHERE Book_id=".$_SESSION['book_id'].";");
$book_keywards_query->execute();

$book= $book_query->fetchAll(PDO::FETCH_ASSOC);
$book_keywards= $book_keywards_query->fetchAll(PDO::FETCH_ASSOC);
$book=$book[0] ;
if(!$book){
    print("error");
}

$For_parents_check = $Hard_copy_check = $E_book_check = $Audio_book_check = $Show_to_user_check ='false';

if($book['For_parents'] == 1){
    $For_parents_check = 'true';
}

if($book['Hard_copy'] == 1){
    $Hard_copy_check = 'true';
}

if($book['E_book'] == 1){
    $E_book_check = 'true';
}

if($book['Audio_book'] == 1){
    $Audio_book_check = 'true';
}

if($book['Show_to_user'] == 1){
    $Show_to_user_check = 'true';
}


?>

<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Hyperspace by HTML5 UP</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="../assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="../assets/css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="../assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="../assets/css/ie8.css" /><![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="../assets/js/dataTables.js"></script>
    <script>
        $(document).ready(function(){
            $("#change_cover").click(function(){
                $('#change_cover').css("display","none");
                $('#img_cover').css("display","none");
                $('#upload_cover').css("display","block");
            });
            $("#change_back_cover").click(function(){
                $('#change_back_cover').css("display","none");
                $('#img_back_cover').css("display","none");
                $('#upload_back_cover').css("display","block");
            });
        });
    </script>
</head>
<body>
<!-- Sidebar -->
<section id="sidebar">
    <div class="inner" style="text-align: center">
        <br> <br>
        <?php echo '<img id="img_cover" style="margin-bottom: 2%;" src="../../Database/Covers/'. $book['Cover'].'"/>';?>
        <a href="#" class="button special small" id="change_cover">Αλλαγή Εξωφύλλου </a>
        <div class="18u$ 12u$(xsmall)" id="upload_cover" style="display:none">
            <h4>Εξώφυλλο * </h4><input type="file" name="Cover" id="Cover" required/>
        </div>
        <br>
        <?php echo '<img id="img_back_cover" style="margin-bottom: 2%;" src="../../Database/Back_Covers/'. $book['Back_cover'].'"/>';?>
        <a href="#" class="button special small" id="change_back_cover">Αλλαγή Πισθοφύλλου</a>
        <div class="18u$ 12u$(xsmall)" id="upload_back_cover" style="display:none">
            <h4>Οπισθόφυλλο * </h4><input type="file" name="Back_cover" id="Cover" required/>
        </div>
    </div>
</section>

<!-- Wrapper -->
<div id="wrapper">
    <section id="show_book" class="show_book" >
        <h2><?php echo $book['Title'];?></h2>
        <form method="post" action="submit_edit_book.php" enctype="multipart/form-data" >
            <div class="row uniform">

                <div class="8u$ 12u$(xsmall)">
                    <h4>ID Βιβλίου</h4> <input type="text" name="id" id="id" value="<?php echo $book['Book_id'];?>" readonly/>
                </div>

                <div class="8u$ 12u$(xsmall)">
                    <h4>Τίτλος Βιβλίου * </h4> <input type="text" name="Title" id="Title" value="<?php echo $book['Title'];?>" placeholder="Τίτλος Βιβλίου" required/>
                </div>

                <div class="18u$ 12u$(xsmall)">
                    <h4>Συγγραφέας * </h4><input type="text" name="Writer" id="Writer" value="<?php echo $book['Writer'];?>" placeholder="Συγγραφέας" required/>
                </div>

                <div class="18u$ 12u$(xsmall)">
                    <h4>Εικονογράφος</h4><input type="text" name="Illustrator" id="Illustrator" value="<?php echo $book['Illustrator'];?>" placeholder="Εικονογράφος" />
                </div>

                <div class="18u$ 12u$(xsmall)">
                    <h4>Εκδόσεις * </h4><input type="text" name="Publisher" id="Publisher" value="<?php echo $book['Publisher'];?>" placeholder="Εκδόσεις" required/>
                </div>

                <div class="18u$ 12u$(xsmall)">
                    <h4>ISBN * </h4><input type="text" name="ISBN" id="ISBN" value="<?php echo $book['ISBN'];?>" placeholder="ISBN" required/>
                </div>

                <div class="18u$ 12u$(xsmall)">
                    <h4>Σελίδες * </h4><input type="number" name="Pages" id="Pages" value="<?php echo $book['Pages'];?>" required/>
                </div>

                <div class="18u$ 12u$(xsmall)">
                    <h4>Ποσοστό Εικόνων * </h4><input type="double" name="Persentage_of_images" id="Persentage_of_images" value="<?php echo $book['Persentage_of_images'];?>" required/>
                </div>

                <div class="24u$ 12u$(xsmall)">
                    <h4>Ελάχιστη Ηλικία για παιδία που δεν διεβάζουν * </h4><input type="number" name="Min_age_no_read" id="Min_age_no_read" value="<?php echo $book['Min_age_no_read'];?>" required/>
                </div>

                <div class="18u$ 12u$(xsmall)">
                    <h4>Ελάχιστη Ηλικία για παιδία που διεβάζουν *</h4><input type="number" name="Min_age_read" id="Min_age_read" value="<?php echo $book['Min_age_read'];?>" required/>
                </div>

                <div class="6u$ 12u$(xsmall)">
                        <input type='checkbox' id="For_parents" name="For_parents"'>
                        <label for="For_parents">Κατάλληλο για γονείς</label>
                </div>

                <div class="18u$ 12u$(xsmall)">
                    <h4>Μέση Τιμή Πώλησης * </h4><input type="number" name="Price" id="Price" value="<?php echo $book['Price'];?>"  required/>
                </div>

                 <div class="12u$ 12u$(xsmall)">
                        <h4>Μορφή* </h4>
                        <input type='checkbox' id="Hard_copy" name="Hard_copy"'>
                        <label for="Hard_copy">Έντυπη Μορφή</label>
                        <input type='checkbox' id="E_book" name="E_book"'>
                        <label for="E_book">E-book</label>
                        <input type='checkbox' id="Audio_book" name="Audio_book"'>
                        <label for="Audio_book">Audio-book</label>
                </div>

                <div class="6u$ 12u$(xsmall)">
                    <h4>Σύνδεσμος</h4><input type="text" name="Link" id="Link" value="<?php echo $book['Link'];?>"/>
                </div>

                <div class="12u$ 12u$(xsmall)">
                    <h4>Δραστηριότητες και Θέματα προς συζήτηση</h4>
                    <textarea name="Curriculum" id="Curriculum" rows="4" value=""><?php echo $book['Curriculum'];?></textarea>
                </div>


                <div class="12u$"><hr><h3>Κατηγορίες</h3><hr></div>
                <?php include_once "../load/load_keywords.php";
                for($i=0;$i<count($book_keywards);$i++){
                    echo "<script>$('#K".$book_keywards[$i]['Keyword_id']."').prop('checked', true);</script>";
                }
                ?>

                <div class="12u$ 12u$(xsmall)">
                    <input type='checkbox' id="Show_to_user" name="Show_to_user"'>
                    <label for="Show_to_user"><h3>Το βιβλίο να εμφανίζεται στους χρήστες</h3></label>
                </div>


                <script type="text/javascript">
                    $("#For_parents").prop('checked',<?php echo $For_parents_check?>);
                    $("#Hard_copy").prop('checked',<?php echo $Hard_copy_check?>);
                    $("#E_book").prop('checked',<?php echo $E_book_check?>);
                    $("#Audio_book").prop('checked',<?php echo $Audio_book_check?>);
                    $("#Show_to_user").prop('checked',<?php echo $Show_to_user_check?>);

                </script>

                <div class="12u$">
                    <ul class="actions">
                        <li><input type="submit" value="Save Book" class="special" /></li>
                        <li><input type="reset" value="Reset" /></li>
                    </ul>
                </div>
            </div>
        </form>

    </section>

</div>


<!-- Scripts -->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/jquery.scrollex.min.js"></script>
<script src="../assets/js/jquery.scrolly.min.js"></script>
<script src="../assets/js/skel.min.js"></script>
<script src="../assets/js/util.js"></script>
<!--[if lte IE 8]><script src="../assets/js/ie/respond.min.js"></script><![endif]-->
<script src="../assets/js/main.js"></script>

</body>
</html>