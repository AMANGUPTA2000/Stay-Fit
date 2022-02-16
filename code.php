<?php
session_start();
include('firebase/includes/dbconfig.php');

if(isset($_POST['register-btn'])){
    $name = $_POST['name'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $mobile = '+91'.$phone;
    $gender = $_POST['gender'];

    $userProperties = [
        'email' => $email,
        'emailVerified' => false,
        'phoneNumber' => $mobile,
        'password' => $password,
        'displayName' => $name,
        'birthday' => $birthday,
        'gender' => $gender,
    ];
    
    try{
        $createdUser = $auth->createUser($userProperties);
    }catch (FirebaseException $e) {
        $_SESSION['status'] = "Please try Again.";
        header('Location: get-started.php');
        exit();
    } catch (Throwable $e) {
        $_SESSION['status'] = "Email or Phone no. Already Exists.";
        header('Location: get-started.php');
        exit();
    } 

    if($createdUser){
        $data = [
            'name' => $name,
            'birthday' => $birthday,
            'email' => $email,
            'password' => $password,
            'phone' => $phone,
            'gender' => $gender,
            'Weight Lifting' => '50',
            'Cycling' => '50',
            'Body Building' => '50',
            'Treadmill' => '50',
            'Boxing' => '50',
        ];

        $ref = 'register';
        $postdata = $database->getreference($ref)->push($data);
        

        if($createdUser && $postdata){
            $_SESSION['status'] = "Success";
            header('Location: profile.php');
        }
        else{
            $_SESSION['status'] = "Failure";
            header('Location: get-started.php');
        }
    }
}
if(isset($_POST['login-btn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    try{
        $user = $auth->getUserByEmail("$email");

        $signInResult = $auth->signInWithEmailAndPassword($email, $password);
        $idTokenString = $signInResult->idToken();

        try {
            $verifiedIdToken = $auth->verifyIdToken($idTokenString);
            $uid = $verifiedIdToken->claims()->get('sub');

            $_SESSION['verified_user_id'] = $uid;
            $_SESSION['idTokenString'] = $idTokenString;

            $_SESSION['status'] = "Login Successful.";
            header('Location: profile.php');
            exit();

        } catch (FailedToVerifyToken $e) {
            echo 'The token is invalid: '.$e->getMessage();
        }
    }
    catch (FirebaseException $e) {
        $_SESSION['status'] = "Please try Again.";
        header('Location: get-started.php');
        exit();
    }
    catch (Throwable $e) {
        $_SESSION['status'] = "Invalid Credentials.";
        header('Location: get-started.php');
        exit();
    } 


}
if(isset($_POST['update-btn'])){
    
    $name = $_POST['name'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $mobile = '+91'.$phone;
    // $gender = $_POST['gender'];
    $token = $_POST['token'];
    $uid = $_POST['uid'];

    //status
    $wlift = $_POST['wlift'];
    $myRange1 = $_POST['myRange1'];
    $cycle = $_POST['cycle'];
    $myRange2 = $_POST['myRange2'];
    $bodyBuild = $_POST['bodyBuild'];
    $myRange3 = $_POST['myRange3'];
    $tread = $_POST['tread'];
    $myRange4 = $_POST['myRange4'];
    $box = $_POST['box'];
    $myRange5 = $_POST['myRange5'];

    
    //profile pic
    $profile = $_FILES['prof']['name'];
    $randomNo = rand(1111,9999);

    $user = $auth->getUser($uid);
    $new = $randomNo.$profile;
    $old = $user->photoUrl;

    if($profile != NULL){
        $filename = 'uploads/'.$new;
    }
    else{
        $filename = $old;
    }
    
    $userProperties = [
        'email' => $email,
        'emailVerified' => false,
        'phoneNumber' => $mobile,
        // 'password' => $password,
        'displayName' => $name,
        'birthday' => $birthday,
        'photoUrl' => $filename,
        // 'gender' => $gender,
    ];
    
    $updatedUser = $auth->updateUser($uid, $userProperties);
    
    $data = [
        'name' => $name,
        'birthday' => $birthday,
        'email' => $email,
        // 'password' => $password,
        'phone' => $phone,
        $wlift => $myRange1,
        $cycle => $myRange2,
        $bodyBuild => $myRange3,
        $tread => $myRange4,
        $box => $myRange5,
        // 'gender' => $gender
    ];

    $ref = 'register/'.$token;
    $postdata = $database->getreference($ref)->update($data);
    

    if($updatedUser && $postdata){
        if($profile != NULL){
            move_uploaded_file($_FILES['prof']['tmp_name'], "uploads/".$new);
            if($old != NULL)
            {
                unlink($old);
            }
        }
        $_SESSION['status'] = "Success";
        header('Location: profile.php');
    }
    else{
        $_SESSION['status'] = "Failure";
        header('Location: get-started.php');
    }
    
}

if(isset($_POST['blog-btn'])){
    
    $name = $_POST['name'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $heading = $_POST['heading'];
    $content = $_POST['content'];
    $token = $_POST['token'];
    $uid = $_POST['uid'];

    //profile pic
    $profile = $_FILES['prof']['name'];
    $randomNo = rand(1111,9999);

    $user = $auth->getUser($uid);
    $new = $randomNo.$profile;
    $old = $user->photoUrl;

    if($profile != NULL){
        $filename = 'blogs/'.$new;
    }
    else{
        $filename = $old;
    }
    
    $data = [
        'name' => $name,
        'date' => $date,
        'email' => $email,
        // 'password' => $password,
        'heading' => $heading,
        'content' => $content,
        'image' => $filename,
    ];

    $ref = 'blog';
    $postdata = $database->getreference($ref)->push($data);
    

    if($postdata){
        if($profile != NULL){
            move_uploaded_file($_FILES['prof']['tmp_name'], "blogs/".$new);
            if($old != NULL)
            {
                unlink($old);
            }
        }
        $_SESSION['status'] = "Success";
        header('Location: blog.php');
    }
    else{
        $_SESSION['status'] = "Failure";
        header('Location: post-blog.php');
    }
    
}


?>



<?php
require "./vendor/autoload.php";
require "./customPdfGenerator.php";

// PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;
// Base files 
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// create object of PHPMailer class with boolean parameter which sets/unsets exception.

if(isset($_POST['subscribe-btn'])){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    
    $mail = new PHPMailer(true);                              
   try {
       $mail->isSMTP(); // using SMTP protocol                                     
       $mail->Host = 'smtp.gmail.com'; // SMTP host as gmail 
       $mail->SMTPAuth = true;  // enable smtp authentication                             
       $mail->Username = 'info.stayfithealth@gmail.com';  // sender gmail host              
       $mail->Password = 'fit@Stayindia.com'; // sender gmail host password                          
       $mail->SMTPSecure = 'tls';  // for encrypted connection                           
       $mail->Port = 587;   // port for SMTP     
       $mail->IsHTML(true);

       $mail->setFrom('info.stayfithealth@gmail.com', "Stay-Fit India"); // sender's email and name
       $mail->addAddress($email, $name);  // receiver's email and name

       $mail->Subject = 'Subscription Successful';
       $mail->Body = '
       <!DOCTYPE html>
        <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width,initial-scale=1">
          <meta name="x-apple-disable-message-reformatting">
          <title></title>
          <!--[if mso]>
          <noscript>
            <xml>
              <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
              </o:OfficeDocumentSettings>
            </xml>
          </noscript>
          <![endif]-->
          <style>
            table, td, div, h1, p {font-family: Arial, sans-serif;}
          </style>
        </head>
        <body style="margin:0;padding:0;">
          <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
            <tr>
              <td align="center" style="padding:0;">
                <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
                  <tr>
                    <td align="center" style=";background:#F36100;">
                      <img src="https://stayfithealth.herokuapp.com/img/checklogobg.png" alt="" width="600" style="height:200px;display:block;" />
                    </td>
                  </tr>
                  <tr>
                    <td style="padding:36px 30px 42px 30px;">
                      <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                        <tr>
                          <td style="padding:0 0 36px 0;color:#153643;">
                            <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">YOUR SUBSCRIPTION IS CONFIRMED</h1>
                            <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Thank you for subscribing to our mailing list. We won"t send any spam mails.</p>
                            <p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><a href="https://stayfithealth.herokuapp.com/" style="color:#F36100;text-decoration:underline;">StayFit-India</a></p>
                          </td>
                        </tr>
                        <tr>
                          <td style="padding:0;">
                            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                              <tr>
                                <td style="width:260px;padding:0;vertical-align:top;">
                                  <center><p style="margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><img src="https://stayfithealth.herokuapp.com/img/main-logo.jpg" alt="" width="150" style="height:auto;display:block;" /></p></center>

                                    
                                </td>

                              </tr>

                            </table>
                            
                          </td>

                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding:30px;background:#F36100;">
                      <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
                        <tr>
                          <td style="padding:0;width:50%;" align="left">
                            <p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
                              &reg; Stay-Fit, India 2022<br/><a href="http://www.example.com" style="color:#ffffff;text-decoration:underline;">Unsubscribe</a>
                            </p>
                          </td>
                          <td style="padding:0;width:50%;" align="right">
                            <table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
                              <tr>
                                <td style="padding:0 0 0 10px;width:38px;">
                                  <a href="http://www.twitter.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/tw_1.png" alt="Twitter" width="38" style="height:auto;display:block;border:0;" /></a>
                                </td>
                                <td style="padding:0 0 0 10px;width:38px;">
                                  <a href="http://www.facebook.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/fb_1.png" alt="Facebook" width="38" style="height:auto;display:block;border:0;" /></a>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </body>
        </html>
       ';

       $mail->send();
       echo 'Message has been sent';
       $_SESSION['status'] = "Succesfully Subscribed.";
        header('Location: contact.php');
   } catch (Exception $e) { // handle error.
       echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
       $_SESSION['status'] = "Failure";
        header('Location: contact.php');
   }

}

  
   

   

    