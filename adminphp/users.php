<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800 text-black-300 font-sans">
    <!-- Header -->
    <div class="flex justify-between items-center bg-[#FDF2C1] px-6 py-4 shadow-md">
        <div class="text-2xl cursor-pointer">&#9776;</div>
        <h1 class="text-xl font-bold text-black">Manage Users Here</h1>
        <div class="w-8 h-8 bg-black rounded-full"></div>
    </div>

    <!-- Manage Users Table -->
    <div class="bg-[#FFF9E5] mx-6 my-8 p-6 rounded-lg shadow-lg">
        <table class="table-auto w-full border-collapse text-left">
            <thead class="bg-[#FDF2C1]">
                <tr>
                    <th class="px-4 py-2 font-bold">#</th>
                    <th class="px-4 py-2 font-bold">Name</th>
                    <th class="px-4 py-2 font-bold">Address</th>
                    <th class="px-4 py-2 font-bold">Phone Number</th>
                    <th class="px-4 py-2 font-bold">Age</th>
                    <th class="px-4 py-2 font-bold">Email Address</th>
                    <th class="px-4 py-2 font-bold">Social Media Account</th>
                    <th class="px-4 py-2 font-bold">Occupation</th>
                    <th class="px-4 py-2 font-bold">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white">
                    <td class="px-4 py-2 border-b">1</td>
                    <td class="px-4 py-2 border-b">John Doe</td>
                    <td class="px-4 py-2 border-b">123 Main St.</td>
                    <td class="px-4 py-2 border-b">+1234567890</td>
                    <td class="px-4 py-2 border-b">30</td>
                    <td class="px-4 py-2 border-b">johndoe@example.com</td>
                    <td class="px-4 py-2 border-b">@johndoe</td>
                    <td class="px-4 py-2 border-b">Software Engineer</td>
                    <td class="px-4 py-2 border-b flex space-x-2">
                        <button class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-700">&#10004;</button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-700">&#10008;</button>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</body>
</html>