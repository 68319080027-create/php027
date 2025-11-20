<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Alien Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #000; /* พื้นหลังดำสนิท */
      font-family: 'Orbitron', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #00ff99;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-container {
      max-width: 400px;
      background: rgba(10, 15, 15, 0.95);
      padding: 35px;
      border-radius: 12px;
      box-shadow: 0 0 25px rgba(0, 255, 100, 0.3), 0 0 60px rgba(0, 255, 100, 0.1);
      border: 1px solid rgba(0, 255, 120, 0.2);
      backdrop-filter: blur(8px);
    }

    .login-header {
      text-align: center;
      margin-bottom: 25px;
      color: #00ff99;
      text-shadow: 0 0 10px #00ff99;
      letter-spacing: 2px;
    }

    label {
      color: #baffcc;
      font-weight: 500;
      text-shadow: 0 0 3px rgba(0,255,150,0.5);
    }

    .form-control {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(0, 255, 150, 0.3);
      color: #c8ffde;
      border-radius: 6px;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      border-color: #00ff99;
      box-shadow: 0 0 10px #00ff99, 0 0 30px rgba(0,255,150,0.3);
      background: rgba(0, 40, 20, 0.8);
    }

    .btn-primary {
      background: linear-gradient(90deg, #00ff99, #00cc66);
      border: none;
      color: #000;
      font-weight: 600;
      font-size: 1.1rem;
      letter-spacing: 1px;
      border-radius: 8px;
      box-shadow: 0 0 15px #00ff99;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background: linear-gradient(90deg, #00ffcc, #00ff99);
      box-shadow: 0 0 25px #00ff99, 0 0 50px rgba(0,255,150,0.4);
      transform: scale(1.05);
    }

    .glow-line {
      width: 80%;
      height: 2px;
      background: linear-gradient(90deg, transparent, #00ff99, transparent);
      margin: 15px auto;
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0%, 100% { opacity: 0.3; }
      50% { opacity: 1; }
    }

    /* 🔹 ลิงก์สมัครสมาชิก */
    .register-text {
      text-align: center;
      margin-top: 20px;
      font-size: 0.95rem;
      color: #baffcc;
    }

    .register-text a {
      color: #00ff99;
      text-decoration: none;
      font-weight: bold;
      transition: all 0.3s ease;
    }

    .register-text a:hover {
      color: #00ffaa;
      text-shadow: 0 0 8px #00ff99;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <h2 class="login-header">👽 Login</h2>
    <div class="glow-line"></div>

    <form action="check_login.php" method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input name="username" type="text" class="form-control" id="username" placeholder="Enter username" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Enter password" required>
      </div>

      <button type="submit" class="btn btn-primary w-100">Access Portal</button>
    </form>

    <!-- 🔸 เพิ่มส่วนนี้ -->
    <div class="register-text">
      หากยังไม่มีบัญชี? <a href="register_form.php">สมัครสมาชิก</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
