<?php
session_start();

// pag walang nakalogin at binago sa url eto ang ma eexecute nya 
if (!isset($_SESSION['username'])) {
    header('Location: ../php/home.php');
    exit();
}
?>

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
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <span class="text-sm md:text-base">Manage Users</span>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="../adminphp/plists_status.php"
                        class="menu-item block py-2 px-4 hover:bg-[#FDCB58] rounded-lg transition duration-300">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Pet List Status
                        </div>
                    </a>
                </li>

                <li>
                    <a href="../adminphp/users_status.php"
                        class="menu-item block py-2 px-4 hover:bg-[#FDCB58] rounded-lg transition duration-300">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            User Status
                        </div>
                    </a>
                </li>

                <li class="border-t border-gray-300 mt-6 pt-4">
                    <a href="../php/adoptlogin.php"
                        class="menu-item block py-2 px-4 hover:bg-red-100 text-red-600 rounded-lg transition duration-300"
                        data-url="../php/adoptlogin.php">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
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
        <img src="../images/SHELTER OF LIGHT/SOL-LOGO.png" alt="Logo" class="w-8 h-8 lg:w-12 lg:h-12"> <!-- Reduced logo size -->

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

                    // Define allowed statuses for verification
                    $allowedStatuses = ['For Verification'];

                    // Prepare the statuses as a comma-separated string with quotes for SQL
                    $statusesForSql = "'" . implode("','", $allowedStatuses) . "'";

                    $stmt = $conn->query("SELECT * FROM adopt WHERE status IN ($statusesForSql)");
                    $counter = 1;
                    while ($row = $stmt->fetch_assoc()) {
                        echo "<tr class='bg-white' data-id='{$row['id']}'>";
                        echo "<td class='px-4 py-2 border-b' data-label='#'>{$counter}</td>";
                        echo "<td class='px-4 py-2 border-b' data-label='Name'>{$row['fullName']}</td>";
                        echo "<td class='px-4 py-2 border-b' data-label='Address'>{$row['address']}</td>";
                        echo "<td class='px-4 py-2 border-b' data-label='Phone'>{$row['phone']}</td>";
                        echo "<td class='px-4 py-2 border-b' data-label='Age'>{$row['age']}</td>";
                        echo "<td class='px-4 py-2 border-b' data-label='Email'>{$row['email']}</td>";
                        echo "<td class='px-4 py-2 border-b' data-label='Social Media'>{$row['socialMedia']}</td>";
                        echo "<td class='px-4 py-2 border-b' data-label='Occupation'>{$row['jobTitle']}</td>";
                        echo "<td class='px-4 py-2 border-b flex space-x-2 action-buttons' data-label='Action'>";
                        echo "<button class='approve-btn bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-700 text-sm md:text-base' data-id='{$row['id']}'>&#10004;</button>";
                        echo "<button class='decline-btn bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-700 text-sm md:text-base' data-id='{$row['id']}'>&#10008;</button>";
                        echo "</td>";
                        echo "</tr>";
                        $counter++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Replace your existing Confirmation Modal with this enhanced version -->
    <div id="confirmModal"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden p-4">
        <div class="bg-white rounded-lg p-6 w-full max-w-2xl max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Adoption Request Details</h3>
                <button id="closeConfirmModal" class="text-2xl">&times;</button>
            </div>

            <!-- User Information Section -->
            <div class="mb-6">
                <h4 class="text-lg font-semibold mb-2 border-b pb-2">User Information</h4>
                <div id="userDetails" class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <!-- Will be populated by JavaScript -->
                </div>
            </div>

            <!-- Pet Information Section -->
            <div class="mb-6">
                <h4 class="text-lg font-semibold mb-2 border-b pb-2">Pet to Adopt</h4>
                <div id="petDetails" class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <!-- Will be populated by JavaScript -->
                </div>
                <div id="petImageContainer" class="mt-4 flex justify-center">
                    <!-- Pet image will be inserted here -->
                </div>
            </div>

            <!-- Confirmation Question -->
            <div class="bg-yellow-50 p-4 rounded-lg mb-6">
                <p id="confirmMessage" class="font-semibold text-center"></p>
            </div>

            <div class="flex justify-between gap-4">
                <button id="cancelBtn" name="cancelbtn"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-700 flex-1">Cancel</button>
                <button id="proceedBtn" name="proceedbtn"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 flex-1">Proceed</button>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
            // Menu toggle functionality
            const menuToggle = document.getElementById('menuToggle');
            const closeMenu = document.getElementById('closeMenu');
            const sideMenu = document.getElementById('sideMenu');
            const menuOverlay = document.getElementById('menuOverlay');

            if (menuToggle) menuToggle.addEventListener('click', function () {
                sideMenu.classList.add('active');
                menuOverlay.classList.add('active');
            });

            if (closeMenu) closeMenu.addEventListener('click', function () {
                sideMenu.classList.remove('active');
                menuOverlay.classList.remove('active');
            });

            if (menuOverlay) menuOverlay.addEventListener('click', function () {
                sideMenu.classList.remove('active');
                menuOverlay.classList.remove('active');
            });

            // Adoption request handling
            const confirmModal = document.getElementById('confirmModal');
            const closeConfirmModal = document.getElementById('closeConfirmModal');
            const cancelBtn = document.getElementById('cancelBtn');
            const proceedBtn = document.getElementById('proceedBtn');
            const confirmMessage = document.getElementById('confirmMessage');

            let currentAction = '';
            let currentRowId = null;
            let currentRowElement = null;

            // Function to handle adoption action
            function handleAdoptionAction(action, id, rowElement) {
                fetch('process_adoption.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `action=${action}&id=${id}`
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Remove row only after successful server deletion
                            rowElement.remove();
                            alert(data.message);
                        } else {
                            alert('Error: ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Failed to process request. Please try again.');
                    });
            }

            // Function to attach event listeners to buttons
            function attachButtonListeners() {
                // Approve button click
                document.querySelectorAll('.approve-btn').forEach(button => {
                    button.addEventListener('click', async function (e) {
                        e.preventDefault();
                        currentRowId = this.getAttribute('data-id');
                        currentRowElement = this.closest('tr');
                        currentAction = 'Confirmed';

                        // Show loading state
                        confirmModal.classList.remove('hidden');
                        document.getElementById('userDetails').innerHTML = '<p>Loading details...</p>';

                        // Fetch and display details
                        const success = await fetchAdoptionDetails(currentRowId);
                        if (!success) {
                            confirmModal.classList.add('hidden');
                        }
                    });
                });

                // Decline button click
                document.querySelectorAll('.decline-btn').forEach(button => {
                    button.addEventListener('click', async function (e) {
                        e.preventDefault();
                        currentRowId = this.getAttribute('data-id');
                        currentRowElement = this.closest('tr');
                        currentAction = 'Declined';

                        // Show loading state
                        confirmModal.classList.remove('hidden');
                        document.getElementById('userDetails').innerHTML = '<p>Loading details...</p>';

                        // Fetch and display details
                        const success = await fetchAdoptionDetails(currentRowId);
                        if (!success) {
                            confirmModal.classList.add('hidden');
                        }
                    });
                });
            }

            // Initial attachment of event listeners
            attachButtonListeners();

            // Modal controls
            if (closeConfirmModal) closeConfirmModal.addEventListener('click', function () {
                confirmModal.classList.add('hidden');
            });

            if (cancelBtn) cancelBtn.addEventListener('click', function () {
                confirmModal.classList.add('hidden');
            });

            // Proceed with action
            if (proceedBtn) proceedBtn.addEventListener('click', function () {
                confirmModal.classList.add('hidden');
                if (currentRowId && currentRowElement) {
                    handleAdoptionAction(currentAction, currentRowId, currentRowElement);
                }
            });

            // Function to fetch adoption details
            async function fetchAdoptionDetails(id) {
                try {
                    const response = await fetch(`get_adoption_details.php?id=${id}`);
                    const data = await response.json();

                    if (data.success) {
                        // Populate User Information
                        document.getElementById('userDetails').innerHTML = `
                    <div><strong>Name:</strong> ${data.fullName}</div>
                    <div><strong>Address:</strong> ${data.address}</div>
                    <div><strong>Phone:</strong> ${data.phone}</div>
                    <div><strong>Age:</strong> ${data.age}</div>
                    <div><strong>Email:</strong> ${data.email}</div>
                    <div><strong>Social Media:</strong> ${data.socialMedia}</div>
                    <div><strong>Occupation:</strong> ${data.jobTitle}</div>
                `;

                        // Populate Pet Information
                        let petDetailsHTML = '';
                        let petImageHTML = '';

                        if (data.desiredPet) {
                            // Get pet details from database
                            const petResponse = await fetch(`get_pet_details.php?name=${encodeURIComponent(data.desiredPet)}`);
                            const petData = await petResponse.json();

                            if (petData.success) {
                                petDetailsHTML = `
                            <div><strong>Pet Name:</strong> ${petData.pet_name}</div>
                            <div><strong>Type:</strong> ${petData.type}</div>
                            <div><strong>Breed:</strong> ${petData.pet_breed}</div>
                            <div><strong>Age:</strong> ${petData.pet_age}</div>
                            <div><strong>Gender:</strong> ${petData.pet_gender}</div>
                            <div><strong>Vaccination:</strong> ${petData.pet_vacinated}</div>
                            <div><strong>Description:</strong> ${petData.description}</div>
                        `;

                                petImageHTML = `
                            <img src="../adminphp/plist.php?id=${petData.id}" 
                                 alt="${petData.pet_name}" 
                                 class="w-48 h-48 object-cover rounded-lg shadow-md">
                        `;
                            } else {
                                petDetailsHTML = `
                            <div><strong>Pet Name:</strong> ${data.desiredPet}</div>
                            <div><em>Detailed pet information not available</em></div>
                        `;
                            }
                        } else {
                            petDetailsHTML = '<div>No pet selected</div>';
                        }

                        document.getElementById('petDetails').innerHTML = petDetailsHTML;
                        document.getElementById('petImageContainer').innerHTML = petImageHTML;

                        // Set confirmation message based on action
                        // ... (previous code remains the same until the confirmMessage section)

                        // Set confirmation message based on action
                        const actionText = currentAction === 'Confirmed' ? 'CONFIRM' : 'DECLINE';
                        document.getElementById('confirmMessage').textContent =
                            `Are you sure you want to ${actionText} this adoption request? Please review all details above before proceeding.`;

                        // ... (rest of the code remains the same)
                        return true;
                    } else {
                        alert('Error: ' + data.message);
                        return false;
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert('Failed to fetch adoption details. Please try again.');
                    return false;
                }
            }

            // Re-attach event listeners when new rows are added dynamically
            const observer = new MutationObserver(function (mutations) {
                mutations.forEach(function (mutation) {
                    if (mutation.addedNodes.length) {
                        attachButtonListeners();
                    }
                });
            });

            // Start observing the table body for changes
            const tableBody = document.querySelector('table.responsive-table tbody');
            if (tableBody) {
                observer.observe(tableBody, {
                    childList: true,
                    subtree: true
                });
            }
        });
    </script>
</body>

</html>