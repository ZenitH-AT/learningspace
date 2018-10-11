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
                    <h1>Your LearningSpace.</h1>
                    <p>Believe you can and you’re halfway there</p>
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
                    <h1>LearningSpace provides wonderful rooms</h1>
                    <p>We don’t have to be smarter than the rest. We have to be more disciplined than the rest</p>
                    <p><a class="btn btn-lg btn-primary" href="gallery.php" role="button">Gallery</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="third-slide" src="IMAGE/gallery/benches1.jpg" alt="Third slide">
            <div class="container">
                <div class="carousel-caption text-right" style="text-shadow: 0px 0px 3px #000">
                    <h1>LearningSpace provides comfort</h1>
                    <p>The more you know about your customers, the more you can provide to them information that is increasingly useful, and relevant</p>
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