<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=0">
    <link rel="stylesheet" href="../public/css/bootstrap-5.0.0/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../wb-public/css/public.css" type="text/css">
    <link rel="stylesheet" href="index.css" type="text/css">

    <script src='../public/js/jquery-3.5.1.js'></script>
    <script src='../public/js/bootstrap-5.0.0/bootstrap.js'></script>
    <script src='../wb-public/js/public.js'></script>
    <script src='index.js'></script>
    <script src="../bin/Controllers/wb-unreviewed.js"></script>
</head>

<body>
    <!-- Require Header -->
    <?php require_once '../wb-public/header.html'; ?>
    <div id="content" class="row m-0 p-0 container-fluid">
        <!-- Require Aside -->
        <?php require_once '../wb-public/aside.php'; ?>
        <div id="article" class="col-md-10 col-sm-12 p-0">

            <!-- title -->
            <div class="top d-md-flex justify-content-between mx-sm-3 mx-md-0">
                <div class="d-flex d-md-block justify-content-around">
                    <div class="title text-start order-1 me-1 me-lg-2 align-self-center">
                        Unreviewed List
                    </div>
                    <div class="totnum text-start order-2 ms-1 me-lg-2 align-self-center d-flex">
                        <p class="tot m-0 me-1">total :</p>
                        <p class="num m-0"></p>
                    </div>
                </div>

                <div
                    class="search text-end d-flex justify-content-around order-3 order-sm-4 mx-auto mx-md-0 mb-2 mb-md-0">
                    <input type="search" class="form-control input rounded-pill " placeholder="search"
                        aria-label="Search"> </input>
                    <button><img class="" src="../src/img/search.png" width="50px" height="50px"></button>
                </div>
                <div id="options" class="text-start order-4 order-sm-3">
                    <select class="form-select">
                        <option value="ALL" selected>ALL</option>
                        <option value="Game">Game</option>
                        <option value="Report">Report</option>
                    </select>
                </div>

                <!-- <div class="col-sm-3 title text-start">
                    Unreviewed List
                </div>
                <div class="col-sm-2 totnum text-start">
                    <p class="tot">total :</p>
                    <p class="num"></p>
                </div>
                <div class="col-sm-2 totnum text-start">
                    <select class="form-select">
                        <option>ALL</option>
                        <option>Game</option>
                        <option>Report</option>
                    </select>
                </div>
                <div class="col-sm search text-end d-flex justify-content-end">
                    <input type="search" class="form-control input rounded-pill " placeholder="search"
                        aria-label="Search"> </input>
                    <button><img class="" src="../src/img/search.png" width="50px" height="50px"></button>
                </div> -->

            </div>
            <div class="row">
                <!-- <div id="radioOP" class="col-sm text-center d-flex justify-content-around"
                    style="font-size: 3vh;padding-bottom:2vh;">
                    <div><input type="radio" name="option" value="Game"><label>Game</label></div>
                    <div><input type="radio" name="option" value="Report">
                        <lable>Report</lable>
                    </div>
                    <div><input type="radio" name="option" value="ALL" CHECKED><label>ALL</label></div>
                </div> -->
            </div>

            <!-- middle-->
            <!-- middle sm -->
            <div class="row smlist mt-5">
                <!-- detail -->

                <!-- footer -->
                <div class="row">
                    <!-- <footer class="col site-footer">
                        <ul class="btn-group RecordPage p-0 ">
                            <li class="px-2"><button id="btn1" type="button"
                                    class="p-0 text-center rounded-circle btn">1</button></li>
                            <li class="px-2"><button id="btn1" type="button"
                                    class="p-0 text-center rounded-circle btn">2</button></li>
                            <li class="px-2"><button id="btn1" type="button"
                                    class="p-0 text-center rounded-circle btn">3</button></li>
                        </ul>
                    </footer> -->
                </div>
            </div>

            <!-- middle lg -->
            <div class="row lglist">
                <div id="RecordList" class="col">
                    <!-- title -->
                    <div class="col">
                        <div class="row listtitle">
                            <div class="lt col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4">
                                <button class="titleitem" id="name">
                                    name ▲
                                </button>
                            </div>
                            <div class="lt col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5">
                                <button class="titleitem" id="time">
                                    time ▲
                                </button>
                            </div>
                            <div class="lt col p-0 text-center ml-xxl-5">
                                <button class="titleitem" id="amount">
                                    amount ▲
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- detail -->
                    <ul class="list">
                    </ul>
                </div>
            </div>


        </div>
    </div>
    </div>
</body>