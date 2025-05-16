<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet List</title>
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
                <button onclick="toggleMenu()" class="text-2xl">&times;</button>
            </div>
        </div>
       <nav class="p-4">
    <ul class="space-y-4">
        <!-- New Home Menu Item -->
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
                    <a href="javascript:void(0);" onclick="navigateTo('../adminphp/plist.php')" 
                       class="menu-item block py-2 px-4 bg-[#FDCB58] rounded-lg transition duration-300" 
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
                    <a href="javascript:void(0);" onclick="navigateTo('../adminphp/login.php')" 
                       class="menu-item block py-2 px-4 hover:bg-red-100 text-red-600 rounded-lg transition duration-300" 
                       data-url="logout.php">
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
    <div class="flex justify-between items-center bg-[#FDF2C1] p-4 shadow-md">
        <div class="menu-icon text-2xl cursor-pointer" onclick="toggleMenu()">&#9776;</div>
        <h1 class="text-xl font-bold">Pet List</h1>
        <div class="w-8 h-8 bg-black rounded-full"></div>
    </div>

    <!-- Pet List Section -->
    <div class="text-center mt-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 justify-items-center px-4">
            <!-- Pet Card -->
            <div class="bg-white border border-gray-300 rounded-lg shadow-lg w-64 p-4 text-center">
                <img src="../images/SHELTER OF LIGHT/HOME PAGE/Latest Pet Adopted/Anino.jpg" alt="Pet Image" class="w-full h-40 object-cover rounded-lg">
                <div class="mt-4">
                    <p class="font-bold text-lg mb-2">Anino</p>
                    <p class="text-gray-600 text-sm mb-4">(Short Description)</p>
                    <button class="bg-[#FDCB58] text-black py-2 px-4 rounded-full font-bold hover:bg-[#E6B84A] transition duration-300">
                        Ready for Adoption
                    </button>
                </div>
            </div>

            <div class="bg-white border border-gray-300 rounded-lg shadow-lg w-64 p-4 text-center">
                <img src="../images/SHELTER OF LIGHT/HOME PAGE/Latest Pet Adopted/Chance.jpg" alt="Pet Image" class="w-full h-40 object-cover rounded-lg">
                <div class="mt-4">
                    <p class="font-bold text-lg mb-2">Chance</p>
                    <p class="text-gray-600 text-sm mb-4">(Short Description)</p>
                    <button class="bg-[#FDCB58] text-black py-2 px-4 rounded-full font-bold hover:bg-[#E6B84A] transition duration-300">
                        Ready for Adoption
                    </button>
                </div>
            </div>

            <div class="bg-white border border-gray-300 rounded-lg shadow-lg w-64 p-4 text-center">
                <img src="../images/SHELTER OF LIGHT/HOME PAGE/Latest Pet Adopted/Mallows.jpg" alt="Pet Image" class="w-full h-40 object-cover rounded-lg">
                <div class="mt-4">
                    <p class="font-bold text-lg mb-2">Mallows</p>
                    <p class="text-gray-600 text-sm mb-4">(Short Description)</p>
                    <button class="bg-[#FDCB58] text-black py-2 px-4 rounded-full font-bold hover:bg-[#E6B84A] transition duration-300">
                        Ready for Adoption
                    </button>
                </div>
            </div>

            <div class="bg-white border border-gray-300 rounded-lg shadow-lg w-64 p-4 text-center">
                <img src="../images/SHELTER OF LIGHT/HOME PAGE/Latest Pet Adopted/Mocha.jpg" alt="Pet Image" class="w-full h-40 object-cover rounded-lg">
                <div class="mt-4">
                    <p class="font-bold text-lg mb-2">Mocha</p>
                    <p class="text-gray-600 text-sm mb-4">(Short Description)</p>
                    <button class="bg-[#FDCB58] text-black py-2 px-4 rounded-full font-bold hover:bg-[#E6B84A] transition duration-300">
                        Ready for Adoption
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Link to the external JavaScript file -->
    <script src="../adminjs/plist.js"></script>
</body>
</html>