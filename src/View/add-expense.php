<div class="row">
    <div class="col-lg-12">



        <div class="panel panel-default">
            <div class="panel-heading">Expense</div>
            <div class="panel-body">
                <div class="col-md-12">

                    <form role="form" method="post" action="">
                        <div class="form-group">
                            <label>Date of Expense</label>
                            <input class="form-control  <?php echo $model->hasError('ExpenseDate') ? 'is-invalid' : '' ?>" type="date" value="" name="ExpenseDate" required="true">
                            <p style="font-size:10px; color:red" align="center">
                                <?php echo $model->getFirstError('ExpenseDate') ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Item</label>
                            <input type="text" class="form-control  <?php echo $model->hasError('ExpenseItem') ? 'is-invalid' : '' ?>" name="ExpenseItem" value="" required="true">
                            <p style="font-size:10px; color:red" align="center">
                                <?php echo $model->getFirstError('ExpenseItem') ?>
                            </p>
                        </div>

                        <div class="form-group">
                            <label>Cost of Item</label>
                            <input class="form-control  <?php echo $model->hasError('ExpenseCost') ? 'is-invalid' : '' ?>" type="text" value="" required="true" name="ExpenseCost">
                            <p style="font-size:10px; color:red" align="center">
                                <?php echo $model->getFirstError('ExpenseCost') ?>
                            </p>
                        </div>

                        <div class="form-group has-success">
                            <button type="submit" class="btn btn-primary" name="submit">Add</button>
                        </div>


                </div>

                </form>
            </div>
        </div>
    </div><!-- /.panel-->
</div><!-- /.col-->