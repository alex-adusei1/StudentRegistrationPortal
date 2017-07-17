<?php
include __DIR__ . "/header.php";
?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2" style="margin-top: -800px">
    <h1 class="page-header"><i class="fa fa-user-plus"></i> Update Student</h1>

    <div class="row placeholders">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading"> 
                    Update Student
                </div>
                <div class="panel-body">
                    <p class="lead">Student Info</p>
                    <hr>
                    <?php
                    foreach ($student_data as $stud) {
                        echo "
                                    
                    <form class=\"form-horizontal\" role=\"form\" method=\"POST\" action=\"?action=updateStudent&&userid=" . $stud['id'] . "\">
                                    <div class=\"form-group\">
                            <label for=\"firt-name\" class=\"control-label col-lg-4\">First Name</label>
                            <div class=\"col-lg-8\">
                                <input type=\"text\" name=\"first_name\" id=\"first-name\" class=\"form-control tags\" value=\"" . $stud['first_name'] . "\" required>
                            </div>
                        </div>
                        
                        <div class=\"form-group\">
                            <label for=\"last-name\" class=\"control-label col-lg-4\">Last Name</label>
                            <div class=\"col-lg-8\">
                                <input type=\"text\" name=\"last_name\" id=\"last-name\" class=\"form-control tags\" value=\"" . $stud['last_name'] . "\" required>
                            </div>
                        </div>
                        
                        <div class=\"form-group\">
                            <label for=\"email-address\" class=\"control-label col-lg-4\">Email</label>
                            <div class=\"col-lg-8\">
                                <input type=\"email\" name=\"email\" id=\"email-address\" class=\"form-control\" value=\"" . $stud['email'] . "\" required>
                            </div>
                        </div>
                        ";
                    }
                    ?>
                    <?php
                    foreach ($parent_data as $parent) {
                        echo "
                        <p class=\"lead\">Parent / Guardian Info</p>
                        <hr>
                        <div class=\"form-group\">
                            <label for=\"p-first-name\" class=\"control-label col-lg-4\">Guardian First Name</label>
                            <div class=\"col-lg-8\">
                                <input type=\"text\" name=\"p_first_name\" id=\"p-first-name\" class=\"form-control tags\" value=\"" . $parent['first_name'] . "\" required>
                            </div>
                        </div>
                        
                        <div class=\"form-group\">
                            <label for=\"p-last-name\" class=\"control-label col-lg-4\">Guardian Last Name</label>
                            <div class=\"col-lg-8\">
                                <input type=\"text\" name=\"p_last_name\" id=\"p-last-name\" class=\"form-control tags\" value=\"" . $parent['last_name'] . "\" required>
                            </div>
                        </div>
                        
                        <div class=\"form-group\">
                            <label for=\"p-phone-number\" class=\"control-label col-lg-4\">Guardian Phone Number</label>
                            <div class=\"col-lg-8\">
                                <input type=\"tel\" name=\"p_phone_number\" id=\"p-phone-number\" class=\"form-control\" value=\"" . $parent['phone_number'] . "\" required>
                            </div>
                        </div>
                        
                        <div class=\"form-group\">
                            <label for=\"p-guardian-address\" class=\"control-label col-lg-4\">Guardian Address</label>
                            <div class=\"col-lg-8\">
                                <input type=\"text\" name=\"p_guardian_address\" id=\"p-guardian-address\" class=\"form-control\" value=\"" . $parent['address'] . "\" required>
                            </div>
                        </div>


                                    ";
                    }
                    ?>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-default form-control" ><i class="fa fa-spinner"></i> Update Student</button>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<?php include 'app/Templates/footer.php' ?>