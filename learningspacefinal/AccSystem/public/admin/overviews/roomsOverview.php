
<div id="roomOverview" class="collapse hide" aria-labelledby="headingbooking" data-parent="#accordionALL">
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-header bg-info">
                    <div class="row justify-content-between text-light" style="padding-left: 15px; padding-right: 8px; padding-bottom: 3px;">
                        <div class="col-xs-3">
                            <i class="fa fa-home fa-5x"></i>
                        </div>
                        <div class="col-xs-9">
                            <div>All Registered Rooms</div>
                            <div class="text-center" style="font-size: 30px;"><?php echo countRecords("room"); ?></div>
                        </div>
                    </div>

                    <a href="?room">
                        <div class="card-footer bg-light">
                            <span class="float-left">View Details</span>
                            <span class="float-right"><i class="fa fa-arrow-alt-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-header bg-success">
                    <div class="row justify-content-between text-light" style="padding-left: 15px; padding-right: 8px; padding-bottom: 3px;">
                        <div class="col-xs-3">
                            <i class="fa fa-check fa-5x"></i>
                        </div>
                        <div class="col-xs-9">
                            <div>Available Rooms</div>
                            <div class="text-center" style="font-size: 30px;"><?php echo countRecords("room", "roomReserved", "0"); ?></div>
                        </div>
                    </div>

                    <a href="?room">
                        <div class="card-footer bg-light">
                            <span class="float-left">View Details</span>
                            <span class="float-right"><i class="fa fa-arrow-alt-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-header bg-danger">
                    <div class="row justify-content-between text-light" style="padding-left: 15px; padding-right: 8px; padding-bottom: 3px;">
                        <div class="col-xs-3">
                            <i class="fa fa-times fa-5x"></i>
                        </div>
                        <div class="col-xs-9">
                            <div>Occupied Rooms</div>
                            <div class="text-center" style="font-size: 30px;"><?php echo countRecords("room", "roomReserved", "1"); ?></div>
                        </div>
                    </div>

                    <a href="?room">
                        <div class="card-footer bg-light">
                            <span class="float-left">View Details</span>
                            <span class="float-right"><i class="fa fa-arrow-alt-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>