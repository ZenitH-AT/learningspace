<!-- notifications dropdown start -->
<li class="nav-item dropdown" style="list-style-type:none;">
    <a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-bell" style="text-shadow: 0px 0px 15px #ffff00;"></i><?php
        
        //Determining number of unread notifications
        $sqlunreaddropdown = query("SELECT * FROM notification WHERE studID = " . $_SESSION["iduser"] . " AND status = 0 ORDER BY time DESC");
        confirm($sqlunreaddropdown);

        $unreadcount = $sqlunreaddropdown->num_rows; 

        if($unreadcount > 0) { ?>
            <span class="badge badge-pill badge-danger"><?php echo $unreadcount ?></span><?php
        } ?>
    </a>
    <ul class="dropdown-menu">
        <li class="head text-light bg-dark">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <span>Notifications</span> <?php echo '(' .  $unreadcount . ')'; ?>
                </div>
            </div>
        </li><?php

        //Generating notification cards
        if($unreadcount > 0) {
            while ($row = fetch_array($sqlunreaddropdown)) { ?>
                <li class="notification-box alert-message-<?php echo $row['type'] ?>">
                    <div class="row">
                        <div class="col-lg-1 col-sm-1 col-1 text-center"></div>
                        <div class="col-lg-10 col-sm-10 col-10">
                            <strong class="text-dark"><?php echo $row['title'] ?></strong>
                            <div style="white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                                <?php echo $row['body'] ?>
                            </div>
                            <small class="text-muted"><?php echo $row['time'] ?></small>
                        </div>
                    </div>
                </li><?php
            } 
        } else { ?>
            <div class='notification-box alert-secondary text-center'>
                <strong>All caught up!</strong>
            </div><?php 
        } ?>

        <li class="footer bg-dark text-center">
            <a href="userNotification.php" class="text-light">View All</a>
        </li>
    </ul>
</li>
<!-- notifications dropdown end -->
