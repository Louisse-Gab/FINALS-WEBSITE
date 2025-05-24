<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
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
        
        /* Responsive table styles */
        @media (max-width: 768px) {
            table.responsive-table thead {
                display: none;
            }
            
            table.responsive-table tr {
                display: block;
                margin-bottom: 1rem;
                border: 1px solid #e2e8f0;
                border-radius: 0.375rem;
            }
            
            table.responsive-table td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0.5rem 1rem;
                border-bottom: 1px solid #e2e8f0;
            }
            
            table.responsive-table td:before {
                content: attr(data-label);
                font-weight: 600;
                margin-right: 1rem;
                flex: 1;
            }
            
            table.responsive-table td:last-child {
                border-bottom: none;
            }
            
            .action-buttons {
                justify-content: flex-end;
            }
        }
    </style>
</head>
<body class="bg-gray-800 text-black-300 font-sans">
    <!-- Side Menu Overlay -->
    <div id="menuOverlay" class="menu-overlay fixed inset-0 z-20"></div>
    
    <!-- Side Menu -->
    <div id="sideMenu" class="side-menu fixed top-0 left-0 h-full w-64 bg-[#FDF2C1] z-30 shadow-lg md:w-56">
        <div class="p-4 border-b border-gray-300">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-bold">Menu</h2>
                <button id="closeMenu" class="text-2xl">&times;</button>
            </div>
        </div>
        <nav class="p-4">
            <ul class="space-y-4">
                <!-- Home Menu Item -->
                <li>
                    <a href="../adminphp/index.php" 
                       class="menu-item block py-2 px-4 hover:bg-[#FDCB58] rounded-lg transition duration-300" 
                       data-url="../admpinphp.index.php">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span class="text-sm md:text-base">Home</span>
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
                            <span class="text-sm md:text-base">Dashboard</span>
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
                            <span class="text-sm md:text-base">Pet List</span>
                        </div>
                    </a>
                </li>
                <li>  
                    <a href="../adminphp/users.php"
                       class="menu-item block py-2 px-4 bg-[#FDCB58] rounded-lg transition duration-300" 
                       data-url="../adminphp/users.php">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <span class="text-sm md:text-base">Manage Users</span>
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
                            <span class="text-sm md:text-base">Logout</span>
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    
    <!-- Header -->
    <div class="flex justify-between items-center bg-[#FDF2C1] px-4 py-3 shadow-md md:px-6 md:py-4">
        <button id="menuToggle" class="menu-icon text-2xl cursor-pointer">&#9776;</button>
        <h1 class="text-lg font-bold text-black md:text-xl">Manage Adopt Here</h1>
        <div class="w-7 h-7 bg-black rounded-full md:w-8 md:h-8"></div>
    </div>

    <!-- Manage Users Table -->
    <div class="bg-[#FFF9E5] mx-4 my-6 p-4 rounded-lg shadow-lg md:mx-6 md:my-8 md:p-6">
        <div class="overflow-x-auto">
            <table class="responsive-table table-auto w-full border-collapse text-left">
                <thead class="bg-[#FDF2C1] hidden md:table-header-group">
                    <tr>
                        <th class="px-4 py-2 font-bold">#</th>
                        <th class="px-4 py-2 font-bold">Name</th>
                        <th class="px-4 py-2 font-bold">Address</th>
                        <th class="px-4 py-2 font-bold">Phone Number</th>
                        <th class="px-4 py-2 font-bold">Age</th>
                        <th class="px-4 py-2 font-bold">Email Address</th>
                        <th class="px-4 py-2 font-bold">Social Media</th>
                        <th class="px-4 py-2 font-bold">Occupation</th>
                        <th class="px-4 py-2 font-bold">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once '../connection.php'; 

                    $stmt = $conn->query("SELECT * FROM adopt");
                    $counter = 1;
                    while ($row = $stmt->fetch_assoc()) {
                        echo "<tr class='bg-white' data-id='{$counter}'>";
                        echo "<td class='px-4 py-2 border-b' data-label='#'>{$counter}</td>";
                        echo "<td class='px-4 py-2 border-b' data-label='Name'>{$row['fullName']}</td>";
                        echo "<td class='px-4 py-2 border-b' data-label='Address'>{$row['address']}</td>";
                        echo "<td class='px-4 py-2 border-b' data-label='Phone'>{$row['phone']}</td>";
                        echo "<td class='px-4 py-2 border-b' data-label='Age'>{$row['age']}</td>";
                        echo "<td class='px-4 py-2 border-b' data-label='Email'>{$row['email']}</td>";
                        echo "<td class='px-4 py-2 border-b' data-label='Social Media'>{$row['socialMedia']}</td>";
                        echo "<td class='px-4 py-2 border-b' data-label='Occupation'>{$row['jobTitle']}</td>";
                        echo "<td class='px-4 py-2 border-b flex space-x-2 action-buttons' data-label='Action'>";
                        echo "<button class='bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-700 text-sm md:text-base'>&#10004;</button>";
                        echo "<button class='bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-700 text-sm md:text-base'>&#10008;</button>";
                        echo "</td>";
                        echo "</tr>";
                        $counter++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Adoption Details -->
    <div id="adoptionModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden p-4">
        <div class="bg-white rounded-lg p-4 w-full max-w-md max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Adoption Details</h3>
                <button id="closeModal" class="text-2xl">&times;</button>
            </div>
            <div id="adoptionDetails" class="mb-4">
                <!-- Adoption details will be inserted here -->
            </div>
            <div class="flex justify-between gap-4">
                <button id="declineBtn" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-700 flex-1">Decline</button>
                <button id="confirmBtn" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-700 flex-1">Confirm</button>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden p-4">
        <div class="bg-white rounded-lg p-4 w-full max-w-md max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Confirm Action</h3>
                <button id="closeConfirmModal" class="text-2xl">&times;</button>
            </div>
            <p id="confirmMessage" class="mb-4">Are you sure you want to proceed?</p>
            <div class="flex justify-between gap-4">
                <button id="cancelBtn" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-700 flex-1">Cancel</button>
                <button id="proceedBtn" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 flex-1">Proceed</button>
            </div>
        </div>
    </div>

    <script>
        // Menu toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menuToggle');
            const closeMenu = document.getElementById('closeMenu');
            const sideMenu = document.getElementById('sideMenu');
            const menuOverlay = document.getElementById('menuOverlay');
            
            // Toggle menu
            menuToggle.addEventListener('click', function() {
                sideMenu.classList.add('active');
                menuOverlay.classList.add('active');
            });
            
            // Close menu
            closeMenu.addEventListener('click', function() {
                sideMenu.classList.remove('active');
                menuOverlay.classList.remove('active');
            });
            
            // Close menu when clicking overlay
            menuOverlay.addEventListener('click', function() {
                sideMenu.classList.remove('active');
                menuOverlay.classList.remove('active');
            });

            // Modal functionality
            const checkButtons = document.querySelectorAll('.bg-green-500');
            const xButtons = document.querySelectorAll('.bg-red-500');
            const adoptionModal = document.getElementById('adoptionModal');
            const confirmModal = document.getElementById('confirmModal');
            const closeModal = document.getElementById('closeModal');
            const closeConfirmModal = document.getElementById('closeConfirmModal');
            const cancelBtn = document.getElementById('cancelBtn');
            let currentAction = '';
            let currentRowId = null;

            // Function to show adoption details
            function showAdoptionDetails(rowId) {
                // In a real app, you would fetch this data via AJAX
                // For now, we'll get the data from the table row
                const row = document.querySelector(`tr[data-id="${rowId}"]`);
                if (row) {
                    const userName = row.querySelector('td[data-label="Name"]').textContent;
                    const petName = row.getAttribute('data-pet-name') || 'Unknown Pet';
                    const petDescription = row.getAttribute('data-pet-description') || 'No description available';
                    
                    document.getElementById('adoptionDetails').innerHTML = `
                        <h4 class="font-bold mb-2">Adoption Request</h4>
                        <p class="mb-2"><span class="font-semibold">User:</span> ${userName}</p>
                        <p class="mb-2"><span class="font-semibold">Pet to Adopt:</span> ${petName}</p>
                        <p class="mb-2"><span class="font-semibold">Pet Description:</span> ${petDescription}</p>
                    `;
                    adoptionModal.classList.remove('hidden');
                }
            }

            // Add data attributes to table rows (you should populate these from your database)
            document.querySelectorAll('tbody tr').forEach((row, index) => {
                row.setAttribute('data-id', index + 1);
                // These should come from your database - this is just an example
                row.setAttribute('data-pet-name', 'Pet ' + (index + 1));
                row.setAttribute('data-pet-description', 'Description for Pet ' + (index + 1));
            });

            // Open adoption modal when check button is clicked
            checkButtons.forEach((button, index) => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    currentRowId = row.getAttribute('data-id');
                    showAdoptionDetails(currentRowId);
                    currentAction = 'confirm';
                });
            });

            // X button directly declines (with confirmation)
            xButtons.forEach((button, index) => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    currentRowId = row.getAttribute('data-id');
                    currentAction = 'decline';
                    document.getElementById('confirmMessage').textContent = 
                        "Are you sure you want to decline this adoption request?";
                    confirmModal.classList.remove('hidden');
                });
            });

            // Close adoption modal
            closeModal.addEventListener('click', function() {
                adoptionModal.classList.add('hidden');
            });

            // Decline button in modal
            document.getElementById('declineBtn').addEventListener('click', function() {
                currentAction = 'decline';
                document.getElementById('confirmMessage').textContent = 
                    "Are you sure you want to decline this adoption request?";
                confirmModal.classList.remove('hidden');
                adoptionModal.classList.add('hidden');
            });

            // Confirm button in modal
            document.getElementById('confirmBtn').addEventListener('click', function() {
                currentAction = 'confirm';
                document.getElementById('confirmMessage').textContent = 
                    "Are you sure you want to confirm this adoption request?";
                confirmModal.classList.remove('hidden');
                adoptionModal.classList.add('hidden');
            });

            // Close confirm modal
            closeConfirmModal.addEventListener('click', function() {
                confirmModal.classList.add('hidden');
            });

            cancelBtn.addEventListener('click', function() {
                confirmModal.classList.add('hidden');
            });

            // Proceed with action
            document.getElementById('proceedBtn').addEventListener('click', function() {
                confirmModal.classList.add('hidden');
                if (currentAction === 'confirm') {
                    alert(`Adoption request #${currentRowId} confirmed!`);
                    // Here you would add your actual confirmation logic
                } else {
                    alert(`Adoption request #${currentRowId} declined!`);
                    // Here you would add your actual decline logic
                }
            });
        });
    </script>
</body>
</html>