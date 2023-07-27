<h2>Change Password</h2>

<form method="post" action="">
    <div class="form-group">
        <label>Current Password</label>
        <input type="password" name="currentPassword" class="form-control <?php echo $model->hasError('currentPassword') ? 'is-invalid' : '' ?>" required>
        <p style="font-size:10px; color:red" align="center">
            <?php echo $model->getFirstError('currentPassword') ?>
        </p>
    </div>
    <div class="form-group">
        <label>New Password</label>
        <input type="password" name="newPassword" class="form-control <?php echo $model->hasError('newPassword') ? 'is-invalid' : '' ?>" required>
        <p style="font-size:10px; color:red" align="center">
            <?php echo $model->getFirstError('newPassword') ?>
        </p>
    </div>
    <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" name="confirmPassword" class="form-control <?php echo $model->hasError('confirmPassword') ? 'is-invalid' : '' ?>" required>
        <p style="font-size:10px; color:red" align="center">
            <?php echo $model->getFirstError('confirmPassword') ?>
        </p>
    </div>
    <button type="submit" class="btn btn-primary">Change Password</button>
</form>