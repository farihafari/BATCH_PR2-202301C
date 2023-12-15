<?php

include('header.php');
if(isset($_GET['pId'])){
    $pid = $_GET['pId'];
    $query = $pdo ->prepare("SELECT * from products where product_id = :pid");
    $query->bindParam("pid",$pid);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    

?>
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">

        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4 text-capitalize">Update product</h6>
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="proId" id="" value="<?php echo $row['product_id']?>">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">product name</label>
                    <input type="text" class="form-control" name="proName" value="<?php echo $row['product_name']?>">
                    <div id="emailHelp" class="form-text">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">product price</label>
                    <input type="text" class="form-control" name="proPrice" value="<?php echo $row['product_price']?>">
                    <div id="emailHelp" class="form-text">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">product quantity</label>
                    <input type="text" class="form-control" name="proQuantity"
                        value="<?php echo $row['product_quantity']?>">
                    <div id="emailHelp" class="form-text">category name should be unique
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">product image</label>
                    <input type="file" class="form-control" name="proImage">
                    <img src="img/product/<?php echo $row['product_image']?>" width="80" alt="">
                </div>
                <div class=" mb-3">
                    <label for="floatingSelect">categories</label>
                    <select class="form-select" id="floatingSelect" name="ProCatId"
                        aria-label="Floating label select example">
                        <option hidden>select category</option>

                        <?php
                        $query = $pdo->query("select * from category");
                        $cat = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach($cat as $catItem){
                            ?>
                        <option value="<?php echo $catItem['id']?>"
                            <?=$row['category_type']==$catItem['id']? 'selected':'' ?>>
                            <?php echo $catItem['cat_name']?>
                        </option>

                        <?php
                        }
                        ?>


                    </select>
                </div>

                <button type="submit" class="btn btn-primary" name="updateProduct">Update Product</button>
            </form>
        </div>

    </div>
</div>

<!-- Blank End -->
<?php
}
include('footer.php');
?>