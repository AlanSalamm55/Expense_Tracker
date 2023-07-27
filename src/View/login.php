<?php

/** @var $model \App\Model\User */
?>

<div class="row">
    <h2 align="center">Expense Tracking site</h2>
    <hr />


    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">Log in</div>
            <div class="panel-body">


                <form role="form" action="" method="post" id="" name="login">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control <?php echo $model->hasError('email') ? 'is-invalid' : '' ?>" placeholder="E-mail" name="email" type="email" autofocus="" required="true">
                            <p style="font-size:10px; color:red" align="center">
                                <?php echo $model->getFirstError('email') ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <input class="form-control <?php echo $model->hasError('password') ? 'is-invalid' : '' ?>" placeholder="Password" name="password" type="password" value="" required="true">
                            <p style="font-size:10px; color:red" align="center">
                                <?php echo $model->getFirstError('password') ?>
                            </p>
                        </div>
                        <div class="checkbox">
                            <button type="submit" value="login" name="login" class="btn btn-primary">login</button>
                            <span style="padding-left:250px">
                                <a href="register" class="btn btn-primary">Register</a></span>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>