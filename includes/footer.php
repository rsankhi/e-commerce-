<div id="footer"><!---Footer start --->
    <div class="container"><!---Container start --->
        <div class="row"><!---Row start--->
            <div class="col-md-3 col-sm-6"><!---Col-md-3 sm-6 start --->
                <h4>Pages</h4>
                <ul>
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="shop.php">Shop Now </a></li>
                    <li><a href="checkout.php">My Account</a></li>
                </ul>
                <hr>
                <h4>User Section</h4>
                <ul>
					<?php if(isset($_SESSION['customer_email'])){
							echo"<li><a href='logout.php' >Logout</a></li>";
					}
					else{ 
						echo"<li><a href='checkout.php'>Login</a></li>";
					}
					
					?>
                    
                    <li><a href="customber_registration.php">Register</a></li>
                </ul>
                <hr class="hidden-md hidden-lg hidden-sm">
            </div><!---Col-md-3 sm-6 End --->
            <div class="col-md-3 col-sm-6"><!---Col-md-3 sm-6 start --->
                <h4>Top Product Categories</h4>
                <ul>
                    <?php
                    $get_p_cats="select * from product_categories";
                    $run_p_cats=mysqli_query($con,$get_p_cats);
                    while($row_p_cat=mysqli_fetch_array($run_p_cats)){
                        $p_cat_id=$row_p_cat['p_cat_id'];
                        $p_cat_title=$row_p_cat['p_cat_title'];
                        echo"<li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>";
                    }
                    
                        
                    
                    ?>
                </ul>
                <hr class="hidden-sm hidden-lg hidden-md">
            </div><!---Col-md-3 sm-6 End --->
            <div class="col-md-3 col-ms-6"><!---Col-md-3 sm-6 Start--->
                <h4>Where To find Us</h4>
                <p>
                    <strong>My-Ecom.com</strong>
                    <br>jodhpur 
                    <br>Krishi-mandi
                    <br>jodhpur,Rajasthan
                    <br>info@gmail.com
                </p>
                <a href="contact.php">GoTo Contact us Page</a>
                <hr class="hidden-sm hidden-lg hidden-md">
            </div><!---Col-md-3 sm-6 End --->
            <div class="col-md-3 col-ms-6"><!---Col-md-3 sm-6 Start--->
                <h4>Get the News </h4>
                <p class="text-muted">
                    Subcribe here for getting new product ditails of your products.
                </p>
				<h4> Subcribe News Latter : </h4>
                <form action="#subcribe_email" method="post" id="subcribe_email">
                    <div class="input-group">
                        <input type="email" name="email" class="form-control" placeholder="Email : example@gmail.com">
                        <span class="input-group-btn">
                            <input type="submit" name="subcribe_email" class="btn btn-default" value="Subcribe">
                        </span>
                    </div>
                </form>
				<?php
				  if(isset($_POST['subcribe_email'])){
					 $user_email=$_POST['email'];
					  
					  $check_alredy_exist="select * from subcribe_email where email ='$user_email'";
					  $run_check=mysqli_query($con,$check_alredy_exist);
					  $num_rows=mysqli_num_rows($run_check);
					  if($num_rows>0){
						  ?><script>alert('❌❌ Alredy subcribed News Feed By This Email.', '_self')</script> <?php
					  }
					  else{
						  $insert="insert into subcribe_email(email,time) values('$user_email',NOW())";
						  $run_insert=mysqli_query($con,$insert);
						  if($run_insert==true){
							  ?><script>alert('✔ Thanks For Subcribe Our News Feed .', '_self')</script> <?php
						  }
					  }
				  }
				?>
                <hr>
                <h4>Stay In Touch</h4>
                <p class="social  ">
                   <a href="#"> <i class="fa fa-facebook"></i></a>
                   <a href="#"> <i class="fa fa-twitter"></i></a>
                   <a href="#"> <i class="fa fa-instagram"></i></a>
                   <a href="#"> <i class="fa fa-google-plus"></i></a>
                   <a href="#"> <i class="fa fa-envelope"></i></a>
                </p>
            </div><!---Col-md-3 sm-6 End --->
        </div><!---Row End-->
    </div><!---Container End--->
</div><!---Footer End --->
<!---CoppyRights Section Start  ---->
<div id="copyright">
    <div class="container">
        <div class="col-md-4">
            <p class="pull-left">
                &copy; 2020 Rameshwar Sankhi
            </p>
        </div>
        <div class="col-md-4">
			<p class="pull-center">
              
				Designed &amp; Devloped By : <a href="#">Rameshwar Sankhi<br>
				<i class="fa fa-phone"></i> +918502926163, +918209538083
				</a>
            </p>
            
		</div>
        <div class="col-md-4">
            <p class="pull-right">
                Tamplate By : <a href="#">My-Ecom.com</a>
				
				
            </p>
        </div>
    </div>
</div><!---CoppyRights Section End  ---->