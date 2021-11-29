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
    <script src='../bin/Controllers/gameCategory.js'></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <!-- title -->
                <div class="col title" id="tit">
                    Class
                </div>
                <div class="col d-flex">
                    <input class="form-control rounded-pill align-self-center" type="search" placeholder="Search Game Name" aria-label="Search">
                    <button id="btn_search" class="btn btn-outline:none" type="submit">
                        <img src="../src/img/search.png" width=30 height=30>
                    </button>
                </div>
            </div>

            <!-- lg -->
            <div class="row">
                <nav id="navbar-lg" class="col navbar">
                    <div class="d-flex">

                        <img class="pie align-self-center" src="../src/img/pie.png" width="10%" height="10%">
                        <ul class="nav nav-pills p-0">
                            <li class="nav-item">education</li>
                            <li class="nav-item">animal</li>
                            <li class="nav-item">celebrity</li>
                            <li class="nav-item">personality</li>
                            <li class="nav-item">food</li>
                            <li class="nav-item">sociology</li>
                            <li class="nav-item">mathematics</li>
                            <li class="nav-item">technology</li>
                            <li class="nav-item">economics</li>
                            <li class="nav-item">language</li>
                            <li class="nav-item">history</li>
                            <li class="nav-item">biology</li>
                            <li class="nav-item">music</li>
                            <li class="nav-item">sport</li>
                            <li class="nav-item">natural</li>
                            <li class="nav-item">outer space</li>
                            <li class="nav-item">geography</li>
                            <li class="nav-item">art</li>
                            <li class="nav-item">movie</li>
                            <li class="nav-item">science</li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!--sm -->
            <div class="row">
                <div class="dropdown-toggle" data-toggle="dropdown">
                    <img class="pie" src="../src/img/pie.png" width="50px" height="50px">
                    CLASS
                </div>
                <div class="collapse" id="navbar-sm">
                    <ul class="nav nav-pills p-0">
                        <li class="nav-item">education</li>
                        <li class="nav-item">animal</li>
                        <li class="nav-item">celebrity</li>
                        <li class="nav-item">personality</li>
                        <li class="nav-item">food</li>
                        <li class="nav-item">sociology</li>
                        <li class="nav-item">mathematics</li>
                        <li class="nav-item">technology</li>
                        <li class="nav-item">economics</li>
                        <li class="nav-item">language</li>
                        <li class="nav-item">history</li>
                        <li class="nav-item">biology</li>
                        <li class="nav-item">music</li>
                        <li class="nav-item">sport</li>
                        <li class="nav-item">natural</li>
                        <li class="nav-item">outer space</li>
                        <li class="nav-item">geography</li>
                        <li class="nav-item">art</li>
                        <li class="nav-item">movie</li>
                        <li class="nav-item">science</li>
                    </ul>
                </div>
            </div>
            <!-- Games -->
            <div class="row top">
                <div class="col title align-self-center" id="game">
                    Games
                </div>
                <div class="col-lg-5 col-md d-flex">
                    <input class="form-control rounded-pill align-self-center" type="search" placeholder="Game PIN" aria-label="Search">
                    <button id="goGamePIN" class="btn gobtn">
                        Go
                    </button>
                </div>
            </div>
            <!-- middle -->
            <div class="row">
                <div class="col middle">
                    <div class="row">
                        <div class="col gamebox">
                            <div class="front">
                                <!-- game name -->
                                <div class="gamename">
                                    BTS
                                </div>
                                <!-- detail -->
                                <div class="detail">
                                    <span class="num">10</span>
                                    2021/03/21
                                </div>
                            </div>
                            <div class="back">
                                <!-- more -->
                                <div class="dropup">
                                    <button class="dropbtn">
                                        <img src="../src/img/more.png" width="20px" height="20px">
                                    </button>
                                    <div class="dropup-content">
                                        <!-- report -->
                                        <a href="#" class="report" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                            <img src="../src/img/flag.png" width="40px" height="40px">
                                            Report
                                        </a>
                                        <!-- share -->
                                        <a href="#" class="share" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <img src="../src/img/share2.png" width="30px" height="30px">
                                            Link
                                        </a>
                                        <!-- copy -->
                                        <a class="create" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                                            <img src="../src/img/plus2.png" width="35px" height="35px">
                                            Copy
                                        </a>
                                    </div>
                                </div>

                                <!-- play -->
                                <button class="play">
                                    PLAY !
                                </button>
                            </div>
                        </div>
                        <div class="col gamebox">
                            <div class="front">
                                <!-- game name -->
                                <div class="gamename">
                                    Red velvet
                                </div>
                                <!-- detail -->
                                <div class="detail">
                                    <span class="num">10</span>
                                    2021/03/21
                                </div>
                            </div>
                            <div class="back">
                                <!-- more -->
                                <div class="dropup">
                                    <button class="dropbtn">
                                        <img src="../src/img/more.png" width="20px" height="20px">
                                    </button>
                                    <div class="dropup-content">
                                        <!-- report -->
                                        <a href="#" class="report" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                            <img src="../src/img/flag.png" width="40px" height="40px">
                                            Report
                                        </a>
                                        <!-- share -->
                                        <a href="#" class="share" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <img src="../src/img/share2.png" width="30px" height="30px">
                                            Link
                                        </a>
                                        <!-- copy -->
                                        <a class="create" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                                            <img src="../src/img/plus2.png" width="35px" height="35px">
                                            Copy
                                        </a>
                                    </div>
                                </div>

                                <!-- play -->
                                <button class="play">
                                    PLAY !
                                </button>
                            </div>
                        </div>
                        <div class="col gamebox">
                            <div class="front">
                                <!-- game name -->
                                <div class="gamename">
                                    ITZY
                                </div>
                                <!-- detail -->
                                <div class="detail">
                                    <span class="num">10</span>
                                    2021/03/21
                                </div>
                            </div>
                            <div class="back">
                                <!-- more -->
                                <div class="dropup">
                                    <button class="dropbtn">
                                        <img src="../src/img/more.png" width="20px" height="20px">
                                    </button>
                                    <div class="dropup-content">
                                        <!-- report -->
                                        <a href="#" class="report" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                            <img src="../src/img/flag.png" width="40px" height="40px">
                                            Report
                                        </a>
                                        <!-- share -->
                                        <a href="#" class="share" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <img src="../src/img/share2.png" width="30px" height="30px">
                                            Link
                                        </a>
                                        <!-- copy -->
                                        <a class="create" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                                            <img src="../src/img/plus2.png" width="35px" height="35px">
                                            Copy
                                        </a>
                                    </div>
                                </div>

                                <!-- play -->
                                <button class="play">
                                    PLAY !
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col gamebox">
                            <div class="front">
                                <!-- game name -->
                                <div class="gamename">
                                    MAMAMOO
                                </div>
                                <!-- detail -->
                                <div class="detail">
                                    <span class="num">10</span>
                                    2021/03/21
                                </div>
                            </div>
                            <div class="back">
                                <!-- more -->
                                <div class="dropup">
                                    <button class="dropbtn">
                                        <img src="../src/img/more.png" width="20px" height="20px">
                                    </button>
                                    <div class="dropup-content">
                                        <!-- report -->
                                        <a href="#" class="report" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                            <img src="../src/img/flag.png" width="40px" height="40px">
                                            Report
                                        </a>
                                        <!-- share -->
                                        <a href="#" class="share" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <img src="../src/img/share2.png" width="30px" height="30px">
                                            Link
                                        </a>
                                        <!-- copy -->
                                        <a class="create" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                                            <img src="../src/img/plus2.png" width="35px" height="35px">
                                            Copy
                                        </a>
                                    </div>
                                </div>

                                <!-- play -->
                                <button class="play">
                                    PLAY !
                                </button>
                            </div>
                        </div>
                        <div class="col gamebox">
                            <div class="front">
                                <!-- game name -->
                                <div class="gamename">
                                    Twice
                                </div>
                                <!-- detail -->
                                <div class="detail">
                                    <span class="num">10</span>
                                    2021/03/21
                                </div>
                            </div>
                            <div class="back">
                                <!-- more -->
                                <div class="dropup">
                                    <button class="dropbtn">
                                        <img src="../src/img/more.png" width="20px" height="20px">
                                    </button>
                                    <div class="dropup-content">
                                        <!-- report -->
                                        <a href="#" class="report" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                            <img src="../src/img/flag.png" width="40px" height="40px">
                                            Report
                                        </a>
                                        <!-- share -->
                                        <a href="#" class="share" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <img src="../src/img/share2.png" width="30px" height="30px">
                                            Link
                                        </a>
                                        <!-- copy -->
                                        <a class="create" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                                            <img src="../src/img/plus2.png" width="35px" height="35px">
                                            Copy
                                        </a>
                                    </div>
                                </div>

                                <!-- play -->
                                <button class="play">
                                    PLAY !
                                </button>
                            </div>
                        </div>
                        <div class="col gamebox">
                            <div class="front">
                                <!-- game name -->
                                <div class="gamename">
                                    Black Pink
                                </div>
                                <!-- detail -->
                                <div class="detail">
                                    <span class="num">10</span>
                                    2021/03/21
                                </div>
                            </div>
                            <div class="back">
                                <!-- more -->
                                <div class="dropup">
                                    <button class="dropbtn">
                                        <img src="../src/img/more.png" width="20px" height="20px">
                                    </button>
                                    <div class="dropup-content">
                                        <!-- report -->
                                        <a href="#" class="report" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                            <img src="../src/img/flag.png" width="40px" height="40px">
                                            Report
                                        </a>
                                        <!-- share -->
                                        <a href="#" class="share" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <img src="../src/img/share2.png" width="30px" height="30px">
                                            Link
                                        </a>
                                        <!-- copy -->
                                        <a class="create" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                                            <img src="../src/img/plus2.png" width="35px" height="35px">
                                            Copy
                                        </a>
                                    </div>
                                </div>

                                <!-- play -->
                                <button class="play">
                                    PLAY !
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col gamebox">
                            <div class="front">
                                <!-- game name -->
                                <div class="gamename">
                                    EXID
                                </div>
                                <!-- detail -->
                                <div class="detail">
                                    <span class="num">10</span>
                                    2021/03/21
                                </div>
                            </div>
                            <div class="back">
                                <!-- more -->
                                <div class="dropup">
                                    <button class="dropbtn">
                                        <img src="../src/img/more.png" width="20px" height="20px">
                                    </button>
                                    <div class="dropup-content">
                                        <!-- report -->
                                        <a href="#" class="report" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                            <img src="../src/img/flag.png" width="40px" height="40px">
                                            Report
                                        </a>
                                        <!-- share -->
                                        <a href="#" class="share" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <img src="../src/img/share2.png" width="30px" height="30px">
                                            Link
                                        </a>
                                        <!-- copy -->
                                        <a class="create" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                                            <img src="../src/img/plus2.png" width="35px" height="35px">
                                            Copy
                                        </a>
                                    </div>
                                </div>

                                <!-- play -->
                                <button class="play">
                                    PLAY !
                                </button>
                            </div>
                        </div>
                        <div class="col gamebox">
                            <div class="front">
                                <!-- game name -->
                                <div class="gamename">
                                    TXT
                                </div>
                                <!-- detail -->
                                <div class="detail">
                                    <span class="num">10</span>
                                    2021/03/21
                                </div>
                            </div>
                            <div class="back">
                                <!-- more -->
                                <div class="dropup">
                                    <button class="dropbtn">
                                        <img src="../src/img/more.png" width="20px" height="20px">
                                    </button>
                                    <div class="dropup-content">
                                        <!-- report -->
                                        <a href="#" class="report" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                            <img src="../src/img/flag.png" width="40px" height="40px">
                                            Report
                                        </a>
                                        <!-- share -->
                                        <a href="#" class="share" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <img src="../src/img/share2.png" width="30px" height="30px">
                                            Link
                                        </a>
                                        <!-- copy -->
                                        <a class="create" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                                            <img src="../src/img/plus2.png" width="35px" height="35px">
                                            Copy
                                        </a>
                                    </div>
                                </div>

                                <!-- play -->
                                <button class="play">
                                    PLAY !
                                </button>
                            </div>
                        </div>
                        <div class="col gamebox">
                            <div class="front">
                                <!-- game name -->
                                <div class="gamename">
                                    KPOP MUSIC
                                </div>
                                <!-- detail -->
                                <div class="detail">
                                    <span class="num">10</span>
                                    2021/03/21
                                </div>
                            </div>
                            <div class="back">
                                <!-- more -->
                                <div class="dropup">
                                    <button class="dropbtn">
                                        <img src="../src/img/more.png" width="20px" height="20px">
                                    </button>
                                    <div class="dropup-content">
                                        <!-- report -->
                                        <a href="#" class="report" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                            <img src="../src/img/flag.png" width="40px" height="40px">
                                            Report
                                        </a>
                                        <!-- share -->
                                        <a href="#" class="share" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <img src="../src/img/share2.png" width="30px" height="30px">
                                            Link
                                        </a>
                                        <!-- copy -->
                                        <a class="create" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                                            <img src="../src/img/plus2.png" width="35px" height="35px">
                                            Copy
                                        </a>
                                    </div>
                                </div>

                                <!-- play -->
                                <button class="play">
                                    PLAY !
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- report Modal -->
            <div class="modal fade" role="dialog" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-body" style="padding:40px 50px;">
                            <!-- icon -->
                            <div class="col text-center">
                                <div class="h4 bk">The reason you report
                                    <div class="org gn">"game name"
                                        <label class="h4 bk">is</label>
                                    </div>
                                </div>
                                <textarea class="form-control" placeholder="reason..." aria-label="reason..."></textarea>
                                <div class="invalid-feedback" style="font-size: 16px;">
                                    Please Enter your reason!
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn send btn-default">Send</button>
                            <button type="button" class="btn cancel btn-default" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- share Modal -->
            <div class="modal fade" role="dialog" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content text-center">
                        <div class="modal-body" style="padding:40px 75px;">
                            <button type="button" class="btn-close btn-sm" aria-label="Close" data-bs-dismiss="modal"></button>
                            <div class="sharetxt h3">
                                Share <label class="org gn">game name</label> with your friends !
                            </div>
                            <div class="link">
                                <a href="#" class="fa fa-facebook"></a>
                                <a href="#" class="fa fa-twitter"></a>
                                <a href="#" class="fa fa-google"></a>
                                <a href="#" class="fa fa-instagram"></a>
                                <a href="#" class="fa fa-snapchat-ghost"></a>
                                <a href="#" class="fa fa-skype"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- create Modal -->
            <div class="modal fade" role="dialog" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-body" style="padding:40px 50px;">
                            <!-- icon -->
                            <div class="col text-center mt-3">
                                <div class="h3">Add <label class="org gn">the game pin</label> to my own room!</div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn go btn-default">Go</button>
                            <button type="button" class="btn kidding btn-default" data-bs-dismiss="modal"> Just
                                kidding</button>
                        </div>
                    </div>

                </div>
            </div>


            <div class="modal fade" role="dialog" id="MessageModal" tabindex="-1" aria-labelledby="MessageModal" aria-hidden="true">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-body" style="padding:40px 50px;">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="col text-center mt-3">
                                <div class="org h3" style="display: inline-block;"></div>
                                <span class="msg h3" style="display: contents;"></span>
                                <br>
                                <div class="msg2 h3" style="display: contents;"></div>
                                <span class="h3 org2"></span>
                            </div>
                            <div style="text-align: -webkit-center;">
                                <button id="check" class="h3">Check</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="Game-null" class="col text-center">
                <img src="../src/img/pie-dot.png" id="pie" width="150px" height="150px">
                <p class="null-txt">Oops! No Game</p>
            </div>
            <!-- footer -->
            <div class="row">
                <footer class="col site-footer">
                    <ul class="btn-group RecordPage p-0 ">
                        <!-- <li class="px-2"><button id="btn1" type="button" class="p-0 text-center rounded-circle btn">1</button>
                        </li>
                        <li class="px-2"><button id="btn1" type="button" class="p-0 text-center rounded-circle btn">2</button>
                        </li>
                        <li class="px-2"><button id="btn1" type="button" class="p-0 text-center rounded-circle btn">3</button>
                        </li> -->
                    </ul>
                </footer>
            </div>
        </div>
    </div>

    <!-- Right Bar -->
    <button class="pluebtn" data-toggle="tooltip" data-placement="top" title="My Profile!">
        <img src="../src/img/user.png" id="plu">
    </button>
</body>