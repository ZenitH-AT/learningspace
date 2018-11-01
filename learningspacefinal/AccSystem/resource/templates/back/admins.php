<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Administrators</h1>
    <div class="btn-toolbar mb-2 mb-md-0"><?php
        if($_SESSION['adminCategory'] == 1) { ?>
            <button type="button" class="btn btn-info formbutton" data-toggle="modal" data-target="#adminAddingPopup"><i class="fa fa-user-plus"></i> Add admin</button><?php 
        } ?>
    </div>
</div>

<div class="modal fade" id="adminAddingPopup" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <form method="post">
            <div class="modal-content">  
                <div class="modal-header">
                    <h5>Add a new admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div> 
                <div class="modal-body">
                    <!-- Add admin form -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        First name
                                        <input type="text" class="form-control" name="firstName" required>
                                    </div>
                                    <div class="col-sm-6">
                                        Last name
                                        <input type="text" class="form-control" name="lastname" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        Email 
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="col-sm-6">
                                        Password
                                        <input type="text" value="AdminPass123" class="form-control" name="password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        Address 
                                        <input type="text" class="form-control" name="address" required>
                                    </div>
                                    <div class="col-sm-6">
                                        Phone number
                                        <input type="tel" class="form-control" name="phone" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        Category
                                        <select class="form-control" name="category" required>
                                            <option value="1">Owner</option>
                                            <option value="2" selected="">Regular admin</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        Status
                                        <select class="form-control" name="status" required>
                                            <option></option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-info formbutton" style="float:right" name="Addadmin">Add admin</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form><?php
        
        //Add Admin 
        if (isset($_POST['Addadmin'])) {
            $firstname = escape_String($_POST['firstName']);
            $lastname = escape_String($_POST['lastname']);
            $email = escape_String($_POST['email']);
            $password = escape_String($_POST['password']);
            $address = escape_String($_POST['address']);
            $phone = escape_String($_POST['phone']);
            $category = escape_String($_POST['category']);
            $status = escape_String($_POST['status']);
            $enCPass = md5($password);
            
            $sqlAdmin = query("SELECT * FROM admin WHERE adminEmail = '{$email}' ");
            confirm($sqlAdmin);
            //$count = countItem($result)
            if (countItem($sqlAdmin)==0) {
                $AddAd = query("INSERT INTO admin (adminFirstN, adminLastN, adminEmail,adminPassword, adminAddress, adminPhone, adminCategory, adminActive )"
                    . " VALUES('{$firstname}', '{$lastname}', '{$email}', '{$enCPass}', '{$address}', '{$phone}', '{$category}', '{$status}' )");
                confirm($AddAd);
                ?><script>alert("Admin Added.");</script><?php

                header("Refresh:0");
                exit();
            }  else {
                ?><script>alert("Admin was not Added. Please change the email address");</script><?php

                header("Refresh:0");
                exit();
            }  
        }
        ?>

    </div>
</div> 

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb text-secondary ">
            <li class="breadcrumb-item text-secondary"><i class="fa fa-users-cog"></i> Admins</li>            
        </ol>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Admin ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Category</th>
                <th>Address</th>
                <th>Phone number</th>
                <th>Email</th>
                <th>Active</th>
                <th>Edit</th><?php
                
                //Only show remove button if the owner is logged in
                if($_SESSION['adminCategory'] == 1) { ?>
                    <th>Remove</th><?php
                } ?>
            </tr>
        </thead>
        <tbody> <?php
            $query = query("SELECT * FROM admin ORDER BY adminID DESC");
            confirm($query);

            while ($row = fetch_array($query)) { ?>
                <tr>
                    <td><?php echo $row['adminID'] ?></td>
                    <td><?php echo $row['adminFirstN'] ?></td>
                    <td><?php echo $row['adminLastN'] ?></td>
                    <td><?php echo ($row['adminCategory'] == 1 ? 'owner' : 'regular admin') ?></td> 
                    <td><?php echo $row['adminAddress'] ?></td>
                    <td><?php echo $row['adminPhone'] ?></td>
                    <td><?php echo $row['adminEmail'] ?></td>
                    <td><?php echo ($row['adminActive'] == 1 ? '<text class="text-success">active</text>' : '<text class="text-danger">inactive</text>') ?></td><?php
                    
                    //Show edit button only for admin's own account or all if the logged in admin is an owner
                    if($_SESSION['idadmin'] == $row['adminID'] && $_SESSION['idadmin'] != 1 ) { ?>
                        <td><button type="button" class="btn btn-info formbutton" data-toggle="modal" data-target="#adminPopup<?php echo $row['adminID']; ?>"><span class="fa fa-user-edit" style="color:white"></button></form></td><?php
                    }  else if($_SESSION['idadmin'] == 1 ) { ?>
                        <td><button type="button" class="btn btn-info formbutton" data-toggle="modal" data-target="#adminPopup<?php echo $row['adminID']; ?>"><span class="fa fa-user-edit" style="color:white"></button></form></td><?php 
                    }
                
                    //Show delete button if the logged in admin is an owner and the account is inactive
                    if($_SESSION['adminCategory'] == 1) {
                        if($row['adminActive'] == 0) { ?>
                            <td><form method="post"><button class="btn btn-danger formbutton" name="removeAdmin<?php echo $row['adminID']; ?>" onclick="return confirm('Are you sure you want to remove <?php echo $row['adminFirstN'] ?> ?')"><span class="fas fa-times" style="color:white"></button></form></td><?php 
                        } else { ?>
                            <td><form method="post"><button class="btn btn-secondary formbutton" onclick="return alert('The account must be inactive before it can be deleted.')"><span class="fas fa-times" style="color:white"></button></form></td><?php 
                        }
                    } ?>
                </tr><?php
                    
                //Remove button handling
                if(isset($_POST['removeAdmin' . $row['adminID']])){
                    query("DELETE FROM admin WHERE adminID = " . $row['adminID']);
                    ?><script>alert("Admin deleted.");</script><?php

                    header("Refresh:0");
                    exit();
                } ?>
                
                <div class="modal fade" id="adminPopup<?php echo $row['adminID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <form method="post">
                        <div class="modal-content">  
                            <div class="modal-header">
                                <h5>Edit <?php echo $row['adminFirstN'] . ' ' . $row['adminLastN'] ?></h5>
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
                                                    <input type="text" class="form-control" value="<?php echo $row['adminFirstN'] ?>" id="firstName<?php echo $row['adminID']; ?>" name="firstName<?php echo $row['adminID']; ?>" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    Last name
                                                    <input type="text" class="form-control" value="<?php echo $row['adminLastN'] ?>" id="lastname<?php echo $row['adminID']; ?>" name="lastname<?php echo $row['adminID']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    Email 
                                                    <input type="text" class="form-control" value="<?php echo $row['adminEmail'] ?>" id="email<?php echo $row['adminID']; ?>" name="email<?php echo $row['adminID']; ?>" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    Address
                                                    <input type="text" class="form-control" value="<?php echo $row['adminAddress'] ?>" id="address<?php echo $row['adminID']; ?>" name="address<?php echo $row['adminID']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    Phone number
                                                    <input type="text" class="form-control" value="<?php echo $row['adminPhone'] ?>" id="phone<?php echo $row['adminID']; ?>" name="phone<?php echo $row['adminID']; ?>" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    Change Password
                                                    <input type="password" placeholder="Enter a strong pass" class="form-control" id="password<?php echo $row['adminID']; ?>" name="password<?php echo $row['adminID']; ?>" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-info formbutton" style="float:right" name="admin<?php echo $row['adminID']; ?>">Edit student</button>
                                
                                <?php
                                //Edit student button handling
                                if(isset($_POST['admin' . $row['adminID']])) { 
                                    if (!empty($_POST['password' . $row['adminID']])) {
                                        $adminPass = md5($_POST['password' . $row['adminID']]);
                                    }  else {
                                        $adminPass = $row['adminPassword'];
                                    }
                                    
                                    
                                    query("UPDATE admin SET 
                                        adminFirstN = '{$_POST['firstName' . $row['adminID']]}',
                                        adminLastN = '{$_POST['lastname' . $row['adminID']]}', 
                                        adminEmail = '{$_POST['email' . $row['adminID']]}',
                                        adminAddress = '{$_POST['address' . $row['adminID']]}', 
                                        adminPhone = '{$_POST['phone' . $row['adminID']]}', 
                                        adminPassword = '{$adminPass}' 
                                        WHERE adminID = " . $row['adminID']);
                                    
                                    ?><script>alert("Admin edited.");</script><?php
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