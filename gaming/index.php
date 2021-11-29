<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=0">
    <link rel="stylesheet" href="../public/css/bootstrap-5.0.0/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../public/css/public.css" type="text/css">
    <link rel="stylesheet" href="index.css" type="text/css">

    <script src='../public/js/jquery-3.5.1.js'></script>
    <script src='../public/js/bootstrap-5.0.0/bootstrap.js'></script>
    <script src='../public/js/public.js'></script>
    <script src='index.js'></script>
</head>

<body>
    <!-- Load Header -->
    <?php require_once '../public/header.html'; ?>
    <div id="content" class="row m-0 p-0 container-fluid">
        <!-- Load Aside -->
        <?php require_once '../public/aside.php'; ?>
        <!-- Article -->
        <div id="article" class="col-lg-8 col-md-10 col-sm-12 p-0 ">
            <?php
            // Load gameusername
            require_once '../gameusername/index.php';
            // Load gameloadingtimer
            require_once '../gameloadingtimer/index.php';
            // Load gameing-1
            require_once '../gameing-1/index.php';
            // Load gameing-2
            require_once '../gameing-2/index.php';
            // Load gameresult
            require_once '../gameresult/index.php';
            ?>
        </div>
    </div>
</body>