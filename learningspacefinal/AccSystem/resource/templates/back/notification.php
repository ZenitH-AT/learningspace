<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Notifications</h1>
</div>

<h5>Create notification</h5><br />
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <form method="post">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                    </div>
                    <div class="col-sm-6">
                        <select class="combobox form-control text-muted" id="type" name="type" required>
                            <option value="default" selected="selected">Select type (colour)</option>
                            <option value="default">Default</option>
                            <option value="info" class="text-info">Info</option>
                            <option value="success" class="text-success">Success</option>
                            <option value="warning" class="text-warning">Warning</option>
                            <option value="danger" class="text-danger">Danger</option>
                            <option value="notice" class="bg-warning text-dark">Notice</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <textarea class="form-control" id="body" name="body" placeholder="Message" rows="7" required></textarea>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="recipients" name="recipients" placeholder="Recipient ID(s)" required><br />
                        <label class="form-text text-muted">Separate multiple student IDs with a comma.<br/>Type * to send to all students.</label>
                        
                        <button type="submit" class="btn btn-outline-success formbutton" style="right:0; position:absolute; bottom:0;" name="send" onclick="return confirm('Are you sure you want to send this notification?')">Send notification</button><?php

                        //Send button handling
                        if (isset($_POST['send'])) {
                            $title = escape_String($_POST['title']);
                            $body = escape_String($_POST['body']);
                            $type = escape_String($_POST['type']);
                            $inputids = escape_String($_POST['recipients']);

                            send_notification($title, $body, $type, $inputids);
                        } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<br /><h5>Sent notifications</h5>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>  
                <th>Notification ID</th>
                <th>Student ID (recipient)</th>
                <th>Student name</th>
                <th>Title</th>
                <th>Message</th>
                <th>Type</th>
                <th>Date sent</th>
                <th>Status</th><?php

                if($_SESSION['adminCategory'] == 1) { ?>
                    <th>Delete</th><?php
                } ?>
            </tr>
        </thead>
        <tbody> <?php
            $query = query("SELECT * FROM notification ORDER BY time DESC");
            confirm($query);

            while ($row = fetch_array($query)) { 
                //Setting notification type colour
                $typeclass ='';

                if($row['type'] == 'info') {
                    $typeclass = 'class="text-info"';
                } else if ($row['type'] == 'success') {
                    $typeclass = 'class="text-success"';
                } else if ($row['type'] == 'warning') {
                    $typeclass = 'class="text-warning"';
                } else if ($row['type'] == 'danger') {
                    $typeclass = 'class="text-danger"';
                } else if ($row['type'] == 'notice') {
                    $typeclass = 'class="bg-warning text-dark"';
                } 

                //Getting student name
                $sqlStudentName = query("SELECT studFirstName, studLastName FROM student WHERE studID = " . $row['studID']);
                $studentName = mysqli_fetch_assoc($sqlStudentName); ?>

                <tr>
                    <td><?php echo $row['notificationID'] ?></td>
                    <td><?php echo $row['studID'] ?></td>
                    <td><?php echo $studentName['studFirstName'] . " "  . $studentName['studLastName']; ?></td>
                    <td><?php echo $row['title'] ?></td>
                    <td><a class="btn btn-outline-dark" data-toggle="modal" data-target="#bodyPopup<?php echo $row['notificationID']; ?>"><span class="far fa-file-alt" style="color:black"></span></a></td>
                    <td><?php echo '<text ' . $typeclass . '>' . $row['type'] . '</text>' ?></td>
                    <td><?php echo $row['time'] ?></td>
                    <td><?php echo $row['status'] == 1 ? '<text class="text-info">read</text>' : 'unread' ?></td><?php

                    //Show delete button if the logged in admin is an owner
                    if($_SESSION['adminCategory'] == 1) { ?>
                        <td><form method="post"><button class="btn btn-danger formbutton" name="delete<?php echo $row['notificationID']; ?>" onclick="return confirm('Are you sure you want to delete <?php echo $row['title'] ?>?')"><span class="fa fa-times" style="color:white"></button></form></td><?php
                    } ?>
                </tr>
                
                <!-- Notification body modal -->
                <div class="modal fade" id="bodyPopup<?php echo $row['notificationID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                        <div class="modal-content">  
                            <div class="modal-header">
                                <h5><?php echo $row['title']?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                            </div> 
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">  
                                            <div class="col-sm-12">
                                                <a><?php echo $row['body']; ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div><?php

                //Delete button handling
                if (isset($_POST['delete' . $row['notificationID']])) {                  
                    query("DELETE FROM notification WHERE notificationID = " . $row['notificationID']); ?>

                    <script>
                        alert("Notification deleted.");
                        window.location.href = window.location.href;
                    </script><?php

                    exit();
                } 
            } ?>
        </tbody>
        <thead>
    </table>
</div>
