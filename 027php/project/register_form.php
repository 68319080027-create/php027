<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>สมัครสมาชิก | Space Theme</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
    body {
      background: radial-gradient(circle at top, #0b0f2e 0%, #000000 100%);
      background-image: url('https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?auto=format&fit=crop&w=1600&q=80');
      background-size: cover;
      background-position: center;
      color: #e0e0e0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .register-form {
      background: rgba(15, 20, 40, 0.9);
      max-width: 420px;
      width: 90%;
      padding: 35px 40px;
      border-radius: 14px;
      box-shadow: 0 0 25px rgba(0, 200, 255, 0.25), 0 0 10px rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(10px);
    }

    .register-form h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #7fdfff;
      text-shadow: 0 0 8px #00baff;
      letter-spacing: 1px;
    }

    .form-group {
      margin-bottom: 18px;
    }

    label {
      display: block;
      margin-bottom: 7px;
      color: #b0e0ff;
      font-weight: 500;
    }

    input[type="text"],
    input[type="password"],
    input[type="tel"] {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #2a3550;
      border-radius: 6px;
      background: rgba(255, 255, 255, 0.08);
      color: #e8f4ff;
      font-size: 1rem;
      transition: all 0.3s ease;
    }

    input:focus {
      border-color: #00baff;
      background: rgba(0, 30, 60, 0.8);
      box-shadow: 0 0 8px #00baff;
      outline: none;
    }

    .btn-submit {
      width: 100%;
      padding: 12px;
      background: linear-gradient(90deg, #00baff, #0062ff);
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      letter-spacing: 0.5px;
      text-transform: uppercase;
    }

    .btn-submit:hover {
      background: linear-gradient(90deg, #29d6ff, #338bff);
      box-shadow: 0 0 15px #00baff, 0 0 40px rgba(0, 150, 255, 0.3);
    }

    /* เอฟเฟกต์ดาวระยิบระยับ */
    @keyframes twinkle {
      0%, 100% { opacity: 0.8; }
      50% { opacity: 0.3; }
    }
    .star {
      position: absolute;
      background: white;
      border-radius: 50%;
      animation: twinkle 2s infinite ease-in-out;
    }
  </style>
</head>

<body>
  <!-- เพิ่มดาวตกแต่ง -->
  <div class="star" style="top:20%; left:15%; width:2px; height:2px; animation-delay:0.5s;"></div>
  <div class="star" style="top:70%; left:80%; width:3px; height:3px; animation-delay:1s;"></div>
  <div class="star" style="top:40%; left:50%; width:2px; height:2px; animation-delay:1.5s;"></div>

  <form class="register-form" method="POST" action="register_save.php">
    <h2>สมัครสมาชิก</h2>

    <div class="form-group">
      <label for="username">ชื่อผู้ใช้ (Username)</label>
      <input type="text" id="username" name="username" required autocomplete="username">
    </div>

    <div class="form-group">
      <label for="phone">เบอร์โทรศัพท์</label>
      <input type="tel" id="phone" name="phone" required pattern="[0-9]{9,15}" autocomplete="tel">
    </div>

    <div class="form-group">
      <label for="full-name">ชื่อ-นามสกุล</label>
      <input type="text" id="full-name" name="full-name" required autocomplete="name">
    </div>

    <div class="form-group">
      <label for="password">รหัสผ่าน</label>
      <input type="password" id="password" name="password" required autocomplete="new-password">
    </div>

    <div class="form-group">
      <label for="confirm_password">ยืนยันรหัสผ่าน</label>
      <input type="password" id="confirm_password" name="confirm_password" required autocomplete="new-password">
    </div>

    <button type="submit" class="btn-submit">สมัครสมาชิก</button>
  </form>
</body>
</html>
