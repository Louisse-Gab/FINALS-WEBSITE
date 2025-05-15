<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Adopt a Cat | Shelter of Light</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    function toggleDetails(id) {
      const detail = document.getElementById(id);
      detail.classList.toggle('hidden');
    }

    function showDogSection() {
      document.getElementById('dog-section').classList.remove('hidden');
      document.getElementById('see-more-button').classList.add('hidden');
    }
  </script>
</head>
<body class="bg-[#FFFBDE] text-gray-800 font-sans">

  <!-- Header -->
  <header class="bg-[#FFFBE9] shadow-md">
    <div class="container mx-auto flex justify-between items-center px-6 py-6">
      <a href="home.php" class="flex items-center space-x-5">
        <img src="../images/SHELTER OF LIGHT/SOL-LOGO.png" alt="Logo" class="w-16 h-16">
        <h1 class="text-3xl font-poetsen font-bold text-black">Shelter of Light</h1>
      </a>
      <nav class="flex space-x-8 text-base uppercase font-bold">
        <a href="home.php" class="hover:text-[#FFBB00]">Home</a>
        <a href="about.php" class="text-[#FFBB00] hover:text-black">About Us</a>
        <a href="what-we-do.php" class="hover:text-[#FFBB00]">What We Do</a>
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

  <!-- Main -->
  <main>
    <!-- Adopt a Cat Section -->
    <section class="bg-[#FFFBDE] py-10">
      <div class="container mx-auto px-4">
        <div class="flex items-center justify-between bg-[#FFF2CD] px-4 py-3 rounded-md">
          <button>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>
          <h2 class="text-lg font-bold uppercase text-black">Adopt a Cat</h2>
          <button>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-8">
          <!-- Cat Card 1 -->
          <div class="bg-white border border-gray-300 rounded-md p-4 text-center shadow-sm hover:shadow-md transition">
            <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/cat-sample.jpg" alt="Tabasco" class="w-32 h-32 object-cover rounded-full mx-auto mb-4">
            <p class="font-semibold text-sm text-gray-800">Tabasco</p>
            <p class="text-xs text-gray-600">Hot-headed no more—Tabasco’s got a warm heart under that spice!</p>
            <button onclick="toggleDetails('tabasco-details')" class="mt-4 bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">SEE DETAILS</button>
            <p id="tabasco-details" class="text-xs text-left mt-2 text-gray-700 hidden">Tabasco is a 2-year-old tabby who loves sunbathing and bird watching. She's fully vaccinated and spayed.</p>
          </div>

          <!-- Cat Card 2 -->
          <div class="bg-white border border-gray-300 rounded-md p-4 text-center shadow-sm hover:shadow-md transition">
            <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/cat-sample.jpg" alt="Cayenne" class="w-32 h-32 object-cover rounded-full mx-auto mb-4">
            <p class="font-semibold text-sm text-gray-800">Cayenne</p>
            <p class="text-xs text-gray-600">Cayenne’s still got sass, but now she’s all about snuggles too</p>
            <button onclick="toggleDetails('cayenne-details')" class="mt-4 bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">SEE DETAILS</button>
            <p id="cayenne-details" class="text-xs text-left mt-2 text-gray-700 hidden">Cayenne is 3 years old and loves climbing and playing with feather toys. She gets along with other cats.</p>
          </div>

          <!-- Cat Card 3 -->
          <div class="bg-white border border-gray-300 rounded-md p-4 text-center shadow-sm hover:shadow-md transition">
            <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/cat-sample.jpg" alt="Jalapeno" class="w-32 h-32 object-cover rounded-full mx-auto mb-4">
            <p class="font-semibold text-sm text-gray-800">Jalapeno</p>
            <p class="text-xs text-gray-600">A little fire, a lot of love—Jalapeño will steal your heart</p>
            <button onclick="toggleDetails('jalapeno-details')" class="mt-4 bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">SEE DETAILS</button>
            <p id="jalapeno-details" class="text-xs text-left mt-2 text-gray-700 hidden">Jalapeño is a 1-year-old rescue who’s curious, playful, and eager to find a forever lap to curl up on.</p>
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
              <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/dog-sample.jpg" alt="Barkley" class="w-32 h-32 object-cover rounded-full mx-auto mb-4">
              <p class="font-semibold text-sm text-gray-800">Barkley</p>
              <p class="text-xs text-gray-600">Big heart, bigger tail wags—Barkley is a gentle giant.</p>
              <button onclick="toggleDetails('barkley-details')" class="mt-4 bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">SEE DETAILS</button>
              <p id="barkley-details" class="text-xs text-left mt-2 text-gray-700 hidden">Barkley is a 4-year-old Labrador who loves fetch, belly rubs, and kids.</p>
            </div>

            <!-- Dog Card 2 -->
            <div class="bg-white border border-gray-300 rounded-md p-4 text-center shadow-sm hover:shadow-md transition">
              <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/dog-sample.jpg" alt="Luna" class="w-32 h-32 object-cover rounded-full mx-auto mb-4">
              <p class="font-semibold text-sm text-gray-800">Luna</p>
              <p class="text-xs text-gray-600">Shy at first, but Luna will be your shadow once she knows you.</p>
              <button onclick="toggleDetails('luna-details')" class="mt-4 bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">SEE DETAILS</button>
              <p id="luna-details" class="text-xs text-left mt-2 text-gray-700 hidden">Luna is a sweet shepherd mix, spayed, vaccinated, and leash-trained.</p>
            </div>

            <!-- Dog Card 3 -->
            <div class="bg-white border border-gray-300 rounded-md p-4 text-center shadow-sm hover:shadow-md transition">
              <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/dog-sample.jpg" alt="Milo" class="w-32 h-32 object-cover rounded-full mx-auto mb-4">
              <p class="font-semibold text-sm text-gray-800">Milo</p>
              <p class="text-xs text-gray-600">Energetic and goofy—Milo’s the life of the dog park!</p>
              <button onclick="toggleDetails('milo-details')" class="mt-4 bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500">SEE DETAILS</button>
              <p id="milo-details" class="text-xs text-left mt-2 text-gray-700 hidden">Milo is a 2-year-old terrier mix with lots of energy and love to give.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-[#FFEBB9] text-[#5F4B32] py-6">
    <div class="container mx-auto flex justify-between items-center text-sm px-6">
      <!-- Left Section -->
      <div class="flex space-x-4 items-center">
        <p class="font-bold">GET IN TOUCH WITH US</p>
        <div class="flex space-x-2">
          <a href="#" class="hover:text-black"><i class="fab fa-facebook"></i></a>
          <a href="#" class="hover:text-black"><i class="fab fa-instagram"></i></a>
          <a href="#" class="hover:text-black"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
      <!-- Center Section -->
      <div class="text-center">
        <p>&copy; Shelter of Light. All Rights Reserved.</p>
      </div>
      <!-- Right Section -->
      <div class="text-right">
        <p class="font-bold">CREATORS OF THIS WEBSITE</p>
        <p>BRIONES | CABANDA | LIZEN<br>UST</p>
      </div>
    </div>
  </footer>

</body>
</html>
