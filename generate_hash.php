<?php
$password_input = "12345";
$hash = password_hash($password_input, PASSWORD_DEFAULT);

echo "Copy hash ini ke database kamu: <br>";
echo "<strong>" . $hash . "</strong>";
?>