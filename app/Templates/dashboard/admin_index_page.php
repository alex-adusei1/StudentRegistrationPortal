<?php
include __DIR__ . '/header.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2" style="margin-top: -800px">
    <h1 class="page-header"><i class="fa fa-dashboard"></i> Dashboard</h1>

    <div class="row placeholders">
        <div class="col-xs-6 col-sm-4 placeholder">
            <div class="panel panel-default">

                <div class="panel-heading" style="padding-top: 50px">

                    <span style="font-size: 25px">
                        <i class="fa fa-bar-chart-o fa-lg" style="font-size: 100px"></i>
                        Total Students
                    </span>

                </div>

                <div class="panel-body">
                    <p class="lead pull-right"><?php echo count($student_parent) ?></p>
                </div>
            </div>

        </div>
        <div class="col-xs-6 col-sm-4 placeholder">
            <div class="panel panel-default">

                <div class="panel-heading" style="padding-top: 50px">

                    <span style="font-size: 25px">
                        <i class="fa fa-money fa-lg" style="font-size: 100px"></i>
                        Total Fees Paid
                    </span>

                </div>

                <div class="panel-body">
                    <p class="lead pull-right">5405.298</p>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-4 placeholder">
            <div class="panel panel-default">

                <div class="panel-heading" style="padding-top: 50px">

                    <span style="font-size: 25px">
                        <i class="fa fa-users fa-lg" style="font-size: 100px"></i>
                        Total Users
                    </span>

                </div>

                <div class="panel-body">
                    <p class="lead pull-right"><?php echo count($users) ?></p>
                </div>
            </div>
        </div>
    </div>

    <h2 class="sub-header">Current Students </h2>
    <div class="table-responsive">
        <table class="table table-hover">
                <thead>
                    <tr>
                        <th><i class=" 	fa fa-key"></i></th>
                        <th><i class=" 	fa fa-user"></i> Full Name</th>
                        <th><i class=" 	fa fa-envelope"></i> Email</th>
                        <!--<th><i class=" 	fa fa-phone"></i> Phone Number</th>-->
                        <th><i class=" 	fa fa-male"></i> Guardian Name</th>
                        <!--<th><i class=" 	fa fa-mortar-board"></i> Course</th>-->
                        <th><i class=" 	fa fa-phone-square"></i> Guardian Phone</th>
                        <th><i class=" 	fa fa-map"></i> Location</th>
                        <th><i class="fa fa fa-cogs"></i> actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $c = 1;
                    foreach ($student_parent as $stud) {
                        echo "
                            <tr>
                        <!--we will pass the data when we include-->

                        <td>". $c++."</td>
                        <td>". ucwords($stud['sfn'] ." ". $stud['sln'])."</td>
                        <td>". $stud['se']."</td>
                        <td>". ucwords($stud['pfn'] ." ". $stud['pln'])."</td>
                        <td>". $stud['ppn']."</td>
                        <td>". $stud['pa']."</td>
                        <td>
                            <a href=\"?action=viewDetail&&userid=".$stud['id']. "\" class=\"btn btn-info btn-xs\"><i class=\"fa fa-eye\"></i></a>
                            <a href=\"?action=editStudent&&userid=".$stud['id']."\" class=\"btn btn-warning btn-xs\"><i class=\"fa fa-magic\"></i></a>
                            <a href=\"?action=createStudent\" class=\"btn btn-success btn-xs\"><i class=\"fa fa-plus\"></i></a>
                        </td>
                        </tr>";
                    }
                    ?>

                </tbody>
            </table>
    </div>
</div>
</div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>
