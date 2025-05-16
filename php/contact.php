<?php
// shelter_of_light.php - Single file implementation

// Basic page variables
$pageTitle = "Shelter of Light";
$currentYear = date("Y");

// Navigation items with their URLs and active states
$navItems = [
    ["name" => "Home", "url" => "home.php", "active" => false],
    ["name" => "About Us", "url" => "about.php", "active" => false], // Changed from true to false
    ["name" => "What We Do", "url" => "what-we-do.php", "active" => false],
    ["name" => "Donate", "url" => "donate.php", "active" => false],
    ["name" => "Adopt", "url" => "adopt.php", "active" => false],
    ["name" => "Contact", "url" => "contact.php", "active" => true]  // Changed from false to true
];

// Contact information with links
$contactInfo = [
    ["label" => "CONTACT NUMBER", "value" => "+1 (123) 456-7890", "link" => "tel:+11234567890", "icon" => "phone"],
    ["label" => "EMAIL", "value" => "info@shelteroflight.org", "link" => "mailto:info@shelteroflight.org", "icon" => "mail"],
    ["label" => "INSTAGRAM", "value" => "@shelteroflight", "link" => "https://www.instagram.com/shelteroflightph?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==", "icon" => "instagram"],
    ["label" => "FACEBOOK/MESSENGER", "value" => "Shelter of Light", "link" => "https://web.facebook.com/shelteroflightph", "icon" => "facebook"]
];

// Website creators with full names
$creators = [
    ["name" => "Briones, Zyke", "image" => "../images/creators/briones.jpg"],
    ["name" => "Cabanada, Kristine", "image" => "../images/creators/cabanada.jpg"],
    ["name" => "Lizen, Louisse Gabrielle", "image" => "../images/creators/lizen.jpg"]
];

// Handle form submission (if you need form functionality)
$formSubmitted = false;
$formMessage = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["contact_submit"])) {
    $name = htmlspecialchars($_POST["name"] ?? "");
    $email = htmlspecialchars($_POST["email"] ?? "");
    $message = htmlspecialchars($_POST["message"] ?? "");
    
    // Simple validation
    if (!empty($name) && !empty($email) && !empty($message)) {
        // In a real application, you would process the form data here
        // For example, send an email or save to database
        $formSubmitted = true;
        $formMessage = "Thank you for your message. We will get back to you soon!";
    } else {
        $formMessage = "Please fill in all required fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <!-- Include Tailwind CSS from CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FFBB00',
                        secondary: '#FFFBE9',
                        accent: '#5F4B32',
                        footer: '#FFEBB9'
                    }
                }
            }
        }
    </script>
    <style>
 /* Contact card styles */
.contact-card {
    background-color: white;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0.5rem;
    padding: 2rem;
    margin: 2rem 0;
    text-align: center;
}

/* Contact image container */
.contact-image-container {
    width: 100%;
    max-width: 300px;
    margin: 0 auto 2rem;
    border-radius: 8px;
    overflow: hidden;
}

/* Contact icons container with improved spacing */
.contact-icons {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    width: 100%;
    margin: 0 auto;
    padding: 0;
}

.contact-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 22%;
    min-width: 100px;
    padding: 0 5px;
}

.contact-icon-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    width: 100%;
}

a.contact-icon-wrapper {
    color: #000;
    text-decoration: none;
    transition: color 0.3s;
}

a.contact-icon-wrapper:hover {
    color: #FFBB00;
}

.contact-icon {
    width: 40px;
    height: 40px;
    margin-bottom: 0.5rem;
}

.contact-detail {
    font-size: 0.8rem;
    margin-top: 0.25rem;
    word-break: break-word;
    color: #666;
    max-width: 100%;
    text-align: center;
}

.font-medium {
    font-weight: 500;
    margin-bottom: 0.25rem;
}

/* For mobile screens, adjust the layout */
@media (max-width: 768px) {
    .contact-icons {
        flex-wrap: wrap;
        justify-content: center;
        gap: 2rem;
    }
    
    .contact-item {
        width: 40%;
        min-width: 120px;
        margin-bottom: 1.5rem;
    }
}

@media (max-width: 480px) {
    .contact-item {
        width: 45%;
    }
}
        
        /* Creator profile image styles */
        .profile-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #FFBB00;
        }
        
        /* Contact image container */
        .contact-image-container {
            width: 100%;
            max-width: 300px;
            margin: 0 auto 2rem;
            border-radius: 8px;
            overflow: hidden;
        }
        
        /* Arrow link styles */
        .arrow-link {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #000;
            transition: color 0.3s;
        }
        
        .arrow-link:hover {
            color: #FFBB00;
        }
    </style>
</head>
<body class="bg-[#FFFBDE]">
    <!-- Header with original navigation placement -->
    <header class="bg-[#FFFBE9] shadow-md border-b border-[#00000033]">
        <div class="container mx-auto flex justify-between items-center px-4 lg:px-6 py-4 lg:py-6">
            <a href="home.php" class="flex items-center space-x-2 lg:space-x-5">
                <img src="../images/SHELTER OF LIGHT/SOL-LOGO.png" alt="Logo" class="w-10 h-10 lg:w-16 lg:h-16">
                <h1 class="text-xl lg:text-3xl font-bold text-black">Shelter of Light</h1>
            </a>
            
            <!-- Desktop Navigation -->
            <nav class="desktop-nav space-x-4 lg:space-x-8 text-sm lg:text-base uppercase font-bold">
                <?php foreach ($navItems as $item): ?>
                    <a href="<?php echo $item['url']; ?>" class="<?php echo $item['active'] ? 'text-[#FFBB00]' : 'hover:text-[#FFBB00]'; ?>">
                        <?php echo $item['name']; ?>
                    </a>
                <?php endforeach; ?>
            </nav>
            
            <!-- Search Icon -->
            <div class="flex items-center space-x-4">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:h-7 lg:w-7 text-black hover:text-[#FFBB00]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.75-4.4a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Contact Info Section - Centered text and clickable arrow -->
    <div class="full-width-section bg-[#FFF2CD] py-5 lg:py-5">
        <div class="container mx-auto px-4 lg:px-6 flex items-center justify-between">
            <div class="w-6"></div> <!-- Empty div for spacing -->
            <h2 class="text-lg font-medium text-center">FOR INQUIRIES, MESSAGE US ON ANY OF THE FOLLOWING:</h2>
            <a href="home.php" class="arrow-link">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
        </div>
    </div>

   <!-- Contact Card with Image Container and Side-by-Side Icons -->
<section class="py-8">
    <div class="container mx-auto px-4 lg:px-6">
        <!-- Contact Card -->
        <div class="bg-white border border-gray-200/50 rounded-lg p-8 my-8 text-center overflow-hidden">
            <!-- Contact Image Container -->
            <div class="w-full max-w-[300px] mx-auto mb-8 rounded-lg overflow-hidden">
                <img src="../images/contact/contact-image.jpg" alt="Contact Us" class="w-full h-auto" onerror="this.src='https://via.placeholder.com/300x200/FFBB00/ffffff?text=Contact+Us'">
            </div>
            
            <!-- Contact Icons Container Wrapper -->
            <div class="w-full overflow-x-auto">
                <!-- Contact Information with Icons Side by Side -->
                <div class="flex justify-around items-start w-full min-w-[600px] md:min-w-0 px-4">
                    <!-- Phone - Not clickable -->
                    <div class="flex-1 flex flex-col items-center px-2.5 max-w-[150px] md:max-w-none">
                        <div class="flex flex-col items-center text-center w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mb-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span class="font-medium text-sm mb-1 whitespace-nowrap">CONTACT NUM</span>
                            <span class="text-xs mt-1 text-gray-600 break-words text-center">0977 211 9959</span>
                        </div>
                    </div>
                    
                    <!-- Email - Not clickable -->
                    <div class="flex-1 flex flex-col items-center px-2.5 max-w-[150px] md:max-w-none">
                        <div class="flex flex-col items-center text-center w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mb-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="font-medium text-sm mb-1 whitespace-nowrap">EMAIL</span>
                            <span class="text-xs mt-1 text-gray-600 break-words text-center">shelteroflightph@gmail.com</span>
                        </div>
                    </div>
                    
                    <!-- Instagram - Clickable with updated link -->
                    <div class="flex-1 flex flex-col items-center px-2.5 max-w-[150px] md:max-w-none">
                        <a href="https://www.instagram.com/shelteroflightph?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener noreferrer" class="flex flex-col items-center text-center w-full text-black hover:text-[#FFBB00] transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mb-2 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                            <span class="font-medium text-sm mb-1 whitespace-nowrap">IG</span>
                        </a>
                    </div>
                    
                    <!-- Facebook - Clickable with updated link -->
                    <div class="flex-1 flex flex-col items-center px-2.5 max-w-[150px] md:max-w-none">
                        <a href="https://web.facebook.com/shelteroflightph" target="_blank" rel="noopener noreferrer" class="flex flex-col items-center text-center w-full text-black hover:text-[#FFBB00] transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mb-2 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                            </svg>
                            <span class="font-medium text-sm mb-1 whitespace-nowrap">FB/MESSENGER</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Creators Section with Circular Profile Pictures -->
<section class="py-12 bg-[#FFFBDE]">
    <div class="container mx-auto px-4 lg:px-6">
        <h2 class="text-3xl font-bold text-center mb-12 text-[#5F4B32]">CREATORS OF THIS WEBSITE</h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
            <!-- Creator 1: Briones, Zyke -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-[#FFEBB9] hover:shadow-lg transition-shadow duration-300">
                <div class="p-6 flex flex-col items-center">
                    <div class="mb-6 w-40 h-40 rounded-full overflow-hidden border-4 border-[#FFBB00] shadow-md">
                        <img src="../images/SHELTER OF LIGHT/CREATORS/BRIONES.jpg" 
                             alt="Briones, Zyke" 
                             class="w-full h-full object-cover"
                             onerror="this.src='https://ui-avatars.com/api/?name=Zyke&background=FFBB00&color=fff&size=400'">
                    </div>
                    <h3 class="text-xl font-bold text-center text-[#5F4B32]">Briones, Zyke</h3>
                    <p class="text-[#8A7B68] mt-2 text-center">Web Developer</p>
                </div>
            </div>

            <!-- Creator 2: Cabanada, Kristine -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-[#FFEBB9] hover:shadow-lg transition-shadow duration-300">
                <div class="p-6 flex flex-col items-center">
                    <div class="mb-6 w-40 h-40 rounded-full overflow-hidden border-4 border-[#FFBB00] shadow-md">
                        <img src="../images/SHELTER OF LIGHT/CREATORS/CABANADA.jpg" 
                             alt="Cabanada, Kristine" 
                             class="w-full h-full object-cover"
                             onerror="this.src='https://ui-avatars.com/api/?name=Kristine&background=FFBB00&color=fff&size=400'">
                    </div>
                    <h3 class="text-xl font-bold text-center text-[#5F4B32]">Cabanada, Kristine</h3>
                    <p class="text-[#8A7B68] mt-2 text-center">Web Developer</p>
                </div>
            </div>

            <!-- Creator 3: Lizen, Louisse Gabrielle -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-[#FFEBB9] hover:shadow-lg transition-shadow duration-300">
                <div class="p-6 flex flex-col items-center">
                    <div class="mb-6 w-40 h-40 rounded-full overflow-hidden border-4 border-[#FFBB00] shadow-md">
                        <img src="../images/SHELTER OF LIGHT/CREATORS/LIZEN.jpg" 
                             alt="Lizen, Louisse Gabrielle" 
                             class="w-full h-full object-cover"
                             onerror="this.src='https://ui-avatars.com/api/?name=Louisse&background=FFBB00&color=fff&size=400'">
                    </div>
                    <h3 class="text-xl font-bold text-center text-[#5F4B32]">Lizen, Louisse Gabrielle</h3>
                    <p class="text-[#8A7B68] mt-2 text-center">Web Developer</p>
                </div>
            </div>
        </div>
    </div>
</section>

      <!-- Footer -->
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

    <?php if (!empty($formMessage)): ?>
    <div id="message" style="position: fixed; bottom: 20px; right: 20px; background-color: <?php echo $formSubmitted ? '#4CAF50' : '#f44336'; ?>; color: white; padding: 15px; border-radius: 4px; box-shadow: 0 2px 10px rgba(0,0,0,0.2);">
        <?php echo $formMessage; ?>
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('message').style.display = 'none';
        }, 5000);
    </script>
    <?php endif; ?>
</body>
</html>