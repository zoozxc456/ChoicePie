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

    <!-- <script src="../bin/Controllers/rank.js"></script> -->
    <script src='index.js'></script>
</body>