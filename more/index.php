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
    <!-- <script src='../bin/Controllers/gameCategory.js'></script> -->

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
</head>

<body>
    <!-- Load Header -->
    <?php require_once '../public/header.html'; ?>
    <div id="content" class="row m-0 p-0 container-fluid">
        <!-- Load Aside -->
        <?php require_once '../public/aside.php'; ?>
        <!-- Article -->
        <div id="article" class="col-lg-8 col-md-10 col-sm-12 p-0">
            <!-- top -->
            <div class="row top">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner mb-2">
                        <div class="carousel-item active">
                            <img src="../src/img/photo.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="../src/img/photo2.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="../src/img/photo3.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
                <!-- lg navbar -->
                <div class="row">
                    <nav id="navbar-lg" class="col navbar">
                        <div class="d-flex">
                            <!-- <img class="pie" src="../src/img/pie.png" width="6%" height="6%"> -->
                            <ul class="nav nav-pills p-0 justify-content-center">
                                <li class="nav-item">sports</li>
                                <li class="nav-item">health</li>
                                <li class="nav-item">coronavirus</li>
                                <li class="nav-item">fitness</li>
                                <li class="nav-item">technology</li>
                                <li class="nav-item">animals</li>
                                <li class="nav-item">visual arts</li>
                                <li class="nav-item">economy</li>
                                <li class="nav-item">science</li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- sm navbar -->
                <div class="row">
                    <div class="dropdown-toggle" data-toggle="dropdown">
                        <img class="pie" src="../src/img/pie.png" width="50px" height="50px">
                        MORE
                    </div>
                    <div class="collapse" id="navbar-sm">
                        <ul class="nav nav-pills p-0">
                            <li class="nav-item">sports</li>
                            <li class="nav-item">health</li>
                            <li class="nav-item">coronavirus</li>
                            <li class="nav-item">fitness</li>
                            <li class="nav-item">technology</li>
                            <li class="nav-item">animals</li>
                            <li class="nav-item">visual arts</li>
                            <li class="nav-item">economy</li>
                            <li class="nav-item">science</li>
                        </ul>
                    </div>
                </div>
                <!-- more & more -->
                <div class="row mt-2 mb-2">
                    <div class="col title" id="game">
                        MORE & MORE
                    </div>
                </div>
                <!-- more List -->
                <div class="row list">
                    <ul class="col moreList">
                        <!-- <li class="row morebox">
                            <div class="col-2 No">HOT</div>
                            <div class="col title text-truncate">Hello World </div>
                            <div class="col-12 content text-truncate">
                                Everyone in England is to be given access to two rapid coronavirus tests a week from Friday, under00000000000
                            </div>
                        </li>
                        <li class="row morebox">
                            <div class="col-2 No">COVID19</div>
                            <div class="col title text-truncate">Covid: Tests to be offered twice-weekly to all in 2466</div>
                            <div class="col-12 content text-truncate">
                                Everyone in England is to be given access to two rapid coronavirus tests a week from Friday, under
                            </div>
                        </li>
                        <li class="row morebox">
                            <div class="col-2 No">MUSIC</div>
                            <div class="col title text-truncate">Kelsea Ballerini, Maren Morris, and Thomas Rhett </div>
                            <div class="col-12 content text-truncate">
                                Kelsea Ballerini, Maren Morris, Thomas Rhett, Luke Bryan are among the list of performers set to
                            </div>
                        </li>
                        <li class="row morebox">
                            <div class="col-2 No ">TOURISM</div>
                            <div class="col title text-truncate">When can I go on holiday abroad or in the UK?</div>
                            <div class="col-12 content text-truncate">
                                Anyone in England who travels abroad without good reason will soon face a £5000 fine.
                            </div>
                        </li>
                        <li class="row morebox">
                            <div class="col-2 No">SCIENCE</div>
                            <div class="col title text-truncate">How schools can reduce excessive discipline of
                                their</div>
                            <div class="col-12 content text-truncate">
                                Black middle- and high-school students miss four times as much school as white children due to
                            </div>
                        </li> -->
                    </ul>
                    <!-- null -->
                    <div id="null-morelist" class="row">
                        <div class="col text-center">
                            <img src="../src/img/pie-dot.png" width="150px" height="150px" id="pie">
                            <div class="null-txt">Oops! No more</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Right Bar -->
    <button class="pluebtn" data-toggle="tooltip" data-placement="top" title="My Profile!">
        <img src="../src/img/user.png" id="plu">
    </button>

</body>