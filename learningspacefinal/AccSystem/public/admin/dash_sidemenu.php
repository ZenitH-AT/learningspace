<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky" id="side">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php?student">
                    <span data-feather="users"></span>
                    Students
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?booking">
                    <span data-feather="book-open"></span>
                    Bookings
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?viewing">
                    <span data-feather="eye"></span>
                    Viewings
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?room">
                    <span data-feather="home"></span>
                    Rooms
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?notification">
                    <span data-feather="bell"></span>
                    Notifications
                </a>
            </li>
            <li class="nav-item">
<a class="nav-link" href="?ticket">
                    <?php
                        //To display open ticket count 
                        $query = query("SELECT * FROM helpticket WHERE isActive = 1");
                        confirm($query); 
                    ?>
<span data-feather="life-buoy"></span>
Tickets - <span class="text-danger"><?php echo countItem($query); ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?livechat">
                    <span data-feather="message-circle"></span>
                    Live Chat
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?payment">
                    <span data-feather="credit-card"></span>
                    Payments
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?refund">
                    <span data-feather="alert-circle"></span>
                    Refund Requests
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link sie" href="dashboard.php?admins">
                    <span data-feather="users"></span>
                    Administrators
                </a>
            </li>
        </ul>

<!--        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="d-flex align-items-center text-muted" href="#">
            </a>
        </h6>
        
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Current month
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Last quarter
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Social engagement
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Year-end sale
                </a>
            </li>
        </ul>
        -->
    </div>
</nav>


