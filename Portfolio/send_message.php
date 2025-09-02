<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $msg   = $_POST['message'];

    $conn = new mysqli("localhost","root","","portfolio_db");
    $sql = "INSERT INTO messages (name,email,message) VALUES ('$name','$email','$msg')";
    if ($conn->query($sql)) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>