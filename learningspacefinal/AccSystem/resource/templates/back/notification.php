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
                        
                        <button type="submit" class="btn btn-outline-success formbutton" style="right:0; position:absolute; bottom:0;" name="send">Send notification</button><?php

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
                <th>Title</th>
                <th>Message</th>
                <th>Type</th>
                <th>Date sent</th>
                <th>Status</th>

                <th>Delete</th>
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
                } ?>

                <tr>
                    <td><?php echo $row['notificationID'] ?></td>
                    <td><?php echo $row['studID'] ?></td>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['body'] ?></td> 
                    <td><?php echo '<text ' . $typeclass . '>' . $row['type'] . '</text>' ?></td>
                    <td><?php echo $row['time'] ?></td>
                    <td><?php echo $row['status'] == 1 ? '<text class="text-info">read</text>' : 'unread' ?></td>

                    <td><form method="post"><button class="btn btn-danger formbutton" name="delete<?php echo $row['notificationID']; ?>" onclick="return confirm('Are you sure you want to delete <?php echo $row['title'] ?>?')"><span class="fa fa-times" style="color:white"></button></form></td>
                </tr><?php

                //Delete button handling
                if (isset($_POST['delete' . $row['notificationID']])) {                  
                    query("DELETE FROM notification WHERE notificationID = " . $row['notificationID']);
            
                    header("Refresh:0");
                    exit();
                } 
            } ?>
        </tbody>
        <thead>
    </table>
</div>
