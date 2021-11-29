<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="../wb-questionadding-5/index-5.css" type="text/css">
    <script src='../wb-questionadding-5/index-5.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<div class="questionadding5">
    <div class="q5-article-top">
        <div class="row p-0 my-5 text-center q5-main">
            <div class="col m-0 mt-4">
                <!-- text -->
                <div class="row">
                    <div class="col p-0 text-center h1 q5-txt">
                        Added
                        <label class="q5-org gamename">gamename</label>
                        successfully !
                        <div id="Q5-GamePIN">
                            <p>The GAME PIN is</p>
                            <p class="m-0 q5-org"></p>
                        </div>

                    </div>
                </div>
                <!-- share button -->
                <div class="col mb-4">
                    <button type="button" class="btn text-center sharebtn rounded-pill py-1" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <img src="../src/img/share.png" width="40px" height="40px">
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" role="dialog" id="exampleModal" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-body" style="padding:40px 50px;">
                                    <button type="button" class="btn-close btn-sm" aria-label="Close"
                                        data-bs-dismiss="modal"></button>
                                    <div class="txt h3">
                                        Share <label class="q5-org gn">game name</label> with your friends !
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
                </div>
            </div>
        </div>
        <!-- play button -->
        <div class="row">
            <div class="col bottom text-center">
                <button type="button" class="btn next">Play</button>
            </div>
        </div>
    </div>
</div>