<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter of Light</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=PoetsenOne&display=swap');
        .font-poetsen {
            font-family: 'PoetsenOne', sans-serif;
        }
        .font-opensans {
            font-family: 'Open Sans', sans-serif;
        }
        .full-width-section {
            width: 100vw;
            position: relative;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
        }
    </style>
</head>

<body class="bg-[#FFFBE9] text-gray-800 font-opensans">
    <!-- Header -->
    <header class="bg-[#FFFBE9] shadow-md">
        <div class="container mx-auto px-4 lg:px-6 py-4 lg:py-6">
            <div class="flex justify-between items-center">
                <!-- Logo and Title -->
                <div class="flex items-center space-x-2 lg:space-x-5">
                    <img src="../images/SHELTER OF LIGHT/SOL-LOGO.png" alt="Logo" class="w-12 h-12 lg:w-16 lg:h-16">
                    <h1 class="text-xl lg:text-3xl font-poetsen font-bold text-black">Shelter of Light</h1>
                </div>
                
                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex space-x-4 xl:space-x-8 text-sm lg:text-base uppercase font-bold">
                    <a href="#home" class="text-[#FFBB00] hover:text-black">Home</a>
                    <a href="about.php" class="hover:text-[#FFBB00]">About Us</a>
                    <a href="#what-we-do" class="hover:text-[#FFBB00]">What We Do</a>
                    <a href="#donate" class="hover:text-[#FFBB00]">Donate</a>
                    <a href="#adopt" class="hover:text-[#FFBB00]">Adopt</a>
                    <a href="#contact" class="hover:text-[#FFBB00]">Contact</a>
                </nav>
                
                <!-- Search Icon and Mobile Menu Button -->
                <div class="flex items-center space-x-4">
                    <button class="hidden lg:block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:h-7 lg:w-7 text-black hover:text-[#FFBB00]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.75-4.4a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
                        </svg>
                    </button>
                    <button id="menu-button" class="lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="hidden lg:hidden mt-4 pb-4">
                <div class="flex flex-col space-y-3 text-sm uppercase font-bold">
                    <a href="#home" class="text-[#FFBB00] hover:text-black">Home</a>
                    <a href="about.php" class="hover:text-[#FFBB00]">About Us</a>
                    <a href="#what-we-do" class="hover:text-[#FFBB00]">What We Do</a>
                    <a href="#donate" class="hover:text-[#FFBB00]">Donate</a>
                    <a href="#adopt" class="hover:text-[#FFBB00]">Adopt</a>
                    <a href="#contact" class="hover:text-[#FFBB00]">Contact</a>
                </div>
            </div>
        </div>
    </div>
</header>
            

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

   
    <!-- Footer -->
    <footer class="bg-[#FFFBE9] text-[#5F4B32] py-6">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row justify-between items-center gap-4 text-center lg:text-left">
                <!-- Left Section -->
                <div class="order-2 lg:order-1 flex flex-col sm:flex-row items-center gap-2 lg:gap-4">
                    <p class="font-bold whitespace-nowrap">GET IN TOUCH WITH US</p>
                    <div class="flex space-x-4">
                        <a href="#" class="hover:text-black"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="hover:text-black"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="hover:text-black"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <!-- Center Section -->
                <div class="order-1 lg:order-2">
                    <p>&copy; Shelter of Light. All Rights Reserved.</p>
                </div>
                <!-- Right Section -->
                <div class="order-3 text-center lg:text-right">
                    <p class="font-bold whitespace-nowrap">CREATORS OF THIS WEBSITE</p>
                    <p class="whitespace-nowrap">BRIONES | CABANDA | LIZEN<br>UST – CICS</p>
                </div>
            </div>
            
        </div>
    </div>
</footer>

    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.getElementById('menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            menuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });

            // Carousel functionality
            const carousel = document.getElementById('carousel');
            const prev = document.getElementById('prev');
            const next = document.getElementById('next');

            let currentIndex = 0;

            prev.addEventListener('click', () => {
                currentIndex = (currentIndex === 0) ? 2 : currentIndex - 1;
                carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
            });

            next.addEventListener('click', () => {
                currentIndex = (currentIndex === 2) ? 0 : currentIndex + 1;
                carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
            });
        });
    </script>
</body>
</html>
