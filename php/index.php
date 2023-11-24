<?php
// echo "<h1>this is text</h1>";
$a = "2";
$b = 3;
?>
<h1><?php
echo "this sum of two varibales ".$a+$b;
?> </h1>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <h2>table of two</h2>
    <div class="container">
        <div class="table-responsive">
            <table class="table">

                <tbody>
                    <?php
                    for( $i = 1; $i <=10; $i++ ) {
                    if($i %2==0){
                    ?>
                    <tr class="table-primary">
                        <td scope="row">2</td>
                        <td>X</td>
                        <td>
                            <?php
                        echo $i;
                        ?>
                        </td>
                        <td scope="row">=</td>
                        <td><?php echo $i*2?></td>

                    </tr>
                    <?php
                    }else{
                        ?>
                    <tr class="table-secondary">
                        <td scope="row">2</td>
                        <td>X</td>
                        <td>
                            <?php
                        echo $i;
                        ?>
                        </td>
                        <td scope="row">=</td>
                        <td><?php echo $i*2?></td>

                    </tr>
                    <?php
                    }
                    ?>

                    <?php
                    }
                    ?>


                </tbody>
            </table>
        </div>



    </div>
    <div class="container mt-5">

        <div class="table-responsive">
            <table class="table table-primary">

                <tbody>
                    <?php
                    for( $i = 1; $i <=10; $i++ ){
                        $r=$i*2;
                    echo "<tr>
                        <td >2</td>
                        <td>X</td>
                        <td>".
                           $i."
                    </td>
                    <td>=</td>
                    <td>".$r."</td></tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>

    </div>
    <div class="container">


        <?php
        for( $i = 0; $i <= 100; $i++ ){
            if(($i==2 || $i %2 !=0)&&($i==3 || $i%3 !=0) &&($i== 5|| $i%5 != 0)){
                ?>
        <p>
            <?php
            echo $i;
            ?></p>
        <?php
            }
                }        ?>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>