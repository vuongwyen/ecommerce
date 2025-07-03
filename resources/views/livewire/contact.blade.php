<div class="max-w-[85rem] px-4 py-16 sm:px-6 lg:px-8 lg:py-20 mx-auto">
    <div class="max-w-2xl lg:max-w-5xl mx-auto">
        <!-- Tiêu đề với gradient nổi bật -->
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">
                <span class="bg-gradient-to-r from-purple-600 via-pink-500 to-orange-500 bg-clip-text text-transparent">
                    Contact us
                </span>
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                We are always ready to listen and support you. Let us know what you need!
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-10 lg:gap-16">
            <!-- Form liên hệ -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <div class="p-6 sm:p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">
                        Send us a message
                    </h2>

                    <form class="space-y-5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                                <div class="relative">
                                    <input type="text" class="w-full py-3 px-4 border border-gray-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all" placeholder="Nhập họ của bạn">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                                <div class="relative">
                                    <input type="text" class="w-full py-3 px-4 border border-gray-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all" placeholder="Nhập tên của bạn">
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <div class="relative">
                                <input type="email" class="w-full py-3 px-4 border border-gray-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all" placeholder="email@example.com">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <div class="relative">
                                <input type="tel" class="w-full py-3 px-4 border border-gray-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all" placeholder="(123) 456-7890">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                            <select class="w-full py-3 px-4 border border-gray-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                                <option>Choose Subject</option>
                                <option>Product Support</option>
                                <option>Order & Shipping</option>
                                <option>Return & Refund</option>
                                <option>Cooperation</option>
                                <option>Other</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                            <textarea rows="5" class="w-full py-3 px-4 border border-gray-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all" placeholder="Mô tả chi tiết yêu cầu của bạn..."></textarea>
                        </div>

                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-700">
                                I agree with <a href="{{ route('privacy-policy') }}" class="font-medium text-purple-600 hover:text-purple-500">Privacy Policy</a>
                            </label>
                        </div>

                        <div>
                            <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-base font-semibold rounded-lg border border-transparent bg-gradient-to-r from-purple-600 to-pink-600 text-white hover:from-purple-700 hover:to-pink-700 transition-all shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Thông tin liên hệ -->
            <div class="space-y-8">
                <!-- Card thông tin -->
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-6 border border-purple-100 transition-all hover:shadow-lg">
                    <div class="flex items-start">
                        <div class="bg-purple-100 p-3 rounded-xl mr-4">
                            <svg class="h-8 w-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-1">Phone Number</h3>
                            <p class="text-gray-600 mb-2">Contact us via phone</p>
                            <a href="tel:+84123456789" class="text-lg font-semibold text-purple-600 hover:text-purple-800 transition-colors">+84 123 456 789</a>
                        </div>
                    </div>
                </div>

                <!-- Card thông tin -->
                <div class="bg-gradient-to-br from-orange-50 to-amber-50 rounded-2xl p-6 border border-orange-100 transition-all hover:shadow-lg">
                    <div class="flex items-start">
                        <div class="bg-orange-100 p-3 rounded-xl mr-4">
                            <svg class="h-8 w-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-1">Email</h3>
                            <p class="text-gray-600 mb-2">Send us an email anytime</p>
                            <a href="mailto:contact@fashionstore.com" class="text-lg font-semibold text-orange-600 hover:text-orange-800 transition-colors">contact@fashionstore.com</a>
                        </div>
                    </div>
                </div>

                <!-- Card thông tin -->
                <div class="bg-gradient-to-br from-pink-50 to-rose-50 rounded-2xl p-6 border border-pink-100 transition-all hover:shadow-lg">
                    <div class="flex items-start">
                        <div class="bg-pink-100 p-3 rounded-xl mr-4">
                            <svg class="h-8 w-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-1">Store</h3>
                            <p class="text-gray-600 mb-2">Visit our store</p>
                            <p class="text-lg font-semibold text-pink-600">123, ABC Street, XYZ District, HCMC</p>
                        </div>
                    </div>
                </div>

                <!-- Card thông tin -->
                <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-6 border border-blue-100 transition-all hover:shadow-lg">
                    <div class="flex items-start">
                        <div class="bg-blue-100 p-3 rounded-xl mr-4">
                            <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-1">Working Hours</h3>
                            <p class="text-gray-600 mb-2">We are ready to serve you</p>
                            <div class="space-y-1">
                                <p class="text-gray-800 font-medium">Monday - Friday: <span class="text-blue-600">8:00 - 20:00</span></p>
                                <p class="text-gray-800 font-medium">Saturday - Sunday: <span class="text-blue-600">9:00 - 18:00</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bản đồ & Mạng xã hội -->
        <div class="mt-16 grid md:grid-cols-2 gap-10">
            <!-- Bản đồ -->
            <div class="rounded-2xl overflow-hidden shadow-lg">
                <div class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-80 flex items-center justify-center">
                    <div class="text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <h3 class="mt-2 text-lg font-medium text-gray-900">Map</h3>
                        <p class="mt-1 text-sm text-gray-500">Display the location of our store</p>
                    </div>
                </div>
            </div>

            <!-- Mạng xã hội -->
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-8 border border-gray-200">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Connect with us</h3>
                <p class="text-gray-600 mb-6">Follow us on social media to get the latest products and special promotions.</p>

                <div class="flex space-x-4">
                    <a href="#" class="h-12 w-12 rounded-full bg-blue-600 flex items-center justify-center text-white hover:bg-blue-700 transition-colors">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"></path>
                        </svg>
                    </a>
                    <a href="#" class="h-12 w-12 rounded-full bg-pink-600 flex items-center justify-center text-white hover:bg-pink-700 transition-colors">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"></path>
                        </svg>
                    </a>
                    <a href="#" class="h-12 w-12 rounded-full bg-red-600 flex items-center justify-center text-white hover:bg-red-700 transition-colors">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path>
                        </svg>
                    </a>
                    <a href="#" class="h-12 w-12 rounded-full bg-blue-400 flex items-center justify-center text-white hover:bg-blue-500 transition-colors">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"></path>
                        </svg>
                    </a>
                </div>

                <div class="mt-8">
                    <h4 class="text-lg font-semibold text-gray-900 mb-3">Register for newsletter</h4>
                    <div class="flex">
                        <input type="email" placeholder="Email của bạn" class="py-3 px-4 block w-full border border-gray-200 rounded-l-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <button class="py-3 px-5 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-r-lg border border-transparent bg-purple-600 text-white hover:bg-purple-700 transition-colors">
                            Register
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>