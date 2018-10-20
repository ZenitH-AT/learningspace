<?php require_once("../../resource/config.php"); ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="WenyKeny">
        <link rel="icon" href="../image/web/favicon.ico">
        <title>LearningSpace Dashboard</title>
        <!-- Bootstrap core CSS -->
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/fontawesome/css/all.min.css" rel="stylesheet">
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/sb-admin.css" rel="stylesheet">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <!-- Custom styles for this template -->
        <link href="./css/dashboard.css" rel="stylesheet">
    </head>

    <body>

        <?php include 'dash_navbar.php'; ?>
        

        <div class="container-fluid">

            <div class="row">

                <!--Sidebar menu-->
                <?php include 'dash_sidemenu.php'; ?>


                <!--main content-->
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <?php
                    if (!isset($_SESSION['admin'])) {
                        redirect("../HomePage.php");
                    }
                    ?>

                    <?php
                    if ($_SERVER['REQUEST_URI'] == "/project/AccSystem/public/admin/dashboard.php") {
                        include 'dash_main.php';
                    }
                    ?>
                    <?php
                    if (isset($_GET['student'])) {
                        include TEMPLATE_BACK . 'student.php';
                    }
                    ?>
                    <?php
                    if (isset($_GET['booking'])) {
                        include TEMPLATE_BACK . 'booking.php';
                    }
                    ?>
                    <?php
                    if (isset($_GET['viewing'])) {
                        include TEMPLATE_BACK . 'viewing.php';
                    }
                    ?>
                    <?php
                    if (isset($_GET['room'])) {
                        include TEMPLATE_BACK . 'room.php';
                    }
                    ?>
                    <?php
                    if (isset($_GET['notification'])) {
                        include TEMPLATE_BACK . 'notification.php';
                    }
                    ?>
                    <?php
                    if (isset($_GET['ticket'])) {
                        include TEMPLATE_BACK . 'ticket.php';
                    }
                    ?>
                    <?php
                    if (isset($_GET['livechat'])) {
                        include TEMPLATE_BACK . 'livechat.php';
                    }
                    ?>
                    <?php
                    if (isset($_GET['payment'])) {
                        include TEMPLATE_BACK . 'payment.php';
                    }
                    ?>
                    <?php
                    if (isset($_GET['refund'])) {
                        include TEMPLATE_BACK . 'refund.php';
                    }
                    ?>
                    <?php
                    if (isset($_GET['admins'])) {
                        include TEMPLATE_BACK . 'admins.php';
                    }
                    ?>

                </main>

            </div>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="./js/jquery-3.3.1.slim.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="./js/popper.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/myScript.js"></script>

        <!-- Icons -->
        <script src="./js/feather.min.js"></script>
        <script>
            feather.replace();
        </script>

    </body>
</html>