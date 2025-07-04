<div>
    <style>
        .tos-header {
            background: linear-gradient(rgba(26, 26, 46, 0.9), rgba(26, 26, 46, 0.95)), url('https://images.unsplash.com/photo-1490481651871-ab68de25d43d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1770&q=80');
            background-size: cover;
            background-position: center;
        }

        .tos-section {
            border-left: 3px solid #9C7CF6;
            padding-left: 20px;
            margin-bottom: 40px;
        }

        .tos-section h3 {
            margin-bottom: 15px;
            position: relative;
        }

        .tos-section h3:before {
            content: '';
            position: absolute;
            left: -23px;
            top: 12px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #9C7CF6;
        }

        .nav-sticky {
            position: sticky;
            top: 100px;
        }

        .nav-item {
            padding: 12px 20px;
            border-left: 3px solid transparent;
            transition: all 0.3s ease;
        }

        .nav-item:hover,
        .nav-item.active {
            border-left: 3px solid #9C7CF6;
            background: rgba(156, 124, 246, 0.05);
        }

        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #9C7CF6;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease;
            z-index: 100;
        }

        .back-to-top.show {
            opacity: 1;
            transform: translateY(0);
        }

        .highlight-box {
            background: rgba(156, 124, 246, 0.05);
            border-left: 4px solid #9C7CF6;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin: 20px 0;
        }

        .info-item {
            display: flex;
            margin-bottom: 15px;
            align-items: flex-start;
        }

        .info-item i {
            min-width: 24px;
            margin-top: 4px;
            margin-right: 15px;
            color: #9C7CF6;
        }

        .update-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #9C7CF6;
            color: white;
            font-size: 12px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 20px;
        }

        .summary-card {
            border-radius: 12px;
            background: rgba(156, 124, 246, 0.05);
            padding: 20px;
            margin: 20px 0;
        }

        .summary-card h4 {
            font-weight: 600;
            margin-bottom: 10px;
            color: #9C7CF6;
        }
    </style>

    <!-- Hero Section -->
    <section class="tos-header py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl font-serif font-bold text-white mb-6">
                    Terms of Service
                </h1>
                <p class="text-xl text-white/90 mb-8">
                    Please read these terms carefully before using our website and services.
                </p>
                <div class="flex items-center text-white/80">
                    <i class="fas fa-clock mr-2"></i>
                    <span>Effective Date: September 1, 2023</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-12">
                <!-- Navigation -->
                <div class="lg:w-1/4">
                    <div class="bg-white rounded-xl shadow-sm p-6 nav-sticky">
                        <h3 class="font-serif font-bold text-xl mb-6">Terms Sections</h3>
                        <nav>
                            <ul>
                                <li><a href="#introduction" class="nav-item active">Introduction</a></li>
                                <li><a href="#acceptance" class="nav-item">Acceptance of Terms</a></li>
                                <li><a href="#accounts" class="nav-item">User Accounts</a></li>
                                <li><a href="#orders" class="nav-item">Orders & Payments</a></li>
                                <li><a href="#products" class="nav-item">Products & Pricing</a></li>
                                <li><a href="#returns" class="nav-item">Returns & Exchanges</a></li>
                                <li><a href="#intellectual" class="nav-item">Intellectual Property</a></li>
                                <li><a href="#usercontent" class="nav-item">User Content</a></li>
                                <li><a href="#liability" class="nav-item">Limitation of Liability</a></li>
                                <li><a href="#indemnification" class="nav-item">Indemnification</a></li>
                                <li><a href="#law" class="nav-item">Governing Law</a></li>
                                <li><a href="#changes" class="nav-item">Changes to Terms</a></li>
                                <li><a href="#contact" class="nav-item">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Terms Content -->
                <div class="lg:w-3/4">
                    <div class="bg-white rounded-xl shadow-sm p-8">
                        <!-- Introduction -->
                        <div class="tos-section" id="introduction">
                            <h2 class="text-2xl font-serif font-bold mb-6">1. Introduction</h2>
                            <p class="mb-4">
                                Welcome to Beautify Fashion ("we", "us", or "our"). These Terms of Service ("Terms") govern your access to and use of the Beautify website (the "Site") and the services provided through the Site (collectively, the "Services").
                            </p>
                            <p class="mb-4">
                                By accessing or using our Services, you agree to be bound by these Terms. If you disagree with any part of these Terms, you may not access the Services.
                            </p>
                            <div class="highlight-box">
                                <p><strong>Key Point:</strong> These Terms form a legally binding agreement between you and Beautify Fashion Ltd. Please read them carefully.</p>
                            </div>
                        </div>

                        <!-- Acceptance of Terms -->
                        <div class="tos-section" id="acceptance">
                            <h2 class="text-2xl font-serif font-bold mb-6">2. Acceptance of Terms</h2>
                            <p class="mb-4">
                                By accessing or using our Services, you confirm that:
                            </p>
                            <ul class="list-disc pl-6 mb-6">
                                <li>You are at least 18 years old or the age of majority in your jurisdiction</li>
                                <li>You have the legal capacity to enter into binding contracts</li>
                                <li>You accept these Terms and agree to abide by them</li>
                                <li>All information you provide is accurate and complete</li>
                            </ul>

                            <h3 class="text-xl font-bold">Modifications to Terms</h3>
                            <p class="mb-4">
                                We reserve the right to modify these Terms at any time. All changes will be effective immediately upon posting to the Site. Your continued use of the Services constitutes acceptance of the modified Terms.
                            </p>
                        </div>

                        <!-- User Accounts -->
                        <div class="tos-section" id="accounts">
                            <h2 class="text-2xl font-serif font-bold mb-6">3. User Accounts</h2>
                            <p class="mb-4">
                                To access certain features of our Services, you may be required to create an account.
                            </p>

                            <h3 class="text-xl font-bold">Account Responsibilities</h3>
                            <p class="mb-4">
                                When creating an account, you agree to:
                            </p>
                            <ul class="list-disc pl-6 mb-6">
                                <li>Provide accurate and current information</li>
                                <li>Maintain the security of your account credentials</li>
                                <li>Promptly update any information that becomes inaccurate</li>
                                <li>Accept responsibility for all activities under your account</li>
                            </ul>

                            <h3 class="text-xl font-bold">Account Termination</h3>
                            <p class="mb-4">
                                We reserve the right to suspend or terminate your account at our sole discretion if we believe you have violated these Terms or applicable laws.
                            </p>
                        </div>

                        <!-- Orders & Payments -->
                        <div class="tos-section" id="orders">
                            <h2 class="text-2xl font-serif font-bold mb-6">4. Orders & Payments</h2>
                            <p class="mb-4">
                                By placing an order through our Services, you make an offer to purchase the selected products under these Terms.
                            </p>

                            <h3 class="text-xl font-bold">Order Acceptance</h3>
                            <p class="mb-4">
                                All orders are subject to acceptance by Beautify. We may refuse or cancel any order for any reason at our discretion, including but not limited to:
                            </p>
                            <ul class="list-disc pl-6 mb-6">
                                <li>Product unavailability</li>
                                <li>Errors in product or pricing information</li>
                                <li>Suspected fraudulent activity</li>
                                <li>Violation of our purchasing limits</li>
                            </ul>

                            <h3 class="text-xl font-bold">Payment Methods</h3>
                            <p class="mb-4">
                                We accept various payment methods as displayed during checkout. You represent that you have the legal right to use any payment method you provide.
                            </p>

                            <div class="summary-card">
                                <h4>Order Processing Summary</h4>
                                <p>1. You place an order → 2. We send order confirmation → 3. Payment is processed → 4. Order is shipped → 5. You receive tracking information</p>
                            </div>
                        </div>

                        <!-- Products & Pricing -->
                        <div class="tos-section" id="products">
                            <h2 class="text-2xl font-serif font-bold mb-6">5. Products & Pricing</h2>
                            <p class="mb-4">
                                We strive to accurately display our products and pricing. However, we cannot guarantee the accuracy of all information.
                            </p>

                            <h3 class="text-xl font-bold">Product Availability</h3>
                            <p class="mb-4">
                                All products are subject to availability. We reserve the right to discontinue any product at any time without notice.
                            </p>

                            <h3 class="text-xl font-bold">Pricing Information</h3>
                            <p class="mb-4">
                                Prices are shown in your local currency where possible. We reserve the right to change prices at any time without notice. The price charged for a product will be the price in effect at the time the order is placed.
                            </p>

                            <h3 class="text-xl font-bold">Errors and Inaccuracies</h3>
                            <p class="mb-4">
                                In the event of pricing or product description errors, we reserve the right to cancel orders and correct such errors.
                            </p>
                        </div>

                        <!-- Returns & Exchanges -->
                        <div class="tos-section" id="returns">
                            <h2 class="text-2xl font-serif font-bold mb-6">6. Returns & Exchanges</h2>
                            <p class="mb-4">
                                We want you to be completely satisfied with your Beautify purchase. Please refer to our <a href="#" class="text-primary">Return Policy</a> for detailed information about returns and exchanges.
                            </p>

                            <h3 class="text-xl font-bold">General Conditions</h3>
                            <p class="mb-4">
                                To be eligible for a return or exchange:
                            </p>
                            <ul class="list-disc pl-6 mb-6">
                                <li>Items must be unused, in original condition, and with tags attached</li>
                                <li>Returns must be initiated within 30 days of delivery</li>
                                <li>A valid proof of purchase is required</li>
                            </ul>

                            <h3 class="text-xl font-bold">Non-Returnable Items</h3>
                            <p class="mb-4">
                                Certain items cannot be returned for hygiene or safety reasons, including:
                            </p>
                            <ul class="list-disc pl-6 mb-6">
                                <li>Underwear and swimwear</li>
                                <li>Personalized or made-to-order items</li>
                                <li>Items marked as "Final Sale"</li>
                            </ul>
                        </div>

                        <!-- Intellectual Property -->
                        <div class="tos-section" id="intellectual">
                            <h2 class="text-2xl font-serif font-bold mb-6">7. Intellectual Property</h2>
                            <p class="mb-4">
                                All content on our Services, including text, graphics, logos, images, and software, is the property of Beautify or its licensors and is protected by intellectual property laws.
                            </p>

                            <h3 class="text-xl font-bold">Limited License</h3>
                            <p class="mb-4">
                                We grant you a limited, non-exclusive, non-transferable license to access and make personal, non-commercial use of our Services. This license does not include:
                            </p>
                            <ul class="list-disc pl-6 mb-6">
                                <li>Any resale or commercial use of our Services or content</li>
                                <li>Collection and use of any product listings or descriptions</li>
                                <li>Derivative use of our Services or content</li>
                                <li>Use of data mining or similar data gathering tools</li>
                            </ul>

                            <div class="highlight-box">
                                <p><strong>Beautify Trademarks:</strong> "Beautify", our logos, and other marks are trademarks of Beautify Fashion Ltd. You may not use these marks without our prior written permission.</p>
                            </div>
                        </div>

                        <!-- User Content -->
                        <div class="tos-section" id="usercontent">
                            <h2 class="text-2xl font-serif font-bold mb-6">8. User Content</h2>
                            <p class="mb-4">
                                Our Services may allow you to submit content, including reviews, comments, photos, and other materials ("User Content").
                            </p>

                            <h3 class="text-xl font-bold">License to User Content</h3>
                            <p class="mb-4">
                                By submitting User Content, you grant Beautify a worldwide, non-exclusive, royalty-free, perpetual license to use, reproduce, modify, adapt, publish, and display such content for any purpose.
                            </p>

                            <h3 class="text-xl font-bold">Content Standards</h3>
                            <p class="mb-4">
                                You agree that your User Content will not:
                            </p>
                            <ul class="list-disc pl-6 mb-6">
                                <li>Violate any third-party rights, including intellectual property rights</li>
                                <li>Contain defamatory, obscene, or unlawful material</li>
                                <li>Promote violence or discrimination</li>
                                <li>Be likely to deceive any person</li>
                                <li>Impersonate any person or misrepresent your identity</li>
                            </ul>
                        </div>

                        <!-- Limitation of Liability -->
                        <div class="tos-section" id="liability">
                            <h2 class="text-2xl font-serif font-bold mb-6">9. Limitation of Liability</h2>
                            <p class="mb-4">
                                To the maximum extent permitted by applicable law, Beautify shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising out of or related to your use of our Services.
                            </p>

                            <h3 class="text-xl font-bold">Product Liability</h3>
                            <p class="mb-4">
                                In no event shall our total liability to you for all claims related to the Services exceed the amount you paid to Beautify in the six months preceding the event giving rise to the claim.
                            </p>

                            <div class="highlight-box">
                                <p><strong>Consumer Protection:</strong> Nothing in these Terms excludes or limits our liability for death or personal injury caused by our negligence, fraud, or any other liability that cannot be excluded by law.</p>
                            </div>
                        </div>

                        <!-- Indemnification -->
                        <div class="tos-section" id="indemnification">
                            <h2 class="text-2xl font-serif font-bold mb-6">10. Indemnification</h2>
                            <p class="mb-4">
                                You agree to defend, indemnify, and hold harmless Beautify, its affiliates, and their respective officers, directors, employees, and agents from and against any claims, liabilities, damages, losses, and expenses arising out of or relating to:
                            </p>
                            <ul class="list-disc pl-6 mb-6">
                                <li>Your use of the Services</li>
                                <li>Your violation of these Terms</li>
                                <li>Your violation of any third-party rights</li>
                                <li>Any User Content you submit</li>
                            </ul>
                        </div>

                        <!-- Governing Law -->
                        <div class="tos-section" id="law">
                            <h2 class="text-2xl font-serif font-bold mb-6">11. Governing Law</h2>
                            <p class="mb-4">
                                These Terms shall be governed by and construed in accordance with the laws of France, without regard to its conflict of law principles.
                            </p>

                            <h3 class="text-xl font-bold">Dispute Resolution</h3>
                            <p class="mb-4">
                                Any disputes arising out of or relating to these Terms or the Services shall be resolved through binding arbitration in Paris, France, in accordance with the rules of the International Chamber of Commerce.
                            </p>

                            <h3 class="text-xl font-bold">Class Action Waiver</h3>
                            <p class="mb-4">
                                You agree that any arbitration or proceeding shall be limited to the dispute between us individually. Neither you nor Beautify may join claims in arbitration with others or participate in class actions.
                            </p>
                        </div>

                        <!-- Changes to Terms -->
                        <div class="tos-section" id="changes">
                            <h2 class="text-2xl font-serif font-bold mb-6">12. Changes to Terms</h2>
                            <p class="mb-4">
                                We reserve the right to update or modify these Terms at any time without prior notice. The "Effective Date" at the top of this page indicates when these Terms were last revised.
                            </p>
                            <p class="mb-4">
                                Your continued use of our Services following the posting of changes constitutes your acceptance of such changes. We encourage you to review these Terms periodically.
                            </p>
                        </div>

                        <!-- Contact -->
                        <div class="tos-section" id="contact">
                            <h2 class="text-2xl font-serif font-bold mb-6">13. Contact Us</h2>
                            <p class="mb-8">
                                If you have any questions about these Terms of Service, please contact us:
                            </p>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="bg-primary/5 p-6 rounded-lg">
                                    <h3 class="text-xl font-bold mb-4">Email</h3>
                                    <p class="mb-4">
                                        For general inquiries:
                                    </p>
                                    <a href="mailto:info@beautify.com" class="text-primary font-medium">info@beautify.com</a>
                                    <p class="mt-4">
                                        For legal matters:
                                    </p>
                                    <a href="mailto:legal@beautify.com" class="text-primary font-medium">legal@beautify.com</a>
                                </div>

                                <div class="bg-primary/5 p-6 rounded-lg">
                                    <h3 class="text-xl font-bold mb-4">Mail</h3>
                                    <p class="mb-4">
                                        Beautify Fashion Ltd.<br>
                                        Attn: Legal Department<br>
                                        123 Fashion Avenue<br>
                                        Paris, France 75001
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Back to top button -->
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>

    <script>
        // Back to top button functionality
        const backToTopButton = document.querySelector('.back-to-top');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.add('show');
            } else {
                backToTopButton.classList.remove('show');
            }
        });

        backToTopButton.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Navigation highlighting
        const sections = document.querySelectorAll('.tos-section');
        const navItems = document.querySelectorAll('.nav-item');

        window.addEventListener('scroll', () => {
            let current = '';

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;

                if (window.pageYOffset >= (sectionTop - 300)) {
                    current = section.getAttribute('id');
                }
            });

            navItems.forEach(item => {
                item.classList.remove('active');
                if (item.getAttribute('href').substring(1) === current) {
                    item.classList.add('active');
                }
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</div>