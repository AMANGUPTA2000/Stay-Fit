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
            'gender' => $gender
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

if(isset($_POST['update-btn'])){
    
    $name = $_POST['name'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $mobile = '+91'.$phone;
    // $gender = $_POST['gender'];
    $token = $_POST['token'];
    $uid = $_POST['uid'];
    
    $userProperties = [
        'email' => $email,
        'emailVerified' => false,
        'phoneNumber' => $mobile,
        // 'password' => $password,
        'displayName' => $name,
        'birthday' => $birthday,
        // 'gender' => $gender,
    ];
    
    $updatedUser = $auth->updateUser($uid, $userProperties);
    
    $data = [
        'name' => $name,
        'birthday' => $birthday,
        'email' => $email,
        // 'password' => $password,
        'phone' => $phone,
        // 'gender' => $gender
    ];

    $ref = 'register/'.$token;
    $postdata = $database->getreference($ref)->update($data);
    

    if($updatedUser && $postdata){
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