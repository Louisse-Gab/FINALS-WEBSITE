<?php
session_start();

// Redirect if not logged in
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
    <title>Manage Adoption Requests</title>
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
<body class="bg-gray-800 text-gray-300 font-sans">
    <!-- Side Menu Overlay -->
    <div id="menuOverlay" class="menu-overlay fixed inset-0 z-20"></div>

    <!-- Side Menu -->
    <div id="sideMenu" class="side-menu fixed top-0 left-0 h-full w-64 bg-[#FDF2C1] z-30 shadow-lg">
        <div class="p-4 border-b border-gray-300">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-bold">Menu</h2>
                <button id="closeMenuBtn" class="text-2xl cursor-pointer p-2">&times;</button>
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
                    <a href="../adminphp/plist.php" 
                       class="menu-item block py-2 px-4 hover:bg-[#FDCB58] rounded-lg transition duration-300" 
                       data-url="../adminphp/plist.php">
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
                <li>  
                    <a href="../adminphp/manage_adopt.php"
                       class="menu-item block py-2 px-4 bg-[#FDCB58] rounded-lg transition duration-300" 
                       data-url="../adminphp/manage_adopt.php">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                            Adoption Requests
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
    <div class="flex justify-between items-center bg-[#FDF2C1] px-4 py-2 shadow-md relative z-10">
        <div class="menu-icon" id="menuButton">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </div>
        <h1 class="text-xl font-bold absolute left-1/2 transform -translate-x-1/2">History</h1>
        <div class="flex items-center">
            <img src="../images/SHELTER OF LIGHT/SOL-LOGO.png" alt="Logo" class="w-8 h-8 lg:w-12 lg:h-12">
        </div>
    </div>

    <!-- Adoption Requests Table -->
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full responsive-table">
                    <thead class="bg-[#FDF2C1]">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">User</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Pet</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                        require_once '../connection.php';
                        
                        // Fetch adoption requests
                        $query = "SELECT a.*, u.username, p.pet_name 
                                  FROM adoptions a
                                  JOIN users u ON a.user_id = u.id
                                  JOIN pets p ON a.pet_id = p.id
                                  ORDER BY a.request_date DESC";
                        $result = $conn->query($query);
                        
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='px-6 py-4 whitespace-nowrap' data-label='ID'>{$row['id']}</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap' data-label='User'>{$row['username']}</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap' data-label='Pet'>{$row['pet_name']}</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap' data-label='Status'>";
                                echo "<span class='px-2 inline-flex text-xs leading-5 font-semibold rounded-full ";
                                switch ($row['status']) {
                                    case 'Pending':
                                        echo "bg-yellow-100 text-yellow-800";
                                        break;
                                    case 'Approved':
                                        echo "bg-green-100 text-green-800";
                                        break;
                                    case 'Rejected':
                                        echo "bg-red-100 text-red-800";
                                        break;
                                    default:
                                        echo "bg-gray-100 text-gray-800";
                                }
                                echo "'>{$row['status']}</span>";
                                echo "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap' data-label='Date'>" . date('M d, Y', strtotime($row['request_date'])) . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-medium' data-label='Actions'>";
                                if ($row['status'] == 'Pending') {
                                    echo "<button onclick='showAdoptionDetails({$row['id']}, \"approve\")' class='text-green-600 hover:text-green-900 mr-3'>Approve</button>";
                                    echo "<button onclick='showAdoptionDetails({$row['id']}, \"reject\")' class='text-red-600 hover:text-red-900'>Reject</button>";
                                } else {
                                    echo "<span class='text-gray-500'>Processed</span>";
                                }
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='px-6 py-4 text-center'>No adoption requests found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Adoption Details Modal -->
    <div id="adoptionModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg p-6 w-full max-w-2xl max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Adoption Request Details</h3>
                <button id="closeModal" class="text-2xl">&times;</button>
            </div>
            
            <div id="modalContent">
                <!-- Content will be loaded via AJAX -->
            </div>
            
            <div class="mt-6 flex justify-end space-x-3">
                <button id="cancelAction" class="px-4 py-2 bg-gray-300 rounded-md">Cancel</button>
                <button id="confirmAction" class="px-4 py-2 bg-blue-500 text-white rounded-md">Confirm</button>
            </div>
        </div>
    </div>

    <script>
        // Menu toggle functionality
        function toggleMenu() {
            const sideMenu = document.getElementById('sideMenu');
            const menuOverlay = document.getElementById('menuOverlay');
            
            sideMenu.classList.toggle('active');
            menuOverlay.classList.toggle('active');
            
            document.body.style.overflow = sideMenu.classList.contains('active') ? 'hidden' : '';
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Menu controls
            document.getElementById('menuButton').addEventListener('click', toggleMenu);
            document.getElementById('closeMenuBtn').addEventListener('click', toggleMenu);
            document.getElementById('menuOverlay').addEventListener('click', toggleMenu);
            
            // Modal controls
            const modal = document.getElementById('adoptionModal');
            const closeModal = document.getElementById('closeModal');
            const cancelAction = document.getElementById('cancelAction');
            
            [closeModal, cancelAction].forEach(el => {
                el.addEventListener('click', () => {
                    modal.classList.add('hidden');
                });
            });
            
            // Close modal when clicking outside
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
        
        let currentAction = '';
        let currentRequestId = 0;
        
        function showAdoptionDetails(requestId, action) {
            currentRequestId = requestId;
            currentAction = action;
            
            const modal = document.getElementById('adoptionModal');
            const modalContent = document.getElementById('modalContent');
            const confirmBtn = document.getElementById('confirmAction');
            
            // Show loading state
            modalContent.innerHTML = '<p>Loading details...</p>';
            modal.classList.remove('hidden');
            
            // Fetch adoption details
            fetch(`get_adoption_details.php?id=${requestId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Populate modal with details
                        modalContent.innerHTML = `
                            <div class="mb-6">
                                <h4 class="text-lg font-semibold mb-2 border-b pb-2">User Information</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div><strong>Name:</strong> ${data.full_name}</div>
                                    <div><strong>Email:</strong> ${data.email}</div>
                                    <div><strong>Phone:</strong> ${data.phone}</div>
                                    <div><strong>Address:</strong> ${data.address}</div>
                                    <div><strong>Occupation:</strong> ${data.occupation}</div>
                                    <div><strong>Experience:</strong> ${data.pet_experience}</div>
                                </div>
                            </div>
                            
                            <div class="mb-6">
                                <h4 class="text-lg font-semibold mb-2 border-b pb-2">Pet Information</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div><strong>Pet Name:</strong> ${data.pet_name}</div>
                                    <div><strong>Type:</strong> ${data.pet_type}</div>
                                    <div><strong>Breed:</strong> ${data.pet_breed}</div>
                                    <div><strong>Age:</strong> ${data.pet_age}</div>
                                </div>
                            </div>
                            
                            <div class="bg-yellow-50 p-4 rounded-lg mb-6">
                                <p class="font-semibold text-center">
                                    Are you sure you want to ${action === 'approve' ? 'approve' : 'reject'} this adoption request?
                                </p>
                            </div>
                        `;
                        
                        // Set confirm button color based on action
                        confirmBtn.className = `px-4 py-2 text-white rounded-md ${action === 'approve' ? 'bg-green-500 hover:bg-green-600' : 'bg-red-500 hover:bg-red-600'}`;
                        confirmBtn.textContent = action === 'approve' ? 'Approve Adoption' : 'Reject Adoption';
                    } else {
                        modalContent.innerHTML = `<p class="text-red-500">Error: ${data.message}</p>`;
                    }
                })
                .catch(error => {
                    modalContent.innerHTML = `<p class="text-red-500">Failed to load details: ${error.message}</p>`;
                });
        }
        
        // Handle confirm action
        document.getElementById('confirmAction').addEventListener('click', function() {
            const modal = document.getElementById('adoptionModal');
            const modalContent = document.getElementById('modalContent');
            
            // Show processing state
            modalContent.innerHTML = '<p>Processing request...</p>';
            
            fetch('process_adoption.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=${currentAction}&id=${currentRequestId}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    modalContent.innerHTML = `
                        <div class="text-center py-4">
                            <svg class="mx-auto h-12 w-12 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <h3 class="mt-2 text-lg font-medium">${data.message}</h3>
                            <p class="mt-1 text-gray-600">The adoption request has been ${currentAction === 'approve' ? 'approved' : 'rejected'} successfully.</p>
                        </div>
                    `;
                    
                    // Hide confirm buttons
                    document.getElementById('confirmAction').classList.add('hidden');
                    document.getElementById('cancelAction').textContent = 'Close';
                    
                    // Reload the page after 2 seconds
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                } else {
                    modalContent.innerHTML = `
                        <div class="text-center py-4">
                            <svg class="mx-auto h-12 w-12 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <h3 class="mt-2 text-lg font-medium">Error Processing Request</h3>
                            <p class="mt-1 text-gray-600">${data.message}</p>
                        </div>
                    `;
                }
            })
            .catch(error => {
                modalContent.innerHTML = `
                    <div class="text-center py-4">
                        <svg class="mx-auto h-12 w-12 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <h3 class="mt-2 text-lg font-medium">Network Error</h3>
                        <p class="mt-1 text-gray-600">Failed to process request. Please try again.</p>
                    </div>
                `;
            });
        });
    </script>
</body>
</html>