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
    <link rel="stylesheet" type="text/css" href="css/phylosophy.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />


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

<div id="main_contact">
  <div id="phylosophy_area" style="overflow-x:hidden; padding-top:1%;text-align:center">
  <!-- <div class="container"> -->
    <p>Παρακαλώ συμπληρώστε την πιο κάτω φόρμα για να επικοινωνήσετε μαζί μας</p>

    <form id="condact_form" method="post" class="form-horizontal" action="sent_email.php">
       <div class="form-group">
          <label class="control-label col-sm-4" for="name">Όνομα: *</label>
          <div class="col-sm-5"><input type="text" class="form-control" id="name" name="name"></div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="surname">Επίθετο: *</label>
          <div class="col-sm-5"><input type="text" class="form-control" id="surname" name="surname"></div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-4" for="tel">Τηλέφωνο:</label>
          <div class="col-sm-5"><input type="text" class="form-control" id="tel" name="tel"></div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-4" for="email">E-mail: *</label>
          <div class="col-sm-5"><input type="email" class="form-control" id="email" name="email"></div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-4" for="occup">Ιδιότητα: *</label>
          <div class="col-sm-5"><input type="text" class="form-control" id="occup" name="occup"></div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-4" for="city">Πόλη:</label>
          <div class="col-sm-5"><input type="text" class="form-control" id="city" name="city"></div>
        </div>

        <label>Ενδιαφέρομαι για:</label>
        <div style="width:70%; margin-left:15%; text-align:left">
          <div class="checkbox">
            <label><input type="checkbox" value="">Πιθανή συνεργασία</label>
          </div>
          <div class="checkbox">
            <label><input type="checkbox" value="">Παραγγελία έντυπου οδηγού</label>
          </div>
          <div class="checkbox disabled">
            <label><input type="checkbox" value="">Εγγραφή στο newsletter</label>
          </div>
        </div>
        <div style="margin-top:4%;width:70%; margin-left:15%; text-align:left">
          <p>Μήνυμα:</p>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" ></label>
          <div class="col-sm-8"><textarea class="form-control" rows="4" id="msg" name="msg"></textarea> 
        </div>
        <br>
        <div style="margin-top:4%;width:70%; margin-left:15%; text-align:left">
        <!-- <div class="form-group"> -->
          <input type="submit" class="btn btn-default" value="Αποστολή">
        </div>

    </form>
  <!-- </div> -->
  </div>
</div>

<footer>Maria Christodoulou © 2016</footer>

  <script src="js/bootstrap.min.js"></script>

</body>
</html>