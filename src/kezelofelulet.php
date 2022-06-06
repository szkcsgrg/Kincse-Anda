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

    <?php
    /*
        if(Session is null){
            Location belepes.php
        }
    */
    ?>



    <!-- Navigation Start -->
    <?php include_once "components/nav.php" ?>
    <!-- Navigation End -->

    <main class="container-fluid">

        <!-- Create Start -->
        <section class="row create-section align-items-start">
            <div
                class="col-12 col-md-6 col-lg-4 align-items-center d-flex flex-column justify-content-center text-center my-5">
                <div class="text-wrap">
                    <h3>Nyitvatartás Megjelenítése</h3>
                    <span>Select From Database Current</span>
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
                    <label for="aktualis">Aktuális termék</label>
                    <div class="button-wrap">
                        <input type="button" name="save" value="Mentés" id="button_1">
                    </div>
                </form>
            </div>
        </section>
        <!-- Create End -->

        <!-- Galeria Edit Start -->
        <!-- Galeria Edit End -->

        <!-- Termekek Edit Start -->
        <!-- Termekek Edit End -->

    </main>

</body>

<!-- Scripts Start -->
<script src="scripts/jquery.min.js"></script>
<script src="scripts/navbarMenu.js"></script>
<!-- Scripts End -->

</html>