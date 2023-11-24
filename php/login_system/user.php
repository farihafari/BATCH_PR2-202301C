<?php
include("../header.php");
include("../connection.php");
?>
<div class="container">
    <h1 class="text-center text-info">sign UP</h1>
    <form action="" method="post">

        <div class="mb-3">
            <label for="" class="form-label">name</label>
            <input type="text" class="form-control" name="uname">

        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="email" class="form-control" name="email">


        </div>
        <div class="mb-3">
            <label for="" class="form-label">password</label>
            <input type="password" class="form-control" name="password">

        </div>
        <button type="submit" name="signup" class="btn btn-primary">sign up</button>
    </form>
</div>
<?php
if(isset($_POST["signup"])){
    $name= $_POST['uname'];
     $email= $_POST['email'];
      $password= $_POST['password'];
      $query = $pdo->prepare('insert into users (name,email,password) values(:pn,:pe,:pp)');
      $query->bindParam("pn",$name);
       $query->bindParam("pe",$email);
        $query->bindParam("pp",$password);
        $query->execute();
        echo "<script>alert('data insert successfully in database');
        location.assign('login.php')
        </script>";
}
?>

<?php
include("../footer.php");
?>