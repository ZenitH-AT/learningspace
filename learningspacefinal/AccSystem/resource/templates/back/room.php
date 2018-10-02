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
            <tr>
                <th>Room ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Type</th>
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
