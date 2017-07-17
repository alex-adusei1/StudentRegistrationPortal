<?php
include __DIR__ . "/header.php";
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2" style="margin-top: -800px">
    <h1 class="page-header"><i class=" 	fa fa-address-book"></i> View Students</h1>
    <div class="row placeholders">
        <div class="col-lg-10 col-lg-offset-1">
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
                    $count = 1;
                    foreach ($student_data as $stud) {
                        echo "
                            <tr>
                        <!--we will pass the data when we include-->

                        <td>" . $count++ . "</td>
                        <td>" . ucwords($stud['sfn'] . " " . $stud['sln']) . "</td>
                        <td>" . $stud['se'] . "</td>
                        <td>" . ucwords($stud['pfn'] . " " . $stud['pln']) . "</td>
                        <td>" . $stud['ppn'] . "</td>
                        <td>" . $stud['pa'] . "</td>
                        <td>
                            <a href=\"?action=viewDetail&&userid=" . $stud['id'] . "\" class=\"btn btn-info btn-xs\"><i class=\"fa fa-eye\"></i></a>
                            <a href=\"?action=editStudent&&userid=" . $stud['id'] . "\" class=\"btn btn-warning btn-xs\"><i class=\"fa fa-magic\"></i></a>
                            <a href=\"?action=createStudent\" class=\"btn btn-success btn-xs\"><i class=\"fa fa-plus\"></i></a>
                        </td>
                        </tr>";
                    }
                    ?>

                </tbody>
            </table>
      
        </div>
    </div>
