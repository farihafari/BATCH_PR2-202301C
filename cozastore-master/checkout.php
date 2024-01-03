<?php include('header.php')?>
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
		Check Out
		</h2>
	</section>	
<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="">
			
					<form method="post">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Send Us A Message
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input  value="<?php echo $_SESSION['userName']?>" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="name" placeholder="Your Name">
							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
						</div>
                        <div class="bor8 m-b-20 how-pos4-parent">
							<input value="<?php echo $_SESSION['userEmail']?>" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" placeholder="Your Email Address">
							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
						</div>
                        <div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="address" placeholder="Your Address">
							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
						</div>
                        <div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="tel" name="number" placeholder="Your Number">
							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
						</div>
					
						<button type="submit" name="checkOut" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
						check Out
						</button>
					</form>
		<p>don't have anyone account! <a href="sigup.php">sign up</a></p>

			
			</div>
		</div>
	</section>	
	<?php include('footer.php')?>