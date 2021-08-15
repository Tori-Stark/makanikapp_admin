<?php
include('includes/header.php');
session_start();
include('includes/auth_check.php');


?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>
                        View My Profile
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    include('dbcon.php');

                    if(isset($_GET['useremail'])) {
                        $key_child = $_GET['useremail'];

                        $ref_user_table = 'user';
                        $get_user_data = $database->getReference($ref_user_table)->getColumn('email')->getValue();
                        if($get_user_data>0){
                            ?>



                            <form action="code.php" method="post">
                                <div class="form-group mb-3">
                                    <input type="hidden" name="key" value="<?=$key_child;?>">
                                    <label for="fname">First Name</label>
                                    <label type="text" name="fname" value="<?=$get_user_data['fname'];?>" class="form-control">

                                </div>
                                <div class="form-group mb-3">
                                    <label for="lname">Last Name</label>
                                    <label type="text" name="lname" value="<?=$get_user_data['lname'];?>" class="form-control">

                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <label type="email" name="email" value="<?=$get_user_data['email'];?>" class="form-control">

                                </div>
                                <div class="form-group mb-3">
                                    <label for="pnumber">Phone Number</label>
                                    <label type="number" name="pnumber" value="<?=$get_user_data['phoneno'];?>" class="form-control">

                                </div>
                                <div class="form-group mb-3">
                                    <a href="index.php" class="btn btn-danger float-end">Back</a>
                                    <button class="btn btn-primary"><a href="editprofile.php">Edit My Profile</a> </button>

                                </div>

                            </form>
                            <?php

                        }
                        else{

                            $_SESSION['status'] = "No Records Found";
                            header('Location: index.php');
                            exit();
                        }

                    }
                    else{
                        $_SESSION['status'] = "ID Not Found";
                        header('Location: index.php');
                        exit();


                    }



                    ?>


                </div>
            </div>


        </div>

    </div>

</div>



<?php
include('includes/footer.php');

?>


