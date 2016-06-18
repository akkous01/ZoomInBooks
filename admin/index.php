<?php
/**
 * Created by PhpStorm.
 * User: HpPC
 * Date: 15-Jun-16
 * Time: 8:41 PM
 */

if (session_status() == PHP_SESSION_NONE) {
      session_start();

      // if (!isset($_SESSION["error_found"])){
      // $_SESSION["Title_err"] = $_SESSION["ISBN_err"] = $_SESSION["Writer_err"] = $_SESSION["Publisher_err"] = $_SESSION["Pages_err"] = $_SESSION["Persentage_of_images_err"] = $_SESSION["Min_age_err"] = $_SESSION["Max_age_err"] = $_SESSION["Price_err"] = $_SESSION["Cover_err"] = $_SESSION["Back_cover_err"] = "";
      // }

  }

  if (!isset($_SESSION["new_book_insert_succ"])){
    $_SESSION["new_book_insert_succ"]= 0;
  }

  
    include "../Database/MySqlConnect.php";

    include "list_book/load_books_dataTable.php";
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
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="assets/js/dataTables.js"></script>

 <!--    <script> 
            $(function(){
              $("#new_book").load("book_form.php"); 
            });
    </script>  -->
</head>
<body>

<?php 
    if ($_SESSION["new_book_insert_succ"]== 1){
        echo "<script>alert('Το βιβλίο καταχωρήθηκε επιτυχώς!');</script>";
        $_SESSION["new_book_insert_succ"]= 0;
    }
?>
<!-- Sidebar -->
<section id="sidebar">
    <div class="inner">
        <nav>
            <ul>
                <li><a href="#list_of_books">Λίστα Βιβλίων</a></li>
                <li><a href="#new_book">Προσθήκη Νέου Βιβλίου</a></li>
                <li><a href="#two">Λίστα Λέξεων Κλειδιών που δεν βρέθηκαν</a></li>
                <li><a href="#new_category">Προσθήκη Κατηγορίας</a></li>
                <li><a href="#new_subcategory">Προσθήκη Υποατηγορίας</a></li>
                <li><a href="#new_keyword">Προσθήκη Λέξης Κλειδί</a></li>

            </ul>
        </nav>
    </div>
</section>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Λίστα Βιλίων -->
    <!--<section id="intro" class="wrapper style1 fullscreen fade-up">-->
    <!--<div class="inner">-->
    <!--<h1>Hyperspace</h1>-->
    <!--<p>Just another fine responsive site template designed by <a href="http://html5up.net">HTML5 UP</a><br />-->
    <!--and released for free under the <a href="http://html5up.net/license">Creative Commons</a>.</p>-->
    <!--<ul class="actions">-->
    <!--<li><a href="#one" class="button scrolly">Learn more</a></li>-->
    <!--</ul>-->
    <!--</div>-->
    <!--</section>-->
    <section id="list_of_books" class="list_of_books">
        <header>
            <h3>Αποθηκευμένα Βιβλία</h3>
        </header>
        <div class="table-wrapper">
            <table class="paginated">
                <thead>
                <tr>
                    <th>BookId</th>
                    <th>Title</th>
                    <th>ISBN</th>
                    <th>Writer</th>
                    <th>Illustrator</th>
                    <th>Publisher</th>
                    <th>Pages</th>
                </tr>
                </thead>
                <tbody>
                <?php for($i=0;$i<count($load_books_to_list);$i++){ ?>
                    <tr>
                        <td><?php echo $load_books_to_list[$i]['Book_id'];?></td>
                        <td><?php echo $load_books_to_list[$i]['ISBN'];?></td>
                        <td><?php echo $load_books_to_list[$i]['Title'];?></td>
                        <td><?php echo $load_books_to_list[$i]['Writer'];?></td>
                        <td><?php echo $load_books_to_list[$i]['Illustrator'];?></td>
                        <td><?php echo $load_books_to_list[$i]['Publisher'];?></td>
                        <td><?php echo $load_books_to_list[$i]['Pages'];?></td>
                    </tr>
                <?php } ?>
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </section>

    <!-- One -->
    <section id="new_book" class="wrapper style2 spotlights">
        <h3>Νέο Βιβλίο</h3>
        <section class="new_book_body">
            <form method="post" action="new_book/submit_new_book.php" enctype="multipart/form-data">
                <div class="row uniform">

                    <div class="8u$ 12u$(xsmall)">
                        <h4>Τίτλος Βιβλίου * </h4> <input type="text" name="Title" id="Title" value="" placeholder="Τίτλος Βιβλίου" required/>
                    </div>

                    <div class="18u$ 12u$(xsmall)">
                        <h4>Συγγραφέας * </h4><input type="text" name="Writer" id="Writer" value="" placeholder="Συγγραφέας" required/>
                    </div>

                    <div class="18u$ 12u$(xsmall)">
                        <h4>Εικονογράφος</h4><input type="text" name="Illustrator" id="Illustrator" value="" placeholder="Εικονογράφος" />
                    </div>

                    <div class="18u$ 12u$(xsmall)">
                        <h4>Εκδόσεις * </h4><input type="text" name="Publisher" id="Publisher" value="" placeholder="Εκδόσεις" required/>
                    </div>

                    <div class="18u$ 12u$(xsmall)">
                        <h4>ISBN * </h4><input type="text" name="ISBN" id="ISBN" value="" placeholder="ISBN" required/>
                    </div>

                    <div class="18u$ 12u$(xsmall)">
                        <h4>Σελίδες * </h4><input type="number" name="Pages" id="Pages" value="" required/>
                    </div>

                    <div class="18u$ 12u$(xsmall)">
                        <h4>Ποσοστό Εικόνων * </h4><input type="double" name="Persentage_of_images" id="Persentage_of_images" value="" required/>
                    </div>

                    <div class="18u$ 8u$(xsmall)">
                        <h4>Ελάχιστη Ηλικία * </h4><input type="number" name="Min_age" id="Min_age" value="" required/>
                    </div>

                    <div class="18u$ 12u$(xsmall)">
                        <h4>Μέγιστη Ηλικία * </h4><input type="number" name="Max_age" id="Max_age" value="" required/>
                    </div>

                    <div class="18u$ 12u$(xsmall)">
                        <h4>Μέση Τιμή Πώλησης * </h4><input type="number" name="Price" id="Price" value=""  required/>
                    </div>

                    <div class="6u$ 12u$(xsmall)">
                        <h4>Σύνδεσμος</h4><input type="text" name="Link" id="Link" value=""/>
                    </div>

                    <div class="18u$ 12u$(xsmall)">
                        <h4>Εξώφυλλο * </h4><input type="file" name="Cover" id="Cover" required/>
                    </div>

                    <div class="18u$ 12u$(xsmall)">
                        <h4>Οπισθόφυλλο * </h4><input type="file" name="Back_cover" id="Cover" required/>
                    </div>

                    <div class="12u$"><hr><h3>Κατηγορίες</h3><hr></div>
                    <?php include_once "load/load_keywords.php"; ?>

                    <div class="12u$">
                        <ul class="actions">
                            <li><input type="submit" value="Save Book" class="special" /></li>
                            <li><input type="reset" value="Reset" /></li>
                        </ul>
                    </div>


                </div>
        </form>
        </section>
    </section>

    <!-- Two -->
    <section id="two" class="wrapper style3 fade-up">
        <div class="inner">
            <h2>What we do</h2>
            <p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus, lacus eget hendrerit bibendum, urna est aliquam sem, sit amet imperdiet est velit quis lorem.</p>
            <div class="features">
                <section>
                    <span class="icon major fa-code"></span>
                    <h3>Lorem ipsum amet</h3>
                    <p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
                </section>
                <section>
                    <span class="icon major fa-lock"></span>
                    <h3>Aliquam sed nullam</h3>
                    <p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
                </section>
                <section>
                    <span class="icon major fa-cog"></span>
                    <h3>Sed erat ullam corper</h3>
                    <p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
                </section>
                <section>
                    <span class="icon major fa-desktop"></span>
                    <h3>Veroeros quis lorem</h3>
                    <p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
                </section>
                <section>
                    <span class="icon major fa-chain"></span>
                    <h3>Urna quis bibendum</h3>
                    <p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
                </section>
                <section>
                    <span class="icon major fa-diamond"></span>
                    <h3>Aliquam urna dapibus</h3>
                    <p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
                </section>
            </div>
            <ul class="actions">
                <li><a href="#" class="button">Learn more</a></li>
            </ul>
        </div>
    </section>

    <!-- Three -->
    <section id="new_category" class="wrapper style1 fade-up">
        <div class="inner">
            <h2>Προσθήκη Νέας Κατηγορίας</h2>
            <div class="split style1">
                <section>
                    <form method="post" action="add_elements/new_category.php">
                        <div class="row uniform">
                            <div class="8u$ 12u$(xsmall)">
                                 <input type="text" name="New_category" id="New_category" value="" placeholder="Όνομα Νέας Κατηγορίας" required/>
                            </div>
                            <div class="12u$">
                                <ul class="actions">
                                    <li><a href="" class="button small submit">Sabmit Category</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
                <section>
                   <h3>Κατηγορίες</h3>
                </section>
            </div>
        </div>
    </section>


    
    <section id="new_subcategory" class="wrapper style3 fade-up">
        <div class="inner">
            <h2>Προσθήκη Νέας Υποκατηγορίας</h2>
                <section>
                    <form method="post" action="add_elements/new_subcategory.php">
                        <div class="row uniform">
                            <div class="12u$">
                                <div class="select-wrapper">
                                    <select name="select_category" id="select_category" required>
                                        <?php include "load/load_categories.php";?>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="8u$ 12u$(xsmall)">
                                 <input type="text" name="New_subcategory" id="New_subcategory" value="" placeholder="Όνομα Νέας Υποκατηγορίας" required/>
                            </div>
                             <div class="12u$">
                                <ul class="actions">
                                    <li><a href="" class="button small submit">Sabmit Subcategory</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
        </div>
    </section>



    <section id="new_keyword" class="wrapper style1 spotlights">
        <div class="inner">
            <h2>Προσθήκη Νέας Λέξης Κλειδί</h2>
                <section>
                    <form method="post" action="add_elements/new_subcategory.php">
                        <div class="row uniform">
                            <div class="12u$">
                                <div class="select-wrapper">
                                    <select name="select_category" id="select_category">
                                        <option value="">- Category -</option>
                                        <?php include "load/load_categories.php";?>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="8u$ 12u$(xsmall)">
                                 <input type="text" name="New_subcategory" id="New_subcategory" value="" placeholder="Όνομα Νέας Υποκατηγορίας" required/>
                            </div>
                             <div class="12u$">
                                <ul class="actions">
                                    <li><a href="" class="button small submit">Sabmit Subcategory</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
        </div>
    </section>

</div>

<!-- Footer -->
<footer id="footer" class="wrapper style1-alt">
    <div class="inner">
        <ul class="menu">
            <li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        </ul>
    </div>
</footer>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>

</body>
</html>
