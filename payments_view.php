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
                    <h4>Total Payments :
                        <?php
                        include('dbcon.php');
                        $ref_table = 'payment';
                        if (!empty($database)) {
                            $total_payment_data = $database->getReference($ref_table)->getSnapshot()->numChildren();
                        }
                        echo $total_payment_data;


                        ?>


                    </h4>
                </div>
            </div>

        </div>
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>
                        Payments

                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Payment Number</th>
                            <th>User Email</th>
                            <th>Mechanic Email</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Time</th>

                        </tr>

                        </thead>
                        <tbody>

                        <?php
                        include('dbcon.php');
                        $ref_table = 'payment';
                        $fetch_payment_data = $database->getReference($ref_table)->getValue();

                        if($fetch_payment_data>0){
                            $i = 1;
                            foreach($fetch_payment_data as $key=> $row){
                                ?>
                                <tr>
                                    <td><?=$i++;?>
                                    <td><?=$row['email'];?></td>
                                    <td><?=$row['mechanicemail'];?></td>
                                    <td><?=$row['amount'];?></td>
                                    <td><?=$row['date_of_payment'];?></td>
                                    <td><?=$row['time_of_payment'];?></td>



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



<?php
include('includes/footer.php');

?>


