<?php include TEMPLATE_FRONT . DS . "paymentPopup.php"; ?>
<div class=" col-sm-4 col-lg-4 col-md-4"></div>

<div class="text-center">
    <?php bookingPage(); ?>
    <?php echo $viewsuccess; ?>
</div> <?php
if (isset($_GET['id'])) {
    $sqlRoomName = query("SELECT roomName, roomImage FROM room WHERE room_id = " . $_GET['id']);
    confirm($sqlRoomName);
    $roomInfo = mysqli_fetch_assoc($sqlRoomName);
    ?>

    <style>
        .selected-room-card {
            background-repeat: repeat-y;
            background-size: contain;
            background-position: right 0;
        }
    </style>

    <div class="col-md-12">
        <div class="well well-sm">
            <div class="card selected-room-card" style="background-image: linear-gradient(to right, white 80%, transparent), url('IMAGE/gallery/<?php echo$roomInfo['roomImage']; ?>');">
                <div class="card-body">
                    <h5>Selected room information</h5>
                    <div class="row">
                        <div class="col-md-2">
                            <span class="badge badge-light">Room no: <span class="text-info"><?php echo $_GET['id']; ?></span></span><br/>
                            <span class="badge badge-light">Room Name: <span class="text-info"><?php echo $bookRoomName; ?></span></span>
                        </div>
                        <div class="col-md-2">
                            <span class="badge badge-light">Room Capacity: <span class="text-info"><?php echo $bookRoomCapacity; ?></span></span>
                            <span class="badge badge-light">Price per Month: <span class="text-info">R<?php echo $bookRoomPrice; ?></span></span>
                        </div>
                    </div>
                </div> 
            </div> 
        </div> 
    </div>
<?php } ?>

<div class="row mysignup">
    <div class="col-md-6">
        <div class="well well-sm">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" method="post">
                        <fieldset>
                            <div class="text-center">
                                <legend class="header col-md-12">Book Viewing <hr></legend>
                            </div> <?php
                            if (isset($_GET['id'])) {
                                if (!isset($_SESSION["iduser"])) {
                                    ?>
                                    <div class="form-group">
                                        <div class="col-md-12 col-md-offset-1">
                                            <input id="name" name="name" type="text" placeholder="Enter your name" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12 col-md-offset-1">
                                            <input id="email" name="email" type="text" placeholder="Enter your email address" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12 col-md-offset-">
                                            <input id="phone" name="phone" type="text" placeholder="Enter your telephone number" class="form-control" required>
                                        </div>
                                    </div><?php }
                                ?>

                                <div class="form-group">
                                    <div class="col-md-12 col-md-offset-1">
                                        <text class="text-muted" style="margin-left: 1%; ">Choose preferred viewing date</text>
                                        <input class="form-control col-md-8" type="text" name="date" id="bookviewings" placeholder="Select Date" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" name="bookview" class=" btn btn-outline-success formbutton"><i class="fa fa-fw fa-eye"></i> Book Viewing</button>
                                    </div>
                                </div><?php } else {
                                ?>
                                <div class="col-md-12">
                                    <a href="gallery.php" class="text-info">Select a room for booking from the gallery first</a>
                                </div><?php }
                            ?>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
<?php if (isset($_SESSION["iduser"])) { ?>
            <div class="well well-sm">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal" method="post">
                            <fieldset>
                                <div class="text-center">
                                    <legend class="header col-md-12">Book a Room<hr></legend>
                                </div>

    <?php echo $DatesError; ?>

                                <div class="col-md-12 col-md-offset-1">
                                </div><?php
                                if (isset($_GET['id'])) {
                                    if ($checkPayment == "ready") {
                                        ?>
                                        <div class="col-md-12 col-md-offset-1" style="padding-bottom: 6px;">
            <?php if (isset($_GET['id']) && ($checkPayment != "done")) { ?>
                                                <div style="padding-left: 151px;">
                                                    <span class="badge badge-light text-info">*The First Instalment*</span>
                                                </div>
                                            <div style="padding-left: 51px;">
                                                <span class="badge badge-light text-info">-> This must be paid in order to <strong>Book the Chosen Room</strong> <-</span>
                                                </div>
                                                
            <?php } ?>
                                        </div>

                                        <div class="form-group ">
                                            <div class="col-md-12 col-md-offset-1">
                                                <text class="text-muted" >Chosen move in date</text>
                                            </div>

                                            <div class="col-md-12 col-md-offset-1 input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-calendar-alt" style="color: green;"></i></div>
                                                </div>
                                                <text class="text-muted" style="border: #495057 dotted 2px;"> <?php echo $bookDateIn; ?></text>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <div class="col-md-12 col-md-offset-1">
                                                <text class="text-muted" >Chosen move out date</text>
                                            </div>

                                            <div class="col-md-12 col-md-offset-1 input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-calendar-alt" style="color: green;"></i></div>
                                                </div>
                                                <text class="text-muted" style="border: #495057 dotted 2px;"> <?php echo $bookDateOut; ?></text>
                                            </div>
                                        </div>

                                        <div class="form-group" ng-app="CheckBox" ng-controller="CheckIt">
                                            <div class="input-group col-md-12">
                                                <div style="padding-right: 6px;">
                                                    <button type="submit" class="btn btn-outline-success" name="back"><i class="fa fa-fw fa-arrow-circle-left"></i>Back</button>
                                                </div>
                                                <?php if (isset($_GET['id'])) { ?>
                                                    <br>
                                                    <button type="button" class="btn btn-outline-success" name="paymentModal" data-target="#paymentModal" data-toggle="modal"><i class="fa fa-fw fa-credit-card"></i> Payment</button>
            <?php } ?>
                                            </div>
                                        </div>

        <?php } elseif (isset($_SESSION["checkPayment"])) { ?>
                                        <div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                                            <strong>Success!</strong> You Have Booked a Room.
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            </button>
                                        </div>

        <?php } elseif (isset($_SESSION["userRoomBooked"]) == $_SESSION["iduser"]) { ?>
                                        <div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                                            <strong>Info!</strong> You Have Already Booked A Room.
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            </button>
                                        </div>
        <?php } else { ?>
                                        <div class="col-md-12 col-md-offset-1">
                                            <div class='alert alert-info alert-dismissible fade show text-center' role='alert'>
                                                <strong>Note:</strong> You will the charge for <strong>the whole Month</strong> whether you only choose days to stay.
                                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <div class="col-md-12 col-md-offset-1">
                                                <text class="text-muted" >Choose move in date</text>
                                            </div>

                                            <div class="col-md-12 col-md-offset-1 input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-calendar-alt" style="color: green;"></i></div>
                                                </div>
                                                <input class="form-control" type="text" name="checkInDate" id="checkin" placeholder="Check In" required="">
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <div class="col-md-12 col-md-offset-1">
                                                <text class="text-muted" >Choose move out date</text>
                                            </div>

                                            <div class="col-md-12 col-md-offset-1 input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-calendar-alt" style="color: green;"></i></div>
                                                </div>
                                                <input class="form-control" type="text" name="checkOutDate" id="checkout" placeholder="Check Out" required="">
                                            </div>
                                        </div>

                                        <div class="form-group" ng-app="CheckBox" ng-controller="CheckIt">
                                            <div class="col-md-12">
                                                <div data-toggle="tooltip" data-placement="top" title="Click to Read and Agree the Terms and Conditions">
                                                    <a class="text-info" style="margin-right:10px" name="TermsConditions" href="PrivacyTerms.php" data-toggle="modal" data-target="#TermsPopup">Accept Terms of Service</a><input type="checkbox"  onchange="document.getElementById('sendN').disabled = !this.checked;"/>
                                                </div><br>

                                                <button type="submit" name="bookroom" disabled id="sendN" class=" btn btn-outline-success formbutton">Confirm Details</button>
                                            </div>
                                        </div><?php
                                    }
                                } else {
                                    if (isset($_SESSION["checkPayment"])) {
                                        ?>
                                        <div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                                            <strong>Success!</strong> You Have Booked a Room.
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            </button>
                                        </div><?php } elseif (isset($_SESSION["userRoomBooked"]) == $_SESSION["iduser"]) {
                                        ?>
                                        <div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                                            <strong>Info!</strong> You Have Already Booked A Room.
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            </button>
                                        </div><?php } else {
                                        ?>                                
                                        <div class="col-md-12">
                                            <a href="gallery.php" class="text-info">Select a room for booking from the gallery first</a>
                                        </div><?php
                                    }
                                }
                                ?>
                            </fieldset>
                        </form>
                    </div>
                </div> 
            </div>

        <?php } else if (isset($_SESSION["admin"])) { ?>
            <div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                <strong>Info!</strong> Admin, You Cannot Book a Room.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                </button></div>
        <?php } else { ?>
            <div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                <strong>Alert!</strong> You can only book a viewing, because you are not logged in/registered to LearningSpace.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                </button></div>
<?php } ?>
    </div>
</div>
<!-- Booking - END -->