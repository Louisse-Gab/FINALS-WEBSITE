<?php
class PetAdoptionSystem {
    private $currentPage;
    private $navItems;
    private $dbConnection;
    
    public function __construct($page = 'donate') {
        $this->currentPage = $page;
        $this->initializeNavigation();
        $this->dbConnection = $this->connectToDatabase();
    }
    
    private function initializeNavigation() {
        $this->navItems = [
            ['name' => 'Home', 'url' => 'home.php', 'active' => $this->currentPage === 'home'],
            ['name' => 'About Us', 'url' => 'about.php', 'active' => $this->currentPage === 'about'],
            ['name' => 'What We Do', 'url' => 'what-we-do.php', 'active' => $this->currentPage === 'what-we-do'],
            ['name' => 'Donate', 'url' => 'donate.php', 'active' => $this->currentPage === 'donate'],
            ['name' => 'Adopt', 'url' => 'adopt.php', 'active' => $this->currentPage === 'adopt'],
            ['name' => 'Contact', 'url' => 'contact.php', 'active' => $this->currentPage === 'contact']
        ];
    }
    
    private function connectToDatabase() {
        require_once('../connection.php');
        return $conn;
    }
    
    public function getPets($type = null) {
        $query = "SELECT id, pet_name, description, type, pet_age, pet_breed, pet_gender, pet_vacinated FROM pets";
        if ($type) {
            $query .= " WHERE type = '" . $this->dbConnection->real_escape_string($type) . "'";
        }
        
        $result = $this->dbConnection->query($query);
        $pets = [];
        
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $pets[] = $row;
            }
        } else {
            die("Query failed: " . $this->dbConnection->error);
        }
        
        return $pets;
    }
    
    public function renderHeader() {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1" />
          <title>Adopt a Cat | Shelter of Light</title>
          <script src="https://cdn.tailwindcss.com"></script>
          <style>
            /* Modal background overlay */
            .modal-overlay {
              background: rgba(0, 0, 0, 0.6);
            }
            
            /* Blur effect when modal is open */
            body.modal-open {
              overflow: hidden;
            }
            body.modal-open main,
            body.modal-open header,
            body.modal-open footer {
              filter: blur(5px);
              transition: filter 0.3s ease;
            }
            
            /* Media queries */
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

          </style>
        </head>
        <body class="bg-[#FFFBDE] text-gray-800 font-sans">

        <!-- Improved Responsive Header -->
        <header class="bg-[#FFFBE9] shadow-md border-b border-[#00000033]">
          <div class="container mx-auto flex justify-between items-center px-4 lg:px-6 py-4 lg:py-6">
            <a href="home.php" class="flex items-center space-x-2 lg:space-x-5">
              <img src="../images/SHELTER OF LIGHT/SOL-LOGO.png" alt="Logo" class="w-10 h-10 lg:w-16 lg:h-16">
              <h1 class="text-xl lg:text-3xl font-bold text-black">Shelter of Light</h1>
            </a>
            
            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex space-x-8 text-base uppercase font-bold">
              <a href="home.php" class="hover:text-[#FFBB00]">Home</a>
              <a href="about.php" class="hover:text-[#FFBB00]">About Us</a>
              <a href="../php/whatwedo/whatwedo.php" class="hover:text-[#FFBB00]">What We Do</a>
              <a href="donate.php" class="hover:text-[#FFBB00]">Donate</a>
              <a href="adopt.php" class="text-[#FFBB00] hover:text-black">Adopt</a>
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
          </div>
          
          <!-- Mobile Menu (Dropdown) -->
          <div id="mobile-menu" class="hidden lg:hidden bg-[#FFFBE9] absolute w-full z-10 shadow-md">
            <div class="container mx-auto px-4">
              <div class="flex flex-col space-y-3 text-sm uppercase font-bold py-4">
                <a href="home.php" class="hover:text-[#FFBB00] py-2 border-b border-gray-200">Home</a>
                <a href="about.php" class="hover:text-[#FFBB00] py-2 border-b border-gray-200">About Us</a>
                <a href="../php/whatwedo/whatwedo.php" class="hover:text-[#FFBB00] py-2 border-b border-gray-200">What We Do</a>
                <a href="donate.php" class="hover:text-[#FFBB00] py-2 border-b border-gray-200">Donate</a>
                <a href="adopt.php" class="text-[#FFBB00] hover:text-black py-2 border-b border-gray-200">Adopt</a>
                <a href="contact.php" class="hover:text-[#FFBB00] py-2">Contact</a>
              </div>
            </div>
          </div>
        </header>
        <?php
    }
    
    public function renderPetSection($title, $pets) {
        ?>
        <!-- Orange Container with Statement and Arrow -->
        <div class="full-width-section bg-[#FFF2CD] py-5 lg:py-5 border-b border-[#00000033]">
            <div class="container mx-auto px-4 lg:px-6 flex items-center justify-between">
                <div class="w-6"></div> <!-- Empty div for spacing -->
                <h2 class="text-xl lg:text-2xl font-bold mb-2 lg:mb-3 text-center"><?= strtoupper($title) ?></h2>
                <a href="home.php" class="arrow-link text-black hover:text-[#FFBB00]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Added margin-top here for spacing below the header -->
        <div class="mt-8 mb-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <?php foreach ($pets as $pet): ?>
                    <div class="bg-white border border-gray-300 rounded-md p-4 text-center shadow-sm hover:shadow-md transition">
                        <img src="../adminphp/plist.php?id=<?= $pet['id'] ?>" alt="<?= htmlspecialchars($pet['pet_name']) ?>"
                            class="w-32 h-32 object-cover rounded-full mx-auto mb-4" />
                        <p class="font-semibold text-sm text-gray-800"><?= htmlspecialchars($pet['pet_name']) ?></p>
                        <p class="text-xs text-gray-600"><?= htmlspecialchars(mb_strimwidth($pet['description'], 0, 100, '...')) ?></p>
                        <button class="mt-4 bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500"
                            onclick="openModal(this)" data-name="<?= htmlspecialchars($pet['pet_name']) ?>"
                            data-img="../adminphp/plist.php?id=<?= $pet['id'] ?>.jpg" data-age="<?= htmlspecialchars($pet['pet_age']) ?>"
                            data-breed="<?= htmlspecialchars($pet['pet_breed']) ?>"
                            data-gender="<?= htmlspecialchars($pet['pet_gender']) ?>"
                            data-vaccine="<?= htmlspecialchars($pet['pet_vacinated']) ?>"
                            data-description="<?= htmlspecialchars($pet['description']) ?>">
                            SEE DETAILS
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
    
    public function renderModal() {
        ?>
        <div id="pet-modal" class="modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-60 hidden z-50">
            <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative">
                <button aria-label="Close modal" onclick="closeModal()"
                    class="absolute top-3 right-3 text-gray-600 hover:text-gray-900 text-2xl font-bold">&times;</button>
                <div class="flex flex-col items-center">
                    <img id="modal-img" src="" alt="Pet Image" class="w-48 h-48 object-cover rounded-full mb-4">
                    <h3 id="modal-name" class="text-xl font-bold mb-2">Pet Name</h3>
                    <div class="text-left w-full">
                        <p class="text-gray-700 mb-2"><span class="font-semibold">Age:</span> <span id="modal-age"></span></p>
                        <p class="text-gray-700 mb-2"><span class="font-semibold">Breed:</span> <span id="modal-breed"></span></p>
                        <p class="text-gray-700 mb-2"><span class="font-semibold">Gender:</span> <span id="modal-gender"></span></p>
                        <p class="text-gray-700 mb-2"><span class="font-semibold">Vaccinated:</span> <span id="modal-vaccine"></span>
                        </p>
                        <p class="text-gray-700 mb-4 text-justify" id="modal-description">Description here.</p>
                        <a href="adoptlogin.php"
                            class="block bg-[#FFBB00] text-white font-bold px-4 py-2 rounded hover:bg-yellow-500 w-full text-center">Adopt
                            Me</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    
    public function renderFooter() {
        ?>
        <!-- Space Below -->
        <div class="h-12"></div>
        
        </div>

        <!-- Horizontal line above footer -->
        <hr class="border-t border-[#00000033] w-full my-0">

        <!-- Footer -->
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
                const menuButton = document.getElementById('mobile-menu-button');
                const mobileMenu = document.getElementById('mobile-menu');
                const hamburgerIcon = document.getElementById('hamburger-icon');
                
                // Toggle mobile menu
                menuButton.addEventListener('click', function() {
                    // Toggle mobile menu visibility
                    mobileMenu.classList.toggle('hidden');
                    mobileMenu.classList.toggle('block');
                    
                    // Toggle animation classes
                    mobileMenu.classList.toggle('open');
                    hamburgerIcon.classList.toggle('active');
                });
                
                // Close menu when clicking a link
                const mobileLinks = mobileMenu.querySelectorAll('a');
                mobileLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        mobileMenu.classList.add('hidden');
                        mobileMenu.classList.remove('block', 'open');
                        hamburgerIcon.classList.remove('active');
                    });
                });
                
                // Close menu when window is resized to desktop size
                window.addEventListener('resize', function() {
                    if (window.innerWidth >= 1024) {
                        mobileMenu.classList.add('hidden');
                        mobileMenu.classList.remove('block', 'open');
                        hamburgerIcon.classList.remove('active');
                    }
                });
            });
            // Mobile menu functionality
            const menuButton = document.getElementById('menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            if (menuButton && mobileMenu) {
                menuButton.addEventListener('click', function(e) {
                    e.stopPropagation(); // Prevent this click from triggering the document click handler
                    // Toggle menu visibility
                    mobileMenu.classList.toggle('hidden');
                    
                    // Toggle aria-expanded for accessibility
                    const isExpanded = this.getAttribute('aria-expanded') === 'true';
                    this.setAttribute('aria-expanded', !isExpanded);
                });

                // Close mobile menu when clicking outside
                document.addEventListener('click', function(event) {
                    if (!menuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                        mobileMenu.classList.add('hidden');
                        menuButton.setAttribute('aria-expanded', 'false');
                    }
                });
            }
        

                // Close mobile menu when clicking outside
                document.addEventListener('click', function(event) {
                    if (!menuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                        mobileMenu.classList.add('hidden');
                        menuButton.setAttribute('aria-expanded', 'false');
                    }
                });
            

            // Close modal when clicking outside
            window.addEventListener('click', function(event) {
                if (event.target.classList.contains('modal')) {
                    document.body.classList.remove('modal-open');
                    event.target.classList.add('hidden');
                }
            });

            
        </script>
        <script>
            function openModal(button) {
                const modal = document.getElementById('pet-modal');

                document.getElementById('modal-img').src = button.dataset.img;
                document.getElementById('modal-name').textContent = button.dataset.name;
                document.getElementById('modal-age').textContent = button.dataset.age;
                document.getElementById('modal-breed').textContent = button.dataset.breed;
                document.getElementById('modal-gender').textContent = button.dataset.gender;
                document.getElementById('modal-vaccine').textContent = button.dataset.vaccine;
                document.getElementById('modal-description').textContent = button.dataset.description;

                modal.classList.remove('hidden');
            }

            function closeModal() {
                document.getElementById('pet-modal').classList.add('hidden');
            }
        </script>
        </body>
        </html>
        <?php
    }
}

// Usage
$adoptionSystem = new PetAdoptionSystem('adopt');
$adoptionSystem->renderHeader();

$cats = $adoptionSystem->getPets('cat');
$adoptionSystem->renderPetSection('Adopt a Cat', $cats);

$dogs = $adoptionSystem->getPets('dog');
$adoptionSystem->renderPetSection('Adopt a Dog', $dogs);

$adoptionSystem->renderModal();
$adoptionSystem->renderFooter();
?>