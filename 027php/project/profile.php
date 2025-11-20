<?php
session_start();

$login_error = $_SESSION['login_error'] ?? '';
$fullname = $_SESSION['full-name'] ?? '';
$username = $_SESSION['username'] ?? '';
$phone = $_SESSION['phone'] ?? '';
$password_real = $_SESSION['password_real'] ?? ''; // รหัสจริง
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profile - ดาวอังคาร</title>
<style>
body {
    background: linear-gradient(135deg, #4a0f0f, #b7410e);
    color: #fff;
    font-family: 'Orbitron', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    height: 100vh;
    display: flex;
    flex-direction: column;
}

/* 🔹 Navbar */
.navbar {
    width: 100%;
    background: rgba(0,0,0,0.7);
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 60px 15px 40px; /* ปรับขวาให้เข้ามานิดนึง */
    box-shadow: 0 2px 10px rgba(255,255,255,0.1);
    position: fixed;
    top: 0;
    left: 0;
    z-index: 100;
}
.navbar .user {
    font-size: 1.2rem;
    color: #ffcc99;
    font-weight: bold;
}
.navbar a {
    background-color: #ff4500;
    color: #fff;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 10px;
    font-weight: bold;
    transition: background 0.3s;
}
.navbar a:hover {
    background-color: #ff7f50;
}

/* 🔹 Profile box */
.profile-box {
    background: rgba(0,0,0,0.5);
    padding: 40px 60px;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
    margin: auto;
    margin-top: 120px; /* เว้นจาก navbar */
}
h1 {
    margin-bottom: 20px;
    color: #ffcc99;
}
p {
    font-size: 1.2rem;
    margin-bottom: 15px;
}
.error {
    color: #ff6666;
    margin-bottom: 20px;
}

/* 🔹 ชื่อในกรอบ */
.profile-name {
    font-size: 1.8rem;
    color: #ffd8b1;
    font-weight: bold;
    text-shadow: 0 0 15px rgba(255, 200, 150, 0.5);
    margin-bottom: 10px;
}
</style>
</head>
<body>

<!-- 🔸 Navbar -->
<div class="navbar">
    <?php if ($login_error): ?>
        <div class="user">🚫 การเข้าสู่ระบบล้มเหลว</div>
        <a href="login.php">กลับไปหน้า Login</a>
    <?php else: ?>
        <div class="user">👤 <?php echo htmlspecialchars($fullname); ?></div>
        <a href="logout.php">ออกจากระบบ</a>
    <?php endif; ?>
</div>

<!-- 🔸 Profile Box -->
<div class="profile-box">
<?php if ($login_error): ?>
    <h1>❌ เข้าสู่ระบบไม่สำเร็จ</h1>
    <p class="error"><?php echo $login_error; ?></p>
<?php else: ?>
    <div class="profile-name">สวัสดีพวกลูกกระจ๊อก <?php echo htmlspecialchars($fullname); ?> 🌕</div>
    <h1>🚀 ยินดีต้อนรับ!</h1>
    <p>Username: <?php echo htmlspecialchars($username); ?></p>
    <p>Phone: <?php echo htmlspecialchars($phone); ?></p>
<?php endif; ?>
</div>

</body>
</html>
