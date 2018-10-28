<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Payments</h1>
</div>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb text-secondary ">
            <li class="breadcrumb-item text-secondary"><i class="fa fa-credit-card"></i> Payments</li>  
        </ol>
    </div>
</div>

<div class="table-responsive">
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Card No</th>
                    <th>Card<br/>month</th>
                    <th>Card<br/>year</th>
                    <th>Amount</th>
                    <th>Month<br/>iteration</th>
                    <th>Student ID</th>
                    <th>Student name</th>
                    <th>Room ID</th>
                    <th>Room name</th>
                    <th>Status</th>
                    <th></th>
                    <th>Payment date</th>
                </tr>
            </thead>
            <tbody> <?php
                $query = query("SELECT * FROM payment ORDER BY payID DESC");
                confirm($query);
                
                while ($row = fetch_array($query)) { 
                    //Getting student name
                    $sqlStudentName = query("SELECT studFirstName, studLastName FROM student WHERE studID = " . $row['studID']);
                    $studentName = mysqli_fetch_assoc($sqlStudentName); 
                    
                    //Getting room name
                    $sqlRoomName = query("SELECT roomName FROM room WHERE room_id = " . $row['roomID']);
                    $roomName = mysqli_fetch_assoc($sqlRoomName); ?>

                    <tr>
                        <td><?php echo $row['payID'] ?></td>
                        <td><?php echo substr($row['cardNumber'], 0, 2) . '****' . substr($row['cardNumber'], -2) ?></td>
                        <td><?php echo $row['cardMonth'] ?></td>
                        <td><?php echo $row['cardYear'] ?></td> 
                        <td><?php echo 'R' . round($row['payAmount'], 2) ?></td>
                        <td><?php echo $row['payMonth'] ?></td>
                        <td><?php echo $row['studID'] ?></td>
                        <td><?php echo $studentName['studFirstName'] . " "  . $studentName['studLastName']; ?></td>
                        <td><?php echo $row['roomID'] ?></td>
                        <td><?php echo $roomName['roomName']; ?></td>
                        <td><?php echo ($row['paymentStatus'] == 1 ? '<text class="text-success" style="float:left">complete</text>' : '<text class="text-danger" style="float:left">incomplete</text>') ?></td>
                        <td><form method="post"><button class="btn-xs btn-dark formbutton" name="switch<?php echo $row['payID']; ?>" onclick="return confirm('Are you sure you want to switch the payment status of payment ID <?php echo $row['payID'] ?>?')"><span class="fas fa-exchange-alt" style="color:white"></button></form></td>
                        <td><?php echo $row['paymentDate'] ?></td>
                    </tr> <?php

                    //Switch button handling
                    if(isset($_POST['switch' . $row['payID']])) {
                        $newValue = ($row['paymentStatus'] == 1 ? 0 : 1);

                        query("UPDATE payment SET paymentStatus = {$newValue} WHERE payID = " . $row['payID']);
                        ?><script>alert("Payment status changed.");</script><?php

                        header("Refresh:0");
                        exit();
                    }
                } ?>
            </tbody>
        </table>
    </div>
