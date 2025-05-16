<<<<<<< HEAD
=======
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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Adopt a Cat | Shelter of Light</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
<<<<<<< HEAD
    /* Modal background overlay */
    .modal-overlay {
      background: rgba(0, 0, 0, 0.6);
    }
  </style>
  <script>
    // Open modal by id
    function openModal(id) {
      const modal = document.getElementById(id);
      modal.classList.remove('hidden');
      document.body.style.overflow = 'hidden'; // Prevent background scroll
    }
    // Close modal by id
    function closeModal(id) {
      const modal = document.getElementById(id);
      modal.classList.add('hidden');
      document.body.style.overflow = 'auto';
    }

    // Close modal on Escape key
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') {
        const modals = document.querySelectorAll('.modal');
        modals.forEach(modal => {
          if (!modal.classList.contains('hidden')) {
            closeModal(modal.id);
          }
        });
      }
    });

    // Show dog section
    function showDogSection() {
      document.getElementById('dog-section').classList.remove('hidden');
      document.getElementById('see-more-button').classList.add('hidden');
=======
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
>>>>>>> 9d9a35fba110f4bd77c358d241dfa282e142515b
    }
    @media (max-width: 1023px) {
      .desktop-nav {
        display: none;
      }
      .mobile-menu-button {
        display: block;
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
    }
  </style>

</head>
<body class="bg-[#FFFBDE] text-gray-800 font-sans">

<<<<<<< HEAD
  <!-- Header -->
  <header class="bg-[#FFFBE9] shadow-md">
    <div class="container mx-auto flex justify-between items-center px-6 py-6">
      <a href="home.php" class="flex items-center space-x-5">
        <img src="../images/SHELTER OF LIGHT/SOL-LOGO.png" alt="Logo" class="w-16 h-16" />
        <h1 class="text-3xl font-poetsen font-bold text-black">Shelter of Light</h1>
      </a>
      <nav class="flex space-x-8 text-base uppercase font-bold">
=======
  <!-- Header with original navigation placement -->
    <header class="bg-[#FFFBE9] shadow-md border-b border-[#00000033]">
        <div class="container mx-auto flex justify-between items-center px-4 lg:px-6 py-4 lg:py-6">
            <a href="home.php" class="flex items-center space-x-2 lg:space-x-5">
                <img src="../images/SHELTER OF LIGHT/SOL-LOGO.png" alt="Logo" class="w-10 h-10 lg:w-16 lg:h-16">
                <h1 class="text-xl lg:text-3xl font-bold text-black">Shelter of Light</h1>
            </a>
      
      <!-- Desktop Navigation -->
 <nav class="desktop-nav space-x-4 lg:space-x-8 text-sm lg:text-base uppercase font-bold">
>>>>>>> 9d9a35fba110f4bd77c358d241dfa282e142515b
        <a href="home.php" class="hover:text-[#FFBB00]">Home</a>
        <a href="about.php" class="text-[#FFBB00] hover:text-black">About Us</a>
        <a href="what-we-do.php" class="hover:text-[#FFBB00]">What We Do</a>
        <a href="donate.php" class="hover:text-[#FFBB00]">Donate</a>
        <a href="adopt.php" class="hover:text-[#FFBB00]">Adopt</a>
        <a href="contact.php" class="hover:text-[#FFBB00]">Contact</a>
      </nav>
      
      <!-- Search Icon -->
      <div class="flex items-center space-x-4">
        <button class="hidden lg:block">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:h-7 lg:w-7 text-black hover:text-[#FFBB00]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.75-4.4a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
          </svg>
        </button>
        
        <!-- Mobile Menu Button -->
        <button id="menu-button" class="mobile-menu-button lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
    </div>
    
    <!-- Mobile Navigation -->
    <div id="mobile-menu" class="mobile-menu hidden lg:hidden bg-[#FFFBE9] pb-4">
      <div class="container mx-auto px-4 flex flex-col space-y-3 text-sm uppercase font-bold">
        <a href="home.php" class="hover:text-[#FFBB00]">Home</a>
        <a href="about.php" class="text-[#FFBB00] hover:text-black">About Us</a>
        <a href="whatwedo.php" class="hover:text-[#FFBB00]">What We Do</a>
        <a href="donate.php" class="hover:text-[#FFBB00]">Donate</a>
        <a href="adopt.php" class="hover:text-[#FFBB00]">Adopt</a>
        <a href="contact.php" class="hover:text-[#FFBB00]">Contact</a>
      </div>
    </div>
  </header>


<<<<<<< HEAD
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-8">
          <!-- Cat Card 1 -->
          <div class="bg-white border border-gray-300 rounded-md p-4 text-center shadow-sm hover:shadow-md transition">
            <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/cat-sample.jpg" alt="Tabasco" class="w-32 h-32 object-cover rounded-full mx-auto mb-4" />
            <p class="font-semibold text-sm text-gray-800">Tabasco</p>
            <p class="text-xs text-gray-600">Hot-headed no more—Tabasco's got a warm heart under that spice!</p>
            <button onclick="openModal('modal-tabasco')" class="mt-4 bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">SEE DETAILS</button>
          </div>

          <!-- Cat Card 2 -->
          <div class="bg-white border border-gray-300 rounded-md p-4 text-center shadow-sm hover:shadow-md transition">
            <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/cat-sample.jpg" alt="Cayenne" class="w-32 h-32 object-cover rounded-full mx-auto mb-4" />
            <p class="font-semibold text-sm text-gray-800">Cayenne</p>
            <p class="text-xs text-gray-600">Cayenne's still got sass, but now she's all about snuggles too</p>
            <button onclick="openModal('modal-cayenne')" class="mt-4 bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">SEE DETAILS</button>
          </div>

          <!-- Cat Card 3 -->
          <div class="bg-white border border-gray-300 rounded-md p-4 text-center shadow-sm hover:shadow-md transition">
            <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/cat-sample.jpg" alt="Jalapeno" class="w-32 h-32 object-cover rounded-full mx-auto mb-4" />
            <p class="font-semibold text-sm text-gray-800">Jalapeno</p>
            <p class="text-xs text-gray-600">A little fire, a lot of love—Jalapeño will steal your heart</p>
            <button onclick="openModal('modal-jalapeno')" class="mt-4 bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">SEE DETAILS</button>
          </div>
        </div>

        <div class="flex justify-center mt-8">
          <button id="see-more-button" onclick="showDogSection()" class="bg-[#FFBB00] text-white font-bold px-6 py-2 rounded hover:bg-yellow-500">SEE MORE</button>
        </div>

        <!-- Adopt a Dog Section (Initially Hidden) -->
        <div id="dog-section" class="hidden mt-12">
          <div class="flex items-center justify-between bg-[#FFF2CD] px-4 py-3 rounded-md mb-6">
            <h2 class="text-lg font-bold uppercase text-black">Adopt a Dog</h2>
          </div>
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <!-- Dog Card 1 -->
            <div class="bg-white border border-gray-300 rounded-md p-4 text-center shadow-sm hover:shadow-md transition">
              <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/dog-sample.jpg" alt="Miky" class="w-32 h-32 object-cover rounded-full mx-auto mb-4" />
              <p class="font-semibold text-sm text-gray-800">Miky</p>
              <p class="text-xs text-gray-600">From rough beginnings to sweet new starts—ready to melt your heart!</p>
              <button onclick="openModal('modal-miky')" class="mt-4 bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">SEE DETAILS</button>
            </div>

            <!-- Dog Card 2 -->
            <div class="bg-white border border-gray-300 rounded-md p-4 text-center shadow-sm hover:shadow-md transition">
              <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/dog-sample.jpg" alt="Hany" class="w-32 h-32 object-cover rounded-full mx-auto mb-4" />
              <p class="font-semibold text-sm text-gray-800">Hany</p>
              <p class="text-xs text-gray-600">Hungry for love and ready to play—Hany's your happy heart in fur!</p>
              <button onclick="openModal('modal-hany')" class="mt-4 bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">SEE DETAILS</button>
            </div>

            <!-- Dog Card 3 -->
            <div class="bg-white border border-gray-300 rounded-md p-4 text-center shadow-sm hover:shadow-md transition">
              <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/dog-sample.jpg" alt="Belle" class="w-32 h-32 object-cover rounded-full mx-auto mb-4" />
              <p class="font-semibold text-sm text-gray-800">Belle</p>
              <p class="text-xs text-gray-600">Small in size, big in heart—Belle is ready to be your little bundle of love!</p>
              <button onclick="openModal('modal-belle')" class="mt-4 bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">SEE DETAILS</button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

   <!-- Tabasco Modal -->
  <div id="modal-tabasco" class="modal fixed inset-0 flex items-center justify-center bg-modal-overlay bg-black bg-opacity-60 hidden z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative">
      <button aria-label="Close modal" onclick="closeModal('modal-tabasco')" class="absolute top-3 right-3 text-gray-600 hover:text-gray-900 text-2xl font-bold">&times;</button>
      <div class="flex flex-col items-center">
        <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/cat-sample.jpg" alt="Tabasco" class="w-48 h-48 object-cover rounded-full mb-4">
        <h3 class="text-xl font-bold mb-2">Tabasco</h3>
        <div class="text-left w-full">
          <p class="text-gray-700 mb-2"><span class="font-semibold">Age:</span> 2 years</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Breed:</span> Tabby</p>
          <p class="text-gray-700 mb-4">Tabasco is a 2-year-old tabby who loves sunbathing and bird watching. She's fully vaccinated and spayed.</p>
          <button class="bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500 w-full">Adopt Me</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Cayenne Modal -->
  <div id="modal-cayenne" class="modal fixed inset-0 flex items-center justify-center bg-modal-overlay bg-black bg-opacity-60 hidden z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative">
      <button aria-label="Close modal" onclick="closeModal('modal-cayenne')" class="absolute top-3 right-3 text-gray-600 hover:text-gray-900 text-2xl font-bold">&times;</button>
      <div class="flex flex-col items-center">
        <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/cat-sample.jpg" alt="Cayenne" class="w-48 h-48 object-cover rounded-full mb-4">
        <h3 class="text-xl font-bold mb-2">Cayenne</h3>
        <div class="text-left w-full">
          <p class="text-gray-700 mb-2"><span class="font-semibold">Age:</span> 3 years</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Breed:</span> Domestic Shorthair</p>
          <p class="text-gray-700 mb-4">Cayenne is 3 years old and loves climbing and playing with feather toys. She gets along with other cats.</p>
          <button class="bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500 w-full">Adopt Me</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Jalapeno Modal -->
  <div id="modal-jalapeno" class="modal fixed inset-0 flex items-center justify-center bg-modal-overlay bg-black bg-opacity-60 hidden z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative">
      <button aria-label="Close modal" onclick="closeModal('modal-jalapeno')" class="absolute top-3 right-3 text-gray-600 hover:text-gray-900 text-2xl font-bold">&times;</button>
      <div class="flex flex-col items-center">
        <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/cat-sample.jpg" alt="Jalapeño" class="w-48 h-48 object-cover rounded-full mb-4">
        <h3 class="text-xl font-bold mb-2">Jalapeño</h3>
        <div class="text-left w-full">
          <p class="text-gray-700 mb-2"><span class="font-semibold">Age:</span> 1 year</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Breed:</span> Mixed</p>
          <p class="text-gray-700 mb-4">Jalapeño is a feisty but affectionate 1-year-old who loves cuddles after playtime.</p>
          <button class="bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500 w-full">Adopt Me</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Miky Modal -->
  <div id="modal-miky" class="modal fixed inset-0 flex items-center justify-center bg-modal-overlay bg-black bg-opacity-60 hidden z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative">
      <button aria-label="Close modal" onclick="closeModal('modal-miky')" class="absolute top-3 right-3 text-gray-600 hover:text-gray-900 text-2xl font-bold">&times;</button>
      <div class="flex flex-col items-center">
        <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/dog-sample.jpg" alt="Miky" class="w-48 h-48 object-cover rounded-full mb-4">
        <h3 class="text-xl font-bold mb-2">Miky</h3>
        <div class="text-left w-full">
          <p class="text-gray-700 mb-2"><span class="font-semibold">Age:</span> 4 years</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Breed:</span> Labrador Mix</p>
          <p class="text-gray-700 mb-4">Miky is a gentle 4-year-old Labrador mix, very friendly and good with kids.</p>
          <button class="bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500 w-full">Adopt Me</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Hany Modal -->
  <div id="modal-hany" class="modal fixed inset-0 flex items-center justify-center bg-modal-overlay bg-black bg-opacity-60 hidden z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative">
      <button aria-label="Close modal" onclick="closeModal('modal-hany')" class="absolute top-3 right-3 text-gray-600 hover:text-gray-900 text-2xl font-bold">&times;</button>
      <div class="flex flex-col items-center">
        <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/dog-sample.jpg" alt="Hany" class="w-48 h-48 object-cover rounded-full mb-4">
        <h3 class="text-xl font-bold mb-2">Hany</h3>
        <div class="text-left w-full">
          <p class="text-gray-700 mb-2"><span class="font-semibold">Age:</span> 2 years</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Breed:</span> Beagle</p>
          <p class="text-gray-700 mb-4">Hany is a playful 2-year-old beagle who enjoys long walks and lots of treats.</p>
          <button class="bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500 w-full">Adopt Me</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Belle Modal -->
  <div id="modal-belle" class="modal fixed inset-0 flex items-center justify-center bg-modal-overlay bg-black bg-opacity-60 hidden z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative">
      <button aria-label="Close modal" onclick="closeModal('modal-belle')" class="absolute top-3 right-3 text-gray-600 hover:text-gray-900 text-2xl font-bold">&times;</button>
      <div class="flex flex-col items-center">
        <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/dog-sample.jpg" alt="Belle" class="w-48 h-48 object-cover rounded-full mb-4">
        <h3 class="text-xl font-bold mb-2">Belle</h3>
        <div class="text-left w-full">
          <p class="text-gray-700 mb-2"><span class="font-semibold">Age:</span> 5 years</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Breed:</span> Chihuahua</p>
          <p class="text-gray-700 mb-4">Belle is a sweet 5-year-old Chihuahua, small but full of love.</p>
          <button class="bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500 w-full">Adopt Me</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-[#FFFBE9] border-t border-gray-300 py-6 mt-12">
    <div class="container mx-auto flex justify-between items-center px-6">
      <!-- Left Section -->
      <div>
        <p>© 2023 Shelter of Light. All rights reserved.</p>
      </div>
      <!-- Right Section -->
      <div class="flex space-x-4 items-center">
        <p class="cursor-pointer hover:underline">Terms and Conditions</p>
        <p class="cursor-pointer hover:underline">Privacy Policy</p>
      </div>
    </div>
  </footer>
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

>>>>>>> 9d9a35fba110f4bd77c358d241dfa282e142515b
</body>
</html>
>>>>>>> ae620c6ec86f3c533eb2fc5107eb76890b91170c
