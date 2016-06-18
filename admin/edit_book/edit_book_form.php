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

$book= $book_query->fetchAll(PDO::FETCH_ASSOC);
$book=$book[0] ;
if(!$book){
    print("error");
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
</head>
<body>
<!-- Sidebar -->
<section id="sidebar">
    <div class="inner" style="text-align: center">
        <br> <br>
        <?php echo '<img style="margin-bottom: 2%;" src="data:image/jpeg;base64,'.base64_encode( $book['Cover'] ).'"/>';?>
        <a href="#" class="button special small">Αλλαγή Εξωφύλλου </a>
        <br>
        <?php echo '<img style="margin-bottom: 2%;" src="data:image/jpeg;base64,'.base64_encode( $book['Back_cover'] ).'"/>';?>

        <a href="#" class="button special small">Αλλαγή Πισθοφύλλου</a>
    </div>
</section>

<!-- Wrapper -->
<div id="wrapper">
    <section id="show_book" class="show_book" style="text-align: center">
        <h2><?php echo $book['Title'];?></h2>
        <?php while($element = current($book)) {
            $key=key($book)."\n";
            echo $key."\n";
            next($book);
        } ?>
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