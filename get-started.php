<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="StayFit - Your Guide to a Fit Life">
  <meta name="keywords" content="Gym, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="img/main-logo-bg.png" type="image/x-icon">
  <title>Stay-Fit</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/1788c719dd.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/login.css" />
  <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
  <!-- <link rel="shortcut icon" href="assets/images/favicon.png"> -->
</head>

<body>
  <div class="container">
    <div class="container__forms">
      <div class="form">
        <form class="form__sign-in" id="login-form">
			<img src="img/main-logo-bg.png" style="width:40%;padding-bottom:-10px">
          <h2 class="form__title"  id="login-form">Sign In</h2>
          <div class="form__input-field">
            <i class="fas fa-user"></i>
            <input autocomplete="chrome-off" type="email" class="form-control" id="username" name="username" placeholder="Enter username" required>
          </div>
          <div class="form__input-field">
            <i class="fas fa-lock"></i>
            <input autocomplete="chrome-off" type="password" class="form-control" id="userpassword" name="password" placeholder="Enter password" required>
          </div>
          <div class="e-msg"></div>
          <input class=" mt-2 form__submit" name="submit" type="submit" value="Login" />
          <!-- forget button--->
          <a  style="font-size: 14px; color: black;" href="forget-password.php">Forget Password?</a>
          <!-- <p class="form__social-text">Or Sign in with social platforms</p>
          <div class="form__social-media">
            <a href="#" class="form__social-icons">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="form__social-icons">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="form__social-icons">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="form__social-icons">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div> -->
        </form>

        <form action="code.php" method="POST" class="form__sign-up">
			    <img src="img/main-logo-bg.png" style="width:40%;padding-bottom:-10px">
          <h2 class="form__title">Sign Up</h2>
          <div class="form__input_field" >
            <i class="fas fa-user"></i>
            <input type="hidden"  id="name" name="type" value="user" >
            <input type="text"  id="name" name="name"  class="form-control" placeholder="Enter Name" required>
          </div>
          <div class="form__input_field" >
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Birthdate" onfocus="(this.type='date')" name="birthday" class="form-control"  required />
          </div>
          <div class="form__input_field" >
            <i class="fas fa-envelope"></i>
            <input type="email" id="Email" name="email" class="form-control"  placeholder="Enter Email" required>
          </div>
          <div class="form__input_field" >
            <i class="fas fa-lock"></i>
            <input type="password" id="password" name="password" class="form-control"  placeholder="Enter Password" required>
          </div>
          <div class="form__input_field" >
            <i class="fas fa-phone"></i>
            <input type="text" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57 || event.charCode==43 || event.charCode==45" minlength="10" maxlength="10"  id="Phone" name="phone" placeholder="Enter Phone" class="form-control"  required>
          </div>
          <div class="form__input_field">
            <i class="fas fa-briefcase"></i>
            <select  class="memberselect" class="form-control"  name="gender" required="required">
              <option value="" class="memberselect" selected disabled="">Select Gender</option>
              <option  class="memberselect" value="Male">Male</option>
              <option  class="memberselect" value="Female">Female</option>
              <option class="memberselect" value="Others">Others</option>
            </select>    
          </div>
          <div class="form__input_field" id="other" style="display:none;">
            <i class="fas fa-briefcase"></i>
             <input type="text" class="form-control" name="other" placeholder="Enter Other">
          </div>
          

          <div class="e-msg"></div>
          <button class="mt-2 form__submit" name="register-btn" type="submit">Register</button>
          <!-- <input class=" mt-2 form__submit" name="submit-btn" type="submit" value="Register" /> -->

          <!-- <p class="form__social-text">Or Sign up with social platforms</p>
          <div class="form__social-media">
            <a href="#" class="form__social-icons">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="form__social-icons">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="form__social-icons">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="form__social-icons">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div> -->
        </form>
      </div>
    </div>
    <div class="container__panels">
      <div class="panel panel__left">
        <div class="panel__content">
          <h3 class="panel__title">New here ?</h3>
          <p class="panel__paragraph">
            New Here? Sign-Up by clicking on the button below.
          </p>
          <button class="btn btn-transparent" id="sign-up-btn">
            Sign Up
          </button>
        </div>
        <img class="panel__image" src="img/checklogobg.png" alt="" />
      </div>
      <div class="panel panel__right">
        <div class="panel__content">
          <h3 class="panel__title">One of us ?</h3>
          <p class="panel__paragraph">
            Already a User? Sign-In by clicking on the button below.
          </p>
          <button class="btn btn-transparent" id="sign-in-btn">
            Sign In
          </button>
        </div>
        <img class="panel__image" src="img/login1-removebg-preview.png" alt="" />
      </div>
    </div>
  </div>

</body>
</html>

<script type="text/javascript">
  const signInBtn = document.querySelector("#sign-in-btn");
  const signUpBtn = document.querySelector("#sign-up-btn");
  const container = document.querySelector(".container");

  signUpBtn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
  });

  signInBtn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
  });

</script>
<!-- JAVASCRIPT -->
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="assets/js/app.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $('form#login-form').submit(function(e) {
        e.preventDefault();  
        $('input[name="submit"]').val('Verifying...');
        $('input[name="submit"]').attr('disabled', 'true');
        $('input[name="submit"]').css('pointer-events', 'none');
        var formdata = $(this).serializeArray();
        $.ajax({
            'data' : formdata,
            'url' : 'checklogin.php',
            'type' : 'post',
            'success' : function(response) { 
                var json = JSON.parse(response);
                if(!json.error) {
                    $('div.e-msg').addClass('success').removeClass('error').text(json.message);
                    window.location.href=json.url+'/dashboard.php';    
                }
                else {
                    $('input[name="submit"]').val('Submit');
                    $('input[name="submit"]').removeAttr('disabled');
                    $('input[name="submit"]').css('pointer-events', 'auto');
                    $('div.e-msg').addClass('error').removeClass('success').text(json.message);
                }
            }
        });
      });
    });

    $(document).ready(function(){
      $('form#register-form').submit(function(e) {
        e.preventDefault();  
        $('input[name="submit-btn"]').val('Submitting Data...');
        $('input[name="submit-btn"]').attr('disabled', 'true');
        $('input[name="submit-btn"]').css('pointer-events', 'none');
        var formdata = $(this).serializeArray();
        $.ajax({
            'data' : formdata,
            'url' : 'insert-data.php',
            'type' : 'post',
            'success' : function(response) { 
                var json = JSON.parse(response);
                if(!json.error) {
                    $('div.e-msg').addClass('success').removeClass('error').text(json.message);
                    setTimeout(function(){
                      location.reload();
                    }, 2000);
                  }
                else {
                    $('input[name="submit-btn"]').val('Submit');
                    $('input[name="submit-btn"]').removeAttr('disabled');
                    $('input[name="submit-btn"]').css('pointer-events', 'auto');
                    $('div.e-msg').addClass('error').removeClass('success').text(json.message);
                }
            }
        });
      });
    });

</script>
<script type="text/javascript">
    //singh up
    $(document).ready(function(){
      $('select[name="member"]').change(function(){
          var member = $(this).val();
          if (member == 'Others') {
              $('#other').show();
              $('input[name="other"]').attr('required',true);
          }
          else{
              $('#other').hide();
          }
      })
  })
</script>