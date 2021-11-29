<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=0">
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
            <!-- Game Name -->
            <div class="row top">
                <p class="col-3 text-center">
                    <button class="back">
                        <img src="../src/img/leftarrow.png" width="30px" height="30px">
                    </button>
                </p>
                <div class="col RecordTitle d-flex justify-content-center">
                    <div id="GameName" class="text-truncate me-2"></div>
                    <div>RESULT</div>
                </div>
                <div class="col-3 Conditiontxt">
                    <label id='PIN' class="mb-2"></label>
                    <p>TOTAL : <label id="RcCnt"></label> </p>
                </div>

            </div>
            <!-- Notice -->
            <!-- <div class="row mb-4">
                <div class="col notice">
                    <p class="ranknum">#1</p>
                    <p class="username">Titi</p>
                </div>
            </div> -->
            <!-- Record List -->
            <div class="row list">
                <ul class="col RecordList">
                    <!-- <li class="row listitem">
                        <p class="col No">1</p>
                        <p class="col ">Titi</p>
                        <p class="col ">1023</p>
                    </li>
                    <li class="row listitem">
                        <div class="col No">2</div>
                        <div class="col ">heathaet</div>
                        <div class="col ">999</div>
                    </li>
                    <li class="row listitem">
                        <div class="col No">3</div>
                        <div class="col ">leo</div>
                        <div class="col ">859</div>
                    </li>
                    <li class="row listitem">
                        <div class="col No">4</div>
                        <div class="col ">aa</div>
                        <div class="col ">725</div>
                    </li>
                    <li class="row listitem">
                        <p class="col No">5</p>
                        <p class="col ">bb</p>
                        <p class="col ">623</p>
                    </li>
                    <li class="row listitem">
                        <div class="col No">6</div>
                        <div class="col ">heagfashthaet</div>
                        <div class="col ">399</div>
                    </li>
                    <li class="row listitem">
                        <div class="col No">7</div>
                        <div class="col ">zz</div>
                        <div class="col ">259</div>
                    </li>
                    <li class="row listitem">
                        <div class="col No">8</div>
                        <div class="col ">hgnh</div>
                        <div class="col ">125</div>
                    </li>
                    <li class="row listitem">
                        <div class="col No">9</div>
                        <div class="col ">opgngnh</div>
                        <div class="col ">15</div>
                    </li>
                    <li class="row listitem">
                        <div class="col No">10</div>
                        <div class="col ">hgnh</div>
                        <div class="col ">12</div>
                    </li> -->
                </ul>
            </div>
            <!-- null -->
            <div id="null-list" class="row">
                <div class="col text-center">
                    <img src="../src/img/pie-dot.png" width="150px" height="150px" id="pie">
                    <div class="null-txt">No player yet</div>
                </div>

            </div>
        </div>
    </div>
    <!-- Right Bar -->
    <button class="pluebtn" data-toggle="tooltip" data-placement="top" title="My Profile!">
        <img src="../src/img/user.png" id="plu">
    </button>
</body>