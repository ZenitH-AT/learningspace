<?php
//require_once "../resource/config.php"; 
//
//if (isset($_POST['login_button'])) {
//    $userName= escape_String($_POST['username']);
//    $passWord= escape_String($_POST['password']);
//    
//    $query = "SELECT * FROM login_test "
//            . "WHERE username='{$userName}'"
//            . "AND password='{$passWord}'";
//
//            $result= query($query);
//    //$result = mysqli_query($connection, $query);
//    
//    if (mysqli_num_rows($result)>0) {
//        $_SESSION["username"]=$_POST["username"];
//        redirect("HomePage.php");
//        
//    } else {
//        redirect("HomePage.php?error=1");
//    }
//    
//}