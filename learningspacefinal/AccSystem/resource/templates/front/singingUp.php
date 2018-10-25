<div class="container">

    <?php signup(); ?>
    <div class=" col-sm-4 col-lg-4 col-md-4"></div>
<?php echo $ExistEmailError; ?>
    <?php echo $confirm; ?>
    <?php echo $confirmemail; ?>
    <?php echo $errorSendEmail; ?>
    
    <?php echo $empty; ?>
    <div class="row mysignup">
        <legend class="header col-md-10 text-center h3">Create an Account</legend>
        <div class="col-md-6">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="header col-md-10 h6">Personal Details</legend>
                        <div class="form-group">                            
                            <label class="sr-only" for="inlineFormInputGroup">FisrtName</label>
                            <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                                </div>
                                <input id="fname" name="fname" value="<?php echo $fname; ?>" type="text" id="inlineFormInputGroup" placeholder="First Name" class="form-control" required>
                            </div>
                            <?php echo $fnameError; ?>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="inlineFormInputGroup">MiddleName</label>
                            <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                                </div>
                                <input id="midname" name="midname" value="<?php echo $midname; ?>" type="text" placeholder="Middle Name" class="form-control" required>                                
                            </div>
                            <?php echo $midnameError; ?>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="inlineFormInputGroup">LastName</label>
                            <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                                </div>
                                <input id="lname" name="lname" value="<?php echo $lname; ?>" type="text" placeholder="Last Name" class="form-control" required>                                
                            </div>
                            <?php echo $lnameError; ?>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="inlineFormInputGroup">DateOfBirth</label>
                            <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-birthday-cake"></i></div>
                                </div>
                                <input id="dob" name="dob" value="<?php echo $date; ?>" type="date" placeholder="Date of Birth" class="form-control" max="<?php echo date('Y-m-d', strtotime(date("Y-m-d", mktime()) . " - 16 year")); ?>" required>    
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="inlineFormInputGroup">Gender</label>
                            <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-venus-mars"></i></div>
                                </div>
                                <select name="gender" class="form-control" required>
                                    <option selected>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="inlineFormInputGroup">PhoneNumber</label>
                            <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                </div>
                                <input id="phone" name="phone" value="<?php echo $phone; ?>" type="text" placeholder="Phone Number (1-541-754-3010)" class="form-control" required>                                
                            </div>
                            <?php echo $phoneError; ?>
                        </div>                        
                        <div class="form-group">
                            <label class="sr-only" for="inlineFormInputGroup">ID_Passport</label>
                            <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-id-card"></i></div>
                                </div>
                                <input id="idnumber" name="idnumber" value="<?php echo $idPassport; ?>" type="text" placeholder="ID/Passport" class="form-control" required>
                            </div>
                        </div>

                        </div>
                        </div>

                        <div class="col-md-6">
                            <div class="well well-sm">
                                <legend class="header col-md-10 h6">Address</legend>
                                <div class="form-group">
                                    <label class="sr-only" for="inlineFormInputGroup">Country</label>
                                    <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-map-marked-alt"></i></div>
                                        </div>
                                        <input id="add1_country" value="<?php echo $country; ?>" name="add1_country" type="text" placeholder="Country" class="form-control" required>
                                    </div>
                                    <?php echo $countryError; ?>
                                </div> 

                                <div class="form-group">
                                    <label class="sr-only" for="inlineFormInputGroup">City</label>
                                    <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-map-marked-alt"></i></div>
                                        </div>
                                        <input id="add2_city" value="<?php echo $city; ?>" name="add2_city" type="text" placeholder="City or Town" class="form-control" required>
                                    </div>
                                    <?php echo $cityError; ?>
                                </div>


                                <div class="form-group">
                                    <label class="sr-only" for="inlineFormInputGroup">Street</label>
                                    <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-map-marked-alt"></i></div>
                                        </div>
                                        <input id="add3_street" value="<?php echo $street; ?>" name="add3_street" type="text" placeholder="Street" class="form-control" required>
                                    </div>
                                </div> 
                                <hr>
                                <legend class="header col-md-10 h6">Education</legend>
                                <div class="form-group">
                                    <label class="sr-only" for="inlineFormInputGroup">School</label>
                                    <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-graduation-cap"></i></div>
                                        </div>
                                        <input id="schoolname" value="<?php echo $schoolName; ?>" name="schoolname" type="text" placeholder="School Name" class="form-control" required>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label class="sr-only" for="inlineFormInputGroup">SchoolAdd</label>
                                    <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-map"></i></div>
                                        </div>
                                        <input id="schooladd" value="<?php echo $schoolAdd; ?>" name="schooladd" type="text" placeholder="School Address" class="form-control" required>
                                    </div>
                                </div> 
                                <hr>
                            </div>

                            <div class="well well-sm">
                                <legend class="header col-md-10 h6">Personal Credentials</legend>
                                <div class="form-group">
                                    <label class="sr-only" for="inlineFormInputGroup">UserEmail</label>
                                    <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-at"></i></div>
                                        </div>
                                        <input id="email" name="email" value="<?php echo $email; ?>" type="email" placeholder="Email Address" class="form-control" />
                                    </div>
                                    <?php echo $InvalidEmail; ?>
                                </div> 

                                <div class="form-group">
                                    <label class="sr-only" for="inlineFormInputGroup">Password</label>
                                    <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-key"></i></div>
                                        </div>
                                        <input id="password" name="password" value="<?php echo $password; ?>" type="password" placeholder="Password" class="form-control" required>                                        
                                    </div>
                                    <?php echo $passError; ?>
                                </div> 

                                <div class="form-group">
                                    <label class="sr-only" for="inlineFormInputGroup">Password</label>
                                    <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-key"></i></div>
                                        </div>
                                        <input id="rePass" name="rePass" value="<?php echo $rePass; ?>" type="password" placeholder="Re-enter Password" class="form-control" required>
                                    </div>
                                    <?php echo $repassError; ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <div class="col-md-12">
                                <button type="submit" id="submit" name="submit" class="btn btn-outline-success formbutton">Create Account</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <!--- END -->
        </div>