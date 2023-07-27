<?php

/** @var $model \App\Model\User */
?>

<script type="text/javascript">
    function checkpass() {
        if (document.signup.password.value != document.signup.repeatpassword.value) {
            alert('Password and Repeat Password field does not match');
            document.signup.repeatpassword.focus();
            return false;
        }
        return true;
    }
</script>

<div class="row">
    <h2 align="center">Expense Tracking site</h2>
    <hr />
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">Sign Up</div>
            <div class="panel-body">
                <form role="form" action="" method="post" id="" name="signup" onsubmit="return checkpass();">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control <?php echo $model->hasError('name') ? 'is-invalid' : '' ?>" placeholder="Full Name" name="name" type="text" required="true">
                            <p style="font-size:10px; color:red" align="center">
                                <?php echo $model->getFirstError('name') ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <input class="form-control <?php echo $model->hasError('email') ? 'is-invalid' : '' ?>" placeholder="E-mail" name="email" type="email" required="true">
                            <p style="font-size:10px; color:red" align="center">
                                <?php echo $model->getFirstError('email') ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control <?php echo $model->hasError('mobilenumber') ? 'is-invalid' : '' ?>" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number" maxlength="10" pattern="[0-9]{10}" required="true">
                            <p style="font-size:10px; color:red" align="center">
                                <?php echo $model->getFirstError('mobilenumber') ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <input class="form-control <?php echo $model->hasError('password') ? 'is-invalid' : '' ?>" placeholder="Password" name="password" type="password" value="">
                            <p style="font-size:10px; color:red" align="center">
                                <?php echo $model->getFirstError('password') ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <input class="form-control <?php echo $model->hasError('repeatpassword') ? 'is-invalid' : '' ?>" id="repeatpassword" name="repeatpassword" type="password" placeholder="Repeat Password" required="true">
                            <p style="font-size:10px; color:red" align="center">
                                <?php echo $model->getFirstError('repeatpassword') ?>
                            </p>
                        </div>
                        <div class="checkbox">
                            <button type="submit" value="submit" name="submit" class="btn btn-primary">Register</button>
                            <span style="padding-left:250px">
                                <a href="login" class="btn btn-primary">Login</a>
                            </span>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->