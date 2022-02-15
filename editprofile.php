<?php 
include('authentication.php');
include 'includes/header.php'; 
include('firebase/includes/dbconfig.php');
?>
<link rel="stylesheet" href="css/profile.css">

<div class="container" style="margin-top:110px;">
		<div class="main-body">
			<div class="row">
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
				<div class="col-lg-4">
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
									<!-- <a href="editprofile.php" class="btn btn-outline-primary">Change Profile Picture</a> -->
								</div>
							</div>
							<hr class="my-4">
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
									<span class="text-secondary">stayfithealth.com</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github me-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
									<span class="text-secondary">stayfit</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
									<span class="text-secondary">@stayfit</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
									<span class="text-secondary">stayfit</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
									<span class="text-secondary">stayfit</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<form action="code.php" method="post" enctype="multipart/form-data">
						<div class="card">
							<div class="card-body">
							
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0">Full Name</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<input type="hidden" class="form-control" value="<?= $key; ?>" name="token">
										<input type="hidden" class="form-control" value="<?= $uid; ?>" name="uid">
										<input type="text" class="form-control" value="<?= $row['name']; ?>" name="name">
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0">Email</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<input type="text" class="form-control" value="<?= $row['email']; ?>" name="email">
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0">Phone</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<input type="text" class="form-control" value="<?= $row['phone']; ?>" name="phone">
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0">Gender</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<select class="memberselect" class="form-control"  name="gender">
											<option value="<?= $row['gender']; ?>" class="memberselect" selected disabled=""><?= $row['gender']; ?></option>
											<option  class="memberselect" value="Male">Male</option>
											<option  class="memberselect" value="Female">Female</option>
											<option class="memberselect" value="Others">Others</option>
										</select>    
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0">Birthdate</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<input type="date" class="form-control" value="<?= $row['birthday']; ?>" name="birthday">
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
									<button class="btn btn-primary" name="update-btn" type="submit">Save Changes</button>
										<a href="profile.php" class="btn btn-danger">Cancel</a>
									</div>
								</div>
							
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<div class="card">
									<div class="card-body">
										<h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Workout Progress (Move the sliders to set the value of your choice.)</i></h6>
										<input type="hidden" value='Weight Lifting' name='wlift'>
										<small>Weight Lifting</small>
										<div class="progress mb-3" style="height: 5px;position:absolute;width:90%">
											<input type="range" class="progress-bar bg-primary" role="progressbar" style="width: 100%" min="1" max="100" value="<?=$row['Weight Lifting']?>" id="myRange1" name="myRange1">	
										</div>
										<p style="width:18%;position:absolute;right:0">Value: <span id="demo1"></span></p>
										<br><br>
										<input type="hidden" value='Cycling' name='cycle'>
										<small>Cycling</small>
										<div class="progress mb-3" style="height: 5px;position:absolute;width:90%">
											<input type="range" class="progress-bar bg-danger" role="progressbar" style="width: 100%" min="1" max="100" value="<?=$row['Cycling']?>" id="myRange2" name="myRange2">
										</div>
										<p style="width:18%;position:absolute;right:0">Value: <span id="demo2"></span></p>
										<br><br>
										<input type="hidden" value='Body Building' name='bodyBuild'>
										<small>Body Building</small>
										<div class="progress mb-3" style="height: 5px;position:absolute;width:90%">
											<input type="range" class="progress-bar bg-success" role="progressbar" style="width: 100%" min="1" max="100" value="<?=$row['Body Building']?>" id="myRange3" name="myRange3">
										</div>
										<p style="width:18%;position:absolute;right:0">Value: <span id="demo3"></span></p>
										<br><br>
										<input type="hidden" value='Treadmill' name='tread'>
										<small>Treadmill</small>
										<div class="progress mb-3" style="height: 5px;position:absolute;width:90%">
											<input type="range" class="progress-bar bg-primary" role="progressbar" style="width: 100%" min="1" max="100" value="<?=$row['Treadmill']?>" id="myRange4" name="myRange4">
										</div>
										<p style="width:18%;position:absolute;right:0">Value: <span id="demo4"></span></p>
										<br><br>
										<input type="hidden" value='Boxing' name='box'>
										<small>Boxing</small>
										<div class="progress" style="height: 5px;position:absolute;width:90%">
											<input type="range" class="progress-bar bg-primary" role="progressbar" style="width: 100%" min="1" max="100" value="<?=$row['Boxing']?>" id="myRange5" name="myRange5">
										</div>
										<p style="width:18%;position:absolute;right:0">Value: <span id="demo5"></span></p>
										<br><br>
									</div>
								</div>
							</div>
						</div>
					</form>
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
	<script>
		var slider1 = document.getElementById("myRange1");
		var slider2 = document.getElementById("myRange2");
		var slider3 = document.getElementById("myRange3");
		var slider4 = document.getElementById("myRange4");
		var slider5 = document.getElementById("myRange5");
		
		var output1 = document.getElementById("demo1");
		var output2 = document.getElementById("demo2");
		var output3 = document.getElementById("demo3");
		var output4 = document.getElementById("demo4");
		var output5 = document.getElementById("demo5");

		output1.innerHTML = slider1.value;
		output2.innerHTML = slider2.value;
		output3.innerHTML = slider3.value;
		output4.innerHTML = slider4.value;
		output5.innerHTML = slider5.value;

		slider1.oninput = function() {
			output1.innerHTML = this.value;
		}
		slider2.oninput = function() {
			output2.innerHTML = this.value;
		}
		slider3.oninput = function() {
			output3.innerHTML = this.value;
		}
		slider4.oninput = function() {
			output4.innerHTML = this.value;
		}
		slider5.oninput = function() {
			output5.innerHTML = this.value;
		}
	</script>
<?php include 'includes/footer.php'; ?>