<div class="container">

    <?php resetPassword();?>
    <div class=" col-sm-4 col-lg-4 col-md-4"></div>


    <div class="row mysignup">
        <legend class="header col-md-10 text-center h3">Reset Your Password</legend>
        <div class="col-md-6">
            <div class="form-group text-center">
                <div class="col-md-12">
                   <?php echo $passError3;?>
                    <?php echo $passError4;?>
                    <?php echo $passError5;?>
                    <form class="cd-signin-modal__form" method="post">
                        <p class="cd-signin-modal__fieldset">
                            <label class="cd-signin-modal__label cd-signin-modal__label--password cd-signin-modal__label--image-replace" for="passwordFirst">Password</label>
                            <input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="signin-password" name="passwordFirst" type="password" placeholder="Password">         
                            <span class="cd-signin-modal__error"><?php echo $passError1;?></span>
                        </p>

                        <p class="cd-signin-modal__fieldset">
                            <label class="cd-signin-modal__label cd-signin-modal__label--password cd-signin-modal__label--image-replace" for="passwordSecond">Password</label>
                            <input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="signin-password" name="passwordSecond" type="password" placeholder="Confirm Password">
                            <span class="cd-signin-modal__error"><?php echo $passError2;?></span>
                        </p>

<!--                <p class="cd-signin-modal__fieldset">
                    <input type="checkbox" id="remember-me" checked class="cd-signin-modal__input ">
                    <label for="remember-me">Remember me</label>
                </p>-->

                        <p class="cd-signin-modal__fieldset">
                            <input class="cd-signin-modal__input cd-signin-modal__input--full-width" type="submit" name="resetPasswordUser" value="Reset Password">
                        </p>
                    </form>
                </div>
            </div>
        </div>
        <!--- END -->
    </div>