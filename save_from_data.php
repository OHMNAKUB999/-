<?php
header('Content-Type: application/json');

// รับ IP ของผู้ส่งฟอร์ม
$ipAddress = $_SERVER['REMOTE_ADDR'];

// รับข้อมูลจากฟอร์ม
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$description = $_POST['description'] ?? '';
$message = $_POST['message'] ?? '';

// สร้างข้อความที่จะบันทึก
$logEntry = "IP: $ipAddress\nName: $name\nEmail: $email\nDescription: $description\nMessage: $message\n\n";

// กำหนดพาธไฟล์ใหม่
$logFile = 'new_form_submissions.txt';

// บันทึกข้อมูลลงในไฟล์
if (file_put_contents($logFile, $logEntry, FILE_APPEND) === false) {
    // ส่งข้อความข้อผิดพลาดถ้าการบันทึกล้มเหลว
    $response = array('message' => 'เกิดข้อผิดพลาดในการบันทึกข้อมูล');
} else {
    // ส่งข้อความสำเร็จ
    $response = array('message' => 'สำเร็จ! ของคุณจะเข้าไปในไอดีเร็วๆ นี้');
}

// ส่งข้อมูลเป็น JSON response
echo json_encode($response);
?>
