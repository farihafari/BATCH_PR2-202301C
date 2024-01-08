<?php
include("php/query.php");
 $query = $pdo ->query("SELECT `products`.*, `category`.`cat_name`
 FROM `products` 
inner JOIN `category` ON `products`.`category_type` = `category`.`id`");

          $row = $query ->fetchAll(PDO::FETCH_ASSOC);
     foreach($row as $proAll){
      ?>

          <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $proAll['cat_name']?>">
              <!-- Block2 -->
              <div class="block2">
                  <div class="block2-pic hov-img0">
                      <img src="<?php echo $imageProAdress.$proAll['product_image']?>" alt="IMG-PRODUCT">


                  </div>

                  <div class="block2-txt flex-w flex-t p-t-14">
                      <div class="block2-txt-child1 flex-col-l ">
                          <a href="product-detail.php?pId=<?php echo $proAll['product_id']?>"
                              class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                              <?php echo $proAll['product_name']?>
                          </a>

                          <span class="stext-105 cl3">
                              PKR: <?php echo $proAll['product_price']?>
                          </span>
                      </div>

                      <div class="block2-txt-child2 flex-r p-t-3">
                          <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                              <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png"
                                  alt="ICON">
                              <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png"
                                  alt="ICON">
                          </a>
                      </div>
                  </div>
              </div>
          </div>

          <?php } ?>