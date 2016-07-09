<?php

include "session/search_list_of_book.php";
include_once "session/load_data_from_database.php";
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="css/main.css">
      <link rel="stylesheet" type="text/css" href="css/search.css">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media       <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <![endif]-->
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      <link rel="stylesheet" href="css/autocomplete-input.css">
      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

      <![endif]-->
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

  <div id="main_search">
      <div id="search_box">
          <form  id="search_form" method="post" action="search.php">
            <div id="up_box">

                <div class="form-group ">
                    <label for="title">ΤΙΤΛΟΣ ΒΙΒΛΙΟΥ:</label>
                    <input type="text" class="form-control input-sm" id="title" name="title" value="<?php echo $title;?>">
                </div>
                <div class="form-group ">
                    <label for="theme">ΘΕΜΑ:</label>
                    <select class="form-control input-sm" id="theme" name="theme">
                        <option value="1" <?php echo $theme[0];?>>Ηθικά/ Πνευματικά μηνυματα</option>
                        <option value="2" <?php echo $theme[1];?>>Ανάλυση-κατανόηση και παραγωγή γραπτού λόγου / Σκέφτομαι και Γράφω </option>
                        <option value="3" <?php echo $theme[2];?>>Γραμματική – Σύνταξη – Λεξιλόγιο</option>
                        <option value="4" <?php echo $theme[3];?>>Σύνδεση με διάφορα άλλα θέματα</option>
                        <option value="5" <?php echo $theme[4];?>>Επιπλέον χαρακτηριστικά</option>
                        <option value="6" <?php echo $theme[5];?>>Όλες οι Κατηγορίες</option>

                    </select>
                </div>

                <div class="form-group ">
                    <label for="writer">ΣΥΓΓΡΑΦΕΑΣ:</label>
                    <input type="text" class="form-control input-sm" id="writer" name="writer" value="<?php echo $writer;?>">
                </div>
                <div class="form-group search2_div" id="all_keywards">
                    <label >ΛΕΞΕΙΣ ΚΛΕΙΔΙΑ:</label>
                    <input type="hidden" name="count" value="1" />
                    <div id="field">
                        <input   class=" form-control input-sm keywords" id="field1"  name="keyword1" type="text" />
                        <button  id="b1" class="btn btn-sm add-more keywords_button" type="button">+</button>
                    </div>
                </div>

            </div>
            <div id="down_box">
                <div class="form-group ">
                    <label for="percentage_of_images">ΑΝΑΛΟΓΙΑ ΕΙΚΟΝΑΣ/ΓΡΑΠΤΟΥ:</label>
                    <input type="number" class="form-control input-sm" id="percentage_of_images" name="percentage_of_images" value="<?php echo $percentage_of_images;?>">
                </div>
                <div class="form-group ">
                    <label for="age">ΗΛΙΚΙΑ:</label>
                    <input type="number" class="form-control input-sm" id="age" name="age" value="<?php echo $age;?>">
                </div>
                <div class="form-group ">
                    <label for="price">ΤΙΜΗ:</label>
                    <input type="text" id="amount" name="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                    <div id="slider-range"></div>
                </div>
                <div id="search_button">
                    <button id="search_submit" type="submit" class="btn btn-info btn-sm">Search</button>
                </div>
            </div>
          </form>
      </div>

    <div id="results">
        <div id="table_of_books">
            <?php echo $books; ?>
        </div>
    </div>
<!--      <img class='small_img' id='big_cover_img' src='../Database/Covers/". $value['Cover']."'/>-->

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <!--      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
      <script src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/front-end.js"></script>
      <script type="text/javascript" src="js/index.js"></script>

      <script>
          $( document ).ready(function() {
              $(".search_book").click(function(){
                  var book_id=$(this).attr('id').split("_")[1];
                  var ithiki=$("#m_"+book_id+"_1").attr('name');
                  var sindesi=$("#m_"+book_id+"_2").attr('name');
                  var epipleon=$("#m_"+book_id+"_3").attr('name');
                  var gramatiki=$("#m_"+book_id+"_4").attr('name');
                  var analisi=$("#m_"+book_id+"_5").attr('name');

                  $.get("session/search_book.php",
                      {book_id:book_id,
                          ithiki:ithiki,
                          sindesi:sindesi,
                          epipleon:epipleon,
                          gramatiki:gramatiki,
                          analisi:analisi,
                          submit:'true'},
                      function(data, textStatus, jqXHR)
                      {
                          window.open("book_profile.php");
                      });
              });

              $('#title').typeahead({
                  local: <?php echo $titles;?>
              });
              $('#writer').typeahead({
                  local: <?php echo $writers;?>
              });
//              // $('.keywords').typeahead({
//              //     local: <?php //echo $keywords;?>
//              // });
//
//              $(function() {
//                  var keywords_tags = <?php //echo $keywords;?>//;
//                  $(".keywords").autocomplete({
//                      source:keywords_tags
//                  });
//              });
//
              $('.tt-query').css('background-color','#fff');
              
          });
      </script>
</body>
</html>