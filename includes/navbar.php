

<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #1A237E;">
    <div class="container">
        <h2><a class="navbar-brand" href="#">Makanikapp</a></h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class=" d-flex" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto  text-right">
                <li class="nav-item">
                    <a class="nav-link "  href="index.php"><b>Users</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "  href="mechanics_view.php"><b>Mechanics</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  "  href="payments_view.php"><b>Payments</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "  href="breakdowns_view.php"><b>Breakdowns</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "  href="viewprofile.php"><b>View Profile</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "  href="log_in.php"><b>Sign Out</b></a>
                </li>
            </ul>
            <h3><a class="navbar-brand">Welcome,
            <?php
            if(isset($_SESSION['useremail'])){
                echo $_SESSION['useremail'];
            }

            ?>
            </h3>


        </div>
    </div>
</nav>