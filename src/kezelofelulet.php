<?php
echo "";
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <link rel="icon" href="Images/icon.png" type="image/x-icon">
    <title>Kezelőfelület</title>

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

    <?php
    include_once "components/db.php";
    session_start();
    if (!isset($_SESSION['azonosito'])) {
        header("Location: belepes.php");
    }
    ?>



    <!-- Navigation Start -->
    <?php include_once "components/nav.php" ?>
    <!-- Navigation End -->

    <div id="cursor" class="cursor d-none d-lg-block"></div>

    <a href="#" id="gototop" class="gototop d-show text-center d-flex justify-content-center align-items-center"><i
            class="bi bi-arrow-up"></i></a>

    <main class="container-fluid" role="main">

        <!-- Create Start -->
        <section id="create" class="row create-section align-items-start">
            <div
                class="col-12 col-md-6 col-lg-4 align-items-center d-flex flex-column justify-content-center text-center my-5">
                <div class="text-wrap">
                    <h3>Kezdőlap Szöveg</h3>
                    <?php
                    include_once "components/db.php";
                    $openH = $conn->query("SELECT * FROM openhour ORDER BY id desc LIMIT 1");
                    while ($row = $openH->fetch_assoc()) {
                        echo "<span>" . $row["text"] . "</span>";
                    }
                    ?>
                </div>
                <?php
                include_once 'components/create-openhour.inc.php';
                if (isset($_GET['openhour'])) {
                    if ($_GET['openhour'] == 'created') {
                        echo "<div class='alert alert-success col-10 col-lg-8 my-1'>Sikeres Létrehozás</div>";
                    } else {
                        echo "<div class='alert alert-warning col-10 col-lg-8 my-1'>Sikeres Törlés</div>";
                    }
                }
                ?>
            </div>
            <div
                class="col-12 col-md-6 col-lg-4 align-items-center d-flex flex-column justify-content-center text-center my-5">
                <div class="text-wrap">
                    <h3>Új elem a Galériába</h3>
                    <span>-</span>
                </div>
                <?php
                include_once 'components/create-galeryimage.inc.php';
                if (isset($_GET['galeryimage'])) {
                    if ($_GET['galeryimage'] == 'created') {
                        echo "<div class='alert alert-success col-10 col-lg-8 my-1'>Sikeres Létrehozás</div>";
                    }
                    if ($_GET['galeryimage'] == 'FileSizeError' || $_GET['galeryimage'] == 'FileError' || $_GET['galeryimage'] == 'FileTypeError') {
                        echo "<div class='alert alert-danger col-10 col-lg-8 my-1'>Hiba!</div>";
                    }
                }
                ?>
            </div>
            <div
                class="col-12 col-md-6 col-lg-4 align-items-center d-flex flex-column justify-content-center text-center my-5">
                <div class="text-wrap">
                    <h3>Termék Létrehozása</h3>
                    <span>-</span>
                </div>
                <?php
                include_once "components/create-product.inc.php";
                if (isset($_GET['product'])) {
                    if ($_GET['product'] == 'created') {
                        echo "<div class='alert alert-success col-10 col-lg-8 my-1'>Sikeres Létrehozás!</div>";
                    }
                    if ($_GET['product'] == 'FileSizeError' || $_GET['product'] == 'FileError' || $_GET['product'] == 'FileTypeError') {
                        echo "<div class='alert alert-danger col-10 col-lg-8 my-1'>Hiba!</div>";
                    }
                    if ($_GET['product'] == 'characterError') {
                        echo "<div class='alert alert-danger col-10 col-lg-8 my-1'>Illetéktelen karatker használata!</div>";
                    }
                }
                ?>
            </div>



        </section>
        <!-- Create End -->

        <!-- Galeria Edit Start -->
        <section id="galery" class="row galery-edit align-items-start">
            <div class="col-12 align-items-center d-flex flex-column justify-content-center text-center my-5">
                <div class="text-wrap my-4">
                    <h3>Galéria Szerkesztése</h3>
                </div>
                <div class="row d-flex flex-row justify-content-evenly text-wrap">
                    <?php
                    include_once 'components/db.php';
                    $result = $conn->query("SELECT * FROM galery");
                    while ($row = $result->fetch_assoc()) {
                        if (!empty($row['description'])) {
                            echo "<div class='galery-item col-10 col-md-6 col-lg-3 d-flex flex-column align-items-center my-4'>
                                    <img class='galery-image' src='images/uploads/" . $row['image'] . "' alt='Image of the Product'>
                                    <p>" . $row['description'] . "</p>
                                    <a href='components/edit-galeryimage.inc.php?id=" . $row["id"] . " '>
                                        <i class='bi bi-pencil-fill' id='pen'></i>
                                    </a>
                                    <a href='components/delete-galeryimage.inc.php?id=" . $row["id"] . " '>
                                        <i class='bi bi-trash-fill' id='bin'></i>
                                    </a>
                                </div>";
                        } else {
                            echo "<div class='galery-item col-10 col-md-6 col-lg-3 d-flex flex-column align-items-center my-4'>
                                    <img class='galery-image' src='images/uploads/" . $row['image'] . "' alt='Image of the Product'>
                                    <p>-</p>
                                    <a href='components/edit-galeryimage.inc.php?id=" . $row["id"] . " '>
                                        <i class='bi bi-pencil-fill' id='pen'></i>
                                    </a>
                                    <a href='components/delete-galeryimage.inc.php?id=" . $row["id"] . " '>
                                        <i class='bi bi-trash-fill' id='bin'></i>
                                    </a>
                                </div>";
                        }
                    }
                    ?>

                    <div class="col-12 text-center d-flex justify-content-center align-items-center">
                        <?php
                        if (isset($_GET['galeryimageED'])) {
                            if ($_GET['galeryimageED'] == 'deleted') {
                                echo "<div class='alert alert-warning col-10 col-lg-8 my-1'>Sikeres Törlés!</div>";
                            }
                            if ($_GET['galeryimageED'] == 'edited') {
                                echo "<div class='alert alert-success col-10 col-lg-8 my-1'>Sikeres Szerkesztés!</div>";
                            }
                            if ($_GET['galeryimageED'] == 'FileSizeError' || $_GET['galeryimageED'] == 'FileError' || $_GET['galeryimageED'] == 'FileTypeError') {
                                echo "<div class='alert alert-danger col-10 col-lg-8 my-1'>Hiba!</div>";
                            }
                        }
                        ?>
                    </div>

                </div>
            </div>
        </section>
        <!-- Galeria Edit End -->

        <!-- Termekek Edit Start -->
        <section id="products" class="align-items-center">
            <div class="col-12 align-items-center d-flex flex-column justify-content-center">
                <div class="text-wrap my-4 text-center">
                    <h3>Termékek Szerkesztése</h3>
                    <select id="myDropDown" name="categorySelect" class="form-control my-2 mx-md-2">
                        <option value='Összes'>Összes</option>
                        <option value="Csokor">Csokor</option>
                        <option value="Koszorú">Koszorú</option>
                        <option value="Dekor">Dekor</option>
                        <option value="Aktualis">Aktuális</option>
                    </select>
                </div>
            </div>
            <section class="collectionView" id='adminSwiper'>
                <?php
                include_once "components/adminSwiper.php";
                ?>
            </section>
            <!-- Termekek Edit End -->
            <div class="col-12 text-center d-flex justify-content-center align-items-center my-2">
                <?php
                if (isset($_GET['products'])) {
                    if ($_GET['products'] == 'deleted') {
                        echo "<div class='alert alert-warning col-10 col-lg-4 my-1'>Sikeres Törlés!</div>";
                    }
                    if ($_GET['products'] == 'edited') {
                        echo "<div class='alert alert-success col-10 col-lg-4 my-1'>Sikeres Szerkesztés!</div>";
                    }
                    if ($_GET['products'] == 'FileSizeError' || $_GET['products'] == 'FileError' || $_GET['products'] == 'FileTypeError') {
                        echo "<div class='alert alert-danger col-10 col-lg-4 my-1'>Hiba!</div>";
                    }
                }
                ?>
            </div>
        </section>
    </main>

</body>

<!-- Scripts Start -->
<script src="scripts/jquery.min.js"></script>
<script src="scripts/navbarMenu.js"></script>
<script src="scripts/swiper.js"></script>
<script src="scripts/productsChange.js"></script>
<script src="scripts/cursor.js"></script>
<script src='scripts/mouseEffects.js'></script>
<!-- Scripts End -->

</html>