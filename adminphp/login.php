<?php
$message = "";
$formToShow = "login"; 


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action_type'])) {
    $action = $_POST['action_type'];


    if ($action === "login") {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);


        if ($username === "admin" && $password === "1234") {
            $message = "<h2 style='text-align:center; color:green;'>Login successful! Welcome, $username.</h2>";
        } else {
            $message = "<h2 style='text-align:center; color:red;'>Invalid username or password.</h2>";
        }
        $formToShow = "login";
    } elseif ($action === "signup") {
        $email = htmlspecialchars($_POST['email']);
        $username = htmlspecialchars($_POST['username']);
        $address = htmlspecialchars($_POST['address']);
        $phone = htmlspecialchars($_POST['phone']);
        $password = htmlspecialchars($_POST['password']);


        $message = "<h2 style='text-align:center; color:green;'>Thanks, $username! Your account has been created.</h2>";
        $formToShow = "signup";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Adoption Account</title>
      <link rel="stylesheet" href="login.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fff8e1;
      margin: 0;
      padding: 0;
    }

    .wrapper {
      max-width: 1000px;
      margin: auto;
      padding: 30px;
      text-align: center;
    }


    h1 {
      font-size: 32px;
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
      padding: 30px;
      border-radius: 10px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
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
      margin: 8px 0;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }


    button {
      padding: 10px;
      background-color: #e53935;
      color: white;
      border: none;
      border-radius: 20px;
      font-size: 16px;
      cursor: pointer;
      margin-top: 10px;
    }


    button:hover {
      background-color: #c62828;
    }


    .forgot,
    .signup a {
      color: #e53935;
      text-decoration: none;
      font-size: 14px;
      margin-top: 10px;
    }


    .signup {
      margin-top: 15px;
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
        <img src="cat.jpg" alt="Cat" class="cat-img">
      </div>


      <!-- Right Panel: Forms -->
      <div class="right-panel">
        <!-- Login Form -->
        <form id="loginForm" action="account.php" method="POST">
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
        <form id="signupForm" action="account.php" method="POST">
          <h2>REGISTER</h2>
          <input type="email" name="email" placeholder="EMAIL ADDRESS" required>
          <input type="text" name="username" placeholder="USERNAME" required>
          <input type="text" name="address" placeholder="ADDRESS" required>
          <input type="text" name="phone" placeholder="PHONE NUMBER" required>
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