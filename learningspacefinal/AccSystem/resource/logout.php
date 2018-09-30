<?php

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION)) {
    unset($_SESSION["admin"]);
    unset($_SESSION["idadmin"]);
    unset($_SESSION["adminFN"]);
    unset($_SESSION["adminLN"]);
    unset($_SESSION["adminCategory"]);
    unset($_SESSION["adminEmail"]);
    unset($_SESSION["adminIsActive"]);
    unset($_SESSION["adminPass"]);
    
    unset($_SESSION["iduser"]);
    unset($_SESSION["firstname"]);
    unset($_SESSION["lastname"]);
    unset($_SESSION["email"]);
    unset($_SESSION["isactive"]);
    unset($_SESSION["password"]);
    unset($_SESSION["userRoomBooked"]);
    unset($_SESSION["checkPayment"]);
    unset($_SESSION["numMonth2"]);
    unset($_SESSION["numMonth"]);
    unset($_SESSION["monthsNum"]);
    unset($_SESSION["bookStatDate"]);
    unset($_SESSION["bookStatus"]);
    unset($_SESSION['roomPrice']);
    unset($_SESSION["count"]);
    unset($_SESSION["totalCost"]);
    unset($_SESSION["idRoom"]);
    unset($_SESSION["numDaysLeft"]);
    $_SESSION = array();
    session_destroy();

    if (isset($_GET['error'])) {
        header("Location: ../public/HomePage.php?error=8");
    } else {
        header("Refresh:0;");
        header("Location: ../public/HomePage.php");
        //header("Refresh:0; url=../public/HomePage.php");
    }
}