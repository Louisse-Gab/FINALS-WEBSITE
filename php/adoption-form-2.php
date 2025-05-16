<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Adoption Form - Personal Info | Shelter of Light</title>
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
        <a href="what-we-do.php" class="hover:text-[#FFBB00]">What We Do</a>
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
    <form action="adoption-form-3.php" method="post" class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-8">
      <div class="flex justify-between items-center mb-8">
        <a href="adoption-form-1.php" class="text-[#FFBB00] hover:text-[#FFA000] font-bold flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
          </svg>
          Back
        </a>
        <div class="text-sm text-gray-600">Step 1 of 5</div>
      </div>
      
      <h1 class="text-3xl font-bold mb-6">Personal Information</h1>
      <p class="mb-8 text-gray-600">This section is all about you, the potential adopter. Please provide accurate information to help us process your application.</p>
      
      <div class="space-y-6">
        <div>
          <label for="fullName" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
          <input type="text" id="fullName" name="fullName" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#FFBB00] focus:border-[#FFBB00]">
        </div>
        
        <div>
          <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Complete Address</label>
          <textarea id="address" name="address" rows="3" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#FFBB00] focus:border-[#FFBB00]"></textarea>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
            <input type="tel" id="phone" name="phone" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#FFBB00] focus:border-[#FFBB00]">
          </div>
          <div>
            <label for="age" class="block text-sm font-medium text-gray-700 mb-1">Age</label>
            <input type="number" id="age" name="age" min="21" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#FFBB00] focus:border-[#FFBB00]">
            <p class="text-xs text-gray-500 mt-1">You must be at least 21 years old</p>
          </div>
        </div>
        
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
          <input type="email" id="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#FFBB00] focus:border-[#FFBB00]">
        </div>
        
        <div>
          <label for="socialMedia" class="block text-sm font-medium text-gray-700 mb-1">Social Media Accounts (Optional)</label>
          <input type="text" id="socialMedia" name="socialMedia" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#FFBB00] focus:border-[#FFBB00]" placeholder="e.g., Facebook, Instagram usernames">
        </div>
        
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Employment Information</label>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="jobTitle" class="block text-xs font-medium text-gray-500 mb-1">Job Title</label>
              <input type="text" id="jobTitle" name="jobTitle" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#FFBB00] focus:border-[#FFBB00]">
            </div>
            <div>
              <label for="employer" class="block text-xs font-medium text-gray-500 mb-1">Employer</label>
              <input type="text" id="employer" name="employer" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#FFBB00] focus:border-[#FFBB00]">
            </div>
          </div>
        </div>
      </div>
      
      <div class="flex justify-between mt-12">
        <a href="adoption-form-1.php" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-6 rounded-lg transition duration-300 inline-flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
          </svg>
          Back
        </a>
        <button type="submit" class="bg-[#FFBB00] hover:bg-[#FFA000] text-white font-bold py-2 px-6 rounded-lg transition duration-300 inline-flex items-center">
          Next
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        </button>
      </div>
    </form>
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