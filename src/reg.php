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


    <!-- Stylesheet -->
    <link rel="stylesheet" href="stylesheets/main.css">
</head>

<body>
    <!-- Navigation Start -->
    <?php include_once "components/nav.php" ?>
    <!-- Navigation End -->

    <div id="cursor" class="cursor d-none d-lg-block"></div>

    <main class="container-fluid" role="main">
        <section class="row contact-landing d-flex flex-column align-items-center text-center text-wrap">
            <h1 class="my-5">Regisztráció</h1>

            <form method="POST" action="components/reg.inc.php" class="col-8 col-md-6 col-lg-4">
                <input name="azonosito" placeholder="Azonosító" class="form-control required my-1" type="text" required>
                <input name="password" placeholder="Jelszó" class="form-control required my-1" type="password" required>
                <input name="passwordRe" placeholder="Jelszó Újra" class="form-control required my-1" type="password"
                    required>
                <div class="button-wrap">
                    <input type="submit" name="submit" value="Belépés" id="button_1">
                </div>
            </form>
        </section>
    </main>
</body>

<!-- Scripts Start -->
<script src="scripts/jquery.min.js"></script>
<script src="scripts/navbarMenu.js"></script>
<script src="scripts/cursor.js"></script>
<script src='scripts/mouseEffects.js'></script>
<!-- Scripts End -->

</html>