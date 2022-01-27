<?php
session_start();
include('firebase/includes/dbconfig.php');

if(isset($_POST['register-btn'])){
    $name = $_POST['name'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];

    $userProperties = [
        'email' => $email,
        'emailVerified' => false,
        'phoneNumber' => $phone,
        'password' => $password,
        'displayName' => $name,
        // 'birthday' => $birthday,
        // 'gender' => $gender,
    ];

    $createdUser = $auth->createUser($userProperties);
    if($createdUser){
        $_SESSION['status'] = "Success";
        header('Location: profile.php');
    }
    else{
        $_SESSION['status'] = "Failure";
        header('Location: get-started.php');
    }
}

// if(isset($_POST['register-btn'])){
//     $name = $_POST['name'];
//     $birthday = $_POST['birthday'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $phone = $_POST['phone'];
//     $gender = $_POST['gender'];

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