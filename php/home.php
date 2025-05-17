<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Adopt a Cat | Shelter of Light</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
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
    
    /* Responsive Adjustments */
    @media (max-width: 1023px) {
      .desktop-nav {
        display: none;
      }
      .mobile-menu-button {
        display: block;
      }
      
      .multi-carousel-slide {
        flex-direction: column;
        align-items: center;
        gap: 1.5rem;
        padding: 0 2rem;
      }
      .multi-carousel-item {
        max-width: 100%;
        height: 250px;
      }
      .multi-carousel-nav {
        padding: 0.5rem 0.75rem;
        font-size: 0.875rem;
      }
    }
    
    @media (min-width: 640px) and (max-width: 1023px) {
      .multi-carousel-slide {
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
      }
      .multi-carousel-item {
        width: 45%;
        max-width: none;
      }
    }
    
    @media (min-width: 1024px) {
      .desktop-nav {
        display: flex;
      }
      .mobile-menu-button {
        display: none;
      }
      .mobile-menu {
        display: none;
      }
      
      .multi-carousel {
        max-width: 1200px;
      }
      .multi-carousel-item {
        height: 350px;
      }
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
  </style>

</head>
  </style>
</head>
<body class="bg-[#FFFBDE] text-gray-800 font-sans">

  <!-- Your existing header -->
  <header class="bg-[#FFFBE9] shadow-md border-b border-[#00000033]">
    <div class="container mx-auto flex justify-between items-center px-4 lg:px-6 py-4 lg:py-6">
      <a href="home.php" class="flex items-center space-x-2 lg:space-x-5">
        <img src="../images/SHELTER OF LIGHT/SOL-LOGO.png" alt="Logo" class="w-10 h-10 lg:w-16 lg:h-16">
        <h1 class="text-xl lg:text-3xl font-bold text-black">Shelter of Light</h1>
      </a>
      
      <nav class="flex space-x-8 text-base uppercase font-bold">
        <a href="home.php" class="text-[#FFBB00] hover:text-black">Home</a>
        <a href="about.php" class="hover:text-[#FFBB00]">About Us</a>
        <a href="../php/whatwedo/whatwedo.php" class="hover:text-[#FFBB00]">What We Do</a>
        <a href="donate.php" class="hover:text-[#FFBB00]">Donate</a>
        <a href="adopt.php" class="hover:text-[#FFBB00]">Adopt</a>
        <a href="contact.php" class="hover:text-[#FFBB00]">Contact</a>
      </nav>
      
      <div class="flex items-center space-x-4">
        <button class="hidden lg:block">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:h-7 lg:w-7 text-black hover:text-[#FFBB00]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.75-4.4a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z"/>
          </svg>
        </button>
        
        <button id="menu-button" class="mobile-menu-button lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>
      </div>
    </div>
    
    <div id="mobile-menu" class="mobile-menu hidden lg:hidden bg-[#FFFBE9] pb-4">
      <div class="container mx-auto px-4 flex flex-col space-y-3 text-sm uppercase font-bold">
        <a href="home.php" class="hover:text-[#FFBB00]">Home</a>
        <a href="about.php" class="hover:text-[#FFBB00]">About Us</a>
        <a href="../php/whatwedo/whatwedo.php" class="hover:text-[#FFBB00]">What We Do</a>
        <a href="donate.php" class="hover:text-[#FFBB00]">Donate</a>
        <a href="adopt.php" class="hover:text-[#FFBB00]">Adopt</a>
        <a href="contact.php" class="hover:text-[#FFBB00]">Contact</a>
      </div>
    </div>
  </header>

  <main>
    <!-- Your existing hero section -->
    <section class="bg-[#FFFBDE] py-8 lg:py-12">
      <div class="container mx-auto text-center px-4">
        <div class="flex flex-col lg:flex-row justify-center items-center">
          <img src="../images/SHELTER OF LIGHT/PAW-LOGO.png" alt="Paw Logo" class="w-20 h-20 lg:w-24 lg:h-24 lg:mr-4 mb-4 lg:mb-0">
          <h1 class="text-3xl lg:text-5xl font-poetsen font-bold text-black">Shelter of Light</h1>
        </div>
        <p class="italic text-[#FFBB00] mt-4 text-base lg:text-lg">"Where Love Shines Through the Darkness."</p>
      </div>
    </section>

    <!-- Your existing introduction section -->
    <section class="text-gray-800 py-8 lg:py-12 px-4 lg:px-6">
      <div class="container mx-auto">
        <p class="text-center leading-relaxed text-base lg:text-lg">
          Welcome to the Shelter of Light website. This platform serves as a central space where visitors can learn more about who we are, what we do, and how we continue to grow as a faith-centered community. Whether you're a member, a supporter, or someone new to our shelter, this website provides a clear overview of our journey, programs, and vision.
        </p>
        <p class="text-center leading-relaxed mt-4 lg:mt-6 text-base lg:text-lg">
        Our shelter provides comprehensive rehabilitation, from emergency medical treatment to emotional recovery and socialization. Through our adoption program, we carefully match animals with loving forever homes. The website shares heartwarming rescue stories, updates on current residents, and resources about responsible pet care. You'll also find practical ways to support our mission through donations, volunteering, or adoption.
          
        </p>
        <p class="text-center leading-relaxed mt-4 lg:mt-6 text-base lg:text-lg">
        Every animal deserves safety, dignity, and compassion. At Shelter of Light, we work tirelessly to make that vision a reality - one rescue at a time. Join us in creating brighter futures for animals in need.
        </p>
      </div>
    </section>

    <section class="bg-[#FFFBDE] py-8 lg:py-12 px-4">
      <div class="container mx-auto">
        <h2 class="text-center text-xl lg:text-2xl font-bold text-gray-800 mb-6 lg:mb-8">Latest Pets Adopted</h2>
        
        <div class="multi-carousel">
          <div class="multi-carousel-track" id="multi-carousel-track">
            <!-- Slide 1 -->
            <div class="multi-carousel-slide">
              <div class="multi-carousel-item">
                <img src="../images/SHELTER OF LIGHT/HOME PAGE/Latest Pet Adopted/Mallows.jpg" alt="Mallows" class="w-full h-full object-cover">
                <div class="pet-info-overlay">
                  <h3 class="font-bold text-lg text-center">Mallows</h3>
                  <p class="text-sm text-center mt-1">This sweet fluff found the warm, loving home he always deserved.</p>
                </div>
              </div>
              
              <div class="multi-carousel-item">
                <img src="../images/SHELTER OF LIGHT/HOME PAGE/Latest Pet Adopted/Mocha.jpg" alt="Mocha" class="w-full h-full object-cover">
                <div class="pet-info-overlay">
                  <h3 class="font-bold text-lg text-center">Mocha</h3>
                  <p class="text-sm text-center mt-1">Her days are now filled with joy, play, and cozy cuddles.</p>
                </div>
              </div>
              
              <div class="multi-carousel-item">
                <img src="../images/SHELTER OF LIGHT/HOME PAGE/Latest Pet Adopted/Anino.jpg" alt="Anino" class="w-full h-full object-cover">
                <div class="pet-info-overlay">
                  <h3 class="font-bold text-lg text-center">Anino</h3>
                  <p class="text-sm text-center mt-1">Once a shadow, now basking in the light of a loving home</p>
                </div>
              </div>
            </div>
            
            <!-- Slide 2 -->
            <div class="multi-carousel-slide">
              <div class="multi-carousel-item">
                <img src="../images/SHELTER OF LIGHT/HOME PAGE/Latest Pet Adopted/Chance.jpg" alt="Chance" class="w-full h-full object-cover">
                <div class="pet-info-overlay">
                  <h3 class="font-bold text-lg text-center">Chance</h3>
                  <p class="text-sm text-center mt-1">Once lost, now loved - found the home he was always meant for.</p>
                </div>
              </div>
              
              <div class="multi-carousel-item">
                <img src="../images/SHELTER OF LIGHT/HOME PAGE/Latest Pet Adopted/Sabrina.jpg" alt="Sabrina" class="w-full h-full object-cover">
                <div class="pet-info-overlay">
                  <h3 class="font-bold text-lg text-center">Sabrina</h3>
                  <p class="text-sm text-center mt-1">No more magic tricks — she found her real-life happy ending.</p>
                </div>
              </div>
              
              <div class="multi-carousel-item">
                <img src="../images/SHELTER OF LIGHT/HOME PAGE/Latest Pet Adopted/Star.jpeg" alt="Star" class="w-full h-full object-cover">
                <div class="pet-info-overlay">
                  <h3 class="font-bold text-lg text-center">Star</h3>
                  <p class="text-sm text-center mt-1">From shelter to shining star — now glowing in her forever home.</p>
                </div>
              </div>
            </div>
          </div>
          
          <button class="multi-carousel-nav multi-carousel-prev" aria-label="Previous slide">❮</button>
          <button class="multi-carousel-nav multi-carousel-next" aria-label="Next slide">❯</button>
        </div>
      </div>
    </section>

    <!-- Your existing info section -->
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
                <p class="whitespace-nowrap">BRIONES | CABANADA | LIZEN<br>UST</p>
            </div>
            
        </div>
    </div>
</footer>

<script>
    // Mobile menu toggle (unchanged)
    document.getElementById('menu-button').addEventListener('click', function() {
      document.getElementById('mobile-menu').classList.toggle('hidden');
    });

    // Enhanced Carousel Functionality
    document.addEventListener('DOMContentLoaded', function() {
      const track = document.getElementById('multi-carousel-track');
      const slides = document.querySelectorAll('.multi-carousel-slide');
      const prevBtn = document.querySelector('.multi-carousel-prev');
      const nextBtn = document.querySelector('.multi-carousel-next');
      let currentIndex = 0;
      let autoScrollInterval;
      const slideWidth = slides[0].clientWidth;
      
      // Initialize carousel
      updateCarousel();
      setupAutoScroll();
      setupResponsiveChecks();
      
      function updateCarousel() {
        track.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
      }
      
      function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        updateCarousel();
        resetAutoScroll();
      }
      
      function prevSlide() {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        updateCarousel();
        resetAutoScroll();
      }
      
      function setupAutoScroll() {
        autoScrollInterval = setInterval(nextSlide, 5000);
      }
      
      function resetAutoScroll() {
        clearInterval(autoScrollInterval);
        setupAutoScroll();
      }
      
      function setupResponsiveChecks() {
        // Recalculate slide width on resize
        window.addEventListener('resize', function() {
          const newSlideWidth = slides[0].clientWidth;
          if (Math.abs(newSlideWidth - slideWidth) > 10) { // Only update if significant change
            updateCarousel();
          }
        });
      }
      
      // Event listeners
      nextBtn.addEventListener('click', nextSlide);
      prevBtn.addEventListener('click', prevSlide);
      
      // Pause auto-scroll on hover
      const carousel = document.querySelector('.multi-carousel');
      carousel.addEventListener('mouseenter', () => clearInterval(autoScrollInterval));
      carousel.addEventListener('mouseleave', setupAutoScroll);
      
      // Touch support for mobile
      let touchStartX = 0;
      let touchEndX = 0;
      
      track.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
        clearInterval(autoScrollInterval);
      }, {passive: true});
      
      track.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
        setupAutoScroll();
      }, {passive: true});
      
      function handleSwipe() {
        const threshold = 50; // Minimum swipe distance
        if (touchStartX - touchEndX > threshold) {
          nextSlide(); // Swipe left
        } else if (touchEndX - touchStartX > threshold) {
          prevSlide(); // Swipe right
        }
      }
    });
  </script>
</body>
</html>