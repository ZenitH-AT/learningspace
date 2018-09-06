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

function toRemove($tableName,$colomnName, $idItem){
    $tN=  escape_String($tableName); $clN = escape_String($colomnName); $id = escape_String($idItem);
    $query = "DELETE FROM {$tN} WHERE {$clN}='{$id}' ";
    $remove = query($query);
    confirm($remove);
    if ($remove) {
        return 1;
    }  else {
        return 0;
    }
}


//Show all Students
function get_Students() {
    $query = query("SELECT * FROM student ORDER BY studID DESC ");
    confirm($query);

    while ($row = fetch_array($query)) {
        $student = <<<DELIMETER
        <tr>
            <td>{$row['studID']}</td>
            <td>{$row['studFirstName']}</td>
            <td>{$row['studMiddleName']}</td>
            <td>{$row['studLastName']}</td>
            <td>{$row['studEmail']}</td>
            <td>{$row['studPassword']}</td>
            <td>{$row['studGender']}</td>
            <td>{$row['studDOB']}</td>
            <td>{$row['studSchool']}</td>
            <td>{$row['studSchoolAddress']}</td>
            <td>{$row['studCountry']}</td>
            <td>{$row['studCity']}</td>
            <td>{$row['studStreet']}</td>
            <td>{$row['id_passport']}</td>
            <td>{$row['studPhone']}</td>
            <td>{$row['activationKey']}</td>
            <td>{$row['isActive']}</td>
            <td>{$row['data']}</td>
            
            <td><a class="btn btn-success" href="../../resource/templates/back/add.php?student={$row['studID']}"><span class="fa fa-user-plus" style="color:white"></span></a></td>
            <td><a class="btn btn-info" href="../../resource/templates/back/edit.php?student={$row['studID']}"><span class="fa fa-user-edit" style="color:white"></span></a></td>
            <td><a class="btn btn-danger" href="../../resource/templates/back/remove.php?student={$row['studID']}"><span class="fa fa-user-minus" style="color:white"></span></a></td>
            
        </tr>
DELIMETER;
        echo $student;
    }
}

//Get Rooms
function get_Rooms_BelowBelow() {
//    WHERE roomType IN ('palacio','gold')
    $query = query("SELECT * FROM room ");
    confirm($query);

    $num = 1;
    $target = 'one';
    while ($row = fetch_array($query)) {
        $room1 = <<<DELIMETER
    <div class="col-sm-4 col-lg-4 col-md-4" >
        <div class="card-img-top card" style="padding-bottom: 2px;">
            <img class="card-img-top" style="height: 10rem;" src="IMAGE/gallery/{$row['roomImage']}" alt="">
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
            </div>
        </div>
            </div>
            <div class="">
                <!-- <a class="btn btn-outline-primary"  href="booking.php?id={$row['room_id']}">Book</a> -->
                <a class="btn btn-outline-primary"  href="viewRoom.php?id={$row['room_id']}">View Room</a>
            </div>
        </div>
    </div>
DELIMETER;
        echo $room1;
        $target = $target . ($num++);
    }
}

function get_Rooms_Gallery() {
    $query = query("SELECT * FROM room");
    confirm($query);

    while ($row = fetch_array($query)) {
        $room1 = <<<DELIMETER
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <a class="lightbox" href="IMAGE/gallery/{$row['roomImage']}">
                    <img src="IMAGE/gallery/{$row['roomImage']}" style="max-width: 100%; height: 205px;">
                </a>
                <div class="caption">
                    <h3>{$row['roomName']}</h3>
                    <p>{$row['roomShortDescription']}
                    <a class="text-success"  href="viewRoom.php?id={$row['room_id']}">More&raquo;</a></p>
                </div>
            </div>
        </div>
DELIMETER;
        echo $room1;
    }
}

function get_Rooms_BelowCarousel() {
    $query = query("SELECT * FROM room");
    confirm($query);

    $num = 1;
    $target = 'one';
    while ($row = fetch_array($query)) {
        $room1 = <<<DELIMETER
    <div class="col-lg-4">
        <a class=""  href="viewRoom.php?id={$row['room_id']}">
        <img class=" rounded-circle" width="200" height="200" src="IMAGE/gallery/{$row['roomImage']}" alt="">
        </a>
        <h2>{$row['roomName']}</h2>
        <p>{$row['roomShortDescription']} <a class="" data-toggle="collapse" data-target="#$target" aria-expanded="true" aria-controls="collapseOne" href="#">More&raquo;</a></p></p>
        <div class="panel-group" id="accordion">
            <div id="$target" class="panel-collapse collapse in" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body" style="">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
                    mon cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                </div>
                <a class="btn btn-outline-primary"  href="viewRoom.php?id={$row['room_id']}">View Room</a>
            </div>
        </div>
    </div>
DELIMETER;
        echo $room1;
        $target = $target . ($num++);
    }
}

function get_Rooms_Marketing() {
    $query = query("SELECT R.room_id,R.roomDescription, R.roomImage,R.roomPrice,R.roomName, RM.firstText,RM.secondText "
            . "FROM room AS R INNER JOIN roomMarket AS RM "
            . "WHERE R.room_id = RM.roomID AND R.roomType IN ('Marketing ','New') ");
    confirm($query);

    $num = 1;
    $target = 'one';
    while ($row = fetch_array($query)) {
        if ($num % 2 == 0) {
            $room1 = <<<DELIMETER
    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">{$row['firstText']}<br>
            <span class="text-muted">{$row['secondText']}</span></h2>
            <p class="lead">{$row['roomDescription']}</p>
        </div>
        <div class="col-md-5 order-md-1">
            <a class="btn btn-outline-success"  href="viewRoom.php?id={$row['room_id']}">
            <img class="featurette-image img-fluid mx-auto" style="height: 500px; width:500px;" src="IMAGE/gallery/{$row['roomImage']}" alt="Generic placeholder image">
            </a>
        </div>
    </div>
    <hr class="featurette-divider">
DELIMETER;
        } else {
            $room1 = <<<DELIMETER
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">{$row['firstText']}<br> 
            <span class="text-muted">{$row['secondText']}</span></h2>
            <p class="lead">{$row['roomDescription']}</p>
        </div>
        <div class="col-md-5">
            <a class="btn btn-outline-success"  href="viewRoom.php?id={$row['room_id']}">
            <img class="featurette-image img-fluid mx-auto" style="height: 500px; width:500px;" src="IMAGE/gallery/{$row['roomImage']}" alt="Generic placeholder image">
            </a>
        </div>
    </div>
    <hr class="featurette-divider">
DELIMETER;
        }
        echo $room1;
        $target = $target . ($num++);
    }
}

//        echo '<script language="javascript">';
//        echo 'alert("message successfully sent")';
//        echo '</script>';     
//        Send alert message

function bookingPage() {
    global $viewsuccess;
    if (isset($_POST['bookview'])) {
        $viewname = escape_String($_POST['name']);
        $viewemail = escape_String($_POST['email']);
        $viewphone = escape_String($_POST['phone']);
        $viewdate = escape_String($_POST['date']);


        $query = "INSERT INTO viewing(viewerName,viewerEmail,viewerPhone,viewDate,viewStatus,scheduledDate)"
                . "VALUES('{$viewname}','{$viewemail}','{$viewphone}','{$viewdate}','1',now())";
        $insert = query($query);
        confirm($query);

        if ($insert) {
            $viewsuccess = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                    <strong>Success!</strong> You Have Scheduled The Viewing Successfully.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
//            $mail = new MailClass();
//            $subject = "Your Accommodation Account - Verify Your Email Address";
//            $body = "Dear {$viewname}<br>"
//                    . "You have schedule a viewing on {$viewdate}<br><br>"
//                    . "<a href='#' class='btn btn-outline-success formbutton'>Don't Missing Your Appointment</a> <br><br>"
//                    . "<a href='http://localhost/project/AccSystem/public/HomePage.php' class='btn btn-outline-success formbutton'>Go to the Website</a>";
//
//            $getresult = $mail->sendMail($email, $subject, $body);
        }
    }

    if (isset($_POST['bookroom'])) {
        echo 'Ok';
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
                        . "WHERE adminEmail='{$user}' AND adminPassword='{$pass}'";

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
                    $UserActive = $row['isActive'];
                    $userPass = $row['studPassword'];
                }
                if ($UserActive == 1) {
                    if (($encrypPass == $userPass) && ($UserEmail == $user)) {
                        $_SESSION["iduser"] = $id;
                        $_SESSION["firstname"] = $UserFirstName;
                        $_SESSION["lastname"] = $UserLastName;
                        $_SESSION["email"] = $UserEmail;
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
                    if (($pass == $adminPassword) && ($adminEmail == $user)) {
                        $_SESSION["admin"] = "Admin";
                        $_SESSION["idadmin"] = $adminID;
                        $_SESSION["adminFN"] = $adminFirstN;
                        $_SESSION["adminLN"] = $adminLastN;
                        $_SESSION["adminCategory"] = $adminCategory;
                        $_SESSION["adminEmail"] = $adminEmail;
                        $_SESSION["adminIsActive"] = $adminActive;
                        $_SESSION["adminPass"] = $adminPassword;

                        //redirect("HomePage.php");
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
                $body = "Dear {$UserFName} {$UserLName}<br>"
                        . "Please, Follow the link below to reset your password<br><br>"
                        . "<a href='http://localhost/project/AccSystem/public/setNewPassword.php?key={$activationKey}' class='btn btn-outline-success formbutton'>Reset Your Password</a>";

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
                                    <strong>INFO!</strong> Password must have 1 Number, 1 Uppercase, and Between 7-15.
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
                                    <strong>INFO!</strong> Password must have 1 Number, 1 Uppercase, and between 7-15.
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
                    $body = "Dear {$fname} {$lname}<br>"
                            . "Please verify your email address to complete your LearnigSpace Account<br><br>"
                            . "<a href='http://localhost/project/AccSystem/public/userActivation.php?key={$userActicationKey}' class='btn btn-outline-success formbutton'>Verify email address</a>";

                    $getresult = $mail->sendMail($email, $subject, $body);
                    if ($getresult) {
                        $confirmemail = "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                                    <strong>Success!</strong> A Activation Link Has Been Sent to this -> <strong>{$email}</strong>.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button></div>";
                        $sql = "INSERT INTO student(studFirstName,studMiddleName,studLastName,studEmail,studPassword,studGender,studDOB,studSchool,studSchoolAddress,studCountry,studCity,studStreet,id_passport,studPhone,activationKey,isActive,data)"
                                . "VALUES('{$fname}','{$midname}','{$lname}','{$email}','{$passEncrip}','{$gender}','{$date}','{$schoolName}','{$schoolAdd}','{$country}','{$city}','{$street}',{$idPassport}','{$phone}','{$userActicationKey}','0',now())";

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

//Send Message
function send_message() {

    if (isset($_POST['send_msg'])) {

        $to = "projectcrudacc@gmail.com";
        $fname = escape_String($_POST['fname']);
        $lname = escape_String($_POST['lname']);
        $from = $fname . " " . $lname;
        $subject = "Complaints";
        $email = escape_String($_POST['email']);
        $phone = escape_String($_POST['phone']);
        $msg = escape_String($_POST['message']);

        $headers = "From: {$from} {$email}";

        $result = mail($to, $subject, $msg, $headers);
        //$to = 'moisesnt2@gmail.com';
        //$fname = $_POST['fname'];
        //$lname = $_POST['lname'];
        //$email = $_POST['email'];
        //$phone = $_POST['phone'];
        //$subject = 'Contact Me';
        //$msg = $_POST['message'] . "<br>" . "My Phone Number: ";
        //$full = $fname . " " . $lname;
//          $headers = "From: projectcrudacc@gmail.com". phpversion();
//        ini_set("SMTP", "smtp.gmail.com");
//        ini_set("smtp_port", "587");
//        ini_set('sendmail_from', 'moisesnt2@gmail.com');
//        ini_set('auth_username', 'projectcrudacc@gmail.com');
//        ini_set('auth_password', 'Projectcrudacc2');
//        $result = mail($to, $subject, $msg, $headers);
//        echo $result;
//        if (!$result) {
//            echo '<script language="javascript">';
//            echo 'alert("Message Was Not Successfully Sent")';
//            echo '</script>';
//        } else {
//            echo '<script language="javascript">';
//            echo 'alert("Message Was Successfully Sent")';
//            echo '</script>';
//        }
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
