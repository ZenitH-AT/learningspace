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
                <a class="nav-link" href="?student">
                    <span data-feather="users"></span>
                    Students
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?viewing">
                    <span data-feather="eye"></span>
                    Viewings
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?booking">
                    <span data-feather="book-open"></span>
                    Bookings
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
                        $queryTicket = query("SELECT * FROM helpticket WHERE isActive = 1");
                        confirm($queryTicket);
                        $numTickets = countItem($queryTicket);
                    ?>

                    <span data-feather="life-buoy"></span>
                    Tickets <?php if($numTickets > 0) echo '- <span class="text-danger">' . $numTickets; ?></span>
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

                    <?php
                        //To display refund request count 
                        $queryRefund = query("SELECT * FROM refund");
                        confirm($queryRefund);
                        $numRequests = countItem($queryRefund);
                    ?>

                    <span data-feather="alert-circle"></span>
                    Refund Requests <?php if($numRequests > 0) echo '- <span class="text-danger">' . $numRequests; ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link sie" href="dashboard.php?admins">
                    <span data-feather="users"></span>
                    Administrators
                </a>
            </li>
        </ul>
    </div>
</nav>


