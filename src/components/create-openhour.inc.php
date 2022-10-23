<?php
include_once 'db.php';
if (isset($_POST['openHour_save'])) {
    $text = $_POST['nyitvatartas'];
    $date = $_POST['eltunesiDatum'];
    if (isset($text) && !empty($date)) {
        $conn->query("INSERT INTO `openhour` (`text`, `deleteDate`) VALUES ('$text', '$date')");
        echo "<script>location.href='./kezelofelulet.php?openhour=created'</script>";
    }
    if (isset($text) && empty($date)) {
        $conn->query("INSERT INTO `openhour` (`text`) VALUES ('$text')");
        echo "<script>location.href='./kezelofelulet.php?openhour=created'</script>";
    }
}
if (isset($_POST['openHour_delete'])) {
    $current = $conn->query("SELECT * FROM openhour ORDER BY id desc LIMIT 1");
    while ($row = $current->fetch_assoc()) {
        $id = $row["id"];
    }
    $conn->query("DELETE FROM `openhour` WHERE  `id`=$id");
    echo "<script>location.href='./kezelofelulet.php?openhour=deleted'</script>";
}
?>
<form method="POST" class="col-8" onsubmit="return confirm('Biztos?');">
    <input type="text" name="nyitvatartas" placeholder="Nyitvatartás:" class="form-control required my-1">
    <input type="date" name="eltunesiDatum" class="form-control my-1">
    <div class="button-wrap">
        <input type="submit" name="openHour_save" value="Mentés" id="button_1">
        <input type="submit" name="openHour_delete" value="Aktuális törlése" id="button_2">
    </div>
</form>