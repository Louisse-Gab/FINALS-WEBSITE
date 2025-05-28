<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Adopt a Cat | Shelter of Light</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    html, body {
            overflow-x: hidden;
            max-width: 100%;
            width: 100%;
        }
        
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      background-color: #FFFBDE;
    }
    main {
      flex: 1;
    }
    .full-width-section {
      width: 100vw;
      position: relative;
      left: 50%;
      right: 50%;
      margin-left: -50vw;
      margin-right: -50vw;
    }
    
    /* Enhanced Responsive Carousel Styles */
    .multi-carousel {
      position: relative;
      max-width: 100%;
      margin: 0 auto;
      overflow: hidden;
    }
    .multi-carousel-track {
      display: flex;
      transition: transform 0.5s ease;
    }
    .multi-carousel-slide {
      min-width: 100%;
      display: flex;
      justify-content: center;
      gap: 1rem;
      padding: 0 1rem;
      box-sizing: border-box;
    }
    .multi-carousel-item {
      width: 100%;
      max-width: 300px;
      height: 300px;
      flex-shrink: 0;
      overflow: hidden;
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      position: relative;
    }
    .multi-carousel-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .multi-carousel-nav {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(0,0,0,0.5);
      color: white;
      border: none;
      padding: 0.75rem 1rem;
      cursor: pointer;
      border-radius: 50%;
      z-index: 10;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .multi-carousel-prev {
      left: 0.5rem;
    }
    .multi-carousel-next {
      right: 0.5rem;
    }
    
    /* Pet Info Overlay */
    .pet-info-overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background: rgba(0,0,0,0.7);
      color: white;
      padding: 1rem;
      transform: translateY(0);
      transition: transform 0.3s ease;
    }
    .multi-carousel-item:hover .pet-info-overlay {
      transform: translateY(0);
    }
        /* Arrow link styles */
    .arrow-link {
        display: flex;
        align-items: center;
        justify-content: center;
        color: #000;
        transition: color 0.3s;
    }
    
    .arrow-link:hover svg {
        transform: translateX(-5px);
        transition: transform 0.3s ease;
    }
    
  </style>
</head>
<body class="text-gray-800 font-sans">
    <header class="bg-[#FFFBE9] shadow-md border-b border-[#00000033]">
        <div class="container mx-auto flex justify-between items-center px-4 lg:px-6 py-4 lg:py-6">
            <a href="../home.php" class="flex items-center space-x-2 lg:space-x-5">
                <img src="../../images/SHELTER OF LIGHT/SOL-LOGO.png" alt="Logo" class="w-10 h-10 lg:w-16 lg:h-16">
                <h1 class="text-xl lg:text-3xl font-bold text-black">Shelter of Light</h1>
            </a>
            
            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex space-x-8 text-base uppercase font-bold">
                <a href="../../php/home.php" class="hover:text-[#FFBB00]">Home</a>
                <a href="../../php/about.php" class="hover:text-[#FFBB00]">About Us</a>
                <a href="../../php/whatwedo/whatwedo.php" class="text-[#FFBB00] hover:text-black">What We Do</a>
                <a href="../../php/donate.php" class="hover:text-[#FFBB00]">Donate</a>
                <a href="../../php/adopt.php" class="hover:text-[#FFBB00]">Adopt</a>
                <a href="../../php/contact.php" class="hover:text-[#FFBB00]">Contact</a>
            </nav>
            
            <!-- Mobile Menu Button -->
            <div class="flex items-center lg:hidden">
                <button id="mobile-menu-button" class="text-gray-800 hover:text-[#FFBB00] focus:outline-none">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu (Dropdown) -->
        <div id="mobile-menu" class="hidden lg:hidden bg-[#FFFBE9] absolute w-full z-10 shadow-md">
            <div class="container mx-auto px-4">
                <div class="flex flex-col space-y-3 text-sm uppercase font-bold py-4">
                    <a href="../../php/home.php" class="hover:text-[#FFBB00] py-2 border-b border-gray-200">Home</a>
                    <a href="../../php/about.php" class="hover:text-[#FFBB00] py-2 border-b border-gray-200">About Us</a>
                    <a href="../../php/whatwedo/whatwedo.php" class="text-[#FFBB00] hover:text-black py-2 border-b border-gray-200">What We Do</a>
                    <a href="../../php/donate.php" class="hover:text-[#FFBB00] py-2 border-b border-gray-200">Donate</a>
                    <a href="../../php/adopt.php" class="hover:text-[#FFBB00] py-2 border-b border-gray-200">Adopt</a>
                    <a href="../../php/contact.php" class="hover:text-[#FFBB00] py-2">Contact</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section id="about" class="mb-8 lg:mb-12">
            <div class="full-width-section bg-[#FFF2CD] py-5 lg:py-5 border-b border-[#00000033]">
                <div class="container mx-auto px-4 lg:px-6 flex items-center justify-between">
                    <div class="w-6"></div>
                    <h3 class="text-xl lg:text-2xl font-bold mb-2 lg:mb-3 text-center">WHAT WE DO</h3>
                    <a href="../home.php" class="arrow-link text-black hover:text-[#FFBB00]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="py-12 bg-[#FFF9E5]">
                <div class="container mx-auto px-4">
                    <div class="flex flex-wrap justify-center gap-8">
                        
                        <!-- CARD TEMPLATE START -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden w-80 flex flex-col">
                            <div class="h-48 bg-gray-200">
                                <img src="../../images/SHELTER OF LIGHT/WHAT WE DO PAGE/Feeding Programs/Feeding Program (Thumbnail).jpg" alt="Feeding Program" class="object-cover w-full h-full">
                            </div>
                            <div class="flex flex-col justify-between p-6 flex-grow">
                                <div class="text-center">
                                    <h2 class="text-xl font-bold mb-2">FEEDING PROGRAMS</h2>
                                    <p class="text-gray-600 mb-4 min-h-[72px]">Helping other rescuers and people through our community pantries and through what we have</p>
                                </div>
                                <div class="text-center mt-auto">
                                    <a href="../whatwedo/feeding-program.php" class="inline-block bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">SEE DETAILS</a>
                                </div>
                            </div>
                        </div>
                        <!-- CARD TEMPLATE END -->

                        <!-- Collaborations -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden w-80 flex flex-col">
                            <div class="h-48 bg-gray-200">
                                <img src="../../images/SHELTER OF LIGHT/WHAT WE DO PAGE/Collaborations/Collaborations (Thumbnail).jpg" alt="Collaborations" class="object-cover w-full h-full">
                            </div>
                            <div class="flex flex-col justify-between p-6 flex-grow">
                                <div class="text-center">
                                    <h2 class="text-xl font-bold mb-2">COLLABORATIONS</h2>
                                    <p class="text-gray-600 mb-4 min-h-[72px]">Shelter of Light welcomes partnerships with individuals, organizations, and communities who share the same mission of compassion for animals</p>
                                </div>
                                <div class="text-center mt-auto">
                                    <a href="../whatwedo/collaboration.php" class="inline-block bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">SEE DETAILS</a>
                                </div>
                            </div>
                        </div>

                        <!-- Programs -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden w-80 flex flex-col">
                            <div class="h-48 bg-gray-200">
                                <img src="../../images/SHELTER OF LIGHT/WHAT WE DO PAGE/Programs/Pograms(Thumbnail).jpg" alt="Programs" class="object-cover w-full h-full">
                            </div>
                            <div class="flex flex-col justify-between p-6 flex-grow">
                                <div class="text-center">
                                    <h2 class="text-xl font-bold mb-2">PROGRAMS</h2>
                                    <p class="text-gray-600 mb-4 min-h-[72px]">Spay and Neuter Activities</p>
                                </div>
                                <div class="text-center mt-auto">
                                    <a href="../whatwedo/spay-neuter.php" class="inline-block bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">SEE DETAILS</a>
                                </div>
                            </div>
                        </div>

                        <!-- Volunteers -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden w-80 flex flex-col">
                            <div class="h-48 bg-gray-200">
                                <img src="../../images/SHELTER OF LIGHT/WHAT WE DO PAGE/Volunteers/Volunteers (Thumbnail).jpg" alt="Volunteers" class="object-cover w-full h-full">
                            </div>
                            <div class="flex flex-col justify-between p-6 flex-grow">
                                <div class="text-center">
                                    <h2 class="text-xl font-bold mb-2">VOLUNTEERS</h2>
                                    <p class="text-gray-600 mb-4 min-h-[72px]">Shelter Visits & Volunteer Opportunities</p>
                                </div>
                                <div class="text-center mt-auto">
                                    <a href="../whatwedo/volunteer.php" class="inline-block bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">SEE DETAILS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
<hr class="border-t border-[#00000033] w-full my-0">
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
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="order-1 lg:order-2">
                <p>&copy; Shelter of Light. All Rights Reserved.</p>
            </div>
            
            <!-- Creators -->
            <div class="order-3 text-center lg:text-right">
                <p class="font-bold whitespace-nowrap">CREATORS OF THIS WEBSITE</p>
                <p class="whitespace-nowrap">BRIONES | CABANADA | LIZEN<br>UST-CICS</p>
            </div>
            
        </div>
    </div>
</footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
                    mobileMenu.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>