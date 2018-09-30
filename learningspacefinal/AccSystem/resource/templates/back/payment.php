<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Payments</h1>
</div>

<h5>Payment records</h5>
<div class="table-responsive">
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Card No</th>
                    <th>Card month</th>
                    <th>Card year</th>
                    <th>Payment amount</th>
                    <th>Payment month</th>
                    <th>Student ID</th>
                    <th>Room ID</th>
                    <th>Payment status</th>
                    <th>Payment date</th>
                </tr>
            </thead>
            <tbody> <?php
                $query = query("SELECT * FROM payment ORDER BY payID DESC");
                confirm($query);
    
                while ($row = fetch_array($query)) { ?>
                    <tr>
                        <td><?php echo $row['payID'] ?></td>
                        <td><?php echo $row['cardNumber'] ?></td>
                        <td><?php echo $row['cardMonth'] ?></td>
                        <td><?php echo $row['cardYear'] ?></td> 
                        <td><?php echo 'R' . $row['payAmount'] ?></td>
                        <td><?php echo $row['payMonth'] ?></td>
                        <td><?php echo $row['studID'] ?></td>
                        <td><?php echo $row['roomID'] ?></td>
                        <td><?php echo ($row['paymentStatus'] == 1 ? '<text class="text-success">paid</text>' : '<text class="text-danger">unpaid</text>') ?></td>
                        <td><?php echo $row['paymentDate'] ?></td>
                    </tr> <?php
                } ?>
            </tbody>
        </table>
    </div>
