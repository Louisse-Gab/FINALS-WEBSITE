<?php
// Set default page variables
$pageTitle = "Shelter of Light";
$currentYear = date("Y");

// Navigation items with their URLs and active states
$navItems = [
    ["name" => "Home", "url" => "home.php", "active" => true],
    ["name" => "About Us", "url" => "about.php", "active" => false],
    ["name" => "What We Do", "url" => "what-we-do.php", "active" => false],
    ["name" => "Donate", "url" => "donate.php", "active" => false],
    ["name" => "Adopt", "url" => "adopt.php", "active" => false],
    ["name" => "Contact", "url" => "contact.php", "active" => false]
];

// Social media links for footer
$socialLinks = [
    ["name" => "Facebook", "url" => "https://web.facebook.com/shelteroflightph", "icon" => "facebook"],
    ["name" => "Instagram", "url" => "https://www.instagram.com/shelteroflightph?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==", "icon" => "instagram"],
    ["name" => "Twitter", "url" => "https://x.com/shelteroflight", "icon" => "twitter"],
    ["name" => "YouTube", "url" => "https://www.youtube.com/@shelteroflightph", "icon" => "youtube"]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <!-- Include Tailwind CSS from CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FFBB00',
                        secondary: '#FFFBE9',
                        accent: '#5F4B32',
                        footer: '#FFEBB9'
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom styles for menu button animation */
        .menu-button {
            position: relative;
            width: 24px;
            height: 24px;
            cursor: pointer;
            z-index: 50;
        }
        
        .menu-button__line {
            position: absolute;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #000;
            transition: all 0.3s ease;
        }
        
        .menu-button__line:nth-child(1) {
            top: 6px;
        }
        
        .menu-button__line:nth-child(2) {
            top: 12px;
        }
        
        .menu-button__line:nth-child(3) {
            top: 18px;
        }
        
        .menu-button.active .menu-button__line:nth-child(1) {
            transform: translateY(6px) rotate(45deg);
        }
        
        .menu-button.active .menu-button__line:nth-child(2) {
            opacity: 0;
        }
        
        .menu-button.active .menu-button__line:nth-child(3) {
            transform: translateY(-6px) rotate(-45deg);
        }
        
        /* Add smooth transition for mobile menu */
        #mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        
        #mobile-menu.open {
            max-height: 300px;
        }
        
        /* Custom font for poetsen if needed */
        @font-face {
            font-family: 'Poetsen';
            src: url('../fonts/poetsen-one-regular.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
        
        .font-poetsen {
            font-family: 'Poetsen', sans-serif;
        }
        
        /* Header border/line styling */
        .header-border {
            position: relative;
        }
        
        .header-border::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 1px;
            background-color: rgba(0, 0, 0, 0.1);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        
        /* Desktop navigation styles */
        .desktop-nav {
            display: none;
        }
        
        @media (min-width: 1024px) {
            .desktop-nav {
                display: flex;
            }
        }
        
        /* Creator profile image styles */
        .profile-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #FFBB00;
        }
    </style>
</head>

<body class="bg-[#FFFBE9] text-gray-800 font-opensans">
    <!-- Header with border/line at bottom -->
    <header class="bg-[#FFFBE9] shadow-sm header-border">
        <div class="container mx-auto px-4 lg:px-6 py-4 lg:py-6">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2 lg:space-x-5">
                    <img src="../images/SHELTER OF LIGHT/SOL-LOGO.png" alt="Logo" class="w-12 h-12 lg:w-16 lg:h-16">
                    <h1 class="text-xl lg:text-3xl font-poetsen font-bold text-black">Shelter of Light</h1>
                </div>
                
                <!-- Desktop Navigation -->
<<<<<<< HEAD
                <nav class="desktop-nav space-x-4 xl:space-x-8 text-sm lg:text-base uppercase font-bold">
                    <?php foreach ($navItems as $item): ?>
                        <a href="<?php echo $item['url']; ?>" class="<?php echo $item['active'] ? 'text-[#FFBB00]' : 'hover:text-[#FFBB00]'; ?>">
                            <?php echo $item['name']; ?>
                        </a>
                    <?php endforeach; ?>
=======
                <nav class="hidden lg:flex space-x-4 xl:space-x-8 text-sm lg:text-base uppercase font-bold">
                    <a href="home.php" class="text-[#FFBB00] hover:text-black">Home</a>
                    <a href="about.php" class="hover:text-[#FFBB00]">About Us</a>
                    <a href="whatwedo.php" class="hover:text-[#FFBB00]">What We Do</a>
                    <a href="donate.php" class="hover:text-[#FFBB00]">Donate</a>
                    <a href="adopt.php" class="hover:text-[#FFBB00]">Adopt</a>
                    <a href="contact.php" class="hover:text-[#FFBB00]">Contact</a>
>>>>>>> 792aa7ff4e31ae316a243d1c591f633387f246ad
                </nav>
                
                <div class="flex items-center space-x-4">
                    <button class="hidden lg:block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:h-7 lg:w-7 text-black hover:text-[#FFBB00]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.75-4.4a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
                        </svg>
                    </button>
                    <!-- Enhanced Menu Button -->
                    <div id="menu-button" class="menu-button lg:hidden">
                        <div class="menu-button__line"></div>
                        <div class="menu-button__line"></div>
                        <div class="menu-button__line"></div>
                    </div>
                </div>
            </div>

            <!-- Mobile Navigation with enhanced animation -->
            <div id="mobile-menu" class="lg:hidden mt-4 pb-4">
                <div class="flex flex-col space-y-3 text-sm uppercase font-bold">
<<<<<<< HEAD
                    <?php foreach ($navItems as $item): ?>
                        <a href="<?php echo $item['url']; ?>" class="<?php echo $item['active'] ? 'text-[#FFBB00]' : 'hover:text-[#FFBB00]'; ?>">
                            <?php echo $item['name']; ?>
                        </a>
                    <?php endforeach; ?>
=======
                    <a href="index.html" class="text-[#FFBB00] hover:text-black">Home</a>
                    <a href="index.html" class="hover:text-[#FFBB00]">About Us</a>
                    <a href="index.html" class="hover:text-[#FFBB00]">What We Do</a>
                    <a href="index.html" class="hover:text-[#FFBB00]">Donate</a>
                    <a href="index.html" class="hover:text-[#FFBB00]">Adopt</a>
                    <a href="index.html" class="hover:text-[#FFBB00]">Contact</a>
>>>>>>> 792aa7ff4e31ae316a243d1c591f633387f246ad
                </div>
            </div>
        </div>
    </header>
<<<<<<< HEAD
=======
            
>>>>>>> 792aa7ff4e31ae316a243d1c591f633387f246ad

    <!-- Thin line/border after header - explicit border element -->
    <div class="w-full h-px bg-[#00000020]"></div>
            
    <!-- Hero Section -->
    <section class="bg-[#FFFBDE] py-8 lg:py-12">
        <div class="container mx-auto text-center px-4">
            <div class="flex flex-col lg:flex-row justify-center items-center">
                <img src="../images/SHELTER OF LIGHT/PAW-LOGO.png" alt="Paw Logo" class="w-20 h-20 lg:w-24 lg:h-24 lg:mr-4 mb-4 lg:mb-0">
                <h1 class="text-3xl lg:text-5xl font-poetsen font-bold text-black">Shelter of Light</h1>
            </div>
            <p class="italic text-[#FFBB00] mt-4 text-base lg:text-lg">"Where Love Shines Through the Darkness."</p>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="text-gray-800 py-8 lg:py-12 px-4 lg:px-6">
        <div class="container mx-auto">
            <p class="text-center leading-relaxed text-base lg:text-lg">
                Welcome to the Shelter of Light website. This platform serves as a central space where visitors can learn more about who we are, what we do, and how we continue to grow as a faith-centered community. Whether you're a member, a supporter, or someone new to our mission, this site provides a clear overview of our journey, programs, and vision.
            </p>
            <p class="text-center leading-relaxed mt-4 lg:mt-6 text-base lg:text-lg">
                Here, you will find key information about our ministry, highlights from past events, and updates on ongoing activities. It also features media galleries, testimonials, and resources that reflect our commitment to service, discipleship, and spiritual growth.
            </p>
            <p class="text-center leading-relaxed mt-4 lg:mt-6 text-base lg:text-lg">
                We invite you to explore the pages, discover our story, and be part of the continuing light that inspires and connects us all.
            </p>
        </div>
    </section>

    <!-- Latest Pet Adopted Section -->
    <section class="bg-[#FFFBDE] py-8 lg:py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-center text-xl lg:text-2xl font-bold text-gray-800 mb-6">Latest Pet Adopted</h2>
            <!-- Carousel -->
            <div class="relative overflow-hidden">
                <div class="flex transition-transform duration-300 ease-in-out" id="carousel">
                    <div class="w-full flex-none">
                        <img src="pet1.jpg" alt="Pet 1" class="w-full h-48 lg:h-60 object-cover rounded-md">
                    </div>
                    <div class="w-full flex-none">
                        <img src="pet2.jpg" alt="Pet 2" class="w-full h-48 lg:h-60 object-cover rounded-md">
                    </div>
                    <div class="w-full flex-none">
                        <img src="pet3.jpg" alt="Pet 3" class="w-full h-48 lg:h-60 object-cover rounded-md">
                    </div>
                </div>
                <!-- Carousel navigation -->
                <button id="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 px-3 py-1 lg:px-4 lg:py-2 bg-gray-800 text-white rounded-full text-sm lg:text-base">❮</button>
                <button id="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 px-3 py-1 lg:px-4 lg:py-2 bg-gray-800 text-white rounded-full text-sm lg:text-base">❯</button>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section class="bg-black text-white py-8 lg:py-12">
        <div class="container mx-auto text-center px-4">
            <h3 class="text-base lg:text-lg font-bold mb-4">In total, Shelter of Light has aided, helped, loved, fed, and cared for</h3>
            <p class="text-xl lg:text-2xl font-bold">Around 400 Animals</p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4 lg:space-x-10 mt-6 lg:mt-8">
                <div class="text-center">
                    <p class="text-[#FFBB00] text-2xl lg:text-3xl font-bold">23</p>
                    <p>Dogs</p>
                </div>
                <div class="text-center">
                    <p class="text-[#FFBB00] text-2xl lg:text-3xl font-bold">377+</p>
                    <p>Cats</p>
                </div>
                <div class="text-center">
                    <p class="text-[#FFBB00] text-2xl lg:text-3xl font-bold">3</p>
                    <p>Birds</p>
                </div>
            </div>
        </div>
    </section>
   
<<<<<<< HEAD
    <!-- Footer -->
    <!-- Horizontal line above footer -->
    <hr class="border-t border-[#00000033] w-full my-0">

    <!-- Footer -->
    <footer class="full-width-section bg-[#FFFBE9] text-[#5F4B32] py-6">
        <div class="container mx-auto px-4 lg:px-6">
            <div class="flex flex-col lg:flex-row justify-between items-center gap-4 text-center lg:text-left">
                
                <!-- Contact Info -->
                <div class="order-2 lg:order-1 flex flex-col items-center lg:items-start gap-2">
                    <p class="font-bold whitespace-nowrap">GET IN TOUCH WITH US</p>
                    <div class="flex justify-center gap-4">
                        <!-- Social media icons -->
                        <?php foreach ($socialLinks as $link): ?>
                            <a href="<?php echo $link['url']; ?>" class="text-[#5F4B32] hover:text-[#FFBB00]" target="_blank" rel="noopener noreferrer">
                                <?php if ($link['icon'] === 'facebook'): ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                                    </svg>
                                <?php elseif ($link['icon'] === 'instagram'): ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                    </svg>
                                <?php elseif ($link['icon'] === 'twitter'): ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                    </svg>
                                <?php elseif ($link['icon'] === 'youtube'): ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                                    </svg>
                                <?php endif; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Copyright -->
                <div class="order-1 lg:order-2">
                    <p>&copy; <?php echo $currentYear; ?> Shelter of Light. All Rights Reserved.</p>
                </div>
                
                <!-- Creators -->
                <div class="order-3 text-center lg:text-right">
                    <p class="font-bold whitespace-nowrap">CREATORS OF THIS WEBSITE</p>
                    <p class="whitespace-nowrap">BRIONES | CABANADA | LIZEN<br>UST</p>
=======
     <!-- Footer -->
<!-- Horizontal line above footer -->
<hr class="border-t border-[#00000033] w-full my-0">

<!-- Footer -->
<footer class="full-width-section bg-[#FFFBE9] text-[#5F4B32] py-6">
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
>>>>>>> 792aa7ff4e31ae316a243d1c591f633387f246ad
                </div>
                
            </div>
<<<<<<< HEAD
=======
            
            <!-- Copyright -->
            <div class="order-1 lg:order-2">
                <p>&copy; Shelter of Light. All Rights Reserved.</p>
            </div>
            
            <!-- Creators -->
            <div class="order-3 text-center lg:text-right">
                <p class="font-bold whitespace-nowrap">CREATORS OF THIS WEBSITE</p>
                <p class="whitespace-nowrap">BRIONES | CABANADA | LIZEN<br>UST</p>
            </div>
            
>>>>>>> 792aa7ff4e31ae316a243d1c591f633387f246ad
        </div>
    </footer>

    <script>
        // Enhanced Mobile menu toggle with animation
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.getElementById('menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            menuButton.addEventListener('click', function() {
                // Toggle active class for the menu button animation
                this.classList.toggle('active');
                
                // Toggle the mobile menu visibility with animation
                if (mobileMenu.classList.contains('open')) {
                    mobileMenu.classList.remove('open');
                    setTimeout(() => {
                        mobileMenu.classList.add('hidden');
                    }, 300); // Match this to the CSS transition time
                } else {
                    mobileMenu.classList.remove('hidden');
                    // Small delay to ensure the transition works after removing 'hidden'
                    setTimeout(() => {
                        mobileMenu.classList.add('open');
                    }, 10);
                }
            });

            // Carousel functionality
            const carousel = document.getElementById('carousel');
            const prev = document.getElementById('prev');
            const next = document.getElementById('next');

            if (carousel && prev && next) {
                let currentIndex = 0;

                prev.addEventListener('click', () => {
                    currentIndex = (currentIndex === 0) ? 2 : currentIndex - 1;
                    carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
                });

                next.addEventListener('click', () => {
                    currentIndex = (currentIndex === 2) ? 0 : currentIndex + 1;
                    carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
                });
                
                // Auto-rotate carousel every 5 seconds
                setInterval(() => {
                    currentIndex = (currentIndex === 2) ? 0 : currentIndex + 1;
                    carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
                }, 5000);
            }
        });
    </script>
</body>
</html>