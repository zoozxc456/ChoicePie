<!DOCTYPE html>
<html>

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
    <script src="../bin/Controllers/signin.js"></script>
</head>

<body>
    <!-- Require Header -->
    <?php require_once '../public/header.html'; ?>
    <div id="content" class="row m-0 p-0 container-fluid">
        <!-- Require Aside -->
        <?php require_once '../public/aside.php'; ?>
        <div id="article" class="col-lg-8 col-md-10 col-sm-12 p-0">
            <!-- Top of Article -->
            <div id="top-article" class="row">
                <div class="col">
                    <p class="text-center lh-base fs-2 fw-bolder" style="color:#F15A28;">Sign in to Choice Pie</p>
                    <div class="row my-3 d-flex lh-base fs-4 fw-bolder">
                        <div class="col">
                            <div class="row d-flex justify-content-center">
                                <div class="col-6 col-sm-3 col-md-4 col-lg-3">
                                    <label>Account</label>
                                </div>
                                <div class="col-5 col-sm-3 col-md-4 col-lg-3">
                                    <input type="text" id="input_acc" class="rounded-3 text-center fw-bolder form-control" placeholder="Your Account">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-5 d-flex justify-content-center lh-base fs-4 fw-bolder">
                        <div class="col">
                            <div class="row d-flex justify-content-center">
                                <div class="col-6 col-sm-3 col-md-4 col-lg-3">
                                    <label>Password</label>
                                </div>
                                <div class="col-5 col-sm-3 col-md-4 col-lg-3">
                                    <input type="password" id="input_pwd" class="rounded-3 text-center fw-bolder form-control" placeholder="Your Password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col p-0 text-center">
                            <button type="button" id="article-btn" class="btn fs-4 fw-bolder rounded-pill px-3 w-25">Sign in</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bottom of Article -->
            <div id="bottom-article" class="row">
                <div class="col">
                    <p class="text-center lh-base fs-2 fw-bolder">New to <span style="color: #F8931D">ChoicePie</span>？Create an account.</p>
                    <div class="row my-3">
                        <div class="col p-0 text-center">
                            <a href="../signup/" style="color:#ffffff;text-decoration-line:none"><button type="button" id="bottom-article-btn" class="btn fs-4 fw-bolder px-3 rounded-pill w-25">Sign
                                    up</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" role="dialog" id="MessageModal" tabindex="-1" aria-labelledby="MessageModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-body" style="padding:40px 50px;">
                            <div class="row">
                                <div class="col-12"><button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button></div>
                                <div class="col-12 text-center mt-3">
                                    <div class="msg1 h3" style="color:#b22222;"></div>
                                    <div class="msg2 h3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>