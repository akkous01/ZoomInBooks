<?php
/**
 * Created by PhpStorm.
 * User: HpPC
 * Date: 06-Jul-16
 * Time: 6:11 PM
 */
include "../Database/MySqlConnect.php";
$list_of_books=array();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// set variables ////////////////////////////////////////////////////////////////////
    if(isset($_POST['title'])){
        $title=$_POST['title'];
    }else{
        $title=" ";
    }
    if(isset($_POST['writer'])){
        $writer=$_POST['writer'];
    }else{
        $writer=" ";
    }
    if(isset($_POST['age'])){
        $age=$_POST['age'];
    }else{
        $age=" ";
    }
    if(isset($_POST['percentage_of_images'])){
        $percentage_of_images=$_POST['percentage_of_images'];
    }else{
        $percentage_of_images=" ";
    }
    if(isset($_POST['theme'])){
        $theme_id=$_POST['theme'];
    }else{
        $theme_id=6;
    }
    $theme=array(6);
    for($j=0;$j<6;$j++){
        $theme[$j]="";
    }
    $theme[$theme_id-1]="selected";

    $price=explode("-", $_POST['amount']);
    $keywords=array();
    $list_of_keywords="";
    $list_for_input="";
    foreach ($_POST as $key => $value):
        $keyword=substr($key, 0,-1);
        if(strcmp ( $keyword , 'k' )==0 or strcmp ( $key , 'keywords_Autofill' )==0){
            array_push($keywords,$value);
            $list_of_keywords=$list_of_keywords." keywords.Name_of_keyword='".$value."' or ";
            $list_for_input=$list_for_input.$value.",";
        }
    endforeach;

    if(isset($_POST['searched_keywords'])){
        $searched_keywords=explode(",",$_POST['searched_keywords']);
        for ($i=0;$i<count($searched_keywords)-1;$i++){
            $list_for_input=$list_for_input.$searched_keywords[$i].",";
            $list_of_keywords=$list_of_keywords." keywords.Name_of_keyword='".$searched_keywords[$i]."' or ";
        }
    }
    $list_for_input=$list_for_input."...";
    $list_of_keywords=substr($list_of_keywords, 0,-5);
//queries //////////////////////////////////////////////

    $book_query=$conn->prepare("SELECT DISTINCT books.Book_id FROM books WHERE books.Title='".$title."' OR books.Writer='".$writer."'");
    $book_query->execute();
    $books_step_1 = $book_query->fetchAll(PDO::FETCH_ASSOC);
//    print_r($books_step_1 ) ;


    $book_query=$conn->prepare("SELECT DISTINCT books.Book_id FROM books WHERE  books.Min_age_no_read='".$age."'
OR books.Min_age_read='".$age."'OR books.Persentage_of_images='".$percentage_of_images."' OR (books.Price>'".$price[0]."' AND books.Price<'".$price[1]."')");
    $book_query->execute();
    $books_step_2 = $book_query->fetchAll(PDO::FETCH_ASSOC);
//    print_r($books_step_2 ) ;


    $book_query=$conn->prepare("SELECT DISTINCT books_keywords.Book_id FROM books_keywords INNER JOIN keywords ON books_keywords.Keyword_id=keywords.Keyword_id
WHERE  ".$list_of_keywords."' ") ;
    $book_query->execute();
    $books_step_3 = $book_query->fetchAll(PDO::FETCH_ASSOC);
//    print_r($books_step_3 ) ;
    if ($theme_id==6 ){
        if(strcmp($age," ")!=0 and strcmp($title," ")!=0 and strcmp($percentage_of_images," ")!=0 and strcmp($writer," ")!=0) {
            $book_query = $conn->prepare("SELECT  DISTINCT   books.Book_id
                                FROM       books
                                INNER JOIN books_keywords ON books.Book_id = books_keywords.Book_id
                                INNER JOIN keywords ON keywords.Keyword_id = books_keywords.Keyword_id
                                INNER JOIN subcategories ON subcategories.Subcategory_id = keywords.Subcategory_id
                                INNER JOIN categories ON categories.Category_id = subcategories.Category_id
                               ");
        }
    }else {
        $book_query = $conn->prepare("SELECT  DISTINCT   books.Book_id
                                FROM       books
                                INNER JOIN books_keywords ON books.Book_id = books_keywords.Book_id
                                INNER JOIN keywords ON keywords.Keyword_id = books_keywords.Keyword_id
                                INNER JOIN subcategories ON subcategories.Subcategory_id = keywords.Subcategory_id
                                INNER JOIN categories ON categories.Category_id = subcategories.Category_id
                                WHERE     categories.Category_id='" . $theme_id . "'");
    }
    $book_query->execute();
    $books_step_4 = $book_query->fetchAll(PDO::FETCH_ASSOC);
//    print_r($books_step_4 ) ;

// create variable /////////////////////////////////////////////////////////////////
    $list_of_books_Id=array_merge ($books_step_1 ,$books_step_2, $books_step_3,$books_step_4 );
    $list_of_books=array();
    for($i=0;$i<count($list_of_books_Id);$i++){
        array_push($list_of_books,$list_of_books_Id[$i]['Book_id']);
    }
    $list_of_books=array_unique($list_of_books);


}else{
    $writer="title";
    $writer=" ";
    $age=" ";
    $percentage_of_images=" ";
    $theme_id=6;
    $list_for_input=",...";
}
function createListOfBooks($list_of_books,$conn){
    $books="";
    $mark=array();
    $index=0;
    foreach ($list_of_books as $index_of_table=>$book_id):
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
                                                      <img class='mark_img' id='m_".$value['Book_id']."_1' src='images/mark-1-1.png' style='display:".$mark[0]."/>
                                                      <img class='mark_img' id='m_".$value['Book_id']."_2' src='images/mark-1-2.png' style='display:".$mark[1]."/>
                                                      <img class='mark_img' id='m_".$value['Book_id']."_3' src='images/mark-1-3.png' style='display:".$mark[2]."/>
                                                      <img class='mark_img' id='m_".$value['Book_id']."_4' src='images/mark-1-4.png' style='display:".$mark[3]."/>
                                                      <img class='mark_img' id='m_".$value['Book_id']."_5' src='images/mark-1-5.png' style='display:".$mark[4]."/>
                                                </div>
                                             </div>
                                            <div id='more_button'>
                                                <button id='button_".$value['Book_id']."' type='submit' class='btn btn-info btn-xs search_book'>Δείτε περισσότερα...</button>
                                            </div>

                                        </div>

                                    </div>"."\n";
        if(($index+1)%3==0){$books=$books. "</div>"."\n";}

        $index++;
    endforeach;
    return $books;
}

?>
<!--<img class='small_img' id='big_cover_img' src='../Database/Covers/". $value['Cover']."'/>-->
<!--<button id='search_submit' type='submit' class='btn btn-info btn-sm'>Search</button>-->
