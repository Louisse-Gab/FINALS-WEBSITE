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
    
    /* Blur effect when modal is open */
    body.modal-open {
      overflow: hidden;
    }
    body.modal-open main,
    body.modal-open header,
    body.modal-open footer {
      filter: blur(5px);
      transition: filter 0.3s ease;
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
<body class="bg-[#FFFBDE] text-gray-800 font-sans">

  <!-- Header with original navigation placement -->
  <header class="bg-[#FFFBE9] shadow-md border-b border-[#00000033]">
      <div class="container mx-auto flex justify-between items-center px-4 lg:px-6 py-4 lg:py-6">
          <a href="home.php" class="flex items-center space-x-2 lg:space-x-5">
              <img src="../images/SHELTER OF LIGHT/SOL-LOGO.png" alt="Logo" class="w-10 h-10 lg:w-16 lg:h-16">
              <h1 class="text-xl lg:text-3xl font-bold text-black">Shelter of Light</h1>
              
          </a>
    
    <!-- Desktop Navigation -->
<nav class="flex space-x-8 text-base uppercase font-bold">
        <a href="home.php" class="text-[#FFBB00] hover:text-black">Home</a>
        <a href="about.php" class="hover:text-[#FFBB00]">About Us</a>
        <a href="../php/whatwedo/whatwedo.php" class="hover:text-[#FFBB00]">What We Do</a>
        <a href="donate.php" class="hover:text-[#FFBB00]">Donate</a>
        <a href="adopt.php" class="hover:text-[#FFBB00]">Adopt</a>
        <a href="contact.php" class="hover:text-[#FFBB00]">Contact</a>
      </nav>
      
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
      <a href="about.php" class="hover:text-[#FFBB00]">About Us</a>
      <a href="../php/whatwedo/whatwedo.php" class="hover:text-[#FFBB00]">What We Do</a>
      <a href="donate.php" class="hover:text-[#FFBB00]">Donate</a>
      <a href="adopt.php" class="hover:text-[#FFBB00]">Adopt</a>
      <a href="contact.php" class="hover:text-[#FFBB00]">Contact</a>
    </div>
  </div>
</header>

  <!-- Main Content -->
 

    <!-- Orange Container with Statement and Arrow -->
<div class="full-width-section bg-[#FFF2CD] py-5 lg:py-5 border-b border-[#00000033]">
    <div class="container mx-auto px-4 lg:px-6 flex items-center justify-between">
        <div class="w-6"></div> <!-- Empty div for spacing -->
        <h2 class="text-xl lg:text-2xl font-bold mb-2 lg:mb-3 text-center">ADOPT A CAT</h2>
        <a href="home.php" class="arrow-link text-black hover:text-[#FFBB00]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
    </div>
</div>

<!-- Added margin-top here for spacing below the header -->
<div class="mt-8 mb-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <!-- Cat Card 1 -->
        <div class="bg-white border border-gray-300 rounded-md p-4 text-center shadow-sm hover:shadow-md transition">
            <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/Cats/Tabasco/Tabasco.jpg" alt="Tabasco" class="w-32 h-32 object-cover rounded-full mx-auto mb-4" />
            <p class="font-semibold text-sm text-gray-800">Tabasco</p>
            <p class="text-xs text-gray-600">Hot-headed no more—Tabasco’s got a warm heart under that spice!
</p>
            <button onclick="openModal('modal-tabasco')" class="mt-4 bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">SEE DETAILS</button>
        </div>

        <!-- Cat Card 2 -->
        <div class="bg-white border border-gray-300 rounded-md p-4 text-center shadow-sm hover:shadow-md transition">
            <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/Cats/Cayenne/Cayenne (Thumbnail).jpg" alt="Cayenne" class="w-32 h-32 object-cover rounded-full mx-auto mb-4" />
            <p class="font-semibold text-sm text-gray-800">Cayenne</p>
            <p class="text-xs text-gray-600">Cayenne's still got sass, but now she's all about snuggles too</p>
            <button onclick="openModal('modal-cayenne')" class="mt-4 bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">SEE DETAILS</button>
        </div>

        <!-- Cat Card 3 -->
        <div class="bg-white border border-gray-300 rounded-md p-4 text-center shadow-sm hover:shadow-md transition">
            <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/Cats/Jalapeno/Jalapeno (Thumbnail).jpg" alt="Jalapeno" class="w-32 h-32 object-cover rounded-full mx-auto mb-4" />
            <p class="font-semibold text-sm text-gray-800">Jalapeno</p>
            <p class="text-xs text-gray-600">A little fire, a lot of love—Jalapeño will steal your heart</p>
            <button onclick="openModal('modal-jalapeno')" class="mt-4 bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">SEE DETAILS</button>
        </div>
    </div>
</div>

<!-- Adopt a Dog Section -->
<div id="dog-section" class="mt-12">
  <div class="flex items-center justify-center bg-[#FFF2CD] px-4 py-3 rounded-md mb-6">
    <h2 class="text-xl lg:text-2xl font-bold mb-2 lg:mb-3 text-center">ADOPT A DOG</h2>
  </div>

  <!-- First Three Dog Cards -->
  <div class="flex justify-center gap-6 flex-wrap">
    <!-- Dog Card 1 -->
    <div class="bg-white border border-gray-300 rounded-md p-4 text-center shadow-sm hover:shadow-md transition w-[400px] min-h-[300px]">
      <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/Dogs/Milky/Milky (Thumbnail)_.jpg" alt="Miky" class="w-32 h-32 object-cover rounded-full mx-auto mb-4" />
      <p class="font-semibold text-sm text-gray-800">Miky</p>
      <p class="text-xs text-gray-600">From rough beginnings to sweet new starts—ready to melt your heart!</p>
      <button onclick="openModal('modal-miky')" class="mt-4 bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">SEE DETAILS</button>
    </div>

    <!-- Dog Card 2 -->
    <div class="bg-white border border-gray-300 rounded-md p-4 text-center shadow-sm hover:shadow-md transition w-[400px] min-h-[300px]">
      <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/Dogs/Hany/Hany (Thumbnail).jpg" alt="Hany" class="w-32 h-32 object-cover rounded-full mx-auto mb-4" />
      <p class="font-semibold text-sm text-gray-800">Hany</p>
      <p class="text-xs text-gray-600">Hungry for love and ready to play—Hany's your happy heart in fur!</p>
      <button onclick="openModal('modal-hany')" class="mt-4 bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">SEE DETAILS</button>
    </div>

    <!-- Dog Card 3 -->
    <div class="bg-white border border-gray-300 rounded-md p-4 text-center shadow-sm hover:shadow-md transition w-[400px] min-h-[300px]">
      <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/Dogs/Belle/Belle(Thumbnail).jpg" alt="Belle" class="w-32 h-32 object-cover rounded-full mx-auto mb-4" />
      <p class="font-semibold text-sm text-gray-800">Belle</p>
      <p class="text-xs text-gray-600">Small in size, big in heart—Belle is ready to be your little bundle of love!</p>
      <button onclick="openModal('modal-belle')" class="mt-4 bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">SEE DETAILS</button>
    </div>
  </div>

  <div class="flex justify-center gap-6 mt-6 flex-wrap">
    <!-- Snoopy Card -->
    <div class="bg-white border border-gray-300 rounded-md p-4 text-center shadow-sm hover:shadow-md transition w-[400px] min-h-[300px]">
      <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/Dogs/Snoppy/Snoopy (Thumbnail)].jpg" alt="Snoopy" class="w-32 h-32 object-cover rounded-full mx-auto mb-4" />
      <p class="font-semibold text-sm text-gray-800">Snoopy</p>
      <p class="text-xs text-gray-600">From forgotten to fighting—Snoopy's story isn't over yet!</p>
      <button onclick="openModal('modal-snoopy')" class="mt-4 bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">SEE DETAILS</button>
    </div>

    <!-- Tofu Card -->
    <div class="bg-white border border-gray-300 rounded-md p-4 text-center shadow-sm hover:shadow-md transition w-[400px] min-h-[300px]">
      <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/Dogs/Tofu/Tofu.jpg" alt="Tofu" class="w-32 h-32 object-cover rounded-full mx-auto mb-4" />
      <p class="font-semibold text-sm text-gray-800">Tofu</p>
      <p class="text-xs text-gray-600">Tiny but tough—Tofu's heart is bigger than his battles!</p>
      <button onclick="openModal('modal-tofu')" class="mt-4 bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">SEE DETAILS</button>
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
        <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/Cats/Tabasco/Tabasco.jpg" alt="Tabasco" class="w-48 h-48 object-cover rounded-full mb-4">
        <h3 class="text-xl font-bold mb-2">Tabasco</h3>
        <div class="text-left w-full">
          <p class="text-gray-700 mb-2"><span class="font-semibold">Age:</span> 3-4 months</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Breed:</span> Puspin, half tabby</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Gender:</span> Female</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Vaccinated:</span> 4-1 x2</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Very playful and loves food</p>
          <p class="text-gray-700 mb-4 text-justify">Tabasco was the first of the three kittens spotted near our foster’s home, hiding under a parked tricycle with eyes wide and body tense. She was covered in dirt and let out tiny growls when approached, warning everyone to stay away. With slow, careful steps and food as bait, our foster was able to gently lure her out. It took time and a lot of patience, but Tabasco finally allowed herself to be scooped up—and that marked the beginning of her second chance at life.
</p>
          <a href="adoptlogin.php" class="block bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500 w-full text-center">Adopt Me</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Cayenne Modal -->
  <div id="modal-cayenne" class="modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-60 hidden z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative">
      <button aria-label="Close modal" onclick="closeModal('modal-cayenne')" class="absolute top-3 right-3 text-gray-600 hover:text-gray-900 text-2xl font-bold">&times;</button>
      <div class="flex flex-col items-center">
        <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/Cats/Cayenne/Cayenne.jpg" alt="Cayenne" class="w-48 h-48 object-cover rounded-full mb-4">
        <h3 class="text-xl font-bold mb-2">Cayenne</h3>
        <div class="text-left w-full">
           <p class="text-gray-700 mb-2"><span class="font-semibold">Age:</span> 3-4 months</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Breed:</span> Puspin, Calico
</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Gender:</span> Female</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Vaccinated:</span> 4-1 x2</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Very playful and loves food</p>
          <p class="text-gray-700 mb-4 text-justify">Cayenne was found just a few feet away from Tabasco, crouched inside an old cardboard box near a neighbor’s gate. She was alert, fierce, and clearly trying to protect herself and her sisters. While she put up a little fight, she also seemed the most curious about the humans trying to help. She eventually allowed herself to be carried, eyes never leaving her sisters. Cayenne showed early signs of leadership—brave, protective, and strong—and continues to carry that spirit in her foster home.
</p>
          <a href="adoptlogin.php" class="block bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500 w-full text-center">Adopt Me</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Jalapeno Modal -->
  <div id="modal-jalapeno" class="modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-60 hidden z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative">
      <button aria-label="Close modal" onclick="closeModal('modal-jalapeno')" class="absolute top-3 right-3 text-gray-600 hover:text-gray-900 text-2xl font-bold">&times;</button>
      <div class="flex flex-col items-center">
        <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/Cats/Jalapeno/Jalapeno.jpg" alt="Jalapeño" class="w-48 h-48 object-cover rounded-full mb-4">
        <h3 class="text-xl font-bold mb-2">Jalapeño</h3>
        <div class="text-left w-full">
         <p class="text-gray-700 mb-2"><span class="font-semibold">Age:</span> 3-4 months</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Breed:</span>Puspin, Full tabby
</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Gender:</span> Female</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Vaccinated:</span> 4-1 x2</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Very playful and loves food</p>
          <p class="text-gray-700 mb-4 text-justify">Jalapeño was the last one rescued—and the most fearful. She had taken shelter behind a pile of wood, trembling at every sound. Her eyes were filled with fear, and it was clear she had not experienced kindness before. It took several quiet visits, gentle coaxing, and the sound of her sisters meowing nearby before she dared to come out. When she was finally brought into safety, she clung quietly to her siblings, drawing comfort from their presence. She’s since made huge strides and is now blooming into a gentle, loving kitten.
</p>
          <a href="adoptlogin.php" class="block bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500 w-full text-center">Adopt Me</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Miky Modal -->
  <div id="modal-miky" class="modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-60 hidden z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative">
      <button aria-label="Close modal" onclick="closeModal('modal-miky')" class="absolute top-3 right-3 text-gray-600 hover:text-gray-900 text-2xl font-bold">&times;</button>
      <div class="flex flex-col items-center">
        <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/Dogs/Milky/Milky 1.jpg" alt="Miky" class="w-48 h-48 object-cover rounded-full mb-4">
        <h3 class="text-xl font-bold mb-2">Miky</h3>
        <div class="text-left w-full">
          <p class="text-gray-700 mb-2"><span class="font-semibold">Age:</span> 4-5 months</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Breed:</span> Aspin (dirty white fur)</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Gender:</span> Male</p>

          <p class="text-gray-700 mb-4 text-justify">Milky is a playful male pup around 3–4 months old, rescued from a neglectful past. Now healthy and fully vaccinated with 5-in-1, he's thriving in foster care. Milky loves boiled chicken, puppy milk, and playtime—and is looking for a forever home filled with love and patience.
</p>
          <a href="adoptlogin.php" class="block bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500 w-full text-center">Adopt Me</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Hany Modal -->
  <div id="modal-hany" class="modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-60 hidden z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative">
      <button aria-label="Close modal" onclick="closeModal('modal-hany')" class="absolute top-3 right-3 text-gray-600 hover:text-gray-900 text-2xl font-bold">&times;</button>
      <div class="flex flex-col items-center">
        <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/Dogs/Hany/Hany 1.jpg" alt="Hany" class="w-48 h-48 object-cover rounded-full mb-4">
        <h3 class="text-xl font-bold mb-2">Hany</h3>
        <div class="text-left w-full">
          <p class="text-gray-700 mb-2"><span class="font-semibold">Age:</span> 4-5 months</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Breed:</span>Aspin brown * white fur
</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Gender:</span> Male</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Vaccinated:</span> 5- in-1 x2</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Very playful and loves food</p>
          <p class="text-gray-700 mb-4 text-justify">Hany was rescued from the streets, underweight and neglected. Despite his rough start, he quickly bounced back with proper care and love. 
</p>
          <a href="adoptlogin.php" class="block bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500 w-full text-center">Adopt Me</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Belle Modal -->
  <div id="modal-belle" class="modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-60 hidden z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative">
      <button aria-label="Close modal" onclick="closeModal('modal-belle')" class="absolute top-3 right-3 text-gray-600 hover:text-gray-900 text-2xl font-bold">&times;</button>
      <div class="flex flex-col items-center">
        <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/Dogs/Belle/Belle 1.jpg" alt="Belle" class="w-48 h-48 object-cover rounded-full mb-4">
        <h3 class="text-xl font-bold mb-2">Belle</h3>
        <div class="text-left w-full">
         <p class="text-gray-700 mb-2"><span class="font-semibold">Age:</span> 3-4</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Breed:</span>Aspin, small breed
</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Gender:</span> Female</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Vaccinated:</span> 5- in-1 x2 </span>, Dewormed x4</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Very playful and loves food</p>
          <p class="text-gray-700 mb-4 text-justify">Belle was found as a tiny stray, wandering alone—likely separated from her mother far too early. Weak and vulnerable, she was taken in by Shelter of Light where she finally received the warmth and safety every pup deserves. </p>

          <a href="adoptlogin.php" class="block bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500 w-full text-center">Adopt Me</a>
        </div>
      </div>
    </div>
  </div>

<!-- Centered Modals Container -->
<div class="flex flex-col items-center justify-center gap-8 py-8">
  
  <!-- Snoopy Modal - Centered -->
  <div id="modal-snoopy" class="modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-60 hidden z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative mx-auto">
      <button aria-label="Close modal" onclick="closeModal('modal-snoopy')" class="absolute top-3 right-3 text-gray-600 hover:text-gray-900 text-2xl font-bold">&times;</button>
      <div class="flex flex-col items-center">
        <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/Dogs/Snoppy/Snoopy 1.jpg" alt="Snoopy" class="w-48 h-48 object-cover rounded-full mb-4">
        <h3 class="text-xl font-bold mb-2">Snoopy</h3>
        <div class="text-left w-full">
          <p class="text-gray-700 mb-2"><span class="font-semibold">Age:</span> 6-7 months</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Breed:</span> Aspin (white, bigger)</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Gender:</span> Male</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Vaccinated:</span> 5-1 x2</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Neutered:</span> Yes</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Very playful and sweet</p>

          <p class="text-gray-700 mb-4 text-justify ">Snoopy is one of Akira’s pups who was neglected by previous owners and later surrendered when he got sick. Diagnosed with parvo, he is now under care and fighting through with strength and resilience. He’ll be moving to a loving foster home this week.</p>
          <a href="adoptlogin.php" class="block bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500 w-full text-center">Adopt Me</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Tofu Modal - Centered -->
  <div id="modal-tofu" class="modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-60 hidden z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative mx-auto">
      <button aria-label="Close modal" onclick="closeModal('modal-tofu')" class="absolute top-3 right-3 text-gray-600 hover:text-gray-900 text-2xl font-bold">&times;</button>
      <div class="flex flex-col items-center">
        <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/Dogs/Tofu/Tofu.jpg" alt="Tofu" class="w-48 h-48 object-cover rounded-full mb-4">
        <h3 class="text-xl font-bold mb-2">Tofu</h3>
        <div class="text-left w-full">
          <p class="text-gray-700 mb-2"><span class="font-semibold">Age:</span> 6-7 months</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Breed:</span> Aspin (white, smaller)</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Gender:</span> Male</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Vaccinated:</span> 5-1 x2</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Neutered:</span> Yes</p>
          <p class="text-gray-700 mb-2"><span class="font-semibold">Very playful and sweet</p>

          <p class="text-gray-700 mb-4 text-justify">Surrendered by previous owners after neglect and lack of medical care. They only gave him up when he became seriously ill. Tofu is now under the care of Shelter of Light with the help of Lala's Haven. Very playful and sweet.</p>
          <a href="adoptlogin.php" class="block bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500 w-full text-center">Adopt Me</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Space Below -->
  <div class="h-12"></div>
  
</div>

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

  <script>
    // Mobile menu toggle
    document.getElementById('menu-button').addEventListener('click', function() {
      const menu = document.getElementById('mobile-menu');
      menu.classList.toggle('hidden');
    });

    // Modal functions
    function openModal(modalId) {
      document.body.classList.add('modal-open');
      const modal = document.getElementById(modalId);
      modal.classList.remove('hidden');
    }

    function closeModal(modalId) {
      document.body.classList.remove('modal-open');
      const modal = document.getElementById(modalId);
      modal.classList.add('hidden');
    }

    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
      if (event.target.classList.contains('modal')) {
        document.body.classList.remove('modal-open');
        event.target.classList.add('hidden');
      }
    });
  </script>
</body>
</html>