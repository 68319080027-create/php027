<?php
// เชื่อมต่อฐานข้อมูล
include 'connect.php';

// รับค่าจากฟอร์ม
$username = $_POST['username'] ?? '';
$phone = $_POST['phone'] ?? '';
$fullname = $_POST['full-name'] ?? '';
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

$status = '';
$message = '';

// ตรวจสอบว่ากรอกข้อมูลครบหรือไม่
if (empty($username) || empty($phone) || empty($fullname) || empty($password) || empty($confirm_password)) {
    $status = 'error';
    $message = "❌ กรุณากรอกข้อมูลให้ครบ";
} 
// ตรวจสอบรหัสผ่านตรงกัน
elseif ($password !== $confirm_password) {
    $status = 'error';
    $message = "❌ รหัสผ่านไม่ตรงกัน";
} else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, phone, `full-name`, password) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $username, $phone, $fullname, $hashed_password);
        if (mysqli_stmt_execute($stmt)) {
            $status = 'success';
            $message = "✅ สมัครสมาชิกสำเร็จ!";
        } else {
            $status = 'error';
            $message = "❌ เกิดข้อผิดพลาดในการสมัครสมาชิก: " . mysqli_error($con);
        }
        mysqli_stmt_close($stmt);
    } else {
        $status = 'error';
        $message = "❌ เกิดข้อผิดพลาดในการเตรียมคำสั่ง SQL: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>สถานะการสมัครสมาชิก</title>
<style>
body {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: url('https://static.trueplookpanya.com/tppy/member/m_567500_570000/569760/cms/images/shutterstock_712919503.jpg') no-repeat center center fixed;
    background-size: cover;
    color: #fff;
}
.container {
    text-align: center;
    background: rgba(0,0,0,0.5);
    padding: 40px;
    border-radius: 20px;
    backdrop-filter: blur(10px);
    box-shadow: 0 0 25px rgba(255,160,80,0.4);
}
.message {
    padding: 20px;
    border-radius: 15px;
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 25px;
}
.success {
    background: rgba(255,200,120,0.3);
    color: #ffd699;
}
.error {
    background: rgba(255,100,100,0.3);
    color: #ff6b6b;
}
.btn-login {
    padding: 12px 30px;
    font-size: 16px;
    font-weight: bold;
    color: #4d2b10;
    background: linear-gradient(45deg,#d8894a,#e7a96d,#ffcc99);
    border: none;
    border-radius: 12px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    transition: 0.25s;
}
.btn-login:hover {
    transform: scale(1.05);
    box-shadow: 0 0 15px rgba(255,200,150,0.7);
}
</style>
</head>
<body>
<div class="container">
    <?php if ($status === 'success'): ?>
        <div class="message success"><?= $message ?></div>
    <?php elseif ($status === 'error'): ?>
        <div class="message error"><?= $message ?></div>
    <?php endif; ?>

    <a href="login.php" class="btn-login">ไปหน้าเข้าสู่ระบบ</a>
</div>
</body>
</html>
