<div class="container">    
    <div class=" col-sm-4 col-lg-4 col-md-4"></div>

    <div class="row mysignup">
        
        <div class="col-md-6">
            <div class="well well-sm">
                <div class="card">
                <div class="card-body"><?php
                if (isset($_GET['messagesent'])) { ?>
                    <div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                    <strong>Success!</strong> Your message has been sent
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button></div><?php
                } ?>
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="header col-md-12">Leave a message</legend><?php

                        if (!isset($_SESSION["iduser"])) { ?>
                            <div class="form-group">
                                <div class="col-md-12 col-md-offset-1">
                                    <input name="contactFirstName" type="text" placeholder="First Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-md-offset-1">
                                    <input name="contactLastName" type="text" placeholder="Last Name" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 col-md-offset-1">
                                    <input name="contactEmail" type="email" placeholder="Email Address" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 col-md-offset-1">
                                    <input name="contactPhone" type="text" placeholder="Phone" class="form-control" required>
                                </div>
                            </div><?php 
                        } ?>

                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-1">
                                <textarea class="form-control" name="contactMessage" placeholder="Message" rows="7" required></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" name="sendMessage" class=" btn btn-outline-success formbutton">Send message</button><?php

                                //Send message button handling
                                if (isset($_POST['sendMessage'])) {
                                    $firstname;
                                    $lastname;
                                    $email;
                                    $phone;

                                    if (!isset($_SESSION["iduser"])) {
                                        $firstname = escape_String($_POST['contactFirstName']);
                                        $lastname = escape_String($_POST['contactLastName']);
                                        $email = escape_String($_POST['contactEmail']);
                                        $phone = escape_String($_POST['contactPhone']);
                                    } else {
                                        $firstname = $_SESSION["firstname"];
                                        $lastname = $_SESSION["lastname"];
                                        $email = $_SESSION["email"];
                                        $phone = $_SESSION["phone"];

                                        send_notification("Your message has been sent", "Your message sent through the contact page has been emailed to us. We will respond to you via email shortly.", "notice", $_SESSION["iduser"]);
                                    }

                                    $message = $_POST['contactMessage'];

                                    send_contact_message($firstname, $lastname, $email, $phone, $message);

                                    redirect("?messagesent");
                                } ?>
                            </div>
                        </div>
                    </fieldset>
                </form>
                    </div>
                    </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <div class="panel panel-default">
                    <div class="panel-body col-md-12">
                    <legend class="header">Contact information</legend>
                        <div> 567 Memory Lane, Claremont
                            <br /> Cape Town, 6562
                            <br /> Tel: 061 410 5892
                            <br /> Email: <a href="mailto:learningspace@gmail.com">projectcrudacc@gmail.com</a>
                        </div>
                        <hr />
                        <div id="map1" class="map" style="min-width:300px; min-height:300px; max-width:none; height:100%;"></div>
                    </div>
                </div>
                    </div>
                </div>
        </div>
    </div>


<!-- for google maps -->
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script type="text/javascript">
    jQuery(function($) {
        function init_map1() {
            var myLocation = new google.maps.LatLng(-33.987419, 18.472080, 17);
            var mapOptions = {
                center: myLocation,
                zoom: 16
            };
            var marker = new google.maps.Marker({
                position: myLocation,
                title: "LearningSpace"
            });
            var map = new google.maps.Map(document.getElementById("map1"),
                mapOptions);
            marker.setMap(map);
        }
        init_map1();
    });
</script>
<!-- Contact with Map - END -->
</div>