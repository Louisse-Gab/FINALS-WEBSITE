<?php
require_once '../connection.php';

session_start();

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header('Location: ../php/home.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id']; 
    $desiredPet = isset($_POST['desiredPet']) ? $_POST['desiredPet'] : '';
    $whyAdopt = $_POST['whyAdopt'];
    $primaryCaregiver = $_POST['primaryCaregiver'];
    $whyNow = $_POST['whyNow'];

    if (!empty($id)) {
        $query = $conn->prepare("UPDATE adopt SET desiredpet = ?, whyAdopt = ?, primaryCaregiver = ?, whyNow = ? WHERE id = ?");
        $query->bind_param("ssssi", $desiredPet, $whyAdopt, $primaryCaregiver, $whyNow, $id);

        if ($query->execute()) {
            header("Location: adoption-form-4.php?id=" . $id);
            exit();
        } else {
            echo "Update failed: " . $query->error;
        }
    } else {
        echo "ID is missing. Cannot update record.";
    }
}

// Get the ID from GET or POST
$id = isset($_POST['id']) ? $_POST['id'] : (isset($_GET['id']) ? $_GET['id'] : '');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Adoption Form - Desired Pet | Shelter of Light</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .card-hover:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-[#FFFBDE] text-gray-800 font-sans">

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-12">
        <form action="" method="post" class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-8">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

            <h1 class="text-3xl font-bold mb-6">Desired Pet</h1>
            <p class="mb-8 text-gray-600">Please tell us about the pet you're interested in adopting.</p>
            
            <?php
            require_once('../connection.php');
            $query = "SELECT * FROM pets WHERE status != 'Adopted'";
            $result = $conn->query($query);

            if ($result && $result->num_rows > 0):
            ?>
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">
                        Who do you want to adopt from our adoptables? (Select one)
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php while ($pet = $result->fetch_assoc()): ?>
                            <div class="flex items-center">
                                <input type="radio" id="pet<?= htmlspecialchars($pet['id']) ?>" name="desiredPet"
                                    value="<?= htmlspecialchars($pet['pet_name']) ?>"
                                    class="h-4 w-4 text-[#FFBB00] focus:ring-[#FFBB00] border-gray-300 rounded">
                                <label for="pet<?= htmlspecialchars($pet['id']) ?>" class="ml-2 block text-sm text-gray-700">
                                    <?= htmlspecialchars($pet['pet_name']) ?>
                                </label>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php else: ?>
                <p class="text-gray-600 mb-6">Currently there are no pets available for adoption.</p>
            <?php endif; ?>

            <div>
                <label for="whyAdopt" class="block text-sm font-medium text-gray-700 mb-1">Why did you choose to adopt your
                    answer from the above question?</label>
                <textarea id="whyAdopt" name="whyAdopt" rows="3" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#FFBB00] focus:border-[#FFBB00]"></textarea>
            </div>

            <div>
                <label for="primaryCaregiver" class="block text-sm font-medium text-gray-700 mb-1">Who will be the primary
                    caregiver of the pet you will adopt?</label>
                <input type="text" id="primaryCaregiver" name="primaryCaregiver" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#FFBB00] focus:border-[#FFBB00]">
            </div>

            <div>
                <label for="whyNow" class="block text-sm font-medium text-gray-700 mb-1">Why do you want to adopt a pet
                    now?</label>
                <textarea id="whyNow" name="whyNow" rows="3" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#FFBB00] focus:border-[#FFBB00]"></textarea>
            </div>

            <div class="flex justify-between mt-12">
                <a href="adoption-form-2.php"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-6 rounded-lg transition duration-300 inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    Back
                </a>
                <button type="submit"
                    class="bg-[#FFBB00] hover:bg-[#FFA000] text-white font-bold py-2 px-6 rounded-lg transition duration-300 inline-flex items-center">
                    Next
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </form>
    </main>
</body>
</html>