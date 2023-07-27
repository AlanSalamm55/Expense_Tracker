<!-- app/View/dashboard.php -->



<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
            <div class="panel-body easypiechart-panel">
                <h4>Today's Expense</h4>
                <div class="easypiechart" id="easypiechart-blue" data-percent=" <?php echo $expenseToday * 0.1 ?>"><span class="percent"><?php echo $expenseToday ?></span></div>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
            <div class="panel-body easypiechart-panel">
                <h4>Yesterday's Expense</h4>
                <div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $expenseYesterday * 0.1 ?>"><span class="percent"><?php echo $expenseYesterday ?></span></div>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
            <div class="panel-body easypiechart-panel">
                <h4>Last 7 Days' Expense</h4>
                <div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $expenseLastWeek * 0.1 ?>"><span class="percent"><?php echo  $expenseLastWeek ?></span></div>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
            <div class="panel-body easypiechart-panel">
                <h4>Last 30 Days' Expenses</h4>
                <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $expenseLastMonth * 0.1 ?>"><span class="percent"><?php echo $expenseLastMonth ?></span></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
            <div class="panel-body easypiechart-panel">
                <h4>Current Year Expenses</h4>
                <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $expenseLastYear * 0.1 ?>"><span class="percent"><?php echo $expenseLastYear ?></span></div>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
            <div class="panel-body easypiechart-panel">
                <h4>Total Expenses</h4>
                <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $expenseAll * 0.1 ?>"><span class="percent"><?php echo  $expenseAll ?></span></div>
            </div>
        </div>
    </div>
</div>