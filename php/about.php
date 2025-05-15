<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shelter of Light</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="style.css"> <!-- Optional External CSS -->
</head>
<body class="bg-gray-100 font-sans">

  <!-- Navigation Bar -->
  <nav class="bg-white shadow-md p-4 md:flex md:items-center md:justify-between">
    <div class="flex flex-wrap items-center justify-between gap-4">
      <div class="flex items-center gap-2">
        <img src="logo.png" alt="Shelter Logo" class="h-8 w-8" />
        <h1 class="font-bold text-lg">Shelter of Light</h1>
      </div>
      <div class="flex flex-wrap gap-3 text-sm md:text-base">
        <a href="#" class="text-orange-500 font-semibold">HOME</a>
        <a href="#">ABOUT US</a>
        <a href="#">WHAT WE DO</a>
        <a href="#">DONATE</a>
        <a href="#">ADOPT</a>
        <a href="#">CONTACT</a>
      </div>
    </div>
    <div class="mt-2 md:mt-0">
      <input type="text" placeholder="Search" class="border rounded px-2 py-1 w-full md:w-auto" />
    </div>
  </nav>

  <!-- Content Wrapper -->
  <main class="p-4 space-y-10 max-w-3xl mx-auto">

    <!-- About Section -->
    <section>
      <h2 class="text-center font-semibold mb-2">ABOUT SHELTER OF LIGHT</h2>
      <div class="bg-white border border-gray-300 h-48 flex items-center justify-center overflow-hidden">
        <img src="about-image.png" alt="About Shelter" class="h-full w-auto object-cover" />
      </div>
    </section>

    <!-- Mission and Vision -->
    <section>
      <h2 class="text-center font-semibold mb-2">MISSION AND VISION</h2>
      <div class="bg-white border border-gray-300 h-48 flex items-center justify-center overflow-hidden">
        <img src="mission-image.png" alt="Our Mission and Vision" class="h-full w-auto object-cover" />
      </div>
    </section>

    <!-- Adoption Stories -->
    <section>
      <h2 class="text-center font-semibold mb-4">ADOPTION STORIES</h2>

      <!-- Cats -->
      <div class="mb-6">
        <h3 class="text-center font-bold italic mb-1">CATS</h3>
        <div class="bg-white border border-gray-300 h-48 flex items-center justify-center overflow-hidden">
          <img src="cats.png" alt="Adopted Cats" class="h-full w-auto object-cover" />
        </div>
      </div>

      <!-- Dogs -->
      <div>
        <h3 class="text-center font-bold italic mb-1">DOGS</h3>
        <div class="bg-white border border-gray-300 h-48 flex items-center justify-center overflow-hidden">
          <img src="dogs.png" alt="Adopted Dogs" class="h-full w-auto object-cover" />
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-yellow-100 mt-12 text-sm py-6">
    <div class="flex flex-col md:flex-row justify-between items-center px-6 text-center md:text-left space-y-4 md:space-y-0">
      
      <!-- Contact -->
      <div>
        <p class="font-medium">GET IN TOUCH WITH US</p>
        <div class="flex justify-center md:justify-start gap-3 mt-1">
          <img src="icon1.png" alt="Facebook" class="h-5" />
          <img src="icon2.png" alt="Instagram" class="h-5" />
          <img src="icon3.png" alt="Email" class="h-5" />
        </div>
      </div>

      <!-- Creators -->
      <div>
        <p class="font-medium">CREATORS OF THIS WEBSITE</p>
        <p>BRIONES | CABANADA | UZON</p>
        <p>BSIT - CACS</p>
      </div>
    </div>
    <p class="text-center mt-4">&copy; Shelter of Light. All Rights Reserved.</p>
  </footer>
</body>
</html>
