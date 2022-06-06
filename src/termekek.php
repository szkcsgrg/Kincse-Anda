<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <link rel="icon" href="Images/icon.png" type="image/x-icon">
    <title>Termékek</title>

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

    <main class="container-fluid">
        <section class="row product-landing d-flex justify-content-center align-items-center flex-row">
            <div class="col-10 col-md-6 col-lg-6 d-flex flex-column flex-md-row text-center">
                <select class="form-control my-2 mx-2">
                    <option value="">Csokor</option>
                    <option value="">Koszorú</option>
                    <option value="">Dekor</option>
                </select>
                <input placeholder="Termék neve" type="text" name="filter" id="filter"
                    class="d-none filter form-control my-2 mx-2">
                <button id="chnageView" onclick="changeView()" class="form-control my-2 mx-2">
                    <i class="bi bi-grid" title="Felosztott Nézet" data-bs-toggle="tooltip" data-bs-placement="top"></i>
                    <i class="bi bi-collection d-none" title="Csoportosított Nézet" data-bs-toggle="tooltip"
                        data-bs-placement="top"></i>
                </button>
            </div>
        </section>


        <scetion class="collectionView">
            <?php
            include_once "components/db.php";
            $result = $conn->query("Select * From testtable");
            include_once "components/swiperView.php";
            ?>
        </scetion>

        <section class="gridView d-none">
            <?php
            include_once "components/db.php";
            $result = $conn->query("Select * From testtable");
            include_once "components/gridView.php";
            ?>
        </section>
    </main>

    <!-- Footer Start -->
    <?php include_once "components/footer.php"
    ?>
    <!-- Footer End -->

</body>

<!-- Scripts Start -->
<script src="scripts/jquery.min.js"></script>
<script src="scripts/navbarMenu.js"></script>
<script src="scripts/swiper.js"></script>
<script src="scripts/view.js"></script>
<script src='scripts/shorter.js'></script>
<!-- Scripts End -->

</html>