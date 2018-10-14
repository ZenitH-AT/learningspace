<img style="min-width:40px; min-height:40px; max-width:3%; max-height:3%; margin-right:1.5%" src="IMAGE/web/logo.png">
<a class="navbar-brand" href="HomePage.php">LearningSpace</a>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link text-light" href="HomePage.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="gallery.php">Gallery</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="booking.php">Booking</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="contact.php">Contact Us</a>
        </li>
    </ul> <?php

    if (!isset($_SESSION["iduser"]) && !isset($_SESSION["admin"])) {
        ?>
        <form class="form-inline mt-2 mt-md-0 js-signin-modal-trigger">
            <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="collapse" data-target=".navbar-collapse.show" href="#0" style="margin-right: 8px;" data-signin="login">Sign in
            </button>
            <a href="signup.php"><button type="button" class = "btn btn-outline-success my-2 my-sm-0">Sign up</button></a>
        </form>
    <?php } ?>

    <form class="form-inline mt-2 mt-md-0">
        <?php
        if (isset($_SESSION["iduser"])) {
            include 'notificationMenu.php'; ?>

            <ul class="navbar-nav">
                <a class="nav-link text-light"><?php echo "Welcome, ".ucfirst($_SESSION["firstname"]); ?></a>

                <div style="max-width:40px;"><?php 
                    $studImage = query("SELECT * FROM studentprofile WHERE studID='{$_SESSION["iduser"]}' AND LENGTH(studPicture) > 0");
                    confirm($studImage);

                    if (countItem($studImage) > 0) { 
                        while ($row = fetch_array($studImage)) {
                            $studPicture = $row['studPicture'];
                        } ?>

                        <img class="rounded-circle" src="IMAGE/upload/<?php echo $studPicture; ?>" style="min-width:40px; min-height:40px; max-width:3%; max-height:3%;">
                        <?php 
                    } else { ?>
                        <img class="rounded-circle" src="IMAGE/web/self.jpg" style="font-size:0; min-width:40px; min-height:40px; max-width:3%; max-height:3%; margin-left:0px; margin-right:0px">
                        <?php 
                    } ?>
                </div>
            </ul>

            <!-- account dropdown start -->
            <li class="nav-item dropdown">
                <a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </a>
                <ul class="dropdown-menu dropBox" style="margin-top:10px;">
                    <li class="head text-dark myMenuUser">
                        <div class="row">
                            <div class="col-lg-8 col-sm-10 col-8">
                                <a class="text-dark" href="userProfile.php?iduser=<?php echo $_SESSION['iduser']; ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </div>
                        </div>
                    </li>
                    <li class="head text-dark myMenuUser">
                        <div class="row">
                            <div class="col-lg-8 col-sm-10 col-8">
                                <a href="userRoomDetails.php?iduser=<?php echo $_SESSION['iduser']; ?>" class="text-dark"><i class="fa fa-fw fa-home"></i> Room</a>
                            </div>
                        </div>
                    </li>
                    <li class="head text-dark myMenuUser">
                        <div class="row">
                            <div class="col-lg-10 col-sm-10 col-10">
                                <a href="paymentPage.php?iduser=<?php echo $_SESSION['iduser']; ?>" class="text-dark"><i class="fa fa-fw fa-credit-card"></i> Payments</a>
                            </div>
                        </div>
                    </li>
                    <li class="head text-dark myMenuUser">
                        <div class="row">
                            <div class="col-lg-10 col-sm-10 col-10">
                                <a href="userTicket.php?iduser=<?php echo $_SESSION['iduser']; ?>" class="text-dark"><i class="fa fa-fw fa-life-ring"></i> Support</a>
                            </div>
                        </div>
                    </li>
                    <li class="footer bg-dark text-light bg-dark myMenuUser">
                        <a class="text-light" href="../resource/logout.php"><i class="fa fa-fw fa-power-off"></i> Sign Out</a>
                    </li>
                </ul>
            </li>
            <!-- account dropdown end --><?php 
        } else if (isset($_SESSION["admin"])) { ?>
            <ul class="navbar-nav">
                <li>
                    <a class="nav-link text-light"><?php echo "Welcome, " . ucfirst($_SESSION["adminFN"]) . " (" . ($_SESSION['adminCategory'] == 1 ? "owner" : "regular admin") . ")"; ?></a>
                </li>
            </ul>

            <!-- account dropdown start -->
            <li class="nav-item dropdown">
                <a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </a>
                <ul class="dropdown-menu dropBox" style="">
                    <li class="head text-dark myMenuUser">
                        <div class="row">
                            <div class="col-lg-8 col-sm-8 col-8">
                                <a href="admin/dashboard.php" class="text-dark"><i class="fa fa-fw fa-user-cog"></i> Admin</a>
                            </div>
                        </div>
                        <!--</a>-->
                    </li>
                    <li class="footer bg-dark text-light bg-dark myMenuUser">
                        <a class="text-light" href="../resource/logout.php"><i class="fa fa-fw fa-power-off"></i> Sign Out</a>
                    </li>
                </ul>
            </li>
            <!-- account dropdown end --><?php 
        } ?>
    </form>

    <div id="backtop" class="" style="display: block;">▲</div>
</div>

<style>
    #backtop {
        position: fixed;
        left: auto;
        right: 20px;
        top: auto;
        bottom: 20px;
        outline: none;
        overflow: hidden;
        color: #fff;
        text-align: center;
        background-color: rgba(49, 79, 96, 0.84);
        height: 40px;
        width: 40px;
        line-height: 40px;
        font-size: 14px;
        border-radius: 2px;
        cursor: pointer;
        transition: all 0.3s linear;
        z-index: 999999;
        opacity: 1;
        display: none;
    }

    #backtop:hover {
        background-color: #343A40;
    }

    #backtop.mcOut {
        opacity: 0;
    }
</style>