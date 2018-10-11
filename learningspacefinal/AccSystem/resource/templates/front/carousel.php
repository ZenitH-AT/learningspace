<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="first-slide" src="IMAGE/gallery/3.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption text-left" style="text-shadow: 0px 0px 3px #000">
                    <h1>Your Leaving Space.</h1>
                    <p>Open an account and book a room. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <?php if(!isset($_SESSION['admin']) && !isset($_SESSION['iduser'])){ ?>
                    <p><a class="btn btn-lg btn-primary" href="signup.php" role="button">Sign up today</a></p>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="second-slide" src="IMAGE/gallery/2.jpg" alt="Second slide">
            <div class="container">
                <div class="carousel-caption" style="text-shadow: 0px 0px 3px #000">
                    <h1>View other rooms for you.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="gallery.php" role="button">Gallery</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="third-slide" src="IMAGE/gallery/benches1.jpg" alt="Third slide">
            <div class="container">
                <div class="carousel-caption text-right" style="text-shadow: 0px 0px 3px #000">
                    <h1>One more for good measure.</h1>
                    <p>LearnigSpace provides a wonderful view. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>