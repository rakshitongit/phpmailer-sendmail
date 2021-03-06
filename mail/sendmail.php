<?php
include '../mailer.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/fontawesone.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/asb.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="js/highlight.js"></script>
</head>
<body>
<div class="container pb-mail-template1">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <nav class="navbar navbar-default pb-mail-navbar">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" id="brand" href="#">Hello, <u>Rakshit!</u></a>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="row">
                <div class="col-md-2" id="column-resize">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <button id="btn_email" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                            New E-mail
                        </button>
                        <div id="treeview">
                        </div>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <div class="col-md-10">
                    <div class="row" id="row_style">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-4 col-md-4">
                                        <p id="inbox_parag">INBOX</p>
                                    </div>
                                    <div class="col-xs-8 col-md-8">
                                        <div class="input-group">
                                            <input type="text" name="" placeholder="Search...." class="form-control">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" type="button" tabindex="-1">
                                                    <span class="fa fa-question fa-2x" area-hidden="true"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-9 col-md-10">
                                        <div class="btn-group">
                                            <a data-toggle="dropdown" href="#" class="btn btn-warning btn-md"
                                               aria-expanded="false">All
                                                <i class="fa fa-angle-down "></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">None</a></li>
                                                <li><a href="#">Read</a></li>
                                                <li><a href="#">Unread</a></li>
                                            </ul>
                                            <a href="#" class="btn btn-warning">
                                                <i class=" fa fa-refresh fa-lg"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group">
                                            <a data-toggle="dropdown" href="#" class="btn btn-warning btn-md"
                                               aria-expanded="false">More
                                                <i class="fa fa-angle-down "></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Mark all as read</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xs-3 col-md-2">

                                        <div class="btn-group pull-right">
                                            <a data-toggle="dropdown" href="#" class="btn btn-primary"
                                               aria-expanded="false">
                                                <i class="fa fa-cog"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Comfortable</a></li>
                                                <li><a href="#">Cozy</a></li>
                                                <li><a href="#">Compact</a></li>
                                                <hr>
                                                <li><a href="#">Configure inbox</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div id="grid123">
                                    <table id="example" class="display" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Open Mail</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($data as $t) {
                                            ?>
                                            <tr>
                                                <td><?=$i+1?></td>
                                                <td><?= $t["email"] ?></td>
                                                <td><?= $t["subject"] ?></td>
                                                <td><button class="btn btn-success" onclick="openModal(<?=$i?>)">Open Mail</button></td>
                                            </tr>
                                            <?php
                                            $i++;
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal view -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>New message</h5>
                                </div>
                                <div class="col-md-8">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <form onsubmit="return sendmail();">
                            <div class="modal-body">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <p>To: </p>
                                    </div>
                                    <div class="col-md-9">
                                        <input id="senderemailid" type="text" name="search" placeholder="Enter e-mail"
                                               class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <p>Subject: </p>
                                    </div>
                                    <div class="col-md-9">
                                        <input id="subject" type="text" name="subject" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <p>Message: </p>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea id="message" class="form-control" rows="15" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End of modal -->

            <div class="modal fade" id="myModalBody" tabindex="-1" role="dialog" aria-labelledby="exampleModal"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Email-id: <span id="emailid"></span></h5>
                        </div>
                        <div class="modal-body">
                            <h4>Subject: <span id="subject"></span></h4>
                            <h5>Body: <span id="body"></span></h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal view -->
            <div class="modal fade" id="myModalsuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModal"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Success</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of modal -->

            <!-- Modal view -->
            <div class="modal fade" id="myModalfail" tabindex="-1" role="dialog" aria-labelledby="exampleModal"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Could Not Send Mail</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of modal -->

        </div>
    </div>
</div>

<style>
    .pb-mail-template1 {
        font-family: "Roboto", "Helvetica Neue", Helvetica, Arial, sans-serif;
        border: 1px solid black;
        border-radius: 6px;
        margin-top: 40px;
        height: 90%;
    }

    .pb-mail-navbar {
        background: #3e3f3a;
        border: none;
    }

    .btn-warning {
        background-color: #f47c3c;
    }

    .pb-mail-template1 .dropdown-menu > li > a {
        font-size: 11px;
        line-height: 22px;
        font-weight: 500;
        text-transform: uppercase;
    }

    .pb-mail-template1 .dropdown-menu > li > a {
        display: block;
        padding: 3px 20px;
        clear: both;
        font-weight: normal;
        line-height: 1.42857143;
        color: #98978b;
        white-space: nowrap;
    }

    .pb-mail-template1 .btn {
        display: inline-block;
        margin-bottom: 0;
        font-weight: normal;
        text-align: center;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        background-image: none;
        border: 1px solid transparent;
        white-space: nowrap;
        font-size: 14px;
        line-height: 1.42857143;
        border-radius: 4px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .pb-mail-template1 .form-control {
        display: block;
        width: 100%;
        height: 43px;
        padding: 12px 16px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #3e3f3a;
        background-color: #ffffff;
        background-image: none;
        border: 1px solid #dfd7ca;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }

    #brand {
        color: white;
    }

    #btn_email {
        width: 120px;
    }

    #inbox_parag {
        font-size: 22px;
        padding: 11px 5px 5px 11px;
        color: #98978b;
        font-weight: 600;
    }
</style>

<!-- you need to include the shieldui css and js assets in order for the charts to work -->
<link rel="stylesheet" type="text/css"
      href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css"/>


<script type="text/javascript">
    $(function () {
        $("#treeview").shieldTreeView({
            dataSource: dataSrc
        });

        $("#grid").shieldGrid({
            dataSource: {
                data: gridData
            },
            sorting: {
                multiple: true
            },
            paging: {
                pageSize: 12,
                pageLinksCount: 10
            },
            selection: {
                type: "row",
                multiple: true,
                toggle: false
            },
            columns: [
                {field: "check", title: "&nbsp;", width: "2em", attributes: {style: "text-align: center;"}},
                {field: "icon", title: "&nbsp;", width: "2em", attributes: {style: "text-align: center;"}},
                {field: "message", title: "Subject", width: "17em"},
                {field: "attach", title: "&nbsp;", width: "2em", attributes: {style: "text-align: center;"}},
                {field: "date", title: "Delivered", width: "6em"}
            ]
        });
    })
</script>
<script type="text/javascript">
    jQuery(function ($) {
        $('pre code').each(function (i, block) {
            hljs.highlightBlock(block);
        });
    });
</script>

<script>
    function sendmail() {
        var emailid = $('#senderemailid');
        var subject = $('#subject');
        var message = $('#message');
        var data = {
            sendmail: "yes",
            emailid: emailid.val(),
            subject: subject.val(),
            message: message.val()
        };
        $.post('../mailer.php', data).then(function (data) {
            $('#myModal').modal('hide');
            if (data.trim() == "success") {
                $('#myModalsuccess').modal('show');
                return false;
            } else {
                $('#myModalfail').modal('show');
                return false;
            }
        });
        return false;
    }

    $(document).ready(function () {
        $('#example').DataTable();
    });

    function openModal(id) {
        var data = <?=json_encode($data)?>;
        $('#myModalBody').modal('hide');
        $('#myModalBody').modal('show');
        $('#emailid').html(data[id]["email"]);
        $('#subject').html(data[id]["subject"]);
        $('#body').html(data[id]["body"]);
    }
</script>

</body>
</html>