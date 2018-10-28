
    <div id="collapseStudent" class="collapse hide" aria-labelledby="headingStudent" data-parent="#accordionALL">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="row justify-content-between text-light" style="padding-left: 15px; padding-right: 8px; padding-bottom: 3px;">
                            <div class="col-xs-3">
                                <i class="fa fa-user-graduate fa-5x"></i>
                            </div>
                            <div class="col-xs-9">
                                <div>All Users</div>
                                <div class="text-center text-lg" style="font-size: 30px;"><?php echo countRecords("student"); ?></div>
                            </div>
                        </div>

                        <a href="?student">
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
                                <i class="fa fa-user-check fa-5x"></i>
                            </div>
                            <div class="col-xs-9">
                                <div>Active Users</div>
                                <div class="text-center" style="font-size: 30px;"><?php echo countRecords("student", "isActive", "1"); ?></div>
                            </div>
                        </div>

                        <a href="?student">
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
                                <i class="fa fa-user-times fa-5x"></i>
                            </div>
                            <div class="col-xs-9">
                                <div>Inactive Users</div>
                                <div class="text-center" style="font-size: 30px;"><?php echo countRecords("student", "isActive", "0"); ?></div>
                            </div>
                        </div>

                        <a href="?student">
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