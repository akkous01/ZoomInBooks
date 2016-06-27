<?php
/**
 * Created by PhpStorm.
 * User: HpPC
 * Date: 20-Jun-16
 * Time: 4:59 PM
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo $_POST["ISBN"];

    $update_book= $conn->prepare("UPDATE `books` SET `ISBN`='".$_POST["ISBN"]."',`Title`='".$_POST["Title"]."',`Writer`='".$_POST["Writer"].
                " ',`Illustrator`='" .$_POST["Illustrator"]." ',`Publisher`='" .$_POST["Publisher"]." ',`Pages`='" .$_POST["Pages"].
                " ',`Pages` = '300',`Persentage_of_images`='" .$_POST["Persentage_of_images"]." ', `Min_age`='" .$_POST["Min_age"].
                " ',`Max_age`='" .$_POST["Max_age"]." ',`Link`='" .$_POST["Link"]."',`Price`='" .$_POST["Price"]."' WHERE `books`.`Book_id` = 1;");

    //$update_book->execute();
}