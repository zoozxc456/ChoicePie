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

</head>

<body>
    <!-- Require Header -->
    <?php require_once '../wb-public/header.html'; ?>
    <div id="content" class="row m-0 p-0 container-fluid">
        <!-- Require Aside -->
        <?php require_once '../wb-public/aside.php'; ?>
        <div id="article" class="col-lg-10 col-md-10 col-sm-12 p-0">
            <!-- Game Name -->
            <div class="row top">
                <p class="col text-start">
                    <button class="back ">
                        <img src="../src/img/leftarrow.png" width="30px" height="30px">
                    </button>
                </p>
                <p class="col RecordTitle text-center align-self-center">KPOP MUSIC</p>
                <p class="col text-center">
                    <button class="reviewbtn" id="cancel" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <img src="../src/img/cancel.png" width="25px" height="25px">
                    </button>
                    <button class="reviewbtn" id="rec" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <img src="../src/img/rec.png" width="25px" height="25px">
                    </button>
                    <!-- Review Modal -->
                <div class="modal fade" role="dialog" id="exampleModal" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content text-center">
                            <div class="modal-body h3" style="padding:40px 0;">
                                You are going to
                                <label class="red2"> "pass/reject" </label>
                                <p class="title"> "gamename" </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="confirm" class="btn close btn-default red"
                                    data-bs-dismiss="modal">Confirm</button>
                                <button type="button" class="btn close" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                </p>
            </div>
            <!-- Notice -->
            <div class="row mb-4">
                <div class="col notice">
                    report:reason
                </div>
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
</body>