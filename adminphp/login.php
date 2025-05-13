<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action_type'])) {
    $action = $_POST['action_type'];

    if ($action === "login") {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        if ($username === "admin" && $password === "1234") {
            $message = "<h2 class='text-center text-green-600 font-bold'>Login successful! Welcome, $username.</h2>";
        } else {
            $message = "<h2 class='text-center text-red-600 font-bold'>Invalid username or password.</h2>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#fef6e4] font-sans text-gray-800">
    <div class="wrapper text-center mt-12">
        <h1 class="text-2xl font-bold mb-8">ADMIN ACCOUNT</h1>
        <?= $message ?>
        <div class="container flex justify-center items-center mt-5">
            <div class="right-panel bg-white border border-gray-300 rounded-lg p-8 shadow-lg w-96">
                <!-- Login Form -->
                <form id="loginForm" action="admin-login.php" method="POST" class="flex flex-col">
                    <h2 class="text-xl font-bold text-center mb-6">LOGIN</h2>
                    <input 
                        type="text" 
                        name="username" 
                        placeholder="USERNAME" 
                        required 
                        class="w-full p-3 mb-4 border border-gray-300 rounded-lg font-bold text-sm"
                    >
                    <input 
                        type="password" 
                        name="password" 
                        placeholder="PASSWORD" 
                        required 
                        class="w-full p-3 mb-4 border border-gray-300 rounded-lg font-bold text-sm"
                    >
                    <input type="hidden" name="action_type" value="login">
                    <button 
                        type="submit" 
                        class="w-full bg-red-500 text-white py-3 rounded-full font-bold text-lg hover:bg-red-600 transition duration-300"
                    >
                        LOGIN
                    </button>
                    <a href="#" class="forgot block mt-4 text-center text-red-500 text-sm hover:underline">
                        FORGOT PASSWORD?
                    </a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>