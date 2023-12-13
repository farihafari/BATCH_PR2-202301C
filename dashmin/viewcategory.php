<?php
include("header.php");
?>
<div class="container mt-3">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Basic Table</h6>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Category name </th>
                    <th scope="col">Image</th>
                    <th scope="col" class="text-center" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
$query = $pdo->query("select * from category");
$row = $query->fetchAll(PDO::FETCH_ASSOC);
foreach($row as  $value) {
    ?>
                <tr>
                    <td scope="row"><?php echo $value['id']?></td>
                    <td><?php echo $value['cat_name']?></td>
                    <td><img src="img/category/<?php echo $value['cat_image']?>" width="100" alt=""></td>
                    <td>
                        <a href="updatecategory.php?catId=<?php echo $value['id']?>"
                            class="btn btn-secondary m-2">edit</a>
                    </td>
                    <td><a href="" class="btn btn-danger m-2">delete</a></td>
                </tr>


                <?php
}
?>

            </tbody>
        </table>
    </div>
</div>



<?php
include("footer.php");
?>