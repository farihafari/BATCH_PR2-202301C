<?php
include("header.php");
?>

<?php
    $arr = [
      [  "name"=>"ali",
        "course"=> "cpism",
        "slot"=> "9 to 11",
        "fee"=> 8500],
        [
          "name"=>"aliyan",
        "course"=> "cpism",
        "slot"=> "9 to 11",
        "fee"=> 8500],
          [
          "name"=>"aliyan",
        "course"=> "cpism",
        "slot"=> "9 to 11",
        "fee"=> 8500]
        
    ];
    foreach ($arr as $value) {

          echo $value['name']."<br>" ;
           echo $value['course']."<br>" ;
    }
  include("footer.php");
    ?>