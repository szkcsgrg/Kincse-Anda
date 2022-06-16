<form method="POST" class="col-8" data-bs-toggle="modal" data-bs-target="#Modal2">
    <!-- onsubmit="return confirm('Biztos?');" -->
    <!-- action='components/create-openhour.inc.php' -->
    <input type="text" name="nyitvatartas" placeholder="Nyitvatartás:" class="form-control required my-1">
    <input type="date" name="eltunesiDatum" class="form-control my-1">
    <div class="button-wrap">
        <input type="submit" name="openHour_save" value="Mentés" id="button_1">
        <input type="submit" name="openHour_delete" value="Aktuális törlése" id="button_2">
    </div>

</form>
<?php

// Vars
include_once 'db.php';
if (isset($_POST['openHour_save'])) {
    $text = $_POST['nyitvatartas'];
    $date = $_POST['eltunesiDatum'];
    if (isset($text) && !empty($date)) {
        $conn->query("INSERT INTO `kincseanda`.`openhour` (`text`, `deleteDate`) VALUES ('$text', '$date')");
        header("Refresh:0 url=kezelofelulet.php?openhour=success");
    }
    if (isset($text) && empty($date)) {
        $conn->query("INSERT INTO `kincseanda`.`openhour` (`text`) VALUES ('$text')");
        header("Refresh:0 url=kezelofelulet.php?openhour=success");
    }
}
if (isset($_POST['openHour_delete'])) {
    $current = $conn->query("SELECT * FROM openhour ORDER BY id desc LIMIT 1");
    while ($row = $current->fetch_assoc()) {
        $id = $row["id"];
    }
    $conn->query("DELETE FROM `kincseanda`.`openhour` WHERE  `id`=$id");
    header("Refresh:0 url=kezelofelulet.php?openhour=success");
}