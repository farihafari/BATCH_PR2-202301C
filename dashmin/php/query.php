<?php
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
    echo "<script>alert('login successfully');
    location.assign('index.php');
    </script>";
}
?>