<?php
include('dbcon.php');
session_start();



if(isset($_POST['delete_mechanic_button'])){
    $del_id = $_POST['delete_mechanic_button'];
    $ref_table = 'mechanic/'.$del_id;
    $deleteMechanicData = $database->getReference($ref_table)->remove();

    if($deleteMechanicData){
        $_SESSION['status'] = "Deletion Was Successfully";
        header('Location: mechanics_view.php');
    }
    else{
        $_SESSION['status'] = "Deletion Not Successful";
        header('Location: mechanics_view.php');

    }


}

if(isset($_POST['edit_mechanic'])){
    $key = $_POST['key'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['pnumber'];
    $password = $_POST['password'];
    $state = 'active';

    $editMechanicData = [
        'fname'=>$firstname,
        'lname'=>$lastname,
        'email'=>$email,
        'phoneno'=>$phonenumber,
        'password'=>$password,
        'status'=>$state


    ];
    $ref_table = 'mechanic/'.$key;
    $updateMechanicInfo = $database->getReference($ref_table)->update($editMechanicData);

    if($updateMechanicInfo){
        $_SESSION['status'] = "Edit Was Successfully";
        header('Location: mechanics_view.php');
    }
    else{
        $_SESSION['status'] = "Edit Not Successful";
        header('Location: mechanics_view.php');

    }

}




if(isset($_POST['add_mechanic'])){
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['pnumber'];
    $password = $_POST['password'];
    $state = 'active';

    $postMechanicData = [
        'fname'=>$firstname,
        'lname'=>$lastname,
        'email'=>$email,
        'phoneno'=>$phonenumber,
        'password'=>$password,
        'status'=>$state


    ];
    $ref_table = 'mechanic';

    $postMechanic_result = $database->getReference($ref_table)->push($postMechanicData);
    if($postMechanic_result){
        $_SESSION['status'] = "Mechanic Added Successfully";
        header('Location: mechanics_view.php');
    }
    else{
        $_SESSION['status'] = "Mechanic Not Added";
        header('Location: mechanics_view.php');

    }


}

?>
