<div class='swiper col-10'>
    <div class='swiper-wrapper'>
        <?php
        include_once "db.php";

        if (isset($_POST["category"])) {
            $category = $_POST["category"];
            if ($_POST["category"] == "Összes") {
                $category = "";
            }
        } else {
            $category = "";
        }

        if (empty($category)) {
            $result = $conn->query("SELECT * FROM products");
            while ($row = $result->fetch_assoc()) {
                echo "
                        <div class='swiper-slide d-flex align-items-center justify-content-center flex-column-reverse flex-lg-row flex-column' data-swiper-autoplay='15000' pauseOnMouseEnter='true'>
                            <div class='col-10 col-lg-5 text-wrap flex-column align-items-center'>
                                <div class='accent'>
                                    <h3>" . $row['name'] . "</h3>
                                    <span>Azonosító: " . $row['id'] . "</span>
                                    <p id='product-desc'>" . $row['description'] . "</p>
                                </div>
                                <div>
                                    <h3>" . $row['price'] . "</h3>
                                    <div class='button-wrap'>
                                        <a data-bs-toggle='modal' data-bs-target='#Modal' class='button_propd' id='" . $row['id'] . "'>Bővebben</a>
                                    </div>
                                </div>
                            </div>
                            <div class='col-10 col-lg-6 text-center'>
                                <img id='swiperImage' src='" . $row['image'] . "' alt='Image of the Product'>
                            </div>
                        </div>
                        ";
            }
        } else {
            $result = $conn->query("SELECT * FROM products WHERE category like '$category'");
            while ($row = $result->fetch_assoc()) {
                echo "
                        <div class='swiper-slide d-flex align-items-center justify-content-center flex-column-reverse flex-lg-row flex-column' data-swiper-autoplay='15000' pauseOnMouseEnter='true'>
                            <div class='col-10 col-lg-5 text-wrap flex-column align-items-center'>
                                <div class='accent'>
                                    <h3>" . $row['name'] . "</h3>
                                    <span>Azonosító: " . $row['id'] . "</span>
                                    <p id='product-desc'>" . $row['description'] . "</p>
                                </div>
                                <div>
                                    <h3>" . $row['price'] . "</h3>
                                    <div class='button-wrap'>
                                        <a data-bs-toggle='modal' data-bs-target='#Modal' class='button_propd' id='" . $row['id'] . "'>Bővebben</a>
                                    </div>
                                </div>
                            </div>
                            <div class='col-10 col-lg-6 text-center'>
                                <img id='swiperImage' src='" . $row['image'] . "' alt='Image of the Product'>
                            </div>
                        </div>
                        ";
            }
        }
        ?>
    </div>
</div>