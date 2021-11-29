<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="../questionadding-2/index-2.css" type="text/css">
    <script src='../questionadding-2/index-2.js'></script>

</head>


<div class="questionadding2">

    <div class="row cube">
        <div class="col q2-article-top text-center">
            <?php /* <div class="row p-0 my-3 q2-main">
                <div class="col">
                    <div class="row question">
                        <!-- question -->
                        <div class="col text-start">
                            <label class="h2">Q1.</label>
                            <label class="h3">Which song was not released in 2019?</label>
                        </div>
                        <!-- button -->
                        <div class="col-2 text-end">
                            <button class="draw" data-bs-toggle="modal" data-bs-target="#EditModal">
                                <img src="../src/img/draw.png" width="25px" height="25px">
                            </button>
                            <button class="delete" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                <img src="../src/img/delete.png" width="40px" height="40px">
                            </button>
                        </div>
                    </div>
                    <!-- option -->
                    <div class="row option">
                        <div class="col article-btn">
                            <button type="button" class="btn fs-3 fw-bolder opt1">Dynamite</button>
                        </div>
                        <div class="col article-btn">
                            <button type="button" class="btn fs-3 fw-bolder opt2">Go Go</button>
                        </div>
                        <div class="col article-btn">
                            <button type="button" class="btn fs-3 fw-bolder opt3">Dis-ease</button>
                        </div>
                        <div class="col article-btn">
                            <button type="button" class="btn fs-3 fw-bolder opt4">Dis-ease</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-0 my-3 q2-main">
                <div class="col">
                    <!--  -->
                    <div class="row question">
                        <!-- question -->
                        <div class="col text-start">
                            <label class="h2">Q2.</label>
                            <label class="h3">Which song was not released in 2020?</label>
                        </div>
                        <!-- button -->
                        <div class="col-2 text-end">
                            <button class="draw" data-bs-toggle="modal" data-bs-target="#EditModal">
                                <img src="../src/img/draw.png" width="25px" height="25px">
                            </button>
                            <button class="delete" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                <img src="../src/img/delete.png" width="40px" height="40px">
                            </button>
                        </div>
                    </div>
                    <!-- option -->
                    <div class="row option">
                        <div class="col article-btn">
                            <button type="button" class="btn fs-3 fw-bolder opt1">Dynamite</button>
                        </div>
                        <div class="col article-btn">
                            <button type="button" class="btn fs-3 fw-bolder opt2">I can't stop me</button>
                        </div>
                        <div class="col article-btn">
                            <button type="button" class="btn fs-3 fw-bolder opt3">Not shy</button>
                        </div>
                        <div class="col article-btn">
                            <button type="button" class="btn fs-3 fw-bolder opt4">Psycho</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-0 my-3 q2-main">
                <div class="col">
                    <!--  -->
                    <div class="row question">
                        <!-- question -->
                        <div class="col text-start">
                            <label class="h2">Q3.</label>
                            <label class="h3">Which song was not released in 2021?</label>
                        </div>
                        <!-- button -->
                        <div class="col-2 text-end">
                            <button class="draw" data-bs-toggle="modal" data-bs-target="#EditModal">
                                <img src="../src/img/draw.png" width="25px" height="25px">
                            </button>
                            <button class="delete" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                <img src="../src/img/delete.png" width="40px" height="40px">
                            </button>
                        </div>
                    </div>
                    <!-- option -->
                    <div class="row option">
                        <div class="col article-btn">
                            <button type="button" class="btn fs-3 fw-bolder opt1">Dynamite</button>
                        </div>
                        <div class="col article-btn">
                            <button type="button" class="btn fs-3 fw-bolder opt2">Go Go</button>
                        </div>
                        <div class="col article-btn">
                            <button type="button" class="btn fs-3 fw-bolder opt3">Dis-ease</button>
                        </div>
                        <div class="col article-btn">
                            <button type="button" class="btn fs-3 fw-bolder opt4">Dis-ease</button>
                        </div>
                    </div>
                </div>
            </div>*/ ?>

            <!-- add button-->
            <div id="addItem" class="row p-2 my-3 q2-main">
                <div class="col text-center d-flex justify-content-center align-items-center">
                    <button class="add" data-bs-toggle="modal" data-bs-target="#EditModal">
                        <h2 style="text-shadow:1px 1px #c7c7c7;color:#F8931D">CLICK ME TO ADD QUESTION</h2>
                        <img src="../src/img/plus3.png" width="40px" height="40px">
                    </button>
                </div>
            </div>
            <!-- button toast -->
            <div class="toast">
                <div class="toast-body">
                    Click the button to set the ans
                </div>
            </div>
            <!-- edit & add Modal -->
            <div class="modal fade" role="dialog" id="EditModal" tabindex="-1" aria-labelledby="EditModal"
                aria-hidden="true">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <!-- header -->
                        <div class="modal-header" style="padding:35px 50px;">
                            <h4 class="text-center m-0" id="header-qno"></h4>
                            <button type="button" class="btn-close btn-close-white btn-sm" aria-label="Close"
                                data-bs-dismiss="modal"></button>
                        </div>
                        <!-- body -->
                        <div class="modal-body" style="padding:40px 50px;">
                            <div class="col">
                                <div class="form-group">
                                    <label for="form-title" class="q2-org text-start">Question</label>
                                    <label for="form-q"></label>
                                    <input type="text" class="form-control" id="form-q" placeholder="Enter question">
                                </div>
                                <div class="row form-group">
                                    <label class="col q2-org text-start">Option 1</label>
                                    <div class="col invalid-feedback align-self-center"></div>
                                    <input type="text" class="form-control" id="form-opt1" placeholder="Enter option 1">
                                </div>
                                <div class="row form-group">
                                    <label class="col q2-org text-start">Option 2</label>
                                    <div class="col invalid-feedback align-self-center"></div>
                                    <input type="text" class="form-control" id="form-opt2" placeholder="Enter option 2">
                                </div>
                                <div class="row form-group">
                                    <label class="col q2-org text-start">Option 3</label>
                                    <div class="col invalid-feedback align-self-center"></div>
                                    <input type="text" class="form-control" id="form-opt3" placeholder="Enter option 3">
                                </div>
                                <div class="row form-group">
                                    <label class="col q2-org text-start">Option 4</label>
                                    <div class="col invalid-feedback align-self-center"></div>
                                    <input type="text" class="form-control" id="form-opt4" placeholder="Enter option 4">
                                </div>
                            </div>
                        </div>
                        <!-- footer -->
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn close btn-default no" data-bs-dismiss="modal">Cancel</button> -->
                            <button type="button" id="btn_done" class="btn close">Done</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- delete Modal -->
            <div class="modal fade" role="dialog" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModal"
                aria-hidden="true">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-body" style="padding:40px 50px;">
                            <h3>
                                Are you sure you want to delete <label class="qno">"game name"</label> ?
                            </h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btn_delete" class="btn close" data-bs-dismiss="modal">YES</button>
                            <button type="button" class="btn close btn-default no" data-bs-dismiss="modal">NO</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


    <!-- next button -->
    <div class="row mt-5">
        <div class="col bottom text-center">
            <button type="button" class="btn back">Back</button>
        </div>
        <div class="col bottom text-center">
            <button type="button" class="btn next">Next</button>
        </div>
    </div>
    <div id="Q2-alert" class="alert alert-warning alert-dismissible" role="alert">
        <h4 class="text-center m-0">
            ! You have to create at least one question !
        </h4>
        <button type="button" class="btn-close" aria-label="Close"></button>
    </div>
</div>