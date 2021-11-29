<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=0">
    <link rel="stylesheet" href="../public/css/bootstrap-5.0.0/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../wb-public/css/public.css" type="text/css">
    <link rel="stylesheet" href="index.css" type="text/css">
</head>

<body>
    <!-- Require Header -->
    <?php require_once '../wb-public/header.html'; ?>
    <div id="content" class="row m-0 p-0 container-fluid">
        <!-- Require Aside -->
        <?php require_once '../wb-public/aside.php'; ?>
        <div id="article" class="col-md-10 col-sm-12 p-0">

            <!-- title -->
            <div class="row top">
                <div class="col-2 title text-start">
                    Game List
                </div>
                <div class="col-2 totnum text-start">
                    <p class="tot">total :</p>
                    <p class="num">10</p>
                    <div class="add text-start">
                        <button><img id="plu" src="../src/img/plus2.png" width="40px" height="40px"></button>
                    </div>
                </div>

                <div class="col search text-end">
                    <input class="input rounded-pill " placeholder="search"> </input>
                    <button><img class="" src="../src/img/search.png" width="50px" height="50px"></button>
                </div>
            </div>

            <!-- middle-->
            <!-- middle sm -->
            <div class="row smlist">
                <!-- detail -->

                <!-- footer -->
                <!-- <div class="row">
                    <footer class="col site-footer">
                        <ul class="btn-group RecordPage p-0 ">
                            <li class="px-2"><button id="btn1" type="button" class="p-0 text-center rounded-circle btn">1</button></li>
                            <li class="px-2"><button id="btn1" type="button" class="p-0 text-center rounded-circle btn">2</button></li>
                            <li class="px-2"><button id="btn1" type="button" class="p-0 text-center rounded-circle btn">3</button></li>
                        </ul>
                    </footer>
                </div> -->
            </div>

            <!-- middle lg -->
            <div class="row lglist">
                <div id="RecordList" class="col">
                    <!-- title -->
                    <div class="row listtitle">
                        <div class="lt col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4">
                            <button class="titleitem titlestyle" id="name">
                                game name ▲
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
                    <!-- detail -->
                    <ul class="list">
                        <!-- <li class="row my-2 text-center">
                            <div class="col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4 fs-4">KPOP MUSIC
                            </div>
                            <div class="col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5 fs-4">2020/12/29</div>
                            <div class="col p-0 text-center ml-xxl-5 fs-4">10</div>
                        </li>
                        <li class="row my-2 text-center">
                            <div class="col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4 fs-4">KPOP MUSIC
                            </div>
                            <div class="col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5 fs-4">2020/12/29</div>
                            <div class="col p-0 text-center ml-xxl-5 fs-4">10</div>
                        </li>
                        <li class="row my-2 w-100 text-center">
                            <div class="col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4 fs-4">KPOP MUSIC
                            </div>
                            <div class="col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5 fs-4">2020/12/29</div>
                            <div class="col p-0 text-center ml-xxl-5 fs-4">10</div>
                        </li>
                        <li class="row my-2 w-100 text-center">
                            <div class="col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4 fs-4">KPOP MUSIC
                            </div>
                            <div class="col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5 fs-4">2020/12/29</div>
                            <div class="col p-0 text-center ml-xxl-5 fs-4">10</div>
                        </li>
                        <li class="row my-2 w-100 text-center">
                            <div class="col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4 fs-4">KPOP MUSIC
                            </div>
                            <div class="col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5 fs-4">2020/12/29</div>
                            <div class="col p-0 text-center ml-xxl-5 fs-4">10</div>
                        </li>
                        <li class="row my-2 w-100 text-center">
                            <div class="col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4 fs-4">KPOP MUSIC
                            </div>
                            <div class="col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5 fs-4">2020/12/29</div>
                            <div class="col p-0 text-center ml-xxl-5 fs-4">10</div>
                        </li>
                        <li class="row my-2 w-100 text-center">
                            <div class="col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4 fs-4">KPOP MUSIC
                            </div>
                            <div class="col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5 fs-4">2020/12/29</div>
                            <div class="col p-0 text-center ml-xxl-5 fs-4">10</div>
                        </li>
                        <li class="row my-2 w-100 text-center">
                            <div class="col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4 fs-4">KPOP MUSIC
                            </div>
                            <div class="col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5 fs-4">2020/12/29</div>
                            <div class="col p-0 text-center ml-xxl-5 fs-4">10</div>
                        </li>
                        <li class="row my-2 w-100 text-center">
                            <div class="col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4 fs-4">KPOP MUSIC
                            </div>
                            <div class="col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5 fs-4">2020/12/29</div>
                            <div class="col p-0 text-center ml-xxl-5 fs-4">10</div>
                        </li>
                        <li class="row my-2 w-100 text-center">
                            <div class="col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4 fs-4">KPOP MUSIC
                            </div>
                            <div class="col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5 fs-4">2020/12/29</div>
                            <div class="col p-0 text-center ml-xxl-5 fs-4">10</div>
                        </li>
                        <li class="row my-2 w-100 text-center">
                            <div class="col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5 mx-xxxl-4 fs-4">∠( ᐛ 」∠)＿
                            </div>
                            <div class="col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5 fs-4">2020/12/29</div>
                            <div class="col p-0 text-center ml-xxl-5 fs-4">10</div>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src='../public/js/jquery-3.5.1.js'></script>
    <script src='../public/js/bootstrap-5.0.0/bootstrap.js'></script>
    <script src='../wb-public/js/public.js'></script>
    <script src='index.js'></script>
    <script src='../bin/Controllers/wb-question.js'></script>
</body>