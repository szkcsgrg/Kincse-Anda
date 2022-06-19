<?php
include_once 'db.php';

$id = $_POST['id'];
$row = $conn->query("SELECT * FROM products WHERE id like '$id'")->fetch_assoc();
echo "
<div class='modal-dialog modal-fullscreen'>
    <div class='modal-content'>
        <div class='modal-header'>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body d-flex flex-column flex-column-reverse flex-md-row '>
            <div class='col-12 col-md-6 text-wrap flex-column align-items-center my-5'>
                <div class='accent margin-10'>
                    <h3>" . $row['name'] . "</h3>
                    <span>Azonosító: " . $row['id'] . "</span>
                    <p id='prod-desc'>" . $row['description'] . "</p>

                    <h3>" . $row['price'] . "</h3>
                
                    <div class='button-wrap'>
                        <a href='kapcsolat.php' id='button_1'>Rendelés</a>
                    </div>
                </div>
            </div>
            <div class='col-12 col-md-6 text-center margin-10'>
                <img id='swiperImage' src='./images/products/" . $row['image'] . "' alt='Image of the Product'>
            </div>
        </div>
    </div>
</div>";