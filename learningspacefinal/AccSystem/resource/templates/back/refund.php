<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Refund requests</h1>
</div>

<h5>Request records</h5>
<div class="table-responsive">
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Request ID</th>
                    <th>Payment ID<br />(payment to be revoked)</th>
                    <th>Student ID</th>
                    <th>Reason</th>
                    <th>Date requested</th>

                    <th>Accept</th>
                    <th>Decline</th>
                </tr>
            </thead>
            <tbody> <?php
                $query = query("SELECT * FROM refund ORDER BY requestID DESC");
                confirm($query);
    
                while ($row = fetch_array($query)) { ?>
                    <tr>
                        <td><?php echo $row['requestID'] ?></td>
                        <td><?php echo $row['payID'] ?></td>
                        <td><?php echo $row['studID'] ?></td>
                        <td><?php echo $row['reason'] ?></td>
                        <td><?php echo $row['date'] ?></td>

                        <td><form method="post"><button class="btn btn-success formbutton" name="accept<?php echo $row['requestID']; ?>" onclick="return confirm('Are you sure you want to accept this request?')"><span class="fa fa-check" style="color:white"></button></form></td>
                        <td><form method="post"><button class="btn btn-danger formbutton" name="decline<?php echo $row['requestID']; ?>" onclick="return confirm('Are you sure you want to decline this request?')"><span class="fa fa-times" style="color:white"></button></form></td><?php

                        //Accept button handling
                        if(isset($_POST['accept' . $row['requestID']])){
                            query("DELETE FROM payment WHERE payID = " . $row['payID']);
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
