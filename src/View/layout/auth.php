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
    <style>
        .is-invalid {
            border-color: #dc3545;
            padding-right: calc(1.5em + .75rem);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23dc3545'%3e%3cpath d='M11.354 0.646a.5.5 0 0 0-.707 0L6 5.293 1.354.646a.5.5 0 0 0-.707 0l-.708.708a.5.5 0 0 0 0 .707L5.293 6l-4.647 4.646a.5.5 0 0 0 0 .707l.708.708a.5.5 0 0 0 .707 0L6 6.707l4.646 4.647a.5.5 0 0 0 .707 0l.708-.708a.5.5 0 0 0 0-.707L6.707 6l4.647-4.646a.5.5 0 0 0 0-.707l-.708-.708z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(.375em + .1875rem) center;
            background-size: calc(.75em + .375rem) calc(.75em + .375rem);
        }
    </style>

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
<?php endif; ?>

<div class="container-fluid">
    <?php if (Application::$app->session->getFlash('success')) : ?>
        <div class="container">
            <div class="alert alert-success">
                <?php echo Application::$app->session->getFlash('success') ?>
            </div>
        </div>
    <?php endif; ?>
    {{content}}
</div>



<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/scripts.js"></script>

</body>

</html>