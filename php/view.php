<?php
include("header.php");
include("connection.php");

?>
<div class="container">
    <h1 class="text-capitalize text-primary mb-3 text-center">result sheet</h1>
    <div class="table-responsive">
        <table class="table table-primary text-center">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">urdu</th>
                    <th scope="col">english</th>
                    <th scope="col">maths</th>
                    <th scope="col">physics</th>
                    <th scope="col">chemistry</th>
                    <th scope="col">obatined</th>
                    <th scope="col">total</th>
                    <th scope="col">percentage</th>
                    <th scope="col">grade</th>
                    <th scope="col">remarks</th>
                    <th scope="col" colspan="2">action</th>
                </tr>
            </thead>
            <tbody>
                <?php
$query = $pdo->query("select * from marksheet");
$result = $query->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row) {
    ?>
                <tr class="">
                    <td scope="row"><?php echo $row['id']?></td>
                    <td scope="row"><?php echo $row['std_name']?></td>
                    <td scope="row"><?php echo $row['urdu']?></td>
                    <td scope="row"><?php echo $row['english']?></td>
                    <td scope="row"><?php echo $row['maths']?></td>
                    <td scope="row"><?php echo $row['physics']?></td>
                    <td scope="row"><?php echo $row['chemistry']?></td>
                    <td scope="row"><?php echo $row['obtained']?></td>
                    <td scope="row"><?php echo $row['total']?></td>
                    <td scope="row"><?php echo $row['percentage']?></td>
                    <td scope="row"><?php echo $row['grad']?></td>
                    <td scope="row"><?php echo $row['remarks']?></td>
                    <td scope="row"><a href="update.php?sid=<?php echo $row['id']?>" class="btn btn-success">Edit</a>
                    </td>
                    <td scope="row"><a href="?did=<?php echo $row['id']?>" class="btn btn-danger">Delete</a></td>

                </tr>

                <?php
            }
            if(isset($_GET['did'])){
                $id = $_GET['did'];
                $query = $pdo->prepare('delete from marksheet where id = :pid');
                $query->bindParam('pid',$id);
                $query->execute();
                echo "<script>alert('data has  been deleted ');
                location.assign('view.php');
                </script>";
                
            }
            ?>

            </tbody>
        </table>
    </div>
</div>
<?php
include("footer.php");
?>