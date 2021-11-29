<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="../questionadding-3/index-3.css" type="text/css">
    <script src='../questionadding-3/index-3.js'></script>
</head>

<div class="questionadding3">
    <div class="q3-article-top">
        <div class="row p-0 my-5 text-center q3-main">
            <div id="carousel" class="row m-0 mt-4">
                <div class="w-100">
                    <label class="p-0 text-center h1">Give this game a category</label>
                </div>
                <!-- <div class="col">
                    <input type="text" id="Q3-input-Category"
                        class="form-control mx-auto rounded-3 text-center fs-2 fw-bolder" placeholder="Game Category"
                        aria-label="Game Category" disabled style="max-width: inherit;">
                    
                </div> -->

                <div class="col-12 text-center mb-5">
                    <button type="button" id="categorybtn" class="btn fs-2 fw-bolder py-2 form-control" data-bs-target="#GameCategoryModal" data-bs-toggle="modal">Category name</button>
                    <label class="invalid-feedback" for="categorybtn">! Please choose category name !</label>
                </div>
            </div>
        </div>
        <!-- next button -->
        <div class="row">
            <div class="col bottom text-center">
                <button type="button" class="btn back">Back</button>
            </div>
            <div class="col bottom text-center">
                <button type="button" class="btn next">Finish</button>
            </div>
        </div>
    </div>


    <div class="modal fade" role="dialog" id="GameCategoryModal" tabindex="-1" aria-labelledby="GameCategoryModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-center m-0 mx-auto">Choice a GameCategory for your question</h4>
                    <button type="button" class="btn-close btn-close-white btn-sm m-0" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                    <!-- __Dymatic Add Content__ -->


                    <!-- DEMO STRUCTURE
                        <div class="row d-flex justify-content-around text-center">
                            <div class="col-3">
                                <button type="button" class="btn btn-secondary w-75">test1</button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-secondary w-75">test2</button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-secondary w-75">test3</button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-secondary w-75">test3</button>
                            </div>
                        </div> 
                    -->

                </div>
            </div>
        </div>
    </div>
</div>