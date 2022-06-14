<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <link rel="icon" href="Images/icon.png" type="image/x-icon">
    <title>Kincse Adna - Csokor, Koszorú, Dekor</title>

    <!-- SEO -->
    <meta name="og:title" content="">
    <meta name="og:type" content="">
    <meta name="og:url" content="">
    <meta name="url" content="">
    <meta name="og:image" content="">
    <meta name="description" content="">
    <meta name="og:description" content="">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <!-- Swiper Js -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

    <!-- Stylesheet -->
    <link rel="stylesheet" href="stylesheets/main.css">
</head>

<body>

    <!-- Navigation Start -->
    <?php include_once "components/nav.php" ?>
    <!-- Navigation End -->

    <div id="cursor" class="cursor d-none d-lg-block"></div>

    <main class="container-fluid" role="main">

        <!-- Landing Start -->
        <section class="row home-landing d-flex justify-content-start align-items-center flex-row">

            <div class="col-12 col-lg-4">
                <div class="text-wrap">
                    <h1>Kincse Anda - Csokor, Koszorú, Dekor</h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
                <div class="button-wrap">
                    <a id="button_1" href="galeria.php">Galéria</a>
                    <a id="button_2" href="termekek.php">Termékek</a>
                </div>
                <div class="text-wrap my-3">
                    <?php
                    include_once "components/db.php";
                    $today = date("Y-m-d");
                    $openH = $conn->query("SELECT * FROM openhour ORDER BY id desc LIMIT 1");
                    while ($row = $openH->fetch_assoc()) {
                        // echo $today . '</br>';
                        // echo $row["deleteDate"];
                        if ($today < $row['deleteDate']) {
                            echo "<p class='bold'>" . $row["text"] . "</p>";
                        }
                        if (!isset($row['deleteDate'])) {
                            echo "<p class='bold'>" . $row["text"] . "</p>";
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="landing_image_wrap d-none d-lg-block">
                <img id="landing_image" src="../src/images/home/blob.png" alt="Landing Image, Blob with a logo">
            </div>
        </section>
        <!-- Landing End -->

        <!-- Menu Start -->
        <section class="home-menu row d-flex justify-content-center align-items-center">
            <div class="menu-items col-10 col-lg-9 d-flex flex-column flex-md-row">
                <a href="termekek.php" class="col-12 col-md-4 item-wrap text-center px-4">
                    <img id="csokorIMG" src="images/home/menu/csokor.png" alt="Menu Image">
                    <h3>Csokor</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil assumenda architecto et placeat
                        velit suscipit?</p>
                </a>
                <a href="termekek.php" class="col-12 col-md-4 item-wrap text-center px-4">
                    <img id="koszoruIMG" src="images/home/menu/koszoru.png" alt="Menu Image">
                    <h3>Koszorú</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil assumenda architecto etplaceat
                        velit suscipit?</p>
                </a>
                <a href="termekek.php" class="col-12 col-md-4 item-wrap text-center px-4">
                    <img id="dekorIMG" src="images/home/menu/dekor.png" alt="Menu Image">
                    <h3>Dekor</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil assumenda architecto et placeat
                        velit suscipit?</p>
                </a>
            </div>
            <div class="text-center text-wrap my-3">
                <p>Egyéb munkáimat a <a class="link" href="galeria.php">Galériában</a> megtalálhatja.</p>
            </div>
        </section>
        <!-- Menu End -->

        <!-- Current Products Start -->
        <section class="current-products row align-items-center" id='swiper'>
            <div class="text-wrap text-center my-2">
                <h1>Aktuális Termékek</h1>
            </div>
            <div class='swiper col-10'>
                <div class='swiper-wrapper'>
                    <?php
                    include_once "components/db.php";
                    $result = $conn->query("SELECT * FROM products WHERE current_e like 1");
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
                    ?>
                </div>
            </div>
            <div class='modal fade' id='Modal' tabindex='-1' aria-hidden='true'>
                <?php
                include_once "components/modal.php";
                ?>
            </div>
        </section>
        <!-- Current Products End -->

    </main>

    <!-- Footer Start -->
    <?php include_once "components/footer.php"
    ?>
    <!-- Footer End -->

</body>

<!-- Scripts Start -->
<script src="scripts/jquery.min.js"></script>
<script src="scripts/navbarMenu.js"></script>
<script src="scripts/navbarLogo.js"></script>
<script src="scripts/swiper.js"></script>
<script src='scripts/shorter.js'></script>
<script src="scripts/productsChange.js"></script>
<script src="scripts/modalHandle.js"></script>
<script src="scripts/cursor.js"></script>
<script src='scripts/mouseEffects.js'></script>
<!-- Scripts End -->

</html>