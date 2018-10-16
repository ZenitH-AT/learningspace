<?php if (isset($_SESSION["iduser"])) { ?>
    <div class="container" style="overflow:auto">
        <div class=" col-sm-4 col-lg-4 col-md-4"></div>
        <div class="row mysignup">
            <div class="col-md-6">
                <div class="well well-sm card">
                    <form class="form-horizontal" method="post">
                        <fieldset>
                            <legend class="header card-header col-md-10" style="background-color: white">Create new support ticket</legend>
                            <div class="card-body">
                                <h6 class="text-muted">Need help? Creating a ticket will send LearningSpace<br/>an issue to attend to.</h6><br/>
                                <div class="form-group">
                                    <div class="col-md-12 col-md-offset-1">
                                        <input id="subject" name="subject" type="text" placeholder="Subject" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 col-md-offset-1">
                                        <textarea class="form-control" id="message" name="message" placeholder="Message" rows="7" required></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-1">
                                        <label for="category" class="col-md-offset-1">Category:</label>
                                        <select class="combobox form-control" id="category" name="category">
                                            <option value="Booking">Booking</option>
                                            <option value="Complaint">Complaint</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" id="create" name="create" class="btn btn-outline-success formbutton">Create ticket</button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>

            <?php
            //Creating new ticket
            if (isset($_POST['create'])) {
                $conn = mysqli_connect("localhost", "root", "", "accommodation"); //required to get the last inserted ID

                $subject = escape_String($_POST['subject']);
                $message = escape_String($_POST['message']);
                $category = escape_String($_POST['category']);
                
                $sqlcreateticket = "INSERT INTO helpticket(studID, ticketSubject, ticketCategory, ticketTime, isActive) VALUES('{$_SESSION["iduser"]}', '{$subject}', '{$category}', now(), '1')";
                mysqli_query($conn, $sqlcreateticket);
                
                $lastid = mysqli_insert_id($conn);

                $insertticketmessage = query("INSERT INTO helpticketmessage(ticketID, studID, messageText, messageTime) VALUES('{$lastid}', '{$_SESSION["iduser"]}', '{$message}', now())");
                confirm($insertticketmessage);

                mysqli_close($conn);
            } ?>

            <div class="col-md-6">
                <div class="well well-sm card">
                    <form class="form-horizontal" method="post">
                        <legend class="header card-header col-md-10" style="background-color: white">Your active tickets</legend>
                        <div class="card-body">
                            <?php 
                            //Displaying active tickets
                            $connview = mysqli_connect("localhost", "root", "", "accommodation");
                            
                            $sqlviewtickets = "SELECT * FROM helpticket WHERE studID = " . $_SESSION["iduser"] . " AND isActive = 1 ORDER BY ticketTime DESC";
                            $result = $connview->query($sqlviewtickets);

                            $row_count = $result->num_rows;

                            if($row_count == 0){ ?>
                                <div class='alert alert-info fade show text-center' role='alert'>
                                    You currently have no active tickets.
                                </div> <?php
                            } else {
                                while ($row = $result->fetch_assoc()) { 
                                    //Getting last reply time
                                    $sqllastreply = mysqli_query($connview, "SELECT messageText, MAX(messageTime) AS lastReply FROM helpticketmessage WHERE ticketID = " . $row['ticketID']);
                                    $resultlastreply = mysqli_fetch_assoc($sqllastreply); ?>
                                    
                                    <!-- Active ticket cards -->
                                    <div class="card-body">
                                        <div class="card col-md-12 form-group" style="box-shadow: 5px 5px 15px #cfd1d3">
                                            <div class="card-header text-secondary" style="background-color: white">
                                                <span style="float:left">Ticket ID: <?php echo $row['ticketID']; ?></span><span style="float:right">Created: <?php echo $row['ticketTime']; ?></span>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title"><span class="text-secondary">Subject: </span><span><?php echo $row['ticketSubject']; ?></span></h5>
                                                <p class="card-text">
                                                    <p><span class="text-secondary">Category: </span><span><?php echo $row['ticketCategory']; ?></span></p>
                                                    <p><span class="text-secondary">Last reply: </span><span><?php echo $resultlastreply['lastReply']; ?></span></p>
                                                </p>

                                                <!-- Card buttons -->
                                                <style>
                                                    .close-ticket-button-lg {
                                                        display:inline-block;
                                                        float: right;
                                                    }

                                                    .close-ticket-button-sm {
                                                        display:none;
                                                        float: right;
                                                    }
                                                    
                                                    /* Display button based on screen size */ 
                                                    @media screen and (max-width: 1200px) {
                                                        .close-ticket-button-lg {
                                                            display:none;
                                                            float: right;
                                                        }

                                                        .close-ticket-button-sm {
                                                            display:inline-block;
                                                            float: right;
                                                        }
                                                    }
                                                </style>

                                                <span style="float:left"><a href="#" class="btn btn-outline-info btn-secondary" data-toggle="modal" data-target="#ticketPopup<?php echo $row['ticketID']; ?>" name="viewid<?php echo $row['ticketID']; ?>">View ticket</a></span>
                                                <span class="close-ticket-button-lg"><form method="post"><button class="btn btn-outline-secondary btn-secondary" name="closereopen<?php echo $row['ticketID']; ?>" onclick="return confirm('Are you sure you want to close <?php echo $row['ticketSubject'] ?>? You should only close a ticket when the issue has been resolved.')">Close ticket (issue resolved)</button></form></span>
                                                <span class="close-ticket-button-sm"><form method="post"><button class="btn btn-outline-secondary btn-secondary" name="closereopen<?php echo $row['ticketID']; ?>" onclick="return confirm('Are you sure you want to close <?php echo $row['ticketSubject'] ?>? You should only close a ticket when the issue has been resolved.')">Close ticket</button></form></span><?php
                                                
                                                //Close ticket button handling 
                                                close_open_ticket($row['ticketID'], $row['isActive']) ?>
                                            </div> 
                                        </div>
                                    </div>
                                    
                                    <!-- Modals for each card -->
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
                                                        query("INSERT INTO helpticketmessage (ticketID, studID, messageText, messageTime) VALUES('{$row['ticketID']}', '{$_SESSION["iduser"]}', '{$_POST['messageText' . $row['ticketID']]}', now())");
                                                        ?><script>alert("Your reply has been sent.");</script><?php
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
                                }
                            }

                            mysqli_close($connview); ?>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php 
} else if (isset($_SESSION["admin"])) { ?>
    <div class='alert alert-warning fade show text-center' role='alert'>
        <strong>Alert!</strong> Admin, You cannot create create user support tickets.
    </div><?php 
} else { ?>
    <div class='alert alert-warning fade show text-center' role='alert'>
        <strong>Alert!</strong> You must register/login to create and view your support tickets.
    </div><?php 
} ?>