<?php

require ("vendor/autoload.php");
require 'MailClass.php';
require_once ("vendor/swiftmailer/swiftmailer/lib/swift_required.php");

function redirect($location) {
    header("Location: $location");
}

function query($sql) {
    global $connection;
    return mysqli_query($connection, $sql);
}

function countItem($result) {
    return mysqli_num_rows($result);
}

function confirm($result) {
    global $connection;
    if (!$result) {
        die("YOUR QUERY FAILED" . "<br><br>" . mysqli_error($connection) . "<br><br>" . mysqli_error($connection));
    }
}

function escape_String($string) {
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result) {
    return mysqli_fetch_array($result);
}

function backHOme() {
    if (!isset($_SESSION['iduser']) && !isset($_SESSION["admin"])) {
        redirect("HomePage.php");
    }
}

function countRecords($tb, $idField=null, $tar=null, $idField2=null , $tar2=null){
    if ($tar == null) {
        $query = query("SELECT * FROM ".escape_String($tb)." ");
    }elseif ($idField2 != null) {
        $query = query("SELECT * FROM ".escape_String($tb)." WHERE ". escape_String($idField) ."= '" .  escape_String($tar)."' "
                . "AND ".  escape_String($idField2)."= '".  escape_String($tar2)."' ");
    }else{
        $query = query("SELECT * FROM ".escape_String($tb)." WHERE ". escape_String($idField) ."= '" .  escape_String($tar)."' ");
    }
    confirm($query);
    $count = countItem($query);
    return $count;
}


function toRemove($tableName, $colomnName, $idItem) {
    $tN = escape_String($tableName);
    $clN = escape_String($colomnName);
    $id = escape_String($idItem);
    $query = "DELETE FROM {$tN} WHERE {$clN}='{$id}' ";
    $remove = query($query);
    confirm($remove);
    if ($remove) {
        return 1;
    } else {
        return 0;
    }
}

//Get Rooms
function get_Rooms_BelowBelow() {
    $query = query("SELECT * FROM room WHERE roomReserved != 1 AND roomType='deluxe' LIMIT 6");
    confirm($query);
    $num = 1;
    $target = 'two';
    while ($row = fetch_array($query)) {
        $room1 = <<<DELIMETER
    <div class="col-sm-4 col-lg-4 col-md-4" >
        <div class="card-img-top card" style="padding-bottom: 2px;">
            <div data-toggle="tooltip" data-placement="top" title="Click to View and Book Room">
            <a class=""  href="viewRoom.php?id={$row['room_id']}">
            <img class="card-img-top" style="height:10rem; object-fit:cover;" src="IMAGE/gallery/{$row['roomImage']}" alt="">
            </a>
            </div>
            <div class="card-body">
                <h4 class="float-right">&#82;{$row['roomPrice']}</h4>
                <h4 class="card-title float-left"><a class="text-primary">{$row['roomName']}</a></h4>
                <br>
                <br>             
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default" id="headingOne">
                        <p>{$row['roomShortDescription']}  <a class="" data-toggle="collapse" data-target="#$target" aria-expanded="true" aria-controls="collapseOne" href="#">More&raquo;</a></p>
                    </div>
                    <div id="$target" class="panel-collapse collapse in" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body" style="">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
                            mon cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                        </div>
                        <a class="btn btn-outline-primary"  href="viewRoom.php?id={$row['room_id']}">View Room</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
DELIMETER;
        echo $room1;
        $target = $target . ($num++);
    }
}

function get_Rooms_Gallery() {
    $query = query("SELECT * FROM room ORDER BY roomReserved, roomPrice");
    confirm($query);

    while ($row = fetch_array($query)) {
        $availability = ($row['roomReserved'] == 0 ? "<a class=text-success>Available @ R{$row['roomPrice']} p/m</a>" : "<a class=text-danger>Not available</a>");

        $room1 = <<<DELIMETER
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <a class="lightbox" href="IMAGE/gallery/{$row['roomImage']}">
                    <img src="IMAGE/gallery/{$row['roomImage']}" style="max-width: 100%; height: 205px;">
                </a>
                <div class="caption">
                    <h3>{$row['roomName']}</h3>
                    <p>{$row['roomShortDescription']}<br/><br/>
                    {$availability}
                    <br/><br/><a class="text-success" style="float:right; font-size:150%" href="viewRoom.php?id={$row['room_id']}">More info &raquo;</a></p>
                </div>
            </div>
        </div>
DELIMETER;
        echo $room1;
    }
}

function get_Rooms_BelowCarousel() {
    $query = query("SELECT * FROM room WHERE roomReserved != 1 AND roomType='gold' LIMIT 3");
    confirm($query);
    $num3 = 1;
    $target = 'one';
    while ($row = fetch_array($query)) {
        $room3 = <<<DELIMETER
    <div class="col-lg-4">
        <div data-toggle="tooltip" data-placement="top" title="Click to View and Book Room">
        <a href="viewRoom.php?id={$row['room_id']}">
        <img class="rounded-circle" style="height:200px; width:200px; object-fit:cover;" src="IMAGE/gallery/{$row['roomImage']}" alt="">
        </a>
        </div>
        </a>
        <h2>{$row['roomName']}</h2>
        <p>{$row['roomShortDescription']} <a class="" data-toggle="collapse" data-target="#$target" aria-expanded="true" aria-controls="collapseOne" href="#">More&raquo;</a></p></p>
        <div class="panel-group" id="accordion">
            <div id="$target" class="panel-collapse collapse in" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body" style="">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
                    mon cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                </div>
                <a class="btn btn-outline-primary" href="viewRoom.php?id={$row['room_id']}">View Room</a>
            </div>
        </div>
    </div>
DELIMETER;
        echo $room3;
        $target = $target . ($num3++);
    }
}

function get_Rooms_Marketing() {
    $query = query("SELECT R.room_id,R.roomDescription, R.roomImage,R.roomPrice,R.roomName, RM.firstText,RM.secondText "
            . "FROM room AS R INNER JOIN roomMarket AS RM "
            . "WHERE roomReserved != 1 AND R.room_id = RM.roomID AND R.roomType IN ('marketing') LIMIT 2");
    confirm($query);
    $num2 = 1;
    $target = 'one';
    while ($row = fetch_array($query)) {
        if ($num2 % 2 == 0) {
            $room2 = <<<DELIMETER
    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">{$row['firstText']}<br>
            <span class="text-muted">{$row['secondText']}</span></h2>
            <p class="lead">{$row['roomDescription']}</p>
            <br/>
            <a href="viewRoom.php?id={$row['room_id']}" class="btn btn-outline-info" role="button">More information</a>
        </div>
        <div class="col-md-5 order-md-1">
            <div data-toggle="tooltip" data-placement="top" title="Click to View and Book Room">
            <a href="viewRoom.php?id={$row['room_id']}">
            <img class="featurette-image img-fluid mx-auto" style="height:500px; width:500px; object-fit:cover;" src="IMAGE/gallery/{$row['roomImage']}" alt="Generic placeholder image">
            </a>
            </div>
        </div>
    </div>
    <hr class="featurette-divider">
DELIMETER;
        } else {
            $room2 = <<<DELIMETER
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">{$row['firstText']}<br> 
            <span class="text-muted">{$row['secondText']}</span></h2>
            <p class="lead">{$row['roomDescription']}</p>
            <br/>
            <a href="viewRoom.php?id={$row['room_id']}" class="btn btn-outline-info" role="button">More information</a>
        </div>
        <div class="col-md-5">
            <div data-toggle="tooltip" data-placement="top" title="Click to View and Book Room">
            <a href="viewRoom.php?id={$row['room_id']}">
            <img class="featurette-image img-fluid mx-auto" style="height: 500px; width:500px; object-fit:cover;" src="IMAGE/gallery/{$row['roomImage']}" alt="Generic placeholder image">
            </a>
            </div>
        </div>
    </div>
    <hr class="featurette-divider">
DELIMETER;
        }
        echo $room2;
        $target = $target . ($num2++);
    }
}

function bookingPage() {
    global $viewsuccess, $checkPayment, $bookDateIn, $bookDateOut, $DatesError, $bookRoomName, $bookRoomPrice, $bookRoomCapacity, $paymentConfirm;
    $checkPayment = "NotReady";

    if (isset($_GET['id'])) {
        $idRoom = escape_String($_GET['id']);

        //Get Room Details
        $query = "SELECT * FROM room WHERE room_id='{$idRoom}'";
        $result = query($query);
        confirm($result);
        $count = countItem($result);
        if ($count > 0) {
            while ($row = fetch_array($result)) {
                $bookRoomName = $row['roomName'];
                $bookRoomPrice = $row['roomPrice'];
                $bookRoomCapacity = $row['roomCapacity'];
            }
        }
    }

    if (isset($_POST['bookview'])) {
        $viewname;
        $viewemail;
        $viewphone;

        if (!isset($_SESSION["iduser"])) { 
            $viewname = escape_String($_POST['name']);
            $viewemail = escape_String($_POST['email']);
            $viewphone = escape_String($_POST['phone']);
        } else {
            $viewname = $_SESSION["firstname"] . " " . $_SESSION["lastname"];
            $viewemail = $_SESSION["email"];
            $viewphone = $_SESSION["phone"];
        }
        
        $viewdate = escape_String($_POST['date']);
        $idRoom = escape_String($_GET['id']);

        $query = "INSERT INTO viewing(viewerName,viewerEmail,viewerPhone,viewDate,viewStatus,roomName,scheduledDate)"
                . "VALUES('{$viewname}','{$viewemail}','{$viewphone}','{$viewdate}','1','{$idRoom}',now())";
        $insert = query($query);
        confirm($query);

        if ($insert) {
            if (!isset($_SESSION["iduser"])) {
                $mail = new MailClass();
                $subject = "Your viewing has been scheduled";
                $body = "Dear {$viewname}<br><br>"
                        . "Your view booking for <strong>{$bookRoomName}</strong> (room number <strong>{$idRoom}</strong>) has been scheduled for <strong>{$viewdate}</strong>.";

                $getresult = $mail->sendMail($viewemail, $subject, $body);
            } else {
                send_notification("Your viewing has been scheduled", "Your view booking for <strong>{$bookRoomName}</strong> (room number <strong>{$idRoom}</strong>) has been scheduled for <strong>{$viewdate}</strong>.", "notice", $_SESSION["iduser"]);

                $mail = new MailClass();
                $subject = "Your viewing has been scheduled";
                $body = "Dear {$viewname}<br><br>"
                        . "Your view booking for <strong>{$bookRoomName}</strong> (room number <strong>{$idRoom}</strong>) has been scheduled for <strong>{$viewdate}</strong>.";

                $getresult = $mail->sendMail($viewemail, $subject, $body);
            }

            $viewsuccess = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>Success!</strong> You Have Scheduled The Viewing Successfully.
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>";
        }
    }

    if (isset($_POST['bookroom'])) {
        $bookDateIn = escape_String($_POST['checkInDate']);
        $bookDateOut = escape_String($_POST['checkOutDate']);

        if (($bookDateIn <= $bookDateOut)) {
            $checkPayment = "ready";
            $_SESSION['bookDateIn'] = $bookDateIn;
            $_SESSION['bookDateOut'] = $bookDateOut;


            if ($count > 0) {
                $_SESSION['bookRoomPrice'] = $bookRoomPrice;
            }
        } else {
            $DatesError = "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                                    <strong>Dates Error!</strong> ChechIn Date Must Be Greater Than CheckOut Date.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
        }
    }

    if (isset($_POST['confirmPay'])) {
        $cardNumber = escape_String($_POST['cardNumber']);
        $cardMonth = escape_String($_POST['cardMonth']);
        $cardYear = escape_String($_POST['cardYear']);
        $payMonth = 1;

        //Taking days between the two given dates
        $earlier = new DateTime($_SESSION['bookDateIn']);
        $later = new DateTime($_SESSION['bookDateOut']);
        $stayingPeriod = $later->diff($earlier)->format("%a");


        $sql = "INSERT INTO booking(studID,roomID,bookStatDate,bookEndDate,stayingPeriod,bookingDate) "
                . "VALUES('{$_SESSION['iduser']}','{$idRoom}','{$_SESSION['bookDateIn']}','{$_SESSION['bookDateOut']}','{$stayingPeriod}',now())";
        $insertRoom = query($sql);
        confirm($insertRoom);

        $sql = "INSERT INTO payment(cardNumber,cardMonth,cardYear,payAmount,payMonth,studID,roomID,paymentStatus,paymentDate) "
                . "VALUES('{$cardNumber}','{$cardMonth}','{$cardYear}','{$_SESSION['bookRoomPrice']}','{$payMonth}','{$_SESSION['iduser']}','{$idRoom}',paymentStatus=1,now())";
        $insertPayment = query($sql);
        confirm($insertPayment);

        $sql2 = "UPDATE room SET roomReserved='1' WHERE room_id='{$idRoom}'";
        $updateRoom = query($sql2);
        confirm($updateRoom);

        if ($insertPayment && $insertRoom && $updateRoom) {
            //Send the student a notification
            send_notification("Your booking was successful", "Your booking for room <strong>{$idRoom}</strong> starts at <strong>{$_SESSION['bookDateIn']}</strong>.", "success", $_SESSION['iduser']);

            $paymentConfirm = "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                                    <strong>Confirmation!</strong> Your Booking and Payment Was Made Successfully.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
            $_SESSION["checkPayment"] = "done";
            unset($_SESSION["bookRoomPrice"]);
            unset($_SESSION["bookDateIn"]);
            unset($_SESSION["bookDateOut"]);
            redirect("booking.php");
        }
    }

    if (isset($_POST['back'])) {
        redirect("booking.php?id=" . $idRoom);
    }
}

function lognew() {
    //If Login Button is Pressed
    if (isset($_POST['doLogin'])) {
        $user = filter_var($_POST['signin-email'], FILTER_SANITIZE_EMAIL);
        $pass = escape_String($_POST['signin-password']);
        if (!empty($user) && !empty($pass)) {
            $encrypPass = md5($pass);
            $countAdmin = 0;
            $query = "SELECT * FROM student "
                    . "WHERE studEmail='{$user}' AND studPassword='{$encrypPass}'";
            $result = query($query);
            confirm($result);
            $count = countItem($result);
            if ($count == 0) {
                $query = "SELECT * FROM admin "
                        . "WHERE adminEmail='{$user}' AND adminPassword='{$encrypPass}'";
                $resultad = query($query);
                confirm($resultad);
                $countAdmin = countItem($resultad);
            }
            if ($count > 0) {
                while ($row = fetch_array($result)) {
                    $id = $row['studID'];
                    $UserFirstName = $row['studFirstName'];
                    $UserLastName = $row['studLastName'];
                    $UserEmail = $row['studEmail'];
                    $UserPhone = $row['studPhone'];
                    $UserActive = $row['isActive'];
                    $userPass = $row['studPassword'];
                }
                if ($UserActive == 1) {
                    $query = "SELECT * FROM booking WHERE studID='{$id}' AND bookingStatus='1'";
                    $result = query($query);
                    confirm($result);
                    $count = countItem($result);
                    if ($count > 0) {
                        $_SESSION["userRoomBooked"] = $id;
                    }
                    if (($encrypPass == $userPass) && ($UserEmail == $user)) {
                        $_SESSION["iduser"] = $id;
                        $_SESSION["firstname"] = $UserFirstName;
                        $_SESSION["lastname"] = $UserLastName;
                        $_SESSION["email"] = $UserEmail;
                        $_SESSION["phone"] = $UserPhone;
                        $_SESSION["isactive"] = $UserActive;
                        $_SESSION["password"] = $userPass;
                        redirect("HomePage.php");
                    }
                } else {
                    redirect("HomePage.php?error=5");
                }
            } elseif ($countAdmin > 0) {
                while ($rowad = fetch_array($resultad)) {
                    $adminID = $rowad['adminID'];
                    $adminFirstN = $rowad['adminFirstN'];
                    $adminLastN = $rowad['adminLastN'];
                    $adminCategory = $rowad['adminCategory'];
                    $adminEmail = $rowad['adminEmail'];
                    $adminActive = $rowad['adminActive'];
                    $adminPassword = $rowad['adminPassword'];
                }
                if ($adminActive == 1) {
                    //$passEnc = md5($adminPassword);
                    if (($adminPassword == $encrypPass) && ($adminEmail == $user)) {
                        $_SESSION["admin"] = "Admin";
                        $_SESSION["idadmin"] = $adminID;
                        $_SESSION["adminFN"] = $adminFirstN;
                        $_SESSION["adminLN"] = $adminLastN;
                        $_SESSION["adminCategory"] = $adminCategory;
                        $_SESSION["adminEmail"] = $adminEmail;
                        $_SESSION["adminIsActive"] = $adminActive;
                        $_SESSION["adminPass"] = $adminPassword;
                        
                        redirect("admin/dashboard.php");
                    }
                } else {
                    redirect("HomePage.php?error=5");
                }
            } else {
                redirect("HomePage.php?error=1");
            }
        } else {
            redirect("HomePage.php?error=4");
        }
    }

    //If Reset Pass Buttoon is Pressed
    if (isset($_POST['doResetPass'])) {
        $emailForgot = escape_String($_POST['reset-email']);

        if (!empty($emailForgot)) {
            $queryForgot = "SELECT * FROM student "
                    . "WHERE studEmail='{$emailForgot}'";

            $resultForgot = query($queryForgot);
            confirm($resultForgot);
            $countForgot = countItem($resultForgot);

            if ($countForgot > 0) {
                while ($row2 = fetch_array($resultForgot)) {
                    $userForgot = $row2['studEmail'];
                    $UserFName = $row2['studFirstName'];
                    $UserLName = $row2['studLastName'];
                    $activationKey = $row2['activationKey'];
                }
                $mail = new MailClass();
                $subject = "Your Accommodation Account - Reset Your Password";
                $body = "Dear {$UserFName} {$UserLName}<br><br>"
                        . "Please click the link below to reset your password<br><br>"
                        . "<a href='http://localhost:8080/project/AccSystem/public/setNewPassword.php?key={$activationKey}' class='btn btn-outline-success formbutton'>Reset Your Password</a>";

                $getresult = $mail->sendMail($userForgot, $subject, $body);

                if ($getresult) {
                    redirect("HomePage.php?error=6");
                } else {
                    redirect("HomePage.php?error=7");
                }
            } else {
                redirect("HomePage.php?error=2");
            }
        } else {
            redirect("HomePage.php?error=4");
        }
    }
}

//Reset User Password
function resetPassword() {
    global $passError1, $passError2, $passError3, $passError4, $passError5, $show;


    if (isset($_POST['resetPasswordUser'])) {
        if (!empty($_GET['key'])) {
            $key = $_GET['key'];
        } else {
            $key = '';
        }

        if ($key != '') {
            $pass1 = escape_String($_POST['passwordFirst']);
            $pass2 = escape_String($_POST['passwordSecond']);

            if (!empty($pass1) && !empty($pass2)) {
                if (!preg_match('/^\S*(?=\S{7,15})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/', $pass1)) {
                    $passError1 = "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                                    <strong>INFO!</strong> Password must have at least 1 lowercase letter, 1 uppercase letter and 1 number and 7-15 characters.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
                }
                if ($pass1 != $pass2) {
                    $passError2 = "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                                    <strong>INFO!</strong> Password Confirmation Does Not Match.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
                }

                if ((preg_match('/^\S*(?=\S{7,15})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/', $pass1)) && ($pass1 == $pass2)) {
                    $query = query("SELECT * FROM student WHERE activationKey='{$key}'");
                    confirm($query);
                    $count = countItem($query);

                    if ($count == 1) {
                        $encripPass = md5($pass1);
                        $userActicationKey = md5(rand() . time());
                        $update = query("UPDATE student SET studPassword ='{$encripPass}', activationKey='{$userActicationKey}' WHERE activationKey='{$key}' ");
                        confirm($update);
                        if ($update) {
                            $passError5 = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                    <strong>Success!</strong> Your Password Was Reset Successfully.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
                        }
                    } else {
                        $passError4 = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>INFO!</strong> This Key Was Already Used.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
                    }
                }
            } else {
                $passError3 = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>INFO!</strong> Fields Can Not Be Empty.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
            }
        }
    }
}

//Registration 
function signup() {
    global $ExistEmailError, $InvalidEmail, $fnameError, $midnameError, $lnameError, $phoneError, $cityError, $countryError, $passError, $repassError, $confirm, $empty, $confirmemail, $errorSendEmail;
    $fname = $midname = $lname = $date = $gender = $phone = $idPassport = $country = $city = $street = $schoolName = $schoolAdd = $email = $password = $rePass = "";
    global $fname, $midname, $lname, $date, $gender, $phone, $idPassport, $country, $city, $street, $schoolName, $schoolAdd, $email, $password, $rePass;

    if (isset($_POST['submit'])) {
        $fname = ucwords(escape_String($_POST['fname']));
        $midname = ucwords(escape_String($_POST['midname']));
        $lname = ucwords(escape_String($_POST['lname']));
        $date = escape_String($_POST['dob']);
        $gender = escape_String($_POST['gender']);
        $idPassport = escape_String($_POST['idnumber']);
        $phone = escape_String($_POST['phone']);
        $country = ucwords(escape_String($_POST['add1_country']));
        $city = ucwords(escape_String($_POST['add2_city']));
        $street = escape_String($_POST['add3_street']);
        $schoolName = ucwords(escape_String($_POST['schoolname']));
        $schoolAdd = ucwords(escape_String($_POST['schooladd']));
        $email = escape_String($_POST['email']);
        $password = escape_String($_POST['password']);
        $rePass = escape_String($_POST['rePass']);

        $checkemail = query("SELECT * FROM student WHERE studEmail='{$email}'");
        confirm($checkemail);
        $count = countItem($checkemail);


        if (!empty($fname) && !empty($lname) && !empty($midname) && !empty($date) &&
                !empty($gender) && !empty($idPassport) && !empty($country) && !empty($city) &&
                !empty($street) && !empty($schoolName) && !empty($schoolAdd) && !empty($email) &&
                !empty($password) && !empty($rePass) && !empty($phone)) {

            if ($count > 0) {
                $ExistEmailError = "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                                    <strong>Hi {$fname}!</strong> Email Provided Already Exist.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
            } else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $InvalidEmail = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>DANGER!</strong> Invalid Email.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
                }
                if (!preg_match("/^[a-zA-Z]*$/", $fname)) {
                    $fnameError = "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                                    <strong>INFO!</strong> First Name Must Have Only Letters.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
                }
                if (!preg_match("/^[a-zA-Z]*$/", $midname)) {
                    $midnameError = "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                                    <strong>INFO!</strong> Middle Name Must Have Only Letters.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
                }
                if (!preg_match("/^[a-zA-Z]*$/", $lname)) {
                    $lnameError = "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                                    <strong>INFO!</strong> Last Name Must Have Only Letters.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
                }
                if (!preg_match('/^[+]?([\d]{0,3})?[\(\.\-\s]?([\d]{3})[\)\.\-\s]*([\d]{3})[\.\-\s]?([\d]{4})$/', $phone)) {
                    $phoneError = "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                                    <strong>INFO!</strong> Phone Number Must Have Only Digits and Be between 10-13.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
                }

                if (!preg_match('/^\S*(?=\S{7,15})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/', $password)) {
                    $passError = "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                                    <strong>INFO!</strong> Password must have at least 1 lowercase letter, 1  letter and 1 number and 7-15 characters.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
                }
                if ($rePass != $password) {
                    $repassError = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>DANGER!</strong> Confirmed Password Does Not Match.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
                }

                if ((filter_var($email, FILTER_VALIDATE_EMAIL)) && (preg_match("/^[a-zA-Z]*$/", $fname)) && preg_match("/^[a-zA-Z]*$/", $midname) &&
                        (preg_match("/^[a-zA-Z]*$/", $lname)) && (preg_match('/^[+]?([\d]{0,3})?[\(\.\-\s]?([\d]{3})[\)\.\-\s]*([\d]{3})[\.\-\s]?([\d]{4})$/', $phone)) &&
                        (preg_match('/^\S*(?=\S{7,15})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/', $password)) && ($rePass == $password)) {
                    //echo $fname,$midname,$lname,$date,$gender,$idPassport,$phone,$country,$city,$street,$schoolName,$schoolAdd,$email,$password,$rePass;

                    $userActicationKey = md5(rand(11223, $phone) . time());
                    $passEncrip = md5($password);

                    $mail = new MailClass();
                    $subject = "Your Accommodation Account - Verify Your Email Address";
                    $body = "Dear {$fname} {$lname}<br><br>"
                            . "Please click the link below to verify your LearningSpace account.<br><br>"
                            . "<a href='http://localhost:8080/project/AccSystem/public/userActivation.php?key={$userActicationKey}' class='btn btn-outline-success formbutton'>Verify email address</a>";

                    $getresult = $mail->sendMail($email, $subject, $body);

                    if ($getresult) {
                        $confirmemail = "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                                    <strong>Success!</strong> A Activation Link Has Been Sent to this -> <strong>{$email}</strong>.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
                        $sql = "INSERT INTO student(studFirstName,studMiddleName,studLastName,studEmail,studPassword,studGender,studDOB,studSchool,studSchoolAddress,studCountry,studCity,studStreet,id_passport,studPhone,activationKey,isActive,data)"
                                . "VALUES('{$fname}','{$midname}','{$lname}','{$email}','{$passEncrip}','{$gender}','{$date}','{$schoolName}','{$schoolAdd}','{$country}','{$city}','{$street}','{$idPassport}','{$phone}','{$userActicationKey}','0',now())";

                        $insert = query($sql);
                        confirm($insert);

                        if ($insert) {
                            $confirm = "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                                    <strong>Success!</strong> Your Account Has Been Created.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
                        }
                        $fname = $midname = $lname = $date = $gender = $phone = $idPassport = $country = $city = $street = $schoolName = $schoolAdd = $email = $password = $rePass = "";
                    } else {
                        $errorSendEmail = "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                                    <strong>Danger!</strong> Connection could not be established with host smtp.gmail.com and Your Account Could Not Be Created.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
                    }
                }
            }
        } else {
            //if at least a field is empty, display error
            $empty = "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                        <strong>Danger!</strong> Fields Can Not Be Empty.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button></div>";
        }
    }
}

//User Activation Key
function userActivation() {
    global $update_bad, $update_good, $errorCheck;

    if (!empty($_GET['key'])) {
        $key = $_GET['key'];
    } else {
        $key = "";
    }

    if ($key != '') {
        $sql = query("SELECT  * FROM student WHERE activationKey='{$key}'");
        confirm($sql);
        $count = mysqli_num_rows($sql);

        if ($count == 1) {
            while ($row = fetch_array($sql)) {
                $isActive = $row['isActive'];
                $phone = $row['studPhone'];
                $userActicationKey = md5(rand(11223, $phone) . time());

                if ($isActive == 0) {
                    $update = "UPDATE student SET isActive='1', activationKey='{$userActicationKey}' WHERE activationKey='{$key}' ";
                    $update_result = query($update);
                    confirm($update_result);

                    if ($update_result) {
                        $update_good = "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                        <strong>Success!</strong> Your Account Has Been Activated Successfuly.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button></div>";
                    }
                } else {
                    $update_bad = "<div class='alert alert-warning alert-dismissible fade show text-center' role='alert'>
                        <strong>Warning!</strong> Your Account Is Already Active.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button></div>";
                }
            }
        } else {
            $errorCheck = "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                        <strong>Danger!</strong> You Have Already Used This Link To Update Your Account.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button></div>";
        }
    }
}

//Get data For user profile Page
function profile() {
    $getDescription = $getPicture = $getRestriction = "";
    global $getfname, $getmidname, $getlname, $getdate, $getgender, $getidPassport, $getphone, $getcountry, $getcity,
    $getstreet, $getschoolName, $getschoolAdd, $getemail, $getDescription, $getPicture, $getRestriction;

    global $fnameError, $midnameError, $lnameError, $phoneError,
    $passError, $repassError, $OldpassError, $confirm, $empty, $errorGeneral;

    $query = query("SELECT * FROM student WHERE studID='{$_SESSION["iduser"]}'");
    confirm($query);

    if (countItem($query) > 0) {
        while ($row = fetch_array($query)) {
            $getfname = $row['studFirstName'];
            $getmidname = $row['studMiddleName'];
            $getlname = $row['studLastName'];
            $getdate = $row['studDOB'];
            $getgender = $row['studGender'];
            $getidPassport = $row['id_passport'];
            $getphone = $row['studPhone'];
            $getcountry = $row['studCountry'];
            $getcity = $row['studCity'];
            $getstreet = $row['studStreet'];
            $getschoolName = $row['studSchool'];
            $getschoolAdd = $row['studSchoolAddress'];
            $getemail = $row['studEmail'];
            $getpassword = $row['studPassword'];
        }

        $queryPro = query("SELECT * FROM studentprofile WHERE studID='{$_SESSION["iduser"]}'");
        confirm($queryPro);

        if (countItem($queryPro) > 0) {
            while ($row1 = fetch_array($queryPro)) {
                $getDescription = $row1['studDescription'];
                $getPicture = $row1['studPicture'];
                $getRestriction = $row1['profileRestriction'];
            }
        } else {
            $sqlIn = "INSERT INTO studentprofile(studID, date) VALUES ('{$_SESSION["iduser"]}', now())";
            $in = query($sqlIn);
            confirm($in);
        }
    }

    if (isset($_POST['editProfile'])) {
        $fname = ucwords(escape_String($_POST['fname']));
        $midname = ucwords(escape_String($_POST['midname']));
        $lname = ucwords(escape_String($_POST['lname']));
        $date = escape_String($_POST['dob']);
        $gender = escape_String($_POST['gender']);
        $idPassport = escape_String($_POST['idnumber']);
        $phone = escape_String($_POST['phone']);
        $country = ucwords(escape_String($_POST['add1_country']));
        $city = ucwords(escape_String($_POST['add2_city']));
        $street = escape_String($_POST['add3_street']);
        $schoolName = ucwords(escape_String($_POST['schoolname']));
        $schoolAdd = ucwords(escape_String($_POST['schooladd']));
        $description = ucwords(escape_String($_POST['description']));
        $oldpassword = escape_String($_POST['oldpassword']);
        $password = escape_String($_POST['password']);
        $rePass = escape_String($_POST['rePass']);

        $userImage = $_FILES['image']['name'];

        if (!empty($fname) && !empty($lname) && !empty($midname) && !empty($date) &&
                !empty($gender) && !empty($idPassport) && !empty($country) && !empty($city) &&
                !empty($street) && !empty($schoolName) && !empty($schoolAdd) && !empty($phone)) {

            if (!preg_match("/^[a-zA-Z]*$/", $fname)) {
                $fnameError = "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                                    <strong>INFO!</strong> First Name Must Have Only Letters.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
            }
            if (!preg_match("/^[a-zA-Z]*$/", $midname)) {
                $midnameError = "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                                    <strong>INFO!</strong> Middle Name Must Have Only Letters.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
            }
            if (!preg_match("/^[a-zA-Z]*$/", $lname)) {
                $lnameError = "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                                    <strong>INFO!</strong> Last Name Must Have Only Letters.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
            }
            if (!preg_match('/^[+]?([\d]{0,3})?[\(\.\-\s]?([\d]{3})[\)\.\-\s]*([\d]{3})[\.\-\s]?([\d]{4})$/', $phone)) {
                $phoneError = "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                                    <strong>INFO!</strong> Phone Number Must Have Only Digits and Be between 10-13.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
            }
            if ((preg_match("/^[a-zA-Z]*$/", $fname)) && preg_match("/^[a-zA-Z]*$/", $midname) &&
                    (preg_match("/^[a-zA-Z]*$/", $lname)) && (preg_match('/^[+]?([\d]{0,3})?[\(\.\-\s]?([\d]{3})[\)\.\-\s]*([\d]{3})[\.\-\s]?([\d]{4})$/', $phone))) {

                if (!empty($oldpassword) || !empty($password)) {
                    if (md5($oldpassword) != $getpassword) {
                        $OldpassError = "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                                    <strong>INFO!</strong> Your Old Password is Wrong!.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
                    }
                    if (!preg_match('/^\S*(?=\S{7,15})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/', $password)) {
                        $passError = "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                                    <strong>INFO!</strong> Your Password Must Have 1 Uppercase, 1 Number, and Between 7-15 Characters.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
                    }
                    if ($rePass != $password) {
                        $repassError = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>DANGER!</strong> Confirmed Password Does Not Match.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
                    }


                    if ((md5($oldpassword) == $getpassword) && (preg_match('/^\S*(?=\S{7,15})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/', $password)) && ($rePass == $password)) {
                        $passEncrip = md5($password);
                        if (empty($userImage)) {
                            $userImage = $getPicture;
                        } else {
                            $userTempImage = $_FILES['image']['tmp_name'];
                            $userImage = $_SESSION["iduser"] . $userImage;
                            move_uploaded_file($userTempImage, "IMAGE/upload/$userImage");
                        }

                        $sql = "UPDATE student SET studFirstName='{$fname}',studMiddleName='{$midname}',studLastName='{$lname}',studPassword='{$passEncrip}',studGender='{$gender}',studDOB='{$date}',"
                                . "studSchool='{$schoolName}',studSchoolAddress='{$schoolAdd}',studCountry='{$country}',studCity='{$city}',studStreet='{$street}',id_passport='{$idPassport}',studPhone='{$phone}',data=now() WHERE studID='{$_SESSION['iduser']}'";

                        $update1 = query($sql);
                        confirm($update1);

                        $sql = "UPDATE studentprofile SET studDescription='{$description}',studPicture='{$userImage}',date=now() WHERE studID='{$_SESSION['iduser']}'";
                        $update2 = query($sql);
                        confirm($update2);

                        if ($update1) {
                            $confirm = "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                                    <strong>Success!</strong> Your Profile Has Been Updated, Including Your Password.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
                            redirect("../resource/logout.php?error=8");
                        }
                    }
                } else {
                    if (empty($userImage)) {
                        $userImage = $getPicture;
                    } else {
                        $userTempImage = $_FILES['image']['tmp_name'];
                        $userImage = $_SESSION["iduser"] . $userImage;
                        move_uploaded_file($userTempImage, "IMAGE/upload/$userImage");
                    }

                    $sql = "UPDATE student SET studFirstName='{$fname}',studMiddleName='{$midname}',studLastName='{$lname}',studGender='{$gender}',studDOB='{$date}',"
                            . "studSchool='{$schoolName}',studSchoolAddress='{$schoolAdd}',studCountry='{$country}',studCity='{$city}',studStreet='{$street}',id_passport='{$idPassport}',studPhone='{$phone}',data=now() WHERE studID='{$_SESSION['iduser']}'";

                    $update1 = query($sql);
                    confirm($update1);

                    $sql = "UPDATE studentprofile SET studDescription='{$description}',studPicture='{$userImage}',date=now() WHERE studID='{$_SESSION['iduser']}'";
                    $update2 = query($sql);
                    confirm($update2);
                    if ($update2) {
                        header("Refresh:0");

                        $confirm = "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                                    <strong>Success!</strong> Your Profile Has Been Updated.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
                    }
                }
            } else {
                $errorGeneral = "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                                    <strong>Danger!</strong> Check Your Input Fields.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
            }
        } else {
            //if at least a field is empty, display error
            $empty = "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                        <strong>Danger!</strong> Fields Can Not Be Empty.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button></div>";
        }
    }
}

function getClientRoom() {
    global $roomID, $bookStatDate, $bookEndDate, $stayingPeriod,
    $roomName, $roomPrice, $roomType, $roomCapacity,
    $roomReserved, $roomImage, $roomDescription, $roomShortDescription,
    $numMonth, $numDaysLeft, $monthNumberFr, $count2;

    $numMonth = 0;

    //Get Booking Details
    $query = "SELECT * FROM booking WHERE studID='{$_SESSION["iduser"]}'";
    $result = query($query);
    confirm($result);
    $count = countItem($result);
    //$row = fetch_array($result);
    //$getStatus = $row['bookingStatus'];
    //echo $getStatus;


    if ($count > 0) {
        while ($row = fetch_array($result)) {
            $ID = $row['roomID'];
            $StatDate = $row['bookStatDate'];
            $EndDate = $row['bookEndDate'];
            $Period = $row['stayingPeriod'];
            $bookingStatus = $row['bookingStatus'];
        }

        //$getPeriod = 184;
        $numMonth = 0;
        $numDaysLeft = 0;
        $_SESSION["bookStatus"] = $bookingStatus;

        if ($bookingStatus == 1) {
            $roomID = $ID;
            $bookStatDate = $StatDate;
            $bookEndDate = $EndDate;
            $stayingPeriod = $Period;
            $getPeriod = $Period;
            //$bookingStatus = $row['bookingStatus'];

            while ($getPeriod >= 0) {
                $monthNumberFr = strtotime("+" . $numMonth . " months", strtotime($bookStatDate));
                $datte = date('n', $monthNumberFr);

                $currentYear = date('Y-m-d', $monthNumberFr);

                switch ($datte) {
                    case 4:
                    case 6:
                    case 9:
                    case 11:
                        $getPeriod -= 30; //30
                        break;
                    case 2:
                        $strdata2 = strtotime(date($currentYear));
                        $daysF = cal_days_in_month(CAL_GREGORIAN, 2, date('y', $strdata2));
                        if ($daysF == 29) {
                            $getPeriod = $getPeriod - 29; //29
                        } else {
                            $getPeriod = $getPeriod - 28; //28
                        }
                        break;
                    default :
                        $getPeriod = $getPeriod - 31; //31
                        break;
                }

                if ($getPeriod >= 0) {
                    $numMonth++;
                    $numDaysLeft = $getPeriod;
                }
            }
            $monthNumberFr = date('n', $monthNumberFr);
            $_SESSION["numMonth"] = $numMonth;
            $_SESSION["numDaysLeft"] = $numDaysLeft;
            $_SESSION["idRoom"]=$roomID;
        }
    }

    //Get Room Details
    $queryR = "SELECT * FROM room WHERE room_id='{$roomID}'";
    $resultR = query($queryR);
    confirm($resultR);
    $count2 = 0;
    $count2 = countItem($resultR);

    if ($count2 > 0) {
        while ($row2 = fetch_array($resultR)) {
            $roomName = $row2['roomName'];
            $roomPrice = $row2['roomPrice'];
            $roomType = $row2['roomType'];
            $roomCapacity = $row2['roomCapacity'];
            $roomReserved = $row2['roomReserved'];
            $roomImage = $row2['roomImage'];
            $roomDescription = $row2['roomDescription'];
            $roomShortDescription = $row2['roomShortDescription'];
        }
        $_SESSION['roomPrice'] = $roomPrice;
    }
}

function payment() {
    global $monthsNum;

    //Get Booking Details
    $query = "SELECT bookStatDate FROM booking WHERE studID='{$_SESSION["iduser"]}' AND bookingStatus='1'";
    $result2 = query($query);
    confirm($result2);
    $count2 = countItem($result2);
    if ($count2 > 0) {
        $row = fetch_array($result2);
        $bookStatDate = $row['bookStatDate'];
        $_SESSION["bookStatDate"] = $bookStatDate;
        //echo $bookStatDate;
    }

    //Get PAYMENT Details
    $query = "SELECT * FROM payment WHERE studID='{$_SESSION["iduser"]}' AND roomID='{$_SESSION["idRoom"]}' AND paymentStatus=1";
    $result = query($query);
    confirm($result);
    $count = countItem($result);
    $NUM = 1;
    $monthsNum = array();

    if ($count > 0) {
        while ($row = fetch_array($result)) {
            $monthsNum[] = $row['payMonth'];
            $_SESSION["monthsNum"] = $monthsNum; ?>

            <tr>
                <td><?php echo $row['payMonth'] ?></td>
                <td><?php echo substr($row['cardNumber'], 0, 2) . '****' . substr($row['cardNumber'], -2) ?></td>
                <td><?php echo $row['roomID'] ?></td>
                <td><?php echo 'R' . round($row['payAmount'], 2) ?></td>
                <td><?php echo $row['paymentDate'] ?></td>
                <td><a class="btn btn-success" href="#"><span class="fa fa-check-circle" style="color:white"></span></a></td><?php
                
                //Only show refund request button if the user has not already submitted a refund request for this payment
                $requestPresent = countItem(query("SELECT * FROM refund WHERE payID = " . $row['payID']));
                
                if($requestPresent == 0) { ?>
                    <td><a class="btn btn-secondary" href="#" data-toggle="modal" data-target="#refundPopup<?php echo $row['payID']; ?>"><span class="fa fa-undo-alt" style="color:white"></span></a></td><?php
                } ?>

                <div class="modal fade" id="refundPopup<?php echo $row['payID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                        <form method="post">
                            <div class="modal-content">  
                                <div class="modal-header">
                                    <h5>Payment refund request</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                </div> 
                                <div class="modal-body">
                                    <textarea type="text" class="form-control" name="reason<?php echo $row['payID']; ?>" placeholder="Reason" rows="4" required></textarea><br />
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary formbutton" style="float:right" name="refund<?php echo $row['payID']; ?>" onclick="confirm('Are you sure?')">Request refund</button><?php

                                    //Request refund button handling
                                    if(isset($_POST['refund' . $row['payID']])){
                                        query("INSERT INTO refund (payID, studID, reason, date) VALUES('{$row['payID']}', '{$_SESSION["iduser"]}', '{$_GET['reason' . $row['payID']]}', now())");
                                        ?><script>alert("Your request has been sent.");</script><?php
                                        
                                        header("Refresh:0");
                                        exit();
                                    } ?> 

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </tr> <?php

            $NUM++;
        }
        $_SESSION["count"] = $count;
    }
}

function paymentMonths() {
    $arrayMonths = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $countMonth = 0;

    if (isset($_SESSION["numMonth"])) {
        $countMonth = $_SESSION["numMonth"];
    }

    $count = 0;
    
    $startDate = mysqli_fetch_assoc(query("SELECT bookStatDate FROM booking WHERE studID='{$_SESSION["iduser"]}' AND bookingStatus = 1"));
    $startDate = $startDate['bookStatDate'];

    while ($count < $countMonth) {
        $monthNumberFr = strtotime("+" . $count . " months", strtotime($startDate));
        $ok = date('n', $monthNumberFr);

        switch ($ok) {
            case 1:
            case 2:
            case 3:
            case 4:
            case 5:
            case 6:
            case 7:
            case 8:
            case 9:
            case 10:
            case 11:
            case 12:
                if(isset($_SESSION["monthsNum"])) { //required incase the user has made no payments (in cases where they refund their first payment before making a second one)
                    if ($count < sizeof($_SESSION["monthsNum"])) {
                        echo "<div style='padding-right: 5px; padding-bottom: 3px;' data-toggle='tooltip' data-placement='top' title='It was already paid'><strong class='btn btn-success' >{$arrayMonths[$ok - 1]} </strong></div>";
                    } else {
                        echo "<div style='padding-right: 5px; padding-bottom: 2px;' data-toggle='tooltip' data-placement='top' title='This was not paid yet'><strong class='btn btn-secondary'>{$arrayMonths[$ok - 1]} </strong></div>";
                    }
                } else {
                    echo "<div style='padding-right: 5px; padding-bottom: 2px;' data-toggle='tooltip' data-placement='top' title='This was not paid yet'><strong class='btn btn-danger'>{$arrayMonths[$ok - 1]} </strong></div>";
                }

                break;
        }

        $count++;
    }
}

function leaveOption() {
    if (isset($_SESSION["bookStatus"])) {
        global $leaveRoom, $confirm;
        
        $count=0;
        
        if (isset($_SESSION["idRoom"])) {
            //Get Booking Details
            $query = "SELECT * FROM booking WHERE studID='{$_SESSION["iduser"]}' AND roomID='{$_SESSION["idRoom"]}' AND bookingStatus='1'";
            $result = query($query);
            confirm($result);
            $count = countItem($result);
        }

        if ($count > 0) {
            $row = fetch_array($result);
            $bookStatDate = $row['bookStatDate'];
            $roomID = $row['roomID'];
            $studID = $row['studID'];

            $today = date('Y/m/d');  //('Y/m/d')  "2019/4/2"
            
            $count2=0;
            if (isset($_SESSION["idRoom"])) {
                //Get PAYMENT Details
                $query2 = "SELECT * FROM payment WHERE studID='{$_SESSION["iduser"]}' AND roomID='{$_SESSION["idRoom"]}' AND paymentStatus=1";
                $result2 = query($query2);
                confirm($result2);
                $count2 = countItem($result2);
            }
            $date1 = strtotime($bookStatDate);
            $date2 = strtotime($today);
            $months = 0;

            while (($date1 = strtotime('+1 MONTH', $date1)) <= $date2) {
                $months++;
            }

            if ($months < $count2) {

                $leaveRoom = "yes";
                if (isset($_POST['confirmLeaving'])) {
                    $leavePassword = escape_String($_POST['leavePassword']);
                    $encrypPass = md5($leavePassword);

                    $query = "SELECT * FROM student WHERE studEmail='{$_SESSION["email"]}' AND studPassword='{$encrypPass}'";
                    $result = query($query);
                    confirm($result);
                    $count = countItem($result);

                    if (!empty($leavePassword)) {
                        if ($count > 0) {
                            $sql = "UPDATE booking SET bookingStatus=0,	bookingDate=now() WHERE studID='{$studID}'";
                            $update1 = query($sql);
                            confirm($update1);

                            $sql2 = "UPDATE room SET roomReserved='0' WHERE room_id='{$roomID}'";
                            $update2 = query($sql2);
                            confirm($update2);
                            
                            $sql3 = "UPDATE payment SET paymentStatus=0 WHERE roomID='{$roomID}' AND studID='{$studID}' AND paymentStatus=1";
                            $update3 = query($sql3);
                            confirm($update3);

                            if ($update1 && $update2 && $update3) {
                                unset($_SESSION["checkPayment"]);
                                unset($_SESSION["userRoomBooked"]);
                                redirect("?confirm=yes");
                                
                                //Send the student a notification
                                send_notification("You have left room " . $roomID, "You have forcibly ended your booking for room <strong>{$roomID}</strong>.", "notice", $_SESSION["iduser"]);
                            }
                        } else {
                            $confirm = "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                                        <strong>Canceled!</strong> You Have Provided a Wrong Password.
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                          <span aria-hidden='true'>&times;</span>
                                        </button></div>";
                        }
                    } else {
                        $confirm = "<div class='alert alert-info alert-dismissible fade show text-center' role='alert'>
                                    <strong>Info!</strong> Password Field Cannot Be Empty.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
                    }
                }
            } else {
                $leaveRoom = "no";
                if (isset($_POST['redirectPayment'])) {
                    redirect("paymentPage.php");
                }
            }
        }
    }
}

function makePayment() {
    if (isset($_SESSION["count"]) && isset($_SESSION["totalCost"]) && isset($_SESSION["iduser"]) && isset($_SESSION["idRoom"])) {
        if (isset($_POST['confirmPay'])) {

            $cardNum = escape_String($_POST['cardNumber']);
            $cardM = escape_String($_POST['cardMonth']);
            $cardY = escape_String($_POST['cardYear']);
            $payM = $_SESSION["count"] + 1;

            $sqlup = "INSERT INTO payment(cardNumber,cardMonth,cardYear,payAmount,payMonth,studID,roomID,paymentDate) "
                    . "VALUES('{$cardNum}','{$cardM}','{$cardY}','{$_SESSION["totalCost"]}','{$payM}','{$_SESSION['iduser']}','{$_SESSION['idRoom']}',now())";
            $insertPayment = query($sqlup);
            confirm($insertPayment);

            if ($insertPayment) {
                //Send the student a notification
                send_notification("Your payment was successful", "Your payment for room <strong>{$_SESSION["idRoom"]}</strong> was successful.", "success", $_SESSION['iduser']);

                redirect("?paid");
            }
        }
    }
}

//**************************** Admin Functions ****************************

//Show all Bookings
function get_Bookings() {
    $query = query("SELECT * FROM booking ORDER BY bookID DESC");
    confirm($query);

    while ($row = fetch_array($query)) { 
        //Getting room name
        $sqlRoomName = query("SELECT roomName FROM room WHERE room_id = " . $row['roomID']);
        $roomName = mysqli_fetch_assoc($sqlRoomName); 
        
        //Getting student name
        $sqlStudentName = query("SELECT studFirstName, studLastName FROM student WHERE studID = " . $row['studID']);
        $studentName = mysqli_fetch_assoc($sqlStudentName); ?>

        <tr>
            <td><?php echo $row['bookID']; ?></td>
            <td><?php echo $row['roomID']; ?></td>
            <td><?php echo $roomName['roomName']; ?></td>
            <td><?php echo $row['studID']; ?></td>
            <td><?php echo $studentName['studFirstName'] . " "  . $studentName['studLastName']; ?></td>
            <td><?php echo $row['bookStatDate']; ?></td>
            <td><?php echo $row['bookEndDate']; ?></td>
            <td><?php echo $row['stayingPeriod']; ?></td>
            <td><?php echo $row['bookingDate']; ?></td>
            <td><?php echo ($row['bookingStatus'] == 1 ? '<a class="text-success">active</a>' : '<a class="text-secondary">ended</a>'); ?></td>
            <td><form method="post"><button class="btn-xs btn-dark formbutton" name="switchBookingStatus<?php echo $row['bookID'] ?>" onclick="return confirm('Are you sure you want to switch the status of booking ID <?php echo $row['bookID'] ?>?')"><span class="fas fa-exchange-alt" style="color:white"></button></form></td>

            <td><button type="button" class="btn btn-info formbutton" data-toggle="modal" data-target="#bookingPopup<?php echo $row['bookID']; ?>"><span class="fa fa-edit" style="color:white"></button></form></td><?php
            
            //Show delete button if the logged in admin is an owner
            if($_SESSION['adminCategory'] == 1) { ?>
                <td><form method="post"><button class="btn btn-danger formbutton" name="removeBooking<?php echo $row['bookID'] ?>" onclick="return confirm('Are you sure you want to delete booking ID <?php echo $row['bookID'] ?>?')"><span class="fa fa-times" style="color:white"></button></form></td><?php
            } ?>
        </tr><?php

        //Switch booking status button handling
        if(isset($_POST['switchBookingStatus' . $row['bookID']])) {
            $newValue = ($row['bookingStatus'] == 1 ? 0 : 1);
            
            //Only change booking status if the student isn't booked in another room already
            $queryActiveBookings = query("SELECT * FROM booking WHERE studID = {$row['studID']} AND bookingStatus = 1");
            confirm($queryActiveBookings);
            $numActiveBookings = countItem($queryActiveBookings);

            if ($newValue == 1 && $numActiveBookings > 0) {
                ?><script>alert("This student already has an active booking.\nA student can only be booked in one room at a time.");</script><?php
            } else {
                query("UPDATE booking SET bookingStatus = {$newValue} WHERE bookID = " . $row['bookID']);
                ?><script>alert("Booking status changed");</script><?php       
            }

            header("Refresh:0");
            exit();
        } 
        
        //Remove booking button handling
        if(isset($_POST['removeBooking' . $row['bookID']])) {
            query("DELETE FROM booking WHERE bookID = " . $row['bookID']);
            ?><script>alert("Booking deleted.");</script><?php

            header("Refresh:0");
            exit();

            //Send student a different notification based on if the booking had started or not
            if((new DateTime('today') < new DateTime($row['bookStatDate'])) && ($row['bookingStatus'] == 1)) {
                send_notification("An administrator has ended your booking", "Your booking for room number <strong>{$row['roomID']}</strong> has been removed and candelled by an admin. Because your booking was still pending, you will be refunded.", "notice", $row['studID']);
            } else if ($row['bookingStatus'] == 1) {
                send_notification("An administrator has ended your booking", "Your booking for room number <strong>{$row['roomID']}</strong> has been removed and candelled by an admin.", "notice", $row['studID']);
            }
        } ?>

        <!-- Edit booking modal -->
        <div class="modal fade" id="bookingPopup<?php echo $row['bookID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <form method="post">
                    <div class="modal-content">  
                        <div class="modal-header">
                            <h5>Edit booking ID: <?php echo $row['bookID']?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                        </div> 
                        <div class="modal-body">
                            <!-- Edit booking form -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                Room ID
                                                <input type="text" class="form-control" value="<?php echo $row['roomID'] ?>" id="room<?php echo $row['bookID']; ?>" name="room<?php echo $row['bookID']; ?>" required>
                                            </div>
                                            <div class="col-sm-6">
                                                Student ID
                                                <input type="text" class="form-control" value="<?php echo $row['studID'] ?>" id="student<?php echo $row['bookID']; ?>" name="student<?php echo $row['bookID']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                Start date
                                                <input type="date" class="form-control" value="<?php echo $row['bookStatDate'] ?>" id="startDate<?php echo $row['bookID']; ?>" name="startDate<?php echo $row['bookID']; ?>" required>
                                            </div>
                                            <div class="col-sm-6">
                                                End date
                                                <input type="date" class="form-control" value="<?php echo $row['bookEndDate'] ?>" id="endDate<?php echo $row['bookID']; ?>" name="endDate<?php echo $row['bookID']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                Date scheduled
                                                <input type="date" class="form-control" value="<?php echo $row['bookingDate'] ?>" id="bookDate<?php echo $row['bookID']; ?>" name="bookDate<?php echo $row['bookID']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-info formbutton" style="float:right" name="editBooking<?php echo $row['bookID']; ?>">Edit booking</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><?php

                            //Edit booking button handling
                            if(isset($_POST['editBooking' . $row['bookID']])) {
                                //Determining days between start and end date
                                $startDate = new DateTime($_POST['startDate' . $row['bookID']]);
                                $endDate = new DateTime($_POST['endDate' . $row['bookID']]);
                                $period = $endDate->diff($startDate)->format("%a");

                                query("UPDATE booking SET 
                                    studID = '{$_POST['student' . $row['bookID']]}',
                                    roomID = '{$_POST['room' . $row['bookID']]}', 
                                    bookStatDate = '{$_POST['startDate' . $row['bookID']]}', 
                                    bookEndDate = '{$_POST['endDate' . $row['bookID']]}', 
                                    stayingPeriod = '{$period}', 
                                    bookingDate = '{$_POST['bookDate' . $row['bookID']]}'
                                    WHERE bookID = " . $row['bookID']);
                                
                                ?><script>alert("Booking edited.");</script><?php

                                header("Refresh:0");
                                exit();
                            } ?>
                        </div>
                    </div>
                </form>
            </div>
        </div><?php
    }
}

//Show all Viewings
function get_Viewings() {
    $query = query("SELECT * FROM viewing ORDER BY viewBookingID DESC");
    confirm($query);

    while ($row = fetch_array($query)) { 
        //Getting room name
        $sqlRoomName = query("SELECT roomName FROM room WHERE room_id = " . $row['roomName']);
        $roomName = mysqli_fetch_assoc($sqlRoomName); ?>

        <tr>
            <td><?php echo $row['viewBookingID'] ?></td>
            <td><?php echo $row['roomName'] ?></td>
            <td><?php echo $roomName['roomName'] ?></td>
            <td><?php echo $row['viewerName'] ?></td>
            <td><?php echo $row['viewerEmail'] ?></td>
            <td><?php echo $row['viewerPhone'] ?></td>
            <td><?php echo $row['viewDate'] ?></td>
            <td><?php echo $row['scheduledDate'] ?></td>
            <td><?php echo $row['viewStatus'] ?></td>

            <td><button type="button" class="btn btn-info formbutton" data-toggle="modal" data-target="#viewingPopup<?php echo $row['viewBookingID']; ?>"><span class="fa fa-edit" style="color:white"></button></form></td><?php
            
            //Show delete button if the logged in admin is an owner
            if($_SESSION['adminCategory'] == 1) { ?>
                <td><form method="post"><button class="btn btn-danger formbutton" name="removeViewing<?php echo $row['viewBookingID'] ?>" onclick="return confirm('Are you sure you want to remove viewing ID: <?php echo $row['viewBookingID'] ?>?')"><span class="fa fa-times" style="color:white"></button></form></td><?php
            } ?>
        </tr><?php

        //Remove viewing button handling
        if(isset($_POST['removeViewing' . $row['viewBookingID']])) {
            query("DELETE FROM viewing WHERE viewBookingID = " . $row['viewBookingID']);
            ?><script>alert("Viewing deleted.");</script><?php

            header("Refresh:0");
            exit();
        } ?>

        <!-- Edit viewing modal -->
        <div class="modal fade" id="viewingPopup<?php echo $row['viewBookingID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <form method="post">  
                    <div class="modal-content">  
                        <div class="modal-header">
                            <h5>Edit viewing ID: <?php echo $row['viewBookingID']?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                        </div> 
                        <div class="modal-body">
                            <!-- Edit viewing form -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                Room ID
                                                <input type="text" class="form-control" value="<?php echo $row['roomName'] ?>" id="room<?php echo $row['viewBookingID']; ?>" name="room<?php echo $row['viewBookingID']; ?>" required>
                                            </div>
                                            <div class="col-sm-6">
                                                Viewer name
                                                <input type="text" class="form-control" value="<?php echo $row['viewerName'] ?>" id="name<?php echo $row['viewBookingID']; ?>" name="name<?php echo $row['viewBookingID']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                Viewer email
                                                <input type="text" class="form-control" value="<?php echo $row['viewerEmail'] ?>" id="email<?php echo $row['viewBookingID']; ?>" name="email<?php echo $row['viewBookingID']; ?>" required>
                                            </div>
                                            <div class="col-sm-6">
                                                Viewer phone
                                                <input type="text" class="form-control" value="<?php echo $row['viewerPhone'] ?>" id="phone<?php echo $row['viewBookingID']; ?>" name="phone<?php echo $row['viewBookingID']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                View date
                                                <input type="datetime" class="form-control" value="<?php echo $row['viewDate'] ?>" id="viewDate<?php echo $row['viewBookingID']; ?>" name="viewDate<?php echo $row['viewBookingID']; ?>" required>
                                            </div>
                                            <div class="col-sm-6">
                                                Date scheduled
                                                <input type="datetime" class="form-control" value="<?php echo $row['scheduledDate'] ?>" id="scheduledDate<?php echo $row['viewBookingID']; ?>" name="scheduledDate<?php echo $row['viewBookingID']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                Viewer status
                                                <input type="text" class="form-control" value="<?php echo $row['viewStatus'] ?>" id="status<?php echo $row['viewBookingID']; ?>" name="status<?php echo $row['viewBookingID']; ?>" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-info formbutton" style="float:right" name="editViewing<?php echo $row['viewBookingID']; ?>">Edit viewing</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><?php

                            //Edit view button handling
                            if(isset($_POST['editViewing' . $row['viewBookingID']])) {
                                query("UPDATE viewing SET 
                                    viewerName = '{$_POST['name' . $row['viewBookingID']]}',
                                    viewerEmail = '{$_POST['email' . $row['viewBookingID']]}', 
                                    viewerPhone = '{$_POST['phone' . $row['viewBookingID']]}', 
                                    viewDate = '{$_POST['viewDate' . $row['viewBookingID']]}', 
                                    viewStatus = '{$_POST['status' . $row['viewBookingID']]}', 
                                    roomName = '{$_POST['room' . $row['viewBookingID']]}', 
                                    scheduledDate = '{$_POST['scheduledDate' . $row['viewBookingID']]}'
                                    WHERE viewBookingID = " . $row['viewBookingID']);
                                
                                ?><script>alert("Viewing edited.");</script><?php

                                header("Refresh:0");
                                exit();
                            } ?>
                        </div>
                    </div>
                </form>
            </div>
        </div><?php
    }
}

//Show all Rooms
function get_Rooms() {
    $query = query("SELECT * FROM room ORDER BY room_id DESC");
    confirm($query);

    while ($row = fetch_array($query)) { ?>
        <tr>
            <td><?php echo $row['room_id'] ?></td>
            <td><img width="125" src="../IMAGE/gallery/<?php echo $row['roomImage'] ?>"></td>
            <td><?php echo $row['roomName'] ?></td>
            <td><?php echo $row['roomType'] ?></td>
            <td><?php echo 'R' . $row['roomPrice'] ?></td>
            <td><?php echo $row['roomCapacity'] ?></td>
            <td><?php echo ($row['roomReserved'] == 1 ? '<a class="text-info">reserved</a>' : '<a class="text-success">available</a>')?></td>
            <td><?php echo $row['roomShortDescription'] ?></td>

            <td><a class="btn btn-outline-dark" data-toggle="modal" data-target="#descriptionPopup<?php echo $row['room_id']; ?>"><span class="far fa-file-alt" style="color:black"></span></a></td>
            <td><button type="button" class="btn btn-info formbutton" data-toggle="modal" data-target="#roomPopup<?php echo $row['room_id']; ?>"><span class="fa fa-edit" style="color:white"></button></form></td><?php
            
            //Show delete button if the logged in admin is an owner
            if($_SESSION['adminCategory'] == 1) { ?>
                <td><form method="post"><button class="btn btn-danger formbutton" name="removeRoom<?php echo $row['room_id'] ?>" onclick="return confirm('Are you sure you want to remove room ID: <?php echo $row['room_id'] ?>?')"><span class="fa fa-times" style="color:white"></button></form></td><?php
            } ?>
        </tr><?php

        //Remove room button handling
        if(isset($_POST['removeRoom' . $row['room_id']])) {
            query("DELETE FROM room WHERE room_id = " . $row['room_id']);
            ?><script>alert("Room deleted.");</script><?php

            header("Refresh:0");
            exit();
        } ?>
        
        <!-- Room long description modal -->
        <div class="modal fade" id="descriptionPopup<?php echo $row['room_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <form method="post">
                    <div class="modal-content">  
                        <div class="modal-header">
                            <h5><?php echo $row['roomName']?> description</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                        </div> 
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">  
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea class="form-control" name="description<?php echo $row['room_id']; ?>" rows="7" required><?php echo $row['roomDescription']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-info formbutton" style="float:right" name="editDescription<?php echo $row['room_id']; ?>">Save</button><?php

                            //Save description button handling
                            if(isset($_POST['editDescription' . $row['room_id']])) {
                                query("UPDATE room SET 
                                    roomDescription = '{$_POST['description' . $row['room_id']]}'
                                    WHERE room_id = " . $row['room_id']);
                                
                                ?><script>alert("Description edited.");</script><?php

                                header("Refresh:0");
                                exit();
                            } ?>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit room modal -->
        <div class="modal fade" id="roomPopup<?php echo $row['room_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <form method="post" enctype="multipart/form-data">            
                    <div class="modal-content">  
                        <div class="modal-header">
                            <h5>Edit <?php echo $row['roomName']?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                        </div> 
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                Room image
                                                <img src="../IMAGE/gallery/<?php echo $row['roomImage'] ?>"  width="100%" height="100%">      
                                            </div>
                                            <div class="col-sm-6">
                                                Edit image
                                                <br/>
                                                <input type="file" name="roomImage<?php echo $row['room_id']; ?>" accept="image/*">
                                            </div>
                                        </div><br/>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                Name
                                                <input type="text" class="form-control" value="<?php echo $row['roomName'] ?>" id="roomName<?php echo $row['room_id']; ?>" name="roomName<?php echo $row['room_id']; ?>" required>
                                            </div>
                                            <div class="col-sm-6">
                                                Reserved
                                                <input type="text" class="form-control" value="<?php echo $row['roomReserved'] ?>" id="reserved<?php echo $row['room_id']; ?>" name="reserved<?php echo $row['room_id']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                Type
                                                <input type="text" class="form-control" value="<?php echo $row['roomType'] ?>" id="roomType<?php echo $row['room_id']; ?>" name="roomType<?php echo $row['room_id']; ?>" required>
                                            </div>
                                            <div class="col-sm-6">
                                                Capacity
                                                <input type="text" class="form-control" value="<?php echo $row['roomCapacity'] ?>" id="capacity<?php echo $row['room_id']; ?>" name="capacity<?php echo $row['room_id']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                Price
                                                <input type="text" class="form-control" value="<?php echo $row['roomPrice'] ?>" id="roomPrice<?php echo $row['room_id']; ?>" name="roomPrice<?php echo $row['room_id']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                Short description
                                                <input type="text" class="form-control" value="<?php echo $row['roomShortDescription'] ?>" id="shortDescription<?php echo $row['room_id']; ?>" name="shortDescription<?php echo $row['room_id']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-info formbutton" style="float:right" name="editRoom<?php echo $row['room_id']; ?>">Save</button><?php

                            //Edit room button handling
                            if(isset($_POST['editRoom' . $row['room_id']])) {
                                $editRoomImageName = $row['roomImage'];

                                if (!(empty($_FILES['roomImage' . $row['room_id']]['name']))) {
                                    //Set image name and upload file
                                    $editRoomImageName = $_FILES['roomImage' . $row['room_id']]['name'];
                                    $editRoomTempName = $_FILES['roomImage' . $row['room_id']]['tmp_name'];
                                    move_uploaded_file($editRoomTempName, "../IMAGE/gallery/$editRoomImageName");
                                }

                                query("UPDATE room SET 
                                    roomImage = '{$editRoomImageName}',
                                    roomName = '{$_POST['roomName' . $row['room_id']]}',
                                    roomPrice = '{$_POST['roomPrice' . $row['room_id']]}',
                                    roomType = '{$_POST['roomType' . $row['room_id']]}',
                                    roomCapacity = '{$_POST['capacity' . $row['room_id']]}',
                                    roomReserved = '{$_POST['reserved' . $row['room_id']]}',
                                    roomShortDescription = '{$_POST['shortDescription' . $row['room_id']]}'
                                    WHERE room_id = " . $row['room_id']);
                                
                                ?><script>alert("Room edited.");</script><?php

                                header("Refresh:0");
                                exit();
                            } ?>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><?php
    }
}

//Toggles between closed and open ticket status
function close_open_ticket($ticketID, $isActive) {
    if (isset($_POST['closereopen' . $ticketID])) {
        $closereopen = ($isActive == 1) ? 0 : 1;
        
        query("UPDATE helpticket SET isActive = " . $closereopen . " WHERE ticketID = " . $ticketID);

        header("Refresh:0");
        exit(); //Prevents ticket closing from immediately reopening the ticket
    } 
}

//Creates a notification
//This can be tied to many buttons around the user interface.
//$inputids must be a single studID or comma separated list of student IDs that the notification is sent to.
//if $inputids is a star (*), it the notification is sent to all students.
function send_notification($title, $body, $type, $inputids) {
    if($inputids != '*') {
        //Sending a notification to the specific student(s)
        $recipients = preg_replace('/\s+/', '', $inputids); //removing whitespace just incase
        $recipients = explode(',', $recipients); //converting each recipient into an array
        
        //Sending notification to each student
        foreach($recipients as $studID) {
            $sqlcreate = query("INSERT INTO notification (studID, title, body, type, time, status) VALUES({$studID}, '{$title}', '{$body}', '{$type}', now(), 0)");
            confirm($sqlcreate);
        }
    } else if ($inputids == '*') {
        //Sending a notification to all students
        $numstudents = countItem(query("SELECT * FROM student"));
        $studids = query("SELECT studID FROM student ORDER BY studID");

        while ($row = mysqli_fetch_assoc($studids)) {
            //Sending notification to each student
            foreach($row as $studID) {
                $sqlcreate = query("INSERT INTO notification (studID, title, body, type, time, status) VALUES({$studID}, '{$title}', '{$body}', '{$type}', now(), 0)");
                confirm($sqlcreate);
            }
        }

        header("Refresh:0");
        exit();
    } 
}

//Marks all unread notifications for a given student ID as read
function mark_read($studID) {
    query("UPDATE notification SET status = 1 WHERE studID = " . $studID);

    header("Refresh:0");
    exit();
}

//Determines which icon to use based on notification type
function notification_icon($type) {
    if ($type == 'default') {
        echo 'fas fa-comment-dots';
    } else if ($type == 'info') {
        echo 'fas fa-info-circle';
    } else if ($type == 'success') {
        echo 'fas fa-check-circle';
    } else if ($type == 'warning') {
        echo 'fas fa-exclamation-triangle';
    } else if ($type == 'danger') {
        echo 'fas fa-times-circle';
    } else if ($type == 'notice') {
        echo 'fas fa-flag';
    }
}

//Sends an email to the admin and back to the sender (for contact page)
function send_contact_message($firstname, $lastname, $email, $phone, $message) {
    //Select a random active admin as the recipient
    $query = query("SELECT adminEmail FROM admin WHERE adminActive = 1 ORDER BY RAND() LIMIT 1");
    confirm($query);
    $row = fetch_array($query);

    $adminEmail;

    if ($query){
        $adminEmail = $row['adminEmail'];
    }  else {
        $adminEmail = "projectcrudacc@gmail.com";
    }

    $mail = new MailClass();

    //Message sent to admin
    $subject = "New message from contact page";
    $body = "<strong>Contact information:</strong><br/>
            First name: {$firstname}<br/>
            Last name: {$lastname}<br/>
            Email: {$email}<br/>
            Phone: {$phone}<br/><br/>
            <strong>Message:</strong><br/>{$message}";

    $mail->sendMail($adminEmail, $subject, $body);

    //Message sent back to sender
    $mail->sendMail($email, 'Your message has been sent', 
                    'An administrator will get back to you soon!<br/><br/><strong>Your message:</strong><br/>' . $message . '<br/><br/><text class="text-muted">Do not reply to this email.</text>');
}

