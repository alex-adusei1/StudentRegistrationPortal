<?php
include __DIR__ . "/header.php";
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2" style="margin-top: -800px">
    <h1 class="page-header">View Student</h1>
    <div class="row placeholders">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="col-lg-12">
                <div class="col-lg-3">
                    <img src="img/dp.jpg" height="250" width="230">
                </div>
                <div class="col-lg-6">  
                    <h3><i class="fa fa-id-card"></i> Student Information</h3>
                    <?php
                    foreach ($student_data as $stud) {
                        echo "<h4><i class=\"fa fa-user-circle-o\"></i> ". ucwords($stud['sfn'] . " " . $stud['sln'])." </h4>
                                <h4><i class=\"fa fa-envelope\"></i> ".$stud['se']." </h4>
                        <h3> Parent Information</h3><hr>
                        <h4><i class=\"fa fa-user-circle-o\"></i> ". ucwords($stud['pfn'] . " " . $stud['pln'])." </h4>
                                <h4><i class=\"fa fa-phone-square\"></i> ".$stud['ppn']." </h4>
                                <h4><i class=\"fa fa-map-marker\"></i> ".$stud['pa']." </h4>
                                
                                ";
                    } 
                    
                    ?>
                    <!--<h4> <i class="fa fa-user-circle-o"></i> Fullname <i class="fa fa-ellipsis-v"></i> <?php // echo ucwords($student_data['first_name'] . " " . $student_data['last_name']) ?></h5>-->
                    <!--<h4> <i class="fa fa-mortar-board"></i> Course <i class="fa fa-ellipsis-v"></i> <?php // echo ucwords($student_data['student']['course']) ?> </h4>-->
                        <!--<h4> <i class="fa fa-envelope"></i> Email <i class="fa fa-ellipsis-v"></i> <?php // echo strtolower($student_data['email'] )  ?> </h4>-->
                        <!--<h4> <i class="fa fa-flag"></i> Nationality <i class="fa fa-ellipsis-v"></i> <?php // echo strtoupper($student_data['student']['nationality'] )  ?> </h4>-->
                        <!--<h4> <i class="fa fa-birthday-cake"></i> DOB <i class="fa fa-ellipsis-v"></i> <?php // echo strtoupper($student_data['student']['dob'] )  ?> </h4>-->
                        <!--<h4> <i class="fa fa-male"></i> Gender <i class="fa fa-ellipsis-v"></i> <?php // echo ucwords($student_data['student']['gender']) ?> </h4>-->

                        
                        
                        <!--<h4><i class="fa fa-user"></i> Fullname <i class="fa fa-ellipsis-v"></i> <?php // echo ucwords($student_data['parent']['first_name'] . " " . $student_data['parent']['last_name'] )  ?></h5>-->
                        <!--<h4><i class="fa fa-phone-square"></i> Phone <i class="fa fa-ellipsis-v"></i> <?php // echo ucwords($student_data['parent']['phone_number'] )  ?> </h4>-->
                        <!--<h4><i class="fa fa-envelope-o"></i> Email <i class="fa fa-ellipsis-v"></i> <?php // echo strtolower($student_data['parent']['email'] )  ?> </h4>-->
                        <!--<h4><i class="fa fa-map-marker"></i> Address <i class="fa fa-ellipsis-v"></i> <?php // echo strtoupper($student_data['parent']['guardian_address'] )  ?> </h4>-->
                        </div>

                        <div class="col-lg-3">
                            <h3>Actions</h3>
                            <!--we are sending one data so no need for that thing.-->
                            <!--<a href=\"?action=deleteStudent&&userid=". $stud['id']. "\" class=\"btn btn-danger btn-xs\"><i class=\"fa fa-remove\"></i></a>-->
                            <?php 
                               foreach ($student_data as $stud) {
                                  echo "<a href=\"?action=deleteStudent&&userid=". $stud['id']. "\" class=\"btn btn-danger\"><i class=\"fa fa-user-times\"></i> Delete ".$stud['sfn']." ".$stud['sln']."</a>"; 
                               }
                            ?>
                        </div>
                </div>
            </div>
        </div>
