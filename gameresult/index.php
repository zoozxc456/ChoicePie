<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="../gameresult/index.css" type="text/css">
    <script src='../gameresult/index.js'></script>

</head>

<div class="gameresult">
    <!-- Game Name -->
    <div class="row top text-start">
        <p class="col-2 text-center">
            <button class="back">
                <img src="../src/img/leftarrow.png" width="30px" height="30px">
            </button>
        </p>
        <p class="col RecordTitle text-center">KPOP MUSIC</p>
        <p class="col-2"></p>
    </div>
    <!-- bar -->
    <div class="row barrow">
        <div class="col d-flex justify-content-center ">
            <div id="bar" class="row align-items-end text-center">
                <div class="col">
                    <div class="mx-auto theface d-flex justify-content-center">
                        <div class="mx-auto align-self-center" style="font-size: 3vw;color: #585857;"></div>
                    </div>
                    <div class="bar2 barbg mx-auto">
                    </div>
                    <label>2</label>
                </div>
                <div class="col">
                    <div class="mx-auto"><img id="crown" src="../src/img/crown.png"></div>
                    <div class="mx-auto theface d-flex justify-content-center">
                        <div class="mx-auto align-self-center" style="font-size: 3vw;color: #585857;"></div>
                    </div>
                    <div class="bar1 barbg mx-auto"></div>
                    <label>1</label>
                </div>
                <div class="col">
                    <div class="mx-auto theface d-flex justify-content-center">
                        <div class="mx-auto align-self-center" style="font-size: 3vw;color: #585857;"></div>
                    </div>
                    <div class="bar3 barbg mx-auto"></div>
                    <label>3</label>
                </div>
            </div>
            <!-- none img -->
            <div id="none" class="row my-5">
                <img src="../src/img/none.png">
            </div>
        </div>
    </div>


    <!-- Record List -->
    <div class="row">
        <div class="col-12 Conditiontxt1 text-center"></div>
        <div class="col-12 Conditiontxt2 text-center"></div>
    </div>
    <div class="d-flex justify-content-evenly own mx-auto mt-4">
        <!-- <div class="col text-center" id="ownorder">#723</div> -->
        <div class="text-center text-truncate" id="ownusername">Titi</div>
        <div class="text-center" id="ownscore">2002</div>
    </div>
    <div class="row ranktitle mt-5">
        <div class="col text-center RecordTitle">Rank</div>
    </div>
    <div class="row list">
        <ul class="col RecordList">
            <!-- <li class="row listitem">
                <p class="col No">1</p>
                <p class="col ">Titi</p>
                <p class="col ">1023</p>
            </li>
            <li class="row listitem">
                <div class="col No">2</div>
                <div class="col ">heathaet</div>
                <div class="col ">999</div>
            </li>
            <li class="row listitem">
                <div class="col No">3</div>
                <div class="col ">leo</div>
                <div class="col ">859</div>
            </li>
            <li class="row listitem">
                <div class="col No">4</div>
                <div class="col ">aa</div>
                <div class="col ">725</div>
            </li>
            <li class="row listitem">
                <p class="col No">5</p>
                <p class="col ">bb</p>
                <p class="col ">623</p>
            </li>
            <li class="row listitem">
                <div class="col No">6</div>
                <div class="col ">heagfashthaet</div>
                <div class="col ">399</div>
            </li>
            <li class="row listitem">
                <div class="col No">7</div>
                <div class="col ">zz</div>
                <div class="col ">259</div>
            </li>
            <li class="row listitem">
                <div class="col No">8</div>
                <div class="col ">hgnh</div>
                <div class="col ">125</div>
            </li>
            <li class="row listitem">
                <div class="col No">9</div>
                <div class="col ">opgngnh</div>
                <div class="col ">15</div>
            </li>
            <li class="row listitem">
                <div class="col No">10</div>
                <div class="col ">hgnh</div>
                <div class="col ">12</div>
            </li> -->
        </ul>
    </div>
    <!-- null -->
    <div id="null-list" class="row">
        <div class="col text-center">
            <img src="../src/img/pie-dot.png" width="150px" height="150px" id="pie">
            <div class="null-txt">No player yet</div>
        </div>

    </div>
</div>