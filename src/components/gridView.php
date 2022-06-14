<div class="row align-items-center d-flex justify-content-evenly">

    <?php
    include_once "db.php";

    if (isset($_POST["category"])) {
        $category = $_POST["category"];
        if ($_POST["category"] == "Összes") {
            $category = "";
        }
    } else {
        $category = "";
    }

    if (empty($category)) {
        $result = $conn->query("SELECT * FROM products");
        while ($row = $result->fetch_assoc()) {
            echo "  
            <a data-bs-toggle='modal' data-bs-target='#Modal' class='item col-5 col-md-3 text-center button_prod' id='" . $row['id'] . "'>
                <h3 id='" . $row['id'] . "'> " . $row['name'] . "</h3>
                <img id='" . $row['id'] . "' class='swiperImage' src='images/d.jpg' alt='Image of the Product'>
                <h3 id='" . $row['id'] . "'>" . $row['price'] . "</h3>
            </a>";
        }
    } else {
        $result = $conn->query("SELECT * FROM products WHERE category like '$category'");
        while ($row = $result->fetch_assoc()) {
            echo "
            <a data-bs-toggle='modal' data-bs-target='#Modal' class='item col-5 col-md-3 text-center button_prod' id='" . $row['id'] . "'>
                <h3 id='" . $row['id'] . "'> " . $row['name'] . "</h3>
                <img id='" . $row['id'] . "' class='swiperImage' src='images/d.jpg' alt='Image of the Product'>
                <h3 id='" . $row['id'] . "'>" . $row['price'] . "</h3>
            </a>";
        }
    }
    ?>

</div>