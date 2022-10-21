<!--- Welcome-top-bar ---> 
     <div  id="top" >
         <!--- BOOTSTRAP CONTAINER-->
        <div class="container-fluid">
            <!--1st col-md-6 start ---> <!-- top bar welcome guest  message  and btn ---->
            <div class="col-md-8 offer "> 
                <a href="#" style="max-width:300px;overflow:hidden" class="btn btn-danger btn-sm"><?php
                    if(!isset($_SESSION['customer_email'])){
                        echo"Welcome Guest";
                    }
                    else{
                        $welcome_user_email=$_SESSION['customer_email'];
                        echo"Welcome : $welcome_user_email ";
                    }
                    ?>
                    </a>
                <a href="#" class="hidden-xs">Shopping card price : INR <?php totalPrice();  ?> ,Total item <?php cart_item(); ?> </a>
            </div><!--- 1st col-md-6-- end---->
            <!---- 2nd col-md-6 start-->
            <div class="col-md-4"> <!-- top bar menu -->
                <ul class="menu">
                    <li>  <?php
                        if(!isset($_SESSION['customer_email'])){
                                    echo"<a href='../customber_registration.php'>Register |</a>"  ;
                        }
                        else{ 
                            echo"<a href='../customber_registration.php'>Affilate |</a>" ;
                        }
                        ?>
                        
                       </li>
                    <li><?php
                        if(!isset($_SESSION['customer_email'])){
                                    echo"<a href='../checkout.php'>My Account</a>"  ;
                        }
                        else{ 
                           echo"<a href='my_account.php?my_order'>My Account</a>" ;
                        }
                        ?></li>
                    <li><a href="../cart.php">  GoTo Card | </a></li>
                    <li><?php
                        if(!isset($_SESSION['customer_email'])){
                                    echo"<a href='../checkout.php'>Login </a>"  ;
                        }
                        else{
                            echo"<a href='logout.php'>Logout</a>" ;
                        }
                        ?></li>
                </ul>
            </div><!---- col-md-6 End-->
        </div> 
     </div><!-- End Welcome Top  bar  ---->