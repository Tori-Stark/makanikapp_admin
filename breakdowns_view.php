<?php
include('includes/header.php');
include('includes/auth_check.php');

session_start();

?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h4>Total Breakdowns :
                        <?php
                        include('dbcon.php');
                        $ref_table = 'breakdown';
                        if (!empty($database)) {
                            $total_breakdown_data = $database->getReference($ref_table)->getSnapshot()->numChildren();
                        }
                        echo $total_breakdown_data;


                        ?>


                    </h4>
                </div>
            </div>

        </div>
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>
                        Breakdowns

                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Breakdown Number</th>
                            <th>User Email</th>
                            <th>Mechanic Email</th>
                            <th>Date</th>
                            <th>Time</th>

                        </tr>

                        </thead>
                        <tbody>

                        <?php
                        include('dbcon.php');
                        $ref_table = 'breakdown';
                        $fetch_breakdown_data = $database->getReference($ref_table)->getValue();

                        if($fetch_breakdown_data>0){
                            $i = 1;
                            foreach($fetch_breakdown_data as $key=> $row){
                                ?>
                                <tr>
                                    <td><?=$i++;?>
                                    <td><?=$row['email'];?></td>
                                    <td><?=$row['mechanicemail'];?></td>
                                    <td><?=$row['date_of_breakdown'];?></td>
                                    <td><?=$row['time_of_breakdown'];?></td>



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


