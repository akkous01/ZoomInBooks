<?php 
include_once "session/load_data_from_database.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media       <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <![endif]-->
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      <link rel="stylesheet" href="css/autocomplete-input.css">
      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


  </head>
  <body>




  <header>
    <ul class="my_nav">
        <li><a href="index.php"><img src="images/navbar/1_HomePage.png"></a></li>
        <li><a href="phylosophy.php"><img src="images/navbar/2_OurPhilosophy.png"></a></li>
        <li><a href="blog.php"><img src="images/navbar/3_Blog.png"></a></li>
        <li><a href="contact.php"><img src="images/navbar/4_Communicate.png"></a></li>
        <li><a href="under_construction.php"><img src="images/navbar/5_LogIn.png"></a></li>
        <li><a href="under_construction.php"><img src="images/navbar/6_CreateAccount.png"></a></li>
        <li><a href="under_construction.php"><img src="images/navbar/7_Gallery.png"></a></li>
        <li><a href="under_construction.php"><img src="images/navbar/8_ZoomIn.png"></a></li>
    </ul>

 </header>


<div id="main">

  <div id="main-top" >
    <div id="search_bar_book">
        <form id="search" autocomplete="on" method="post" action="search.php">
            <div id="search_box_dropdown"  style="display: none">
                <div class="search_box_dropdown_elements" style="display: none">
                    <div id="search_header">
                        <div id="close_button">
                            <a href="#" ><img  src="images/close_button.ico"></a>
                        </div>
                    </div>
                    <div id="search_elements">
                        <div class="form-group">
                            <label for="title">ΤΙΤΛΟΣ ΒΙΒΛΙΟΥ:</label>
                            <input type="text" class="form-control input-sm" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="theme">ΘΕΜΑ:</label>
                            <select class="form-control input-sm" id="theme" name="theme">
                                <option value="1" >Ηθικά/ Πνευματικά μηνυματα</option>
                                <option value="2" >Ανάλυση-κατανόηση και παραγωγή γραπτού λόγου / Σκέφτομαι και Γράφω </option>
                                <option value="3" >Γραμματική – Σύνταξη – Λεξιλόγιο</option>
                                <option value="4" >Σύνδεση με διάφορα άλλα θέματα</option>
                                <option value="5" >Επιπλέον χαρακτηριστικά</option>
                                <option value="6" selected >Όλες οι Κατηγορίες</option>


                            </select>
                        </div>
                        <div class="form-group">
                            <label for="writer">ΣΥΓΓΡΑΦΕΑΣ:</label>
                            <input type="text" class="form-control input-sm" id="writer" name="writer">
                        </div>
                        <div class="form-group">
                            <label for="age">ΗΛΙΚΙΑ:</label>
                            <input type="number" class="form-control input-sm" id="age" name="age">
                        </div>
                        <div class="form-group">
                            <label for="percentage_of_images">ΠΟΣΟΣΤΟ ΕΙΚΟΝΑΣ/ΓΡΑΠΤΟΥ:</label>
                            <input type="number" class="form-control input-sm" id="percentage_of_images" name="percentage_of_images" placeholder="--%">
                        </div>
                        <div class="form-group" id="all_keywards">
                            <label >ΛΕΞΕΙΣ ΚΛΕΙΔΙΑ:</label>
                            <input type="hidden" name="count" value="1" />
                            <div id="field" style="text-align: center">
                                <input   class=" form-control input-sm keywords" id="field1"  name="keyword1" type="text"/>
                                <button  id="b1" class="btn btn-xs add-more" type="button">+</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price">ΤΙΜΗ:</label>
                            <input type="text" id="amount" name="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                            <div id="slider-range"></div>
                        </div>

                    </div>
                    <div id="search_footer">
                        <button id="search_submit" type="submit" class="btn btn-info btn-sm">Search</button>
                    </div>

                </div>

            </div>

            <div id="search_bar"></div>
        </form>


      <div id="book">
        <div class="bookmarks_left">
          <div class="bookmark_left">
            <img id="ithika" src="images/bookmark-1.png" class="bookmark_tag">
            <img id="ithika_new" src="images/bookmark-1-new.png" class="bookmark_tag_new" style="display: none">
          </div>
          <div class="bookmark_left">
            <img id="sindesi" src="images/bookmark-2.png" class="bookmark_tag">
            <img id="sindesi_new" src="images/bookmark-2-new.png" class="bookmark_tag_new" style="display: none">
          </div>
          <div class="bookmark_left">
            <img id="epipleon" src="images/bookmark-3.png" class="bookmark_tag">
            <img id="epipleon_new" src="images/bookmark-3-new.png" class="bookmark_tag_new" style="display: none">
          </div>
        </div>

		<div class="book_img">
          <div id="subcategories_area">
            <table id = "first_table" class="subcategories_table">
              <tr>
                <td><h4>Δες τους σελιδοδείκτες για...</h4></td>
                <td></td>
              </tr>
            </table>
            <?php echo $ithika_table; echo $sindesi_table; echo $epipleon_table; echo $analisi_table; echo $gramatiki_table;?>
          </div>
        </div>     

        <div class="bookmarks_right">
          <div class="bookmark_right">
          <img id="analisi" src="images/bookmark-4.png" class="bookmark_tag">
          <img id="analisi_new" src="images/bookmark-4-new.png" class="bookmark_tag_new" style="display: none">
          </div>
          <div class="bookmark_right_2">
            <img id="gramatiki" src="images/bookmark-5.png" class="bookmark_tag">
            <img id="gramatiki_new" src="images/bookmark-5-new.png" class="bookmark_tag_new" style="display: none">
          </div>
        </div>

      </div>  
    </div>
  </div>

  <div id="main-bottom" >
    
    <div id="new_inserts">
      <div id="new_books_show">
      		<?php echo $new_books_script; ?>
      </div>
    </div>

    <div id="middle">
        <div id="facebook_div"><img id="facebook_icon" src="images/facebook-02.png" ></div>
        <div id="instagram_div"><img id="instagram_icon" src="images/instagram-02.png" ></div>
    </div>

    <div id="anakinosis">
      <div id="anakinosis_show">
      	<?php echo $anakinosis_script; ?>
      </div>
    </div>
  </div>
</div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
      <script src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/front-end.js"></script>
      <script type="text/javascript" src="js/index.js"></script>
     
      <script>
          $( document ).ready(function() {
              

              $('#title').typeahead({
                  local: <?php echo $titles;?>
              });
              $('#writer').typeahead({
                  local: <?php echo $writers;?>
              });
              // $('.keywords').typeahead({
              //     local: <?php echo $keywords;?>
              // });

              $(function() {
                  var keywords_tags = <?php echo $keywords;?>;
                  $(".keywords").autocomplete({
                    source:keywords_tags
                  });
              });

              $('.tt-query').css('background-color','#fff');

          });
    </script>
  </body>
</html>