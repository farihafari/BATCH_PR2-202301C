<?php
include("header.php");
?>

<div class="table-responsive">
    <table class="table table-primary">

        <tbody>
            <?php
                   $arr= [
        ["ali","cpism","9 to 11",8500],
        ["aliyan","cpism","9 to 11",8500],
        ["alisha","cpism","9 to 11",8500],
        ["alishba","cpism","9 to 11",8500]
    ];
    for($i= 0;$i<count($arr);$i++){
?>
            <tr class="">
                <?php
                    for($j=0;$j<count($arr[$i]);$j++){

                        ?>
                <td scope="row">
                    <?php echo $arr[$i][$j]?></td>
                <?php
                    }
                    ?>


            </tr>

            <?php
        
    }
                ?>

        </tbody>
    </table>
</div>



<?php
include("footer.php");
?>