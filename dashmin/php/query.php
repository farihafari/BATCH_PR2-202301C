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
// delete category 
if(isset($_GET['deleteCat'])){
  $deletId= $_GET['deleteCat'];
  $query = $pdo ->prepare("delete from category where id =:did");
  $query->bindParam("did",$deletId);
  $query->execute();
   echo "<script>alert('Delete category  successfully');
    location.assign('viewcategory.php')</script>";
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
// update product
if(isset($_POST['updateProduct'])){
 $pId=$_POST['proId'];
 $proName = $_POST["proName"];
    $proPrice = $_POST["proPrice"];
      $proQuantity = $_POST["proQuantity"];
        $ProCatId = $_POST["ProCatId"];
       
 $proImageName = $_FILES['proImage']['name'];
  if(!empty($proImageName)){
    

 $proTmpName= $_FILES['proImage']['tmp_name'];
 $extension = pathinfo($proImageName,PATHINFO_EXTENSION);
 $designation = "img/product/".$proImageName;
 if($extension=="jpg" || $extension== "png" || $extension=="jpeg" || $extension =="webp"){
  if(move_uploaded_file($proTmpName,$designation)){
    $query = $pdo->prepare('update products set product_name=:pn,product_price =:pp , product_quantity = :pq, product_image =:pi,category_type =:pc where product_id=:prid');
     $query->bindParam("prid",$pId);
    $query->bindParam("pn",$proName);
    $query->bindParam("pp",$proPrice);
    $query->bindParam("pq",$proQuantity);
     $query->bindParam("pi",$proImageName);
     $query->bindParam("pc",$ProCatId);
     $query->execute();
    echo "<script>alert('update product with image successfully');
    location.assign('viewproduct.php')
    </script>";
  }
}
  }else{
     $query = $pdo->prepare('update products set product_name=:pn,product_price =:pp , product_quantity = :pq,category_type =:pc where product_id=:prid');
     $query->bindParam("prid",$pId);
    $query->bindParam("pn",$proName);
    $query->bindParam("pp",$proPrice);
    $query->bindParam("pq",$proQuantity);
     $query->bindParam("pc",$ProCatId);
     $query->execute();
    echo "<script>alert('update product without image successfully');
    location.assign('viewproduct.php')
    </script>";
  }
}
// delete products
if(isset($_GET['deletePro'])){
  $deletPro = $_GET['deletePro'];
  $query = $pdo->prepare("delete from products where product_id =:pid");
  $query->bindParam("pid",$deletPro);
  $query->execute();
  echo "<script>alert('delete product successfully');
  location.assign('viewproduct.php')
  </script>";
}
// download data in excel format

if (isset($_POST['data'])) {

    $data = json_decode($_POST['data'], true);

 // Get start and end dates from the form
 $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : null;
 $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : null;
  // for getting data from user
if($start_date &&  $end_date ){
  $query = $pdo->prepare("select * from orders where mydate BETWEEN :startDate AND :endDate");
  $query->bindParam("startDate",$start_date);
  $query->bindParam("endDate",$end_date);
  $query ->execute();
  
  $data = $query->fetchAll(PDO::FETCH_ASSOC);
  if($data){
 // Function to convert array to CSV
 function convertToCSV($data) {
   
  $output = fopen('php://output', 'w');
// Output CSV header
if (!empty($data)) {
  fputcsv($output, array_keys($data[0]));
}
  foreach ($data as $row) {
      fputcsv($output, $row);
  }

  fclose($output);
}

// Output the CSV file
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="user_details.csv"');

convertToCSV($data);
exit();
  }
  }else{
    
    // Function to convert array to CSV
    function convertToCSV($data) {
   
      $output = fopen('php://output', 'w');
// Output CSV header
fputcsv($output, array_keys($data[0]));
      foreach ($data as $row) {
          fputcsv($output, $row);
      }

      fclose($output);
  }

  // Output the CSV file
  header('Content-Type: text/csv');
  header('Content-Disposition: attachment; filename="user_details.csv"');
  
  convertToCSV($data);
  exit();
}
 
 
}


?>