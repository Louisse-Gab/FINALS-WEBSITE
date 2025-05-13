<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FFF9E5] font-sans text-gray-800">
    <!-- Header -->
    <div class="flex justify-between items-center bg-[#FDF2C1] p-4 shadow-md">
        <div class="menu-icon text-2xl cursor-pointer">&#9776;</div>
        <h1 class="text-xl font-bold">Pet List</h1>
        <div class="w-8 h-8 bg-black rounded-full"></div>
    </div>

    <!-- Pet List Section -->
    <div class="text-center mt-8">
        <h2 class="text-2xl font-bold mb-8">Pet List</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 justify-items-center px-4">
            <!-- Pet Card -->
            <div class="bg-white border border-gray-300 rounded-lg shadow-lg w-64 p-4 text-center">
                <img src="../images/SHELTER OF LIGHT/ADOPT PAGE/Cats/Cayenne/Cayenne.jpg" alt="Pet Image" class="w-full h-40 object-cover rounded-lg">
                <div class="mt-4">
                    <p class="font-bold text-lg mb-2">(Cat Name)</p>
                    <p class="text-gray-600 text-sm mb-4">(Short Description)</p>
                    <button class="bg-[#FDCB58] text-black py-2 px-4 rounded-full font-bold hover:bg-[#E6B84A] transition duration-300">
                        Ready for Adoption
                    </button>
                </div>
            </div>

            <div class="bg-white border border-gray-300 rounded-lg shadow-lg w-64 p-4 text-center">
                <img src="cat.jpg" alt="Pet Image" class="w-full h-40 object-cover rounded-lg">
                <div class="mt-4">
                    <p class="font-bold text-lg mb-2">(Cat Name)</p>
                    <p class="text-gray-600 text-sm mb-4">(Short Description)</p>
                    <button class="bg-[#FDCB58] text-black py-2 px-4 rounded-full font-bold hover:bg-[#E6B84A] transition duration-300">
                        Ready for Adoption
                    </button>
                </div>
            </div>

            <div class="bg-white border border-gray-300 rounded-lg shadow-lg w-64 p-4 text-center">
                <img src="cat.jpg" alt="Pet Image" class="w-full h-40 object-cover rounded-lg">
                <div class="mt-4">
                    <p class="font-bold text-lg mb-2">(Cat Name)</p>
                    <p class="text-gray-600 text-sm mb-4">(Short Description)</p>
                    <button class="bg-[#FDCB58] text-black py-2 px-4 rounded-full font-bold hover:bg-[#E6B84A] transition duration-300">
                        Ready for Adoption
                    </button>
                </div>
            </div>

            <div class="bg-white border border-gray-300 rounded-lg shadow-lg w-64 p-4 text-center">
                <img src="cat.jpg" alt="Pet Image" class="w-full h-40 object-cover rounded-lg">
                <div class="mt-4">
                    <p class="font-bold text-lg mb-2">(Cat Name)</p>
                    <p class="text-gray-600 text-sm mb-4">(Short Description)</p>
                    <button class="bg-[#FDCB58] text-black py-2 px-4 rounded-full font-bold hover:bg-[#E6B84A] transition duration-300">
                        Ready for Adoption
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>