<?php
session_start();

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
    <title>Adoption Status</title>
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

        .status-badge {
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        .status-confirmed {
            background-color: #D1FAE5;
            color: #065F46;
        }
        
        .status-declined {
            background-color: #FEE2E2;
            color: #B91C1C;
        }

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
        }
    </style>
</head>

<body class="bg-gray-800 text-black-300 font-sans">
    <div id="menuOverlay" class="menu-overlay fixed inset-0 z-20"></div>

    <div id="sideMenu" class="side-menu fixed top-0 left-0 h-full w-64 bg-[#FDF2C1] z-30 shadow-lg md:w-56">
        <div class="p-4 border-b border-gray-300">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-bold">Menu</h2>
                <button id="closeMenu" class="text-2xl">&times;</button>
            </div>
        </div>
        <nav class="p-4">
            <ul class="space-y-4">
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
                        class="menu-item block py-2 px-4 hover:bg-[#FDCB58] rounded-lg transition duration-300"
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
                    <a href="../adminphp/adoption_status.php"
                        class="menu-item block py-2 px-4 bg-[#FDCB58] rounded-lg transition duration-300"
                        data-url="../adminphp/adoption_status.php">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm md:text-base">Adoption Status</span>
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
        <h1 class="text-lg font-bold text-black md:text-xl">Adoption Status Results</h1>
        <img src="../images/SHELTER OF LIGHT/SOL-LOGO.png" alt="Logo" class="w-8 h-8 lg:w-12 lg:h-12">
    </div>

    <!-- Adoption Status Table -->
    <div class="bg-[#FFF9E5] mx-4 my-6 p-4 rounded-lg shadow-lg md:mx-6 md:my-8 md:p-6">
        <div class="overflow-x-auto">
            <table class="responsive-table table-auto w-full border-collapse text-left">
                <thead class="bg-[#FDF2C1] hidden md:table-header-group">
                    <tr>
                        <th class="px-4 py-2 font-bold">#</th>
                        <th class="px-4 py-2 font-bold">Name</th>
                        <th class="px-4 py-2 font-bold">Pet Requested</th>
                        <th class="px-4 py-2 font-bold">Status</th>
                        <th class="px-4 py-2 font-bold">Date Processed</th>
                        <th class="px-4 py-2 font-bold">Admin Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once '../connection.php';

                    $allowedStatuses = ['Confirmed', 'Declined'];

                    $statusesForSql = "'" . implode("','", $allowedStatuses) . "'";

                    $stmt = $conn->query("SELECT * FROM adopt WHERE status IN ($statusesForSql) ORDER BY processed_date DESC");
                    $counter = 1;
                    
                    while ($row = $stmt->fetch_assoc()) {
                        $statusClass = $row['status'] === 'Confirmed' ? 'status-confirmed' : 'status-declined';
                        
                        echo "<tr class='bg-white' data-id='{$row['id']}'>";
                        echo "<td class='px-4 py-2 border-b' data-label='#'>{$counter}</td>";
                        echo "<td class='px-4 py-2 border-b' data-label='Name'>{$row['fullName']}</td>";
                        echo "<td class='px-4 py-2 border-b' data-label='Pet Requested'>{$row['desiredPet']}</td>";
                        echo "<td class='px-4 py-2 border-b' data-label='Status'><span class='status-badge {$statusClass}'>{$row['status']}</span></td>";
                        echo "<td class='px-4 py-2 border-b' data-label='Date Processed'>" . date('M d, Y h:i A', strtotime($row['processed_date'])) . "</td>";
                        echo "<td class='px-4 py-2 border-b' data-label='Admin Notes'>{$row['admin_notes']}</td>";
                        echo "</tr>";
                        $counter++;
                    }
                    
                    if ($counter === 1) {
                        echo "<tr><td colspan='6' class='px-4 py-2 text-center'>No adoption results found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
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
        });
    </script>
</body>

</html>