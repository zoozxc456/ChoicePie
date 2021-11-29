<?php require "../bin/Controllers/config.inc.php"; ?>
<aside id="aside" class="col-md-2">
    <nav class="text-center">
        <ul class="py-5 px-0 px-md-2 px-lg-3">
            <li class="rounded-pill ">
                    <div id="signin" class="singin text-truncate">
                        <?php echo isset($_SESSION['acc']['login']) ? "Hi, " . $_SESSION['acc']['username'] : "Sign in" ?>
                    </div>
                </li>
            <li class="rounded-pill"><a href="../gameCategory/" style="color:#F8931D;text-decoration-line:none">
                    <div class="item">Play</div>
                </a></li>
            <li class="rounded-pill"><a href="../questioncategory" style="color:#F8931D;text-decoration-line:none">
                    <div class="item">Create</div>
                </a>
            </li>
            <li class="rounded-pill"><a href="../rank" style="color:#F8931D;text-decoration-line:none">
                    <div class="item">Rank</div>
                </a></li>
            <li class="rounded-pill"><a href="../gamerecord" style="color:#F8931D;text-decoration-line:none">
                    <div class="item">Record</div>
                </a></li>
        </ul>
    </nav>
</aside>
<!-- create Modal -->
<div class="modal fade" role="dialog" id="signoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" style="padding:40px 50px;">
                <!-- icon -->
                <div class="col text-center mt-3">
                    <div class="h3">Are you sure you want to <span style="color:#ED5C20;">sign out</span>?</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn yes btn-default" data-bs-dismiss="modal" id="signoutyes">Yes</button>
                <button type="button" class="btn no btn-default" data-bs-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>