<?php
session_start();
// session_unset();
include("connection.php");
// siginup
if(isset($_POST["signUp"])){
    $userName = $_POST["uname"];
    $userEmail = $_POST["uemail"];
    $userPassword = $_POST["upassword"];
    $query = $pdo -> prepare("insert into users (name,email,password) values (:pn,:pe,:pp)");
    $query -> bindParam("pn",$userName);
      $query -> bindParam("pe",$userEmail);
        $query -> bindParam("pp",$userPassword);
        $query -> execute();
        echo "<script>
        alert('user sign up their account successfully');
        location.assign('signin.php');
        </script>";
}
// sign in 
if(isset($_POST["signIn"])){
 $userEmail = $_POST["uemail"];
$userPassword = $_POST["upassword"];
    $query = $pdo -> prepare("select * from users where email=:pe && password=:pp");
    $query -> bindParam("pe",$userEmail);
    $query -> bindParam("pp",$userPassword);
    $query -> execute();
  $row = $query -> fetch(PDO::FETCH_ASSOC);
  if($row){
    $_SESSION['userName']= $row['name'];
       $_SESSION['userEmail']= $row['email'];
          $_SESSION['userRole']= $row['role'];
          echo "<script>alert('login succsessfully');
          location.assign('index.php');
          </script>";
  }
}
// add category
if(isset($_POST["addCategory"])){
$catName = $_POST["catName"];
 $catImageName = $_FILES['catImage']['name'];
 $catTmpName= $_FILES['catImage']['tmp_name'];
 $extension = pathinfo($catImageName,PATHINFO_EXTENSION);
 $designation = "img/category/".$catImageName;
 if($extension=="jpg" || $extension== "png" || $extension=="jpeg" || $extension =="webp"){
  if(move_uploaded_file($catTmpName,$designation)){
    $query = $pdo->prepare('insert into category (cat_name,cat_image)values(:pn,:pi)');
    $query->bindParam("pn",$catName);
     $query->bindParam("pi",$catImageName);
     $query->execute();
    echo "<script>alert('category added successfully')</script>";
  }
}
}

// Update category
if(isset($_POST["updateCategory"])){
  $id= $_POST["id"];
$catName = $_POST["catName"];
 $catImageName = $_FILES['catImage']['name'];
 if(!empty($catImageName)){
  $catTmpName= $_FILES['catImage']['tmp_name'];
 $extension = pathinfo($catImageName,PATHINFO_EXTENSION);
 $designation = "img/category/".$catImageName;
 if($extension=="jpg" || $extension== "png" || $extension=="jpeg" || $extension =="webp"){
  if(move_uploaded_file($catTmpName,$designation)){
    $query = $pdo->prepare('update category set cat_name=:pn,cat_image=:pi where id=:pid');
    $query->bindParam("pn",$catName);
     $query->bindParam("pi",$catImageName);
     $query->bindParam("pid",$id);
     $query->execute();
    echo "<script>alert('category added with image successfully');
    location.assign('viewcategory.php')
    </script>";
  }
}
 }else{
  $query = $pdo->prepare('update category set cat_name=:pn where id=:pid');
    $query->bindParam("pn",$catName);
     $query->bindParam("pid",$id);
     $query->execute();
    echo "<script>alert('category added without image successfully');
    location.assign('viewcategory.php')</script>";
 }
 
}
// add products
if(isset($_POST['addProduct'])){
  $proName = $_POST["proName"];
    $proPrice = $_POST["proPrice"];
      $proQuantity = $_POST["proQuantity"];
        $ProCatId = $_POST["ProCatId"];
 $proImageName = $_FILES['proImage']['name'];
 $proTmpName= $_FILES['proImage']['tmp_name'];
 $extension = pathinfo($proImageName,PATHINFO_EXTENSION);
 $designation = "img/product/".$proImageName;
 if($extension=="jpg" || $extension== "png" || $extension=="jpeg" || $extension =="webp"){
  if(move_uploaded_file($proTmpName,$designation)){
    $query = $pdo->prepare('insert into products (product_name,product_price,product_quantity,product_image,category_type)values(:pn,:pp,:pq,:pi,:pc)');
    $query->bindParam("pn",$proName);
    $query->bindParam("pp",$proPrice);
    $query->bindParam("pq",$proQuantity);
     $query->bindParam("pi",$proImageName);
     $query->bindParam("pc",$ProCatId);
     $query->execute();
    echo "<script>alert('product added successfully')</script>";
  }
}
}
?>