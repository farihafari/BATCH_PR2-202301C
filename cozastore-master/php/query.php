<?php
session_start();
// session_unset();
include("php/connection.php");
$imageCatAdress="../dashmin/img/category/";
$imageProAdress="../dashmin/img/product/";
// add to cart;
if(isset($_POST['addToCart'])){
    if(isset($_SESSION['cart'])){

$productId = array_column($_SESSION['cart'],'pId');
if(in_array($_POST['proId'],$productId)){
    echo "<script>
    alert('product already exist into cart');
    </script>";
}else{


       $count = count($_SESSION['cart']); 
       $_SESSION['cart'][$count] = array("pId"=>$_POST['proId'],"pName"=>$_POST['proName'],"pPrice"=>$_POST['proPrice'],"pImage"=>$_POST['proImage'],"pQuantity"=>$_POST['proQuantity']);
       echo "<script>
       alert('product add into cart');
       </script>";
    }
    }else{
        $_SESSION['cart'][0]=array("pId"=>$_POST['proId'],"pName"=>$_POST['proName'],"pPrice"=>$_POST['proPrice'],"pImage"=>$_POST['proImage'],"pQuantity"=>$_POST['proQuantity']);
        echo "<script>
        alert('product add into cart');
        </script>";
    }
}
// remove item
if(isset($_GET['removeId'])){
    $removeId= $_GET['removeId'];
foreach($_SESSION['cart'] as $key => $value){
if($removeId == $value['pId']){
    unset($_SESSION['cart'][$key]);
    $_SESSION['cart']=array_values($_SESSION['cart']);
    echo "<script>
        alert('product delete from cart');
        location.assign('shoping-cart.php')
        </script>";
}
}
}
?>