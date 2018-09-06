
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="page-header">Student</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <?php if(isset($_GET['student'])=="deleted"){ ?>
        <div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                <strong>Info!</strong> Admin, You Cannot Book a Room.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button></div>
        <?php }?>
    </div>
</div>

    <!--<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>-->

<!--<h2>Section title</h2>-->
<!--<nav aria-label="breadcrumb">-->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb text-secondary ">
            <li class="breadcrumb-item text-secondary"><i class="fa fa-users"></i> Students</li>
        </ol>
    </div>
</div>
<!--</nav>-->

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>  
                <th>ID</th>
                <th>First_Name</th>
                <th>Middle_Name</th>
                <th>Last_Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Gender</th>
                <th>Date_Of_Birth</th>
                <th>School</th>
                <th>School_Address</th>
                <th>Country</th>
                <th>City</th>
                <th>Street</th>
                <th>ID|Passport</th>
                <th>Phone_Number</th>
                <th>Activation_Key</th>
                <th>Status</th>
                <th width="80%">Registration_Date</th>

                <th>Add</th>
                <th>Edit</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            <?php get_Students(); ?>
        </tbody>
    </table>
</div>
