<div class=" col-sm-4 col-lg-4 col-md-4"></div>

<div class="text-center">
    <?php bookingPage(); ?>
    <?php echo $viewsuccess; ?>
 
    
</div>

<div class="row mysignup">
    <div class="col-md-6">
        <div class="well well-sm">
            <form class="form-horizontal" method="post">
                <fieldset>
                    <legend class="header col-md-10">Book Viewing</legend>
                    <legend class="header col-md-10" style="font-size:90%; margin-top: 1%">Please, fill out this form and we will get back to you</legend>
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-1">
                            <input id="name" name="name" type="text" placeholder="Enter your name" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-1">
                            <input id="email" name="email" type="text" placeholder="Enter your email address" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-1">
                            <input id="phone" name="phone" type="text" placeholder="Enter your telephone number" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-1">
                            <text class="text-muted" style="margin-left: 1%">Choose preferred viewing date</text>
                            <input class="form-control col-md-5" type="datetime" name="date" id="bookviewings" placeholder="Select Date" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" name="bookview" class=" btn btn-outline-success formbutton">Book Viewing</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

    <div class="col-md-6">

        <?php if (isset($_SESSION["iduser"])) { ?>

            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="header col-md-10">Book a Room</legend>
                        <legend class="header col-md-10" style="font-size:90%; margin-top: 1%">Room no: <?php //echo $_GET['id'];    ?></legend>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <select class="combobox form-control">
                                    <option value="" selected="selected">Select room type</option>
                                    <option value="EFT">Economy</option>
                                    <option value="CC">Regular</option>
                                    <option value="XX">Deluxe</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <select class="combobox form-control">
                                    <option value="" selected="selected">Select room capacity</option>
                                    <option value="EFT">Small</option>
                                    <option value="CC">Medium</option>
                                    <option value="XX">Large</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <text class="text-muted" style="margin-left: 1%">Choose move in date</text>
                                <input class="form-control col-md-5" style="margin-top: .5%" required type="date">
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <a class="text-info">First payment date: </a>
                                <a class="text-secondary">please fill in all required fields</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <a class="text-info">First payment cost: </a>
                                <a class="text-secondary">please fill in all required fields</a>
                            </div>
                        </div>

                        
                        <div class="form-group" ng-app="CheckBox" ng-controller="CheckIt">
                            <div class="col-md-12">
                                 <p class="text-info">Accept Terms of Services <input type="checkbox" ng-model="chkValue"></p>
                                 <input type="button" value="submit" ng-disabled="!chkValue" >
                                <button type="submit" name="bookroom" ng-disabled="!chkValue" class=" btn btn-outline-success formbutton">Book room</button>
<!--                                <a class="btn btn-warning"><span class="fa fa-minus"></span></a>-->
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>

        <?php } else { ?>
            <div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                <strong>Alert!</strong> You Only Can Book For Viewing, Because You Are Not Logged In / Registered On the System.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <!--<span aria-hidden='true'>&times;</span>-->
                </button></div>
        <?php } ?>
    </div>
</div>
</div>

<!-- Booking - END -->