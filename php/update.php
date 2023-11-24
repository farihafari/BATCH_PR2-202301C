<?php
include("header.php") ;
include("connection.php") ;
?>
<?php
if(isset($_GET['sid'])){
    $sid =$_GET['sid'];
    $query= $pdo->prepare('select * from marksheet where id=:pid');
    $query->bindParam('pid',$sid);
    $query->execute();
    $row=$query->fetch(PDO::FETCH_ASSOC);
    ?>
<div class="container">
    <h1 class="text-center text-capitalize text-info">marksheet form</h1>
    <form action="" method="post">
        <input type="hidden" name="uid" id="" value="<?php echo $row['id']?>">
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="uname" value="<?php echo $row['std_name']?>">

        </div>
        <div class="mb-3">
            <label for="" class="form-label">english</label>
            <input type="text" class="form-control" name="english" value="<?php echo $row['english']?>">

        </div>
        <div class="mb-3">
            <label for="" class="form-label">urdu</label>
            <input type="text" class="form-control" name="urdu" value="<?php echo $row['urdu']?>">

        </div>
        <div class="mb-3">
            <label for="" class="form-label">physics</label>
            <input type="text" class="form-control" name="physics" value="<?php echo $row['physics']?>">

        </div>
        <div class="mb-3">
            <label for="" class="form-label">chemistry</label>
            <input type="text" class="form-control" name="chemistry" value="<?php echo $row['chemistry']?>">

        </div>
        <div class="mb-3">
            <label for="" class="form-label">maths</label>
            <input type="text" class="form-control" name="maths" value="<?php echo $row['maths']?>">

        </div>
        <button type="submit" name="marksheet" class="btn btn-primary">update</button>
    </form>
</div>
<?php

}
if(isset($_POST['marksheet'])){
    $uid = $_POST['uid'];
 $name = $_POST["uname"];
    $english = $_POST["english"];
    $urdu = $_POST["urdu"];
    $maths = $_POST["maths"];
    $physics= $_POST["physics"];
    $chemistry = $_POST["chemistry"];
    $total=500;
    $obtained= $english + $urdu + $maths + $physics + $chemistry;
    $percentage = ($obtained/$total)*100;
    $grad;
    $remarks;
    if($percentage>90 && $percentage<= 100) {
   $grad="A+1";
   $remarks= "EXCELLENT";
}
else if ($percentage>80 && $percentage<= 90){
    $grad="A+";
   $remarks= "VERY GOOD";
}
else if ($percentage> 70 && $percentage<= 80){
    $grad="A";
   $remarks= "GOOD";
}
else if ($percentage> 60&& $percentage<= 70){
$grad="B";
   $remarks= "BETTER";
}
else if ($percentage> 50&& $percentage<= 60){
$grad="C";
   $remarks= "KEEP IT UP";
}
else if ( $percentage<= 50){
$grad="FAIL";
   $remarks= "NEED TO WORK HARD";
}
$query= $pdo->prepare("update marksheet set std_name=:pn,english=:pe,urdu=:pu,maths=:pm,physics=:pp,chemistry=:pc,obtained=:po,percentage=:pper,grad=:pg,remarks=:pr where id =:pid");
$query->bindParam("pid",$uid);
$query->bindParam("pn",$name);
$query->bindParam("pe",$english);
$query->bindParam("pu",$urdu);
$query->bindParam("pm",$maths);
$query->bindParam("pp",$physics);
$query->bindParam("pc",$chemistry);
$query->bindParam("po",$obtained);
$query->bindParam("pper",$percentage);
$query->bindParam("pg",$grad);
$query->bindParam("pr",$remarks);
$query->execute();
echo "<script>alert('data updated successfully');
location.assign('view.php');
</script>";
}
   ?>
<?php

include("footer.php") ;
?>