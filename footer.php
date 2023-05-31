<body class="main">
    <footer>

        <section class="content my-5">
            <div class="quick-links">
                <ul>
                    <h6 id="sub-title">MENU</h6> 
                    <li><a href="index.php"><i class="fa-solid fa-house me-2"></i>Home</a></li>
                    <li><a href="discover.php"><i class="fa-solid fa-magnifying-glass me-2"></i>Discover</a></li>
                    <li><a href="announcement.php"><i class="fa-solid fa-bullhorn me-2"></i>Announcements</i></a></li>
                    <li><a href="about.php"><i class="fa-solid fa-address-card me-2"></i>About</a></li>

                    <?php if(isset($_SESSION['user_id'])) {?>
                        <li><a href="logout.php"><i class="fa-solid fa-right-to-bracket me-2"></i>Logout</a></li>
                    <?php } else {?>
                        <li><a href="login.php"><i class="fa-solid fa-right-to-bracket me-2"></i>Login</a></li>
                    <?php }?>
                    <li><a href="signup.php"><i class="fa-solid fa-user-plus me-2"></i>Signup</a></li>
                </ul>
            </div>
            
            <div class="contact-info">
                <ul>
                    <h6 id="sub-title">CONTACT INFO</h6>    
                    <li><a href="#"><i class="fa-solid fa-envelope me-2"></i>Message us</a></li>
                    <li><span><i class="fa-solid fa-phone me-2"></i>+639123456789</span></li>
                </ul>
                
            </div>

            <div class="follow-us">
                <ul>
                <h6 id="sub-title">FOLLOW US</h6>    
                    <li><a href="https://www.facebook.com/www.trinitashomeforcontemplation.com.ph"><i class="fa-brands fa-square-facebook me-2"></i>Facebook</a></li>
                </ul>
            </div>

            <div class="address">
                <ul>
                    <h6 id="sub-title">ADDRESS</h6>
                    <span><i class="fa-solid fa-location-dot me-2"></i>Bonga, Bacacay, Albay, Philippines</span>    
                </ul>
                   
            </div>


            
        </section>

        <section>
            <p class="credits">&copy 2023 Trinitas</br> All rights reserved.</p>
        </section>

    </footer>
    <!-- Custom javascript style -->    
    <script src="style.js"></script>
</body>