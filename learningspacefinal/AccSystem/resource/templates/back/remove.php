<?php
require_once '../../config.php';

if (isset($_GET['student'])) {
    $getId = escape_String($_GET['student']);
    $result = toRemove("student", "studID", $getId);
    if ($result==1) {
        redirect("../../../public/admin/dashboard.php?student=deleted");
    }  else {
        redirect("../../../public/admin/dashboard.php?student=notdeleted");
    }
}  else {
    
}

if (isset($_GET['student'])) {
    
}  else {
    
}

