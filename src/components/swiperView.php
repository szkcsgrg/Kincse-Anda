<div class='swiper col-10'>
    <div class='swiper-wrapper'>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "
                <div class='swiper-slide d-flex align-items-center justify-content-center flex-column-reverse flex-lg-row flex-column' data-swiper-autoplay='15000' pauseOnMouseEnter='true'>
                    <div class='col-10 col-lg-5 text-wrap flex-column align-items-center'>
                        <div class='accent'>
                            <h3>Termék neve</h3>
                            <a href='termekek.php?category='><span>Termék típusa</span></a>
                            <p id='product-desc'>" . $row['Column 2'] . "</p>
                        </div>
                        <div>
                            <h3>3000-5000Ft</h3>
                            <div class='button-wrap'>
                                <a data-bs-toggle='modal' data-bs-target='#Modal' id='button_1'>Érdekel</a>
                            </div>
                        </div>
                    </div>
                    <div class='col-10 col-lg-6 text-center'>
                        <img id='swiperImage' src='images/d.jpg' alt='Image of the Product'>
                    </div>
                </div>
                ";
        }

        ?>
    </div>
</div>

<div class='modal fade' id='Modal' tabindex='-1' aria-hidden='true'>
    <div class='modal-dialog modal-fullscreen'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body d-flex flex-column flex-column-reverse flex-md-row '>
                <div class='col-12 col-md-6 text-wrap flex-column align-items-center'>
                    <div class='accent margin-10'>
                        <h3>Termék neve</h3>
                        <a href='termekek.php?category='><span>Termék típusa</span></a>
                        <p id='product-desc'>Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Quisquam culpa
                            fugit sint itaque dolor, dignissimos harum ad quae dolores adipisci! Suscipit harum
                            assumenda cupiditate ducimus necessitatibus asperiores? Recusandae perspiciatis illo eius,
                            eaque error suscipit ipsa beatae aspernatur nesciunt, porro accusamus, esse aperiam
                            doloremque necessitatibus quos eos odio! Exercitationem, soluta nemo?

                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta accusamus aliquam aperiam
                            itaque ducimus laborum laudantium repudiandae, eum quos non!</p>

                        <h3>3000-5000Ft</h3>
                        <div class="button-wrap">
                            <a href='kapcsolat.php' id='button_1'>Rendelés</a>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-md-6 text-center margin-10'>
                    <img id='swiperImage' src='images/d.jpg' alt='Image of the Product'>
                </div>

            </div>
        </div>
    </div>
</div>