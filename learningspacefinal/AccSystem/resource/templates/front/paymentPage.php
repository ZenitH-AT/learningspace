<?php getClientRoom();
makePayment(); 
if (isset($_SESSION["idRoom"])) {
    $query = "SELECT * FROM payment WHERE studID='{$_SESSION["iduser"]}' AND roomID='{$_SESSION["idRoom"]}' AND paymentStatus=1";
    $result = query($query);
    confirm($result);
    $count = countItem($result);
}
?>
<?php include TEMPLATE_FRONT . DS . "paymentPopup.php"; ?>
<?php
$confirm1 = "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
            <strong>Completed!</strong> You Have Successfully Left The Room.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button></div>";

$confirm2 = "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
            <strong>Completed!</strong> You Have Successfully Made A Payment.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button></div>";
?>
<div class="container">

    <div class=" col-sm-4 col-lg-4 col-md-4"></div>

    <div class="row mysignup">
        <?php
        if (isset($_GET['paid'])) {
            ?>
            <div class="" style="width: 100%; padding-left: 16px; padding-right: 16px;"><?php echo $confirm2; ?></div>
<?php } //} ?>
        <div class="col-md-6">
            <div class="well well-sm">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Payment Details</h4>
                        <div class="text-center" style="padding-bottom: 5px;"><img style="height: 226px;" class="img-fluid img-thumbnail" src="IMAGE/web/PaymentCash2.png"  width="380" ></div>
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>Room no:</td>
                                    <td><?php echo $roomID; $_SESSION["idRoom"] = $roomID; ?></td>
                                </tr>
                                <tr>
                                    <td>Room Name:</td>
                                    <td><?php echo $roomName; ?></td>
                                </tr>
                                <tr>
                                    <td>Price per month:</td>
                                    <td><?php echo $roomPrice; ?></td>
                                </tr>
                                    <?php
                                    $additional = 0;
                                    if (isset($count)) {
                                        if ($count == 1) {
                                            ?>
                                            <tr>
                                                <td>Additional Cost:</td>
                                                <td><?php if (isset($_SESSION["numDaysLeft"])) {
                                                echo round($additional = ($roomPrice * $_SESSION["numDaysLeft"]) / 30, 2);
                                            } ?></td>
                                            </tr>
                                        <?php } else { ?>
                                            <tr>
                                                <td>Additional Cost:</td>
                                                <td>0</td>
                                            </tr>
                                        <?php }
                                    } ?>
                                <tr>
                                    <td>Payment method:</td>
                                    <td>Monthly</td>
                                </tr>
                                <tr>
                                    <th>Next Payment Cost:</th>
                                    <th><?php $totalCost = ($roomPrice + $additional); 
                                    echo round($totalCost, 2); 
                                    $_SESSION['totalCost'] = $totalCost; ?></th>
                                </tr>
                            </tbody>
                        </table>
                        <hr>

                        <div class="card-body ">
                            <div class="col-md-12 d-flex justify-content-center">
                                <?php if (isset($_SESSION["idRoom"])) { ?>
                                    <button type="button" class="btn btn-outline-success formbutton" data-target="#paymentModal" data-toggle="modal">Payment</button>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="card-body ">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="well well-sm">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Payment List</h4>
                        <div class="text-center" style="padding-bottom: 5px;"><img style="height: 226px;" class="img-fluid img-thumbnail" src="IMAGE/web/list2.jpg"  width="380" ></div>
                        <div class="table table-sm">
                            <table class="table-responsive table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">Month</th>
                                        <th scope="col">Card No</th>
                                        <th scope="col">Room No</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Paid</th>
                                        <th scope="col">Request refund</th>
                                    </tr>
                                </thead >

                                <tbody class="text-center">
<?php payment(); ?>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="text-center"><strong class="text-info">Months Period </strong></div>
                        <div class="card-body ">
                            <div class="row text-center">
<?php paymentMonths(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>