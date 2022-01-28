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

    $data = [
        'name' => $name,
        'birthday' => $birthday,
        'email' => $email,
        'password' => $password,
        'phone' => $phone,
        'gender' => $gender
    ];

    $ref = 'register';
    $postdata = $database->getreference($ref)->push($data);
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

    if($createdUser && $postdata){
        $_SESSION['status'] = "Success";
        header('Location: profile.php');
    }
    else{
        $_SESSION['status'] = "Failure";
        header('Location: get-started.php');
    }
}

if(isset($_POST['login-btn'])){
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    try {
        $user = $auth->getUserByEmail("$email");

        $signInResult = $auth->signInWithEmailAndPassword($email, $password);
        $idTokenString = $signInResult->idToken(); 

        try {
            $verifiedIdToken = $auth->verifyIdToken($idTokenString);
            $uid = $verifiedIdToken->claims()->get('sub');

            $_SESSION['verified_user_id'] = $uid;
            $_SESSION['idTokenString'] = $idTokenString;

            $_SESSION['username'] = $email;
            $_SESSION['status'] = "Login Successful";
            header('Location: profile.php');
            exit();
        } catch (FailedToVerifyToken $e) {
            $_SESSION['status'] = "Login Failed";
        header('Location: get-started.php');
        exit();
        }

        
    }
    catch (FirebaseException $e) {
        $_SESSION['status'] = "Invalid Credentials";
        header('Location: get-started.php');
        exit();
    } catch (Throwable $e) {
        $_SESSION['status'] = "Invalid Credentials";
        header('Location: get-started.php');
        exit();
    } 
    catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        // echo $e->getMessage();
        $_SESSION['status'] = "Invalid Credentials";
        header('Location: get-started.php');
        exit();
    }
}
//     $data = [
//         'name' => $name,
//         'birthday' => $birthday,
//         'email' => $email,
//         'password' => $password,
//         'phone' => $phone,
//         'gender' => $gender
//     ];

//     $ref = 'register';
//     $postdata = $database->getreference($ref)->push($data);

//     if($postdata){
//         $_SESSION['status'] = "Success";
//         header('Location: profile.php');
//     }
//     else{
//         $_SESSION['status'] = "Failure";
//         header('Location: get-started.php');
//     }

// }

?>