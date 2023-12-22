<?php
session_start();
// session_unset();
include("php/connection.php");
$imageCatAdress="../dashmin/img/category/";
$imageProAdress="../dashmin/img/product/";
// add to cart;
if(isset($_POST['addToCart'])){
    if(isset($_SESSION['cart'])){
        
    }else{
        $_SESSION['cart'][0]=array("pId"=>$_POST['proId'],"pName"=>$_POST['proName'],"pPrice"=>$_POST['proPrice'],"pImage"=>$_POST['proImage'],"pQuantity"=>$_POST['proQuantity']);
        echo "<script>
        alert('product add into cart');
        </script>";
    }
}
?>