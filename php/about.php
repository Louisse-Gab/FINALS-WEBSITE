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
      background-color: #FFFBDE;
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
    /* Arrow link styles */
    .arrow-link {
        display: flex;
        align-items: center;
        justify-content: center;
        color: #000;
        transition: color 0.3s;
    }
    
    .arrow-link:hover svg {
        transform: translateX(-5px);
        transition: transform 0.3s ease;
    }
    
    /* Carousel styles */
    .carousel-container { 
        position: relative; 
        overflow: hidden; 
    }
    .carousel-slide { 
        display: none; 
    }
    .carousel-slide.active { 
        display: block; 
        animation: fade 0.5s; 
    }
    @keyframes fade { 
        from {opacity: .4} 
        to {opacity: 1} 
    }
    .carousel-button:disabled { 
        opacity: 0.5; 
        cursor: not-allowed; 
    }
  </style>
</head>
<body class="text-gray-800 font-sans">
    <header class="bg-[#FFFBE9] shadow-md border-b border-[#00000033]">
        <div class="container mx-auto flex justify-between items-center px-4 lg:px-6 py-4 lg:py-6">
            <a href="home.php" class="flex items-center space-x-2 lg:space-x-5">
                <img src="../images/SHELTER OF LIGHT/SOL-LOGO.png" alt="Logo" class="w-10 h-10 lg:w-16 lg:h-16">
                <h1 class="text-xl lg:text-3xl font-bold text-black">Shelter of Light</h1>
            </a>
            
            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex space-x-8 text-base uppercase font-bold">
                <a href="home.php" class="hover:text-[#FFBB00]">Home</a>
                <a href="about.php" class="text-[#FFBB00] hover:text-black">About Us</a>
                <a href="../php/whatwedo/whatwedo.php" class="hover:text-[#FFBB00]">What We Do</a>
                <a href="donate.php" class="hover:text-[#FFBB00]">Donate</a>
                <a href="adopt.php" class="hover:text-[#FFBB00]">Adopt</a>
                <a href="contact.php" class="hover:text-[#FFBB00]">Contact</a>
            </nav>
            
            <!-- Mobile Menu Button -->
            <div class="flex items-center lg:hidden">
                <button id="mobile-menu-button" class="text-gray-800 hover:text-[#FFBB00] focus:outline-none">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
            
            <!-- Search Icon (Desktop) -->
            <div class="hidden lg:block">
                <button class="text-black hover:text-[#FFBB00]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:h-7 lg:w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.75-4.4a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z"/>
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu (Dropdown) -->
        <div id="mobile-menu" class="hidden lg:hidden bg-[#FFFBE9] pb-4 px-4">
            <div class="flex flex-col space-y-3 text-sm uppercase font-bold">
                <a href="home.php" class="hover:text-[#FFBB00] py-2">Home</a>
                <a href="about.php" class="text-[#FFBB00] hover:text-black py-2">About Us</a>
                <a href="whatwedo.php" class="hover:text-[#FFBB00] py-2">What We Do</a>
                <a href="donate.php" class="hover:text-[#FFBB00] py-2">Donate</a>
                <a href="adopt.php" class="hover:text-[#FFBB00] py-2">Adopt</a>
                <a href="contact.php" class="hover:text-[#FFBB00] py-2">Contact</a>
            </div>
        </div>
    </header>

    <main>
        <section id="about" class="mb-8 lg:mb-12">
            <div class="full-width-section bg-[#FFF2CD] py-5 lg:py-5 border-b border-[#00000033]">
                <div class="container mx-auto px-4 lg:px-6 flex items-center justify-between">
                    <div class="w-6"></div>
                    <h3 class="text-xl lg:text-2xl font-bold mb-2 lg:mb-3 text-center">ABOUT SHELTER OF LIGHT</h3>
                    <a href="home.php" class="arrow-link text-black hover:text-[#FFBB00]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </a>
                </div>
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

        <section class="mb-8 lg:mb-16" id="adopt">
            <div class="full-width-section bg-[#FFF2CD] py-3 lg:py-4">
                <h2 class="text-center text-lg lg:text-xl font-bold uppercase text-black container mx-auto px-4 lg:px-6">Adoption Stories</h2>
            </div>
            <div class="container mx-auto px-4 lg:px-6">
                <!-- Cats Carousel -->
                <section class="mb-6">
                    <h3 class="text-center italic font-bold text-black mt-4">CATS</h3>
                    <div class="bg-white border border-gray-300 rounded-md mt-2 p-4 relative" id="cats-carousel">
                        <!-- Carousel Items -->
                        <div class="carousel-slide active">
                            <div class="p-4 text-center">
                                <p class="text-center font-bold text-black mt-4">Luna and Diwa</p>
                                <br>
                                <img src="../images/SHELTER OF LIGHT/ABOUT US PAGE/Adoption Stories/Cats/Luna & Diwa.png" alt="Luna & Diwa" class="mx-auto h-48 lg:h-60 object-cover rounded-lg mb-2">
                                <br>
                                <p class="text-sm text-gray-700">The story of Shelter of Light began with two rescue kittens—Luna and Diwa. Their journey started when their mother was tragically run over by a car, leaving the tiny kittens orphaned and in need of care. With no prior experience in bottle-feeding animals, the rescuers improvised by using a human baby bottle and Birch Tree milk to nourish them. It was a humble beginning, born out of compassion and a desire to give vulnerable lives a second chance. Luna and Diwa became the first of many, marking the start of a mission rooted in rescue, kindness, and light.</p>
                            </div>
                        </div>
                        
                        <div class="carousel-slide">
                            <div class="p-4 text-center">
                                <p class="text-center font-bold text-black mt-4">Sinag</p>
                                <br>
                                <img src="../images/SHELTER OF LIGHT/ABOUT US PAGE/Adoption Stories/Cats/Sinag.png" alt="Sinag" class="mx-auto h-48 lg:h-60 object-cover rounded-lg mb-2">
                                <br>
                                <p class="text-sm text-gray-700">Shelter of Light's first official rescue was a cat named Sinag. She was found in heartbreaking condition—infested with mites and lice, and with one eye already ruptured. Despite the severity of her condition, she was given a name that meant "ray of light," symbolizing hope in the midst of suffering. Sinag was lovingly cared for and lived for almost two years, bringing warmth and inspiration to those around her. Sadly, she crossed the rainbow bridge due to a blood parasite—an effect of her compromised health from the very beginning. Her life, though short, became a defining moment in Shelter of Light's mission: to stand for those who cannot speak and to bring light where it is most needed.</p>
                            </div>
                        </div>
                        
                        <div class="carousel-slide">
                            <div class="p-4 text-center">
                                <p class="text-center font-bold text-black mt-4">Faith</p>
                                <br>
                                <img src="../images/SHELTER OF LIGHT/ABOUT US PAGE/Adoption Stories/Cats/Faith.png" alt="Faith" class="mx-auto h-48 lg:h-60 object-cover rounded-lg mb-2">
                                <br>
                                <p class="text-sm text-gray-700">Faith was rescued by us after a supporter reached out for help. She was such a sweet cat who had a large wound on her eye. We fought for her for weeks, but the wound on her face has become necrotizing so we had to let her go and let her rest.</p>
                            </div>
                        </div>
                        
                        <div class="carousel-slide">
                            <div class="p-4 text-center">
                                <p class="text-center font-bold text-black mt-4">Bless</p>
                                <br>
                                <img src="../images/SHELTER OF LIGHT/ABOUT US PAGE/Adoption Stories/Cats/Bless.png" alt="Bless" class="mx-auto h-48 lg:h-60 object-cover rounded-lg mb-2">
                                <br>
                                <p class="text-sm text-gray-700">Bless was found in front of a church by a supporter of SoL. She was probably hit by a car as she had a hernia and was paralyzed because her spine was broken. She is still with us, and just recently underwent her third surgery. Bless is a beautiful cat who is usually nonchalant but also sweet.</p>
                            </div>
                        </div>
                        
                        <div class="carousel-slide">
                            <div class="p-4 text-center">
                                <p class="text-center font-bold text-black mt-4">Viva</p>
                                <br>
                                <img src="../images/SHELTER OF LIGHT/ABOUT US PAGE/Adoption Stories/Cats/Viva.png" alt="Viva" class="mx-auto h-48 lg:h-60 object-cover rounded-lg mb-2">
                                <br>
                                <p class="text-sm text-gray-700">This is Viva, who was found with Vivo during the fire incident. She has burned paws and was very sickly right from the start. We later found out she has FIP. She completed her treatment but her FIP suddenly became neuro and despite all our efforts, as well as the vets', VIva succumbed to her illness after months.</p>
                            </div>
                        </div>
                        
                        <div class="carousel-slide">
                            <div class="p-4 text-center">
                                <p class="text-center font-bold text-black mt-4">Boney</p>
                                <br>
                                <img src="../images/SHELTER OF LIGHT/ABOUT US PAGE/Adoption Stories/Cats/Boney.png" alt="Boney" class="mx-auto h-48 lg:h-60 object-cover rounded-lg mb-2">
                                <br>
                                <p class="text-sm text-gray-700">Boney was found limping on the street, with a bone visibly protruding from his leg. The injury led to an amputation, but becoming three-legged never slowed him down. Today, he's one of Shelter of Light's funniest and most playful cats, often seen running around with the younger ones—full of life and spirit.</p>
                            </div>
                        </div>
                        
                        <!-- Navigation Buttons -->
                        <button class="carousel-prev absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-1 rounded-full">❮</button>
                        <button class="carousel-next absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-1 rounded-full">❯</button>
                    </div>
                </section>

                <!-- Dogs Carousel -->
                <section class="mb-6">
                    <h3 class="text-center italic font-bold text-black mt-4 lg:mt-6">DOGS</h3>
                    <div class="bg-white border border-gray-300 rounded-md mt-2 p-4 relative" id="dogs-carousel">
                        <!-- Carousel Items -->
                        <div class="carousel-slide active">
                            <div class="p-4 text-center">
                                <p class="text-center font-bold text-black mt-4">Toffee</p>
                                <br>
                                <img src="../images/SHELTER OF LIGHT/ABOUT US PAGE/Adoption Stories/Dogs/Toffee.png" alt="Toffee" class="mx-auto h-48 lg:h-60 object-cover rounded-lg mb-2">
                                <br>
                                <p class="text-sm text-gray-700">Toffee was the most aggressive rescue Shelter of Light had taken in. Saved from the pound just a day before scheduled euthanasia, he was limping after being dragged by pound staff. With months of patience and care, his aggression faded—revealing a gentle, loving dog underneath.</p>
                            </div>
                        </div>
                        
                        <div class="carousel-slide">
                            <div class="p-4 text-center">
                                <p class="text-center font-bold text-black mt-4">Lucky</p>
                                <br>
                                <img src="../images/SHELTER OF LIGHT/ABOUT US PAGE/Adoption Stories/Dogs/Lucky.png" alt="Lucky" class="mx-auto h-48 lg:h-60 object-cover rounded-lg mb-2">
                                <br>
                                <p class="text-sm text-gray-700">Lucky was a paralyzed puppy found thrown into a canal, able to move only his head and mouth. Believed to be abandoned due to his condition, he fought bravely for weeks under vet care. In the end, his body gave up—but his story continues to shine as a symbol of resilience and compassion.</p>
                            </div>
                        </div>
                        
                        <div class="carousel-slide">
                            <div class="p-4 text-center">
                                <p class="text-center font-bold text-black mt-4">Choco</p>
                                <br>
                                <img src="../images/SHELTER OF LIGHT/ABOUT US PAGE/Adoption Stories/Dogs/Choco.png" alt="Choco" class="mx-auto h-48 lg:h-60 object-cover rounded-lg mb-2">
                                <br>
                                <p class="text-sm text-gray-700">Choco was an abandoned house dog who kept returning to his former home after his owners moved away. Along the way, he likely encountered cruelty that left him in a severely weakened state. Despite veterinary efforts, Choco passed away—a quiet reminder of the consequences of neglect.</p>
                            </div>
                        </div>
                        
                        <div class="carousel-slide">
                            <div class="p-4 text-center">
                                <p class="text-center font-bold text-black mt-4">Maria</p>
                                <br>
                                <img src="../images/SHELTER OF LIGHT/ABOUT US PAGE/Adoption Stories/Dogs/Maria.png" alt="Maria" class="mx-auto h-48 lg:h-60 object-cover rounded-lg mb-2">
                                <br>
                                <p class="text-sm text-gray-700">Maria was a hit-and-run victim reported by the local barangay. She bravely dragged herself off the road to safety, showing incredible will to live. Though she fought hard, multiple illnesses—including blood parasites—led to her passing despite veterinary care. Her strength left a lasting mark on Shelter of Light.</p>
                            </div>
                        </div>
                        
                        <div class="carousel-slide">
                            <div class="p-4 text-center">
                                <p class="text-center font-bold text-black mt-4">Max</p>
                                <br>
                                <img src="../images/SHELTER OF LIGHT/ABOUT US PAGE/Adoption Stories/Dogs/Max.png" alt="Max" class="mx-auto h-48 lg:h-60 object-cover rounded-lg mb-2">
                                <br>
                                <p class="text-sm text-gray-700">Max was a severely neglected owned dog, found with a chain deeply embedded in his neck—likely worn for a long time. The wound caused muscle trauma and immense pain. Despite weeks of treatment and care, his body eventually gave up. Max's story is a powerful reminder of the cruelty silence can hide.</p>
                            </div>
                        </div>
                        
                        <div class="carousel-slide">
                            <div class="p-4 text-center">
                                <p class="text-center font-bold text-black mt-4">Chou</p>
                                <br>
                                <img src="../images/SHELTER OF LIGHT/ABOUT US PAGE/Adoption Stories/Dogs/Chou.png" alt="Chou" class="mx-auto h-48 lg:h-60 object-cover rounded-lg mb-2">
                                <br>
                                <p class="text-sm text-gray-700">Chou was a puppy owned by a tenant in our house. She became close to us so when she suddenly got sick and the owners refused to help her, we brought her to the vet. Unfortunately, it was too late and she died due to possible toxicosis and/or canine coronavirus.</p>
                            </div>
                        </div>
                        
                        <!-- Navigation Buttons -->
                        <button class="carousel-prev absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-1 rounded-full">❮</button>
                        <button class="carousel-next absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-1 rounded-full">❯</button>
                    </div>
                </section>
            </div>
        </section>
    </main>

 <!-- Footer -->
<hr class="border-t border-[#00000033] w-full my-0">
<footer class="full-width-section bg-[#FFFBE9] text-[#5F4B32] py-6">
    <div class="container mx-auto px-4 lg:px-6">
        <div class="flex flex-col lg:flex-row justify-between items-center gap-4 text-center lg:text-left">
            
            <!-- Contact Info -->
            <div class="order-2 lg:order-1 flex flex-col items-center lg:items-start gap-2">
                <p class="font-bold whitespace-nowrap">GET IN TOUCH WITH US</p>
                <div class="flex justify-center gap-4">
                    <!-- Social media icons -->
                    <a href="https://web.facebook.com/shelteroflightph" class="text-[#5F4B32] hover:text-[#FFBB00]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/shelteroflightph?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="text-[#5F4B32] hover:text-[#FFBB00]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="https://x.com/shelteroflight" class="text-[#5F4B32] hover:text-[#FFBB00]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                        </svg>
                    </a>
                    <a href="https://www.youtube.com/@shelteroflightph" class="text-[#5F4B32] hover:text-[#FFBB00]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="order-1 lg:order-2">
                <p>&copy; Shelter of Light. All Rights Reserved.</p>
            </div>
            
            <!-- Creators -->
            <div class="order-3 text-center lg:text-right">
                <p class="font-bold whitespace-nowrap">CREATORS OF THIS WEBSITE</p>
                <p class="whitespace-nowrap">BRIONES | CABANADA | LIZEN<br>UST</p>
            </div>
            
        </div>
    </div>
</footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });

            // Initialize all carousels
            document.querySelectorAll('[id$="-carousel"]').forEach(carousel => {
                const slides = carousel.querySelectorAll('.carousel-slide');
                const prevBtn = carousel.querySelector('.carousel-prev');
                const nextBtn = carousel.querySelector('.carousel-next');
                let currentIndex = 0;

                function showSlide(index) {
                    // Validate index
                    if (index < 0) index = slides.length - 1;
                    if (index >= slides.length) index = 0;
                    
                    // Hide all slides
                    slides.forEach(slide => {
                        slide.classList.remove('active');
                    });
                    
                    // Show current slide
                    slides[index].classList.add('active');
                    currentIndex = index;
                }

                // Previous button click handler
                prevBtn.addEventListener('click', () => {
                    showSlide(currentIndex - 1);
                });

                // Next button click handler
                nextBtn.addEventListener('click', () => {
                    showSlide(currentIndex + 1);
                });

                // Initialize with first slide
                showSlide(0);
            });
        });
    </script>
</body>
</html>