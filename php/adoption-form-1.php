<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Adoption Form | Shelter of Light</title>
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
        <a href="whatwedo.php" class="hover:text-[#FFBB00]">What We Do</a>
        <a href="donate.php" class="hover:text-[#FFBB00]">Donate</a>
        <a href="adopt.php" class="text-[#FFBB00] hover:text-black">Adopt</a>
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
  <main class="container mx-auto px-6 py-12">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-8">
      <h1 class="text-3xl font-bold mb-6 text-center">Shelter of Light Adoption Application Form</h1>
      
      <div class="mb-8 p-6 bg-yellow-50 rounded-lg">
        <p class="mb-4">All information you will share in this form will strictly be confidential and will only be used for the sake of this adoption process.</p>
        <p>Please complete all sections of this form to help us understand your situation and find the best match for both you and our animals.</p>
      </div>
      
      <h2 class="text-2xl font-bold mb-4">Application Process</h2>
      <div class="grid grid-cols-3 gap-4 mb-8 text-center">
        <div class="bg-[#FFFBE9] p-4 rounded-lg border border-[#FFBB00]">
          <h3 class="font-bold mb-2">1. Fill Out Application Form</h3>
          <p>Complete all sections of this form</p>
        </div>
        <div class="bg-gray-100 p-4 rounded-lg">
          <h3 class="font-bold mb-2">2. Interview Process</h3>
          <p>We'll contact you for an interview</p>
        </div>
        <div class="bg-gray-100 p-4 rounded-lg">
          <h3 class="font-bold mb-2">3. Home Visit</h3>
          <p>Final verification before approval</p>
        </div>
      </div>
      
      <h2 class="text-2xl font-bold mb-4">Our Adoptable Pets</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div>
          <h3 class="text-xl font-bold mb-2">Dogs</h3>
          <ul class="list-disc pl-5">
            <li>Premier</li>
            <li>Milky Hany</li>
          </ul>
        </div>
        <div>
          <h3 class="text-xl font-bold mb-2">Cats</h3>
          <ul class="list-disc pl-5">
            <li>Job Apress</li>
            <li>Extensive Tabasco</li>
            <li>Next</li>
          </ul>
        </div>
      </div>
      
      <div class="text-center mt-8">
        <a href="adoption-form-2.php" class="bg-[#FFBB00] hover:bg-[#FFA000] text-white font-bold py-3 px-8 rounded-lg transition duration-300 inline-block">
          Start Application
        </a>
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