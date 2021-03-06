
<div id="noteOverview" class="collapse hide" aria-labelledby="headingNote" data-parent="#accordionALL">
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-header bg-info">
                    <div class="row justify-content-between text-light" style="padding-left: 15px; padding-right: 8px; padding-bottom: 3px;">
                        <div class="col-xs-3">
                            <i class="fa fa-bell fa-5x"></i>
                        </div>
                        <div class="col-xs-9">
                            <div>All Notifications</div>
                            <div class="text-center" style="font-size: 30px;"><?php echo countRecords("notification"); ?></div>
                        </div>
                    </div>

                    <a href="?notification">
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
                            <div>Read Notifications</div>
                            <div class="text-center" style="font-size: 30px;"><?php echo countRecords("notification", "status", "1"); ?></div>
                        </div>
                    </div>

                    <a href="?notification">
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
                            <i class="fa fa-bell-slash fa-5x"></i>
                        </div>
                        <div class="col-xs-9">
                            <div>Unread Notifications</div>
                            <div class="text-center" style="font-size: 30px;"><?php echo countRecords("notification", "status", "0"); ?></div>
                        </div>
                    </div>

                    <a href="?notification">
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