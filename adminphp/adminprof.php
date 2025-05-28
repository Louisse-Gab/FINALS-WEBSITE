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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .side-menu {
            transition: transform 0.3s ease-in-out;
            transform: translateX(-100%);
        }
        .side-menu.active {
            transform: translateX(0);
        }
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
        .success-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 50;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease-in-out;
        }
        .success-modal.active {
            opacity: 1;
            pointer-events: auto;
        }
        .modal-content {
            background-color: white;
            padding: 2rem;
            border-radius: 0.5rem;
            max-width: 20rem;
            text-align: center;
        }
    </style>
</head>
<body class="bg-[#FFF9E5] font-sans text-gray-800">
    <!-- Success Modal -->
    <div id="successModal" class="success-modal">
        <div class="modal-content">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-green-500 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <h3 class="text-xl font-bold mb-2">Success!</h3>
            <p class="text-gray-600 mb-4">Profile updated successfully.</p>
            <button id="closeModal" class="px-4 py-2 bg-[#FDCB58] rounded-md hover:bg-[#E6B84A] transition">Close</button>
        </div>
    </div>

    <!-- Side Menu Overlay -->
    <div id="menuOverlay" class="menu-overlay fixed inset-0 z-20"></div>
    
    <!-- Side Menu -->
    <div id="sideMenu" class="side-menu fixed top-0 left-0 h-full w-64 bg-[#FDF2C1] z-30 shadow-lg">
        <!-- Menu content -->
    </div>

    <!-- Header -->
    <div class="flex justify-between items-center bg-[#FDF2C1] px-6 py-4 shadow-md">
        <div id="menuIcon" class="menu-icon text-2xl cursor-pointer">&#9776;</div>
        <h1 class="text-xl font-bold">Admin Profile</h1>
        <div class="flex items-center">
            <span id="headerAdminName" class="mr-3 text-sm font-medium">
                <?php echo htmlspecialchars($_SESSION['adminName'] ?? 'Admin'); ?>
            </span>
            <div class="w-8 h-8 rounded-full overflow-hidden bg-gray-300" id="headerProfilePic">
                <?php if(!empty($_SESSION['profilePicture']) && file_exists("../" . $_SESSION['profilePicture'])): ?>
                    <img src="../<?php echo htmlspecialchars($_SESSION['profilePicture']); ?>?t=<?= time() ?>" 
                         alt="Profile" 
                         class="w-full h-full object-cover">
                <?php else: ?>
                    <div class="w-full h-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Profile Container -->
    <div class="flex flex-col items-center mt-12">
        <form id="profileForm" method="POST" enctype="multipart/form-data" class="w-full max-w-md flex flex-col items-center">
            <div class="profile-upload mb-8">
                <input type="file" id="profilePicture" name="profilePicture" class="hidden" accept="image/*">
                <label for="profilePicture" class="cursor-pointer block">
                    <div class="w-24 h-24 bg-black rounded-full relative">
                        <?php if(!empty($_SESSION['profilePicture']) && file_exists("../" . $_SESSION['profilePicture'])): ?>
                            <img src="../<?php echo htmlspecialchars($_SESSION['profilePicture']); ?>?t=<?= time() ?>" 
                                 alt="Profile Picture" 
                                 class="w-full h-full rounded-full object-cover" 
                                 id="profileImage">
                        <?php else: ?>
                            <div id="profileImage" class="w-full h-full rounded-full bg-gray-300 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
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
                    <input type="text" id="name" name="name"
                           value="<?php echo htmlspecialchars($_SESSION['adminName'] ?? ''); ?>" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-md bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#FDCB58] focus:border-transparent"
                           required>
                </div>
                <div class="mb-6">
                    <label for="phone" class="block text-sm text-gray-600 mb-2">Phone Number</label>
                    <input type="text" id="phone" name="phone"
                           value="<?php echo htmlspecialchars($_SESSION['adminPhone'] ?? ''); ?>" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-md bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#FDCB58] focus:border-transparent">
                </div>
                <div class="mb-6">
                    <label for="email" class="block text-sm text-gray-600 mb-2">Email Address</label>
                    <input type="email" id="email" name="email"
                           value="<?php echo htmlspecialchars($_SESSION['adminEmail'] ?? ''); ?>" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-md bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#FDCB58] focus:border-transparent"
                           required>
                </div>
                
                <div class="flex justify-center mt-6">
                    <button type="submit" class="px-6 py-3 bg-[#FDCB58] text-black font-medium rounded-md hover:bg-[#E6B84A] transition duration-300">
                        Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Toggle menu function
        function toggleMenu() {
            const sideMenu = document.getElementById('sideMenu');
            const menuOverlay = document.getElementById('menuOverlay');
            
            sideMenu.classList.toggle('active');
            menuOverlay.classList.toggle('active');
            document.body.style.overflow = sideMenu.classList.contains('active') ? 'hidden' : '';
        }

        // Show success modal
        function showSuccessModal() {
            const modal = document.getElementById('successModal');
            modal.classList.add('active');
            setTimeout(() => modal.classList.remove('active'), 3000);
        }

        // Update header profile
        function updateHeaderProfile(name, imagePath) {
            // Update name
            document.getElementById('headerAdminName').textContent = name;
            
            // Update image
            const headerPic = document.getElementById('headerProfilePic');
            const timestamp = new Date().getTime();
            
            if (imagePath) {
                headerPic.innerHTML = `
                    <img src="../${imagePath}?t=${timestamp}" 
                         alt="Profile" 
                         class="w-full h-full object-cover">`;
            } else {
                headerPic.innerHTML = `
                    <div class="w-full h-full flex items-center justify-center bg-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>`;
            }
        }

        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Menu event listeners
            document.getElementById('menuIcon').addEventListener('click', toggleMenu);
            document.getElementById('menuOverlay').addEventListener('click', toggleMenu);
            
            // Modal close button
            document.getElementById('closeModal').addEventListener('click', function() {
                document.getElementById('successModal').classList.remove('active');
            });
            
            // Profile picture preview
            document.getElementById('profilePicture').addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const profileImage = document.getElementById('profileImage');
                        if (profileImage.tagName === 'DIV') {
                            const newImg = document.createElement('img');
                            newImg.src = e.target.result;
                            newImg.classList.add('w-full', 'h-full', 'rounded-full', 'object-cover');
                            newImg.id = 'profileImage';
                            profileImage.replaceWith(newImg);
                        } else {
                            profileImage.src = e.target.result;
                        }
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });
            
            // Form submission
            document.getElementById('profileForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                
                fetch('adminprof.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        updateHeaderProfile(data.name, data.profilePicture);
                        
                        // Update profile image if changed
                        if (data.profilePicture) {
                            const profileImage = document.getElementById('profileImage');
                            const timestamp = new Date().getTime();
                            if (profileImage) {
                                profileImage.src = `../${data.profilePicture}?t=${timestamp}`;
                            }
                        }
                        
                        showSuccessModal();
                    } else {
                        alert('Error: ' + (data.message || 'Profile update failed'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while updating the profile');
                });
            });
        });
    </script>
</body>
</html>