<?php
  require_once '../connection.php';

  session_start();

// pag walang nakalogin at binago sa url eto ang ma eexecute nya 
if (!isset($_SESSION['username'])) {
    header('Location: ../php/home.php');
    exit();
}

  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $fullname = $_POST['fullName'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $socialMedia = $_POST['socialMedia'];
    $jobTitle = $_POST['jobTitle'];
    $age = $_POST['age'];
    $employer = $_POST['employer'];
    $status = 'For Verification';

    $query = $conn->prepare('INSERT INTO adopt (fullName, address, phone, email, socialMedia, jobTitle, age, employer, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $query->bind_param('sssssssss', $fullname, $address, $phone, $email, $socialMedia, $jobTitle, $age, $employer, $status);
    
    if($query->execute() === TRUE){
      $last_id = $conn->insert_id;
      header("Location: adoption-form-3.php?id=" . $last_id);
      exit();
    }
}
?>

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


  <!-- Main Content -->
  <main class="container mx-auto px-6 py-12">
    <form action="" method="post" class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-8">
     <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? htmlspecialchars($_GET['id']) : (isset($_POST['id']) ? htmlspecialchars($_POST['id']) : ''); ?>">
      
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

</body>
</html>