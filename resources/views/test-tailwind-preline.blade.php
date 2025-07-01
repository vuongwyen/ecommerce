<x-layouts.app title="Test Tailwind CSS v4.1 & Preline v3.1.0">
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">
                    Tailwind CSS v4.1 + Preline v3.1.0 Test
                </h1>
                <p class="text-lg text-gray-600">
                    Testing the integration of Tailwind CSS v4.1 and Preline v3.1.0
                </p>
            </div>

            <!-- Tailwind CSS Test Section -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Tailwind CSS v4.1 Features</h2>

                <!-- Grid System -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                    <div class="bg-blue-100 p-4 rounded-lg">
                        <h3 class="font-semibold text-blue-800">Grid System</h3>
                        <p class="text-blue-600">Responsive grid layout working</p>
                    </div>
                    <div class="bg-green-100 p-4 rounded-lg">
                        <h3 class="font-semibold text-green-800">Colors</h3>
                        <p class="text-green-600">Color system working</p>
                    </div>
                    <div class="bg-purple-100 p-4 rounded-lg">
                        <h3 class="font-semibold text-purple-800">Spacing</h3>
                        <p class="text-purple-600">Spacing utilities working</p>
                    </div>
                </div>

                <!-- Flexbox -->
                <div class="flex flex-wrap gap-4 mb-6">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors">
                        Button 1
                    </button>
                    <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors">
                        Button 2
                    </button>
                    <button class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg transition-colors">
                        Button 3
                    </button>
                </div>

                <!-- Forms -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Input Field</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Type something...">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Select Field</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Preline v3.1.0 Test Section -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Preline v3.1.0 Components</h2>

                <!-- Accordion -->
                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-700 mb-3">Accordion Component</h3>
                    <div class="hs-accordion-group">
                        <div class="hs-accordion bg-white border rounded-t-xl" id="hs-basic-heading-one">
                            <button class="hs-accordion-toggle hs-accordion-active:text-blue-600 py-3 px-4 inline-flex justify-between items-center gap-x-3 w-full font-semibold text-start text-gray-800 rounded-t-xl transition hover:text-gray-500" aria-controls="hs-basic-collapse-one">
                                Accordion #1
                                <svg class="hs-accordion-active:-rotate-180 w-3 h-3 text-gray-600 group-hover:text-gray-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </button>
                            <div id="hs-basic-collapse-one" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-basic-heading-one">
                                <div class="pb-3 px-4">
                                    <p class="text-gray-800">This is the accordion body. It is shown when the accordion is expanded.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Trigger -->
                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-700 mb-3">Modal Component</h3>
                    <button type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-basic-modal">
                        Open Modal
                    </button>
                </div>

                <!-- Dropdown -->
                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-700 mb-3">Dropdown Component</h3>
                    <div class="hs-dropdown relative inline-flex">
                        <button type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                            Dropdown
                            <svg class="hs-dropdown-open:rotate-180 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </button>
                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 w-56 hidden z-10 mt-2 bg-white divide-y divide-gray-200 shadow-md rounded-lg p-2" role="menu">
                            <div class="py-2 first:pt-0 last:pb-0">
                                <a class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" href="#">
                                    Dropdown item 1
                                </a>
                                <a class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" href="#">
                                    Dropdown item 2
                                </a>
                                <a class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" href="#">
                                    Dropdown item 3
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alert -->
                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-700 mb-3">Alert Component</h3>
                    <div class="bg-blue-50 border border-blue-200 text-sm text-blue-800 rounded-lg p-4" role="alert">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="flex-shrink-0 h-4 w-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="m9 12 2 2 4-4" />
                                </svg>
                            </div>
                            <div class="ms-3">
                                <p class="text-sm">
                                    This is a sample alert message from Preline v3.1.0
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status Section -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Installation Status</h2>
                <div class="space-y-3">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                        <span class="text-gray-700">Tailwind CSS v4.1.11 installed and configured</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                        <span class="text-gray-700">Preline v3.1.0 installed and configured</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                        <span class="text-gray-700">Vite build system configured</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                        <span class="text-gray-700">PostCSS configured for Tailwind v4</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Preline Modal -->
    <div id="hs-basic-modal" class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-60 overflow-x-hidden overflow-y-auto" aria-labelledby="hs-basic-modal" aria-hidden="true">
        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div class="relative flex flex-col bg-white shadow-lg rounded-xl">
                <div class="flex justify-between items-center py-3 px-4 border-b">
                    <h3 class="font-bold text-gray-800">
                        Modal Title
                    </h3>
                    <button type="button" class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-basic-modal">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <p class="text-gray-800">
                        This is a sample modal from Preline v3.1.0. You can close it by clicking the X button or clicking outside the modal.
                    </p>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-basic-modal">
                        Close
                    </button>
                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>