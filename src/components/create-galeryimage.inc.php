<?php
include_once 'db.php';
if (isset($_POST['galery_save'])) {
    $text = $_POST['szoveg'];
    $image = $_FILES['image'];
    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpeg', 'jpg', 'png', 'heic',);

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = './images/uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                if (!empty($text)) {
                    $conn->query("INSERT INTO `kincseanda`.`galery` (`image`, `description`) VALUES ('$fileNameNew', '$text')");
                    echo "<script>location.href='./kezelofelulet.php?galeryimage=created'</script>";
                }
                if (empty($text)) {
                    $conn->query("INSERT INTO `kincseanda`.`galery` (`image`) VALUES ('$fileNameNew')");
                    echo "<script>location.href='./kezelofelulet.php?galeryimage=created'</script>";
                }
            } else {
                echo "<script>location.href='./kezelofelulet.php?galeryimage=FileSizeError'</script>";
            }
        } else {
            echo "<script>location.href='./kezelofelulet.php?galeryimage=FileError'</script>";
        }
    } else {
        echo "<script>location.href='./kezelofelulet.php?galeryimage=FileTypeError'</script>";
    }
}
?>
<form method="POST" class="col-8" enctype="multipart/form-data" onsubmit="return confirm('Biztos?');">
    <input name="szoveg" placeholder="Szöveg:" class="form-control my-1" type="text">
    <input type="file" name="image" class="form-control required my-1">
    <div class="button-wrap">
        <input type="submit" name="galery_save" value="Mentés" id="button_1">
    </div>
</form>