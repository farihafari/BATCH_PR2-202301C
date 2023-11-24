<?php
include("header.php");
?>
<div class="container">
    <form action="" method="post">
        <div class="mb-3">
            <label for="" class="form-label">country code</label>
            <input type="text" class="form-control" name="ccode" id="" aria-describedby="emailHelpId"
                placeholder="abc@mail.com">

        </div>
        <button type="submit" name="code" class="btn btn-primary">Button</button>
    </form>
</div>
<?php
// $a="ali";
// $b= "ali";
// $c=strcmp($a, $b);
// if($c== 0){
//     echo "<script>alert('true')</script>";
// }else{
//     echo "<script>alert('false')</script>";
// }
if(isset($_POST["code"])){
    $code = $_POST["ccode"];
    $pak = "+92";
    $check=strcmp($code, $pak);
    if($check== 0){
        echo "<script>alert('true')</script>";
      }
       else{
         echo "<script>alert('true')</script>"; 
       }
       } ?>
<?php
include("footer.php");
?>