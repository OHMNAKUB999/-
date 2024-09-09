<?php
// บันทึก IP ของผู้ส่งฟอร์ม
$ipAddress = $_SERVER['REMOTE_ADDR'];

// รับข้อมูลจากฟอร์ม
$name = $_POST['name'];
$email = $_POST['email'];
$description = $_POST['description'];
$message = $_POST['message'];

// สร้างข้อความที่จะบันทึก
$logEntry = "IP: $ipAddress\nName: $name\nEmail: $email\nDescription: $description\nMessage: $message\n\n";

// บันทึกข้อมูลลงในไฟล์
file_put_contents('form_submissions.txt', $logEntry, FILE_APPEND);

// ส่งข้อมูลเป็น JSON response
$response = array('message' => 'สำเร็จ! ของคุณจะเข้าไปในไอดีเร็วๆ นี้');
header('Content-Type: application/json');
echo json_encode($response);
?>
