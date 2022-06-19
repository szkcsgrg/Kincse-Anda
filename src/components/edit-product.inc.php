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
            <h1 class="my-5">Termék Elemének Szerkesztése</h1>

            <?php
            include_once 'db.php';

            //Select from with ID
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $result = $conn->query("SELECT * FROM `kincseanda`.`products` WHERE `id`='$id'")->fetch_array();
                if ($result['current_e'] == 1) {
                    $aktualis_E = 'yes';
                } else {
                    $aktualis_E = 'no';
                }
            }
            //Set values
            ?>
            <form method="POST" class="col-8" enctype="multipart/form-data">
                <select name="kategoria" class="form-control required my-1">
                    <option value="Csokor">Csokor</option>
                    <option value="Koszorú">Koszorú</option>
                    <option value="Dekor">Dekor</option>
                </select>
                <input name="megnevezes" placeholder="Megnevezés:" class="form-control required my-1" type="text"
                    require value="<?= $result['name'] ?>">
                <textarea name="leiras" placeholder="Leírás" class="form-control required my-1"
                    require><?= $result['description'] ?></textarea>
                <input name="ar" placeholder="Ár:" class="form-control required my-1" type="text" require
                    value="<?= $result['price'] ?>">
                <input type="file" name="image" class="form-control required my-1">
                <input name="aktualis" type="checkbox" id="aktualis"
                    <?php if ($aktualis_E == 'yes') echo "checked='checked'"; ?>>
                <label for="aktualis">Aktuális termék</label>
                <div class="button-wrap">
                    <input type="submit" name="save" value="Mentés" id="button_1">
                    <input type="submit" name="cancel" value="Mégsem" id="button_2">
                </div>
            </form>
            <?php
            if (isset($_POST['cancel'])) {
                echo "<script>location.href='../kezelofelulet.php#galery'</script>";
            }

            if (isset($_POST['save'])) {
                #region vars
                $id = $_GET['id'];
                $category = $_POST['kategoria'];
                $name = $_POST['megnevezes'];
                $text = $_POST['leiras'];
                $ar = $_POST['ar'];
                if (isset($_POST['aktualis'])) {
                    if ($_POST['aktualis'] == 0) {
                        echo $aktualis = 1;
                    }
                } else {
                    echo $aktualis = 0;
                }

                $image = $_FILES['image'];
                $fileName = $_FILES['image']['name'];
                $fileTmpName = $_FILES['image']['tmp_name'];
                $fileSize = $_FILES['image']['size'];
                $fileError = $_FILES['image']['error'];
                $fileType = $_FILES['image']['type'];
                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));
                $allowed = array('jpeg', 'jpg', 'png', 'heic',);
                #endregion vars

                $result = $conn->query("SELECT * FROM `kincseanda`.`galery` WHERE `id`='$id'")->fetch_array();
                if ($fileError === 4) {
                    $conn->query("UPDATE `kincseanda`.`products` SET `category`='$category', `current_e`='$aktualis', `name`='$name', `description`='$text', `price`='$ar' WHERE  `id`='$id'");
                    echo "<script>location.href='../kezelofelulet.php?products=edited#products'</script>";
                } else {
                    unlink('../images/products/' . $result['image']);
                    if (in_array($fileActualExt, $allowed)) {
                        if ($fileError === 0) {
                            if ($fileSize < 1000000) {
                                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                                $fileDestination = '../images/products/' . $fileNameNew;
                                move_uploaded_file($fileTmpName, $fileDestination);
                                $conn->query("UPDATE `kincseanda`.`products` SET `category`='$category', `current_e`='$aktualis', `name`='$name', `description`='$text', `price`='$ar', `image`='$fileNameNew' WHERE  `id`='$id'");
                                echo "<script>location.href='../kezelofelulet.php?products=edited#products'</script>";
                            } else {
                                echo "<script>location.href='../kezelofelulet.php?products=FileSizeError#products'</script>";
                            }
                        } else {
                            echo "<script>location.href='../kezelofelulet.php?products=FileError#products'</script>";
                        }
                    } else {
                        echo "<script>location.href='../kezelofelulet.php?products=FileTypeError#products'</script>";
                    }
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