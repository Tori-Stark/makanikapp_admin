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
                            Update Mechanic Information

                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        include('dbcon.php');
                        if(isset($_GET['id'])) {
                            $key_child = $_GET['id'];

                            $ref_mechanic_table = 'mechanic';
                            $get_mechanic_data = $database->getReference($ref_mechanic_table)->getChild($key_child)->getValue();
                            if($get_mechanic_data>0){
                                ?>



                                <form action="mechanic_backend.php" method="post">
                                    <div class="form-group mb-3">
                                        <input type="hidden" name="key" value="<?=$key_child;?>">
                                        <label for="fname">First Name</label>
                                        <input type="text" name="fname" value="<?=$get_mechanic_data['fname'];?>" class="form-control">

                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="lname">Last Name</label>
                                        <input type="text" name="lname" value="<?=$get_mechanic_data['lname'];?>" class="form-control">

                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" value="<?=$get_mechanic_data['email'];?>" class="form-control">

                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="pnumber">Phone Number</label>
                                        <input type="number" name="pnumber" value="<?=$get_mechanic_data['phoneno'];?>" class="form-control">

                                    </div>
                                    <div class="form-group mb-3">
                                        <a href="mechanics_view.php" class="btn btn-danger float-end">Back</a>
                                        <button type="submit" name="edit_mechanic" class="btn btn-primary">Edit Mechanic</button>

                                    </div>

                                </form>
                                <?php

                            }
                            else{

                                $_SESSION['status'] = "No Records Found";
                                header('Location: mechanics_view.php');
                                exit();
                            }

                        }
                        else{
                            $_SESSION['status'] = "ID Not Found";
                            header('Location: mechanics_view.php');
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


<?php
