<?php 
include('authentication.php');
include 'includes/header.php'; 
include('firebase/includes/dbconfig.php');
?>
<link rel="stylesheet" href="css/profile.css">

<div class="container" style="margin-top:110px;">
    <div class="main-body">
    
          
    
          <div class="row gutters-sm">
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
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                  <?php if($row['gender']=="Female"){
                    if($user->photoUrl != NULL){
                  ?>
                                <img src="<?= $user->photoUrl ?>" alt="female" class="rounded-circle" width="150">
                  <?php
                  }
                  else{?>
                    <img src="img/avatar8.png" alt="female 2" class="rounded-circle" width="150">
                  <?php
                  }
                  }else{
                    if($user->photoUrl != NULL){
                  ?>
                  <img src="<?= $user->photoUrl ?>" alt="male" class="rounded-circle" width="150">
                  <?php 
                  }
                  else{?>
                    <img src="img/avatar7.png" alt="male 2" class="rounded-circle" width="150">
                  <?php
                  }
                  }?>
                    <div class="mt-3">
                      <h4><?= $row['name']; ?></h4>
                      <p class="text-secondary mb-1"><?= $row['gender']; ?></p>
                      <p class="text-muted font-size-sm">
                        <?php
                        if(($row['Weight Lifting']+$row['Cycling']+$row['Body Building']+$row['Treadmill']+$row['Boxing'])/5>'80'){
                          echo 'Advanced';
                        }
                        else if(($row['Weight Lifting']+$row['Cycling']+$row['Body Building']+$row['Treadmill']+$row['Boxing'])/5>'60'){
                          echo 'Intermediate';
                        }
                        else{
                          echo 'Beginner';
                        }
                        ?>
                      </p>
                      
                      <a href="editprofile.php" class="btn btn-outline-primary">Change Profile Picture</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                    <span class="text-secondary">stayfithealth.com</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                    <span class="text-secondary">stayfit</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                    <span class="text-secondary">@stayfit</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                    <span class="text-secondary">stayfit</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                    <span class="text-secondary">stayfit</span>
                  </li>
                </ul>
              </div>
              <div class="card mt-3">
                <a href="post-blog.php"  class="btn btn-outline-primary">Post your own Blog</a>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $row['name']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $row['email']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $row['phone']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $row['gender']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Birthdate</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="date" style="border: none;background: #fff;" class="text-secondary" value="<?= $row['birthday']; ?>" readonly disabled>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " href="editprofile.php">Edit</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row gutters-sm">
                <div class="col-sm-12 mb-6">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Workout Progress (Shows how much you have progress in achieving your goals.)</i></h6>
                      <small>Weight Lifting</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$row['Weight Lifting']?>%" aria-valuenow="<?= $row['Weight Lifting']?>" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Cycling</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?=$row['Cycling']?>%" aria-valuenow="<?=$row['Cycling']?>" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Body Building</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?=$row['Body Building']?>%" aria-valuenow="<?=$row['Body Building']?>" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Treadmill</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?=$row['Treadmill']?>%" aria-valuenow="<?=$row['Treadmill']?>" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Boxing</small>
                      <div class="progress" style="height: 5px">
                        <div class="progress-bar bg-info" role="progressbar" style="width: <?=$row['Boxing']?>%" aria-valuenow="<?=$row['Boxing']?>" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                      <small>Web Design</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Website Markup</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>One Page</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Mobile Template</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Backend API</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div> -->
              </div>



            </div>
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
<?php include 'includes/footer.php'; ?>