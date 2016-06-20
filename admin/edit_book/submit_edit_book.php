<?php
/**
 * Created by PhpStorm.
 * User: HpPC
 * Date: 20-Jun-16
 * Time: 4:59 PM
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo $_POST["ISBN"];

    //$update_book= $conn->prepare("UPDATE `books` SET `ISBN`=".test_input($_POST["ISBN"]).",`Pages` = '300', `Persentage_of_images` = '0.8' WHERE `books`.`Book_id` = 1;");
    //(ISBN, Title, Writer, Illustrator, Publisher, Pages, Persentage_of_images, Min_age, Max_age, Cover, Back_cover, Link, Price) VALUES ('{$ISBN}', '{$Title}', '{$Writer}', '{$Illustrator}', '{$Publisher}', '{$Pages}', '{$Persentage_of_images}', '{$Min_age}', '{$Max_age}', '{$Cover}', '{$Back_cover}', '{$Link}', '{$Price}' )");


    //$update_book->execute();
}