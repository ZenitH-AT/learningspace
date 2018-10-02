    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="page-header">Bookings</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <?php if(isset($_GET['student'])){ 
            if($_GET['student']=="deleted"){ ?>
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong>Success!</strong> A student record was removed.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></div>
            <?php }}?>
        
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb text-secondary ">
            <li class="breadcrumb-item text-secondary"><i class="fa fa-book-open"></i> Bookings</li>  
        </ol>
    </div>
</div>
<!--</nav>-->

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>  
                <th>Booking ID</th>
                <th>Room ID</th>
                <th>Student ID</th>
                <th>Start date</th>
                <th>End date</th>
                <th>Staying period<br />(days)</th>
                <th>Date scheduled</th>
                <th>Booking status</th>

                <th>Pending</th>
                <th>Edit</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php get_Bookings(); ?>
        </tbody>
    </table>
</div>
