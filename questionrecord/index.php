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
    <!-- Require Header -->
    <?php require_once '../public/header.html'; ?>
    <div id="content" class="row m-0 p-0 container-fluid">
        <!-- Require Aside -->
        <?php require_once '../public/aside.php'; ?>
        <div id="article" class="col-lg-8 col-md-10 col-sm-12 p-0">
            <!-- top button-->
            <div class="row mt-2">
                <nav class="col" style="z-index:0 !important">
                    <div class="row btntitle">
                        <ul class="d-flex justify-content-center">
                            <a href="../gamerecord">
                                <li class="col rounded-pill btn" id="btn">
                                    Game
                                </li>
                            </a>
                            <a href="../questionrecord">
                                <li class="col rounded-pill btn" id="thisbtn">
                                    Question
                                </li>
                            </a>
                        </ul>
                    </div>
                </nav>
            </div>

            <!-- middle-->
            <!-- middle sm -->
            <div class="row smlist">
                <!-- title -->
                <div class="row">
                    <div class="col title">
                        Game Name
                    </div>
                </div>
                <!-- detail -->
                <!-- <div class="row">
                    <button type="button" class="btn btn-warning">Privacy 2021</button>

                    <ul class="collapse">
                        <li class="row my-2 w-100 text-center">
                            <div class="col p-0 text-center mx-3">
                                <p class="text">amount</p>
                                <p class="">10</p>
                            </div>
                            <div class="col p-0 text-center mx-3">
                                <p class="text">time</p>
                                <p class="">2021/3/1</p>
                            </div>
                            <div class="col p-0 text-center mx-3">
                                <p class="text">result</p>
                                <a href="../searchgameresult"><img class="collapseimg" src="../src/img/privacy.png"></a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <button type="button" class="btn btn-warning">information architecture</button>

                    <ul class="collapse">
                        <li class="row my-2 w-100 text-center">
                            <div class="col p-0 text-center mx-3">
                                <p class="text">amount</p>
                                <p class="">10</p>
                            </div>
                            <div class="col p-0 text-center mx-3">
                                <p class="text">time</p>
                                <p class="">2020/12/29</p>
                            </div>
                            <div class="col p-0 text-center mx-3">
                                <p class="text">result</p>
                                <a href="../searchgameresult"><img class="collapseimg" src="../src/img/privacy.png"></a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <button type="button" class="btn btn-warning">Privacy 2020</button>

                    <ul class="collapse">
                        <li class="row my-2 w-100 text-center">
                            <div class="col p-0 text-center mx-3">
                                <p class="text">amount</p>
                                <p class="">10</p>
                            </div>
                            <div class="col p-0 text-center mx-3">
                                <p class="text">time</p>
                                <p class="">2020/2/24</p>
                            </div>
                            <div class="col p-0 text-center mx-3">
                                <p class="text">result</p>
                                <a href="../searchgameresult"><img class="collapseimg" src="../src/img/privacy.png"></a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <button type="button" class="btn btn-warning">BTS COPY</button>

                    <ul class="collapse">
                        <li class="row my-2 w-100 text-center">
                            <div class="col p-0 text-center mx-3">
                                <p class="text">amount</p>
                                <p class="">10</p>
                            </div>
                            <div class="col p-0 text-center mx-3">
                                <p class="text">time</p>
                                <p class="">2020/12/29</p>
                            </div>
                            <div class="col p-0 text-center mx-3">
                                <p class="text">result</p>
                                <a href="../searchgameresult"><img class="collapseimg"
                                        src="../src/img/letter-c.png"></a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <button type="button" class="btn btn-warning">KPOP MUSIC</button>

                    <ul class="collapse">
                        <li class="row my-2 w-100 text-center">
                            <div class="col p-0 text-center mx-3">
                                <p class="text">amount</p>
                                <p class="">10</p>
                            </div>
                            <div class="col p-0 text-center mx-3">
                                <p class="text">time</p>
                                <p class="">2020/12/29</p>
                            </div>
                            <div class="col p-0 text-center mx-3">
                                <p class="text">result</p>
                                <a href="../searchgameresult"><img class="collapseimg"
                                        src="../src/img/letter-c.png"></a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <button type="button" class="btn btn-warning">KPOP MUSIC</button>

                    <ul class="collapse">
                        <li class="row my-2 w-100 text-center">
                            <div class="col p-0 text-center mx-3">
                                <p class="text">amount</p>
                                <p class="">10</p>
                            </div>
                            <div class="col p-0 text-center mx-3">
                                <p class="text">time</p>
                                <p class="">2020/12/29</p>
                            </div>
                            <div class="col p-0 text-center mx-3">
                                <p class="text">result</p>
                                <a href="../searchgameresult"><img class="collapseimg" src="../src/img/privacy.png"></a>
                            </div>
                        </li>
                    </ul>
                </div>-->
            </div>

            <!-- middle lg -->
            <div class="row lglist">
                <div id="RecordList" class="col">
                    <!-- title -->
                    <div class="col">
                        <div class="row text">
                            <div class="col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4">game name</div>
                            <div class="col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5">amount</div>
                            <div class="col p-0 text-center ml-xxl-5">time</div>
                            <div class="col p-0 text-center mx-2 mx-md-4 me-xl-5 mx-xxl-5">result</div>
                        </div>
                    </div>
                    <!-- detail -->
                    <ul class="p-0 w-100">
                        <!-- <li class="row my-2 w-100 text-center">
                            <div class="col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4 fs-4">Privacy 2021
                            </div>
                            <div class="col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5 fs-4">10</div>
                            <div class="col p-0 text-center ml-xxl-5 fs-4">2021/3/1</div>
                            <div class="col p-0 text-center mx-2 mx-md-4 me-xl-5 mx-xxl-5">
                                <a href="../searchgameresult"><img src="../src/img/privacy.png"></a>
                            </div>
                        </li>
                        <li class="row my-2 w-100 text-center">
                            <div class="col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4 fs-4">KPOP MUSIC
                                architecture</div>
                            <div class="col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5 fs-4">6</div>
                            <div class="col p-0 text-center ml-xxl-5 fs-4">2020/10/03</div>
                            <div class="col p-0 text-center mx-2 mx-md-4 me-xl-5 mx-xxl-5">
                                <a href="../searchgameresult"><img src="../src/img/letter-c.png"></a>
                            </div>
                        </li>
                        <li class="row my-2 w-100 text-center">
                            <div class="col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4 fs-4">Privacy 2020
                            </div>
                            <div class="col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5 fs-4">10</div>
                            <div class="col p-0 text-center ml-xxl-5 fs-4">2020/2/24</div>
                            <div class="col p-0 text-center mx-2 mx-md-4 me-xl-5 mx-xxl-5">
                                <a href="../searchgameresult"><img src="../src/img/privacy.png"></a>
                            </div>
                        </li>
                        <li class="row my-2 w-100 text-center">
                            <div class="col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4 fs-4">BTS COPY</div>
                            <div class="col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5 fs-4">6</div>
                            <div class="col p-0 text-center ml-xxl-5 fs-4">2021/4/12</div>
                            <div class="col p-0 text-center mx-2 mx-md-4 me-xl-5 mx-xxl-5">
                                <a href="../searchgameresult"><img src="../src/img/privacy.png"></a>
                            </div>
                        </li>
                        <li class="row my-2 w-100 text-center">
                            <div class="col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4 fs-4">KPOP MUSIC
                            </div>
                            <div class="col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5 fs-4">10</div>
                            <div class="col p-0 text-center ml-xxl-5 fs-4">2020/12/29</div>
                            <div class="col p-0 text-center mx-2 mx-md-4 me-xl-5 mx-xxl-5">
                                <a href="../searchgameresult"><img src="../src/img/letter-c.png"></a>
                            </div>
                        </li>
                        <li class="row my-2 w-100 text-center">
                            <div class="col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4 fs-4">KPOP MUSIC
                            </div>
                            <div class="col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5 fs-4">6</div>
                            <div class="col p-0 text-center ml-xxl-5 fs-4">2020/10/03</div>
                            <div class="col p-0 text-center mx-2 mx-md-4 me-xl-5 mx-xxl-5">
                                <a href="../searchgameresult"><img src="../src/img/letter-c.png"></a>
                            </div>
                        </li> -->

                    </ul>
                </div>
            </div>

            <!-- null -->
            <div id="RecordList-null" class="col text-center">
                <img src="../src/img/pie-dot.png" id="pie" width="150px" height="150px">
                <p class="null-txt">No Record</p>
            </div>


            <!-- footer -->
            <div class="row">
                <footer class="col site-footer">
                    <ul class="btn-group RecordPage p-0 ">
                        <li class="px-2">
                            <!-- <button type="button" class="p-0 text-center rounded-circle btn">1</button> -->
                        </li>
                        <!-- <li class="px-2"><button id="btn1" type="button"
                                class="p-0 text-center rounded-circle btn">2</button></li>
                        <li class="px-2"><button id="btn1" type="button"
                                class="p-0 text-center rounded-circle btn">3</button></li> -->
                    </ul>
                </footer>
            </div>
        </div>
    </div>
    </div>
    <!-- Right Bar -->
    <button class="pluebtn" data-toggle="tooltip" data-placement="top" title="My Profile!">
        <img src="../src/img/user.png" id="plu">
    </button>
</body>