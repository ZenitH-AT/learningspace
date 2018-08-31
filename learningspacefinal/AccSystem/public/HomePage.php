<?php include '../resource/config.php'; ?>


<?php //include '../resource/templates/front/header.php'; ?><!-- Page Hearder-->
<?php include TEMPLATE_FRONT.DS."header.php"; ?>

        <main role="main">
            <link rel="icon" href="">

            <?php include TEMPLATE_FRONT.DS."carousel.php"; ?><!-- Carousel-->

            <!-- Marketing messaging and featurettes
            ================================================== -->
            <!-- Wrap the rest of the page in another container to center all the content. -->
            <?php include TEMPLATE_FRONT.DS.'LGPopup.php'; ?>
            

            
            <div class="container marketing">

                <!-- Three columns of text below the carousel -->
                <?php include TEMPLATE_FRONT.DS."below_carousel.php"; ?><!-- Columns below the Carousel-->


                <hr class="featurette-divider">
                
                <!-- Three columns of text below of the text below the carousel -->
                <?php include TEMPLATE_FRONT.DS."belowBelow.php"; ?>
           

                <!-- START THE FEATURETTES -->
                <hr class="featurette-divider">
                
                <?php include TEMPLATE_FRONT.DS."featurette.php"; ?>

                <!--<hr class="featurette-divider">-->
                <!-- /END THE FEATURETTES -->

            </div><!-- /.container -->
            

            <!-- FOOTER -->
            <?php include TEMPLATE_FRONT.DS."footer.php"; ?>
        </main>

    </body>
</html>