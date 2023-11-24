<?php
session_start();
include("../header.php");
include("../connection.php");
if(isset($_SESSION["userEmail"])){
    ?>
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <h1 class="text-center text-capitalize text-info">my profile </h1>
            <h2 class="text-center text-capitalize text-success mt-3"> dear <?php echo $_SESSION['userName']?> this is
                your
                profile
                page! did you want to edit your?
            </h2>
        </div>
        <div class="col-lg-9">
            <h1 class="text-center text-capitalize text-info">update profile </h1>
            <form action="" method="post">

                <div class="mb-3">
                    <label for="" class="form-label">name</label>
                    <input type="text" class="form-control" name="uname" value="<?php echo $_SESSION['userName']?>">

                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['userEmail']?>">


                </div>
                <div class="mb-3">
                    <label for="" class="form-label">password</label>
                    <input type="text" class="form-control" name="password"
                        value="<?php echo $_SESSION['userPassword']?>">

                </div>
                <button type="submit" name="updatProfile" class="btn btn-primary">sign up</button>
            </form>
        </div>
    </div>
</div>
<a href="logout.php" class="btn btn-danger ms-3"> logout</a>


<?php
}else{
    echo "<script>location.assign('login.php')</script>";
}
if(isset($_POST['updatProfile'])){
    $id = $_SESSION['userId'];
 $name= $_POST['uname'];
     $email= $_POST['email'];
      $password= $_POST['password'];
      $query = $pdo->prepare('update users set name=:pn,email=:pe,password=:pp where id= :pid ');
      $query->bindParam("pid",$id);
      $query->bindParam("pn",$name);
       $query->bindParam("pe",$email);
        $query->bindParam("pp",$password);
        $query->execute();
          echo "<script>alert('updated data successfully');
         location.assign('login.php');
        </script>";
 
       
    
}
?>