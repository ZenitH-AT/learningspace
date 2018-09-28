<?php //bookingPage();   ?>

<!-- Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-success" id="paymentModal">Payment - <small class="text-dark" style="font-size: small;">Pay a Month</small></h5>
                <button type="button" class="close text-success" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <div> <span class="fa fa-calendar-alt fa-3x" style="color: red;"></span> <span>Hello</span> </div>-->
                <div class="d-flex justify-content-center"><img src="image/web/Visa.png" height="31" width="61">
                    <img src="image/web/mastercard.png" height="31" width="61">
                    <img src="image/web/americanExpress.jpg" height="31" width="61">
                    <img src="image/web/Maestro.png" height="31" width="61">
                    <img src="image/web/Discover.jpg" height="31" width="61">
                    <img src="image/web/JCB.png" height="31" width="61">
                    <img src="image/web/PayPal1.jpg" height="31" width="61">
                </div>
                <div class="d-flex justify-content-center">
                    <p>The payment is processed safely.</p>
                </div>
                <br>
                <div class="panel-body">
                    <form role="form" method="post">
                        <div class="form-group">

                            <div class=" input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-credit-card" style="color: green;"></i></div>
                                </div>
                                <input class="form-control" id="cardNumber" name="cardNumber" placeholder="Valid Card Number" required="" autofocus="" type="text">
                            </div>


                        </div>
                        <div class="input-group">
                            <div class="form-group">
                                <div class="panel-heading">
                                    <!--<label>Expriry date</label>-->
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-calendar-alt" style="color: green;"></i></div>
                                        </div>
                                        <input class="form-control" id="expityMonth" name="cardMonth" placeholder="MM" required="" type="text">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-calendar" style="color: green;"></i></div>
                                        </div>
                                        <input class="form-control" id="expityYear" name="cardYear" placeholder="YY" required="" type="text">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-lock" style="color: green;"></i></div>
                                        </div>
                                        <input class="form-control" id="cvCode" name="cardSecureCode" placeholder="CCV" required="" type="password">
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success" name="confirmPay">Confirm Payment</button>
            </div>
            </form>
            <div class="d-flex justify-content-center">
                <small style="font-size: small;"><span class="fa fa-lock text-success" style=""></span> Secured by &copy;DreamTeam</small>
            </div>
        </div>
    </div>
</div>



