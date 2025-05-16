<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>What We Do | Shelter of Light</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .card-hover:hover {
      transform: translateY(-5px);
      transition: transform 0.3s ease;
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
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
        <a href="home.php" class="hover:text-[#FFBB00]">Home</a>
        <a href="about.php" class="hover:text-[#FFBB00]">About Us</a>
        <a href="what-we-do.php" class="text-[#FFBB00] hover:text-black">What We Do</a>
        <a href="donate.php" class="hover:text-[#FFBB00]">Donate</a>
        <a href="adopt.php" class="hover:text-[#FFBB00]">Adopt</a>
        <a href="contact.php" class="hover:text-[#FFBB00]">Contact</a>
      </nav>
      <div>
        <button>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-black hover:text-[#FFBB00]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.75-4.4a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
          </svg>
        </button>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="py-12">
    <div class="container mx-auto px-4">
      <h1 class="text-4xl font-bold text-center mb-16">What We Do</h1>
      
      <!-- Programs Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <!-- Feeding Program Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden card-hover">
          <img src="../images/SHELTER OF LIGHT/what-we-do/feeding-program.jpg" alt="Feeding Program" class="w-full h-48 object-cover">
          <div class="p-6">
            <h2 class="text-xl font-bold mb-2">Feeding Program</h2>
            <p class="text-gray-600 mb-4">Helping other rescuers and people through our community pantries and through what we have</p>
            <a href="feeding-program.php" class="inline-block bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">See Details</a>
          </div>
        </div>
        
        <!-- Collaboration Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden card-hover">
          <img src="../images/SHELTER OF LIGHT/what-we-do/collaboration.jpg" alt="Collaboration" class="w-full h-48 object-cover">
          <div class="p-6">
            <h2 class="text-xl font-bold mb-2">Collaboration</h2>
            <p class="text-gray-600 mb-4">Working with partners who share our mission of compassion for animals</p>
            <a href="collaboration.php" class="inline-block bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">See Details</a>
          </div>
        </div>
        
        <!-- Spay/Neuter Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden card-hover">
          <img src="../images/SHELTER OF LIGHT/what-we-do/spay-neuter.jpg" alt="Spay and Neuter Program" class="w-full h-48 object-cover">
          <div class="p-6">
            <h2 class="text-xl font-bold mb-2">Spay and Neuter</h2>
            <p class="text-gray-600 mb-4">A vital part of our advocacy to control the stray animal population humanely</p>
            <a href="spay-neuter.php" class="inline-block bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">See Details</a>
          </div>
        </div>
        
        <!-- Volunteer Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden card-hover">
          <img src="../images/SHELTER OF LIGHT/what-we-do/volunteer.jpg" alt="Volunteer Opportunities" class="w-full h-48 object-cover">
          <div class="p-6">
            <h2 class="text-xl font-bold mb-2">Volunteer Opportunities</h2>
            <p class="text-gray-600 mb-4">Join us in caring for rescued animals through visits and volunteer work</p>
            <a href="volunteer.php" class="inline-block bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">See Details</a>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-[#FFFBE9] border-t border-gray-300 py-6 mt-12">
    <div class="container mx-auto flex justify-between items-center px-6">
      <div>
        <p>© 2023 Shelter of Light. All rights reserved.</p>
      </div>
      <div class="flex space-x-4 items-center">
        <p class="cursor-pointer hover:underline">Terms and Conditions</p>
        <p class="cursor-pointer hover:underline">Privacy Policy</p>
      </div>
    </div>
  </footer>
</body>
</html>