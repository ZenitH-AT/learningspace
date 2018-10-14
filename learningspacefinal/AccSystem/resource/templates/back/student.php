<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Students</h1>
</div>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb text-secondary ">
            <li class="breadcrumb-item text-secondary"><i class="fa fa-user-graduate"></i> Students</li>  
        </ol>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>  
                <th>ID</th>
                <th>First name</th>
                <th>Middle name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Date of birth</th>
                <th>School</th>
                <th>School address</th>
                <th>Country</th>
                <th>City</th>
                <th>Street</th>
                <th>ID/Passport</th>
                <th>Phone number</th>
                <th>Status</th>
                <th>Registration date</th>

                <th>Edit</th><?php
                if($_SESSION['adminCategory'] == 1) { ?>
                    <th>Remove</th><?php
                } ?>
            </tr>
        </thead>
        <tbody> <?php
            $query = query("SELECT * FROM student ORDER BY studID DESC");
            confirm($query);

            while ($row = fetch_array($query)) { ?>
                <tr>
                    <td><?php echo $row['studID'] ?></td>
                    <td><?php echo $row['studFirstName'] ?></td>
                    <td><?php echo $row['studMiddleName'] ?></td>
                    <td><?php echo $row['studLastName'] ?></td> 
                    <td><?php echo $row['studEmail'] ?></td>
                    <td><?php echo $row['studGender'] ?></td>
                    <td><?php echo $row['studDOB'] ?></td>
                    <td><?php echo $row['studSchool'] ?></td>
                    <td><?php echo $row['studSchoolAddress'] ?></td>
                    <td><?php echo $row['studCountry'] ?></td>
                    <td><?php echo $row['studCity'] ?></td>
                    <td><?php echo $row['studStreet'] ?></td>
                    <td><?php echo $row['id_passport'] ?></td>
                    <td><?php echo $row['studPhone'] ?></td>
                    <td><?php echo ($row['isActive'] == 1 ? '<text class="text-success">active</text>' : '<text class="text-danger">inactive</text>') ?></td>
                    <td><?php echo $row['data'] ?></td>

                    <td><button type="button" class="btn btn-info formbutton" data-toggle="modal" data-target="#studentPopup<?php echo $row['studID']; ?>"><span class="fa fa-user-edit" style="color:white"></button></form></td>
                    <td><form method="post"><button class="btn btn-danger formbutton" name="removeStudent<?php echo $row['studID'] ?>" onclick="return confirm('Are you sure you want to remove <?php echo $row['studFirstName'] . ' ' . $row['studLastName'] ?>?')"><span class="fa fa-user-minus" style="color:white"></button></form></td><?php

                    //Remove button handling
                    if(isset($_POST['removeStudent' . $row['studID']])){
                        query("DELETE FROM student WHERE studID = " . $row['studID']);
                        ?><script>alert("Student deleted.");</script><?php

                        header("Refresh:0");
                        exit();
                    } ?>
                </tr> 
                
                <div class="modal fade" id="studentPopup<?php echo $row['studID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                        <form method="post">
                            <div class="modal-content">  
                                <div class="modal-header">
                                    <h5>Edit <?php echo $row['studFirstName'] . ' ' . $row['studLastName'] ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                </div> 
                                <div class="modal-body">
                                    <!-- Edit student form -->
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        First name
                                                        <input type="text" class="form-control" value="<?php echo $row['studFirstName'] ?>" id="firstName<?php echo $row['studID']; ?>" name="firstName<?php echo $row['studID']; ?>" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        School name
                                                        <input type="text" class="form-control" value="<?php echo $row['studSchool'] ?>" id="school<?php echo $row['studID']; ?>" name="school<?php echo $row['studID']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        Middle name
                                                        <input type="text" class="form-control" value="<?php echo $row['studMiddleName'] ?>" id="middleName<?php echo $row['studID']; ?>" name="middleName<?php echo $row['studID']; ?>" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        School address
                                                        <input type="text" class="form-control" value="<?php echo $row['studSchoolAddress'] ?>" id="schoolAddress<?php echo $row['studID']; ?>" name="schoolAddress<?php echo $row['studID']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        Last name
                                                        <input type="text" class="form-control" value="<?php echo $row['studLastName'] ?>" id="lastName<?php echo $row['studID']; ?>" name="lastName<?php echo $row['studID']; ?>" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        Country
                                                        <input type="text" class="form-control" value="<?php echo $row['studCountry'] ?>" id="country<?php echo $row['studID']; ?>" name="country<?php echo $row['studID']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        Email
                                                        <input type="text" class="form-control" value="<?php echo $row['studEmail'] ?>" id="email<?php echo $row['studID']; ?>" name="email<?php echo $row['studID']; ?>" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        City
                                                        <input type="text" class="form-control" value="<?php echo $row['studCity'] ?>" id="city<?php echo $row['studID']; ?>" name="city<?php echo $row['studID']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        Gender
                                                        <input type="text" class="form-control" value="<?php echo $row['studGender'] ?>" id="gender<?php echo $row['studID']; ?>" name="gender<?php echo $row['studID']; ?>" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        Street
                                                        <input type="text" class="form-control" value="<?php echo $row['studStreet'] ?>" id="street<?php echo $row['studID']; ?>" name="street<?php echo $row['studID']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        Date of birth
                                                        <input type="date" class="form-control" value="<?php echo $row['studDOB'] ?>" id="dateOfBirth<?php echo $row['studID']; ?>" name="dateOfBirth<?php echo $row['studID']; ?>" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        ID/passport number
                                                        <input type="text" class="form-control" value="<?php echo $row['id_passport'] ?>" id="idPassport<?php echo $row['studID']; ?>" name="idPassport<?php echo $row['studID']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6"></div>
                                                    <div class="col-sm-6">
                                                        Phone number
                                                        <input type="text" class="form-control" value="<?php echo $row['studPhone'] ?>" id="phoneNumber<?php echo $row['studID']; ?>" name="phoneNumber<?php echo $row['studID']; ?>" required>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-outline-info formbutton" style="float:right" name="editStudent<?php echo $row['studID']; ?>">Edit student</button><?php
                                    
                                    //Edit student button handling
                                    if(isset($_POST['editStudent' . $row['studID']])) { 
                                        query("UPDATE student SET 
                                            studFirstName = '{$_POST['firstName' . $row['studID']]}',
                                            studMiddleName = '{$_POST['middleName' . $row['studID']]}', 
                                            studLastName = '{$_POST['lastName' . $row['studID']]}', 
                                            studEmail = '{$_POST['email' . $row['studID']]}', 
                                            studGender = '{$_POST['gender' . $row['studID']]}', 
                                            studDOB = '{$_POST['dateOfBirth' . $row['studID']]}', 
                                            studSchool = '{$_POST['school' . $row['studID']]}', 
                                            studSchoolAddress = '{$_POST['schoolAddress' . $row['studID']]}', 
                                            studCountry = '{$_POST['country' . $row['studID']]}', 
                                            studCity = '{$_POST['city' . $row['studID']]}', 
                                            studStreet = '{$_POST['street' . $row['studID']]}', 
                                            id_passport = '{$_POST['idPassport' . $row['studID']]}', 
                                            studPhone = '{$_POST['phoneNumber' . $row['studID']]}'
                                            WHERE studID = " . $row['studID']);
                                        
                                        ?><script>alert("Student edited.");</script><?php

                                        header("Refresh:0");
                                        exit();
                                    } ?>

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><?php
            } ?>
        </tbody>
    </table>
</div>
