<?php
include('includes/header.php');
//session_start();
include('includes/auth_check.php');


?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>
                        My Profile

                    </h4>
                </div>
                <div class="col-md-12">
                    <?php
                    if(isset($_SESSION['status'])){
                        echo "<h5 class='alert alert-success'>".$_SESSION['status']."</h5>";

                        unset($_SESSION['status']);
                    }

                    ?></div>
                <div class="card-body">
                    <?php
                    include('dbcon.php');
                    if(isset($_SESSION['userid'])) {
                        $key_child = $_SESSION['userid'];

                        $ref_user_table = 'user';
                        $get_user_data = $database->getReference($ref_user_table)->getChild($key_child)->getValue();
                        if($get_user_data>0){
                            ?>



                            <form  method="post">
                                <div class="form-group mb-3">
                                    <input type="hidden" name="key" value="<?=$key_child;?>">
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname" value="<?=$get_user_data['fname'];?>" class="form-control">

                                </div>
                                <div class="form-group mb-3">
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" value="<?=$get_user_data['lname'];?>" class="form-control">

                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="<?=$get_user_data['email'];?>" class="form-control">

                                </div>
                                <div class="form-group mb-3">
                                    <label for="pnumber">Phone Number</label>
                                    <input type="number" name="pnumber" value="<?=$get_user_data['phoneno'];?>" class="form-control">

                                </div>
                                <div class="form-group mb-3">
                                    <a href="index.php" class="btn btn-danger float-end">Back</a>

                                    <a href="editprofile.php" class="btn btn-primary">Edit My Profile</a>

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


