<?php
session_start();
include('firebase/includes/dbconfig.php');

use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;


if(isset($_SESSION['verified_user_id']))
{
  $uid = $_SESSION['verified_user_id'];
  $idTokenString = $_SESSION['idTokenString'];

  try {
    $verifiedIdToken = $auth->verifyIdToken($idTokenString);
  } catch (FailedToVerifyToken $e) {
      echo 'The token is invalid: '.$e->getMessage();
      $_SESSION['status'] = "Session Expired. Login Again.";
      header('Location: logout.php');
  }
  catch (Throwable $e) {
        $_SESSION['status'] = "Login to access Profile Page.";
        header('Location: get-started.php');
        exit();
    }

  $uid = $verifiedIdToken->claims()->get('sub');
}
else{
    $_SESSION['status'] = "Login to access Profile Page.";
    header('Location: get-started.php');
}
?>