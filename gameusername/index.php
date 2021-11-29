<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="../gameusername/index.css" type="text/css">
    <script src='../gameusername/index.js'></script>
    <!-- <script src='../bin/Controllers/indexCore.js'></script> -->
</head>

<div class="gameusername">
    <div class="article-top">
        <div class="row p-0 my-5 text-center">
            <div id="carousel" class="row m-0 mt-4">
                <div class="w-100"><label class="p-0 text-center h1"></label></div>
                <div class="col ">
                    <input type="text" class="form-control rounded-3 text-center fs-2 fw-bolder w-50 mx-auto" placeholder="Username" aria-label="Username" <?php echo isset($_SESSION['acc']['login']) ? "value=" . $_SESSION['acc']['username'] . " disabled" : '' ?>>
                    <div id="invalid_Feedback" class="invalid-feedback" style="font-size: 16px;">
                        Please Enter your Username !
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="article-btn" class="col text-cneter">
                    <button type="button" class="btn fs-3 fw-bolder" id="start">Start</button>
                </div>
            </div>
        </div>
    </div>
</div>