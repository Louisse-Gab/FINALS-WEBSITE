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
        <a href="../php/whatwedo/whatwedo.php" class="hover:text-[#FFBB00]">What We Do</a>
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
      <img src="../images/SHELTER OF LIGHT/what-we-do/collaboration.jpg" alt="Collaboration" class="w-full h-64 object-cover">
      <div class="p-8">
        <h1 class="text-3xl font-bold mb-6">Collaboration</h1>
        <p class="text-gray-700 mb-6">
          At Shelter of Light, we believe that compassion grows stronger when shared. Our mission to rescue, rehabilitate, and protect animals is made possible through the support and collaboration of like-minded individuals, organizations, and communities. Each partnership plays a vital role in expanding our reach and deepening our impact.
        </p>
        
        <h2 class="text-2xl font-bold mt-8 mb-4 text-[#FFBB00]">Our Key Partners</h2>
        
        <div class="mb-8">
          <h3 class="text-xl font-bold mb-2">VetLink</h3>
          <p class="text-gray-700 mb-4">
            VetLink is one of our most essential veterinary partners, providing medical care, diagnostics, and emergency interventions for many of our rescues. From life-saving surgeries to regular check-ups, VetLink has been instrumental in ensuring that our animals receive professional and timely treatment.
          </p>
        </div>
        
        <div class="mb-8">
          <h3 class="text-xl font-bold mb-2">The Purr Project</h3>
          <p class="text-gray-700 mb-4">
            The Purr Project has been a consistent supporter of our mission through both logistical assistance and social media collaboration. They help amplify our advocacy by cross-posting urgent cases, promoting adoptables, and sharing educational content on responsible pet care.
          </p>
        </div>
        
        <div class="mb-8">
          <h3 class="text-xl font-bold mb-2">Doc Gab and Team</h3>
          <p class="text-gray-700 mb-4">
            Doc Gab and his team have been with us for years, consistently supporting our kapon (spay/neuter) and vaccination drives. Whether it's for outreach events or emergency care, we rely on the skilled hands and kind hearts of Doc Gab, Doc Pao, and Doc Simon.
          </p>
        </div>
        
        <a href="../whatwedo/whatwedo.php" class="inline-block bg-[#FFBB00] text-white font-bold px-6 py-2 rounded hover:bg-yellow-500">Back to Programs</a>
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