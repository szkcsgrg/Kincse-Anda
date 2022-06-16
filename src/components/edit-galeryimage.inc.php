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
            <h1 class="my-5">Galéria Elemének Szerkesztése</h1>

            <?php
            include_once 'db.php';

            //Select from with ID
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $result = $conn->query("SELECT * FROM `kincseanda`.`galery` WHERE `id`='$id'")->fetch_array();
            }
            //Set values
            ?>
            <form method="POST" class="col-8 col-md-6 col-lg-4" enctype="multipart/form-data">
                <div class="button-wrap">
                    <input name="szoveg" placeholder="Szöveg:" class="form-control my-1" type="text"
                        value="<?= $result['description'] ?>">
                    <input type="file" name="image" class="form-control required my-1">
                    <input type="submit" name="save" value="Mentés" id="button_1">
                    <input type="submit" name="cancel" value="Mégsem" id="button_2">
                </div>
            </form>
            <?php

            /*
                select where id

                if image is empty {
                    UPDATE desc = text where id = id
                }
                if image is not empty{
                    remove image from server
                    update image = path, desc = text where id = id
                                            if(text is empty ){
                                                update image = path, desc = text where id = id
                                            }
                                            if(text is not empty){
                                                update image = path, desc = text where id = id
                                            }
                }


                */




            if (isset($_POST['cancel'])) {
                Header("Location: ../kezelofelulet.php#galery");
            }

            if (isset($_POST['save'])) {
                #region vars
                $text = $_POST['szoveg'];
                $id = $_GET['id'];
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
                    $conn->query("UPDATE `kincseanda`.`galery` SET `description`='$text' WHERE  `id`='$id'");
                    header("Refresh:0 url=../kezelofelulet.php?galeryimageED=success#galery");
                } else {
                    unlink('../images/uploads/' . $result['image']);

                    if (in_array($fileActualExt, $allowed)) {

                        if ($fileError === 0) {
                            if ($fileSize < 1000000) {
                                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                                $fileDestination = '../images/uploads/' . $fileNameNew;
                                move_uploaded_file($fileTmpName, $fileDestination);
                                $conn->query("UPDATE `kincseanda`.`galery` SET `image`='$fileNameNew', `description`='$text' WHERE  `id`='$id'");
                                header("Refresh:0 url=../kezelofelulet.php?galeryimageED=success#galery");
                            } else {
                                header("Refresh:0 url=../kezelofelulet.php?galeryimageED=FileSizeError#galery");
                            }
                        } else {
                            header("Refresh:0 url=../kezelofelulet.php?galeryimageED=FileError#galery");
                        }
                    } else {
                        header("Refresh:0 url=../kezelofelulet.php?galeryimageED=FileTypeError#galery");
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