<?php
include('includes/header.php');
//session_start();
include('includes/auth_check.php');


?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h4>Total Users:
                        <?php
                        include('dbcon.php');
                        $ref_table = 'user';
                        if (!empty($database)) {
                            $total_user_data = $database->getReference($ref_table)->getSnapshot()->numChildren();
                        }
                        echo $total_user_data;


                        ?>


                    </h4>
                </div>
            </div>

        </div>
        <div class="col-md-12">
            <?php
            if(isset($_SESSION['status'])){
                echo "<h5 class='alert alert-success'>".$_SESSION['status']."</h5>";

                unset($_SESSION['status']);
            }

            ?>
            <div class="card">
                <div class="card-header">
                    <h4>
                        User CRUD
                        <a href="add_user.php" class="btn btn-primary float-end">Add User</a>
                    </h4>
                </div>
                <div class="card-body">
                    <input type="text" class="float-end" id="myInput" onkeyup="myFunction()" placeholder="Search with email...">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                        <tr>
                            <th>User Number</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

                        </thead>
                        <tbody>

                        <?php
                        include('dbcon.php');
                        $ref_table = 'user';
                        $fetch_user_data = $database->getReference($ref_table)->getValue();

                        if($fetch_user_data>0){
                            $i = 1;
                            foreach($fetch_user_data as $key=> $row){
                                ?>|
                                <tr>
                                    <td><?=$i++;?>
                                    <td><?=$row['fname'];?></td>
                                    <td><?=$row['lname'];?></td>
                                    <td><?=$row['email'];?></td>
                                    <td><?=$row['phoneno'];?></td>
                                    <td><?=$row['status'];?></td>
                                    <td>
                                        <a href="edit_user.php?id=<?=$key;?>" class="btn btn-primary btn-sm">Edit</a>

                                    </td>
                                    <td>
<!--                                        <a href="delete_user.php" class="btn btn-danger btn-sm">Delete</a>-->
                                        <form method="post" action="code.php">
                                            <button class="btn btn-danger btn-sm" type="submit" value="<?=$key;?>" onclick="return confirm('Are you sure you want to delete this user?');" name="delete_user_button">Delete</button>
                                        </form>

                                    </td>

                                </tr>

                                <?php
                            }

                        }
                        else{
                            ?>
                        <tr>
                            <td colspan="8">No records found</td>

                        </tr>
                        <?php
                        }




                        ?>

                        <tr>
                            <td>

                            </td>
                        </tr>


                        </tbody>

                    </table>


                </div>
            </div>


        </div>

    </div>

</div>
<script>
    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>



<?php
include('includes/footer.php');

?>


