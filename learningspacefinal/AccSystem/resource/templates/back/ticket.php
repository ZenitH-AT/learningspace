<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tickets</h1>
</div>

<h5>Open tickets</h5>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>  
                <th>Ticket ID</th>
                <th>Student ID</th>
                <th>Student name</th>
                <th>Subject</th>
                <th>Category</th>
                <th>Date created</th>

                <th>View conversation</th>
                <th>Close ticket</th>
            </tr>
        </thead>
        <tbody> <?php
            $query;

            if (isset($_GET['searchFilter'])) {
                //Select records containing the search query text
                $filter = $_GET['searchFilter'];

                $query = query("SELECT * FROM helpticket 
                                WHERE isActive = 1  
                                AND (
                                    ticketID LIKE '%{$filter}%'
                                    OR studID LIKE '%{$filter}%'
                                    OR ticketSubject LIKE '%{$filter}%'
                                    OR ticketCategory LIKE '%{$filter}%'
                                    OR ticketTime LIKE '%{$filter}%'
                                )
                                ORDER BY ticketID DESC");
            } else {
                //Select all records
                $query = query("SELECT * FROM helpticket WHERE isActive = 1 ORDER BY ticketID DESC");
            }

            confirm($query);

            while ($row = fetch_array($query)) { 
                 //Getting student name
                 $sqlStudentName = query("SELECT studFirstName, studLastName FROM student WHERE studID = " . $row['studID']);
                 $studentName = mysqli_fetch_assoc($sqlStudentName); ?>

                <tr>
                    <td><?php echo $row['ticketID'] ?></td>
                    <td><?php echo $row['studID'] ?></td>
                    <td><?php echo $studentName['studFirstName'] . " "  . $studentName['studLastName']; ?></td>
                    <td><?php echo $row['ticketSubject'] ?></td>
                    <td><?php echo $row['ticketCategory'] ?></td> 
                    <td><?php echo $row['ticketTime'] ?></td>

                    <td><button type="button" class="btn btn-success formbutton" data-toggle="modal" data-target="#ticketPopup<?php echo $row['ticketID']; ?>"><span class="fa fa-comments" style="color:white"></button></form></td>
                    <td><form method="post"><button class="btn btn-danger formbutton" name="closereopen<?php echo $row['ticketID']; ?>" onclick="return confirm('Are you sure you want to close <?php echo $row['ticketSubject'] ?>?')"><span class="fa fa-times" style="color:white"></button></form></td>
                </tr> 
                
                <!-- Conversation modal -->
                <div class="modal fade" id="ticketPopup<?php echo $row['ticketID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                        <div class="modal-content">  
                            <div class="modal-header">
                                <h5><?php echo $row['ticketSubject']; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                            </div> 
                            <div class="modal-body">
                                <!-- Reply to ticket form -->
                                <form action="" method="post">
                                    <textarea type="text" class="form-control" name="messageText<?php echo $row['ticketID']; ?>" placeholder="Type your message here" rows="4" required></textarea><br />
                                    <button type="submit" class="btn btn-outline-success formbutton" style="float:right" name="messageSend<?php echo $row['ticketID']; ?>">Reply to ticket</button>
                                </form> <?php

                                //Reply to ticket button code
                                if(isset($_POST['messageSend' . $row['ticketID']])){
                                    query("INSERT INTO helpticketmessage (ticketID, adminID, messageText, messageTime) VALUES('{$row['ticketID']}', '{$_SESSION["idadmin"]}', '" . $_POST['messageText' . $row['ticketID']] . "', now())");
                                    ?><script>alert("Your reply has been sent.");</script><?php

                                    //Sending the user a notification
                                    $adminName = mysqli_fetch_assoc(query("SELECT adminFirstN, adminLastN FROM admin WHERE adminID = " . $_SESSION["idadmin"]));
                                    send_notification("Your ticket has recieved a reply", "Your ticket has recieved a reply from <strong>{$adminName['adminFirstN']} {$adminName['adminLastN']}</strong>. Ticket ID: <strong>{$row['ticketID']}</strong>. Subject: <strong>{$row['ticketSubject']}</strong>.", "info", $row['studID']);
                                } ?>

                                <br /><br /><h6>Conversation</h6><?php
                                
                                //Data for while loop
                                $resultmessages = query("SELECT studID, adminID, messageText, messageTime FROM helpticketmessage WHERE ticketID = " . $row['ticketID'] . " ORDER BY messageTime DESC");
                                $message_count = $resultmessages->num_rows;

                                //while loop to create cards for each message
                                while ($message = $resultmessages->fetch_assoc()) { 
                                    //Getting message author type; either student or admin (the message author is based on which field in the message record is null)
                                    $messageauthortype = empty($message['adminID']) ? 'student' : 'admin'; 
                                    
                                    //Getting message author name
                                    $messageauthorname;

                                    if ($messageauthortype == "student") {
                                        $sqlstudentauthor = query("SELECT studFirstName, studLastName FROM student WHERE studID = " . $message['studID']);
                                        $studentname = mysqli_fetch_assoc($sqlstudentauthor);
                                        $messageauthorname = $studentname['studFirstName'] . ' ' . $studentname['studLastName'];
                                    } else {
                                        $sqladminauthor = query("SELECT adminFirstN, adminLastN FROM admin WHERE adminID = " . $message['adminID']);
                                        $adminname = mysqli_fetch_assoc($sqladminauthor);
                                        $messageauthorname = $adminname['adminFirstN'] . ' ' . $adminname['adminLastN'];                                          
                                    } ?>

                                    <div class="card">
                                        <div class="card-header text-secondary">
                                            <span style="float:left"><?php echo $messageauthorname; ?></span><span style="float:right"><?php echo $message['messageTime']; ?></span>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">
                                                <span class="text-secondary"><?php echo $message['messageText']; ?></span>
                                            </p>
                                        </div> 
                                    </div><br /> <?php
                                } ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div><?php

                //Close button handling
                close_open_ticket($row['ticketID'], $row['isActive']);
            } ?>
        </tbody>
    </table>
</div><br />

<h5>Closed tickets</h5>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>  
                <th>Ticket ID</th>
                <th>Student ID</th>
                <th>Subject</th>
                <th>Category</th>
                <th>Date created</th>

                <th>View conversation</th>
                <th>Reopen ticket</th>
            </tr>
        </thead>
        <tbody> <?php
            $query;

            if (isset($_GET['searchFilter'])) {
                //Select records containing the search query text
                $filter = $_GET['searchFilter'];

                $query = query("SELECT * FROM helpticket 
                                WHERE isActive = 0 
                                AND (
                                    ticketID LIKE '%{$filter}%'
                                    OR studID LIKE '%{$filter}%'
                                    OR ticketSubject LIKE '%{$filter}%'
                                    OR ticketCategory LIKE '%{$filter}%'
                                    OR ticketTime LIKE '%{$filter}%'
                                )
                                ORDER BY ticketID DESC");
            } else {
                //Select all records
                $query = query("SELECT * FROM helpticket WHERE isActive = 0 ORDER BY ticketID DESC");
            }

            confirm($query);

            while ($row = fetch_array($query)) { ?>
                <tr>
                    <td><?php echo $row['ticketID'] ?></td>
                    <td><?php echo $row['studID'] ?></td>
                    <td><?php echo $row['ticketSubject'] ?></td>
                    <td><?php echo $row['ticketCategory'] ?></td> 
                    <td><?php echo $row['ticketTime'] ?></td>

                    <td><button type="button" class="btn btn-success formbutton" data-toggle="modal" data-target="#ticketPopup<?php echo $row['ticketID']; ?>"><span class="fa fa-comments" style="color:white"></button></form></td>
                    <td><form method="post"><button class="btn btn-info formbutton" name="closereopen<?php echo $row['ticketID']; ?>" onclick="return confirm('Are you sure you want to reopen <?php echo $row['ticketSubject'] ?>?')"><span class="fa fa-arrow-up" style="color:white"></button></form></td>
                </tr> 
                
                <!-- Conversation modal -->
                <div class="modal fade" id="ticketPopup<?php echo $row['ticketID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                        <div class="modal-content">  
                            <div class="modal-header">
                                <h5><?php echo $row['ticketSubject']; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                            </div> 
                            <div class="modal-body">
                                <div class='alert alert-info fade show text-center' role='alert'>
                                    You cannot reply to a closed ticket.
                                </div> 

                                <h6>Conversation</h6><?php
                                
                                //Data for while loop
                                $resultmessages = query("SELECT studID, adminID, messageText, messageTime FROM helpticketmessage WHERE ticketID = " . $row['ticketID'] . " ORDER BY messageTime DESC");
                                $message_count = $resultmessages->num_rows;

                                //while loop to create cards for each message
                                while ($message = $resultmessages->fetch_assoc()) { 
                                    //Getting message author type; either student or admin (the message author is based on which field in the message record is null)
                                    $messageauthortype = empty($message['adminID']) ? 'student' : 'admin'; 
                                    
                                    //Getting message author name
                                    $messageauthorname;

                                    if ($messageauthortype == "student") {
                                        $sqlstudentauthor = query("SELECT studFirstName, studLastName FROM student WHERE studID = " . $message['studID']);
                                        $studentname = mysqli_fetch_assoc($sqlstudentauthor);
                                        $messageauthorname = $studentname['studFirstName'] . ' ' . $studentname['studLastName'];
                                    } else {
                                        $sqladminauthor = query("SELECT adminFirstN, adminLastN FROM admin WHERE adminID = " . $message['adminID']);
                                        $adminname = mysqli_fetch_assoc($sqladminauthor);
                                        $messageauthorname = $adminname['adminFirstN'] . ' ' . $adminname['adminLastN'];                                          
                                    } ?>

                                    <div class="card">
                                        <div class="card-header text-secondary">
                                            <span style="float:left"><?php echo $messageauthorname; ?></span><span style="float:right"><?php echo $message['messageTime']; ?></span>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">
                                                <span class="text-secondary"><?php echo $message['messageText']; ?></span>
                                            </p>
                                        </div> 
                                    </div><br /> <?php
                                } ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div><?php 
                
                //Reopen button handling
                close_open_ticket($row['ticketID'], $row['isActive']);
            } ?>
        </tbody>
    </table>
</div>

