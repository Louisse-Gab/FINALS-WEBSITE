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
    <a href="home.php" class="flex items-center space-x-5">
  <img src="../images/SHELTER OF LIGHT/SOL-LOGO.png" alt="Logo" class="w-16 h-16">
  <h1 class="text-3xl font-poetsen font-bold text-black">Shelter of Light</h1>
</a>

     <!-- Navigation -->
     <nav class="flex space-x-8 text-base uppercase font-bold"> <!-- Larger navigation font -->
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

  <!-- Main Content -->
  <main class="bg-[#FFEBB9] py-16 px-6">

    <!-- About SHELTER OF LIGHT -->
    <section id="about" class="mb-12">
      <h2 class="text-center text-xl font-bold uppercase bg-[#FFF2CD] py-5 rounded-md text-black">About Shelter of Light</h2>
      <div class="bg-white border border-gray-300 rounded-md p-12 mt-6 leading-relaxed flex flex-col md:flex-row gap-6 items-start">
        <img src="../images/SHELTER OF LIGHT/ABOUT US PAGE/About Shelter of Light.jpeg" alt="Shelter Image" class="w-full md:w-72 rounded-lg object-cover">
        <p class="text-justify text-xl">
          Shelter of Light is an independent rescue located in Quezon City, Philippines. Established on November 20, 2020, it was created by a young woman as supported by her family. Shelter of Light cares for different animals, but has a prime focus on cats, especially the following: neonates, mama cats, special needs, semi-ferals, and those with existing illnesses. Currently residing only in a family home, SoL’s dream is to someday build a sanctuary that will extend help to more animals in need. Shelter of Light, together with animal welfare, also greatly advocates for education and mental health.
        </p>
      </div>
    </section>

    <!-- Mission and Vision Section -->
    <section class="mb-12">
      <h2 class="text-center text-xl font-bold uppercase bg-[#FFF2CD] py-4 rounded-md text-black">Mission and Vision</h2>
      <div class="bg-white border border-gray-300 rounded-md p-6 mt-4 leading-relaxed text-xl">
        <div class="flex flex-col md:flex-row gap-8">
          <!-- Mission -->
          <div class="flex-1 border-r border-gray-300 pr-6">
            <h3 class="text-2xl font-bold mb-3 text-center">Mission</h3>
            <p class="text-justify">
              Shelter of Light aims to rescue and rehabilitate abandoned and neglected animals, with a primary focus on cats—especially neonates, mama cats, special needs, semi-ferals, and those with existing illnesses. We strive to provide a safe and loving environment to these animals, giving them the necessary medical care, food, shelter, and love they require to thrive. Through our advocacies of animal welfare, mental health, and education, we aim to raise awareness and inspire compassion toward all living beings.
            </p>
          </div>

          <!-- Vision -->
          <div class="flex-1 pl-6">
            <h3 class="text-2xl font-bold mb-3 text-center">Vision</h3>
            <p class="text-justify">
              Our vision at Shelter of Light is to create a community where all animals are treated with the love and respect that they deserve. We strive to be one of the leading forces in animal welfare and advocacy and in providing a safe haven for animals in need. Our ultimate goal is to build a sanctuary that will accommodate more animals and expand our reach, enabling us to help more and promote a culture of kindness and compassion toward animals and humans alike.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Adoption Stories Section -->
    <section class="mb-16" id="adopt">
      <h2 class="text-center text-xl font-bold uppercase bg-[#FFF2CD] py-4 rounded-md text-black">Adoption Stories</h2>

      <!-- Cats Carousel -->
     <section class="mb-6">
        <h3 class="text-center italic font-bold text-black mt-4">CATS</h3>
        <div class="bg-white border border-gray-300 rounded-md mt-2 p-4">
          <div class="relative overflow-hidden">
            <div id="adoption-carousel" class="flex transition-transform duration-500 ease-in-out">
              <div class="min-w-full p-4 text-center">
                <img src="../images/SHELTER OF LIGHT/ABOUT US PAGE/Adoption Stories/Cats/Luna & Diwa.png" alt="Adoption 1" class="mx-auto h-60 object-cover rounded-lg mb-2">
                <p class="text-sm text-gray-700"> Luna and Diwa </p> 
                <br>
                <p class="text-sm text-gray-700"> The story of Shelter of Light began with two rescue kittens—Luna and Diwa. Their journey started when their mother was tragically run over by a car, leaving the tiny kittens orphaned and in need of care. With no prior experience in bottle-feeding animals, the rescuers improvised by using a human baby bottle and Birch Tree milk to nourish them. It was a humble beginning, born out of compassion and a desire to give vulnerable lives a second chance. Luna and Diwa became the first of many, marking the start of a mission rooted in rescue, kindness, and light.
                </p>

              </div>
              <div class="min-w-full p-4 text-center">
                <img src="../images/adopt2.jpg" alt="Adoption 2" class="mx-auto h-60 object-cover rounded-lg mb-2">
                <p class="text-sm text-gray-700">Biscuit enjoying the cuddles in his new home.</p>
              </div>
              <div class="min-w-full p-4 text-center">
                <img src="../images/adopt3.jpg" alt="Adoption 3" class="mx-auto h-60 object-cover rounded-lg mb-2">
                <p class="text-sm text-gray-700">Snowy was adopted by a lovely family.</p>
              </div>
              <div class="min-w-full p-4 text-center">
                <img src="../images/adopt4.jpg" alt="Adoption 4" class="mx-auto h-60 object-cover rounded-lg mb-2">
                <p class="text-sm text-gray-700">Tiny now has a warm bed every night.</p>
              </div>
              <div class="min-w-full p-4 text-center">
                <img src="../images/adopt5.jpg" alt="Adoption 5" class="mx-auto h-60 object-cover rounded-lg mb-2">
                <p class="text-sm text-gray-700">Pepper made best friends with the kids!</p>
              </div>
              <div class="min-w-full p-4 text-center">
                <img src="../images/adopt6.jpg" alt="Adoption 6" class="mx-auto h-60 object-cover rounded-lg mb-2">
                <p class="text-sm text-gray-700">Milo lives in a cozy new apartment now.</p>
              </div>
            </div>
            <button id="adoption-prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-1 rounded-full">❮</button>
            <button id="adoption-next" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-1 rounded-full">❯</button>
          </div>
        </div>
      </section>

      <!-- Dogs Placeholder -->
       <!-- Dogs Carousel -->
<section class="mb-6">
  <h3 class="text-center italic font-bold text-black mt-6">DOGS</h3>
  <div class="bg-white border border-gray-300 rounded-md mt-2 p-4">
    <div class="relative overflow-hidden">
      <div id="dog-carousel" class="flex transition-transform duration-500 ease-in-out">
        <div class="min-w-full p-4 text-center">
          <img src="../images/dog1.jpg" alt="Dog 1" class="mx-auto h-60 object-cover rounded-lg mb-2">
          <p class="text-sm text-gray-700">Buddy was adopted happily!</p>
        </div>
        <div class="min-w-full p-4 text-center">
          <img src="../images/dog2.jpg" alt="Dog 2" class="mx-auto h-60 object-cover rounded-lg mb-2">
          <p class="text-sm text-gray-700">Max found a new home!</p>
        </div>
        <div class="min-w-full p-4 text-center">
          <img src="../images/dog3.jpg" alt="Dog 3" class="mx-auto h-60 object-cover rounded-lg mb-2">
          <p class="text-sm text-gray-700">Nala is thriving now!</p>
        </div>
        <div class="min-w-full p-4 text-center">
          <img src="../images/dog4.jpg" alt="Dog 4" class="mx-auto h-60 object-cover rounded-lg mb-2">
          <p class="text-sm text-gray-700">Rocky got rescued!</p>
        </div>
        <div class="min-w-full p-4 text-center">
          <img src="../images/dog5.jpg" alt="Dog 5" class="mx-auto h-60 object-cover rounded-lg mb-2">
          <p class="text-sm text-gray-700">Daisy smiles every day!</p>
        </div>
        <div class="min-w-full p-4 text-center">
          <img src="../images/dog6.jpg" alt="Dog 6" class="mx-auto h-60 object-cover rounded-lg mb-2">
          <p class="text-sm text-gray-700">Charlie loves walks!</p>
        </div>
      </div>
      <button id="dog-prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-1 rounded-full">❮</button>
      <button id="dog-next" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-1 rounded-full">❯</button>
    </div>
  </div>
</section>

     
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

  <!-- Carousel Script -->
  <script>
  function setupCarousel(carouselId, prevBtnId, nextBtnId, totalSlides) {
    const carousel = document.getElementById(carouselId);
    const prevBtn = document.getElementById(prevBtnId);
    const nextBtn = document.getElementById(nextBtnId);

    let currentIndex = 0;

    prevBtn.addEventListener("click", () => {
      currentIndex = (currentIndex === 0) ? totalSlides - 1 : currentIndex - 1;
      carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
    });

    nextBtn.addEventListener("click", () => {
      currentIndex = (currentIndex === totalSlides - 1) ? 0 : currentIndex + 1;
      carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
    });
  }

  // Initialize both carousels
  setupCarousel("adoption-carousel", "adoption-prev", "adoption-next", 6); // Cats
  setupCarousel("dog-carousel", "dog-prev", "dog-next", 6); // Dogs
</script>

</body>
</html>
