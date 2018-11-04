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

        <!-- Search bar -->
        <script>
            //Only show search bar if the user is not at dashboard or live chat page
            if(window.location.href.includes("?")) {
                document.getElementById('searchFilter').style.display = "block";

                if (window.location.href.includes("?livechat")) {
                    document.getElementById('searchFilter').style.display = "none";
                }
            } else {
                document.getElementById('searchFilter').style.display = "none";
            }
            
            //Search bar code
            $('#searchFilter').on("keypress", function(e) {
                //If enter key is pressed
                if (e.keyCode == 13) {
                    var urlStr = window.location.href;
                    var filter = document.getElementById('searchFilter').value;

                    if(!window.location.href.includes("?")) {
                        alert("You must go to a section before you can search.");
                        return;
                    }
                    
                    //Do not append "&searchFilter=" if input was blank and remove any existing searchFilter parameter
                    if (filter == "") {
                        window.location.href = window.location.href.split("&searchFilter=")[0]; //element 0 of this split string is everything before the & symbol
                        return;
                    } 

                    if (window.location.href.includes("&searchFilter=")) {
                        //Prevents appending a search query to the URL more than once
                        urlStr = window.location.href.split("&searchFilter=")[0] + "&searchFilter=" + filter;
                    } else {
                        urlStr = window.location.href + "&searchFilter=" + filter;
                    }

                    window.location.href = urlStr;
                    return;
                }
            });
            
            //Search results filtering
            if (window.location.href.includes("&searchFilter=")) {
                var filter = decodeURI(window.location.href.split("&searchFilter=")[1].toLowerCase()); //decodeURI replaces all %20 and other URI text with its proper representation (e.g. whitespace)
                var trs = document.getElementsByTagName('tr');
                var atLeastOneResultFound = false;

                for(var i = 1; i < trs.length; i++) { //i is initialised to 1 to skip the table headings row
                    var rowText = trs[i].textContent.toLowerCase(); //both the filter and row text are changed to lower case so searches are case-insensitive

                    if(!rowText.includes(filter)) {
                        trs[i].style.display = "none";
                    } else {
                        atLeastOneResultFound = true;
                    }
                }
                
                if (!atLeastOneResultFound) {
                    alert("No results found for filter: " + filter);
                    window.location.href = window.location.href.split("&searchFilter=")[0]; //remove searchFilter parameter from URL
                }
            }
        </script>

    </body>
</html>