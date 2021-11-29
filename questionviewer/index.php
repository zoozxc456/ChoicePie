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
    <?php require_once '../public/header.html';?>
    <div id="content" class="row m-0 p-0 container-fluid">
        <!-- Require Aside -->
        <?php require_once '../public/aside.php';?>
        <div id="article" class="col-lg-8 col-md-10 col-sm-12 p-0">
            <!-- Game Name -->
            <div class="row top">
                <p class="col-2 text-center">
                    <button class="back">
                        <img src="../src/img/leftarrow.png" width="30px" height="30px">
                    </button>
                </p>
                <p class="col-8 RecordTitle text-center">KPOP MUSIC</p>
            </div>
            <!-- Record List -->
            <div class="row list">
                <ul class="col RecordList">
                    <!-- <li class="row p-0 my-2 listitem">
                        <div class="row m-0 mt-1">
                            <div class="col p-1 text-start">
                                <label class="h3 q">Q1.</label>
                                <label class="h4">Which song was not released in 2020?</label>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col article-btn">
                                <button type="button" class="btn fs-4 fw-bolder">Dynamite</button>
                            </div>
                            <div class="col article-btn">
                                <button type="button" class="btn fs-4 fw-bolder ans">Go Go</button>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col article-btn">
                                <button type="button" class="btn fs-4 fw-bolder">Dis-ease</button>
                            </div>
                            <div class="col article-btn">
                                <button type="button" class="btn fs-4 fw-bolder">Abyss</button>
                            </div>
                        </div>
                    </li>
                    <li class="row p-0 my-2 listitem">
                        <div class="row m-0 mt-1">
                            <div class="col p-1 text-start">
                                <label class="h3 q">Q2.</label>
                                <label class="h4">Which song was not released in 2020?</label>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col article-btn">
                                <button type="button" class="btn fs-4 fw-bolder">Dynamite</button>
                            </div>
                            <div class="col article-btn">
                                <button type="button" class="btn fs-4 fw-bolder ans">Go Go</button>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col article-btn">
                                <button type="button" class="btn fs-4 fw-bolder">Dis-ease</button>
                            </div>
                            <div class="col article-btn">
                                <button type="button" class="btn fs-4 fw-bolder">Abyss</button>
                            </div>
                        </div>
                    </li>
                    <li class="row p-0 my-2 listitem">
                        <div class="row m-0 mt-1">
                            <div class="col p-1 text-start">
                                <label class="h3 q">Q3.</label>
                                <label class="h4">Which song was not released in 2020?</label>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col article-btn">
                                <button type="button" class="btn fs-4 fw-bolder">Dynamite</button>
                            </div>
                            <div class="col article-btn">
                                <button type="button" class="btn fs-4 fw-bolder">Go Go</button>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col article-btn">
                                <button type="button" class="btn fs-4 fw-bolder ans">Dis-ease</button>
                            </div>
                            <div class="col article-btn">
                                <button type="button" class="btn fs-4 fw-bolder">Abyss</button>
                            </div>
                        </div>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
    </div>
    <!-- Right Bar -->
    <button class="pluebtn" data-toggle="tooltip" data-placement="top" title="My Profile!">
        <img src="../src/img/user.png" id="plu">
    </button>
</body>