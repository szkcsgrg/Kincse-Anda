<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <link rel="icon" href="Images/icon.png" type="image/x-icon">
    <title>Kincse Adna - Csokor, Koszoró, Dekor</title>

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

    <!-- Stylesheet -->
    <link rel="stylesheet" href="stylesheets/main.css">

</head>

<body>

    <!-- Navigation Start -->
    <?php include_once "components/nav.php" ?>
    <!-- Navigation End -->

    <main class="container-fluid">

        <!-- Landing Start -->
        <section class="landing row d-flex justify-content-center align-items-center flex-row flex-lg-row-reverse">
            <div class="col-12 col-lg-6 landing_image_wrap d-none d-md-block">
                <img id="landing_image" src="../src/images/home/blob.png" alt="Landing Image, Blob with a logo">
            </div>
            <div class="col-12 col-lg-6 px-10 my-10">
                <div class="text-wrap">
                    <h1>Kincse Anda - Csokor, Koszorú, Dekor</h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
                <div class="button-wrap">
                    <a id="button_1" href="galery.php">Galéria</a>
                    <a id="button_2" href="products.php">Termékek</a>
                </div>
                <div class="text-wrap my-3">
                    <?php
                    $result = "Nyitvatartás: Ma, Holnap";
                    echo "<p class='bold'>$result</p>";
                    ?>
                </div>
            </div>
        </section>
        <!-- Landing End -->
        <div class="nextsession">
            <h1>test</h1>
        </div>

    </main>

    <!-- Footer Start -->
    <?php //include_once "components/footer.php" 
    ?>
    <!-- Footer End -->

</body>

<!-- Scripts Start -->
<script src="scripts/jquery.min.js"></script>
<script src="scripts/navbar.js"></script>
<!-- Scripts End -->

</html>