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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>



  <header>
    <ul class="my_nav">
        <li><a href="#"><img src="images/navbar/1_HomePage.png"></a></li>
        <li><a href="#"><img src="images/navbar/2_OurPhilosophy.png"></a></li>
        <li><a href="#"><img src="images/navbar/3_Blog.png"></a></li>
        <li><a href="#"><img src="images/navbar/4_Communicate.png"></a></li>
        <li><a href="#"><img src="images/navbar/5_LogIn.png"></a></li>
        <li><a href="#"><img src="images/navbar/6_CreateAccount.png"></a></li>
        <li><a href="#"><img src="images/navbar/7_Gallery.png"></a></li>
        <li><a href="#"><img src="images/navbar/8_ZoomIn.png"></a></li>
    </ul>
<!--      <ul class="nav">-->
<!--        <li id="nav_1_HomePage"><img src="images/navbar/1_HomePage.png"></li>-->
<!--        <li id="nav_2_OurPhilosophy"><img src="images/navbar/2_OurPhilosophy.png"></li>-->
<!--        <li id="nav_3_Blog"><img src="images/navbar/3_Blog.png"></li>-->
<!--        <li id="nav_4_Communicate"><img src="images/navbar/4_Communicate.png"></li>-->
<!--        <li id="nav_5_LogIn"><img src="images/navbar/5_LogIn.png"></li>-->
<!--        <li id="nav_6_CreateAccount"><img src="images/navbar/6_CreateAccount.png"></li>-->
<!--        <li id="nav_7_Gallery"><img src="images/navbar/7_Gallery.png"></li>-->
<!--        <li id="nav_8_ZoomIn"><img src="images/navbar/8_ZoomIn.png"></li>-->
<!--    </ul>-->
 </header>

<div id="main">
  <div id="main-top" >
    <div id="search_bar_book">
            <div id="search_box_dropdown" style="display:none"></div>
            <div id="search_bar"></div>


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
      <div class="book_img"></div>
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
<div style="border:4px solid black ; height: 35% ; width:100%" ></div>

</div>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/front-end.js"></script>
  <script>
      $( document ).ready(function() {
          $("#search_bar").click(function () {
              $("#search_bar").css({'display':'none'});

              $("#search_box_dropdown").slideToggle("30000");
          });
      });
  </script>
  </body>
</html>