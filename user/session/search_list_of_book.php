<?php
/**
 * Created by PhpStorm.
 * User: HpPC
 * Date: 06-Jul-16
 * Time: 6:11 PM
 */
include "../Database/MySqlConnect.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    print_r($_POST);
    $list_of_keywords="";
    foreach ($_POST as $key => $value):
        $keyword=substr($key, 0,-1);
        if(strcmp ( $keyword , 'keyword' )==0){
            $list_of_keywords=$list_of_keywords." keywords.Name_of_keyword='".$value."' or ";
        }
    endforeach;
    $list_of_keywords=substr($list_of_keywords, 0,-5);

    $book_query=$conn->prepare("SELECT DISTINCT books.Book_id,books.Title,books.Cover,categories.Category_id FROM
categories INNER JOIN subcategories ON subcategories.Category_id=categories.Category_id INNER JOIN keywords ON
subcategories.Subcategory_id=keywords.Subcategory_id INNER JOIN books_keywords ON books_keywords.Keyword_id=keywords.Keyword_id
INNER JOIN books On books.Book_id=books_keywords.Book_id WHERE books.Title='".$_POST['title']."' OR books.Writer='".$_POST['writer']."'");
    $book_query->execute();
    $books_step_1 = $book_query->fetchAll(PDO::FETCH_ASSOC);



    $book_query=$conn->prepare("SELECT DISTINCT books.Book_id,books.Title,books.Cover,categories.Category_id FROM
categories INNER JOIN subcategories ON subcategories.Category_id=categories.Category_id INNER JOIN keywords ON
subcategories.Subcategory_id=keywords.Subcategory_id INNER JOIN books_keywords ON books_keywords.Keyword_id=keywords.Keyword_id
INNER JOIN books On books.Book_id=books_keywords.Book_id WHERE  books.Min_age_no_read='".$_POST['age']."'
OR books.Min_age_read='".$_POST['age']."'OR books.Persentage_of_images='".$_POST['percentage_of_images']."'");
    $book_query->execute();
    $books_step_2 = $book_query->fetchAll(PDO::FETCH_ASSOC);
//    print_r($books_step_2 ) ;


    $book_query=$conn->prepare("SELECT DISTINCT books.Book_id,books.Title,books.Cover,categories.Category_id FROM
categories INNER JOIN subcategories ON subcategories.Category_id=categories.Category_id INNER JOIN keywords ON
subcategories.Subcategory_id=keywords.Subcategory_id INNER JOIN books_keywords ON books_keywords.Keyword_id=keywords.Keyword_id
INNER JOIN books On books.Book_id=books_keywords.Book_id WHERE  ".$list_of_keywords."' ") ;
    $book_query->execute();
    $books_step_3 = $book_query->fetchAll(PDO::FETCH_ASSOC);
//    print_r($books_step_3 ) ;

    $book_query=$conn->prepare("SELECT DISTINCT books.Book_id,books.Title,books.Cover,categories.Category_id FROM
categories INNER JOIN subcategories ON subcategories.Category_id=categories.Category_id INNER JOIN keywords ON
subcategories.Subcategory_id=keywords.Subcategory_id INNER JOIN books_keywords ON books_keywords.Keyword_id=keywords.Keyword_id
INNER JOIN books On books.Book_id=books_keywords.Book_id WHERE  categories.Category_id='".$_POST['theme']."'");
    $book_query->execute();
    $books_step_4 = $book_query->fetchAll(PDO::FETCH_ASSOC);
//    print_r($books_step_4 ) ;

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
    $duble=array();
    for($i=0;$i<count($list_of_books);$i++){
        if(isset($list_of_books[$i])) {
            for ($j = $i + 1; $j < count($list_of_books); $j++) {
                if (isset($list_of_books[$j])) {
                    if (strcmp($list_of_books[$j]['Book_id'], $list_of_books[$i]['Book_id']) == 0) {
                        $list_of_books[$i]['Category_id'] = $list_of_books[$i]['Category_id'] . $list_of_books[$j]['Category_id'];
                        unset($list_of_books[$j]);
                    }
                }
            }
        }

    }

    $mark=array();
    $i=0;
    $books="";
    foreach ($list_of_books as $key => $value):
        for($j=0;$j<5;$j++) {
            $mark[$j]='none';
        }
        $marks_to_be=str_split($value['Category_id']);
        for($j=0;$j<count($marks_to_be);$j++){
            $mark[$marks_to_be[$j]-1]='block';
        }
        if($i%3==0){$books=$books. "<tr>"."\n";}

        $books=$books. "<td>
                                        <div id='show_image'>
                                            <div id='book_title'>
                                                <h5>".$value['Title']."</h5>
                                            </div>
                                            <div id='image_area'>
                                                <img class='small_img' id='big_cover_img' src='../Database/Covers/". $value['Cover']."'/>
                                            </div>
                                            <div id='mark_area'>
                                                  <img class='mark_img' src='images/mark-1-1.png' style='display:".$mark[0]."'/>
                                                  <img class='mark_img' src='images/mark-1-2.png' style='display:".$mark[1]."'/>
                                                  <img class='mark_img' src='images/mark-1-3.png' style='display:".$mark[2]."'/>
                                                  <img class='mark_img' src='images/mark-1-4.png' style='display:".$mark[3]."'/>
                                                  <img class='mark_img' src='images/mark-1-5.png' style='display:".$mark[4]."'/>
                                            </div>
                                        </div>
                                    </td>"."\n";
        if(($i+1)%3==0){$books=$books. "</tr>"."\n";}

        $i++;
    endforeach;

}
?>