<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple CSS Test</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-blue-600 mb-4">CSS Test Page</h1>

        <div class="bg-white rounded-lg shadow-md p-6 mb-4">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Tailwind CSS Test</h2>

            <!-- Test different Tailwind classes -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div class="bg-blue-100 p-4 rounded-lg">
                    <h3 class="font-semibold text-blue-800">Blue Box</h3>
                    <p class="text-blue-600">This should be blue if CSS is working</p>
                </div>
                <div class="bg-green-100 p-4 rounded-lg">
                    <h3 class="font-semibold text-green-800">Green Box</h3>
                    <p class="text-green-600">This should be green if CSS is working</p>
                </div>
            </div>

            <!-- Test buttons -->
            <div class="flex gap-4 mb-4">
                <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors">
                    Blue Button
                </button>
                <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors">
                    Green Button
                </button>
                <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-colors">
                    Red Button
                </button>
            </div>

            <!-- Test form elements -->
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Test Input</label>
                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Type something...">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Test Select</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option>Option 1</option>
                        <option>Option 2</option>
                        <option>Option 3</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Status indicator -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">CSS Status</h2>
            <div class="space-y-2">
                <div class="flex items-center">
                    <div class="w-4 h-4 bg-blue-500 rounded mr-3"></div>
                    <span class="text-gray-700">If you see colored boxes and styled buttons, CSS is working!</span>
                </div>
                <div class="flex items-center">
                    <div class="w-4 h-4 bg-green-500 rounded mr-3"></div>
                    <span class="text-gray-700">If text is properly styled and spaced, Tailwind is working!</span>
                </div>
                <div class="flex items-center">
                    <div class="w-4 h-4 bg-purple-500 rounded mr-3"></div>
                    <span class="text-gray-700">If form elements are styled, @tailwindcss/forms is working!</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>