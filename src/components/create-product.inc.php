<?php
include_once 'db.php';
if (isset($_POST['product_save'])) {

    $category = $_POST['kategoria'];
    if (preg_match('/^[a-zA-Z0-9.]*$', $_POST['megnevezes']) && preg_match('/^[a-zA-Z0-9.]*$', $_POST['leiras']) && preg_match('/^[a-zA-Z0-9.]*$', $_POST['ar'])) {
        echo "<script>location.href='./kezelofelulet.php?product=characterError'</script>";
    } else {
        $megnevezes = $_POST['megnevezes'];
        $leiras = $_POST['leiras'];
        $ar = $_POST['ar'];
    }

    $aktualis = $_POST['aktualis'];

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
                $fileDestination = './images/products/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                if (!empty($aktualis)) {
                    $conn->query("INSERT INTO `kincseanda`.`products` (`category`, `current_e`, `name`, `description`, `price`, `image`) VALUES ('$category', '1', '$megnevezes', '$leiras', '$ar', '$fileNameNew')");
                    echo "<script>location.href='./kezelofelulet.php?product=created'</script>";
                }
                if (empty($aktualis)) {
                    $conn->query("INSERT INTO `kincseanda`.`products` (`category`, `current_e`, `name`, `description`, `price`, `image`) VALUES ('$category', '0', '$megnevezes', '$leiras', '$ar', '$fileNameNew')");
                    echo "<script>location.href='./kezelofelulet.php?product=created'</script>";
                }
            } else {
                echo "<script>location.href='./kezelofelulet.php?product=FileSizeError'</script>";
            }
        } else {
            echo "<script>location.href='./kezelofelulet.php?product=FileError'</script>";
        }
    } else {
        echo "<script>location.href='./kezelofelulet.php?product=FileTypeError'</script>";
    }
}
?>
<form method="POST" class="col-8" enctype="multipart/form-data" onsubmit="return confirm('Biztos?');">
    <select name="kategoria" class="form-control required my-1">
        <option value="Csokor">Csokor</option>
        <option value="Koszor??">Koszor??</option>
        <option value="Dekor">Dekor</option>
    </select>
    <input name="megnevezes" placeholder="Megnevez??s:" class="form-control required my-1" type="text" required>
    <textarea name="leiras" placeholder="Le??r??s" class="form-control required my-1"></textarea>
    <input name="ar" placeholder="??r:" class="form-control required my-1" type="text">
    <input type="file" name="image" class="form-control required my-1" required>
    <input name="aktualis" type="checkbox" id="aktualis">
    <label for="aktualis">Aktu??lis term??k</label>
    <div class="button-wrap">
        <input type="submit" name="product_save" value="Ment??s" id="button_1">
    </div>
</form>