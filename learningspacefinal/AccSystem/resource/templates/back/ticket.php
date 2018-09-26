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
                <th>Subject</th>
                <th>Category</th>
                <th>Date created</th>

                <th>View conversation</th>
                <th>Close ticket</th>
            </tr>
        </thead>
        <tbody> <?php
            $query = query("SELECT * FROM helpticket WHERE isActive = 1 ORDER BY ticketID DESC");
            confirm($query);

            while ($row = fetch_array($query)) { ?>
                <tr>
                    <td><?php echo $row['ticketID'] ?></td>
                    <td><?php echo $row['studID'] ?></td>
                    <td><?php echo $row['ticketSubject'] ?></td>
                    <td><?php echo $row['ticketCategory'] ?></td> 
                    <td><?php echo $row['ticketTime'] ?></td>

                    <td><button type="button" class="btn btn-success formbutton" data-toggle="modal" data-target="#openTicketModal<?php echo $row['ticketID']; ?>"><span class="fa fa-comments" style="color:white"></button></form></td>
                    <td><form method="POST"><button class="btn btn-danger formbutton" name="closereopen<?php echo $row['ticketID']; ?>" onclick="return confirm('Are you sure you want to close <?php echo $row['ticketSubject'] ?>?')"><span class="fa fa-times" style="color:white"></button></form></td>
                </tr> 
                <?php
                //Close/reopen button handling
                close_open_ticket($row['ticketID']);
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
            $query = query("SELECT * FROM helpticket WHERE isActive = 0 ORDER BY ticketID DESC");
            confirm($query);

            while ($row = fetch_array($query)) { ?>
                <tr>
                    <td><?php echo $row['ticketID'] ?></td>
                    <td><?php echo $row['studID'] ?></td>
                    <td><?php echo $row['ticketSubject'] ?></td>
                    <td><?php echo $row['ticketCategory'] ?></td> 
                    <td><?php echo $row['ticketTime'] ?></td>

                    <td><button type="button" class="btn btn-success formbutton" data-toggle="modal" data-target="#closedTicketModal<?php echo $row['ticketID']; ?>"><span class="fa fa-comments" style="color:white"></button></form></td>
                    <td><form method="POST"><button class="btn btn-info formbutton" name="closereopen<?php echo $row['ticketID']; ?>" onclick="return confirm('Are you sure you want to reopen <?php echo $row['ticketSubject'] ?>?')"><span class="fa fa-arrow-up" style="color:white"></button></form></td>
                </tr> 
                <?php 
                //Close/reopen button handling
                close_open_ticket($row['ticketID']);
            } ?>
        </tbody>
    </table>
</div>


