<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter of Light</title>
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

        /* Card hover effect */
        .dashboard-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        /* Profile icon hover effect */
        .profile-icon {
            transition: transform 0.2s ease;
        }
        
        .profile-icon:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body class="bg-[#fffbeb] font-sans min-h-screen">
    <!-- Side Menu Overlay -->
    <div id="menuOverlay" class="menu-overlay fixed inset-0 z-20"></div>
    
    <!-- Side Menu -->
    <div id="sideMenu" class="side-menu fixed top-0 left-0 h-full w-64 bg-[#FDF2C1] z-30 shadow-lg">
        <div class="p-4 border-b border-gray-300">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-bold">Menu</h2>
                <button class="text-2xl">&times;</button>
            </div>
        </div>
        <nav class="p-4">
            <ul class="space-y-4">
                <!-- Home Menu Item -->
                <li>
                    <a href="../adminphp/index.php" 
                       class="menu-item block py-2 px-4 hover:bg-[#FDCB58] rounded-lg transition duration-300" 
                       data-url="index.php">
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
<div class="flex justify-between items-center bg-[#FDF2C1] p-4 shadow-md">
    <div class="menu-icon text-2xl cursor-pointer">&#9776;</div>
    <h1 class="text-xl font-bold">Shelter of Light</h1>
    <div class="flex items-center">
        <span class="mr-3 text-sm font-medium">
            <?php echo isset($_SESSION['adminName']) ? $_SESSION['adminName'] : 'Admin'; ?>
        </span>
        <a href="../adminphp/adminprof.php" class="w-8 h-8 bg-black rounded-full block profile-icon cursor-pointer" title="Admin Profile">
            <!-- If there's a profile picture, it would be displayed here -->
            <?php if(isset($_SESSION['profilePicture']) && !empty($_SESSION['profilePicture'])): ?>
                <img src="<?php echo $_SESSION['profilePicture']; ?>" alt="Admin Profile" class="w-full h-full rounded-full object-cover">
            <?php endif; ?>
        </a>
    </div>
</div>
    <!-- Main Dashboard Content -->
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col items-center justify-center min-h-[70vh]">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl w-full">
                <!-- Dashboard Card -->
                <a href="../adminphp/dash.php" class="dashboard-card bg-white border border-black p-12 flex items-center justify-center hover:bg-gray-50 transition-colors">
                    <h2 class="text-black text-2xl font-bold">DASHBOARD</h2>
                </a>

                <!-- Pet List Card -->
                <a href="../adminphp/plist.php" class="dashboard-card bg-white border border-black p-12 flex items-center justify-center hover:bg-gray-50 transition-colors">
                    <h2 class="text-black text-2xl font-bold">PET LIST</h2>
                </a>

                <!-- Manage Users Card -->
                <a href="../adminphp/users.php" class="dashboard-card bg-white border border-black p-12 flex items-center justify-center hover:bg-gray-50 transition-colors">
                    <h2 class="text-black text-2xl font-bold">MANAGE USERS</h2>
                </a>
            </div>
        </div>
    </div>

    <!-- Link to the external JavaScript file -->
    <script src="../adminjs/index.js"></script>
</body>
</html>