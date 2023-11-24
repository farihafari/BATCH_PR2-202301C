<?php
include("header.php") ;
include("connection.php") ;
?>

<div class="container">
    <h1 class="text-center text-capitalize text-info">marksheet form</h1>
    <form action="" method="post">
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="uname" id="" aria-describedby="helpId" placeholder="">

        </div>
        <div class="mb-3">
            <label for="" class="form-label">english</label>
            <input type="text" class="form-control" name="english" id="" aria-describedby="helpId" placeholder="">

        </div>
        <div class="mb-3">
            <label for="" class="form-label">urdu</label>
            <input type="text" class="form-control" name="urdu" id="" aria-describedby="helpId" placeholder="">

        </div>
        <div class="mb-3">
            <label for="" class="form-label">physics</label>
            <input type="text" class="form-control" name="physics" id="" aria-describedby="helpId" placeholder="">

        </div>
        <div class="mb-3">
            <label for="" class="form-label">chemistry</label>
            <input type="text" class="form-control" name="chemistry" id="" aria-describedby="helpId" placeholder="">

        </div>
        <div class="mb-3">
            <label for="" class="form-label">maths</label>
            <input type="text" class="form-control" name="maths" id="" aria-describedby="helpId" placeholder="">

        </div>
        <button type="submit" name="marksheet" class="btn btn-primary">Button</button>
    </form>
</div>
<?php
$count = 0;
if(isset($_POST["marksheet"])) {
    $count++;
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
$query = $pdo->prepare("insert into marksheet (std_name,urdu,english,maths,physics,chemistry,obtained,percentage,grad,remarks) values(:pn,:pu,:pe,:pm,:pp,:pc,:po,:pper,:pg,:pr)");
$query->bindParam("pn",$name);
$query->bindParam("pu",$urdu);
$query->bindParam("pe",$english);
$query->bindParam("pm",$maths);
$query->bindParam("pp",$physics);
$query->bindParam("pc",$chemistry);
$query->bindParam("po",$obtained);
$query->bindParam("pper",$percentage);
$query->bindParam("pg",$grad);
$query->bindParam("pr",$remarks);
$query->execute();
echo "<script>alert('data has been insert successfully')</script>";

}
include("footer.php") ;
?>