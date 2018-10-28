<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Administrators</h1>
</div>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb text-secondary ">
            <li class="breadcrumb-item text-secondary"><i class="fa fa-users-cog"></i> Admins</li>  
        </ol>
    </div>
</div>

<div class="table-responsive">
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
                        <td><?php echo ($row['adminActive'] == 1 ? '<text class="text-success">active</text>' : '<text class="text-danger">inactive</text>') ?></td>
                    </tr> <?php
                } ?>
            </tbody>
        </table>
    </div>
