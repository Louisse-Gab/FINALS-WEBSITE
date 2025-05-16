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

<main class="py-12">
  <div class="container mx-auto px-4 max-w-4xl">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
      <img src="../images/SHELTER OF LIGHT/what-we-do/feeding-program.jpg" alt="Feeding Program" class="w-full h-64 object-cover">
      <div class="p-8">
        <h1 class="text-3xl font-bold mb-6">Feeding Program</h1>
        <p class="text-gray-700 mb-6">
          Stray feeding is one of Shelter of Light's core outreach efforts, providing consistent food and care to homeless animals in the community. Volunteers go on scheduled rounds to feed stray cats and dogs, many of whom rely solely on this act of kindness for survival.
        </p>
        <p class="text-gray-700 mb-6">
          More than just a feeding activity, it's an opportunity to build trust, monitor health conditions, and sometimes even identify animals in need of rescue or medical attention. Through this initiative, Shelter of Light extends compassion beyond shelter walls, reaching the streets where help is needed most.
        </p>
        <a href="what-we-do.php" class="inline-block bg-[#FFBB00] text-white font-bold px-6 py-2 rounded hover:bg-yellow-500">Back to Programs</a>
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