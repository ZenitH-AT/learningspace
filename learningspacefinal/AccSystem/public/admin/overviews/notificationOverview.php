
<div class="accordion" id="accordionExample">
    <div class="">
        <div class="row">
            <div class="col-lg-12">
                <a href="#" class="font-weight-bold" style="text-decoration: none;" data-toggle="collapse" data-target="#noteOverview" >
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-secondary" ><i class="fa fa-bell"></i> Notification Overviews</li>
                    </ol>
                </a>
            </div>
        </div>

        <div id="noteOverview" class="collapse hide">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="row justify-content-between text-light" style="padding-left: 15px; padding-right: 8px; padding-bottom: 3px;">
                                <div class="col-xs-3">
                                    <i class="fa fa-user-alt fa-5x"></i>
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
                                    <i class="fa fa-times fa-5x"></i>
                                </div>
                                <div class="col-xs-9">
                                    <div>Unread Notification</div>
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
    </div>
    <div class=" p-1"></div>
</div>