<?php

include('header.php');
?>
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">

        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4 text-capitalize">add category</h6>
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">category name</label>
                    <input type="text" class="form-control" name="catName">
                    <div id="emailHelp" class="form-text">category name should be unique
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">category image</label>
                    <input type="file" class="form-control" name="catImage">
                </div>

                <button type="submit" class="btn btn-primary" name="addCategory">Add Category</button>
            </form>
        </div>

    </div>
</div>

<!-- Blank End -->
<?php

include('footer.php');
?>