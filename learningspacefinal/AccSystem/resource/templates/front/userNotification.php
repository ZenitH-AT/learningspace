<?php if (isset($_SESSION["iduser"])) { ?>
    <div class="container">
        <!-- Fix content appearing under navbar -->
        <div class=" col-sm-4 col-lg-4 col-md-4"></div><?php

        //Determining number of unread notifications
        $sqlunread = query("SELECT * FROM notification WHERE studID = " . $_SESSION["iduser"] . " AND status = 0 ORDER BY time DESC");
        confirm($sqlunread);

        $unreadcount = $sqlunread->num_rows; 

        if ($unreadcount == 0) { ?>
            <legend class="header col-md-10" style="margin-bottom: -2%">Unread notifications</legend><br />
            <a class="col-sm-6 col-md-6" style="text-muted">No new notifications</a><?php
        } else { ?>
            <legend class="header col-md-10" style="margin-bottom: -2%">Unread notifications (<?php echo $unreadcount ?>)</legend><br />
            <legend class="header col-md-10" style="margin-bottom: -0.5%"><form method="post"><button class="btn btn-outline-secondary formbutton" name="markread" onclick="return confirm('Are you sure you want to mark all notifications as read?')">Mark all as read</button></form></legend><?php
            
            //Mark all as read button handling
            if(isset($_POST['markread'])) {
                mark_read($_SESSION["iduser"]);
            }
        } ?>

        <div class="row"><?php
            //Generating notification cards
            while ($row = fetch_array($sqlunread)) { ?>
                <!-- notification card -->
                <div class="col-sm-6 col-md-6">
                    <div class="alert-message alert-message-<?php echo $row['type'] ?>">
                        <i class="<?php notification_icon($row['type']) ?> text-muted"></i>
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
            $sqlread = query("SELECT * FROM notification WHERE studID = " . $_SESSION["iduser"] . " AND status = 1 AND time BETWEEN now() - INTERVAL 30 DAY AND now() ORDER BY time DESC");
            confirm($sqlread);

            //Generating notification cards
            while ($row = fetch_array($sqlread)) { ?>
                <!-- notification card -->
                <div class="col-sm-6 col-md-6">
                    <div class="alert-message alert-message-<?php echo $row['type'] ?>">
                        <i class="<?php notification_icon($row['type']) ?> text-muted"></i>
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
