<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <link rel="icon" href="Images/icon.png" type="image/x-icon">

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
        Header("Location: belepes.php");
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
                    <h3>Nyitvatartás Megjelenítése</h3>
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
                    echo "<div class='alert alert-success col-10 col-lg-8 my-1'>Sikeres</div>";
                }
                ?>
                <div class="modal fade" id='Modal2' tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Modal body text goes here.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
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
                    if ($_GET['galeryimage'] == 'success') {
                        echo "<div class='alert alert-success col-10 col-lg-8 my-1'>Sikeres</div>";
                    } else {
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
                <form action="components/create-product.inc.php" method="POST" class="col-8">
                    <select name="ketegoria" class="form-control required my-1">
                        <option value="Csokor">Csokor</option>
                        <option value="Koszorú">Koszorú</option>
                        <option value="Dekor">Dekor</option>
                    </select>
                    <input name="megnevezes" placeholder="Megnevezés:" class="form-control required my-1" type="text"
                        required>
                    <textarea name="leiras" placeholder="Leírás" class="form-control required my-1" required></textarea>
                    <input name="ar" placeholder="Ár:" class="form-control required my-1" type="text" required>
                    <input type="file" name="image" class="form-control required my-1">
                    <input name="aktualis" type="checkbox" id="aktualis">
                    <label for=" aktualis">Aktuális termék</label>
                    <div class="button-wrap">
                        <input type="button" name="save" value="Mentés" id="button_1">
                    </div>
                </form>
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
                    if (isset($_GET['galeryimageED'])) {
                        if ($_GET['galeryimageED'] == 'deleted') {
                            echo "<div class='alert alert-success col-10 col-lg-8 my-1'>Sikeres Törlés!</div>";
                        }
                        if ($_GET['galeryimageED'] == 'success') {
                            echo "<div class='alert alert-success col-10 col-lg-8 my-1'>Sikeres Szerkesztés!</div>";
                        }
                        if ($_GET['galeryimageED'] == 'FileSizeError' || $_GET['galeryimageED'] == 'FileError' || $_GET['galeryimageED'] == 'FileTypeError') {
                            echo "<div class='alert alert-danger col-10 col-lg-8 my-1'>Hiba!</div>";
                        }
                    }
                    ?>


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
                    </select>
                </div>
            </div>
            <section class="collectionView" id='adminSwiper'>
                <?php
                include_once "components/adminSwiper.php";
                ?>
            </section>
            <!-- Termekek Edit End -->
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