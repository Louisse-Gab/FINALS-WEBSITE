<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us - Shelter of Light</title>
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
        <h1 class="text-3xl font-poetsen font-bold text-black">Shelter of Light</h1>
      </div>
      <!-- Navigation -->
      <nav class="flex space-x-8 text-base uppercase font-bold">
        <a href="home.php" class="text-[#FFBB00] hover:text-black">Home</a>
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

  <!-- Main About Content -->
  <main class="bg-[#FFEBB9] py-12 px-4">
    <!-- About Section -->
    <section class="mb-8">
      <h2 class="text-center text-sm font-bold uppercase bg-[#FFF2CD] py-2 rounded-md text-black">About Shelter of Light</h2>
      <div class="bg-white border border-gray-300 rounded-md p-4 mt-2 text-sm text-justify leading-relaxed">
        Shelter of Light is an independent rescue located in Quezon City, Philippines. Established on November 20, 2020, it was created by a young woman as supported by her family. Shelter of Light cares for different animals, but has a prime focus on cats, especially the following: neonates, mama cats, special needs, semi-ferals, and those with existing illnesses. Currently residing only in a family home, SoL’s dream is to someday build a sanctuary that will extend help to more animals in need. Shelter of Light, together with animal welfare, also greatly advocates for education and mental health.
      </div>
    </section>

    <!-- Mission and Vision Section -->
    <section class="mb-8">
      <h2 class="text-center text-sm font-bold uppercase bg-[#FFF2CD] py-2 rounded-md text-black">Mission and Vision</h2>
      <div class="bg-white border border-gray-300 rounded-md h-48 mt-2"></div>
    </section>

    <!-- Adoption Stories -->
    <section class="mb-4">
      <h2 class="text-center text-sm font-bold uppercase bg-[#FFF2CD] py-2 rounded-md text-black">Adoption Stories</h2>
    </section>

    <!-- Cats -->
    <section class="mb-6">
      <h3 class="text-center italic font-bold text-black">CATS</h3>
      <div class="bg-white border border-gray-300 rounded-md h-48 mt-2"></div>
    </section>

    <!-- Dogs -->
    <section>
      <h3 class="text-center italic font-bold text-black">DOGS</h3>
      <div class="bg-white border border-gray-300 rounded-md h-48 mt-2"></div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-[#FFEBB9] text-[#5F4B32] py-6">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center text-sm space-y-4 md:space-y-0 px-6">
      <!-- Left -->
      <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-4 items-center">
        <p class="font-bold">GET IN TOUCH WITH US</p>
        <div class="flex space-x-2">
          <a href="#" class="hover:text-black"><i class="fab fa-facebook"></i></a>
          <a href="#" class="hover:text-black"><i class="fab fa-instagram"></i></a>
          <a href="#" class="hover:text-black"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
      <!-- Center -->
      <div class="text-center">
        <p>&copy; Shelter of Light. All Rights Reserved.</p>
      </div>
      <!-- Right -->
      <div class="text-center md:text-right">
        <p class="font-bold">CREATORS OF THIS WEBSITE</p>
        <p>BRIONES | CABANDA | LIZEN<br>UST – CICS</p>
      </div>
    </div>
  </footer>

</body>
</html>
