<div class="container">

    <style>
        .top {
            /*Fixes content being covered by navbar*/
            /*padding-top: 5%;*/
        }
        .mysignup{
            background-color: #F1F1F1;
            width: 100%;
            /*color: #333333;*/
            /*height: auto;*/
            margin: 0 auto;
            /*overflow: hidden;*/
            padding: 10px 0;
            /*align-items: center;*/
            justify-content: center;
            /*            display: flex;
                        float: none;*/
        }
    </style>
    <?php userActivation();?>
    <div class=" col-sm-4 col-lg-4 col-md-4"></div>
    
        
    <div class="row mysignup">
        <?php echo $update_bad;?>
        <?php echo $update_good;?>
        <?php echo $errorCheck; ?>
        <legend class="header col-md-10 text-center h3">Click On The Button Below</legend>
        <div class="col-md-6">
            <div class="form-group text-center">
                <div class="col-md-12">
                    <button type="submit" id="submit" name="submit" onclick="location.href='HomePage.php'" class=" btn btn-outline-success formbutton">Home Page</button>
                </div>
            </div>
        </div>
        <!--- END -->
    </div>