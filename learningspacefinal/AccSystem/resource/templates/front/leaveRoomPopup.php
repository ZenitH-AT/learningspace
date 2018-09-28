<?php //bookingPage();   ?>

<!-- Modal -->
<div class="modal fade" id="leaveModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form role="form" method="post">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-danger" id="leaveModal">Confirmation</h5>
                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center font-weight-bold" style="color: red;">
                    <p><i class="fa fa-fw fa-3x fa-times-circle"></i></p>
                </div>
                <div class="d-flex justify-content-center font-weight-bold">
                    <p><h4>Are you sure you want to leave the room?</h4></p>
                </div>
                
                <div class="d-flex justify-content-center row">
                    <p class="cd-signin-modal__fieldset">
                    <label class="cd-signin-modal__label cd-signin-modal__label--password cd-signin-modal__label--image-replace">Password</label>
                    <input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="" name="leavePassword" type="password" placeholder="Privide Your Password">
                </p>
                </div>
                <br>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-danger" name="confirmLeaving"><i class="fa fa-fw fa-times-circle"></i>Confirm Payment</button>
            </div>
            </form>
        </div>
    </div>
</div>



