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