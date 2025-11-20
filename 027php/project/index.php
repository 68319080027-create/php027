<?php
session_start();

// รับค่า Session
$login_error = $_SESSION['login_error'] ?? '';
$fullname = $_SESSION['full-name'] ?? '';
$username = $_SESSION['username'] ?? '';
$phone = $_SESSION['phone'] ?? '';
$status = $_SESSION['status'] ?? ''; // เช็คสิทธิ์ admin

// ถ้าไม่ใช่ admin → กลับหน้า profile
if (!$login_error && $status !== 'admin') {
    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard - ระบบจัดการ</title>

<style>
body {
    background: linear-gradient(135deg, #0b1b37, #092f57);
    color: #fff;
    font-family: 'Orbitron', 'Segoe UI', Tahoma, sans-serif;
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
    justify-content: flex-end; /* <<< ดันทั้งหมดไปขวา */
    align-items: center;
    padding: 15px 60px;
    box-shadow: 0 2px 10px rgba(0,255,255,0.2);
    position: fixed;
    top: 0;
    z-index: 100;
}

/* กลุ่มฝั่งขวา */
.right-side {
    display: flex;
    align-items: center;
    gap: 50px; /* ระยะห่างระหว่างชื่อกับปุ่ม */
}

.navbar .user {
    font-size: 1.3rem;
    color: #7de0ff;
    font-weight: bold;
}

.navbar a {
    background-color: #00bcd4;
    color: #fff;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 10px;
    font-weight: bold;
    transition: 0.3s;
}
.navbar a:hover {
    background-color: #26c6da;
}

/* 🔹 Admin Box */
.admin-box {
    background: rgba(0,0,0,0.5);
    padding: 40px 60px;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 0 20px rgba(0,255,255,0.25);
    margin: auto;
    margin-top: 120px;
}

h1 {
    margin-bottom: 20px;
    color: #7de0ff;
}

.menu-box {
    margin-top: 30px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.menu-item {
    background: rgba(255,255,255,0.1);
    padding: 20px;
    border-radius: 15px;
    font-size: 1.2rem;
    transition: 0.3s;
    cursor: pointer;
}
.menu-item:hover {
    background: rgba(0,255,255,0.25);
    transform: scale(1.05);
}

/* 🔹 Error message */
.error {
    color: #ff6666;
    margin-bottom: 20px;
}
</style>
</head>
<body>

<!-- 🔸 Navbar -->
<div class="navbar">
    <?php if ($login_error): ?>
        <div class="right-side">
            <div class="user">🚫 การเข้าสู่ระบบล้มเหลว</div>
            <a href="login.php">กลับไป Login</a>
        </div>
    <?php else: ?>
        <div class="right-side">
            <div class="user">🛡 ผู้ดูแลระบบ: <?php echo htmlspecialchars($fullname); ?></div>
            <a href="logout.php">ออกจากระบบ</a>
        </div>
    <?php endif; ?>
</div>

<!-- 🔸 Admin Panel -->
<div class="admin-box">
<?php if ($login_error): ?>
    <h1>❌ เข้าสู่ระบบล้มเหลว</h1>
    <p class="error"><?php echo $login_error; ?></p>
<?php else: ?>
    <h1>🛸 สวัสดีผู้ดูแลระบบสุดเท่</h1>
    <p>ยินดีต้อนรับกลับสู่ระบบควบคุมหลัก</p>
    <p>AD:Name: <?php echo htmlspecialchars($username); ?></p>

    <div class="menu-box">
    <a href="management.php" class="menu-item" style="text-decoration:none; color:white;">
        👤 จัดการผู้ใช้
    </a>

</div>

<?php endif; ?>
</div>

</body>
</html>
