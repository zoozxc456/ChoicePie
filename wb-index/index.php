<?php
$path = "../public/history.json";
$file = json_decode(file_get_contents($path), true);
$cnt = count($file);
?>
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
</head>

<body>
    <!-- Load Header -->
    <?php require_once '../wb-public/header.html'; ?>
    <div id="content" class="row m-0 p-0 container-fluid">
        <!-- Load Aside -->
        <?php require_once '../wb-public/aside.php'; ?>

        <!-- Article -->
        <div id="article" class="col-lg-10 col-md-8 col-sm-12 p-0">
            <div class="row">
                <div class="col title">Statistics </div>
            </div>
            <div class="row cubeclass">
                <div id="Visitor" class="col cube">
                    <p>Visitor</p>
                    <p class="text"><?php echo $cnt; ?></p>
                </div>
                <div id="Questions" class="col cube">
                    <p>Questions</p>
                    <p class="text"></p>
                </div>
                <div id="Members" class="col cube">
                    <p>Members</p>
                    <p class="text"></p>
                </div>
            </div>

            <div class="row">
                <div class="col title">Review </div>
            </div>
            <div class="row cubeclass">
                <div id="Unreviewed" class="col cube">
                    <p>Unreviewed</p>
                    <p class="text"></p>
                </div>
                <div id="Audited" class="col cube">
                    <p>Audited</p>
                    <p class="text"></p>
                </div>
            </div>


        </div>

    </div>

</body>