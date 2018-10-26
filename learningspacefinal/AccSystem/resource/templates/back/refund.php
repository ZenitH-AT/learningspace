<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Refund requests</h1>
</div>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb text-secondary ">
            <li class="breadcrumb-item text-secondary"><i class="fa fa-exclamation-circle"></i> Refund requests</li>  
        </ol>
    </div>
</div>

<div class="table-responsive">
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Request ID</th>
                    <th>Payment ID<br />(payment to be revoked)</th>
                    <th>Student ID</th>
                    <th>Student name</th>
                    <th>Reason</th>
                    <th>Date requested</th>

                    <th>Accept</th>
                    <th>Decline</th>
                </tr>
            </thead>
            <tbody> <?php
                $query = query("SELECT * FROM refund ORDER BY requestID DESC");
                confirm($query);
    
                while ($row = fetch_array($query)) { 
                    //Getting student name
                    $sqlStudentName = query("SELECT studFirstName, studLastName FROM student WHERE studID = " . $row['studID']);
                    $studentName = mysqli_fetch_assoc($sqlStudentName); ?>

                    <tr>
                        <td><?php echo $row['requestID'] ?></td>
                        <td><?php echo $row['payID'] ?></td>
                        <td><?php echo $row['studID'] ?></td>
                        <td><?php echo $studentName['studFirstName'] . " "  . $studentName['studLastName']; ?></td>
                        <td><?php echo $row['reason'] ?></td>
                        <td><?php echo $row['date'] ?></td>

                        <td><form method="post"><button class="btn btn-success formbutton" name="accept<?php echo $row['requestID']; ?>" onclick="return confirm('Are you sure you want to accept this request?')"><span class="fa fa-check" style="color:white"></button></form></td>
                        <td><form method="post"><button class="btn btn-danger formbutton" name="decline<?php echo $row['requestID']; ?>" onclick="return confirm('Are you sure you want to decline this request?')"><span class="fa fa-times" style="color:white"></button></form></td><?php

                        //Accept button handling
                        if(isset($_POST['accept' . $row['requestID']])){
                            query("UPDATE payment SET paymentStatus = 0 WHERE payID = " . $row['payID']);
                            query("DELETE FROM refund WHERE requestID = " . $row['requestID']);
                            ?><script>alert("The request has been accepted.");</script><?php

                            send_notification("Your refund request was accepted", "Your payment refund request has been <strong>accepted</strong>.", "success", $row['studID']);
                            
                            header("Refresh:0");
                            exit();
                        }

                        //Decline button handling
                        if(isset($_POST['decline' . $row['requestID']])){
                            query("DELETE FROM refund WHERE requestID = " . $row['requestID']);
                            ?><script>alert("The request has been declined.");</script><?php

                            send_notification("Your refund request was declined", "Your payment refund request has been <strong>declined</strong>.", "danger", $row['studID']);
                            
                            header("Refresh:0");
                            exit();
                        } ?>
                    </tr> <?php
                } ?>
            </tbody>
        </table>
    </div>
