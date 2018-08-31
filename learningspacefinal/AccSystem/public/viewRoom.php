<?php include '../resource/config.php'; ?>


<?php //include '../resource/templates/front/header.php'; ?><!-- Page Hearder-->
<?php include TEMPLATE_FRONT.DS."header.php"; ?>

        <main role="main">
            <link rel="icon" href="">

            <?php //include TEMPLATE_FRONT.DS."carousel.php"; ?><!-- Carousel-->

            <!-- Marketing messaging and featurettes
            ================================================== -->
            <!-- Wrap the rest of the page in another container to center all the content. -->
            <?php include TEMPLATE_FRONT.DS.'LGPopup.php'; ?>
            <?php //get_Rooms();?>
            
            <div class="container marketing">

                <!-- Three columns of text below the carousel -->
                <?php include TEMPLATE_FRONT.DS."viewRoomDetails.php"; ?><!-- Columns below the Carousel-->

                <hr class="featurette-divider">
            </div><!-- /.container -->


            <!-- FOOTER -->
            <?php include TEMPLATE_FRONT.DS."footer.php"; ?>
        </main>

    </body>
</html>