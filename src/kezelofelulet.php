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
    /*
        if(Session is null){
            Location belepes.php
        }
    */
    ?>



    <!-- Navigation Start -->
    <?php include_once "components/nav.php" ?>
    <!-- Navigation End -->

    <div id="cursor" class="cursor d-none d-lg-block"></div>

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

                <form action="components/create-openhour.inc.php" method="POST" class="col-8">
                    <input name="nyitvatartas" placeholder="Nyitvatartás:" class="form-control required my-1"
                        type="text" required>
                    <input type="date" name="eltunesiDatum" class="form-control my-1">
                    <div class="button-wrap">
                        <input type="button" name="save" value="Mentés" id="button_1">
                        <input type="button" name="delete" value="Aktuális törlése" id="button_2">
                    </div>
                </form>
            </div>
            <div
                class="col-12 col-md-6 col-lg-4 align-items-center d-flex flex-column justify-content-center text-center my-5">
                <div class="text-wrap">
                    <h3>Új elem a Galériába</h3>
                    <span>-</span>
                </div>

                <form action="components/create-galeryimage.inc.php" method="POST" class="col-8">
                    <input name="szoveg" placeholder="Szöveg:" class="form-control my-1" type="text">
                    <input type="file" name="image" class="form-control required my-1">
                    <div class="button-wrap">
                        <input type="button" name="save" value="Mentés" id="button_1">
                    </div>
                </form>
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

                    <div class="galery-item col-10 col-md-6 col-lg-3 d-flex flex-column align-items-center my-4">
                        <img id="swiperImage" src="images/d.jpg" alt="Image of the Product">
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, eaque?</span>
                        <a href='../Values/update.php?id=" . $row["idhirek"] . " '>
                            <i class='bi bi-pencil-fill' id='pen'></i>
                        </a>
                        <a href='../Values/remove.php?id=" . $row["idhirek"] . " '>
                            <i class='bi bi-trash-fill' id='bin'></i>
                        </a>
                    </div>
                    <div class="galery-item col-10 col-md-6 col-lg-3 d-flex flex-column align-items-center my-4">
                        <img id="swiperImage" src="images/d.jpg" alt="Image of the Product">
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, eaque?</span>
                        <a href='../Values/update.php?id=" . $row["idhirek"] . " '>
                            <i class='bi bi-pencil-fill' id='pen'></i>
                        </a>
                        <a href='../Values/remove.php?id=" . $row["idhirek"] . " '>
                            <i class='bi bi-trash-fill' id='bin'></i>
                        </a>
                    </div>
                    <div class="galery-item col-10 col-md-6 col-lg-3 d-flex flex-column align-items-center my-4">
                        <img id="swiperImage" src="images/d.jpg" alt="Image of the Product">
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, eaque?</span>
                        <a href='../Values/update.php?id=" . $row["idhirek"] . " '>
                            <i class='bi bi-pencil-fill' id='pen'></i>
                        </a>
                        <a href='../Values/remove.php?id=" . $row["idhirek"] . " '>
                            <i class='bi bi-trash-fill' id='bin'></i>
                        </a>
                    </div>
                    <div class="galery-item col-10 col-md-6 col-lg-3 d-flex flex-column align-items-center my-4">
                        <img id="swiperImage" src="images/d.jpg" alt="Image of the Product">
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, eaque?</span>
                        <a href='../Values/update.php?id=" . $row["idhirek"] . " '>
                            <i class='bi bi-pencil-fill' id='pen'></i>
                        </a>
                        <a href='../Values/remove.php?id=" . $row["idhirek"] . " '>
                            <i class='bi bi-trash-fill' id='bin'></i>
                        </a>
                    </div>
                    <div class="galery-item col-10 col-md-6 col-lg-3 d-flex flex-column align-items-center my-4">
                        <img id="swiperImage" src="images/d.jpg" alt="Image of the Product">
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, eaque?</span>
                        <a href='../Values/update.php?id=" . $row["idhirek"] . " '>
                            <i class='bi bi-pencil-fill' id='pen'></i>
                        </a>
                        <a href='../Values/remove.php?id=" . $row["idhirek"] . " '>
                            <i class='bi bi-trash-fill' id='bin'></i>
                        </a>
                    </div>
                    <div class="galery-item col-10 col-md-6 col-lg-3 d-flex flex-column align-items-center my-4">
                        <img id="swiperImage" src="images/d.jpg" alt="Image of the Product">
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, eaque?</span>
                        <a href='../Values/update.php?id=" . $row["idhirek"] . " '>
                            <i class='bi bi-pencil-fill' id='pen'></i>
                        </a>
                        <a href='../Values/remove.php?id=" . $row["idhirek"] . " '>
                            <i class='bi bi-trash-fill' id='bin'></i>
                        </a>
                    </div>


                </div>
            </div>
        </section>
        <!-- Galeria Edit End -->

        <!-- Termekek Edit Start -->
        <scetion id="products" class="collectionView align-items-center" id='swiper'>
            <div class="col-12 align-items-center d-flex flex-column justify-content-center my-5">
                <div class="text-wrap my-4 text-center">
                    <h3>Termékek Szerkesztése</h3>
                    <select class="form-control my-2 mx-2">
                        <option value="">Csokor</option>
                        <option value="">Koszorú</option>
                        <option value="">Dekor</option>
                    </select>
                </div>
                <div class='swiper col-10'>
                    <div class='swiper-wrapper'>
                        <?php
                        $result = $conn->query("Select * FROM testtable");
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
                                            <a href='../Values/update.php?id='' '>
                                            <i class='bi bi-pencil-fill' id='pen2'></i>
                                            </a>
                                            <a href='../Values/remove.php?id='' '>
                                            <i class='bi bi-trash-fill' id='bin2'></i>
                                            </a>
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
            </div>
            <!-- Termekek Edit End -->
        </scetion>
    </main>

</body>

<!-- Scripts Start -->
<script src="scripts/jquery.min.js"></script>
<script src="scripts/navbarMenu.js"></script>
<script src="scripts/swiper.js"></script>
<script src='scripts/shorter.js'></script>
<script src="scripts/cursor.js"></script>
<script src='scripts/mouseEffects.js'></script>
<!-- Scripts End -->

</html>