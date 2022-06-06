<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <link rel="icon" href="Images/icon.png" type="image/x-icon">
    <title>Kapcsolat</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">


    <!-- Stylesheet -->
    <link rel="stylesheet" href="stylesheets/main.css">
</head>

<body>

    <!-- Navigation Start -->
    <?php include_once "components/nav.php" ?>
    <!-- Navigation End -->

    <main class="container-fluid">
        <section class="row galeria d-flex align-items-center text-center text-wrap">
            <div class="col-12 col-md-6 d-flex flex-column align-items-center my-3">
                <img id="swiperImage" src="images/d.jpg" alt="Image of the Product">
                <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, eaque?</span>
            </div>
            <div class="col-12 col-md-6 d-flex flex-column align-items-center my-3">
                <img id="swiperImage" src="images/d.jpg" alt="Image of the Product">
                <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, eaque?</span>
            </div>
            <div class="col-12 col-md-6 d-flex flex-column align-items-center my-3">
                <img id="swiperImage" src="images/d.jpg" alt="Image of the Product">
                <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, eaque?</span>
            </div>
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
<!-- Scripts End -->

</html>