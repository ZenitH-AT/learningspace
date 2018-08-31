<!-- live chat float start -->
<div class="floating-chat">
    <i class="fa fa-comments" aria-hidden="true"></i>
    <div class="chat">
        <div class="header">
            <span class="title">
                Live chat
            </span>
            <button>
                <i class="fa fa-times" aria-hidden="true"></i>
            </button>

        </div>
        <ul class="messages">
            <li class="other">Hello, how can we help?</li>
        </ul>
        <div class="footer">
            <div class="text-box" contenteditable="true" disabled="true"></div>
            <button id="sendMessage">send</button>
        </div>
    </div>
</div>
<!-- live chat float end *******************************************8-->



<!--Alert Message For Login *****************************************-->
<!--error=1 is used to display alert msg of wrong pass or email-->
<!--error=2 -->
<?php
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    if ($error == 1) {
        ?>
        <script>alert("Your Credentials Are Wrong. Please, Try It Again");</script>
        <?php
    }
    if ($error == 2) {
        ?>
        <script>alert("Your Email Is Wrong. Please, Provide Your Registed Email");</script>
        <?php
    }
    if ($error == 3) {
        ?>
        <script>alert("A Reset Password Link Was Sent Successfully To Your Email.");</script>
        <?php
    }
    if ($error == 4) {
        ?>
        <script>alert("Sign In Fields Cannot Be Empty. Try It Again.");</script>
        <?php
    }
    if ($error == 5) {
        ?>
        <script>alert("You Are Not ACTIVE USER. Please, Go To Your Email To Activate Your ACCOUNT");</script>
        <?php
    }
    if ($error == 6) {
        ?>
        <script>alert("Reset Password Like Was Sent To Your Email");</script>
        <?php
    }
    if ($error == 7) {
        ?>
        <script>alert("Internet Connection Error Or The Email Provided Is Invalid");</script>
        <?php
    }
    if ($error == 8) {
        ?>
        <script>alert("You Have Changed Your Password. Sing In With New Password.");</script>
        <?php
    }
}
?>



<footer class="container text-center">
    <!--<p class="float-right"><a href="#">Put Something in Here!</a></p>-->
    <p>&copy; 2017-2018 DreamTeam, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="./js/jquery-3.3.1.slim.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="./js/holder.min.js"></script>
<script src="./js/float-panel.js"></script>
<script src="./js/live-chat.js"></script>
<script src="./js/jquery.datetimepicker.full.js"></script>
<!-- for gallery images -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular.min.js"></script>

<script>
            baguetteBox.run('.tz-gallery');
</script>

<script>

</script>

<script>
    $(document).ready(function() {
        //var minDate = new Date();
        //var tomorrow = new Date(getDate()+1);
        //tomorrow.setDate(today.getDate()+1);

        $("#bookviewings").datetimepicker({
            minDate: '+2',
            allowTimes: ['12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00'],
            beforeShowDay:
                    function(date) {
                        return [date.getDay() == 6 || date.getDay() == 0 ? false : true];
                    }
        });

        $("#checkout").datetimepicker({
            format: 'd/m/Y',
            formatTime: 'H:i',
            //formatDate: 'Y/m/d',
            minDate: '+2',
            beforeShowDay:
                    function(date) {
                        return [date.getDay() == 6 || date.getDay() == 0 ? false : true];
                    }

//                    showAnim: 'drop',
//                    minDate: '+1',
//                    numberOfMonth: 1,
//                    dataFormat: 'dd/mm/yyyy'
//                    onClose: function (selectedDate) {
//                        $('#checkout').datepicker("option", "minDate", selectedDate);
//                    }
        });

        $("#checkout").datepicker({
            showAnim: 'drop',
            minDate: '+1',
            numberOfMonth: 1,
            dataFormat: 'dd/mm/yyyy'
        });

    });
</script>
