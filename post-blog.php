<?php 
include('authentication.php');
include 'includes/header.php'; 
include('firebase/includes/dbconfig.php');
?>
<link rel="stylesheet" href="css/profile.css">

<div class="container" style="margin-top:110px;">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-12">
                <?php
                    try {
                    $user = $auth->getUser("$uid");
                    }catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
                    echo $e->getMessage();
                    }
                    $ref_table = 'register';
                    $mail = $user->email;
                    $fetch = $database->getReference('register')->getValue();
                    
                    if($fetch > 0){
                    foreach($fetch as $key => $row){
                        if($row['email'] == $mail){
                        
                ?>
                <form action="code.php" method="post" enctype="multipart/form-data" style="margin-top:110px;">
                    <div class="card">
                        <div class="card-body">
                        <?php

                        if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
                        {
                        echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
                        unset($_SESSION['status']);
                        }
                        ?>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Heading</h6>
                                </div>
                                <input type="hidden" class="form-control" value="<?= $row['name']; ?>" name="name">
                                <input type="hidden" class="form-control" value="<?= $row['email']; ?>" name="email">
                                <input type="hidden" class="form-control" value="<?php $today = date("M,d, Y");  echo $today; ?>" name="date">
                                <div class="col-sm-9 text-secondary">
                                    <input type="hidden" class="form-control" value="<?= $key; ?>" name="token">
                                    <input type="hidden" class="form-control" value="<?= $uid; ?>" name="uid">
                                    <input type="text" class="form-control" placeholder="Heading of your Fitness Blog" name="heading" maxlength = "30">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Content</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" placeholder="Content of your Blog" name="content" maxlength = "250" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Change Profile Pic</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="file" name="prof" class="form-control"  accept="image/*">
                                </div>
                            </div>	
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                <button class="btn btn-primary" name="blog-btn" type="submit">Save Changes</button>
                                    <a href="blog.php" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <br>
                </form>
                <?php
					}
					}
				}
				else{
					echo "no record";
				}
				?>
            </div>
        </div>
    </div>
</div>


<?php include 'includes/footer.php'; ?>