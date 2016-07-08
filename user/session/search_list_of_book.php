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

    $book_query=$conn->prepare("SELECT DISTINCT books.Book_id FROM books WHERE books.Title='".$_POST['title']."' OR books.Writer='".$_POST['writer']."'");
    $book_query->execute();
    $books_step_1 = $book_query->fetchAll(PDO::FETCH_ASSOC);
//    print_r($books_step_1 ) ;


    $book_query=$conn->prepare("SELECT DISTINCT books.Book_id FROM books WHERE  books.Min_age_no_read='".$_POST['age']."'
OR books.Min_age_read='".$_POST['age']."'OR books.Persentage_of_images='".$_POST['percentage_of_images']."'");
    $book_query->execute();
    $books_step_2 = $book_query->fetchAll(PDO::FETCH_ASSOC);
//    print_r($books_step_2 ) ;


    $book_query=$conn->prepare("SELECT DISTINCT books_keywords.Book_id FROM books_keywords INNER JOIN keywords ON books_keywords.Keyword_id=keywords.Keyword_id
WHERE  ".$list_of_keywords."' ") ;
    $book_query->execute();
    $books_step_3 = $book_query->fetchAll(PDO::FETCH_ASSOC);
//    print_r($books_step_3 ) ;

    $book_query=$conn->prepare("SELECT  DISTINCT   books.Book_id
                                FROM       books
                                INNER JOIN books_keywords ON books.Book_id = books_keywords.Book_id
                                INNER JOIN keywords ON keywords.Keyword_id = books_keywords.Keyword_id
                                INNER JOIN subcategories ON subcategories.Subcategory_id = keywords.Subcategory_id
                                INNER JOIN categories ON categories.Category_id = subcategories.Category_id
                                WHERE     categories.Category_id='".$_POST['theme']."'");
    $book_query->execute();
    $books_step_4 = $book_query->fetchAll(PDO::FETCH_ASSOC);
//    print_r($books_step_4 ) ;

    $list_of_books_Id=array_merge ($books_step_1 ,$books_step_2, $books_step_3,$books_step_4 );
    $list_of_books=array();
    for($i=0;$i<count($list_of_books_Id);$i++){
        array_push($list_of_books,$list_of_books_Id[$i]['Book_id']);
    }
    $list_of_books=array_unique($list_of_books);
    $books="";
    $mark=array();
    $index=0;
    foreach ($list_of_books as $index=>$book_id):
        for($j=0;$j<5;$j++) {
            $mark[$j]="none' name='0'";
        }
        $book_query=$conn->prepare("SELECT  DISTINCT   books.Book_id,books.Title,books.Cover,categories.Category_id
                                FROM       books
                                INNER JOIN books_keywords ON books.Book_id = books_keywords.Book_id
                                INNER JOIN keywords ON keywords.Keyword_id = books_keywords.Keyword_id
                                INNER JOIN subcategories ON subcategories.Subcategory_id = keywords.Subcategory_id
                                INNER JOIN categories ON categories.Category_id = subcategories.Category_id
                                WHERE     books.Book_id='".$book_id."'");
        $book_query->execute();
        $books_results = $book_query->fetchAll(PDO::FETCH_ASSOC);
        $categories=array();
        $value=$books_results[0];
        for($i=0;$i< count($books_results);$i++){
            array_push($categories,$books_results[$i]['Category_id']);
        }
        for($j=0;$j<count($categories);$j++){
            $mark[$categories[$j]-1]="block' name='1'";
        }
        if($index%3==0){$books=$books. "<div class='row'>"."\n";}

        $books=$books. "<div class='column'>
                                        <div id='show_image'>
                                            <div id='book_title'>
                                                <label>".$value['Title']."</label>
                                            </div>
                                            <div id='mark_image'>
                                                <div id='image_area'>
                                                    <img class='small_img' id='big_cover_img' src='../Database/Covers/". $value['Cover']."'/>
                                                </div>
                                                <div id='mark_area'>
                                                      <img class='mark_img' src='images/mark-1-1.png' style='display:".$mark[0]."/>
                                                      <img class='mark_img' src='images/mark-1-2.png' style='display:".$mark[1]."/>
                                                      <img class='mark_img' src='images/mark-1-3.png' style='display:".$mark[2]."/>
                                                      <img class='mark_img' src='images/mark-1-4.png' style='display:".$mark[3]."/>
                                                      <img class='mark_img' src='images/mark-1-5.png' style='display:".$mark[4]."/>
                                                </div>
                                             </div>
                                            <div id='more_button'>
                                                <button id='button_".$value['Book_id']."' type='submit' class='btn btn-info btn-xs search_book'>Δείτε περισσότερα...</button>
                                            </div>

                                        </div>

                                    </div>"."\n";
        if(($index+1)%3==0){$books=$books. "</div>"."\n";}

        $i++;
    endforeach;

}
?>
<!--<img class='small_img' id='big_cover_img' src='../Database/Covers/". $value['Cover']."'/>-->
<!--<button id='search_submit' type='submit' class='btn btn-info btn-sm'>Search</button>-->
