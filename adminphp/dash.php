<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="m-0 font-sans bg-[#FFF9E5] text-gray-800">
    <!-- Header -->
    <div class="flex justify-between items-center bg-[#FDF2C1] p-6 shadow-md">
        <div class="menu-icon text-2xl cursor-pointer">&#9776;</div>
        <h1 class="text-2xl font-bold">Dashboard</h1>
        <div class="w-10 h-10 bg-black rounded-full"></div>
    </div>

    <!-- Dashboard Container -->
    <div class="text-center mt-12">
        <h2 class="text-3xl font-bold mb-12">Shelter of Light's Dashboard</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 justify-items-center px-6">
            <div class="bg-white border border-gray-300 rounded-lg shadow-lg w-64 h-36 flex justify-center items-center text-xl font-bold">
                Total Users
            </div>
            <div class="bg-white border border-gray-300 rounded-lg shadow-lg w-64 h-36 flex justify-center items-center text-xl font-bold">
                Confirmed
            </div>
            <div class="bg-white border border-gray-300 rounded-lg shadow-lg w-64 h-36 flex justify-center items-center text-xl font-bold">
                Declined
            </div>
            <div class="bg-white border border-gray-300 rounded-lg shadow-lg w-64 h-36 flex justify-center items-center text-xl font-bold">
                For Verification
            </div>
            <div class="bg-white border border-gray-300 rounded-lg shadow-lg w-64 h-36 flex justify-center items-center text-xl font-bold">
                Total Cats Adopted
            </div>
            <div class="bg-white border border-gray-300 rounded-lg shadow-lg w-64 h-36 flex justify-center items-center text-xl font-bold">
                Total Dogs Adopted
            </div>
        </div>
    </div>
</body>
</html>