<?php if (isset($_SESSION["iduser"])) { ?>
    <div class="container">
        <!-- Fix content appearing under navbar -->
        <div class=" col-sm-4 col-lg-4 col-md-4"></div>

        <legend class="header col-md-10" style="margin-bottom: -2%">Unread notifications</legend><br /><?php

        //Determining number of notifications
        $query = query("SELECT * FROM notification WHERE studID = " . $_SESSION["iduser"] . " AND status = 0 ORDER BY time DESC");
        confirm($query);

        $row_count = $query->num_rows;
        
        if ($row_count == 0) { ?>
            <a class="col-sm-6 col-md-6" style="text-muted">No new notifications</a><?php
        } else { ?>
            <legend class="header col-md-10" style="margin-bottom: -0.5%"><form method="post"><button class="btn btn-outline-secondary formbutton" name="markread" onclick="return confirm('Are you sure you want to mark all notifications as read?')">Mark all as read</button></form></legend><?php
            
            //Mark all as read button handling
            if(isset($_POST['markread'])) {
                query("UPDATE notification SET status = 1 WHERE studID = " . $_SESSION["iduser"]);
    
                header("Refresh:0");
                exit();
            }
        } ?>

        <div class="row"><?php
            //Generating notification cards
            while ($row = fetch_array($query)) { 
                //Determining which icon to use based on notification type
                $iconclass;  

                if ($row['type'] == 'default') {
                    $iconclass = 'fas fa-comment-dots';
                } else if ($row['type'] == 'info') {
                    $iconclass = 'fas fa-info-circle';
                } else if ($row['type'] == 'success') {
                    $iconclass = 'fas fa-check-circle';
                } else if ($row['type'] == 'warning') {
                    $iconclass = 'fas fa-exclamation-triangle';
                } else if ($row['type'] == 'danger') {
                    $iconclass = 'fas fa-times-circle';
                } else if ($row['type'] == 'notice') {
                    $iconclass = 'fas fa-flag';
                } ?>

                <!-- notification card -->
                <div class="col-sm-6 col-md-6">
                    <div class="alert-message alert-message-<?php echo $row['type'] ?>">
                        <i class="<?php echo $iconclass ?> text-muted"></i>
                        <a class="text-muted"><?php echo $row['time'] ?></a>
                        <h4><?php echo $row['title'] ?></h4> 
                        <p><?php echo $row['body'] ?></p>
                    </div>
                </div><?php
            } ?>
        </div>

        <br /><legend class="header col-md-10" style="margin-bottom: -1%">Read notifications (last 30 days)</legend>

        <div class="row"><?php
            //Only returns notifications from the last 30 days in order to not flood the user with too much information
            $query = query("SELECT * FROM notification WHERE studID = " . $_SESSION["iduser"] . " AND status = 1 AND time BETWEEN now() - INTERVAL 30 DAY AND now() ORDER BY time DESC");
            confirm($query);
    
            $row_count = $query->num_rows;

            //Generating notification cards
            while ($row = fetch_array($query)) { 
                //Determining which icon to use based on notification type
                $iconclass;  

                if ($row['type'] == 'default') {
                    $iconclass = 'fas fa-comment-dots';
                } else if ($row['type'] == 'info') {
                    $iconclass = 'fas fa-info-circle';
                } else if ($row['type'] == 'success') {
                    $iconclass = 'fas fa-check-circle';
                } else if ($row['type'] == 'warning') {
                    $iconclass = 'fas fa-exclamation-triangle';
                } else if ($row['type'] == 'danger') {
                    $iconclass = 'fas fa-times-circle';
                } else if ($row['type'] == 'notice') {
                    $iconclass = 'fas fa-flag';
                } ?>

                <!-- notification card -->
                <div class="col-sm-6 col-md-6">
                    <div class="alert-message alert-message-<?php echo $row['type'] ?>">
                        <i class="<?php echo $iconclass ?> text-muted"></i>
                        <a class="text-muted"><?php echo $row['time'] ?></a>
                        <h4><?php echo $row['title'] ?></h4> 
                        <p><?php echo $row['body'] ?></p>
                    </div>
                </div><?php
            } ?>    
        </div>
    </div>
<?php 
} else if (isset($_SESSION["admin"])) { ?>
    <div class='alert alert-warning fade show text-center' role='alert'>
        <strong>Alert!</strong> Admin, You cannot view user notifications here.
    </div><?php 
} else { ?>
    <div class='alert alert-warning fade show text-center' role='alert'>
        <strong>Alert!</strong> You must register/login to create and view your notifications.
    </div><?php 
} ?>
