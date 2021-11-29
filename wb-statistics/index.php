<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=0">
    <link rel="stylesheet" href="../public/css/bootstrap-5.0.0/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../wb-public/css/public.css" type="text/css">
    <link rel="stylesheet" href="index.css" type="text/css">


</head>

<body>
    <!-- Load Header -->
    <?php require_once '../wb-public/header.html'; ?>
    <div id="content" class="row m-0 p-0 container-fluid">
        <!-- Load Aside -->
        <?php require_once '../wb-public/aside.php'; ?>

        <!-- Article -->
        <div id="article" class="col-md-10 col-sm-12 p-0">
            <div class="row" id="top">
                <div id="mainTitle" class="col title" style="color:#F15F2B;">Statistics</div>
                <!-- button -->
                <div class="col d-flex justify-content-center text-center" id="button-container">
                    <button class="chartbtn click" id="visitor">visitor</button>
                    <button class="chartbtn" id="questions">question</button>
                    <button class="chartbtn" id="members">member</button>
                </div>
            </div>
            <!-- top -->
            <div class="col">
                <div class="row cubeclass-2">
                    <!-- top left-->
                    <div class="col bargraph">

                        <!-- chart -->
                        <svg class="svg">

                        </svg>
                    </div>
                    <!-- top right -->
                    <div class="col datelist">
                        <ul class="list-group">
                            <li class="list-group-item">2021/01/18</li>
                            <li class="list-group-item">2021/01/19</li>
                            <li class="list-group-item">2021/01/20</li>
                            <li class="list-group-item">2021/01/21</li>
                            <li class="list-group-item">2021/01/22</li>
                            <li class="list-group-item">2021/01/23</li>
                            <li class="list-group-item active">2021/01/24</li>
                        </ul>
                    </div>
                    <!-- datebutton -->
                    <div class="dd">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                                DATE
                            </button>
                            <div class="collapse" id="datelist">
                                <ul class="list-group">
                                    <li class="list-group-item">2021/01/18</li>
                                    <li class="list-group-item">2021/01/19</li>
                                    <li class="list-group-item">2021/01/20</li>
                                    <li class="list-group-item">2021/01/21</li>
                                    <li class="list-group-item">2021/01/22</li>
                                    <li class="list-group-item">2021/01/23</li>
                                    <li class="list-group-item active">2021/01/24</li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <!-- bottom -->
            <div class="col cubeclass">
                <div class="row">
                    <!-- bottom left-->
                    <div class="col cube">
                        <p class="time">2021/01/24 14:00</p>
                        <p class="visitor">count :</p>
                        <p class="num"></p>
                    </div>
                    <!-- bottom right -->
                    <div class="col date">
                        <p class="avgday"> Average/Hour</p>
                        <p class="avg"></p>
                    </div>
                </div>
            </div>

        </div>


        <script type="text/javascript" src="../public/js/d3.js"></script>
        <script src='../public/js/jquery-3.5.1.js'></script>
        <script src='../public/js/bootstrap-5.0.0/bootstrap.js'></script>
        <script src='../wb-public/js/public.js'></script>
        <script src='index.js'></script>
        <script src='../bin/Controllers/wb-statistics.js'></script>
</body>