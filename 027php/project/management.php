<?php
session_start();
include 'connect.php';

// ป้องกันการเข้าถึงเฉพาะ admin
if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// ดึงข้อมูลจากตาราง users
$user_query = mysqli_query($con, "SELECT * FROM users ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Management - Users</title>
<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: url('https://images.unsplash.com/photo-1444703686981-a3abbc4d4fe3') no-repeat center center fixed;
    background-size: cover;
    color: #fff;
}

.overlay {
    background: rgba(0,0,0,0.8);
    width: 100%;
    min-height: 100vh;
    padding: 20px;
    box-sizing: border-box;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 40px;
    background: rgba(0,0,0,0.7);
    border-bottom: 1px solid rgba(255,255,255,0.2);
}

.navbar .logo {
    font-size: 1.7rem;
    font-weight: bold;
    color: #00eaff;
}

.navbar .right-side {
    display: flex;
    align-items: center;
    gap: 20px;
}

.navbar .right-side .user {
    font-weight: bold;
    color: #fff;
}

.navbar a {
    padding: 10px 20px;
    background: #00bcd4;
    color: #fff;
    border-radius: 10px;
    text-decoration: none;
    font-weight: bold;
}

.navbar a:hover {
    background: #26c6da;
}

.user-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 30px;
}

.user-table th, .user-table td {
    border: 1px solid rgba(255,255,255,0.3);
    padding: 12px;
    text-align: left;
}

.user-table th {
    background: rgba(0,200,255,0.2);
    color: #fff;
}

.user-table tr:nth-child(even) {
    background: rgba(255,255,255,0.05);
}

.user-table tr:hover {
    background: rgba(0,200,255,0.2);
    transition: 0.2s;
}
</style>
</head>
<body>
<div class="overlay">

    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">🌌 Admin Panel</div>
        <div class="right-side">
            <div class="user">🛡 Admin: <?php echo htmlspecialchars($_SESSION['full-name']); ?></div>
            <a href="logout.php">ออกจากระบบ</a>
        </div>
    </div>

    <h1 style="text-align:center; margin-top:50px;">👤 รายชื่อสมาชิกทั้งหมด</h1>

    <table class="user-table">
    <tr>
        <th>ชื่อผู้ใช้</th>
        <th>ชื่อ-สกุล</th>
        <th>เบอร์โทร</th>
        <th>สถานะ</th>
        <th>วันที่สร้าง</th>
    </tr>

    <?php while ($u = mysqli_fetch_assoc($user_query)): ?>
    <tr>
        <td><?php echo htmlspecialchars($u['username']); ?></td>
        <td><?php echo htmlspecialchars($u['full-name']); ?></td>
        <td><?php echo htmlspecialchars($u['phone']); ?></td>
        <td><?php echo htmlspecialchars($u['status']); ?></td>
        <td><?php echo date('d/m/Y H:i', strtotime($u['created_at'])); ?></td>
    </tr>
    <?php endwhile; ?>
    </table>

</div>
</body>
</html>
