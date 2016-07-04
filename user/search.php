<?php

include "../Database/MySqlConnect.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $list_of_keywords="";
    foreach ($_POST as $key => $value):
          $keyword=substr($key, 0,-1);
        if(strcmp ( $keyword , 'keyword' )==0){
            $list_of_keywords=$list_of_keywords." keywords.Name_of_keyword='".$value."' or ";
        }
    endforeach;
    $list_of_keywords=substr($list_of_keywords, 0,-5);

    $book_query=$conn->prepare("SELECT DISTINCT books.Title,books.Cover FROM books WHERE Title='".$_POST['title']."'or Writer='".$_POST['writer']."' ");
    $book_query->execute();
    $books_step_1 = $book_query->fetchAll(PDO::FETCH_ASSOC);



    $book_query=$conn->prepare("SELECT DISTINCT books.Title,books.Cover FROM books WHERE Min_age_read='".$_POST['age']."'or Min_age_no_read='".$_POST['age']."'or Persentage_of_images='".$_POST['percentage_of_images']."' ");
    $book_query->execute();
    $books_step_2 = $book_query->fetchAll(PDO::FETCH_ASSOC);
    print_r($books_step_2 ) ;

    $book_query=$conn->prepare("SELECT DISTINCT books.Title,books.Cover FROM books WHERE Min_age_read='".$_POST['age']."'or Min_age_no_read='".$_POST['age']."'or Persentage_of_images='".$_POST['percentage_of_images']."' ");
    $book_query->execute();
    $books_step_2 = $book_query->fetchAll(PDO::FETCH_ASSOC);
    print_r($books_step_2 ) ;

    $book_query=$conn->prepare("SELECT DISTINCT books.Title, books.Cover FROM books INNER JOIN books_keywords ON
books_keywords.Book_id=books.Book_id INNER JOIN keywords ON books_keywords.Keyword_id=keywords.Keyword_id WHERE ".$list_of_keywords."' ") ;
    $book_query->execute();
    $books_step_3 = $book_query->fetchAll(PDO::FETCH_ASSOC);
    print_r($books_step_3 ) ;

    $book_query=$conn->prepare("SELECT DISTINCT books.Title, books.Cover FROM books INNER JOIN books_keywords ON
books_keywords.Book_id=books.Book_id INNER JOIN keywords ON books_keywords.Keyword_id=keywords.Keyword_id
INNER JOIN subcategories ON keywords.Subcategory_id=subcategories.Subcategory_id INNER JOIN categories
On subcategories.Subcategory_id=categories.Category_id WHERE categories.Name_of_category='".$_POST['theme']."'");
    $book_query->execute();
    $books_step_4 = $book_query->fetchAll(PDO::FETCH_ASSOC);
    print_r($books_step_4 ) ;

    $list_of_books=array();
    for($i=0;$i<count($books_step_1);$i++){
            array_push($list_of_books,$books_step_1[$i]);
    }
    for($i=0;$i<count($books_step_2);$i++){
        if (!in_array($books_step_2[$i], $list_of_books)) {
            array_push($list_of_books,$books_step_2[$i]);

        }
    }
    for($i=0;$i<count($books_step_3);$i++){
        if (!in_array($books_step_3[$i], $list_of_books)) {
            array_push($list_of_books,$books_step_3[$i]);

        }
    }
    for($i=0;$i<count($books_step_4);$i++){
        if (!in_array($books_step_4[$i], $list_of_books)) {
            array_push($list_of_books,$books_step_4[$i]);

        }
    }
    print_r($list_of_books);

}
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
    <link rel="stylesheet" type="text/css" href="css/search.css">
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

  <div id="main_search">
    <div id="search_box">
      
    </div>

    <div id="results">
      
    </div>
  </div>



   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/front-end.js"></script>
</body>
</html>