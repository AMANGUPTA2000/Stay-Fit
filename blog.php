<?php 
include('includes/header.php');
include('firebase/includes/dbconfig.php');
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Our Blog</h2>
                        <div class="bt-option">
                            <a href="./index.php">Home</a>
                            <a href="#">More</a>
                            <span>Blog</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <a href="post-blog.php"  class="btn btn-outline-primary">Post your own Blog</a>
            </div>
            <br>
            <div class="row">
                
                <div class="col-lg-8 p-0">
                    <?php
                        $ref_table = 'blog';
                        $fetch = $database->getReference('blog')->getValue();
                        
                        if($fetch > 0){
                        foreach($fetch as $key => $row){
                            
                            
                    ?>
                    <div class="blog-item">
                        <div class="bi-pic">
                            <img src="<?php echo $row['image']; ?>" alt="">
                        </div>
                        <div class="bi-text">
                            <h5><a href="./blog-details.html"><?= $row['heading'] ?></a></h5>
                            <ul>
                                <li>by <?= $row['name'] ?></li>
                                <li><?= $row['date'] ?></li>
                            </ul>
                            <p><?= $row['content'] ?></p>
                        </div>
                    </div>
                    <?php
                    }
                    }
                    else{
                        echo "no record";
                    }
                    ?>
                    <div class="blog-pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">Next</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-8 p-0">
                    <div class="sidebar-option">
                        <div class="so-categories">
                            <h5 class="title">Categories</h5>
                            <ul>
                                <li><a href="#">Yoga <span>12</span></a></li>
                                <li><a href="#">Runing <span>32</span></a></li>
                                <li><a href="#">Weightloss <span>86</span></a></li>
                                <li><a href="#">Cario <span>25</span></a></li>
                                <li><a href="#">Body buiding <span>36</span></a></li>
                                <li><a href="#">Nutrition <span>15</span></a></li>
                            </ul>
                        </div>
                        <div class="so-latest">
                            <h5 class="title">Feature posts</h5>
                            <?php
                                $ref_table = 'blog';
                                $fetch = $database->getReference('blog')->getValue();
                                
                                if($fetch > 0){
                                foreach($fetch as $key => $row){
                                    
                                    
                            ?>
                            <div class="latest-large set-bg" data-setbg="<?= $row['image'] ?>">
                                <div class="ll-text">
                                    <h5><a href="./blog-details.html"><?= $row['heading'] ?></a></h5>
                                    <ul>
                                        <li>by <?= $row['name'] ?></li>
                                        <li><?= $row['date'] ?></li>
                                    </ul>
                                </div>
                            </div>
                            <?php
                            }
                            }
                            else{
                                echo "no record";
                            }
                            ?>
                        </div>
                        <div class="so-tags">
                            <h5 class="title">Popular tags</h5>
                            <a href="#">Gyming</a>
                            <a href="#">Body buidling</a>
                            <a href="#">Yoga</a>
                            <a href="#">Weightloss</a>
                            <a href="#">Proffeponal</a>
                            <a href="#">Streching</a>
                            <a href="#">Cardio</a>
                            <a href="#">Karate</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
    <?php include 'includes/footer.php'; ?>