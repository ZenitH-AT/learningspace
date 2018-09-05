<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><img style="max-width:100%; margin-left: 3%; height: 30px;" src="../image/web/logo.png"> LearningSpace</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
        <!--        <form class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2 form-control-dark" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>-->
        <ul class="navbar-nav ">
            <li class="nav-item text-nowrap" style="padding-right: 11px;">
                <a class="nav-link text-light"></i><?php echo "Admin, " . ucfirst($_SESSION["adminFN"]); ?></a>
            </li>
            <li class="nav-item text-nowrap">

            </li>
            <li class="nav-item text-nowrap">
                
            </li>
     

        </ul>
        <div style="padding-right: 15px;">
            <a href="../HomePage.php"><button type="button" class = "btn btn-outline-success my-2 my-sm-0" style="padding-right: 6px;"><i class="fa fa-fw fa-home"></i> Home Page</button></a>
            <a href="../../resource/logout.php"><button type="button" class = "btn btn-outline-success my-2 my-sm-0"><i class="fa fa-fw fa-power-off"></i> Sign out</button></a>
        </div>
    </div>
</nav>