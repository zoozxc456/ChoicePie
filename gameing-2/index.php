<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="../gameing-2/index.css" type="text/css">
    <script src='../gameing-2/index.js'></script>
</head>


<div class="gameing-2">
    <div class="article-top">
        <!-- score -->
        <div class="row circle">
            <div class="col counter">
                <div class="counter-value">
                    <p class="plus">+</p>
                    <p class="point">256</p>
                </div>
            </div>
        </div>
        <!-- timer -->
        <div class="row">
            <div class="progress">
                <div class="progress-scoreBar" role="progressbar" aria-valuemin="0" aria-valuemax="100"
                    style="width: 100%;">
                    <span class="sr-only"></span>
                </div>
            </div>
        </div>
        <!-- text -->
        <div class="row text">
            <label id="score" class="score">Your score is 256</label>
        </div>
        <div class="row text">
            <label id="order" class="order">You're 1st now</label>
        </div>
    </div>
</div>