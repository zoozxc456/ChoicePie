<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=0">
    <link rel="stylesheet" href="../public/css/bootstrap-5.0.0/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../public/css/public.css" type="text/css">
    <link rel="stylesheet" href="index.css" type="text/css">
    <script src='../public/js/jquery-3.5.1.js'></script>
    <script src='../public/js/bootstrap-5.0.0/bootstrap.js'></script>
    <script src='../public/js/public.js'></script>
    <script src='index.js'></script>
    <!-- <script src='../bin/Controllers/signup.js'></script> -->
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
                    <p class="text-center lh-base fs-2 fw-bolder m-0" style="color:#F15A28;">Profile</p>

                    <div class="row my-3 d-flex lh-base fs-4 fw-bolder">
                        <!-- top left  -->
                        <div class="col-sm top-left my-sm-5 col-12">
                            <div class="mx-auto d-flex theface">
                                <div class="align-self-center w-100 h1 m-0">123</div>
                            </div>
                        </div>
                        <!-- top right -->
                        <div class="col">
                            <table class="w-100">
                                <tr class="row">
                                    <td class="col-5">Account</td>
                                    <td class="col" id="acc"></td>
                                </tr>
                                <tr class="row">
                                    <td class="col-5">Password</td>
                                    <td class="col" id="password">
                                        ******************
                                    </td> 　
                                </tr>
                                <tr class="row">
                                    <td class="col-5">Username</td>
                                    <td class="col" id="username"></td> 　
                                </tr>
                                <tr class="row">
                                    <td class="col-5">Email</td>
                                    <td class="col" id="email"></td> 　
                                </tr>
                            </table>

                        </div>
                    </div>
                    <!-- pie img -->
                    <div class="row my-5 d-flex justify-content-center lh-base fs-4 fw-bolder">
                        <div class="col text-center" data-toggle="tooltip" data-placement="auto" title="Total Score 10000!">
                            <img id="redpie" src=" ../src/img/pie-gray.png" width="80px" height="80px">
                        </div>
                        <div class="col text-center" data-toggle="tooltip" data-placement="auto" title="Total Score 30000!">
                            <img id="orgpie" src="../src/img/pie-gray.png" width="80px" height="80px">
                        </div>
                        <div class="col text-center" data-toggle="tooltip" data-placement="auto" title="Total Score 50000!">
                            <img id="yelpie" src="../src/img/pie-gray.png" width="80px" height="80px">
                        </div>
                        <div class="col text-center" data-toggle="tooltip" data-placement="auto" title="Total Score 100000!">
                            <img id="grepie" src="../src/img/pie-gray.png" width="80px" height="80px">
                        </div>
                        <div class="col text-center" data-toggle="tooltip" data-placement="auto" title="Total Score 150000!">
                            <img id="bluepie" src="../src/img/pie-gray.png" width="80px" height="80px">
                        </div>
                        <div class="col text-center" data-toggle="tooltip" data-placement="auto" title="Total Score 300000!">
                            <img id="dbpie" src="../src/img/pie-gray.png" width="80px" height="80px">
                        </div>
                        <div class="col text-center" data-toggle="tooltip" data-placement="auto" title="Total Score 500000!">
                            <img id="purpie" src="../src/img/pie-gray.png" width="80px" height="80px">
                        </div>
                    </div>

                </div>
            </div>
            <!-- down artical -->
            <div id="bottom-article" class="row">
                <div class="col text-center py-5">
                    <button type="button" id="bottom-article-btn" class="btn fs-4 fw-bolder px-3 rounded-pill edit" data-bs-toggle="modal" data-bs-target="#EditModal">
                        <a style=" color:#ffffff;text-decoration-line:none">Edit</a>
                    </button>
                </div>
            </div>


            <!-- Edit Modal -->
            <div class="modal fade" role="dialog" id="EditModal" tabindex="-1" aria-labelledby="EditModal" aria-hidden="true">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="row modal-body" style="padding:40px 50px;">
                            <h3 class="col-12 my-4">Enter your password:</h3>
                            <input type="password" class="form-control col text-center" id="form-tag" placeholder="Enter Password" autocomplete="off" >
                            <div id="invalida_Tag_Feedback" class="invalid-feedback" style="font-size: 16px;">
                                Please Enter Password!
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn close" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn close btn-default done">Done</button>
                            <!-- data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#EditModal2" -->
                        </div>
                    </div>
                </div>
            </div>


            <!-- Edit Modal2 -->
            <div class="modal fade" role="dialog" id="EditModal2" tabindex="-1" aria-labelledby="EditModal2" aria-hidden="true">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <!-- header -->
                        <div class="modal-header" style="padding:35px 50px;">
                            <h2 class="text-center m-0" id="header-qno">Change Profile</h2>
                            <button type="button" class="btn-close btn-close-white btn-sm" aria-label="Close" data-bs-dismiss="modal"></button>
                        </div>
                        <!-- body -->
                        <div class="row modal-body" style="padding:40px 50px;">
                            <div class="col">
                                <div class="row form-group">
                                    <label class="col-12 org text-start fs-4">Account</label>
                                    <div class="acc" id="form-acc">account</div>
                                    <!-- <div class="col invalid-feedback align-self-center"></div>
                                    <input type="text" class="form-control" id="form-acc" placeholder="Enter new account" disabled> -->
                                </div>
                                <div class="row form-group">
                                    <label class="col-12 org text-start fs-4">Password</label>
                                    <div class="col invalid-feedback align-self-center"></div>
                                    <input type="password" class="col form-control" id="form-pwd" placeholder="Enter new password">
                                </div>
                                <div class="row form-group">
                                    <label class="col-12 org text-start fs-4">Username</label>
                                    <div class="col invalid-feedback align-self-center"></div>
                                    <input type="text" class="col form-control" id="form-user" placeholder="Enter new username">
                                </div>
                                <div class="row form-group">
                                    <label class="col-12 org text-start fs-4">Email</label>
                                    <div class="col invalid-feedback align-self-center"></div>
                                    <input type="email" class="col form-control" id="form-email" placeholder="Enter new email">
                                </div>
                                <div id="invalid_Form_Feedback" class="invalid-feedback" style="font-size: 16px;">
                                    Please Enter new Password!
                                </div>
                            </div>
                        </div>
                        <!-- footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn close" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn close btn-default save">Save</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Edit Modal3 -->
            <div class="modal fade" role="dialog" id="EditModal3" tabindex="-1" aria-labelledby="EditModal3" aria-hidden="true" style="background-color: rgba(0,0,0,0.35);">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <!-- header -->
                        <div class="modal-header" style="padding:35px 50px;">
                            <h2 class="text-center m-0" id="header-qno">Change Password</h2>
                            <button type="button" class="btn-close btn-close-white btn-sm" aria-label="Close" data-bs-dismiss="modal"></button>
                        </div>
                        <!-- body -->
                        <div class="row modal-body" style="padding:40px 50px;">
                            <div class="col">
                                <div class="row form-group">
                                    <label class="col-12 org text-start fs-4">New Password</label>
                                    <div class="col invalid-feedback align-self-center"></div>
                                    <input type="password" class="form-control" id="form-new-pwd" placeholder="Enter new password">
                                </div>
                                <div class="row form-group">
                                    <label class="col-12 org text-start fs-4">Conform Password</label>
                                    <div class="col invalid-feedback align-self-center"></div>
                                    <input type="password" class="form-control" id="form-confirm-pwd" placeholder="Enter confirm password">
                                </div>
                                <div id="invalid_newPwd_Feedback" class="invalid-feedback" style="font-size: 16px;">
                                    Please Enter new Password!
                                </div>
                            </div>
                        </div>
                        <!-- footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn close" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn close btn-default ok">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>