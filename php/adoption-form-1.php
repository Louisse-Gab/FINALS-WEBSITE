<?php 
session_start();

// pag walang nakalogin at binago sa url eto ang ma eexecute nya 
if (!isset($_SESSION['username'])) {
    header('Location: ../php/home.php');
    exit();
}

?>

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


<!-- Main Content -->
<main class="container mx-auto px-6 py-12">
  <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-8">     

    <!-- Heading with X icon -->
    <div class="flex items-center justify-center mb-6 relative">
      <h1 class="text-3xl font-bold text-center">Shelter of Light Adoption Application Form</h1>
      <a href="adopt.php" class="absolute right-0 text-gray-500 hover:text-red-600 transition-colors duration-300" title="Back to Adopt Page">
        <!-- X Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </a>
    </div>

    <!-- Application instructions -->
    <div class="mb-8 p-6 bg-yellow-50 rounded-lg">
      <p class="mb-4">All information you will share in this form will strictly be confidential and will only be used for the sake of this adoption process.</p>
      <p>Please complete all sections of this form to help us understand your situation and find the best match for both you and our animals.</p>
    </div>

      
<!-- Application Process -->
<h2 class="text-2xl font-bold mb-4">Application Process</h2>
<div class="flex justify-center mb-8">
  <img src="../images/SHELTER OF LIGHT/FORMS/Adoption Process 2.png" 
       alt="Step 1" 
       class="w-[700px] h-auto rounded-lg shadow-md">
</div>
<!-- Our Adoptable Pets -->
<h2 class="text-2xl font-bold mb-4">Our Adoptable Pets</h2>

<!-- Dogs -->
<h3 class="text-xl font-semibold mb-3">Take note of our adoptable dogs:</h3>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
  <div class="text-center">
    <img src="../images/SHELTER OF LIGHT/FORMS/Belle.png" alt="Belle" class="w-full h-64 object-cover rounded-lg shadow-md mb-2">
    <p class="font-bold">Belle</p>
  </div>
  <div class="text-center">
    <img src="../images/SHELTER OF LIGHT/FORMS/Snoppy.jpg" alt="Snoopy" class="w-full h-64 object-cover rounded-lg shadow-md mb-2">
    <p class="font-bold">Snoopy</p>
  </div>
  <div class="text-center">
    <img src="../images/SHELTER OF LIGHT/FORMS/Tofu.jpg" alt="Tofu" class="w-full h-64 object-cover rounded-lg shadow-md mb-2">
    <p class="font-bold">Tofu</p>
  </div>
</div>

<!-- Milky and Hany Centered -->
<div class="flex justify-center mb-10">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="text-center">
      <img src="../images/SHELTER OF LIGHT/FORMS/Milky.jpg" alt="Milky" class="w-64 h-64 object-cover rounded-lg shadow-md mb-2">
      <p class="font-bold">Milky</p>
    </div>
    <div class="text-center">
      <img src="../images/SHELTER OF LIGHT/FORMS/Hany.jpg" alt="Hany" class="w-64 h-64 object-cover rounded-lg shadow-md mb-2">
      <p class="font-bold">Hany</p>
    </div>
  </div>
</div>



<!-- Cats -->
<h3 class="text-xl font-semibold mb-3">Take note of our adoptable cats:</h3>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
  <div class="text-center">
    <img src="../images/SHELTER OF LIGHT/FORMS/Jalapeno.jpg" alt="Jalapeño" class="w-full h-64 object-cover rounded-lg shadow-md mb-2">
    <p class="font-bold">Jalapeño</p>
  </div>
  <div class="text-center">
    <img src="../images/SHELTER OF LIGHT/FORMS/Cayenne.jpg" alt="Cayenne" class="w-full h-64 object-cover rounded-lg shadow-md mb-2">
    <p class="font-bold">Cayenne</p>
  </div>
  <div class="text-center">
    <img src="../images/SHELTER OF LIGHT/FORMS/Tabasco.jpg" alt="Tabasco" class="w-full h-64 object-cover rounded-lg shadow-md mb-2">
    <p class="font-bold">Tabasco</p>
  </div>
</div>


      <div class="text-center mt-8">
        <a href="adoption-form-2.php" class="bg-[#FFBB00] hover:bg-[#FFA000] text-white font-bold py-3 px-8 rounded-lg transition duration-300 inline-block">
          Start Application
        </a>
      </div>
    </div>
  </main>

  
</body>
</html>