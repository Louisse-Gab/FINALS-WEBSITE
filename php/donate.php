<?php
// Define the current page
$currentPage = 'donate';

// Navigation items
$navItems = [
    ['name' => 'Home', 'url' => 'home.php', 'active' => $currentPage === 'home'],
    ['name' => 'About Us', 'url' => 'about.php', 'active' => $currentPage === 'about'],
    ['name' => 'What We Do', 'url' => 'what-we-do.php', 'active' => $currentPage === 'what-we-do'],
    ['name' => 'Donate', 'url' => 'donate.php', 'active' => $currentPage === 'donate'],
    ['name' => 'Adopt', 'url' => 'adopt.php', 'active' => $currentPage === 'adopt'],
    ['name' => 'Contact', 'url' => 'contact.php', 'active' => $currentPage === 'contact']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate - Shelter of Light</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        main {
            flex-grow: 1;
        }
        
        /* Mobile menu styles */
        .mobile-menu {
            display: none;
        }
        
        @media (max-width: 1023px) {
            .desktop-nav {
                display: none;
            }
            
            .mobile-menu-button {
                display: block;
            }
            
            .mobile-menu.active {
                display: flex;
            }
        }
        
        .arrow-link:hover svg {
            transform: translateX(-5px);
            transition: transform 0.3s ease;
        }
    </style>
</head>
<body class="bg-[#FFFBDE]">
    <!-- Header with original navigation placement -->
    <header class="bg-[#FFFBE9] shadow-md border-b border-[#00000033]">
        <div class="container mx-auto flex justify-between items-center px-4 lg:px-6 py-4 lg:py-6">
            <a href="home.php" class="flex items-center space-x-2 lg:space-x-5">
                <img src="../images/SHELTER OF LIGHT/SOL-LOGO.png" alt="Logo" class="w-10 h-10 lg:w-16 lg:h-16">
                <h1 class="text-xl lg:text-3xl font-bold text-black">Shelter of Light</h1>
            </a>
            
            <!-- Desktop Navigation -->
            <nav class="desktop-nav space-x-4 lg:space-x-8 text-sm lg:text-base uppercase font-bold">
                <?php foreach ($navItems as $item): ?>
                    <a href="<?php echo $item['url']; ?>" class="<?php echo $item['active'] ? 'text-[#FFBB00]' : 'hover:text-[#FFBB00]'; ?>">
                        <?php echo $item['name']; ?>
                    </a>
                <?php endforeach; ?>
            </nav>
            
            <!-- Search Icon -->
            <div class="flex items-center space-x-4">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:h-7 lg:w-7 text-black hover:text-[#FFBB00]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.75-4.4a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Orange Container with Statement and Arrow -->
    <div class="full-width-section bg-[#FFF2CD] py-5 lg:py-5 border-b border-[#00000033]">
        <div class="container mx-auto px-4 lg:px-6 flex items-center justify-between">
            <div class="w-6"></div> <!-- Empty div for spacing -->
            <h2 class="text-lg lg:text-xl font-medium text-center">Thank you for your interest in donating! We accept through the following:</h2>
            <a href="home.php" class="arrow-link text-black hover:text-[#FFBB00]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
        </div>
    </div>

    <!-- Mobile Navigation Menu Button (Only visible on mobile) -->
    <div class="lg:hidden flex justify-between items-center px-4 py-3 bg-[#FFFBE9] border-b border-[#00000033]">
        <button class="mobile-menu-button">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        
        <h2 class="text-lg font-semibold">Donation Options</h2>
        
        <a href="javascript:history.back()" class="text-black">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
    </div>

    <!-- Mobile Menu (hidden by default) -->
    <div class="mobile-menu flex-col space-y-4 px-4 py-6 bg-[#FFFBE9] border-b border-[#00000033]">
        <?php foreach ($navItems as $item): ?>
            <a href="<?php echo $item['url']; ?>" class="block py-2 <?php echo $item['active'] ? 'text-[#FFBB00]' : 'hover:text-[#FFBB00]'; ?> uppercase font-bold">
                <?php echo $item['name']; ?>
            </a>
        <?php endforeach; ?>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8 flex-grow flex flex-col items-center justify-center">
        <div class="max-w-4xl mx-auto w-full">
            <!-- GCash QR Code Section -->
            <div class="flex flex-col items-center justify-center space-y-6 mb-12">
                
                <!-- GCash QR Code with anchor tag - LARGER SIZE -->
                <a href="#" class="block border-4 border-[#FFBB00] rounded-lg p-3 hover:shadow-lg transition duration-300">
                    <!-- Replace with actual GCash QR code image - LARGER SIZE -->
                    <img src="../images/SHELTER OF LIGHT/DONATE PAGE/Donation.jpeg" alt="Payment methods" class="w-full max-w-lg object-contain" style="min-height: 400px;">
                </a>
            </div>
        </div>
    </main>

    <!-- Horizontal line above footer -->
    <hr class="border-t border-[#00000033] w-full my-0">

    <!-- Footer -->
    <footer class="bg-[#FFFBE9] text-[#5F4B32] py-6 mt-auto">
        <div class="container mx-auto px-4 lg:px-6">
            <div class="flex flex-col lg:flex-row justify-between items-center gap-4 text-center lg:text-left">
                
                <!-- Contact Info -->
                <div class="order-2 lg:order-1 flex flex-col items-center lg:items-start gap-2">
                    <p class="font-bold whitespace-nowrap">GET IN TOUCH WITH US</p>
                    <div class="flex justify-center gap-4">
                        <!-- Social media icons -->
                        <a href="https://web.facebook.com/shelteroflightph" class="text-[#5F4B32] hover:text-[#FFBB00]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/shelteroflightph?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="text-[#5F4B32] hover:text-[#FFBB00]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="https://x.com/shelteroflight" class="text-[#5F4B32] hover:text-[#FFBB00]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="https://www.youtube.com/@shelteroflightph" class="text-[#5F4B32] hover:text-[#FFBB00]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Copyright -->
                <div class="order-1 lg:order-2">
                    <p>&copy; Shelter of Light. All Rights Reserved.</p>
                </div>
                
                <!-- Creators -->
                <div class="order-3 text-center lg:text-right">
                    <p class="font-bold whitespace-nowrap">CREATORS OF THIS WEBSITE</p>
                    <p class="whitespace-nowrap">BRIONES | CABANADA | LIZEN<br>UST</p>
                </div>
                
            </div>
        </div>
    </footer>

    <!-- JavaScript for mobile menu toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.querySelector('.mobile-menu-button');
            const mobileMenu = document.querySelector('.mobile-menu');
            
            menuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('active');
            });
        });
    </script>
</body>
</html>