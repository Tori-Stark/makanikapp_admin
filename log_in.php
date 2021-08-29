<?php
include('includes/header2.php');


?>

<div class="container" >
    <div class="row justify-content-center" >
        <div class="col-md-6" >
            <div class="card">
                <div class="card-header" style="background: #283593">
                    <h4 style="color: white">
                        Sign In

                    </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="post">

                        <div class="form-group mb-3">
                            <label for="semail">Email</label>
                            <input type="email" name="semail" id="semail" class="form-control">

                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="spassword" id="spassword" class="form-control">

                        </div>
                        <div class="form-group mb-3">

                            <button type="submit"  name="sign_in_button" class="btn btn" style="background: #283593; color: white"><b>Sign In</b></button>

                            <label
                                    class="float-end">Don't have an account yet? </label><br>
                            <a href="sign_up.php" class="btn btn-danger float-end">Sign Up</a>
                        </div>

                    </form>


                </div>
            </div>


        </div>

    </div>

</div>

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-analytics.js"></script>






<?php
include('includes/footer.php');

?>


