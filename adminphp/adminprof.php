<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FFF9E5] font-sans text-gray-800">
    <!-- Header -->
    <div class="flex justify-between items-center bg-[#FDF2C1] px-6 py-4 shadow-md">
        <div class="text-2xl cursor-pointer">&#9776;</div>
        <h1 class="text-xl font-bold">Admin Profile</h1>
        <div class="w-8 h-8 bg-black rounded-full"></div>
    </div>

    <!-- Profile Container -->
    <div class="flex flex-col items-center mt-12">
        <!-- Profile Picture -->
        <div class="w-24 h-24 bg-black rounded-full mb-8"></div>

        <!-- Profile Details -->
        <div class="w-full max-w-md">
            <div class="mb-6">
                <label class="block text-sm text-gray-600 mb-2">Name</label>
                <input 
                    type="text" 
                    value="Admin Name" 
                    readonly 
                    class="w-full px-4 py-3 border border-gray-300 rounded-md bg-white text-gray-800"
                >
            </div>
            <div class="mb-6">
                <label class="block text-sm text-gray-600 mb-2">Phone Number</label>
                <input 
                    type="text" 
                    value="+1234567890" 
                    readonly 
                    class="w-full px-4 py-3 border border-gray-300 rounded-md bg-white text-gray-800"
                >
            </div>
            <div class="mb-6">
                <label class="block text-sm text-gray-600 mb-2">Email Address</label>
                <input 
                    type="text" 
                    value="admin@example.com" 
                    readonly 
                    class="w-full px-4 py-3 border border-gray-300 rounded-md bg-white text-gray-800"
                >
            </div>
        </div>
    </div>
</body>
</html>