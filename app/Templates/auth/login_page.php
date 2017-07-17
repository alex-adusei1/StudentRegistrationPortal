<?php 
    include 'app/Templates/app.php'; 
?>

<div class="col-lg-4 col-lg-offset-4" style="margin-top: 150px">
    <div class="panel panel-default">
        <div class="panel-heading">
            <p class="lead"> Administrator Login </p>
            <p class="warning">if you are not an administrator please leave this page</p>
        </div>
        <div class="panel-body">
        <form class="form-horizontal" role="form" action="?action=login" method="POST">
            <div class="form-group">
                <label for="user-name" class="control-label col-lg-4">Username</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="username" id="user-name" placeholder="Username" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="pass-word" class="control-label col-lg-4">Password</label>
                <div class="col-lg-8">
                    <input type="password" class="form-control" name="password" id="pass-word" placeholder="Password" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-12">
                    <input type="submit" class="form-control btn btn-success" id="send" value="Login">
                </div>
            </div>
        </form>
    </div>
    </div>
</div>

<?php 
    include 'app/Templates/footer.php';
?>