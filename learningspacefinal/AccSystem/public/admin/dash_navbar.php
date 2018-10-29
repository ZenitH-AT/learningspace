<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><img style="min-width:30px; min-height:30px; max-width:3%; max-height:3%; margin-right:1.5%" src="../image/web/logo.png">LearningSpace</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto" style="width: 46%; margin-left: 2%;">
            <input class="form-control form-control-dark w-100" id="searchFilter" placeholder="Filter table" aria-label="Search" type="text">  
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item text-nowrap" style="padding-right: 11px;">
                <a class="nav-link text-light"><?php echo "Welcome, " . ucfirst($_SESSION["adminFN"]) . " (" . ($_SESSION['adminCategory'] == 1 ? "owner" : "regular admin") . ")"; ?></a>
            </li>
        </ul>
        <div style="padding-right: 15px;">
            <a href="../HomePage.php"><button type="button" class="btn btn-outline-success my-2 my-sm-0" style="padding-right: 6px;"><i class="fa fa-fw fa-home"></i> Home Page</button></a>
            <a href="../../resource/logout.php"><button type="button" class = "btn btn-outline-success my-2 my-sm-0"><i class="fa fa-fw fa-power-off"></i> Sign out</button></a>
        </div>
    </div>
</nav>