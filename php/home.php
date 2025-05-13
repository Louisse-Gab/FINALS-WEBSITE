<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter of Light</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=PoetsenOne&display=swap');
        .font-poetsen {
            font-family: 'PoetsenOne', sans-serif;
        }
        .font-opensans {
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-[#FFFBE9] text-gray-800 font-opensans">
    <!-- Header -->
    <header class="bg-[#FFFBE9] shadow-md">
        <div class="container mx-auto flex justify-between items-center px-6 py-6">
            <!-- Logo and Title -->
            <div class="flex items-center space-x-5">
                <img src="../images/SHELTER OF LIGHT/SOL-LOGO.png" alt="Logo" class="w-16 h-16">
                <h1 class="text-3xl font-poetsen font-bold text-black">Shelter of Light</h1> <!-- Larger title -->
            </div>
            <!-- Navigation -->
            <nav class="flex space-x-8 text-base uppercase font-bold"> <!-- Larger navigation font -->
                <a href="#home" class="text-[#FFBB00] hover:text-black">Home</a>
                <a href="#about" class="hover:text-[#FFBB00]">About Us</a>
                <a href="#what-we-do" class="hover:text-[#FFBB00]">What We Do</a>
                <a href="#donate" class="hover:text-[#FFBB00]">Donate</a>
                <a href="#adopt" class="hover:text-[#FFBB00]">Adopt</a>
                <a href="#contact" class="hover:text-[#FFBB00]">Contact</a>
            </nav>
            <!-- Search Icon -->
            <div>
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-black hover:text-[#FFBB00]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.75-4.4a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
     <section class="bg-[#FFEBB9] py-12">
        <div class="container mx-auto text-center">
            <div class="flex justify-center items-center">
                <img src="../images/SHELTER OF LIGHT/PAW-LOGO.png" alt="Paw Logo" class="w-24 h-24 mr-4"> <!-- Paw Logo -->
                <h1 class="text-5xl font-poetsen font-bold text-black">Shelter of Light</h1> <!-- Large Title -->
            </div>
            <p class="italic text-[#FFBB00] mt-4 text-lg">“ Where Love Shines Through the Darkness. ”</p> <!-- Subtitle -->
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="text-gray-800 py-12 px-6"> <!-- Larger padding -->
        <div class="container mx-auto">
            <p class="text-center leading-relaxed text-lg">
                Welcome to the Shelter of Light website. This platform serves as a central space where visitors can learn more about who we are, what we do, and how we continue to grow as a faith-centered community. Whether you're a member, a supporter, or someone new to our mission, this site provides a clear overview of our journey, programs, and vision.
            </p>
            <p class="text-center leading-relaxed mt-6 text-lg">
                Here, you will find key information about our ministry, highlights from past events, and updates on ongoing activities. It also features media galleries, testimonials, and resources that reflect our commitment to service, discipleship, and spiritual growth.
            </p>
            <p class="text-center leading-relaxed mt-6 text-lg">
                We invite you to explore the pages, discover our story, and be part of the continuing light that inspires and connects us all.
            </p>
        </div>
    </section>

    <!-- Latest Pet Adopted Section -->
    <section class="bg-[#FFEBB9] py-12"> <!-- Larger padding -->
        <div class="container mx-auto">
            <h2 class="text-center text-2xl font-bold text-gray-800 mb-6">Latest Pet Adopted</h2>
            <!-- Carousel -->
            <div class="relative overflow-hidden">
                <div class="flex transition-transform duration-300 ease-in-out" id="carousel">
                    <div class="w-full flex-none">
                        <img src="pet1.jpg" alt="Pet 1" class="w-full h-60 object-cover rounded-md"> <!-- Larger carousel images -->
                    </div>
                    <div class="w-full flex-none">
                        <img src="pet2.jpg" alt="Pet 2" class="w-full h-60 object-cover rounded-md">
                    </div>
                    <div class="w-full flex-none">
                        <img src="pet3.jpg" alt="Pet 3" class="w-full h-60 object-cover rounded-md">
                    </div>
                </div>
                <!-- Carousel navigation -->
                <button id="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 px-4 py-2 bg-gray-800 text-white rounded-full">❮</button>
                <button id="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 px-4 py-2 bg-gray-800 text-white rounded-full">❯</button>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section class="bg-black text-white py-12"> <!-- Larger padding -->
        <div class="container mx-auto text-center">
            <h3 class="text-lg font-bold mb-4">In total, Shelter of Light has aided, helped, loved, fed, and cared for</h3>
            <p class="text-2xl font-bold">Around 400 Animals</p>
            <div class="flex justify-center space-x-10 mt-8">
                <div class="text-center">
                    <p class="text-[#FFBB00] text-3xl font-bold">23</p>
                    <p>Dogs</p>
                </div>
                <div class="text-center">
                    <p class="text-[#FFBB00] text-3xl font-bold">377+</p>
                    <p>Cats</p>
                </div>
                <div class="text-center">
                    <p class="text-[#FFBB00] text-3xl font-bold">3</p>
                    <p>Birds</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#FFEBB9] text-[#5F4B32] py-6">
        <div class="container mx-auto flex justify-between items-center text-sm">
            <!-- Left Section -->
            <div class="flex space-x-4 items-center">
                <p class="font-bold">GET IN TOUCH WITH US</p>
                <div class="flex space-x-2">
                    <a href="#" class="hover:text-black"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="hover:text-black"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="hover:text-black"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <!-- Center Section -->
            <div class="text-center">
                <p>&copy; Shelter of Light. All Rights Reserved.</p>
            </div>
            <!-- Right Section -->
            <div class="text-right">
                <p class="font-bold">CREATORS OF THIS WEBSITE</p>
                <p>BRIONES | CABANDA | LIZEN<br>UST – CICS</p>
            </div>
        </div>
    </footer>

    <script>
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
    </script>
</body>
</html>