<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Expense</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered mg-b-0">
                            <thead>
                                <tr>
                                    <th>S.NO</th>
                                    <th>Expense Item</th>
                                    <th>Expense Cost</th>
                                    <th>Expense Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($allExpenses as $row) { ?>
                                    <tr>
                                        <td><?php echo $row['ID']; ?></td>
                                        <td><?php echo $row['ExpenseItem']; ?></td>
                                        <td><?php echo $row['ExpenseCost']; ?></td>
                                        <td><?php echo $row['ExpenseDate']; ?></td>
                                        <td>
                                            <form method="post" action="">
                                                <input type="hidden" name="delid" value="<?php echo $row['ID']; ?>">
                                                <button type="submit" name="expenseId" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.panel-->
    </div><!-- /.col-->

</div><!-- /.row -->
</div><!--/.main-->