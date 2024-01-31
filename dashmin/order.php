<?php
include('header.php')
?>
<div class="container mt-3">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Basic Table</h6>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Order Id</th>
                    <th scope="col">Product Id</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">User Id</th>
                    <th scope="col">user Address</th>
                </tr>
            </thead>
            <tbody>
            <?php
$query = $pdo->query("select * from orders");
$row = $query->fetchAll(PDO::FETCH_ASSOC);
foreach($row as  $value) {
    ?>
                <tr>
                    <td scope="row"><?php echo $value['orderId']?></td>
                    <td scope="row"><?php echo $value['productId']?></td>
                    <td><?php echo $value['productName']?></td>
                    <td><?php echo $value['productQuantity']?></td>
                    <td><?php echo $value['productPrice']?></td>
                    <td><?php echo $value['userId']?></td>
                    <td><?php echo $value['userAddress']?></td>
                </tr>


                <?php
}
?>

            </tbody>
        </table>
         <!-- Add a button for Excel download -->
         <form method="post" action="order.php">
         <label for="start_date">Start Date:</label>
    <input type="date" id="start_date" name="start_date">

    <label for="end_date">End Date:</label>
    <input type="date" id="end_date" name="end_date">
            <input type="hidden" name="data" value="<?php echo htmlspecialchars(json_encode($row)); ?>">
            <button type="submit" class="btn btn-primary">Download Excel</button>
        </form>
    </div>
</div>

<?php
include("footer.php")
?>