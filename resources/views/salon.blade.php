<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
<form action="#" method="POST" class="max-w-2xl mx-auto p-6 bg-white shadow-xl rounded-2xl space-y-6">
    <h2 class="text-2xl font-bold text-gray-800">Salon Registration</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
            <input type="text" name="first_name" id="first_name" class="mt-1 block w-full border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 outline-none">
        </div>

        <div>
            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="mt-1 block w-full border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 outline-none">
        </div>

        <div class="md:col-span-2">
            <label for="email_address" class="block text-sm font-medium text-gray-700">Email Address</label>
            <input type="email" name="email_address" id="email_address" class="mt-1 block w-full border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 outline-none">
        </div>

        <div class="md:col-span-2">
            <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" class="mt-1 block w-full border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 outline-none">
        </div>

        <div class="md:col-span-2">
            <label for="salon_name" class="block text-sm font-medium text-gray-700">Salon Name</label>
            <input type="text" name="salon_name" id="salon_name" class="mt-1 block w-full border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 outline-none">
        </div>

        <div class="md:col-span-2">
            <label for="salon_address" class="block text-sm font-medium text-gray-700">Salon Address</label>
            <input type="text" name="salon_address" id="salon_address" class="mt-1 block w-full border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 outline-none">
        </div>

        <div>
            <label for="salon_website1" class="block text-sm font-medium text-gray-700">Salon Website 1</label>
            <input type="url" name="salon_website1" id="salon_website1" class="mt-1 block w-full border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 outline-none">
        </div>

        <div>
            <label for="salon_website2" class="block text-sm font-medium text-gray-700">Salon Website 2</label>
            <input type="url" name="salon_website2" id="salon_website2" class="mt-1 block w-full border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 outline-none">
        </div>
    </div>

    <div class="pt-4">
        <button type="submit" class="w-full md:w-auto px-6 py-3 rounded-xl bg-indigo-600 text-white font-semibold hover:bg-indigo-700 transition duration-200">
            Submit
        </button>
    </div>
</form>


</body>
</html>
