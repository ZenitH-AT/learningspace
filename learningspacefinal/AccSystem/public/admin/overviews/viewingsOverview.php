
<div class="accordion" id="accordionExample">
    <div class="">
        <div class="row">
            <div class="col-lg-12">
                <a href="#" class="font-weight-bold" style="text-decoration: none;" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-secondary" ><i class="fa fa-eye"></i> Viewing Overviews</li>
                    </ol>
                </a>
            </div>
        </div>

        <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="row justify-content-between text-light" style="padding-left: 15px; padding-right: 8px; padding-bottom: 3px;">
                                <div class="col-xs-3">
                                    <i class="fa fa-user-alt fa-5x"></i>
                                </div>
                                <div class="col-xs-9">
                                    <div>All Viewings</div>
                                    <div class="text-center" style="font-size: 30px;"><?php echo countRecords("viewing"); ?></div>
                                </div>
                            </div>

                            <a href="?viewing">
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
                                    <div>Active Viewings</div>
                                    <div class="text-center" style="font-size: 30px;"><?php echo countRecords("viewing", "viewStatus", "1"); ?></div>
                                </div>
                            </div>

                            <a href="?viewing">
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
                                    <div>Inactive Viewings</div>
                                    <div class="text-center" style="font-size: 30px;"><?php echo countRecords("viewing", "viewStatus", "0"); ?></div>
                                </div>
                            </div>

                            <a href="?viewing">
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