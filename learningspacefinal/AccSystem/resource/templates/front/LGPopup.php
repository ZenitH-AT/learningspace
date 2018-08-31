<?php lognew(); ?>

<div class="cd-signin-modal js-signin-modal">
    <!-- this is the entire modal form, including the background -->
    <div class="cd-signin-modal__container">
        <!-- this is the container wrapper -->
        <ul class="cd-signin-modal__switcher js-signin-modal-switcher js-signin-modal-trigger" style="list-style-type:none;">
            <li><a style="text-decoration: none;" href="#0" data-signin="login" data-type="login">Sign in</a></li>
        </ul>

        <div class="cd-signin-modal__block js-signin-modal-block" data-type="login">
            <!-- log in form -->
            <form class="cd-signin-modal__form" method="post">
                <p class="cd-signin-modal__fieldset">
                    <label class="cd-signin-modal__label cd-signin-modal__label--email cd-signin-modal__label--image-replace" for="signin-email">E-mail</label>
                    <input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="signin-email" name="signin-email" type="email" placeholder="E-mail">
                    <span class="cd-signin-modal__error"></span>
                </p>

                <p class="cd-signin-modal__fieldset">
                    <label class="cd-signin-modal__label cd-signin-modal__label--password cd-signin-modal__label--image-replace" for="signin-password">Password</label>
                    <input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="signin-password" name="signin-password" type="text" placeholder="Password">
                    <a href="#" class="cd-signin-modal__hide-password js-hide-password" style="font-size: 1.0rem;">Hide</a>
                    <span class="cd-signin-modal__error">Error message here!</span>
                </p>
                
                <p class="cd-signin-modal__fieldset" style="margin-left: 67%;">
                    <a href="#" class="text-info js-signin-modal-trigger" style="font-size: 1.0rem;" data-signin="reset">Forgot your password?</a>
                </p>

                <p class="cd-signin-modal__fieldset">
                    <input class="cd-signin-modal__input cd-signin-modal__input--full-width" type="submit" name="doLogin" value="Login">
                </p>
            </form>
        </div>
        <!-- cd-signin-modal__block -->

        <div class="cd-signin-modal__block js-signin-modal-block" data-type="reset">
            <!-- reset password form -->
            <p class="cd-signin-modal__message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

            <form class="cd-signin-modal__form" method="post">
                <p class="cd-signin-modal__fieldset">
                    <label class="cd-signin-modal__label cd-signin-modal__label--email cd-signin-modal__label--image-replace" for="reset-email">E-mail</label>
                    <input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="reset-email" name="reset-email" type="email" placeholder="E-mail">
                    <span class="cd-signin-modal__error">Error message here!</span>
                </p>

                <p class="cd-signin-modal__fieldset" style="margin-left: 78%;">
                    <a href="#" class="text-info js-signin-modal-trigger" style="font-size: 1.0rem;" data-signin="login">Back to Sign-In</a>
                </p>

                <p class="cd-signin-modal__fieldset">
                    <input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding" type="submit" name="doResetPass" value="Reset password">
                </p>
            </form>

        </div>
        <!-- cd-signin-modal__block -->
        <a href="#0" class="cd-signin-modal__close js-close">Close</a>
    </div>
    <!-- cd-signin-modal__container -->
</div>
<!-- cd-signin-modal -->
