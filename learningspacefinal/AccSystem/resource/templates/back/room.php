<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Rooms</h1>
</div>

<h5>Add new room</h5><br />
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="roomName" name="roomName" placeholder="Name" required>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="roomType" name="roomType" placeholder="Type" required>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="roomPrice" name="roomPrice" placeholder="Price (R)" required>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="roomCapacity" name="roomCapacity" placeholder="Capacity" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <textarea class="form-control" id="longDescription" name="longDescription" placeholder="Long description" rows="7" required></textarea>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="shortDescription" name="shortDescription" placeholder="Short description" required><br />

                        Room image<br/>
                        <input type="file" name="newRoomImage" accept="image/*" required>

                        <button type="submit" class="btn btn-outline-success formbutton" style="right:0; position:absolute; bottom:0;" name="addRoom" onclick="return confirm('Are you sure you want to add a new room?')">Add room</button><?php

                        //Send button handling
                        if (isset($_POST['addRoom'])) {
                            //Set image name and upload file
                            $roomImageName = $_FILES['newRoomImage']['name'];
                            $roomTempName = $_FILES['newRoomImage']['tmp_name'];
                            move_uploaded_file($roomTempName, "../IMAGE/gallery/$roomImageName");

                            query("INSERT INTO room (roomName, roomPrice, roomType, roomCapacity, roomReserved, roomImage, roomDescription, roomShortDescription)
                                   VALUES('{$_POST['roomName']}', '{$_POST['roomPrice']}', '{$_POST['roomType']}', '{$_POST['roomCapacity']}', 
                                          0, '{$roomImageName}', '{$_POST['longDescription']}', '{$_POST['shortDescription']}')");

                            ?><script>alert("Room added.");</script><?php

                            header("Refresh:0");
                            exit();
                        } ?>
                    </div>
                </div>
            </form>
        </div>
    </div><br/>
</div>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb text-secondary ">
            <li class="breadcrumb-item text-secondary"><i class="fa fa-home"></i> Rooms</li> 
        </ol>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr style="text-align:center">
                <th>Room ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Type</th>
                <th>Price</th>
                <th>Capacity</th>
                <th>Reserved</th>
                <th>Short description</th>
                <th>Long description</th>

                <th>Edit</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php get_Rooms(); ?>
        </tbody>
    </table>
    
</div>
