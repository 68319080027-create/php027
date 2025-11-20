<?php
session_start();
include 'connect.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (!$username || !$password) {
    $_SESSION['login_error'] = "⚠️ กรุณากรอกข้อมูลให้ครบ!";
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {

    if (password_verify($password, $row['password'])) {

        // เก็บข้อมูล session
        $_SESSION['cus_id'] = $row['cus_id'];
        $_SESSION['full-name'] = $row['full-name']; // ← แก้จาก full-name
        $_SESSION['username'] = $row['username'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['status'] = $row['status'];

        // ล้าง error
        $_SESSION['login_error'] = "";

        // ถ้าเป็นแอดมิน → ไปหน้า admin
        if ($row['status'] === 'admin') {
            header("Location: index.php");
            exit();
        }

        // ถ้าเป็นผู้ใช้ทั่วไป
        header("Location: profile.php");
        exit();

    } else {
        $_SESSION['login_error'] = "❌ รหัสผ่านไม่ถูกต้อง!";
        header("Location: login.php");
        exit();
    }

} else {
    $_SESSION['login_error'] = "❌ ไม่พบบัญชีผู้ใช้!";
    header("Location: login.php");
    exit();
}
