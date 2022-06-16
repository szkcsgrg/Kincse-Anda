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
                        <div class='swiper-slide d-flex align-items-center justify-content-center flex-column-reverse flex-lg-row flex-column'>
                            <div class='col-10 col-lg-5 text-wrap flex-column align-items-center'>
                                <div class='accent'>
                                    <h3>" . $row['name'] . "</h3>
                                    <span>Azonosító: " . $row['id'] . "</span>
                                    <p id='product-desc'>" . $row['description'] . "</p>
                                </div>
                                <div>
                                    <h4>" . $row['price'] . "</h4>
                                    <div class='button-wrap'>
                                        <a href='components/edit-product.inc.php?id=" . $row['id'] . "' '><i class='bi bi-pencil-fill' id='pen'></i></a>
                                        <a href='components/delete-product.inc.php?id=" . $row['id'] . "' '><i class='bi bi-trash-fill' id='bin'></i></a>
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
                        <div class='swiper-slide d-flex align-items-center justify-content-center flex-column-reverse flex-lg-row flex-column'>
                            <div class='col-10 col-lg-5 text-wrap flex-column align-items-center'>
                                <div class='accent'>
                                    <h3>" . $row['name'] . "</h3>
                                    <span>Azonosító: " . $row['id'] . "</span>
                                    <p id='product-desc'>" . $row['description'] . "</p>
                                </div>
                                <div>
                                    <h4>" . $row['price'] . "</h4>
                                    <div class='button-wrap'>
                                        <a href='components/edit-product.inc.php?id=" . $row['id'] . "' '><i class='bi bi-pencil-fill' id='pen'></i></a>
                                        <a href='components/delete-product.inc.php?id=" . $row['id'] . "' '><i class='bi bi-trash-fill' id='bin'></i></a>
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