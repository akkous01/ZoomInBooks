<?php
/**
 * Created by PhpStorm.
 * User: HpPC
 * Date: 15-Jun-16
 * Time: 8:41 PM
 */
include "../Database/MySqlConnect.php";
include_once "new_book/submit_new_book.php";
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

<!-- Sidebar -->
<section id="sidebar">
    <div class="inner">
        <nav>
            <ul>
                <li><a href="#list_of_books">Λίστα Βιβλίων</a></li>
                <li><a href="#new_book">Προσθήκη Νέου Βιβλίου</a></li>
                <li><a href="#two">Λίστα Λέξεων Κλειδιών που δεν βρέθηκαν</a></li>
                <li><a href="#three">Προσθήκη Κατηγορίας</a></li>
                <li><a href="#four">Προσθήκη Υποατηγορίας</a></li>
                <li><a href="#five">Προσθήκη Λέξης Κλειδί</a></li>

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
        <h2>Νέο Βιβλίο</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>#new_book" enctype="multipart/form-data">
            <div class="row uniform">

               
                <div class="8u$ 12u$(xsmall)">
                    <h4>Τίτλος Βιβλίου * <span class="error"><?php echo $Title_err;?></span></h4> <input type="text" name="Title" id="Title" value="" placeholder="Τίτλος Βιβλίου"/>
                </div>
                
                <div class="18u$ 12u$(xsmall)">
                    <h4>Συγγραφέας * <span class="error"><?php echo $Writer_err;?></span></h4><input type="text" name="Writer" id="Writer" value="" placeholder="Συγγραφέας" />
                </div>

                <div class="18u$ 12u$(xsmall)">
                    <h4>Εικονογράφος</h4><input type="text" name="Illustrator" id="Illustrator" value="" placeholder="Εικονογράφος" />
                </div>

                <div class="18u$ 12u$(xsmall)">
                    <h4>Εκδόσεις * <span class="error"><?php echo $Publisher_err;?></span></h4><input type="text" name="Publisher" id="Publisher" value="" placeholder="Εκδόσεις" />
                </div>

                <div class="18u$ 12u$(xsmall)">
                    <h4>ISBN * <span class="error"><?php echo $ISBN_err;?></span></h4><input type="text" name="ISBN" id="ISBN" value="" placeholder="ISBN" />
                </div>
                
                <div class="18u$ 12u$(xsmall)">
                    <h4>Σελίδες * <span class="error"><?php echo $Pages_err;?></span></h4><input type="number" name="Pages" id="Pages" value="" />
                </div>

                <div class="18u$ 12u$(xsmall)">
                    <h4>Ποσοστό Εικόνων * <span class="error"><?php echo $Persentage_of_images_err;?></span></h4><input type="double" name="Persentage_of_images" id="Persentage_of_images" value=""/>
                </div>

                <div class="16u$ 8u$(xsmall)">
                    <h4>Ελάχιστη Ηλικία * <span class="error"><?php echo $Min_age_err;?></span></h4><input type="number" name="Min_age" id="Min_age" value="" />
                </div>

                <div class="16u$ 12u$(xsmall)">
                    <h4>Μέγιστη Ηλικία * <span class="error"><?php echo $Max_age_err;?></span></h4><input type="number" name="Max_age" id="Max_age" value="" />
                </div>

                <div class="4u$ 12u$(xsmall)">
                    <h4>Μέση Τιμή Πώλησης * <span class="error"><?php echo $Price_err;?></span></h4><input type="number" name="Price" id="Price" value="" />
                </div>

                <div class="6u$ 12u$(xsmall)">
                    <h4>Σύνδεσμος</h4><input type="text" name="Link" id="Link" value="" />
                </div>

                <div class="18u$ 12u$(xsmall)">
                    <h4>Εξώφυλλο * <span class="error"><?php echo $Max_age_err;?></span></h4><input type="file" name="Cover" id="Cover">
                </div>

                <div class="18u$ 12u$(xsmall)">
                    <h4>Οπισθόφυλλο * <span class="error"><?php echo $Max_age_err;?></span></h4><input type="file" name="Back_cover" id="Cover">
                </div>
                
                <div class="12u$"><hr><h4>Κατηγορίες</h4><hr></div>
                <?php include_once "keywords/load_keywords.php"; ?>

                <div class="12u$">
                    <ul class="actions">
                        <li><input type="submit" value="Save Book" class="special" /></li>
                        <li><input type="reset" value="Reset" /></li>
                    </ul>
                </div>
              

            </div>
        </form>
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
    <section id="three" class="wrapper style1 fade-up">
        <div class="inner">
            <h2>Get in touch</h2>
            <p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus, lacus eget hendrerit bibendum, urna est aliquam sem, sit amet imperdiet est velit quis lorem.</p>
            <div class="split style1">
                <section>
                    <form method="post" action="#">
                        <div class="field half first">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" />
                        </div>
                        <div class="field half">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" />
                        </div>
                        <div class="field">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" rows="5"></textarea>
                        </div>
                        <ul class="actions">
                            <li><a href="" class="button submit">Send Message</a></li>
                        </ul>
                    </form>
                </section>
                <section>
                    <ul class="contact">
                        <li>
                            <h3>Address</h3>
											<span>12345 Somewhere Road #654<br />
											Nashville, TN 00000-0000<br />
											USA</span>
                        </li>
                        <li>
                            <h3>Email</h3>
                            <a href="#">user@untitled.tld</a>
                        </li>
                        <li>
                            <h3>Phone</h3>
                            <span>(000) 000-0000</span>
                        </li>
                        <li>
                            <h3>Social</h3>
                            <ul class="icons">
                                <li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
                                <li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
                                <li><a href="#" class="fa-github"><span class="label">GitHub</span></a></li>
                                <li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
                                <li><a href="#" class="fa-linkedin"><span class="label">LinkedIn</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
            </div>
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
