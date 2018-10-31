<div id="accordionALL">
    <div class="row">
        <div class="col-lg-3" id="headingStudent">
            <a href="#" class="font-weight-bold" style="text-decoration: none;" data-toggle="collapse" data-target="#collapseStudent">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-secondary" ><i class="fa fa-user-graduate"></i> Student Overviews</li>
                </ol>
            </a>
        </div>
        <div class="col-lg-3" id="headingViewing">
            <a href="#" class="font-weight-bold" style="text-decoration: none;" data-toggle="collapse" data-target="#collapseViewing">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-secondary" ><i class="fa fa-eye"></i> Viewing Overviews</li>
                </ol>
            </a>
        </div>
        <div class="col-lg-3">
            <a href="#" class="font-weight-bold" style="text-decoration: none;" data-toggle="collapse" data-target="#collapsebooking" >
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-secondary" ><i class="fa fa-book-open"></i> Booking Overviews</li>
                </ol>
            </a>
        </div>
        <div class="col-lg-3">
            <a href="#" class="font-weight-bold" style="text-decoration: none;" data-toggle="collapse" data-target="#roomOverview" >
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-secondary" ><i class="fa fa-home"></i> Room Overviews</li>
                </ol>
            </a>
        </div>
    </div>
    
    <div class="row">
    <div class="col-lg-3" id="headingNote">
        <a href="#" class="font-weight-bold" style="text-decoration: none;" data-toggle="collapse" data-target="#noteOverview" >
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-secondary" ><i class="fa fa-bell"></i> Notification Overviews</li>
            </ol>
        </a>
    </div>
    <div class="col-lg-3" id="headingticket">
        <a href="#" class="font-weight-bold" style="text-decoration: none;" data-toggle="collapse" data-target="#ticketOverview" >
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-secondary" ><i class="fa fa-life-ring"></i> Ticket Overviews</li>
            </ol>
        </a>
    </div>
    <div class="col-lg-3">
        <a href="#" class="font-weight-bold" style="text-decoration: none;" data-toggle="collapse" data-target="#adminOverview" >
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-secondary" ><i class="fa fa-users-cog"></i> Administrator Overviews</li>
            </ol>
        </a>
    </div>
    <div class="col-lg-3">
        <a href="#" class="font-weight-bold" style="text-decoration: none;" data-toggle="collapse" data-target="#graphOverview" >
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-secondary" ><i class="fa fa-chart-bar"></i> Graph Overviews</li>
            </ol>
        </a>
    </div>
</div>
    <hr class="featurette-divider">
    <!--Start-->
    <?php require_once './overviews/studentOverview.php'; ?>
    <!--End-->
    <!--Start-->
    <?php require_once './overviews/viewingsOverview.php'; ?>
    <!--end-->
    <!--Start-->
    <?php require_once './overviews/bookingsOverview.php'; ?>
    <!--End-->
    <!--Start-->
    <?php require_once './overviews/roomsOverview.php'; ?>
    <!--End-->
    <!--Start-->
    <?php require_once './overviews/notificationOverview.php'; ?>
    <!--End-->
    <!--Start-->
    <?php require_once './overviews/ticketOverview.php'; ?>
    <!--End-->
    <!--Start-->
    <?php require_once './overviews/adminOverview.php'; ?>
    <!--End-->
    <!--Start-->
    <?php require_once './overviews/graphsOverview.php'; ?>
    <!--End-->

</div>