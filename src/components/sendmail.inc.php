<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message =  $_POST['message'];

    $to = "szkcsgrg@gmail.com";
    $subject = "Weboldalról küldve.";
    $body = "";
    $body .= "Küldő: \r\n";
    $body .= "Email cím:" . $email . "\r\n";
    $body .= "Telefonszám:" . $phone . "\r\n";
    $body .= "\r\n" .  $message . "\r\n";

    mail($to, $subject, $body);
    echo "<script>location.href='../kapcsolat.php?message=sent'</script>";
}