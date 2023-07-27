<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Profile</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form role="form" method="post" action="">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input class="form-control" type="text" value="<?php echo $userData['name']; ?>" name="name" required="true">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $userData['email']; ?>" required="true" readonly="true">
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input class="form-control" type="text" maxlength="10" pattern="[0-9]{10}" value="<?php echo $userData['mobilenumber']; ?>" required="true" name="mobilenumber" maxlength="10">
                        </div>
                        <div class="form-group">
                            <label>Registration Date</label>
                            <input class="form-control" name="regdate" type="text" value="<?php echo $userData['RegDate']; ?>" readonly="true">
                        </div>
                        <div class="form-group has-success">
                            <button type="submit" class="btn btn-primary" name="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.panel-->
</div><!-- /.col-->
</div><!-- /.row -->