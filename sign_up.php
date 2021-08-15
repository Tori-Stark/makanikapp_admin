<?php
include('includes/header2.php');

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Sign Up
                    </h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group mb-3">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" class="form-control">

                        </div>
                        <div class="form-group mb-3">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" class="form-control">

                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control">

                        </div>
                        <div class="form-group mb-3">
                            <label for="pnumber">Phone Number</label>
                            <input type="number" name="pnumber" class="form-control">

                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">

                        </div>
                        <div class="form-group mb-3">
                            <a href="log_in.php" class="btn btn-danger float-end">Back</a>
                            <button type="submit"  name="sign_up_button" class="btn btn-primary">Sign Up</button>

                        </div>

                    </form>


                </div>
            </div>


        </div>

    </div>

</div>



<?php
include('includes/footer.php');

?>


