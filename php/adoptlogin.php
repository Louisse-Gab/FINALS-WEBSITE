<?php
require_once '../connection.php';

session_start();

$message = "";
$formToShow = "login"; // Default form

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action_type'])) {
    $action = $_POST['action_type'];

    if ($action === "login") {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        $query = $conn->prepare("SELECT PASSWORD, role FROM accounts WHERE username = ? ");
        $query->bind_param("s", $username);
        $query->execute();
        $query->store_result();

        if ($query->num_rows === 1) {
            $query->bind_result($hashedPasswordFromDB, $role);
            $query->fetch();

            if (password_verify($password, $hashedPasswordFromDB)) {

                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;  

                if ($role === 'Admin') {
                    header("Location: ../adminphp/index.php");
                } elseif ($role === 'User') {
                    header("Location: adoption-form-1.php");
                } else {
                    $message = "<h2 style='text-align:center; color:red;'>Unknown role.</h2>";
                }
                exit();
            } else {
                $message = "<h2 style='text-align:center; color:red;'>Incorrect password.</h2>";
            }
        } else {
            $message = "<h2 style='text-align:center; color:red;'>Username not found.</h2>";
        }

        $query->close();
        $formToShow = "login";

    } elseif ($action === "signup") {
      $email = htmlspecialchars($_POST['email']);
      $username = htmlspecialchars($_POST['username']);
      $address = htmlspecialchars($_POST['address']);
      $phone = htmlspecialchars($_POST['contact']);
      $password = htmlspecialchars($_POST['password']);
      $role = 'User';

      $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

      $query = $conn->prepare("INSERT INTO accounts (role, email, username, address, contact, password) VALUES (?, ?, ?, ?, ?, ?)");
      $query->bind_param("ssssss", $role, $email, $username, $address, $phone, $hashedpassword);

      if ($query->execute()) {
        $message = "<h2 style='text-align:center; color:green;'>Thanks, $username! Your account has been created.</h2>";
      } else {
        $message = "<h2 style='text-align:center; color:red;'>Error: " . $query->error . "</h2>";
      }

      $query->close();
      $formToShow = "signup";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Adoption Account</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fef6e4;
      margin: 0;
      padding: 0;
    }

    .wrapper {
      max-width: 1000px;
      margin: 30px auto 0;
      padding: 30px;
      text-align: center;
    }

    h1 {
      font-size: 32px;
      font-weight: bold;
      margin-bottom: 30px;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 30px;
      margin-top: 20px;
      flex-wrap: wrap;
    }

    .left-panel {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .left-panel img.cat-img {
      max-width: 300px;
      border-radius: 15px;
    }

    .right-panel {
      background-color: #fff;
      padding: 30px 40px;
      border-radius: 12px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border: 1px solid #ccc;
    }

    .right-panel h2 {
      text-align: center;
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    form {
      display: none;
      flex-direction: column;
    }

    form.active {
      display: flex;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"] {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #e53935;
      color: white;
      border: none;
      border-radius: 25px;
      font-size: 16px;
      cursor: pointer;
      font-weight: bold;
      margin-top: 5px;
    }

    button:hover {
      background-color: #c62828;
    }

    .forgot {
      display: block;
      margin-top: 10px;
      text-align: center;
      color: #e53935;
      font-size: 14px;
      text-decoration: none;
    }

    .signup {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
    }

    .signup a {
      color: #e53935;
      text-decoration: none;
      font-weight: bold;
    }

    @media screen and (max-width: 768px) {
      .container {
        flex-direction: column;
        align-items: center;
      }

      .left-panel img.cat-img {
        max-width: 80%;
      }
    }
  </style>
  <script>
    function showForm(formType) {
      document.getElementById('loginForm').classList.remove('active');
      document.getElementById('signupForm').classList.remove('active');
      document.getElementById(formType + 'Form').classList.add('active');

      const leftPanel = document.getElementById('leftPanel');
      if (formType === 'login') {
        leftPanel.style.display = 'flex';
      } else {
        leftPanel.style.display = 'none';
      }
    }

    window.onload = () => {
      showForm("<?= $formToShow ?>");
    };
  </script>
</head>
<body>
  <div class="wrapper">
    <h1>ADOPTION ACCOUNT</h1>
    <?= $message ?>
    <div class="container">
      <!-- Left Panel: Only visible on login -->
      <div class="left-panel" id="leftPanel" style="display: <?= $formToShow === 'login' ? 'flex' : 'none' ?>;">
        <img src="../images/SHELTER OF LIGHT/SOL-LOGO.png" alt="Cat" class="cat-img">
      </div>

      <!-- Right Panel: Forms -->
      <div class="right-panel">
        <!-- Login Form -->
        <form id="loginForm" action="" method="POST">
          <h2>LOGIN</h2>
          <input type="text" name="username" placeholder="USERNAME" required>
          <input type="password" name="password" placeholder="PASSWORD" required>
          <input type="hidden" name="action_type" value="login">
          <button type="submit">LOGIN</button>
          <a href="#" class="forgot">FORGOT PASSWORD?</a>
          <p class="signup">NEW TO SHELTER OF LIGHT?
            <a href="#" onclick="showForm('signup')">SIGN UP HERE</a>
          </p>
        </form>

        <!-- Sign Up Form -->
        <form id="signupForm" action="" method="POST">
          <h2>REGISTER</h2>
          <input type="email" name="email" placeholder="EMAIL ADDRESS" required>
          <input type="text" name="username" placeholder="USERNAME" required>
          <input type="text" name="address" placeholder="ADDRESS" required>
          <input type="text" name="contact" placeholder="PHONE NUMBER" required>
          <input type="password" name="password" placeholder="PASSWORD" required>
          <input type="hidden" name="action_type" value="signup">
          <button type="submit">SIGN UP</button>
          <p style="font-size: 12px;">By creating an account you agree to Shelter of Light's Terms of Service and Privacy Policies</p>
          <p class="signup">ALREADY HAVE AN ACCOUNT?
            <a href="#" onclick="showForm('login')">LOGIN</a>
          </p>
        </form>
      </div>
    </div>
  </div>
</body>
</html>