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
    <script src='../bin/Controllers/wb-more.js'></script>
</head>

<body>
    <!-- Require Header -->
    <?php require_once '../wb-public/header.html'; ?>
    <div id="content" class="row m-0 p-0 container-fluid">
        <!-- Require Aside -->
        <?php require_once '../wb-public/aside.php'; ?>
        <div id="article" class="col-md-10 col-sm-12 p-0">

            <!-- title -->
            <div class="row top">
                <div class="col-2 title text-start">
                    More List
                </div>
                <div class="col-2 totnum text-start">
                    <p class="tot">total :</p>
                    <p class="num"></p>

                    <!-- add button -->
                    <button type="button" id="add" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <img src="../src/img/plus2.png" width="40px" height="40px">
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" role="dialog" id="exampleModal" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header" style="padding:35px 50px;">
                                    <h4 class="text-center m-0">Add More Link</h4>
                                </div>
                                <div class="modal-body row" style="padding:40px 50px;">
                                    <div class="col-md d-flex flex-column justify-content-between">
                                        <div class="form-group">
                                            <label for="form-title" class="tit">Title</label>
                                            <input type="text" class="form-control" id="form-title"
                                                aria-describedby="invalida_Title_Feedback" placeholder="Enter Title">
                                            <div id="invalida_Title_Feedback" class="invalid-feedback"
                                                style="font-size: 16px;">
                                                Please Enter Title!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="form-tag" class="tit">Tag</label>
                                            <input type="text" class="form-control" id="form-tag"
                                                aria-describedby="invalida_Tag_Feedback" placeholder="Enter Tag">
                                            <div id="invalida_Tag_Feedback" class="invalid-feedback"
                                                style="font-size: 16px;">
                                                Please Enter Tags!
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="form-link" class="tit">Link</label>
                                            <input type="text" class="form-control" id="form-link"
                                                aria-describedby="invalida_Link_Feedback" placeholder="Enter Link">
                                            <div id="invalida_Link_Feedback" class="invalid-feedback"
                                                style="font-size: 16px;">
                                                Please Enter Link and Follow The Format Below!<br>EX:Http://
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="form-context" class="tit">Context</label>
                                            <textarea id="form-context" class="form-control" placeholder="Enter Context"
                                                maxlength="300" rows="12"></textarea>
                                            <div id="invalida_Context_Feedback" class="invalid-feedback"
                                                style="font-size: 16px;">
                                                Please Enter Context
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="modal-btn-cancel" class="btn cancel btn-default"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" id="modal-btn-submit" class="btn submit btn-default"
                                        data-dismiss="modal">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col search text-end">
                    <input class="input rounded-pill " placeholder="search for tag"> </input>
                    <button><img class="" src="../src/img/search.png" width="50px" height="50px"></button>
                </div>
            </div>

            <!-- middle-->
            <!-- middle sm -->
            <div class="row smlist">
                <!-- detail -->

                <!-- footer -->
                <div class="row">
                    <footer class="col site-footer">
                        <ul class="btn-group RecordPage p-0 ">
                            <li class="px-2"><button id="btn1" type="button"
                                    class="p-0 text-center rounded-circle btn">1</button></li>
                            <li class="px-2"><button id="btn1" type="button"
                                    class="p-0 text-center rounded-circle btn">2</button></li>
                            <li class="px-2"><button id="btn1" type="button"
                                    class="p-0 text-center rounded-circle btn">3</button></li>
                        </ul>
                    </footer>
                </div>
            </div>

            <!-- middle lg -->
            <div class="row lglist">
                <div id="RecordList" class="col">
                    <!-- title -->
                    <div class="col">
                        <div class="row listtitle">
                            <div class="lt col p-0 text-start mx-2 mx-md-3 mx-xl-4 mx-xxl-5">
                                <button class="titleitem" id="title">title ▲</button>
                            </div>
                            <div class="lt col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5">
                                <button class="titleitem" id="tag">tag ▲</button>
                            </div>
                            <div class="lt col p-0 text-center mx-3 mx-md-2 me-xl-4 me-xxl-5">
                                <button class="titleitem" id="time">time ▲</button>
                            </div>
                            <div class="lt col p-0 text-center ml-xxl-5">
                                <button class="titleitem" id="hits">hits ▲</button>
                            </div>
                        </div>
                    </div>
                    <!-- detail -->
                    <ul class="list">
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>