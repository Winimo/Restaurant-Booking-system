<style>
    .carousel-item>img {
        object-fit: fill !important;
        height: 600px; /* Adjust the height as needed */
        width: 100%; /* Ensure the width is 100% to fit the container */
    }

    #carouselExampleControls .carousel-inner {
        height: 600px !important; /* Match the height of the images */
    }

    .carousel-container {
        width: 100%;
        margin: 0;
        padding: 0;
    }
</style>
<?php
$brands = isset($_GET['b']) ? json_decode(urldecode($_GET['b'])) : array();
?>
<section class="py-0">
    <div class="container-fluid carousel-container">
        <div class="col-lg-12 py-2">
            <div class="row">
                <div class="col-md-12">
                    <div id="carouselExampleControls" class="carousel slide bg-dark" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            $upload_path = "uploads/banner";
                            if (is_dir(base_app . $upload_path)):
                                $file = scandir(base_app . $upload_path);
                                $_i = 0;
                                foreach ($file as $img):
                                    if (in_array($img, array('.', '..')))
                                        continue;
                                    $_i++;
                            ?>
                                    <div class="carousel-item h-100 <?php echo $_i == 1 ? "active" : '' ?>">
                                        <img src="<?php echo validate_image($upload_path . '/' . $img) ?>" class="d-block w-100  h-100" alt="<?php echo $img ?>">
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="container px-4 px-lg-5 mt-5">
                <div>
                    <?= file_get_contents('./welcome.html') ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(function() {})
</script>