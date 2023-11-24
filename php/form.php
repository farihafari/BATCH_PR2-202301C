<?php
include("header.php");
?>
<div class="container">
    <form action="" method="post">
        <div class="mb-3">
            <label for="" class="form-label">name</label>
            <input type="text" class="form-control" name="uname" id="" aria-describedby="emailHelpId">
            <small id="emailHelpId" class="form-text text-muted">Help text</small>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">course</label>
            <input type="text" class="form-control" name="course" id="" aria-describedby="emailHelpId">
            <small id="emailHelpId" class="form-text text-muted">Help text</small>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">slot</label>
            <input type="text" class="form-control" name="slot" id="" aria-describedby="emailHelpId">
            <small id="emailHelpId" class="form-text text-muted">Help text</small>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">fee</label>
            <input type="number" class="form-control" name="fee" id="" aria-describedby="emailHelpId">
            <small id="emailHelpId" class="form-text text-muted">Help text</small>
        </div>
        <button type="submit" name="click" class="btn btn-primary">Button</button>
    </form>

</div>
<?php
    if(isset($_POST['click'])){
        $name = $_POST['uname'];
         $course = $_POST['course'];
          $slot = $_POST['slot'];
           $fee = $_POST['fee'];
    ?>
<div class="container">
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">Course</th>
                    <th scope="col">slot</th>
                    <th scope="col">fee</th>
                </tr>
            </thead>
            <tbody>
                <tr class="">
                    <td scope="row"><?php echo $name ?></td>
                    <td><?php echo $course?></td>
                    <td><?php echo $slot?></td>
                    <td><?php echo $fee?></td>
                </tr>

            </tbody>
        </table>
    </div>

</div>
<?php
    }
    
include('footer.php');
    ?>