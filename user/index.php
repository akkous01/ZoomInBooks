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

<div id="main">
  <div id="main-top" >
    <div id="search_bar_book">
        <form id="search">
            <div id="search_box_dropdown" style="display: none">
                <div class="search_box_dropdown_elements" style="display: none">
                    <a href="#" id="close_button"><img  src="images/close_button.ico"></a>
                    <div id="search_elements">
                        <div class="form-group">
                            <label for="title">ΤΙΤΛΟΣ ΒΙΒΛΙΟΥ:</label>
                            <input type="text" class="form-control input-sm" id="title">
                        </div>
                        <div class="form-group">
                            <label for="theme">ΘΕΜΑ:</label>
                            <select class="form-control input-sm" id="theme">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="writer">ΣΥΓΓΡΑΦΕΑΣ:</label>
                            <input type="text" class="form-control input-sm" id="writer">
                        </div>
                        <div class="form-group">
                            <label for="age">ΗΛΙΚΙΑ:</label>
                            <input type="number" class="form-control input-sm" id="age">
                        </div>
                        <div class="form-group">
                            <label for="age">ΠΟΣΟΣΤΟ ΕΙΚΟΝΑΣ/ΓΡΑΠΤΟΥ:</label>
                            <input type="number" class="form-control input-sm" id="age" placeholder="--%">
                        </div>
                        <div class="form-group">
                            <label for="keywards">ΛΕΞΕΙΣ ΚΛΕΙΔΙΑ:</label>
                            <input type="hidden" name="count" value="1" />
                            <div id="field" style="text-align: center">
                                <input  autocomplete="off" class=" form-control input-sm" id="field1" name="prof1" type="text"/>
                                <button  id="b1" class="btn btn-xs add-more" type="button">+</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price">ΤΙΜΗ:</label>

                        </div>
                    </div>
                    <div id="search_footer">
                        <button id="search_submit" type="submit" class="btn btn-info btn-sm " style="border-radius: 24px;">Round</button>
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

  <div id="main-bottom" >
    
    <div id="new_inserts">
      <div id="new_books_show">

      </div>
    </div>

    <div id="middle">
        <div id="facebook_div"><img id="facebook_icon" src="images/facebook-02.png" ></div>
        <div id="instagram_div"><img id="instagram_icon" src="images/instagram-02.png" ></div>
    </div>

    <div id="anakinosis">
      <div id="anakinosis_show"></div>
    </div>
  </div>
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
              $("#search_box_dropdown").slideToggle("3000");
              $(".search_box_dropdown_elements").css({'display':'block'});
          });
          $("#close_button").click(function () {
              $(".search_box_dropdown_elements").css({'display':'none'});
              $("#search_box_dropdown").slideToggle("3000");
              $("#search_bar").css({'display':'block'});

          });
              var next = 1;
              $(".add-more").click(function(e){
                  e.preventDefault();
                  var addto = "#field" + next;
                  var addRemove = "#field" + (next);
                  next = next + 1;
                  var newIn = '<input autocomplete="off" class="input form-control" id="field' + next + '" name="field' + next + '" type="text">';
                  var newInput = $(newIn);
                  var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-xs btn-danger remove-me" >-</button></div><div id="field">';
                  var removeButton = $(removeBtn);
                  $(addto).after(newInput);
                  $(addRemove).after(removeButton);
                  $("#field" + next).attr('data-source',$(addto).attr('data-source'));
                  $("#count").val(next);

                  $('.remove-me').click(function(e){
                      e.preventDefault();
                      var fieldNum = this.id.charAt(this.id.length-1);
                      var fieldID = "#field" + fieldNum;
                      $(this).remove();
                      $(fieldID).remove();
                  });
            });
      });
  </script>
  </body>
</html>