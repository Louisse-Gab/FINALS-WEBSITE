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

    /* Modal background overlay */
    .modal-overlay {
      background: rgba(0, 0, 0, 0.6);
    }

    
    /* Media queries */
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

  <!-- Header -->
  <header class="bg-[#FFFBE9] shadow-md">
    <div class="container mx-auto flex justify-between items-center px-6 py-6">
      <a href="home.php" class="flex items-center space-x-5">
        <img src="../images/SHELTER OF LIGHT/SOL-LOGO.png" alt="Logo" class="w-16 h-16" />
        <h1 class="text-3xl font-poetsen font-bold text-black">Shelter of Light</h1>
      </a>

      <nav class="flex space-x-8 text-base uppercase font-bold">

      <nav class="desktop-nav flex space-x-8 text-base uppercase font-bold">

        <a href="home.php" class="hover:text-[#FFBB00]">Home</a>
        <a href="about.php" class="text-[#FFBB00] hover:text-black">About Us</a>
        <a href="../php/whatwedo/whatwedo.php" class="hover:text-[#FFBB00]">What We Do</a>
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
        <a href="what-we-do.php" class="hover:text-[#FFBB00]">What We Do</a>
        <a href="donate.php" class="hover:text-[#FFBB00]">Donate</a>
        <a href="adopt.php" class="hover:text-[#FFBB00]">Adopt</a>
        <a href="contact.php" class="hover:text-[#FFBB00]">Contact</a>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="container mx-auto px-6 py-8">
    <section class="mb-12">
      <div class="flex items-center justify-between bg-[#FFF2CD] px-4 py-3 rounded-md mb-6">
        <h2 class="text-lg font-bold uppercase text-black">Adopt a Cat</h2>
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
    </section>
  </main>

  <!-- Tabasco Modal -->
  <div id="modal-tabasco" class="modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-60 hidden z-50">
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
  <div id="modal-cayenne" class="modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-60 hidden z-50">
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
  <div id="modal-jalapeno" class="modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-60 hidden z-50">
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
  <div id="modal-miky" class="modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-60 hidden z-50">
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
  <div id="modal-hany" class="modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-60 hidden z-50">
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
  <div id="modal-belle" class="modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-60 hidden z-50">
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

</body>
</html>
