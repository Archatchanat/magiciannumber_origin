<?php
/*===============เชื่อต่อฐานข้อมูล=================*/
$host="localhost";
$user_name="root";
$pass_word="";
$db="magic2021_db";

$conn =  mysqli_connect($host, $user_name, $pass_word, $db);

if (!$conn) {
    die("เชื่อมต่อฐานข้อมูลไม่สำเร็จ: " . mysqli_connect_error());
}

// if (!$conn->set_charset("utf8")) {
//     printf("Error setting character set to UTF-8: %s\n", $conn->error);
// }


?> 