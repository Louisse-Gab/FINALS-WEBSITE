<?php
// Define the current page
$currentPage = 'adopt';

// Navigation items
$navItems = [
    ['name' => 'Home', 'url' => 'home.php', 'active' => $currentPage === 'home'],
    ['name' => 'About Us', 'url' => 'about.php', 'active' => $currentPage === 'about'],
    ['name' => 'What We Do', 'url' => 'what-we-do.php', 'active' => $currentPage === 'what-we-do'],
    ['name' => 'Donate', 'url' => 'donate.php', 'active' => $currentPage === 'donate'],
    ['name' => 'Adopt', 'url' => 'adopt.php', 'active' => $currentPage === 'adopt'],
    ['name' => 'Contact', 'url' => 'contact.php', 'active' => $currentPage === 'contact']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Adoption Agreement | Shelter of Light</title>
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
    
    /* Agreement form styles */
    .agreement-container {
      font-family: Arial, sans-serif;
      color: #333;
      margin: 0;
    }
    .agreement-form {
      max-width: 600px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .agreement-title {
      text-align: center;
      color: #000;
    }
    .question {
      margin: 20px 0;
    }
    .buttons {
      display: flex;
      justify-content: space-between;
      margin-top: 30px;
    }
    .agreement-button {
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }
    .submit {
      background-color: #FBBF24;
      color: white;
    }
    .back {
      background-color: #ccc;
    }
    
    /* Thank you modal styles */
    .thank-you-modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.7);
      z-index: 1000;
      justify-content: center;
      align-items: center;
    }
    .modal-content {
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      text-align: center;
      max-width: 500px;
      width: 90%;
    }
    .modal-content img {
      max-width: 100%;
      height: auto;
      margin: 20px 0;
      border-radius: 8px;
    }
    .modal-exit-button {
      background-color: #FBBF24;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      margin-top: 15px;
    }
  </style>
</head>
<body class="bg-[#FFFBDE] text-gray-800 font-sans">

  <!-- Main Content -->
  <main class="container mx-auto px-6 py-8 agreement-container">
    <form id="adoption-agreement-form" class="agreement-form">
      <h1 class="agreement-title text-2xl font-bold mb-6">ADOPTION AGREEMENT</h1>
      
      <div class="question">
        <label class="block mb-2 font-medium">Do you agree to undergo the adoption process in all its steps?</label>
        <div class="flex items-center mb-1">
          <input type="radio" id="process-yes" name="adoption_process" value="yes" class="mr-2" required>
          <label for="process-yes">Yes</label>
        </div>
        <div class="flex items-center">
          <input type="radio" id="process-no" name="adoption_process" value="no" class="mr-2">
          <label for="process-no">No</label>
        </div>
      </div>

      <div class="question">
        <label class="block mb-2 font-medium">Do you ensure that all the information that you have shared in this form and all the information you will share going forward will all be true?</label>
        <div class="flex items-center mb-1">
          <input type="radio" id="truth-yes" name="information_truth" value="yes" class="mr-2" required>
          <label for="truth-yes">Yes</label>
        </div>
        <div class="flex items-center">
          <input type="radio" id="truth-no" name="information_truth" value="no" class="mr-2">
          <label for="truth-no">No</label>
        </div>
      </div>

      <div class="question">
        <label class="block mb-2 font-medium">I understand that in the submission of this form, I am granting Shelter of Light to use my answers here for the sake of the adoption application process.</label>
        <div class="flex items-center mb-1">
          <input type="checkbox" id="agree" name="agreement" value="agree" class="mr-2" required>
          <label for="agree">Agree</label>
        </div>
        <div class="flex items-center">
          <input type="checkbox" id="disagree" name="agreement" value="disagree" class="mr-2">
          <label for="disagree">Disagree</label>
        </div>
      </div>

      <div class="buttons">
        <button type="button" class="agreement-button back" onclick="window.location.href='adoption-form-3.php'">BACK</button>
        <button type="submit" class="agreement-button submit" id="submit-button">SUBMIT</button>
      </div>
    </form>
  </main>

  <!-- Thank You Modal -->
  <div id="thank-you-modal" class="thank-you-modal">
    <div class="modal-content">
      <h2 class="text-2xl font-bold mb-4">Thank You for Your Adoption Application!</h2>
      <p class="mb-4">We appreciate your interest in adopting from Shelter of Light. Our team will review your application and get back to you soon.</p>
  
      
      <button id="modal-exit-button" class="modal-exit-button">Exit</button>
    </div>
  </div>

  <script>
    // Mobile menu toggle
    document.getElementById('menu-button')?.addEventListener('click', function() {
      const menu = document.getElementById('mobile-menu');
      menu.classList.toggle('hidden');
    });

    // Form submission and modal handling
    document.getElementById('adoption-agreement-form').addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Validate the form
      const adoptionProcess = document.querySelector('input[name="adoption_process"]:checked');
      const informationTruth = document.querySelector('input[name="information_truth"]:checked');
      const agreement = document.querySelector('input[name="agreement"]:checked');
      
      if (!adoptionProcess || !informationTruth || !agreement) {
        alert('Please answer all questions before submitting.');
        return false;
      }
      
      // Show the thank you modal
      document.getElementById('thank-you-modal').style.display = 'flex';
      document.body.classList.add('modal-open');
      
      // Optional: You could submit the form data to the server here
      // using fetch() or XMLHttpRequest
    });

    // Modal exit button
    document.getElementById('modal-exit-button').addEventListener('click', function() {
      document.getElementById('thank-you-modal').style.display = 'none';
      document.body.classList.remove('modal-open');
      window.location.href = 'home.php';
    });
  </script>
</body>
</html>