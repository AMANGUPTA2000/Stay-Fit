<?php include 'includes/header.php'; ?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Contact Us</h2>
                        <div class="bt-option">
                            <a href="./index.php">Home</a>
                            <span>Contact us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <?php
                if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
                {
                echo '<h2 class="bg-success text-white"> '.$_SESSION['status'].' </h2>';
                unset($_SESSION['status']);
                }
            ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title contact-title">
                        <span>Contact Us</span>
                        <h2>GET IN TOUCH</h2>
                    </div>
                    <div class="contact-widget">
                        <div class="cw-text">
                            <i class="fa fa-map-marker"></i>
                            <p>SVIT Vasad, Rajupura Village, Vasad, <br> Anand, Gujarat 388306</p>
                        </div>
                        <div class="cw-text">
                            <i class="fa fa-mobile"></i>
                            <ul>
                                <li><a href="tel:8490074656" style="color:#fff">849-007-4656</a></li>
                                <li><a href="tel:9723964838" style="color:#fff">972-396-4838</a></li>
                            </ul>
                        </div>
                        <div class="cw-text email">
                            <i class="fa fa-envelope"></i>
                            <p><a href="mailto:info.stayfithealth@gmail.com" target="_blank" style="color:#fff">info.stayfithealth@gmail.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="leave-comment">
                        <form action="code.php" method="post" enctype="multipart/form-data">
                            <input type="text" placeholder="Name" name="name" required>
                            <input type="email" placeholder="Email" name="email" required>
                            <textarea placeholder="Comment" name="comment" required></textarea>
                            <button type="submit" name="subscribe-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3686.936876276107!2d73.07415971495772!3d22.469006285236176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fb55277d1e457%3A0xaf7e43a3d29561b!2sSardar%20Vallabhbhai%20Patel%20Institute%20of%20Technology!5e0!3m2!1sen!2sin!4v1642757437039!5m2!1sen!2sin"
                    height="550" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->


    <?php include 'includes/footer.php'; ?>