<<<<<<< HEAD
<?php
session_start();
require_once('../connection.php');

// pag walang nakalogin at binago sa url eto ang ma eexecute nya 
if (!isset($_SESSION['username'])) {
    header('Location: ../php/home.php');
    exit();
}

// Handle profile updates
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $adminId = $_SESSION['adminId'];

    // Handle file upload
    $targetDir = "../uploads/";
    $profilePicturePath = "";
    
    // Create uploads directory if it doesn't exist
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    
    if (!empty($_FILES["profilePicture"]["name"])) {
        // Generate unique filename
        $fileName = uniqid() . '_' . basename($_FILES["profilePicture"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        
        // Allow certain file formats
        $allowTypes = ['jpg','png','jpeg','gif'];
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $targetFilePath)) {
                $profilePicturePath = "uploads/" . $fileName;
                
                // Delete old profile picture if it exists
                if (!empty($_SESSION['profilePicture']) && $_SESSION['profilePicture'] !== $profilePicturePath) {
                    $oldFilePath = "../" . $_SESSION['profilePicture'];
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }
            }
        }
    }
    
    // Update database
    if (!empty($profilePicturePath)) {
        $sql = "UPDATE accounts SET name=?, email=?, phone=?, profile_picture=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $name, $email, $phone, $profilePicturePath, $adminId);
    } else {
        $sql = "UPDATE accounts SET name=?, email=?, phone=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $name, $email, $phone, $adminId);
    }
    
    if ($stmt->execute()) {
        // Update session variables
        $_SESSION['adminName'] = $name;
        $_SESSION['adminEmail'] = $email;
        $_SESSION['adminPhone'] = $phone;
        if (!empty($profilePicturePath)) {
            $_SESSION['profilePicture'] = $profilePicturePath;
        }
        
        // Return success response
        $response = [
            'status' => 'success',
            'name' => $name,
            'profilePicture' => !empty($profilePicturePath) ? $profilePicturePath : 
                              (isset($_SESSION['profilePicture']) ? $_SESSION['profilePicture'] : '')
        ];
        
        echo json_encode($response);
        exit;
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database update failed: ' . $conn->error]);
        exit;
    }
}

// Fetch current admin data
$adminData = null;
if (isset($_SESSION['adminId'])) {
    $query = $conn->prepare("SELECT name, email, phone, profile_picture FROM accounts WHERE id = ?");
    $query->bind_param("i", $_SESSION['adminId']);
    $query->execute();
    $result = $query->get_result();
    $adminData = $result->fetch_assoc();
    $query->close();
    
    // Update session with latest data
    if ($adminData) {
        $_SESSION['adminName'] = $adminData['name'];
        $_SESSION['adminEmail'] = $adminData['email'];
        $_SESSION['adminPhone'] = $adminData['phone'];
        $_SESSION['profilePicture'] = $adminData['profile_picture'];
    }
}
?>

=======
>>>>>>> 4af0a34f90a6c91869c6e2caf630a058552a3e1f
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Menu transition effects */
        .side-menu {
            transition: transform 0.3s ease-in-out;
            transform: translateX(-100%);
        }
        
        .side-menu.active {
            transform: translateX(0);
        }
        
        /* Overlay for when menu is open */
        .menu-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            transition: opacity 0.3s ease-in-out;
            opacity: 0;
            pointer-events: none;
        }
        
        .menu-overlay.active {
            opacity: 1;
            pointer-events: auto;
        }
        
        /* Profile picture upload styling */
        .profile-upload {
            position: relative;
            cursor: pointer;
        }
        
        .profile-upload:hover .upload-overlay {
            opacity: 1;
        }
        
        .upload-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s;
        }
    </style>
</head>
<body class="bg-[#FFF9E5] font-sans text-gray-800">
    <!-- Side Menu Overlay -->
    <div id="menuOverlay" class="menu-overlay fixed inset-0 z-20"></div>
    
    <!-- Side Menu -->
    <div id="sideMenu" class="side-menu fixed top-0 left-0 h-full w-64 bg-[#FDF2C1] z-30 shadow-lg">
        <div class="p-4 border-b border-gray-300">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-bold">Shelter of Light</h2>
                <button class="text-2xl">&times;</button>
            </div>
        </div>
        <nav class="p-4">
            <ul class="space-y-4">
                <!-- Home Menu Item -->
                <li>
                    <a href="../adminphp/index.php" 
                       class="menu-item block py-2 px-4 hover:bg-[#FDCB58] rounded-lg transition duration-300" 
                       data-url="../adminphp/index.php">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Home
                        </div>
                    </a>
                </li>

                <li>
                    <a href="../adminphp/dash.php" 
                       class="menu-item block py-2 px-4 hover:bg-[#FDCB58] rounded-lg transition duration-300" 
                       data-url="../adminphp/dash.php">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            Dashboard
                        </div>
                    </a>
                </li>
                <li>
                    <a href="../adminphp/plist.php" 
                       class="menu-item block py-2 px-4 hover:bg-[#FDCB58] rounded-lg transition duration-300" 
                       data-url="../adminphp/plist.php">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            Pet List
                        </div>
                    </a>
                </li>
                <li>  
                    <a href="../adminphp/users.php"
                       class="menu-item block py-2 px-4 hover:bg-[#FDCB58] rounded-lg transition duration-300" 
                       data-url="../adminphp/users.php">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            Manage Users
                        </div>
                    </a>
                </li>
                
                <li class="border-t border-gray-300 mt-6 pt-4">
                    <a href="../php/adoptlogin.php" 
                       class="menu-item block py-2 px-4 hover:bg-red-100 text-red-600 rounded-lg transition duration-300" 
                       data-url="../php/adoptlogin.php">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Header -->
   <!-- Header -->
<div class="flex justify-between items-center bg-[#FDF2C1] px-4 py-2 shadow-md"> <!-- Changed from px-6 py-4 to px-4 py-2 -->
    <div class="menu-icon text-2xl cursor-pointer">&#9776;</div>
    <h1 class="text-xl font-bold">Admin Profile</h1>
    <div class="flex items-center">
        <img src="../images/SHELTER OF LIGHT/SOL-LOGO.png" alt="Logo" class="w-8 h-8 lg:w-12 lg:h-12"> <!-- Reduced logo size -->
    </div>
</div>

    <!-- Profile Container -->
    <div class="flex flex-col items-center mt-12">
        <!-- Profile Picture with Upload Functionality -->
        <form id="profileForm" action="../adminphp/update_profile.php" method="POST" enctype="multipart/form-data" class="w-full max-w-md flex flex-col items-center">
            <div class="profile-upload mb-8">
                <input type="file" id="profilePicture" name="profilePicture" class="hidden" accept="image/*">
                <label for="profilePicture" class="cursor-pointer block">
                    <div class="w-24 h-24 bg-black rounded-full relative">
                        <!-- If there's a profile picture, display it here -->
                        <?php if(isset($profilePicture) && !empty($profilePicture)): ?>
                            <img src="<?php echo $profilePicture; ?>" alt="Profile Picture" class="w-full h-full rounded-full object-cover">
                        <?php endif; ?>
                        
                        <div class="upload-overlay">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                    </div>
                </label>
            </div>

            <!-- Profile Details -->
            <div class="w-full">
                <div class="mb-6">
                    <label for="name" class="block text-sm text-gray-600 mb-2">Name</label>
                    <input 
                        type="text" 
                        id="name"
                        name="name"
                        value="Admin Name" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-md bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#FDCB58] focus:border-transparent"
                    >
                </div>
                <div class="mb-6">
                    <label for="phone" class="block text-sm text-gray-600 mb-2">Phone Number</label>
                    <input 
                        type="text" 
                        id="phone"
                        name="phone"
                        value="+1234567890" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-md bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#FDCB58] focus:border-transparent"
                    >
                </div>
                <div class="mb-6">
                    <label for="email" class="block text-sm text-gray-600 mb-2">Email Address</label>
                    <input 
                        type="email" 
                        id="email"
                        name="email"
                        value="admin@example.com" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-md bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#FDCB58] focus:border-transparent"
                    >
                </div>
                
                <!-- Save Button -->
                <div class="flex justify-center mt-6">
                    <button 
                        type="submit" 
                        class="px-6 py-3 bg-[#FDCB58] text-black font-medium rounded-md hover:bg-[#E6B84A] transition duration-300"
                    >
                        Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- JavaScript for menu functionality and profile picture preview -->
    <script>
        // Function to toggle the side menu
        function toggleMenu() {
            const sideMenu = document.getElementById('sideMenu');
            const menuOverlay = document.getElementById('menuOverlay');
            
            if (sideMenu && menuOverlay) {
                sideMenu.classList.toggle('active');
                menuOverlay.classList.toggle('active');
                
                // Prevent scrolling when menu is open
                document.body.style.overflow = sideMenu.classList.contains('active') ? 'hidden' : '';
            }
        }

        // Initialize menu functionality when the DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Make sure the hamburger menu icon works
            const menuIcon = document.querySelector('.menu-icon');
            if (menuIcon) {
                menuIcon.addEventListener('click', toggleMenu);
            }
            
            // Make sure the close button works
            const closeButton = document.querySelector('#sideMenu button');
            if (closeButton) {
                closeButton.addEventListener('click', toggleMenu);
            }
            
            // Make sure the overlay works
            const menuOverlay = document.getElementById('menuOverlay');
            if (menuOverlay) {
                menuOverlay.addEventListener('click', toggleMenu);
            }
            
            // Profile picture preview
            const profilePictureInput = document.getElementById('profilePicture');
            if (profilePictureInput) {
                profilePictureInput.addEventListener('change', function() {
                    if (this.files && this.files[0]) {
                        const reader = new FileReader();
                        
                        reader.onload = function(e) {
                            const profileUpload = document.querySelector('.profile-upload');
                            
                            // Check if there's already an image
                            let img = profileUpload.querySelector('img');
                            
                            if (!img) {
                                // Create new image if it doesn't exist
                                img = document.createElement('img');
                                img.classList.add('w-full', 'h-full', 'rounded-full', 'object-cover');
                                profileUpload.querySelector('label').querySelector('div').appendChild(img);
                            }
                            
                            // Set the image source
                            img.src = e.target.result;
                        }
                        
                        reader.readAsDataURL(this.files[0]);
                    }
                });
            }
        });
    </script>
</body>
</html>