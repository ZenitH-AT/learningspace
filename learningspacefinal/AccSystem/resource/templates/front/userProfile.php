<div class="container">

    <?php profile(); ?>
    <div class=" col-sm-4 col-lg-4 col-md-4"></div>

    <?php 
    if(isset($_GET['profileUpdated'])) { ?>
        <div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
        <strong>Success!</strong> Your Profile Has Been Updated.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button></div><?php
    } ?>

    <?php echo $empty; ?>
    <?php echo $errorGeneral; ?>
    <?php echo $empty; ?>

    <div class="row mysignup">
        <legend class="header col-md-10 text-center h3"><?php echo $_SESSION['firstname']; ?>'s Profile</legend>
        <div style="width: 100%;"><hr></div>

        <div class="col-md-6">
            <div class="well well-sm">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <div class="col-sm-6" style="margin-left: 28%;">
                                    <?php if (!empty($getPicture)) { ?>
                                        <img class="rounded-circle" src="IMAGE/upload/<?php echo $getPicture; ?>"  width="140" height="140">
                                    <?php } else { ?>
                                        <img class="rounded-circle" src="IMAGE/web/self.jpg" alt="Generic placeholder image" width="140" height="140">
                                    <?php } ?>

                                    <p></p>
                                    <input type="file" name="image" accept="image/*" >
                                    <div style="margin-bottom: 12%;"></div>
                                </div>

                                <div class="form-group">        
                                    <legend class="header col-md-10 h6">Personal Details</legend>
                                    <label class="sr-only" for="inlineFormInputGroup">FisrtName</label>
                                    <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                                        </div>
                                        <input id="fname" name="fname" value="<?php echo $getfname; ?>" type="text" id="inlineFormInputGroup" placeholder="First Name" class="form-control" required>
                                    </div>
                                    <?php echo $fnameError; ?>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only" for="inlineFormInputGroup">MiddleName</label>
                                    <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                                        </div>
                                        <input id="midname" name="midname" value="<?php echo $getmidname; ?>" type="text" placeholder="Middle Name" class="form-control" required>                                
                                    </div>
                                    <?php echo $midnameError; ?>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only" for="inlineFormInputGroup">LastName</label>
                                    <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                                        </div>
                                        <input id="lname" name="lname" value="<?php echo $getlname; ?>" type="text" placeholder="Last Name" class="form-control" required>                                
                                    </div>
                                    <?php echo $lnameError; ?>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only" for="inlineFormInputGroup">DateOfBirth</label>
                                    <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-birthday-cake"></i></div>
                                        </div>
                                        <input id="dob" name="dob" value="<?php echo $getdate; ?>" type="date" placeholder="Date Of Birth" class="form-control" max="<?php echo date('Y-m-d', strtotime(date("Y-m-d", mktime()) . " - 16 year")); ?>" required>    
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
                                        <input id="phone" name="phone" value="<?php echo $getphone; ?>" type="text" placeholder="Phone Number (1-541-754-3010)" class="form-control" required>                                
                                    </div>
                                    <?php echo $phoneError; ?>
                                </div>                        
                                <div class="form-group">
                                    <label class="sr-only" for="inlineFormInputGroup">ID_Passport</label>
                                    <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-id-card"></i></div>
                                        </div>
                                        <input id="idnumber" name="idnumber" value="<?php echo $getidPassport; ?>" type="text" placeholder="ID/Passport" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="well well-sm">
                        <div class="card">
                            <div class="card-body">
                                <legend class="header col-md-10 h6">Your Address</legend>
                                <div class="form-group">
                                    <label class="sr-only" for="inlineFormInputGroup">Country</label>
                                    <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-map-marked-alt"></i></div>
                                        </div>
                                        <input id="add1_country" value="<?php echo $getcountry; ?>" name="add1_country" type="text" placeholder="Country" class="form-control" required>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label class="sr-only" for="inlineFormInputGroup">City</label>
                                    <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-map-marked-alt"></i></div>
                                        </div>
                                        <input id="add2_city" value="<?php echo $getcity; ?>" name="add2_city" type="text" placeholder="City or Town" class="form-control" required>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="sr-only" for="inlineFormInputGroup">Street</label>
                                    <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-map-marked-alt"></i></div>
                                        </div>
                                        <input id="add3_street" value="<?php echo $getstreet; ?>" name="add3_street" type="text" placeholder="Street" class="form-control" required>
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
                                        <input id="schoolname" value="<?php echo $getschoolName; ?>" name="schoolname" type="text" placeholder="School Name" class="form-control" required>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label class="sr-only" for="inlineFormInputGroup">SchoolAdd</label>
                                    <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-map"></i></div>
                                        </div>
                                        <input id="schooladd" value="<?php echo $getschoolAdd; ?>" name="schooladd" type="text" placeholder="School Address" class="form-control" required>
                                    </div>
                                </div> 

                                <hr>
                            
                                <div class="well well-sm">                  
                                    <legend class="header col-md-10 h6">Personal Credentials</legend>
                                    <div class="form-group">
                                        <label class="sr-only" for="inlineFormInputGroup">UserEmail</label>
                                        <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-at"></i></div>
                                            </div>
                                            <input id="email" name="email" value="<?php echo $getemail; ?>" type="email" disabled placeholder="Email Address" class="form-control" />
                                        </div>
                                    </div> 

                                    <div class="form-group">
                                        <label class="sr-only" for="inlineFormInputGroup">Description</label>
                                        <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-info"></i></div>
                                            </div>
                                            <input id="description" name="description" value="<?php echo $getDescription; ?>" type="text" placeholder="Short description of yourself (bio)" class="form-control" >                                        
                                        </div>
                                    </div> 

                                    <hr>

                                    <legend class="header col-md-10 h6">Password</legend>
                                    <h6 class="col-md-10 text-secondary">Note: If you change your password,<br/>you will need to log in again.</h6>

                                    <div class="form-group">
                                        <label class="sr-only" >Old Password</label>
                                        <div class="input-group mb-2 col-md-10 col-md-offset-1">

                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-key"></i></div>
                                            </div>
                                            <input id="oldpassword" name="oldpassword" value="" type="password" placeholder="Old Password" class="form-control" >                                        
                                        </div>
                                        <?php echo $OldpassError; ?>
                                    </div> 

                                    <div class="form-group">
                                        <label class="sr-only" for="inlineFormInputGroup">Password</label>
                                        <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-key"></i></div>
                                            </div>
                                            <input id="password" name="password" value="" type="password" placeholder="New Password" class="form-control" >                                        
                                        </div>
                                        <?php echo $passError; ?>
                                    </div> 

                                    <div class="form-group">
                                        <label class="sr-only" for="inlineFormInputGroup">Password</label>
                                        <div class="input-group mb-2 col-md-10 col-md-offset-1">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-key"></i></div>
                                            </div>
                                            <input id="rePass" name="rePass" value="" type="password" placeholder="Re-enter new password" class="form-control">
                                        </div>
                                        <?php echo $repassError; ?>
                                    </div> 

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center" style="width: 100%;">
                    <hr>
                    <div class="col-md-12">
                        <button type="submit" id="submit" name="editProfile" class=" btn btn-outline-success formbutton">Save Profile</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <!--- END -->
</div>
