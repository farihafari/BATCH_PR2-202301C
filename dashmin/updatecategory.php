<?php

include('header.php');
if(isset($_GET['catId'])){

    $catId = $_GET['catId'];
    $query = $pdo ->prepare('select * from category where id = :cid');
    $query -> bindParam("cid",$catId);
    $query -> execute();
    $row = $query -> fetch(PDO::FETCH_ASSOC);
    
}
?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">

        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4 text-capitalize">Update category</h6>
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="hidden" name="id" value="<?php echo $row['id']?>">
                    <label for="exampleInputEmail1" class="form-label">category name</label>
                    <input type="text" class="form-control" name="catName" value="<?php echo $row['cat_name']?>">
                    <div id="emailHelp" class="form-text">category name should be unique
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">category image</label>
                    <input type="file" class="form-control" name="catImage">
                    <img src="img/category/<?php echo $row ['cat_image']?>" width="100" alt="">
                </div>

                <button type="submit" class="btn btn-primary" name="updateCategory">Update Category</button>
            </form>
        </div>

    </div>
</div>

<!-- Blank End -->
<?php

include('footer.php');
?>