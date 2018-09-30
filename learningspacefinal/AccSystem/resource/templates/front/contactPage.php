<div class="container">    
    <div class=" col-sm-4 col-lg-4 col-md-4"></div>

    <div class="row mysignup">
        
        <div class="col-md-6">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="header col-md-10">Leave a message</legend>
                        <?php send_message()?>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input name="contactFirstName" type="text" placeholder="First Name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input name="contactLastName" type="text" placeholder="Last Name" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input name="contactEmail" type="email" placeholder="Email Address" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input name="contactPhone" type="text" placeholder="Phone" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <textarea class="form-control" name="contactMessage" placeholder="Message" rows="7" required></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" name="sendMessage" class=" btn btn-outline-success formbutton">Send message</button><?php
                                
                                //Send message button handling
                                if (isset($_POST['sendMessage'])) {
                                    $firstname = escape_String($_POST['contactFirstName']);
                                    $lastname = escape_String($_POST['contactLastName']);
                                    $email = escape_String($_POST['contactEmail']);
                                    $phone = escape_String($_POST['contactPhone']);
                                    $message = escape_String($_POST['contactMessage']);

                                    send_contact_message($firstname, $lastname, $email, $phone, $message);
                                } ?>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <div class="panel panel-default">
                    <div class="panel-body col-md-10">
                    <legend class="header">Contact information</legend>
                        <div> 567 Memory Lane, Claremont
                            <br /> Cape Town, 6562
                            <br /> Tel: 061 410 5892
                            <br /> Email: <a href="mailto:learningspace@gmail.com">projectcrudacc@gmail.com</a>
                        </div>
                        <hr />
                        <div id="map1" class="map" style="min-width:300px; min-height:300px; width:100%; height100%;">
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