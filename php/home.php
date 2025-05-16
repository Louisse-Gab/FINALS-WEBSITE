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
<header class="bg-[#FFFBE9] shadow-md border-b border-[#00000033]">
    <div class="container mx-auto flex justify-between items-center px-4 lg:px-6 py-4 lg:py-6">
        <a href="home.php" class="flex items-center space-x-2 lg:space-x-5">
            <img src="../images/SHELTER OF LIGHT/SOL-LOGO.png" alt="Logo" class="w-10 h-10 lg:w-16 lg:h-16">
            <h1 class="text-xl lg:text-3xl font-bold text-black">Shelter of Light</h1>
        </a>
        
        <!-- Desktop Navigation -->
        <nav class="desktop-nav space-x-4 lg:space-x-8 text-sm lg:text-base uppercase font-bold">
            <!-- Force HOME to be orange by using inline style -->
            <a href="home.php" class="text-[#FFBB00]">
                Home
            </a>
            <a href="about.php" class="hover:text-[#FFBB00]">
                About Us
            </a>
            <a href="what-we-do.php" class="hover:text-[#FFBB00]">
                What We Do
            </a>
            <a href="donate.php" class="hover:text-[#FFBB00]">
                Donate
            </a>
            <a href="adopt.php" class="hover:text-[#FFBB00]">
                Adopt
            </a>
            <a href="contact.php" class="hover:text-[#FFBB00]">
                Contact
            </a>
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
            

    <!-- Hero Section -->
     <section class="bg-[#FFFBDE] py-12">
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
    <section class="bg-[#FFFBDE] py-12"> <!-- Larger padding -->
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
<footer class="full-width-section bg-[#FFFBE9] text-[#5F4B32] py-6">
    <div class="container mx-auto px-4 lg:px-6">
        <div class="flex flex-col lg:flex-row justify-between items-center gap-4 text-center lg:text-left">
            
            <!-- Contact Info -->
            <div class="order-2 lg:order-1 flex flex-col items-center lg:items-start gap-2">
                <p class="font-bold whitespace-nowrap">GET IN TOUCH WITH US</p>
                <div class="flex justify-center gap-4">
                    <!-- Social media icons -->
                    <a href="#" class="text-[#5F4B32] hover:text-[#FFBB00]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-[#5F4B32] hover:text-[#FFBB00]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-[#5F4B32] hover:text-[#FFBB00]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-[#5F4B32] hover:text-[#FFBB00]">
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