<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=0">
    <link rel="stylesheet" href="../public/css/bootstrap-5.0.0/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../public/css/public.css" type="text/css">
    <link rel="stylesheet" href="index.css" type="text/css">

</head>

<body>
    <!-- Require Header -->
    <?php require_once '../public/header.html'; ?>
    <div id="content" class="row m-0 p-0 container-fluid">
        <!-- Require Aside -->
        <?php require_once '../public/aside.php'; ?>
        <div id="article" class="col-lg-8 col-md-10 col-sm-12 p-0">
            <div class="row all position-relative" id="rank">
                <div class="col col-md-6 text-center GameList">
                    <h3 class="GameListTit">Game Name</h3>
                    <div id="GameList" class="row">
                        <ul class="">
                            <!-- Load GameList -->
                            <!-- <li>test</li>
                            <li>BTS</li>
                            <li>KPOP MUSIC</li>
                            <li>BTS1</li>
                            <li>BTS2</li>
                            <li>BTS3</li>
                            <li>BT21</li>
                            <li>BTS4</li>
                            <li>BTS4</li> -->
                        </ul>
                    </div>
                    <!-- button -->
                    <div class="updown">
                        <button class="up">
                            <img src="../src/img/up.png" width="35px">
                        </button>
                        <button class="down">
                            <img src="../src/img/down.png" width="35px">
                        </button>
                    </div>
                </div>
                <div id="RankDetails" class="col col-md-6 ">
                    <div class="row">
                        <div class="col m-0">
                            <div class="row position-relative pt-3">
                                <div class="text-center position-absolute">
                                    <button type="button" class="btn-close btn-close-white m-0 ms-2" aria-label="Close"
                                        style="float:revert;"></button>
                                </div>
                                <div class="col text-center h3 white m-0">
                                    <div id="gn" class="text-truncate mx-auto">
                                        Game Name
                                    </div>
                                    <div id="PIN" class="fs-5">
                                        ec48dsaq8
                                    </div>
                                </div>
                                <div class="d-flex align-items-center me-2 fs-5 position-absolute me-1"
                                    style="width: max-content; right:0;">
                                    <img src="../src/img/champion.png" width="30px" class="me-1">
                                    <span id="ranknum" class="white">1/9</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <div id="bar" class="row d-flex justify-content-center align-items-end text-center">
                                <div class="col">
                                    <div class="mx-auto theface d-flex">
                                        <div class="align-self-center w-100 h1 m-0">123</div>
                                    </div>
                                    <div class="bar2 barbg mx-auto">
                                    </div>
                                    <label>2</label>
                                </div>
                                <div class="col">
                                    <div class="mx-auto theface d-flex">
                                        <div class="align-self-center w-100 h1 m-0">123</div>
                                    </div>
                                    <div class="bar1 barbg mx-auto"></div>
                                    <label>1</label>
                                </div>
                                <div class="col">
                                    <div class="mx-auto theface d-flex">
                                        <div class="align-self-center w-100 h1 m-0">123</div>
                                    </div>
                                    <div class="bar3 barbg mx-auto"></div>
                                    <label>3</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="RankList" class="col mx-3">
                            <ul>
                                <!-- Load RankList -->
                                <!-- <li class='row my-2 px-3'>
                                    <div class='col-1 p-0 red'>1</div>
                                    <div class='col p-0 black'>Titi</div>
                                    <div class='col p-0 text-end org'>1023</div>
                                </li>
                                <li class='row my-2 px-3'>
                                    <div class='col-1 p-0 red'>2</div>
                                    <div class='col p-0 black'>Tt</div>
                                    <div class='col p-0 text-end org'>927</div>
                                </li>
                                <li class='row my-2 px-3'>
                                    <div class='col-1 p-0 red'>3</div>
                                    <div class='col p-0 black'>TT</div>
                                    <div class='col p-0 text-end org'>831</div>
                                </li>
                                <li class='row my-2 px-3'>
                                    <div class='col-1 p-0 red'>4</div>
                                    <div class='col p-0 black'>tt</div>
                                    <div class='col p-0 text-end org'>813</div>
                                </li>
                                <li class='row my-2 px-3'>
                                    <div class='col-1 p-0 red'>5</div>
                                    <div class='col p-0 black'>fake titi</div>
                                    <div class='col p-0 text-end org'>768</div>
                                </li>
                                <li class='row my-2 px-3'>
                                    <div class='col-1 p-0 red'>6</div>
                                    <div class='col p-0 black'>ii</div>
                                    <div class='col p-0 text-end org'>744</div>
                                </li>
                                <li class='row my-2 px-3'>
                                    <div class='col-1 p-0 red'>7</div>
                                    <div class='col p-0 black'>ヽ(`Д´)ノ</div>
                                    <div class='col p-0 text-end org'>592</div>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row all" id="rank-null">
                <div class="col col-md-6 text-center GameList">
                    <!-- <h3 class="GameListTit">Game Name</h3> -->
                    <div id="GameList2" class="row">
                        <h2 class="col">No game records</br> play now !</h2>
                        <div>
                            <button type="button" class="btn rounded-pill play" aria-label="play">PLAY</button>
                        </div>
                    </div>
                </div>
                <div id="RankDetails2" class="col col-md-6">
                    <div class="row">
                        <div class="col m-0">
                            <div class="row">
                                <div class="col-3 text-center">
                                    <button type="button" class="btn-close btn-close-white" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <img class="bbpie" src="../src/img/pie-dot.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Right Bar -->
        <button class="pluebtn" data-toggle="tooltip" data-placement="top" title="My Profile!">
            <img src="../src/img/user.png" id="plu">
        </button>
    </div>
    </div>
    <script src='../public/js/jquery-3.5.1.js'></script>
    <script src='../public/js/bootstrap-5.0.0/bootstrap.js'></script>
    <script src='../public/js/public.js'></script>

    <script src="../bin/Controllers/rank.js"></script>
    <script src='index.js'></script>
</body>