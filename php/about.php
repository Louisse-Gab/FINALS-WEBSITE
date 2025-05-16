<?php
// Animal Class (OOP - Encapsulation and Inheritance)
class Animal {
    // Encapsulated properties
    protected $name;
    protected $type;
    protected $description;
    protected $image;

    public function __construct($name, $type, $description, $image) {
        $this->name = $name;
        $this->type = $type;
        $this->description = $description;
        $this->image = $image;
    }

    // Encapsulated getter methods
    public function getName() {
        return $this->name;
    }

    public function getType() {
        return $this->type;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getImage() {
        return $this->image;
    }

    // Method to be overridden by child classes (showing polymorphism potential)
    public function displayInfo() {
        return "";
    }
}

// Cat class inheriting from Animal
class Cat extends Animal {
    public function __construct($name, $description, $image) {
        parent::__construct($name, 'cat', $description, $image);
    }

    // Polymorphic implementation
    public function displayInfo() {
        return "<div class='p-4 text-center'>
            <img src='{$this->image}' alt='{$this->name}' class='mx-auto h-48 sm:h-60 object-cover rounded-lg mb-2'>
            <p class='text-xs sm:text-sm text-gray-700'>{$this->description}</p>
        </div>";
    }
}

// Dog class inheriting from Animal
class Dog extends Animal {
    public function __construct($name, $description, $image) {
        parent::__construct($name, 'dog', $description, $image);
    }

    // Polymorphic implementation
    public function displayInfo() {
        return "<div class='p-4 text-center'>
            <img src='{$this->image}' alt='{$this->name}' class='mx-auto h-48 sm:h-60 object-cover rounded-lg mb-2'>
            <p class='text-xs sm:text-sm text-gray-700'>{$this->description}</p>
        </div>";
    }
}

// Sample data - in a real app, this would come from a database
$cats = [
    new Cat("Luna & Diwa", 
           "The story of Shelter of Light began with two rescue kittens—Luna and Diwa...", 
           "../images/SHELTER OF LIGHT/ABOUT US PAGE/Adoption Stories/Cats/Luna & Diwa.png"),
    new Cat("Biscuit", 
           "Biscuit enjoying the cuddles in his new home.", 
           "../images/adopt2.jpg"),
    new Cat("Snowy", 
           "Snowy was adopted by a lovely family.", 
           "../images/adopt3.jpg")
];

$dogs = [
    new Dog("Buddy", 
           "Buddy was adopted happily!", 
           "../images/dog1.jpg"),
    new Dog("Max", 
           "Max found a new home!", 
           "../images/dog2.jpg"),
    new Dog("Nala", 
           "Nala is thriving now!", 
           "../images/dog3.jpg")
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Adopt a Cat | Shelter of Light</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    main {
      flex: 1;
    }
    .full-width-section {
      width: 100vw;
      position: relative;
      left: 50%;
      right: 50%;
      margin-left: -50vw;
      margin-right: -50vw;
    }
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
  </style>
  <script>
    function toggleDetails(id) {
      const detail = document.getElementById(id);
      detail.classList.toggle('hidden');
    }

    function showDogSection() {
      document.getElementById('dog-section').classList.remove('hidden');
      document.getElementById('see-more-button').classList.add('hidden');
    }

    // Mobile menu toggle
    document.addEventListener('DOMContentLoaded', function() {
      const menuButton = document.getElementById('menu-button');
      const mobileMenu = document.getElementById('mobile-menu');
      
      menuButton.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
      });

      // Carousel functionality
      function setupCarousel(carouselId, prevBtnId, nextBtnId, totalSlides) {
        const carousel = document.getElementById(carouselId);
        const prevBtn = document.getElementById(prevBtnId);
        const nextBtn = document.getElementById(nextBtnId);
        let currentIndex = 0;
        
        function updateCarousel() {
          carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
        }
        
        prevBtn.addEventListener("click", () => {
          currentIndex = (currentIndex === 0) ? totalSlides - 1 : currentIndex - 1;
          updateCarousel();
        });
        
        nextBtn.addEventListener("click", () => {
          currentIndex = (currentIndex === totalSlides - 1) ? 0 : currentIndex + 1;
          updateCarousel();
        });
      }
      
      setupCarousel("adoption-carousel", "adoption-prev", "adoption-next", 6);
      setupCarousel("dog-carousel", "dog-prev", "dog-next", 6);
    });
  </script>
</head>
<body class="bg-[#FFFBDE] text-gray-800 font-sans">

  <!-- Header with original navigation placement -->
  <header class="bg-[#FFFBE9] shadow-md">
    <div class="container mx-auto flex justify-between items-center px-4 lg:px-6 py-4 lg:py-6">
      <a href="home.php" class="flex items-center space-x-2 lg:space-x-5">
        <img src="../images/SHELTER OF LIGHT/SOL-LOGO.png" alt="Logo" class="w-10 h-10 lg:w-16 lg:h-16">
        <h1 class="text-xl lg:text-3xl font-bold text-black">Shelter of Light</h1>
      </a>
      
      <!-- Desktop Navigation -->
      <nav class="desktop-nav space-x-4 lg:space-x-8 text-sm lg:text-base uppercase font-bold">
        <a href="home.php" class="hover:text-[#FFBB00]">Home</a>
        <a href="about.php" class="text-[#FFBB00] hover:text-black">About Us</a>
        <a href="what-we-do.php" class="hover:text-[#FFBB00]">What We Do</a>
        <a href="donate.php" class="hover:text-[#FFBB00]">Donate</a>
        <a href="adopt.php" class="hover:text-[#FFBB00]">Adopt</a>
        <a href="contact.php" class="hover:text-[#FFBB00]">Contact</a>
      </nav>
      
      <!-- Search Icon -->
      <div class="flex items-center space-x-4">
        <button class="hidden lg:block">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:h-7 lg:w-7 text-black hover:text-[#FFBB00]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.75-4.4a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
          </svg>
        </button>
        
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
        <a href="about.php" class="text-[#FFBB00] hover:text-black">About Us</a>
        <a href="what-we-do.php" class="hover:text-[#FFBB00]">What We Do</a>
        <a href="donate.php" class="hover:text-[#FFBB00]">Donate</a>
        <a href="adopt.php" class="hover:text-[#FFBB00]">Adopt</a>
        <a href="contact.php" class="hover:text-[#FFBB00]">Contact</a>
      </div>
    </div>
  </header>

  <main>
    <!-- About Section -->
    <section id="about" class="mb-8 lg:mb-12">
      <div class="full-width-section bg-[#FFF2CD] py-3 lg:py-5">
        <h2 class="text-center text-lg lg:text-xl font-bold uppercase text-black container mx-auto px-4 lg:px-6">About Shelter of Light</h2>
      </div>
      <div class="container mx-auto px-4 lg:px-6">
        <div class="bg-white border border-gray-300 rounded-md p-6 lg:p-12 mt-4 lg:mt-6 leading-relaxed flex flex-col lg:flex-row gap-4 lg:gap-6 items-start">
          <img src="../images/SHELTER OF LIGHT/ABOUT US PAGE/About Shelter of Light.jpeg" alt="Shelter Image" class="w-full lg:w-72 rounded-lg object-cover">
          <p class="text-justify text-base lg:text-xl">
            Shelter of Light is an independent rescue located in Quezon City, Philippines. Established on November 20, 2020, it was created by a young woman as supported by her family. Shelter of Light cares for different animals, but has a prime focus on cats, especially the following: neonates, mama cats, special needs, semi-ferals, and those with existing illnesses. Currently residing only in a family home, SoL's dream is to someday build a sanctuary that will extend help to more animals in need. Shelter of Light, together with animal welfare, also greatly advocates for education and mental health.
          </p>
        </div>
      </div>
    </section>

    <!-- Mission and Vision Section -->
    <section class="mb-8 lg:mb-12">
      <div class="full-width-section bg-[#FFF2CD] py-3 lg:py-4">
        <h2 class="text-center text-lg lg:text-xl font-bold uppercase text-black container mx-auto px-4 lg:px-6">Mission and Vision</h2>
      </div>
      <div class="container mx-auto px-4 lg:px-6">
        <div class="bg-white border border-gray-300 rounded-md p-4 lg:p-6 mt-3 lg:mt-4 leading-relaxed text-base lg:text-xl">
          <div class="flex flex-col lg:flex-row gap-4 lg:gap-8">
            <div class="flex-1 lg:border-r lg:border-gray-300 lg:pr-6">
              <h3 class="text-xl lg:text-2xl font-bold mb-2 lg:mb-3 text-center">Mission</h3>
              <p class="text-justify">
                Shelter of Light aims to rescue and rehabilitate abandoned and neglected animals, with a primary focus on cats—especially neonates, mama cats, special needs, semi-ferals, and those with existing illnesses. We strive to provide a safe and loving environment to these animals, giving them the necessary medical care, food, shelter, and love they require to thrive. Through our advocacies of animal welfare, mental health, and education, we aim to raise awareness and inspire compassion toward all living beings.
              </p>
            </div>
            <div class="flex-1 lg:pl-6">
              <h3 class="text-xl lg:text-2xl font-bold mb-2 lg:mb-3 text-center">Vision</h3>
              <p class="text-justify">
                Our vision at Shelter of Light is to create a community where all animals are treated with the love and respect that they deserve. We strive to be one of the leading forces in animal welfare and advocacy and in providing a safe haven for animals in need. Our ultimate goal is to build a sanctuary that will accommodate more animals and expand our reach, enabling us to help more and promote a culture of kindness and compassion toward animals and humans alike.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Adoption Stories Section -->
    <section class="mb-8 lg:mb-16" id="adopt">
      <div class="full-width-section bg-[#FFF2CD] py-3 lg:py-4">
        <h2 class="text-center text-lg lg:text-xl font-bold uppercase text-black container mx-auto px-4 lg:px-6">Adoption Stories</h2>
      </div>
      <div class="container mx-auto px-4 lg:px-6">
        <!-- Cats Carousel -->
        <section class="mb-6">
          <h3 class="text-center italic font-bold text-black mt-4">CATS</h3>
          <div class="bg-white border border-gray-300 rounded-md mt-2 p-4">
            <div class="relative overflow-hidden">
              <div id="adoption-carousel" class="flex transition-transform duration-500 ease-in-out">
                <div class="min-w-full p-4 text-center">
                  <p class="text-sm text-gray-700"> Luna and Diwa </p> 
                  <br>
                  <img src="../images/SHELTER OF LIGHT/ABOUT US PAGE/Adoption Stories/Cats/Luna & Diwa.png" alt="Adoption 1" class="mx-auto h-48 lg:h-60 object-cover rounded-lg mb-2">
                  <br>
                  <p class="text-sm text-gray-700"> The story of Shelter of Light began with two rescue kittens—Luna and Diwa. Their journey started when their mother was tragically run over by a car, leaving the tiny kittens orphaned and in need of care. With no prior experience in bottle-feeding animals, the rescuers improvised by using a human baby bottle and Birch Tree milk to nourish them. It was a humble beginning, born out of compassion and a desire to give vulnerable lives a second chance. Luna and Diwa became the first of many, marking the start of a mission rooted in rescue, kindness, and light.
                  </p>
                </div>
                <div class="min-w-full p-4 text-center">
                  <img src="../images/adopt2.jpg" alt="Adoption 2" class="mx-auto h-48 lg:h-60 object-cover rounded-lg mb-2">
                  <p class="text-sm text-gray-700">Biscuit enjoying the cuddles in his new home.</p>
                </div>
                <div class="min-w-full p-4 text-center">
                  <img src="../images/adopt3.jpg" alt="Adoption 3" class="mx-auto h-48 lg:h-60 object-cover rounded-lg mb-2">
                  <p class="text-sm text-gray-700">Snowy was adopted by a lovely family.</p>
                </div>
                <div class="min-w-full p-4 text-center">
                  <img src="../images/adopt4.jpg" alt="Adoption 4" class="mx-auto h-48 lg:h-60 object-cover rounded-lg mb-2">
                  <p class="text-sm text-gray-700">Tiny now has a warm bed every night.</p>
                </div>
                <div class="min-w-full p-4 text-center">
                  <img src="../images/adopt5.jpg" alt="Adoption 5" class="mx-auto h-48 lg:h-60 object-cover rounded-lg mb-2">
                  <p class="text-sm text-gray-700">Pepper made best friends with the kids!</p>
                </div>
                <div class="min-w-full p-4 text-center">
                  <img src="../images/adopt6.jpg" alt="Adoption 6" class="mx-auto h-48 lg:h-60 object-cover rounded-lg mb-2">
                  <p class="text-sm text-gray-700">Milo lives in a cozy new apartment now.</p>
                </div>
              </div>
              <button id="adoption-prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-2 lg:px-3 py-1 rounded-full text-sm lg:text-base">❮</button>
              <button id="adoption-next" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-2 lg:px-3 py-1 rounded-full text-sm lg:text-base">❯</button>
            </div>
          </div>
        </section>

        <!-- Dogs Carousel -->
        <section class="mb-6">
          <h3 class="text-center italic font-bold text-black mt-4 lg:mt-6">DOGS</h3>
          <div class="bg-white border border-gray-300 rounded-md mt-2 p-4">
            <div class="relative overflow-hidden">
              <div id="dog-carousel" class="flex transition-transform duration-500 ease-in-out">
                <div class="min-w-full p-4 text-center">
                  <img src="../images/dog1.jpg" alt="Dog 1" class="mx-auto h-48 lg:h-60 object-cover rounded-lg mb-2">
                  <p class="text-sm text-gray-700">Buddy was adopted happily!</p>
                </div>
                <div class="min-w-full p-4 text-center">
                  <img src="../images/dog2.jpg" alt="Dog 2" class="mx-auto h-48 lg:h-60 object-cover rounded-lg mb-2">
                  <p class="text-sm text-gray-700">Max found a new home!</p>
                </div>
                <div class="min-w-full p-4 text-center">
                  <img src="../images/dog3.jpg" alt="Dog 3" class="mx-auto h-48 lg:h-60 object-cover rounded-lg mb-2">
                  <p class="text-sm text-gray-700">Nala is thriving now!</p>
                </div>
                <div class="min-w-full p-4 text-center">
                  <img src="../images/dog4.jpg" alt="Dog 4" class="mx-auto h-48 lg:h-60 object-cover rounded-lg mb-2">
                  <p class="text-sm text-gray-700">Rocky got rescued!</p>
                </div>
                <div class="min-w-full p-4 text-center">
                  <img src="../images/dog5.jpg" alt="Dog 5" class="mx-auto h-48 lg:h-60 object-cover rounded-lg mb-2">
                  <p class="text-sm text-gray-700">Daisy smiles every day!</p>
                </div>
                <div class="min-w-full p-4 text-center">
                  <img src="../images/dog6.jpg" alt="Dog 6" class="mx-auto h-48 lg:h-60 object-cover rounded-lg mb-2">
                  <p class="text-sm text-gray-700">Charlie loves walks!</p>
                </div>
              </div>
              <button id="dog-prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-2 lg:px-3 py-1 rounded-full text-sm lg:text-base">❮</button>
              <button id="dog-next" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-2 lg:px-3 py-1 rounded-full text-sm lg:text-base">❯</button>
            </div>
          </div>
        </section>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="full-width-section bg-[#FFEBB9] text-[#5F4B32] py-4 lg:py-6">
    <div class="container mx-auto px-4 lg:px-6">
      <div class="flex flex-col lg:flex-row justify-between items-center gap-4 text-center lg:text-left">
        
        <!-- Contact Info -->
        <div class="order-2 lg:order-1 flex flex-col sm:flex-row items-center gap-2 lg:gap-4">
          <p class="font-bold whitespace-nowrap">GET IN TOUCH WITH US</p>
          <div class="flex flex-wrap justify-center gap-2 lg:gap-4">
            <a href="#" class="hover:text-black whitespace-nowrap">Facebook</a>
            <a href="#" class="hover:text-black whitespace-nowrap">Instagram</a>
            <a href="#" class="hover:text-black whitespace-nowrap">YouTube</a>
          </div>
        </div>
        
        <!-- Copyright -->
        <div class="order-1 lg:order-2">
          <p>&copy; Shelter of Light. All Rights Reserved.</p>
        </div>
        
        <!-- Creators -->
        <div class="order-3 text-center lg:text-right">
          <p class="font-bold whitespace-nowrap">CREATORS OF THIS WEBSITE</p>
          <p class="whitespace-nowrap">BRIONES | CABANDA | LIZEN<br>UST</p>
        </div>
        
      </div>
    </div>
  </footer>
</body>
</html>