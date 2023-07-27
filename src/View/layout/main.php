<?php

use App\Config\Application;

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Expenses Tracker</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/datepicker3.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" style="font-size:16px; " href="home"><span>Home</span></a>
                <?php if (Application::isGuest()) : ?>
                    <a class="navbar-brand" style="font-size:16px; " href="login"><span>login</span></a>
            </div>
        <?php else : ?>
            <a class="navbar-brand" style="font-size:16px; " href="logout"><span>logout</span></a>
        </div>
    </nav>

    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
            <div class="profile-userpic">
                <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name"><?php echo Application::$app->user->getDisplayName(); ?></div>
                <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
        <ul class="nav menu">
            <li class="active"><a href="dashboard"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                    <em class="fa fa-navicon">&nbsp;</em>Expenses <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-1">
                    <li><a class="" href="add-expense">
                            <span class="fa fa-arrow-right">&nbsp;</span> Add Expenses
                        </a></li>
                    <li><a class="" href="manageExpenses">
                            <span class="fa fa-arrow-right">&nbsp;</span> Manage Expenses
                        </a></li>
                </ul>
            </li>

            <li><a href="user-profile"><em class="fa fa-user">&nbsp;</em> Profile</a></li>
            <li><a href="change-password"><em class="fa fa-clone">&nbsp;</em> Change Password</a></li>
            <li><a href="logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
    </div>
<?php endif; ?>

<div style="margin-left: 25rem;" class="container-fluid">
    <?php if (Application::$app->session->getFlash('success')) : ?>
        <div class="container">
            <div class="alert alert-success">
                <?php echo Application::$app->session->getFlash('success') ?>
            </div>
        </div>

    <?php endif; ?>
    <div>
        {{content}}
    </div>
</div>


<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/chart.min.js"></script>
<script src="assets/js/chart-data.js"></script>
<script src="assets/js/easypiechart.js"></script>
<script src="assets/js/easypiechart-data.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>
<script src="assets/js/custom.js"></script>
<script>
    window.onload = function() {
        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });
    };
</script>

</body>

</html>