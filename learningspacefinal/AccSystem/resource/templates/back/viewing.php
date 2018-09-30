     
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="page-header">Viewings</h1>
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
            <li class="breadcrumb-item text-secondary"><i class="fa fa-book-open"></i> Viewings</li>  
        </ol>
    </div>
</div>
<!--</nav>-->

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>  
                <th>ID</th>
                <th>viewer_Name</th>
                <th>viewer_Email</th>
                <th>viewer_Phone</th>
                <th>view_Date</th>
                <th>view_Status</th>
                <th>Room_Name</th>
                <th>Date</th>

                <th>Pending</th>
                <th>Edit</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php get_Viewings(); ?>
        </tbody>
    </table>
</div>
