<?php getClientRoom(); backHOme(); leaveOption(); ?>
<?php include TEMPLATE_FRONT . DS . "leaveRoomPopup.php"; ?>
<?php
$confirm1 = "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
            <strong>Completed!</strong> You Have Successfully Left The Room.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button></div>";
?>
<div class="container">

    <div class=" col-sm-4 col-lg-4 col-md-4"></div>

    <div class="row mysignup">
        <?php if (isset($_GET['confirm'])) {
            $con = $_GET['confirm'];
            if ($con == "yes") { ?>
                <div class="" style="width: 100%; padding-left: 16px; padding-right: 16px;"><?php echo $confirm1; ?></div>
        <?php } }?>
        <div class="col-md-6">
            <div class="well well-sm">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Room Information</h4>
                        
                        <?php if ($count2 == 0) { ?>
                            <div class="text-center" style="padding-bottom: 5px;"><img style="height: 226px;" class="img-fluid img-thumbnail" src="IMAGE/web/roomEmpty.jpg"  width="380"></div>
<?php } else { ?>
                            <div class="text-center" style="padding-bottom: 5px;"><img style="height: 226px;" class="img-fluid img-thumbnail" src="IMAGE/gallery/<?php echo $roomImage; ?>"  width="380"></div>
<?php } ?>

                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th scope="row">Room no:</th>
                                    <td scope="row"><?php echo $roomID; ?></td>
                                </tr>
                                <tr>
                                    <td>Name:</td>
                                    <td><?php echo $roomName; ?></td>
                                </tr>
                                <tr>
                                    <td>Price per Month:</td>
                                    <td>R<?php echo $roomPrice; ?></td>
                                </tr>
                                <tr>
                                    <td>Type:</td>
                                    <td><?php echo $roomType; ?></td>
                                </tr>
                                <tr>
                                    <td>People allowed:</td>
                                    <td><?php echo $roomCapacity; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>

                        <div style="padding-top: -5px;">
                            <div class="card-body ">
                                <p>
                                    <a class="btn btn-outline-success float-left" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Short Description</a>
                                    <a class="btn btn-outline-success float-right" data-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="multiCollapseExample2">Long Description</a>
                                </p>
                            </div>

                            <div class="d-block p-2">
                                <div class="card-body text-center">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                                            <div class="card card-body">
<?php echo $roomShortDescription; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="collapse multi-collapse" id="multiCollapseExample2">
                                            <div class="card card-body">
<?php echo $roomDescription; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="well well-sm">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Booking Information</h4>
                        <div class="text-center" style="padding-bottom: 5px;"><img style="height: 226px;" class="img-fluid img-thumbnail" src="IMAGE/web/bookingIcon2.jpg"  width="380" ></div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Started Date</td>
                                    <td><?php echo $bookStatDate; ?></td>
                                </tr>
                                <tr>
                                    <td>Last Date:</td>
                                    <td><?php echo $bookEndDate; ?></td>
                                </tr>
                                <tr>
                                    <td>Staying Period:</td>
                                    <td><?php echo $stayingPeriod; ?></td>
                                </tr>
                                <tr>
                                    <td>Lease duration:</td>
                                    <td><?php echo $numMonth; ?> Months and <?php echo $numDaysLeft; ?> Days</td>
                                </tr>
                                <tr>
                                    <td>Payment type: </td>
                                    <td>Monthly</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <?php if ($numDaysLeft > 0) { ?>
                            <div >
                                <strong class="text-info">Notification: </strong>Due to the additional
    <?php echo $numDaysLeft; ?> days, you will be charged the values of these in one of the next payment.
    
    <p></p>
    <?php if(!empty($bookStatDate)){ 
                        $monthtoLeave = strtotime("+1 months", strtotime($bookStatDate. ' + 1 days')); //echo date('Y/m/d', $monthtoLeave); ?>
                    <p><strong class="text-info">Notification:</strong> If you want to leave the room, You have to state/leave before -> <strong> <?php echo date('Y/m/d', $monthtoLeave); ?>. </strong>
                    Otherwise, the <strong>System</strong> will automatically charge you for the next month payment</p>
                    <?php } ?>
                            </div>
<?php } ?>
                    </div>
                </div>
            </div>
        </div>
                
        <div class="form-group text-center" style="width: 100%;">
            <hr>
            <div class="col-md-12">
<?php if(isset($leaveRoom)){ if ($leaveRoom == "yes") { ?>
                <div class="">
                    <?php if(!empty($bookStatDate)){ ?>
                    <button type="submit" class="btn btn-outline-danger formbutton" name="leaveModal" data-target="#leaveModal" data-toggle="modal"><i class="fa fa-fw fa-times-circle"></i> Leave room</button>
                    <?php } ?>
                </div>
            <?php } elseif ($leaveRoom == "no" && isset($_SESSION["idRoom"])) { ?>
                    <form method="post">
                    <button type="submit" class="btn btn-outline-danger formbutton" name="redirectPayment"><i class="fa fa-fw fa-credit-card"></i> Make a payment before leaving</button>    
                    </form>
<?php } }?>
            </div>
        </div>
    </div>
</div>