<?php
session_start();

include("../header.php");
include("../connection.php");
?>
<div class="container">
    <h1 class="text-center text-info">sign In</h1>
    <form action="" method="post">
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="email" class="form-control" name="email">


        </div>
        <div class="mb-3">
            <label for="" class="form-label">password</label>
            <input type="password" class="form-control" name="password">

        </div>
        <button type="submit" name="signIn" class="btn btn-primary">sign up</button>
    </form>
</div>
<?php
if(isset($_POST["signIn"])) {
    $email = $_POST['email'];
     $password = $_POST['password'];
     $query = $pdo->prepare('select * from users where email = :pe && password = :pp');
     $query ->bindParam("pe",$email);
     $query->bindParam("pp",$password);
     $query->execute();
      $row = $query->fetch(PDO::FETCH_ASSOC);
      if($row){
        $_SESSION['userId'] = $row['id'];
$_SESSION['userEmail'] = $row['email'];
$_SESSION['userName'] = $row['name'];
$_SESSION['userPassword'] = $row['password'];
echo "<script>alert('login successfully');
location.assign('profile.php');
</script>";
}
}
?>

<?php
include("../footer.php");
?>