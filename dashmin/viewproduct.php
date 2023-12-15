<?php
include("header.php");
?>
<div class="container mt-3">
    <h1>products</h1>
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">all products</h6>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col"> Name </th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Product Category</th>
                    <th scope="col" class="text-center" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = $pdo->query("SELECT `products`.*, `category`.`cat_name`
FROM `products` 
	INNER JOIN `category` ON `products`.`category_type` = `category`.`id`;");
    $row = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($row as $proAll){
        ?>
                <tr>
                    <td><?php echo $proAll['product_id']?></td>
                    <td><?php echo $proAll['product_name']?></td>
                    <td><img src="img/product/<?php echo $proAll['product_image']?>" width="80" alt=""></td>
                    <td><?php echo $proAll['product_price']?></td>
                    <td><?php echo $proAll['product_quantity']?></td>
                    <td><?php echo $proAll['cat_name']?></td>
                    <td><a href="updateproduct.php?pId=<?php echo $proAll['product_id']?>"
                            class="btn btn-primary">Edit</a></td>
                    <td><a href="" class="btn btn-primary">Delete</a></td>
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