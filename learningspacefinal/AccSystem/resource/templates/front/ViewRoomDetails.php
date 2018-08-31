

<!-- Page Content -->
<div class="container">

    <?php
    $query = query("SELECT * FROM room WHERE room_id= " . escape_String($_GET['id']) . " ");
    confirm($query);

    while ($row = fetch_array($query)):
        ?>

        <!-- Portfolio Item Heading -->
        <h1 class="my-4"><?php echo $row['roomName']; ?>
            <small>Secondary Text</small>
        </h1>

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <img class="img-fluid" src="IMAGE/gallery/<?php echo $row['roomImage']; ?>" alt="" style="width: 99%; padding-top: 3%;">
            </div>

            <div class="col-md-4">
                <h3 class="my-3">Description</h3>
                <p><?php echo $row['roomDescription']; ?></p>
                <h3 class="my-3">Room Details</h3>
                <ul>
                    <li>Price: &#82;<?php echo $row['roomPrice']; ?></li>
                    <li>Category: </li>
                    <li>Bed: 1 </li>

                    <li>Status:  <?php
                        if ($row['roomReserved'] == 0) {
                            echo "<button type='button' class='btn btn-success btn-sm fa' disabled>Available</button>";
                        } else {
                            echo "<button type='button' class='btn btn-danger btn-sm fa' disabled>Unavailable</button>";
                        }
                        ?>
                    </li>
                </ul>
                <div class="my-3">
                        <div class="form-group">
                        <?php
                        if ($row['roomReserved'] == 0) { ?>
                            <a class="btn btn-outline-success"  href="booking.php?id=<?php echo $row['room_id'] ?>">Book Now</a>
                        <?php } ?>

                        </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>

    <!-- /.row -->
    <hr class="featurette-divider">

    <!-- Related Projects Row -->
    <h3 class="my-4">Related Rooms</h3>

    <div class="row">
        <?php
        $query1 = query("SELECT * FROM room WHERE room_id !=" . escape_String($_GET['id']) . "  ORDER BY RAND() LIMIT 4");
        confirm($query1);
        while ($row1 = fetch_array($query1)){
            $related = <<<DELIMETER
            <div class="col-md-3 col-sm-6 mb-4">
                <a href="viewRoom.php?id={$row1['room_id']}">
                    <img class="img-fluid" src="IMAGE/gallery/{$row1['roomImage']}" style="height: 10rem;" alt="">
                </a>
            </div>
DELIMETER;
            echo $related;
        }
            ?>     
    </div>
    <!-- /.row -->

</div>