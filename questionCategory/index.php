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

            <!-- lg -->
            <div class="row top">
                <nav class="navbar">
                    <div class="d-flex">
                        <img class="baking align-self-center" src="../src/img/baking.png" width="10%" height="10%">
                        <p class="col txt">Create a new game !</p>
                        <button class="col-3 add align-self-center">ADD</button>
                    </div>
                </nav>
            </div>
            <!-- Games -->
            <div class="row top2">
                <div class="col-12 col-lg text-lg-start title" id="game">
                    Created Game
                </div>
                <div class="col-12 col-lg tip align-self-center">
                    <div class="row">
                        <div class="col icon_group text-center">
                            <img src="../src/img/orange.png" width="20px" height="20px" class="cir">
                            <span class="">public</span>
                        </div>
                        <div class="col icon_group text-center">
                            <img src="../src/img/red.png" width="20px" height="20px" class="cir">
                            <span class="">private</span>
                        </div>
                        <div class="col icon_group text-center">
                            <img src="../src/img/yellow.png" width="20px" height="20px" class="cir">
                            <span class="">copy</span>
                        </div>
                    </div>



                </div>
            </div>
            <!-- middle -->
            <div id="GameList" class="row">
                <div class="col middle">
                    
                </div>
            </div>
            <!-- null -->
            <div id="null-gamelist" class="row">
                <div class="col text-center">
                    <img src="../src/img/pie-dot.png" width="150px" height="150px" id="pie">
                    <div class="null-txt">You haven't built a game yet</div>
                </div>

            </div>

            <!-- delete Modal -->
            <div class="modal fade" role="dialog" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-body" style="padding:40px 50px;">
                            <h3 style="text-align: center;">Are you sure you want to delete
                                <label class="org gn">"game name"</label>
                                ?
                                <div class="mt-3" style="color:#696969;font-size: initial;">
                                ! You will also lose all game records and game pins !
                                </div>
                            </h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn close delete" data-bs-dismiss="modal">YES</button>
                            <button type="button" class="btn close btn-default" data-bs-dismiss="modal">NO</button>
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
            <!-- footer -->
            <div class="row">
                <footer class="col site-footer">
                    <ul class="btn-group RecordPage p-0 ">

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