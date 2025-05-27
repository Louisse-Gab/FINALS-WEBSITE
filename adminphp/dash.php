<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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

        /* Dashboard specific styles */
        .stat-card {
            transition: all 0.3s ease;
            height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body class="bg-[#FFF9E5] font-sans text-gray-800">
    <!-- Side Menu Overlay -->
    <div id="menuOverlay" class="menu-overlay fixed inset-0 z-20" onclick="toggleMenu()"></div>
    
    <!-- Side Menu -->
    <div id="sideMenu" class="side-menu fixed top-0 left-0 h-full w-64 bg-[#FDF2C1] z-30 shadow-lg">
        <div class="p-4 border-b border-gray-300">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-bold">Menu</h2>
                <!-- Close button with ID for JavaScript targeting -->
                <button id="closeMenuBtn" class="text-2xl cursor-pointer p-2">&times;</button>
            </div>
        </div>
        <nav class="p-4">
            <ul class="space-y-4">

            <li>
    <a href="../adminphp/index.php" 
       class="menu-item block py-2 px-4 hover:bg-[#FDCB58] rounded-lg transition duration-300" 
       data-url="../index.php">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Home
        </div>
        </a>
    </li>
                <li>
                    <a href="javascript:void(0);" onclick="navigateTo('../adminphp/dash.php')" 
                       class="menu-item block py-2 px-4 bg-[#FDCB58] rounded-lg transition duration-300" 
                       data-url="../adminphp/dash.php">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Dashboard
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" onclick="navigateTo('../adminphp/plist.php')" 
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
                    <a href="javascript:void(0);" onclick="navigateTo('../adminphp/users.php')"
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
                    <a href="javascript:void(0);" onclick="navigateTo('../php/adoptlogin.php')" 
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
    <div class="flex justify-between items-center bg-[#FDF2C1] px-4 py-2 shadow-md relative z-10">
    <div class="menu-icon text-2xl cursor-pointer p-2 z-20" onclick="toggleMenu()">&#9776;</div>
    <h1 class="text-xl font-bold absolute left-1/2 transform -translate-x-1/2">Dashboard</h1>
    <div class="flex items-center">
        <img src="../images/SHELTER OF LIGHT/SOL-LOGO.png" alt="Logo" class="w-8 h-8 lg:w-12 lg:h-12">
    </div>
</div>

    <!-- Dashboard Content -->
    <div class="container mx-auto px-4 py-8">
        <!-- First Row -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- TOTAL USERS -->
            <div class="stat-card bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <h3 class="text-xl font-bold text-center mb-2">TOTAL USERS</h3>
                <p class="text-4xl font-bold text-center">24</p>
            </div>
            
            <!-- CONFIRMED -->
            <div class="stat-card bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <h3 class="text-xl font-bold text-center mb-2">CONFIRMED</h3>
                <p class="text-4xl font-bold text-center">18</p>
            </div>
            
            <!-- DECLINED -->
            <div class="stat-card bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <h3 class="text-xl font-bold text-center mb-2">DECLINED</h3>
                <p class="text-4xl font-bold text-center">3</p>
            </div>
        </div>
        
        <!-- Second Row -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- FOR VERIFICATION -->
            <div class="stat-card bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <h3 class="text-xl font-bold text-center mb-2">FOR VERIFICATION</h3>
                <p class="text-4xl font-bold text-center">6</p>
            </div>
            
            <!-- TOTAL CATS ADOPTED -->
            <div class="stat-card bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <h3 class="text-xl font-bold text-center mb-2">TOTAL CATS ADOPTED</h3>
                <p class="text-4xl font-bold text-center">12</p>
            </div>
            
            <!-- TOTAL DOGS ADOPTED -->
            <div class="stat-card bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <h3 class="text-xl font-bold text-center mb-2">TOTAL DOGS ADOPTED</h3>
                <p class="text-4xl font-bold text-center">9</p>
            </div>
        </div>
    </div>

    <!-- Inline JavaScript for immediate execution -->
    <script>
        // Define functions first
        function toggleMenu() {
            console.log("Toggle menu called");
            const sideMenu = document.getElementById('sideMenu');
            const menuOverlay = document.getElementById('menuOverlay');
            
            if (sideMenu) {
                sideMenu.classList.toggle('active');
                console.log("Menu toggled:", sideMenu.classList.contains('active') ? "open" : "closed");
            }
            
            if (menuOverlay) {
                menuOverlay.classList.toggle('active');
            }
            
            // Prevent scrolling when menu is open
            document.body.style.overflow = (sideMenu && sideMenu.classList.contains('active')) ? 'hidden' : '';
        }

        function navigateTo(url) {
            console.log("Navigating to:", url);
            // Close the menu first
            toggleMenu();
            
            // Then navigate to the URL
            window.location.href = url;
        }

        // Add event listeners when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            console.log("DOM loaded, initializing menu");
            
            // Add event listener to close button
            const closeButton = document.getElementById('closeMenuBtn');
            if (closeButton) {
                console.log("Close button found, adding event listener");
                closeButton.addEventListener('click', function() {
                    console.log("Close button clicked");
                    toggleMenu();
                });
            } else {
                console.error("Close button not found!");
            }
        });
    </script>
    
    <!-- External JavaScript file -->
    <script src="../adminjs/dash.js"></script>
</body>
</html>