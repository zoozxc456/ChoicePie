<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=0">
    <link rel="stylesheet" href="../public/css/bootstrap-5.0.0/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../wb-public/css/public.css" type="text/css">
    <link rel="stylesheet" href="index.css" type="text/css">

    <script src='../public/js/jquery-3.5.1.js'></script>
    <script src='../public/js/bootstrap-5.0.0/bootstrap.js'></script>
    <script src='../wb-public/js/public.js'></script>
    <script src='index.js'></script>
    <!-- <script src='../bin/Controllers/indexCore.js'></script> -->
</head>

<body>
    <!-- Load Header -->
    <?php require_once '../wb-public/header.html'; ?>
    <div id="content" class="row m-0 p-0 container-fluid">
        <!-- Load Aside -->
        <?php require_once '../wb-public/aside.php'; ?>
        <!-- Article -->
        <div id="article" class="col-lg-10 col-md-10 col-sm-12 p-0 ">
            <!-- questionadding-1 -->
            <?php require_once '../wb-questionadding-1/index.php'; ?>
            <!-- questionadding-2 -->
            <?php require_once '../wb-questionadding-2/index.php'; ?>
            <!-- questionadding-3 -->
            <?php require_once '../wb-questionadding-3/index.php'; ?>
            <!-- questionadding-4 -->
            <?php //require_once '../wb-questionadding-4/index.php'; ?>
            <!-- questionadding-5 -->
            <?php require_once '../wb-questionadding-5/index.php'; ?>

        </div>
    </div>
</body>