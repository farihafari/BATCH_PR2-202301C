<?php

include('header.php');
?>
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">

        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4 text-capitalize">add product</h6>
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">product name</label>
                    <input type="text" class="form-control" name="proName">
                    <div id="emailHelp" class="form-text">category name should be unique
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">product price</label>
                    <input type="text" class="form-control" name="proPrice">
                    <div id="emailHelp" class="form-text">category name should be unique
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">product quantity</label>
                    <input type="text" class="form-control" name="proQuantity">
                    <div id="emailHelp" class="form-text">category name should be unique
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">product image</label>
                    <input type="file" class="form-control" name="proImage">
                </div>
                <div class="mb-3">
                    <label for="floatingSelect">categories</label>
                    <select class="form-select" id="floatingSelect" name="ProCatId"
                        aria-label="Floating label select example">
                        <option selected>select category</option>

                        <?php
                        $query = $pdo->query("select * from category");
                        $row = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach($row as $catItem){
                            ?>
                        <option value="<?php echo $catItem['id']?>"><?php echo $catItem['cat_name']?></option>

                        <?php
                        }
                        ?>


                    </select>
                </div>

                <button type="submit" class="btn btn-primary" name="addProduct">Add Product</button>
            </form>
        </div>

    </div>
</div>

<!-- Blank End -->
<?php

include('footer.php');
?>