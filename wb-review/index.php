<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=0">
    <link rel="stylesheet" href="../public/css/bootstrap-5.0.0/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../wb-public/css/public.css" type="text/css">
    <link rel="stylesheet" href="index.css" type="text/css">

    <script type="text/javascript" src="../public/js/d3.js"></script>
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
        <div id="article" class="col-md-10 col-sm-12 p-0">
            <div class="row">
                <!-- Left -->
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col title">Unreviewed</div>
                    </div>
                    <!-- Pie -->
                    <div class="row cubeclass">
                        <div class="col cube">
                            <div class="cc">
                                <g class="pie1">
                                    <!-- Pie chart -->
                                </g>

                                <p class="cctext">total:
                                    <span id="Unreviewed_total" class="ccnum"></span>
                                </p>
                                <div class="crt">
                                    <div>
                                        <p class="c" style="background:#F8931D;"></p>
                                        <p class="Reporttext">Question</p>
                                    </div>
                                    <div>
                                        <p class="c"></p>
                                        <p class="Reporttext">Report</p>
                                    </div>
                                </div>
                                <!-- <div class="crt">

                                </div>
                                <div class="crt">
                                    <p class="c"></p>
                                    <p class="Reporttext">REPORT</p>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- Number -->
                    <div id="Unreviewed_box" class="row cubeclass">
                        <div class="col cube1">
                            <p class="report">REPORT</p>
                            <p class="num"></p>
                        </div>
                        <div class="col cube2">
                            <p class="add">ADD</p>
                            <p class="num"></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col title">Audited</div>
                    </div>
                    <!-- Pie -->
                    <div class="row cubeclass">
                        <div class="col cube">
                            <div class="cc">
                                <g class="pie2">
                                    <!-- Pie chart -->
                                </g>

                                <p class="cctext">total:
                                    <span id="Audited_total" class="ccnum">690</span>
                                </p>
                                <div class="crt">
                                    <div>
                                        <p class="c" style="background:#F8931D;"></p>
                                        <p class="Reporttext">Question</p>
                                    </div>
                                    <div>
                                        <p class="c"></p>
                                        <p class="Reporttext">Report</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Number -->
                    <div id="Audited_box" class="row cubeclass">
                        <div class="col cube1">
                            <p class="report">REPORT</p>
                            <p class="num">103</p>
                        </div>
                        <div class="col cube2">
                            <p class="add">ADD</p>
                            <p class="num">587</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</body>