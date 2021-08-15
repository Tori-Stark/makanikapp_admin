<?php
include('dbcon.php');
session_start();

if(isset($_POST['sign_in_button'])){

    $email = $_POST['semail'];

    $password = $_POST['spassword'];
    try {

        $auth = $factory->createAuth();
        $signInResult = $auth->signInWithEmailAndPassword($email, $password);
//        $uid = 'some-uid';
//
//        $customToken = $auth->createCustomToken($uid);
//        $idTokenString = '...';
//
//        try {
//            $verifiedIdToken = $auth->verifyIdToken($idTokenString);
//            $uid = $verifiedIdToken->claims()->get('sub');
//            $user = $auth->getUser($uid);
//        } catch (InvalidToken $e) {
//            echo 'The token is invalid: '.$e->getMessage();
//        } catch (\InvalidArgumentException $e) {
//            echo 'The token could not be parsed: '.$e->getMessage();
//        }






    }catch(Exception $e){
        echo $e->getMessage();

    }

    if($signInResult){
        $_SESSION['status'] = "Log In Successful";
        $_SESSION['useremail'] = $email;


        header('Location: index.php');


    }
    else{
        echo "
                <script language='javascript'>
                 alert('⚠Invalid Password. Try Again');
                  window.location.href = 'log_in.php'; 
                    </script>";;


    }

}


if(isset($_POST['sign_up_button'])){
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['pnumber'];
    $password = $_POST['password'];
    $state = 'active';

    $postUserData = [
        'fname'=>$firstname,
        'lname'=>$lastname,
        'email'=>$email,
        'phoneno'=>$phonenumber,
        'password'=>$password,
        'status'=>$state


    ];
    $ref_table = 'user';

    $postRef_result = $database->getReference($ref_table)->push($postUserData);
    if($postRef_result){

        echo "
                <script language='javascript'>
                 alert('⚠Registration Successful.');
                  window.location.href = 'log_in.php'; 
                    </script>";;
    }
    else{
        echo "
                <script language='javascript'>
                 alert('⚠Registration Unsuccessful.');
                  window.location.href = 'log_in.php'; 
                    </script>";;

    }


}

if(isset($_POST['delete_user_button'])){
    $del_id = $_POST['delete_user_button'];
    $ref_table = 'user/'.$del_id;
    $deleteUserData = $database->getReference($ref_table)->remove();

    if($deleteUserData){
        $_SESSION['status'] = "Deletion Was Successfully";
        header('Location: index.php');
    }
    else{
        $_SESSION['status'] = "Deletion Not Successful";
        header('Location: index.php');

    }


}

if(isset($_POST['edit_user'])){
    $key = $_POST['key'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['pnumber'];
    $password = $_POST['password'];
    $state = 'active';

    $editUserData = [
        'fname'=>$firstname,
        'lname'=>$lastname,
        'email'=>$email,
        'phoneno'=>$phonenumber,
        'password'=>$password,
        'status'=>$state


    ];
    $ref_table = 'user/'.$key;
    $updateUserInfo = $database->getReference($ref_table)->update($editUserData);

    if($updateUserInfo){
        $_SESSION['status'] = "Edit Was Successfully";
        header('Location: index.php');
    }
    else{
        $_SESSION['status'] = "Edit Not Successful";
        header('Location: index.php');

    }

}





if(isset($_POST['add_user'])){
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['pnumber'];
    $password = $_POST['password'];
    $state = 'active';

    $postUserData = [
        'fname'=>$firstname,
        'lname'=>$lastname,
        'email'=>$email,
        'phoneno'=>$phonenumber,
        'password'=>$password,
        'status'=>$state


    ];
    $ref_table = 'user';

    $postRef_result = $database->getReference($ref_table)->push($postUserData);
    if($postRef_result){
        $_SESSION['status'] = "User Added Successfully";
        header('Location: index.php');
    }
    else{
        $_SESSION['status'] = "User Not Added";
        header('Location: index.php');

    }


}





?>

