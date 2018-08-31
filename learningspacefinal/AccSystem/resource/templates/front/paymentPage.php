<div class="container">

    <div class=" col-sm-4 col-lg-4 col-md-4"></div>

    <div class="row mysignup">

        <div class="col-md-6">
            <div class="well well-sm text-center">

                <legend class="header col-md-10"><?php echo ucfirst($_SESSION["firstname"]); ?>'s payments</legend>

                <p class="col-md-10"></p>
                <p class="col-md-10"></p>

                <div class="col-xs-12 col-md-10">
                    <div class="panel panel-default">
                        <div class="panel-heading text-left">
                            <hr>
                            <p class="col-md-10"><a class="text-info">Payment Details</a><hr></p>
                            <p class="col-md-10">Room no: 017</p>
                            <p class="col-md-10">Room Name: Golden Zone</p>
                            <p class="col-md-10">Price per month: R4 000</p>
                            <p class="col-md-10">Additional Cost: R1 000</p>
                            <hr>
                            <p class="col-md-10"><a class="text-info">Final Payment: R4 000</a></p>
                            
                            <hr>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <div class="form-group">

                                <div class="input-group">
                                    <input class="form-control" id="cardNumber" placeholder="Valid Card Number" required="" autofocus="" type="text">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="form-group">
                                    <div class="panel-heading">
                                        <label>Expriry date</label>
                                        <div class="input-group">
                                            <input class="form-control" id="expityMonth" placeholder="MM" required="" type="text">
                                            <input class="form-control" id="expityYear" placeholder="YY" required="" type="text">
                                            <input class="form-control" id="cvCode" placeholder="CCV" required="" type="password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

                <p class="col-md-10">
                    <button type="submit" style="margin-top: 1%" class="btn btn-outline-success formbutton">Confirm payment</button>
                </p>
            </div>
        </div>
    </div>



</div>