<script type="text/javascript">
    google.charts.load('current', {'packages': ['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['', 'Total Users', 'Inactive Users' , 'Active Users'],
            <?php
                $total = countRecords("student", "CONCAT(YEAR(data))", "2017");
                $active = countRecords("student", "CONCAT(YEAR(data))", "2017", "isActive", "1");
                $inactive = countRecords("student", "CONCAT(YEAR(data))", "2017", "isActive", "0");
                echo "['2017', $total, $inactive, $active],";
            ?>
            <?php
                $total = countRecords("student", "CONCAT(YEAR(data))", "2018");
                $active = countRecords("student", "CONCAT(YEAR(data))", "2018", "isActive", "1");
                $inactive = countRecords("student", "CONCAT(YEAR(data))", "2018", "isActive", "0");
                echo "['2018', $total, $inactive, $active]";
            ?>

        ]);

        var options = {
            chart: {
                title: 'User Statistics',
                subtitle: 'Data acquired from: 2017-2018',
            }
        };

        var chart = new google.charts.Bar(document.getElementById('studentchart'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>

<script type="text/javascript">
    google.charts.load('current', {'packages': ['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['', 'Total Bookings', 'Inactive Bookings' , 'Active Bookings'],
            <?php
                $total = countRecords("booking", "CONCAT(YEAR(bookingDate))", "2017");
                $active = countRecords("booking", "CONCAT(YEAR(bookingDate))", "2017", "bookingStatus", "1");
                $inactive = countRecords("booking", "CONCAT(YEAR(bookingDate))", "2017", "bookingStatus", "0");
                echo "['2017', $total, $inactive, $active],";
            ?>
            <?php
                $total = countRecords("booking", "CONCAT(YEAR(bookingDate))", "2018");
                $active = countRecords("booking", "CONCAT(YEAR(bookingDate))", "2018", "bookingStatus", "1");
                $inactive = countRecords("booking", "CONCAT(YEAR(bookingDate))", "2018", "bookingStatus", "0");
                echo "['2018', $total, $inactive, $active]";
            ?>

        ]);

        var options = {
            chart: {
                title: 'Booking Statistics',
                subtitle: 'Data acquired from: 2017-2018',
            }
        };

        var chart = new google.charts.Bar(document.getElementById('bookchart'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>

<script type="text/javascript">
    google.charts.load('current', {'packages': ['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['', 'Total Viewings', 'Inactive Viewings' , 'Active Viewings'],
            <?php
                $total = countRecords("viewing", "CONCAT(YEAR(scheduledDate))", "2018");
                $active = countRecords("viewing", "CONCAT(YEAR(scheduledDate))", "2018", "viewStatus", "1");
                $inactive = countRecords("viewing", "CONCAT(YEAR(scheduledDate))", "2018", "viewStatus", "0");
                echo "['2018', $total, $inactive, $active]";
            ?>

        ]);

        var options = {
            chart: {
                title: 'Viewing Statistics',
                subtitle: 'Data acquired in: 2018',
            }
        };

        var chart = new google.charts.Bar(document.getElementById('viewchart'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>

<script type="text/javascript">
    google.charts.load('current', {'packages': ['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['', 'Total Notifications', 'Inactive Notifications' , 'Active Notifications'],
            <?php
                $total = countRecords("notification", "CONCAT(YEAR(time))", "2017");
                $active = countRecords("notification", "CONCAT(YEAR(time))", "2017", "status", "1");
                $inactive = countRecords("notification", "CONCAT(YEAR(time))", "2017", "status", "0");
                echo "['2017', $total, $inactive, $active],";
            ?>
            <?php
                $total = countRecords("notification", "CONCAT(YEAR(time))", "2018");
                $active = countRecords("notification", "CONCAT(YEAR(time))", "2018", "status", "1");
                $inactive = countRecords("notification", "CONCAT(YEAR(time))", "2018", "status", "0");
                echo "['2018', $total, $inactive, $active]";
            ?>

        ]);

        var options = {
            chart: {
                title: 'Notification Statistics',
                subtitle: 'Data acquired from: 2017-2018',
            }
        };

        var chart = new google.charts.Bar(document.getElementById('notechart'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>

<script type="text/javascript">
    google.charts.load('current', {'packages': ['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['', 'Total tickets', 'Inactive tickets' , 'Active tickets'],
            <?php
                $total = countRecords("helpticket", "CONCAT(YEAR(ticketTime))", "2017");
                $active = countRecords("helpticket", "CONCAT(YEAR(ticketTime))", "2017", "isActive", "1");
                $inactive = countRecords("helpticket", "CONCAT(YEAR(ticketTime))", "2017", "isActive", "0");
                echo "['2017', $total, $inactive, $active],";
            ?>
            <?php
                $total = countRecords("helpticket", "CONCAT(YEAR(ticketTime))", "2018");
                $active = countRecords("helpticket", "CONCAT(YEAR(ticketTime))", "2018", "isActive", "1");
                $inactive = countRecords("helpticket", "CONCAT(YEAR(ticketTime))", "2018", "isActive", "0");
                echo "['2018', $total, $inactive, $active]";
            ?>

        ]);

        var options = {
            chart: {
                title: 'Support Ticket Statistics',
                subtitle: 'Data acquired from: 2017-2018',
            }
        };

        var chart = new google.charts.Bar(document.getElementById('ticketchart'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>


<script type="text/javascript">
    google.charts.load('current', {'packages': ['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['', 'Total Payments', 'Old Payments' , 'Current Payments'],
            <?php
                $total = countRecords("payment", "CONCAT(YEAR(paymentDate))", "2017");
                $active = countRecords("payment", "CONCAT(YEAR(paymentDate))", "2017", "paymentStatus", "1");
                $inactive = countRecords("payment", "CONCAT(YEAR(paymentDate))", "2017", "paymentStatus", "0");
                echo "['2017', $total, $inactive, $active],";
            ?>
            <?php
                $total = countRecords("payment", "CONCAT(YEAR(paymentDate))", "2018");
                $active = countRecords("payment", "CONCAT(YEAR(paymentDate))", "2018", "paymentStatus", "1");
                $inactive = countRecords("payment", "CONCAT(YEAR(paymentDate))", "2018", "paymentStatus", "0");
                echo "['2018', $total, $inactive, $active]";
            ?>

        ]);

        var options = {
            chart: {
                title: 'Payment Statistics',
                subtitle: 'Data acquired from: 2017-2018',
            }
        };

        var chart = new google.charts.Bar(document.getElementById('paychart'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>