<!-- live chat float include -->
<!-- is run on a node.js server -->
<!-- note: 'allow_url_include = 1' must be added to php.ini for this to work-->
<?php
    if (isset($_SESSION["iduser"])) {
        include 'http://localhost:8088/client.php';
        ?>
            <script>socket.connect('http://localhost:8088');</script>
        <?php
    } 
?>

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
    <p>&copy; 2017-2018 DreamTeam, Inc. &middot; <a href="PrivacyTerms.php" data-toggle="modal" data-target="#PrivacyPopup">Privacy</a> &middot; <a href="PrivacyTerms.php" data-toggle="modal" data-target="#TermsPopup">Terms</a></p>
</footer>

<?php include "PrivacyTerms.php"; ?>

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
<script src="./js/jquery.datetimepicker.full.js"></script>

<!-- for gallery images -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular.min.js"></script>

<script>baguetteBox.run('.tz-gallery');</script>

<script>
    //Function for ToolTip used in BookingPage
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<script>
    $(document).ready(function() {
        $("#bookviewings").datetimepicker({
            minDate: '+2',
            allowTimes: ['12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00'],
            beforeShowDay:
                    function(date) {
                        return [date.getDay() == 0 ? false : true];
                        //return [date.getDay() == 5 || date.getDay() == 0 ? false : true];// Restric Saturdays and Sundays
                    }
        });
        
        $("#checkin").datetimepicker({
            minDate: '+2',
            formatTime:	false,
            format:	'Y/m/d',
            //allowTimes: ['12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00'],
            beforeShowDay:
                    function(date) {
                        return [date.getDay() == 0 ? false : true];
                        //return [date.getDay() == 5 || date.getDay() == 0 ? false : true];// Restric Saturdays and Sundays
                    }
        });
        
        $("#checkout").datetimepicker({
            minDate: '+2',
            formatTime:	false,
            format:	'Y/m/d',
            beforeShowDay:
                    function(date) {
                        return [date.getDay() == 0 ? false : true];
                    }
        });
        
    });
</script>
