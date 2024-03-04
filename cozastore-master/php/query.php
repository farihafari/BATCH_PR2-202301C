<?php
session_start();
// session_unset();
include("connection.php");
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
date_default_timezone_set("Asia/Karachi");
    $now = time(); // get current unix timeStamp
    $dateTimeString = date('Y-m-d H:i:s',$now);//converts the Unix timestamp to a more readable format.
    $time = date('H:i:s',strtotime($dateTimeString));
$userId = $_SESSION['userId'];
$userName=$_SESSION['userName'];
$userEmail = $_SESSION['userEmail'];
$userAddress = $_POST['address'];
$userNumber = $_POST['number'];
$totalAmount = 0;
$productQtyCount=0;
foreach($_SESSION['cart'] as $key => $values){

    $productQtyCount = $value['pQuantity'];

    $productId = $values['pId'];
    $productName = $values['pName'];
    $productPrice = $values['pPrice'];
    $productQuantity = $values['pQuantity'];
    $query= $pdo ->prepare("insert into orders (productId,userId,userName,productName,productPrice,productQuantity,userAddress,userPhone,mydate,time) values(:pid,:uid,:un,:pn,:pp,:pq,:ua,:up,:mdate,:mtime)");
    $query->bindParam("pid",$productId);
    $query->bindParam("uid",$userId);
    $query->bindParam("un",$userName);
    $query->bindParam("pn",$productName);
    $query->bindParam("pp",$productPrice);
    $query->bindParam("pq",$productQuantity);
    $query->bindParam("ua",$userAddress);
    $query->bindParam("up",$userNumber);
    $query->bindParam("mdate",$dateTimeString);
    $query->bindParam("mtime",$time);
    
    $query ->execute();
    // unset($_SESSION['cart']);
  
}
echo "<script>alert('order place successfuuly');
location.assign('index.php')
</script>";

}
if(isset($_POST['search'])){
    $search =$_POST['search'];
    $query = $pdo ->prepare("select * from products where product_name like '%$search%'");
    $query ->execute();
    $row = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($row as $proAll){
     ?>
  
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="<?php echo $imageProAdress.$proAll['product_image']?>" alt="IMG-PRODUCT">
  
  
                    </div>
  
                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="product-detail.php?pId=<?php echo $proAll['product_id']?>"
                                class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                <?php echo $proAll['product_name']?>
                            </a>
  
                            <span class="stext-105 cl3">
                                PKR: <?php echo $proAll['product_price']?>
                            </span>
                        </div>
  
                        <div class="block2-txt-child2 flex-r p-t-3">
                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png"
                                    alt="ICON">
                                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png"
                                    alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
  
            <?php }
}
if(isset($_POST['reviews'])){
    $name=$_SESSION['userName'];
    $email=$_POST['userEmail'];
    $reviews=$_POST['reviews'];
    $query = $pdo->prepare("insert into reviews (userfeedback)");
}
            ?>

