<?php
include __DIR__ . "/header.php";
?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2" style="margin-top: -800px">
    <h1 class="page-header"><i class="fa fa-user-plus"></i> Create Student</h1>

    <div class="row placeholders">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading"> 
                    Add New Student
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="?action=saveStudent">
                        <div class="form-group">
                            <label for="firt-name" class="control-label col-lg-4">First Name</label>
                            <div class="col-lg-8">
                                <input type="text" name="first_name" id="first-name" class="form-control" placeholder="First Name" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="last-name" class="control-label col-lg-4">Last Name</label>
                            <div class="col-lg-8">
                                <input type="text" name="last_name" id="last-name" class="form-control" placeholder="First Name" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email-address" class="control-label col-lg-4">Email</label>
                            <div class="col-lg-8">
                                <input type="email" name="email" id="email-address" class="form-control" placeholder="Email Address" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="gender" class="control-label col-lg-4">Gender</label>
                            <div class="col-lg-8">
                                <label class="control-label">Male</label>    
                                <input type="radio" name="gender" value="male" checked="checked" />
                                <label class="control-label">Female</label>
                                <input type="radio" name="gender" value="female"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone-number" class="control-label col-lg-4">Phone Number</label>
                            <div class="col-lg-8">
                                <input type="tel" name="phone" id="phone-number" class="form-control" placeholder="Phone Number" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="d-o-b" class="control-label col-lg-4">Date Of Birth</label>
                            <div class="col-lg-8">
                                <input type="date" name="dob" id="d-o-b" class="form-control" placeholder="Date Of Birth" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="p-o-b" class="control-label col-lg-4">Place Of Birth</label>
                            <div class="col-lg-8">
                                <input type="text" name="place_of_birth" id="p-o-b" class="form-control" placeholder="Place Of Birth" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="m-status" class="control-label col-lg-4">Marital Status</label>
                            <div class="col-lg-8">
                                <select name="marital_status" id="m-status" class="form-control">
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="national" class="control-label col-lg-4">Nationality</label>
                            <div class="col-lg-8">
                                <?php include 'app/Templates/nationality.php'; ?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="postal-address" class="control-label col-lg-4">Postal Address</label>
                            <div class="col-lg-8">
                                <input type="text" name="postal" id="postal-address" class="form-control" placeholder="Postal Address" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="last-school" class="control-label col-lg-4">Last School</label>
                            <div class="col-lg-8">
                                <input type="text" name="last_school" id="last-school" class="form-control" placeholder="Last School" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="course" class="control-label col-lg-4">Course</label>
                            <div class="col-lg-8">
                                <select name="course" id="course" class="form-control">
                                    <option value="computer science">Computer Science</option>
                                    <option value="Bachelor of Laws">Bachelor of Laws</option>
                                    <option value="Bsc Accounting">Bsc Accounting</option>
                                    <option value="Bsc Economics">Bsc Economics</option>
                                </select>
                            </div>
                        </div>
                        <p class="lead">Parent / Guardian Info</p>
                        <hr>
                        <div class="form-group">
                            <label for="p-first-name" class="control-label col-lg-4">Guardian First Name</label>
                            <div class="col-lg-8">
                                <input type="text" name="p_first_name" id="p-first-name" class="form-control" placeholder="Guardian First Name" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="p-last-name" class="control-label col-lg-4">Guardian Last Name</label>
                            <div class="col-lg-8">
                                <input type="text" name="p_last_name" id="p-last-name" class="form-control" placeholder="Guardian Last Name" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="p-email" class="control-label col-lg-4">Guardian Email</label>
                            <div class="col-lg-8">
                                <input type="email" name="p_email" id="p-email" class="form-control" placeholder="Guardian Email" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="p-phone-number" class="control-label col-lg-4">Guardian Phone Number</label>
                            <div class="col-lg-8">
                                <input type="tel" name="p_phone_number" id="p-phone-number" class="form-control" placeholder="Guardian Phone Number" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="p-guardian-address" class="control-label col-lg-4">Guardian Address</label>
                            <div class="col-lg-8">
                                <input type="text" name="p_guardian_address" id="p-guardian-address" class="form-control" placeholder="Guardian Address" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-default form-control" ><i class="fa fa-spinner"></i> Add Student</button>
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