<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=0">
    <link rel="stylesheet" href="../public/css/bootstrap-5.0.0/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../wb-public/css/public.css" type="text/css">
    <link rel="stylesheet" href="index.css" type="text/css">
    <script src='../public/js/jquery-3.5.1.js'></script>
    <script src='../public/js/bootstrap-5.0.0/bootstrap.js'></script>
    <script src='../wb-public/js/public.js'></script>
    <script src='index.js'></script>

</head>

<body>
    <!-- Require Header -->
    <?php require_once '../wb-public/header.html'; ?>
    <div id="content" class="row m-0 p-0 container-fluid">
        <!-- Require Aside -->
        <?php require_once '../wb-public/aside.php'; ?>
        <div id="article" class="col-md-10 col-sm-12 p-0">
            <!-- Game Name -->
            <div class="row top">
                <p class="col-2 text-center">
                    <button class="back">
                        <img src="../src/img/leftarrow.png" width="30px" height="30px">
                    </button>
                </p>
                <p class="col-8 moretitle text-center">MORE DETAILS</p>
            </div>
            <!-- more details -->
            <div class="row main">
                <div class="row item">
                    <label class="org">Title : </label>
                    <div id="txtTitle" class="col mt-2">
                        When can I go on holiday abroad or in the UK?
                    </div>
                </div>
                <div class="row item">
                    <div class="col">
                        <label class="org">Tag : </label>
                        <label id="txtTag">TOURISM </label>
                    </div>
                    <div class="col">
                        <label class="org">Hits :</label>
                        <labal id="txtHits">2187</label>
                    </div>
                    <div class="col">
                        <label class="org">Release Time :</label>
                        <label id="txtTime">2021-03-25 19:13:16</label>
                    </div>
                </div>
                <div class="row item">
                    <label class="org">Link : </label>
                    <div id="txtLink" class="col textarea my-2">
                        https://www.w3schools.com/bootstrap4/tryit.asp?filename=trybs_tooltip&stacked=h
                    </div>
                </div>
                <div class="row item">
                    <label class="org">Content : </label>
                    <div id="txtContent" class="col textarea mt-2 mb-3">
                        Anyone in England who travels abroad without good reason will soon face a £5000 fine.
                    </div>
                </div>
            </div>
            <!-- edit button -->
            <div class="row d-flex justify-content-center align-items-center">
                <button class="delete mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                    Delete
                </button>
                <button class="edit mt-4">
                    Edit
                </button>
            </div>
            <!-- delete Modal -->
            <div class="modal fade" role="dialog" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-body" style="padding:40px 50px;">
                            <h3>Are you sure you want to delete this link ? </h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn close yes" data-bs-dismiss="modal">YES</button>
                            <button type="button" class="btn close btn-default no" data-bs-dismiss="modal">NO</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>