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
    <link rel="stylesheet" href="../stylesheets/main.css">
</head>

<body>

    <div id="cursor" class="cursor d-none d-lg-block"></div>

    <main class="container-fluid" role="main">
        <section class="row contact-landing d-flex flex-column align-items-center text-center text-wrap">
            <h1 class="my-5">Biztos szeretné törölni?</h1>

            <form method="POST" class="col-8 col-md-6 col-lg-4">
                <div class="button-wrap">
                    <input type="submit" name="yes" value="Igen" id="button_1">
                    <input type="submit" name="cancel" value="Mégsem" id="button_2">
                </div>
            </form>
            <?php
            include_once 'db.php';
            if (isset($_GET['id'])) {
                if (isset($_POST['cancel'])) {
                    echo "<script>location.href='../kezelofelulet.php#products'</script>";
                }
                if (isset($_POST['yes'])) {
                    $id = $_GET['id'];
                    $res = $conn->query("SELECT * FROM `kincseanda`.`products` WHERE `id`='$id'")->fetch_array();
                    unlink('../images/products/' . $res['image']);
                    $conn->query("DELETE FROM `kincseanda`.`products` WHERE  `id`='$id'");
                    echo "<script>location.href='../kezelofelulet.php?products=deleted#products'</script>";
                }
            }
            ?>
        </section>
    </main>
</body>

<!-- Scripts Start -->
<script src="../scripts/jquery.min.js"></script>
<script src="../scripts/navbarMenu.js"></script>
<script src="../scripts/cursor.js"></script>
<script src='../scripts/mouseEffects.js'></script>
<!-- Scripts End -->

</html>