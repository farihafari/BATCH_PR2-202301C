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
// sign up
if(isset($_POST['register'])){
    $userName= $_POST['name'];
    $userEmail= $_POST['email'];
    $userPassword= $_POST['password'];
    $query = $pdo ->prepare("insert into users (name,email,password) values(:pn,:pe,:pp)");
    $query->bindParam("pn",$userName);
    $query->bindParam('pe',$userEmail);
$query->bindParam("pp",$userPassword);
$query->execute();
echo "<script>alert('register your account successfully');
location.assign('login.php');
</script>";
}
// login
if(isset($_POST['logIn'])){
    $userEmail= $_POST['email'];
    $userPassword= $_POST['password'];
$query = $pdo->prepare('select * from users where email=:pe && password = :pp');
$query->bindParam('pe',$userEmail);
$query->bindParam("pp",$userPassword);
$query->execute();
$userDetail = $query->fetch(PDO::FETCH_ASSOC);
if($userDetail){
    $_SESSION['userId']= $userDetail['id'];
    $_SESSION['userName']= $userDetail['name'];
    $_SESSION['userEmail']= $userDetail['email'];
    echo "<script>alert('login successfully');
    location.assign('shoping-cart.php');
    </script>";
}

}
// cart
if(isset($_POST['checkOut'])){
$userId = $_SESSION['userId'];
$userAddress = $_POST['address'];
$userNumber = $_POST['number'];
foreach($_SESSION['cart'] as $key => $values){
    $productId = $values['pId'];
    $productName = $values['pName'];
    $productPrice = $values['pPrice'];
    $productQuantity = $values['pQuantity'];
    $query= $pdo ->prepare("insert into orders (productId,userId,productName,productPrice,productQuantity,userAddress,userPhone) values(:pid,:uid,:pn,:pp,:pq,:ua,:up)");
    $query->bindParam("pid",$productId);
    $query->bindParam("uid",$userId);
    $query->bindParam("pn",$productName);
    $query->bindParam("pp",$productPrice);
    $query->bindParam("pq",$productQuantity);
    $query->bindParam("ua",$userAddress);
    $query->bindParam("up",$userNumber);
    $query ->execute();
    unset($_SESSION['cart']);
  
}
echo "<script>alert('order place successfuuly');
location.assign('index.php')
</script>";
}
?>