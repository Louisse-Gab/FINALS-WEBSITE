<?php
require_once '../connection.php';

session_start();

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header('Location: ../php/home.php');
    exit();
}

$currentPage = 'adopt';

$navItems = [
    ['name' => 'Home', 'url' => 'home.php', 'active' => $currentPage === 'home'],
    ['name' => 'About Us', 'url' => 'about.php', 'active' => $currentPage === 'about'],
    ['name' => 'What We Do', 'url' => 'what-we-do.php', 'active' => $currentPage === 'what-we-do'],
    ['name' => 'Donate', 'url' => 'donate.php', 'active' => $currentPage === 'donate'],
    ['name' => 'Adopt', 'url' => 'adopt.php', 'active' => $currentPage === 'adopt'],
    ['name' => 'Contact', 'url' => 'contact.php', 'active' => $currentPage === 'contact']
];

$success = false;
$errorMsg = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'] ?? null; 
    $adoptionProcess = $_POST['adoption_process'] ?? '';
    $informationTruth = $_POST['information_truth'] ?? '';
    $agreement = isset($_POST['agreement']) ? 'agree' : '';
    $dataPrivacy = isset($_POST['data_privacy']) ? 'agree' : '';

    if (!$id) {
        $errorMsg = "Record ID is missing.";
    } elseif (!$adoptionProcess || !$informationTruth || !$agreement || !$dataPrivacy) {
        $errorMsg = "Please answer all questions properly and agree to all terms to continue.";
    } else {
        $stmt = $conn->prepare("UPDATE adopt SET adoption_process = ?, information_truth = ?, agreement = ? WHERE id = ?");
        $stmt->bind_param("sssi", $adoptionProcess, $informationTruth, $agreement, $id);

        if ($stmt->execute()) {
            $success = true;
        } else {
            $errorMsg = "Database error: " . $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Adoption Agreement | Shelter of Light</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .modal-overlay {
      background: rgba(0, 0, 0, 0.6);
    }
  
    body.modal-open {
      overflow: hidden;
    }
    body.modal-open main,
    body.modal-open header,
    body.modal-open footer {
      filter: blur(5px);
      transition: filter 0.3s ease;
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
    .privacy-notice {
      background-color: #f8f9fa;
      padding: 15px;
      border-radius: 5px;
      margin: 15px 0;
      max-height: 200px;
      overflow-y: auto;
      border: 1px solid #dee2e6;
    }
  </style>
</head>
<body class="bg-[#FFFBDE] text-gray-800 font-sans">

  <!-- Main Content -->
  <main class="container mx-auto px-6 py-8 agreement-container">

    <?php if (!empty($errorMsg)) : ?>
      <div class="max-w-600 mx-auto mb-4 p-4 bg-red-100 text-red-700 rounded">
        <?php echo htmlspecialchars($errorMsg); ?>
      </div>
    <?php endif; ?>

    <form id="adoption-agreement-form" method="POST" action="" class="agreement-form">
      <input type="hidden" name="id" value="<?php echo isset($_POST['id']) ? htmlspecialchars($_POST['id']) : (isset($_GET['id']) ? htmlspecialchars($_GET['id']) : ''); ?>">

      <h1 class="agreement-title text-2xl font-bold mb-6">ADOPTION AGREEMENT</h1>
      
      <div class="question">
        <label class="block mb-2 font-medium">Do you agree to undergo the adoption process in all its steps?</label>
        <div class="flex items-center mb-1">
          <input type="radio" id="process-yes" name="adoption_process" value="yes" class="mr-2" required
            <?php if (isset($_POST['adoption_process']) && $_POST['adoption_process'] === 'yes') echo 'checked'; ?>>
          <label for="process-yes">Yes</label>
        </div>
        <div class="flex items-center">
          <input type="radio" id="process-no" name="adoption_process" value="no" class="mr-2"
            <?php if (isset($_POST['adoption_process']) && $_POST['adoption_process'] === 'no') echo 'checked'; ?>>
          <label for="process-no">No</label>
        </div>
      </div>

      <div class="question">
        <label class="block mb-2 font-medium">Do you ensure that all the information that you have shared in this form and all the information you will share going forward will all be true?</label>
        <div class="flex items-center mb-1">
          <input type="radio" id="truth-yes" name="information_truth" value="yes" class="mr-2" required
            <?php if (isset($_POST['information_truth']) && $_POST['information_truth'] === 'yes') echo 'checked'; ?>>
          <label for="truth-yes">Yes</label>
        </div>
        <div class="flex items-center">
          <input type="radio" id="truth-no" name="information_truth" value="no" class="mr-2"
            <?php if (isset($_POST['information_truth']) && $_POST['information_truth'] === 'no') echo 'checked'; ?>>
          <label for="truth-no">No</label>
        </div>
      </div>

      <div class="question">
        <label class="block mb-2 font-medium">I understand that in the submission of this form, I am granting Shelter of Light to use my answers here for the sake of the adoption application process.</label>
        <div class="flex items-center">
          <input type="checkbox" id="agree" name="agreement" value="agree" class="mr-2" required
            <?php if (isset($_POST['agreement']) && $_POST['agreement'] === 'agree') echo 'checked'; ?>>
          <label for="agree">I agree</label>
        </div>
      </div>

      <div class="question">
        <label class="block mb-2 font-medium">Data Privacy Notice</label>
        <div class="privacy-notice">
          <p class="mb-2">Shelter of Light respects your privacy and is committed to protecting your personal data. By agreeing to this notice, you consent to:</p>
          <ul class="list-disc pl-5 mb-2">
            <li>The collection, use, and processing of your personal information for the purpose of processing your adoption application</li>
            <li>The storage of your data in our secure systems for as long as necessary to fulfill the purposes we collected it for</li>
            <li>The sharing of your information with relevant authorities if required by law</li>
            <li>Receiving communications from us regarding your application and other shelter-related matters</li>
          </ul>
          <p>We will not share your information with third parties for marketing purposes without your explicit consent.</p>
        </div>
        <div class="flex items-center mt-2">
          <input type="checkbox" id="data-privacy" name="data_privacy" value="agree" class="mr-2" required
            <?php if (isset($_POST['data_privacy']) && $_POST['data_privacy'] === 'agree') echo 'checked'; ?>>
          <label for="data-privacy">I agree to the Data Privacy Notice</label>
        </div>
      </div>

      <div class="buttons">
        <button type="button" class="agreement-button back" onclick="window.location.href='adoption-form-3.php'">BACK</button>
        <button type="submit" class="agreement-button submit" id="submit-button">SUBMIT</button>
      </div>
    </form>
  </main>

  
  <div id="thank-you-modal" class="thank-you-modal">
    <div class="modal-content">
      <h2 class="text-2xl font-bold mb-4">Thank You for Your Adoption Application!</h2>
      <p class="mb-4">We appreciate your interest in adopting from Shelter of Light. Our team will review your application and get back to you soon.</p>
  
      <button id="modal-exit-button" class="modal-exit-button">Exit</button>
    </div>
  </div>

  <script>
    document.getElementById('menu-button')?.addEventListener('click', function() {
      const menu = document.getElementById('mobile-menu');
      menu.classList.toggle('hidden');
    });

    document.getElementById('modal-exit-button').addEventListener('click', function() {
      document.getElementById('thank-you-modal').style.display = 'none';
      document.body.classList.remove('modal-open');
      window.location.href = 'home.php';
    });
  </script>

  <?php if ($success): ?>
  <script>
    window.onload = function() {
      document.getElementById('thank-you-modal').style.display = 'flex';
      document.body.classList.add('modal-open');
    };
  </script>
  <?php endif; ?>

</body>
</html>