<?php
require_once('../connection.php');

// Breed options
$dogBreeds = [
    'Aspin',
    'Labrador Retriever',
    'German Shepherd',
    'Golden Retriever',
    'French Bulldog',
    'Beagle',
    'Poodle',
    'Rottweiler',
    'Yorkshire Terrier',
    'Boxer'
];

$catBreeds = [
    'Puspin',
    'Persian',
    'Siamese',
    'Maine Coon',
    'Ragdoll',
    'Bengal',
    'British Shorthair',
    'Scottish Fold',
    'Sphynx',
    'Russian Blue'
];

$vaccinationOptions = [
    '5-in-1',
    '4-in-1',
    'Unvaccinated'
];

// Handle POST requests (add/edit pet)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        // Handle edit/delete actions
        if ($_POST['action'] === 'edit') {
            $id = $_POST['id'];
            $petname = $_POST['pet_name'];
            $description = $_POST['description'];
            $type = $_POST['type'];
            $petage = $_POST['pet_age'];
            $petbreed = $_POST['pet_breed'];
            $petgender = $_POST['pet_gender'];
            $petkind = $_POST['pet_kind'];
            $petvaccinated = $_POST['pet_vacinated'];

            if (isset($_FILES['pet_image']) && $_FILES['pet_image']['error'] === UPLOAD_ERR_OK) {
                $imageTmpPath = $_FILES['pet_image']['tmp_name'];
                $imageData = file_get_contents($imageTmpPath);
                $imageType = $_FILES['pet_image']['type'];

                $query = $conn->prepare("UPDATE pets SET pet_name=?, description=?, pet_image=?, image_type=?, type=?, pet_age=?, pet_breed=?, pet_gender=?, pet_kind=?, pet_vacinated=? WHERE id=?");
                $query->bind_param("ssssssssssi", $petname, $description, $imageData, $imageType, $type, $petage, $petbreed, $petgender, $petkind, $petvaccinated, $id);
            } else {
                $query = $conn->prepare("UPDATE pets SET pet_name=?, description=?, type=?, pet_age=?, pet_breed=?, pet_gender=?, pet_kind=?, pet_vacinated=? WHERE id=?");
                $query->bind_param("ssssssssi", $petname, $description, $type, $petage, $petbreed, $petgender, $petkind, $petvaccinated, $id);
            }

            if ($query->execute()) {
                echo "<script>alert('Pet updated successfully!'); window.location.href='plist.php';</script>";
            } else {
                echo "<script>alert('Error updating pet: " . $query->error . "');</script>";
            }
            $query->close();
        } elseif ($_POST['action'] === 'delete') {
            $id = $_POST['id'];
            $query = $conn->prepare("DELETE FROM pets WHERE id=?");
            $query->bind_param("i", $id);
            
            if ($query->execute()) {
                echo "<script>alert('Pet deleted successfully!'); window.location.href='plist.php';</script>";
            } else {
                echo "<script>alert('Error deleting pet: " . $query->error . "');</script>";
            }
            $query->close();
        }
    } else {
        // Original add pet functionality
        $petname = $_POST['pet_name'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $petage = $_POST['pet_age'];
        $petbreed = $_POST['pet_breed'];
        $petgender = $_POST['pet_gender'];
        $petvaccinated = $_POST['pet_vacinated'];
        $petkind = ''; // Set empty kind for new pets

        if (isset($_FILES['pet_image']) && $_FILES['pet_image']['error'] === UPLOAD_ERR_OK) {
            $imageTmpPath = $_FILES['pet_image']['tmp_name'];
            $imageData = file_get_contents($imageTmpPath);
            $imageType = $_FILES['pet_image']['type'];

            $query = $conn->prepare("INSERT INTO pets (pet_name, description, pet_image, image_type, type, pet_age, pet_breed, pet_gender, pet_kind, pet_vacinated) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $query->bind_param("ssssssssss", $petname, $description, $imageData, $imageType, $type, $petage, $petbreed, $petgender, $petkind, $petvaccinated);

            if ($query->execute()) {
                echo "<script>alert('Pet added successfully!'); window.location.href='plist.php';</script>";
            } else {
                echo "Error: " . $query->error;
            }
            $query->close();
        } else {
            echo "<script>alert('Please upload a valid image.');</script>";
        }
    }
}

// Handle image requests
if (isset($_GET['id']) && !isset($_GET['action'])) {
    $query = $conn->prepare("SELECT pet_image, image_type FROM pets WHERE id = ?");
    $query->bind_param("i", $_GET['id']);
    $query->execute();
    $query->store_result();
    $query->bind_result($imageData, $imageType);
    $query->fetch();

    if ($query->num_rows > 0) {
        header("Content-Type: " . $imageType);
        echo $imageData;
    } else {
        http_response_code(404);
        echo "Image not found.";
    }
    $query->close();
    exit();
}

// Fetch pet data for editing
$petToEdit = null;
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] === 'edit') {
    $query = $conn->prepare("SELECT * FROM pets WHERE id = ?");
    $query->bind_param("i", $_GET['id']);
    $query->execute();
    $result = $query->get_result();
    $petToEdit = $result->fetch_assoc();
    $query->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Pet List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .side-menu {
            transition: transform 0.3s ease-in-out;
            transform: translateX(-100%);
            width: 80%;
            max-width: 320px;
        }
        .side-menu.active {
            transform: translateX(0);
        }
        .menu-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            transition: opacity 0.3s ease-in-out;
            opacity: 0;
            pointer-events: none;
        }
        .menu-overlay.active {
            opacity: 1;
            pointer-events: auto;
        }
        .input-field {
            @apply w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#FDCB58];
        }
        @media (min-width: 640px) {
            .side-menu {
                width: 16rem;
            }
        }
    </style>
</head>

<body class="bg-[#FFF9E5] font-sans text-gray-800">
    <!-- Side Menu Overlay -->
    <div id="menuOverlay" class="menu-overlay fixed inset-0 z-20" onclick="toggleMenu()"></div>

    <!-- Side Menu -->
    <div id="sideMenu" class="side-menu fixed top-0 left-0 h-full bg-[#FDF2C1] z-30 shadow-lg">
        <div class="p-4 border-b border-gray-300">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-bold">Menu</h2>
                <button onclick="toggleMenu()" class="text-2xl">&times;</button>
            </div>
        </div>
        <nav class="p-4">
            <ul class="space-y-4">
                <li>
                    <a href="../adminphp/index.php"
                        class="menu-item block py-2 px-4 hover:bg-[#FDCB58] rounded-lg transition duration-300">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Home
                        </div>
                    </a>
                </li>
                <li>
                    <a href="../adminphp/dash.php"
                        class="menu-item block py-2 px-4 hover:bg-[#FDCB58] rounded-lg transition duration-300">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            Dashboard
                        </div>
                    </a>
                </li>
                <li>
                    <a href="plist.php"
                        class="menu-item block py-2 px-4 bg-[#FDCB58] rounded-lg transition duration-300">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            Pet List
                        </div>
                    </a>
                </li>
                <li>  
                    <a href="../adminphp/users.php"
                       class="menu-item block py-2 px-4 hover:bg-[#FDCB58] rounded-lg transition duration-300">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            Manage Users
                        </div>
                    </a>
                </li>
                <li class="border-t border-gray-300 mt-6 pt-4">
                    <a href="../php/adoptlogin.php"
                        class="menu-item block py-2 px-4 hover:bg-red-100 text-red-600 rounded-lg transition duration-300">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Header -->
    <div class="flex justify-between items-center bg-[#FDF2C1] p-4 shadow-md sticky top-0 z-10">
        <div class="menu-icon text-2xl cursor-pointer" onclick="toggleMenu()">&#9776;</div>
        <h1 class="text-xl font-bold">Pet List</h1>
        <div class="w-8 h-8 bg-black rounded-full"></div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-4">
        <!-- Action Buttons -->
        <div class="flex justify-end mb-4">
            <button onclick="openModal()"
                class="bg-[#FDCB58] text-black py-2 px-4 sm:px-6 rounded-full font-bold hover:bg-[#E6B84A] transition duration-300 text-sm sm:text-base">
                + Add Pet
            </button>
        </div>

        <!-- Pet List Section -->
        <?php
        $query = "SELECT id, pet_name, description, type, pet_age, pet_breed, pet_gender, pet_kind, pet_vacinated FROM pets";
        $result = $conn->query($query);
        ?>

        <div class="mt-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="bg-white border border-gray-300 rounded-lg shadow-md p-4 relative">
                        <!-- Edit and Delete buttons -->
                        <div class="absolute top-2 right-2 flex space-x-1">
                            <button onclick="openEditModal(<?= $row['id'] ?>)" 
                                    class="bg-blue-500 text-white p-1 rounded-full hover:bg-blue-600 transition duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                            <button onclick="confirmDelete(<?= $row['id'] ?>)" 
                                class="bg-red-500 text-white p-1 rounded-full hover:bg-red-600 transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                        
                        <img src="plist.php?id=<?= $row['id'] ?>" alt="Pet Image"
                            class="w-full h-48 object-cover rounded-lg mb-3">
                        <div>
                            <p class="font-bold text-lg mb-1 truncate"><?= htmlspecialchars($row['pet_name']) ?></p>
                            <p class="text-gray-600 text-sm mb-2 line-clamp-2"><?= htmlspecialchars($row['description']) ?></p>
                            <div class="text-gray-500 text-xs space-y-1">
                                <p><?= htmlspecialchars($row['type']) ?> • <?= htmlspecialchars($row['pet_age']) ?> • <?= htmlspecialchars($row['pet_gender']) ?></p>
                                <p>Breed: <?= htmlspecialchars($row['pet_breed']) ?></p>
                                <p>Vaccination: <?= htmlspecialchars($row['pet_vacinated']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <!-- Add Pet Modal -->
    <div id="addPetModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden overflow-y-auto p-4">
        <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-4 sm:p-6 relative max-h-[90vh] overflow-y-auto">
            <button onclick="closeModal()" class="absolute top-2 right-2 text-xl font-bold text-gray-500 hover:text-red-500">&times;</button>
            <h2 class="text-xl font-bold mb-4 text-center">Add New Pet</h2>
            
            <form id="addPetForm" method="POST" enctype="multipart/form-data" class="grid gap-4">
                <input type="text" name="pet_name" placeholder="Pet Name" class="input-field" required>
                <textarea name="description" rows="2" placeholder="Description" class="input-field" required></textarea>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <select name="type" id="petType" class="input-field" onchange="updateBreedOptions()" required>
                        <option value="">Select Type</option>
                        <option value="Dog">Dog</option>
                        <option value="Cat">Cat</option>
                    </select>
                    <input type="text" name="pet_age" placeholder="Age" class="input-field" required>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <select name="pet_breed" id="petBreed" class="input-field" required>
                        <option value="">Select Breed</option>
                    </select>
                    <select name="pet_gender" class="input-field" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div>
                    <select name="pet_vacinated" class="input-field" required>
                        <option value="">Select Vaccination</option>
                        <option value="5-in-1">5-in-1</option>
                        <option value="4-in-1">4-in-1</option>
                        <option value="Unvaccinated">Unvaccinated</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pet Image</label>
                    <input type="file" name="pet_image" id="petImageInput" accept="image/*" required class="w-full">
                    <img id="imagePreview" class="mt-3 w-full h-40 object-cover rounded-lg hidden" alt="Image Preview">
                </div>

                <button type="submit" class="bg-[#FDCB58] text-black py-2 px-6 rounded-full font-bold hover:bg-[#E6B84A] transition duration-300 w-full">
                    Save Pet
                </button>
            </form>
        </div>
    </div>

    <!-- Edit Pet Modal -->
    <div id="editPetModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 <?php echo isset($_GET['action']) && $_GET['action'] === 'edit' ? '' : 'hidden'; ?> overflow-y-auto p-4">
        <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-4 sm:p-6 relative max-h-[90vh] overflow-y-auto">
            <button onclick="closeEditModal()" class="absolute top-2 right-2 text-xl font-bold text-gray-500 hover:text-red-500">&times;</button>
            <h2 class="text-xl font-bold mb-4 text-center">Edit Pet</h2>
            
            <form id="editPetForm" method="POST" enctype="multipart/form-data" class="grid gap-4">
                <input type="hidden" name="id" value="<?php echo isset($petToEdit['id']) ? $petToEdit['id'] : ''; ?>">
                <input type="hidden" name="action" value="edit">
                
                <input type="text" name="pet_name" value="<?php echo isset($petToEdit['pet_name']) ? htmlspecialchars($petToEdit['pet_name']) : ''; ?>" placeholder="Pet Name" class="input-field" required>
                <textarea name="description" rows="2" placeholder="Description" class="input-field" required><?php echo isset($petToEdit['description']) ? htmlspecialchars($petToEdit['description']) : ''; ?></textarea>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <select name="type" id="editPetType" class="input-field" onchange="updateEditBreedOptions()" required>
                        <option value="">Select Type</option>
                        <option value="Dog" <?php echo (isset($petToEdit['type']) && $petToEdit['type'] === 'Dog') ? 'selected' : ''; ?>>Dog</option>
                        <option value="Cat" <?php echo (isset($petToEdit['type']) && $petToEdit['type'] === 'Cat') ? 'selected' : ''; ?>>Cat</option>
                    </select>
                    <input type="text" name="pet_age" value="<?php echo isset($petToEdit['pet_age']) ? htmlspecialchars($petToEdit['pet_age']) : ''; ?>" placeholder="Age" class="input-field" required>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <select name="pet_breed" id="editPetBreed" class="input-field" required>
                        <option value="">Select Breed</option>
                    </select>
                    <select name="pet_gender" class="input-field" required>
                        <option value="">Select Gender</option>
                        <option value="Male" <?php echo (isset($petToEdit['pet_gender']) && $petToEdit['pet_gender'] === 'Male') ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo (isset($petToEdit['pet_gender']) && $petToEdit['pet_gender'] === 'Female') ? 'selected' : ''; ?>>Female</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <input type="text" name="pet_kind" value="<?php echo isset($petToEdit['pet_kind']) ? htmlspecialchars($petToEdit['pet_kind']) : ''; ?>" placeholder="Kind" class="input-field" required>
                    <select name="pet_vacinated" class="input-field" required>
                        <option value="">Select Vaccination</option>
                        <option value="5-in-1" <?php echo (isset($petToEdit['pet_vacinated']) && $petToEdit['pet_vacinated'] === '5-in-1') ? 'selected' : ''; ?>>5-in-1</option>
                        <option value="4-in-1" <?php echo (isset($petToEdit['pet_vacinated']) && $petToEdit['pet_vacinated'] === '4-in-1') ? 'selected' : ''; ?>>4-in-1</option>
                        <option value="Unvaccinated" <?php echo (isset($petToEdit['pet_vacinated']) && $petToEdit['pet_vacinated'] === 'Unvaccinated') ? 'selected' : ''; ?>>Unvaccinated</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Change Image (Optional)</label>
                    <input type="file" name="pet_image" id="editPetImageInput" accept="image/*" class="w-full">
                    <img id="editImagePreview" class="mt-3 w-full h-40 object-cover rounded-lg" src="plist.php?id=<?php echo isset($petToEdit['id']) ? $petToEdit['id'] : ''; ?>" alt="Current Image">
                </div>

                <button type="submit" class="bg-[#FDCB58] text-black py-2 px-6 rounded-full font-bold hover:bg-[#E6B84A] transition duration-300 w-full">
                    Update Pet
                </button>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden p-4">
        <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6 w-full max-w-md">
            <h2 class="text-xl font-bold mb-4">Confirm Deletion</h2>
            <p class="mb-6">Are you sure you want to delete this pet? This action cannot be undone.</p>
            <form id="deleteForm" method="POST">
                <input type="hidden" name="id" id="deletePetId">
                <input type="hidden" name="action" value="delete">
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100">Cancel</button>
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Delete</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Menu functionality
        function toggleMenu() {
            document.getElementById('sideMenu').classList.toggle('active');
            document.getElementById('menuOverlay').classList.toggle('active');
            document.body.style.overflow = document.getElementById('sideMenu').classList.contains('active') ? 'hidden' : '';
        }

        // Close menu when clicking on menu items
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', function() {
                document.getElementById('sideMenu').classList.remove('active');
                document.getElementById('menuOverlay').classList.remove('active');
                document.body.style.overflow = '';
            });
        });

        // Modal functions
        function openModal() {
            document.getElementById('addPetModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('addPetModal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        function openEditModal(petId) {
            window.location.href = `plist.php?id=${petId}&action=edit`;
            document.body.style.overflow = 'hidden';
        }

        function closeEditModal() {
            window.location.href = 'plist.php';
            document.getElementById('editPetModal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        function confirmDelete(petId) {
            document.getElementById('deletePetId').value = petId;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        // Image preview for add modal
        document.getElementById('petImageInput').addEventListener('change', function (event) {
            const preview = document.getElementById('imagePreview');
            const file = event.target.files[0];

            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('hidden');
            } else {
                preview.src = '';
                preview.classList.add('hidden');
            }
        });

        // Image preview for edit modal
        document.getElementById('editPetImageInput').addEventListener('change', function (event) {
            const preview = document.getElementById('editImagePreview');
            const file = event.target.files[0];

            if (file) {
                preview.src = URL.createObjectURL(file);
            }
        });

        // Breed options
        const dogBreeds = <?php echo json_encode($dogBreeds); ?>;
        const catBreeds = <?php echo json_encode($catBreeds); ?>;

        // Update breed options based on pet type
        function updateBreedOptions() {
            const petType = document.getElementById('petType').value;
            const breedSelect = document.getElementById('petBreed');
            
            // Clear existing options
            breedSelect.innerHTML = '<option value="">Select Breed</option>';
            
            if (petType === 'Dog') {
                dogBreeds.forEach(breed => {
                    const option = document.createElement('option');
                    option.value = breed;
                    option.textContent = breed;
                    breedSelect.appendChild(option);
                });
            } else if (petType === 'Cat') {
                catBreeds.forEach(breed => {
                    const option = document.createElement('option');
                    option.value = breed;
                    option.textContent = breed;
                    breedSelect.appendChild(option);
                });
            }
        }

        // Update breed options for edit modal
        function updateEditBreedOptions() {
            const petType = document.getElementById('editPetType').value;
            const breedSelect = document.getElementById('editPetBreed');
            
            // Clear existing options
            breedSelect.innerHTML = '<option value="">Select Breed</option>';
            
            if (petType === 'Dog') {
                dogBreeds.forEach(breed => {
                    const option = document.createElement('option');
                    option.value = breed;
                    option.textContent = breed;
                    breedSelect.appendChild(option);
                });
            } else if (petType === 'Cat') {
                catBreeds.forEach(breed => {
                    const option = document.createElement('option');
                    option.value = breed;
                    option.textContent = breed;
                    breedSelect.appendChild(option);
                });
            }
        }

        // Initialize breed options for edit modal if editing
        <?php if (isset($petToEdit)): ?>
            window.onload = function() {
                const petType = "<?php echo $petToEdit['type']; ?>";
                const petBreed = "<?php echo $petToEdit['pet_breed']; ?>";
                
                const editPetType = document.getElementById('editPetType');
                const editPetBreed = document.getElementById('editPetBreed');
                
                // Populate breeds based on pet type
                if (petType === 'Dog') {
                    dogBreeds.forEach(breed => {
                        const option = document.createElement('option');
                        option.value = breed;
                        option.textContent = breed;
                        editPetBreed.appendChild(option);
                    });
                } else if (petType === 'Cat') {
                    catBreeds.forEach(breed => {
                        const option = document.createElement('option');
                        option.value = breed;
                        option.textContent = breed;
                        editPetBreed.appendChild(option);
                    });
                }
                
                // Set the selected breed
                editPetBreed.value = petBreed;
            };
        <?php endif; ?>

        // Close modals when clicking outside
        window.addEventListener('click', function(event) {
            const addModal = document.getElementById('addPetModal');
            const editModal = document.getElementById('editPetModal');
            const deleteModal = document.getElementById('deleteModal');
            
            if (event.target === addModal) {
                closeModal();
            }
            if (event.target === editModal) {
                closeEditModal();
            }
            if (event.target === deleteModal) {
                closeDeleteModal();
            }
        });
    </script>
</body>
</html>