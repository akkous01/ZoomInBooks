<?php 
  include "session/search_book.php";
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
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/book_profile.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
  </header>

  <div id="main_book">
    <div id="small_images">
      <div id="cover">
        <?php echo '<img class="mini_img" id="cover_img" src="../Database/Covers/'. $Cover.'"/>';?>
      </div>
      <div id="back_cover">
        <?php echo '<img class="mini_img" id="back_cover_img" src="../Database/Back_Covers/'. $Back_cover.'"/>';?>
      </div>

    </div>
    <div id="show_image">
      <div id="image_area">
        <?php echo '<img class="big_img" id="big_cover_img" src="../Database/Covers/'. $Cover.'"/>';?>
        <?php echo '<img class="big_img" style="display:none" id="big_back_cover_img" src="../Database/Back_Covers/'. $Back_cover.'"/>';?>
      </div>
      <div id="mark_area">
        <img class="mark_img" src="images/mark-1-1.png" <?php echo $mark1?>/>
        <img class="mark_img" src="images/mark-1-2.png" <?php echo $mark2?>/>
        <img class="mark_img" src="images/mark-1-3.png" <?php echo $mark3?>/>
        <img class="mark_img" src="images/mark-1-4.png" <?php echo $mark4?>/>
        <img class="mark_img" src="images/mark-1-5.png" <?php echo $mark5?>/>

      </div>
    </div>
    <div id="main_characteristics">
      <div id="main_characteristics_top">
        <div class="title_div" style="width:15%;margin-left:42%"><h4>Τίτλος</h4></div>
        <div class="data_div" style="width:80%;margin-left:10%"><h4><?php echo $Title?></h4></div>
        <table class="main_characteristics_table">
          <tr>
            <td>
              <div class="title_div" style="width:40%;margin-left:3%"><h4>Συγγραφέας</h4></div>
              <div class="data_div" style="width:95%;margin-left:3%"><h4><?php echo $Writer?></h4></div>
            </td>
            <td>
              <div class="title_div" style="width:50%;margin-left:3%" ><h4>Εικονογράφος</h4></div>
              <div class="data_div" style="width:95%;margin-left:3%"><h4><?php echo $Illustrator?></h4></div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="title_div" style="width:30%;margin-left:3%"><h4>Εκδόσεις</h4></div>
              <div class="data_div" style="width:95%;margin-left:3%"><h4><?php echo $Publisher?></h4></div>
            </td>
            <td>
              <div class="title_div" style="width:20%;margin-left:3%" ><h4>ISBN</h4></div>
              <div class="data_div" style="width:50%;margin-left:3%"><h4><?php echo $ISBN?></h4></div>
            </td>
          </tr>
          <tr>
            
        </table>
        
        <table class="main_characteristics_table_2">
          <tr>
            <td style="width:25%;" >
              <div class="title_div_2" style="width:50%;margin-left:4%" ><h4>Σελίδες</h4></div>
              <div class="data_div_2" style="width:40%;margin-left:1%"><h4><?php echo $Pages?></h4></div>
            </td>
            <td style="width:25%;">
              <div class="title_div_2" style="width:40%;margin-left:2%" ><h4>Τιμή</h4></div>
              <div class="data_div_2" style="width:50%;margin-left:3%"><h4><?php echo $Price -3 ;?> - <?php echo $Price +3 ;?>€</h4></div>
            </td>
            <td  >
              <div class="title_div_2" style="width:70%;margin-left:3%" ><h4>Αναλογία Εικόνων- Κειμένου</h4></div>
              <div class="data_div_2" style="width:20%;margin-left:1%"><h4><?php echo $Persentage_of_images?>:<?php echo 100-$Persentage_of_images?></h4></div>
            </td>
            
          </tr>
        </table>
        <table class="main_characteristics_table_2">
          <tr>
            <td style="width:30%;" >
              <div class="title_div_2" style="width:45%;margin-left:3%" ><h4> Ηλικία</h4></div>
              <div class="data_div_2" style="width:40%;margin-left:2%"><h4><?php echo $age?></h4></div>
            </td>
            <td >
              <div class="data_div_2" style="width:50%;margin-left:6%;<?php echo $parents_show?>"  ><h4> <?php echo $parents?></h4></div>
            </td>
            
          </tr>

        </table>
        <table class="main_characteristics_table_2">
          <tr >
            <td style="width:100%">
              <div class="title_div_2" style="width:12%;margin-left:1%" ><h4>Μορφή</h4></div>
              <div class="data_div_2" style="width:50%;margin-left:1%"><h4><?php echo $morfi?></h4></div>
            </td>
          </tr>
          <tr <?php echo $link_show?>>
            <td style="width:100%">
              <div class="title_div_2" style="width:12%;margin-left:1%" ><h4>Link</h4></div>
              <div class="data_div_2" style="width:70%;margin-left:1%"><h4><?php echo $Link?></h4></div>
            </td>
          </tr>
          <tr <?php echo $curriculum_show?>>
            <td style="width:100%">
              <div class="title_div" style="width:70%;margin-left:1%" ><h4>Δραστηριότητες και Θέματα προς συζήτηση</h4></div>
              <div class="data_div" style="width:95%;margin-left:1%"><h4><?php echo $Curriculum?></h4></div>
            </td>
          </tr>
        </table>
        
        

      </div>

      <div id="main_characteristics_bottom">
        
      </div>
    </div>
  </div>
  
  <!-- <div id="table_img"></div> -->
  
  <div id="categories_nav">
    <div id="ithiki_tab" class="categories_tab" <?php echo $tab1?>>
      <img src="images/ithiki-tab.png" class="tab_img">
    </div>
    <div id="sindesi_tab" class="categories_tab" <?php echo $tab2?>>
      <img src="images/sindesi-tab.png" class="tab_img">
    </div>
    <div id="epipleon_tab" class="categories_tab" <?php echo $tab3?>>
      <img src="images/epipleon-tab.png" class="tab_img">
    </div>
    <div id="gramatiki_tab" class="categories_tab" <?php echo $tab4?>>
      <img src="images/grammatiki-tab.png" class="tab_img">      
    </div>
    <div id="analisi_tab" class="categories_tab" <?php echo $tab5?>>
      <img src="images/analisi-tab.png" class="tab_img">
    </div>
  </div>

  <div id="ithiki_box" class="categories_box"><?php echo $ithiki?></div>
  <div id="sindesi_box" class="categories_box" style="display:none;"><?php echo $sindesi?></div>
  <div id="epipleon_box" class="categories_box" style="display:none;"><?php echo $epipleon?></div>
  <div id="gramatiki_box" class="categories_box" style="display:none;"><?php echo $gramatiki?></div>
  <div id="analisi_box" class="categories_box" style="display:none;"><?php echo $analisi?></div>


   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/front-end.js"></script>

    <script type="text/javascript">
      $( document ).ready(function() {
        $("#cover_img").click(function () {
          $("#big_cover_img").show();
          $("#big_back_cover_img").hide();
          
        });

        $("#back_cover_img").click(function () {
          $("#big_cover_img").hide();
          $("#big_back_cover_img").show();
          
        });
      });

    </script>
</body>
</html>