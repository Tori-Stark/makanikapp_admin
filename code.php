<?php
include('dbcon.php');
session_start();

if(isset($_POST['sign_in_button'])){

    $email = $_POST['semail'];

    $password = $_POST['spassword'];
    try {

        $auth = $factory->createAuth();
        $signInResult = $auth->signInWithEmailAndPassword($email, $password);


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
    $state = 'ACTIVE';

    $postUserData = [
        'fname'=>$firstname,
        'lname'=>$lastname,
        'email'=>$email,
        'phoneno'=>$phonenumber,
        'password'=>$password,
        'status'=>$state


    ];
    $auth = $factory->createAuth();
    try {
        $createdUser = $auth->createUser($postUserData);
    } catch (\Kreait\Firebase\Exception\AuthException $e) {
    } catch (\Kreait\Firebase\Exception\FirebaseException $e) {
    }

    if($createdUser){
        $link = $auth->getEmailVerificationLink($email);

        echo "
                <script language='javascript'>
                 alert('⚠Registration Successful. Check Email for Verification');
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
    $state = $_POST['status'];

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
if(isset($_POST['editingadminprofile'])){
    $key = $_POST['key'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];

    $phonenumber = $_POST['pnumber'];


    $editAdminData = [
        'fname'=>$firstname,
        'lname'=>$lastname,
        'phoneno'=>$phonenumber,



    ];
    $ref_table = 'user/'.$key;
    $updateAdminInfo = $database->getReference($ref_table)->update($editAdminData);

    if($updateAdminInfo){
        $_SESSION['status'] = "Edit Was Successfully";
        header('Location: viewprofile.php');
    }
    else{
        $_SESSION['status'] = "Edit Not Successful";
        header('Location: viewprofile.php');

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

