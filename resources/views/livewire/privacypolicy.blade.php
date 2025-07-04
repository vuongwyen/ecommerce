<div>
    <style>
        .privacy-header {
            background: linear-gradient(rgba(26, 26, 46, 0.9), rgba(26, 26, 46, 0.95)), url('https://images.unsplash.com/photo-1490481651871-ab68de25d43d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1770&q=80');
            background-size: cover;
            background-position: center;
        }

        .policy-section {
            border-left: 3px solid #9C7CF6;
            padding-left: 20px;
            margin-bottom: 40px;
        }

        .policy-section h3 {
            margin-bottom: 15px;
            position: relative;
        }

        .policy-section h3:before {
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

        .contact-card {
            transition: all 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
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
    </style>

    <!-- Hero Section -->
    <section class="privacy-header py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl font-serif font-bold text-white mb-6">
                    Privacy Policy
                </h1>
                <p class="text-xl text-white/90 mb-8">
                    Your privacy is important to us. This policy explains how Beautify collects, uses, and protects your personal information.
                </p>
                <div class="flex items-center text-white/80">
                    <i class="fas fa-clock mr-2"></i>
                    <span>Last updated: August 15, 2023</span>
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
                        <h3 class="font-serif font-bold text-xl mb-6">Policy Sections</h3>
                        <nav>
                            <ul>
                                <li><a href="#introduction" class="nav-item active">Introduction</a></li>
                                <li><a href="#collection" class="nav-item">Information We Collect</a></li>
                                <li><a href="#usage" class="nav-item">How We Use Information</a></li>
                                <li><a href="#sharing" class="nav-item">Information Sharing</a></li>
                                <li><a href="#cookies" class="nav-item">Cookies & Tracking</a></li>
                                <li><a href="#security" class="nav-item">Data Security</a></li>
                                <li><a href="#rights" class="nav-item">Your Rights</a></li>
                                <li><a href="#children" class="nav-item">Children's Privacy</a></li>
                                <li><a href="#changes" class="nav-item">Policy Changes</a></li>
                                <li><a href="#contact" class="nav-item">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Policy Content -->
                <div class="lg:w-3/4">
                    <div class="bg-white rounded-xl shadow-sm p-8">
                        <!-- Introduction -->
                        <div class="policy-section" id="introduction">
                            <h2 class="text-2xl font-serif font-bold mb-6">1. Introduction</h2>
                            <p class="mb-4">
                                Beautify Fashion ("we", "us", or "our") operates the beautify.com website and related services (the "Service"). This page informs you of our policies regarding the collection, use, and disclosure of personal data when you use our Service and the choices you have associated with that data.
                            </p>
                            <p class="mb-4">
                                We use your data to provide and improve the Service. By using the Service, you agree to the collection and use of information in accordance with this policy.
                            </p>
                            <div class="highlight-box">
                                <p><strong>Key Principle:</strong> We never sell your personal information to third parties for marketing purposes.</p>
                            </div>
                        </div>

                        <!-- Information Collection -->
                        <div class="policy-section" id="collection">
                            <h2 class="text-2xl font-serif font-bold mb-6">2. Information We Collect</h2>
                            <p class="mb-4">
                                We collect several different types of information for various purposes to provide and improve our Service to you.
                            </p>

                            <h3 class="text-xl font-bold">Personal Data</h3>
                            <p class="mb-4">
                                While using our Service, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you ("Personal Data"). Personally identifiable information may include, but is not limited to:
                            </p>
                            <ul class="list-disc pl-6 mb-6">
                                <li>Email address</li>
                                <li>First name and last name</li>
                                <li>Phone number</li>
                                <li>Shipping and billing addresses</li>
                                <li>Payment information (processed securely by our payment partners)</li>
                                <li>Size and fit preferences</li>
                                <li>Style preferences and purchase history</li>
                            </ul>

                            <h3 class="text-xl font-bold">Usage Data</h3>
                            <p class="mb-4">
                                We may also collect information on how the Service is accessed and used ("Usage Data"). This Usage Data may include:
                            </p>
                            <ul class="list-disc pl-6 mb-6">
                                <li>Your computer's Internet Protocol address (IP address)</li>
                                <li>Browser type and version</li>
                                <li>Pages of our Service that you visit</li>
                                <li>Time and date of your visit</li>
                                <li>Time spent on those pages</li>
                                <li>Device identifiers and other diagnostic data</li>
                            </ul>
                        </div>

                        <!-- Information Usage -->
                        <div class="policy-section" id="usage">
                            <h2 class="text-2xl font-serif font-bold mb-6">3. How We Use Information</h2>
                            <p class="mb-4">
                                Beautify uses the collected data for various purposes:
                            </p>
                            <ul class="list-disc pl-6 mb-6">
                                <li>To provide and maintain our Service</li>
                                <li>To process your orders and payments</li>
                                <li>To notify you about changes to our Service</li>
                                <li>To provide customer support</li>
                                <li>To gather analysis or valuable information to improve our Service</li>
                                <li>To monitor the usage of our Service</li>
                                <li>To detect, prevent and address technical issues</li>
                                <li>To provide you with news, special offers, and general information about goods, services, and events we offer (only with your explicit consent)</li>
                                <li>To personalize your shopping experience and recommend products based on your preferences</li>
                            </ul>

                            <div class="highlight-box">
                                <p><strong>Personalization:</strong> We use your style preferences and purchase history to create personalized recommendations and improve your shopping experience. You can opt out of personalization features at any time in your account settings.</p>
                            </div>
                        </div>

                        <!-- Information Sharing -->
                        <div class="policy-section" id="sharing">
                            <h2 class="text-2xl font-serif font-bold mb-6">4. Information Sharing</h2>
                            <p class="mb-4">
                                We may share your personal information in the following situations:
                            </p>

                            <h3 class="text-xl font-bold">Service Providers</h3>
                            <p class="mb-4">
                                We may employ third party companies and individuals to facilitate our Service ("Service Providers"), to provide the Service on our behalf, to perform Service-related services or to assist us in analyzing how our Service is used. These third parties have access to your Personal Data only to perform these tasks on our behalf and are obligated not to disclose or use it for any other purpose.
                            </p>

                            <h3 class="text-xl font-bold">Legal Requirements</h3>
                            <p class="mb-4">
                                Beautify may disclose your Personal Data in the good faith belief that such action is necessary to:
                            </p>
                            <ul class="list-disc pl-6 mb-6">
                                <li>Comply with a legal obligation</li>
                                <li>Protect and defend the rights or property of Beautify</li>
                                <li>Prevent or investigate possible wrongdoing in connection with the Service</li>
                                <li>Protect the personal safety of users of the Service or the public</li>
                                <li>Protect against legal liability</li>
                            </ul>

                            <h3 class="text-xl font-bold">Business Transfers</h3>
                            <p class="mb-4">
                                If Beautify is involved in a merger, acquisition or asset sale, your Personal Data may be transferred. We will provide notice before your Personal Data is transferred and becomes subject to a different Privacy Policy.
                            </p>
                        </div>

                        <!-- Cookies -->
                        <div class="policy-section" id="cookies">
                            <h2 class="text-2xl font-serif font-bold mb-6">5. Cookies & Tracking Technologies</h2>
                            <p class="mb-4">
                                We use cookies and similar tracking technologies to track activity on our Service and hold certain information.
                            </p>

                            <h3 class="text-xl font-bold">What Are Cookies</h3>
                            <p class="mb-4">
                                Cookies are small data files stored on your device. We use both session cookies (which expire when you close your browser) and persistent cookies (which stay on your device until deleted) to provide our Service.
                            </p>

                            <h3 class="text-xl font-bold">How We Use Cookies</h3>
                            <p class="mb-4">
                                We use cookies for various purposes:
                            </p>
                            <ul class="list-disc pl-6 mb-6">
                                <li><strong>Essential Cookies:</strong> Necessary for website functionality</li>
                                <li><strong>Preference Cookies:</strong> Remember your preferences and settings</li>
                                <li><strong>Analytics Cookies:</strong> Help us understand how visitors interact with our site</li>
                                <li><strong>Marketing Cookies:</strong> Used to deliver relevant advertisements</li>
                            </ul>

                            <h3 class="text-xl font-bold">Cookie Management</h3>
                            <p class="mb-4">
                                You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Service.
                            </p>
                            <p>
                                Our Cookie Preference Center allows you to customize your cookie settings at any time.
                            </p>
                        </div>

                        <!-- Data Security -->
                        <div class="policy-section" id="security">
                            <h2 class="text-2xl font-serif font-bold mb-6">6. Data Security</h2>
                            <p class="mb-4">
                                The security of your data is important to us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Data, we cannot guarantee its absolute security.
                            </p>

                            <h3 class="text-xl font-bold">Our Security Measures</h3>
                            <p class="mb-4">
                                We implement appropriate technical and organizational measures to protect personal data, including:
                            </p>
                            <ul class="list-disc pl-6 mb-6">
                                <li>Encryption of sensitive data in transit and at rest</li>
                                <li>Regular security audits and vulnerability testing</li>
                                <li>Access controls and authentication mechanisms</li>
                                <li>Secure payment processing through PCI-DSS compliant partners</li>
                                <li>Employee training on data protection</li>
                            </ul>
                        </div>

                        <!-- Your Rights -->
                        <div class="policy-section" id="rights">
                            <h2 class="text-2xl font-serif font-bold mb-6">7. Your Data Rights</h2>
                            <p class="mb-4">
                                Depending on your location, you may have certain rights regarding your personal information:
                            </p>

                            <h3 class="text-xl font-bold">Access and Portability</h3>
                            <p class="mb-4">
                                You have the right to request copies of your personal data. We may charge a small fee for this service.
                            </p>

                            <h3 class="text-xl font-bold">Correction</h3>
                            <p class="mb-4">
                                You have the right to request correction of any information you believe is inaccurate.
                            </p>

                            <h3 class="text-xl font-bold">Deletion</h3>
                            <p class="mb-4">
                                You have the right to request that we erase your personal data, under certain conditions.
                            </p>

                            <h3 class="text-xl font-bold">Restriction of Processing</h3>
                            <p class="mb-4">
                                You have the right to request that we restrict the processing of your personal data.
                            </p>

                            <h3 class="text-xl font-bold">Objection to Processing</h3>
                            <p class="mb-4">
                                You have the right to object to our processing of your personal data.
                            </p>

                            <h3 class="text-xl font-bold">Withdraw Consent</h3>
                            <p class="mb-6">
                                Where we rely on your consent to process personal data, you have the right to withdraw that consent at any time.
                            </p>

                            <div class="highlight-box">
                                <p><strong>Exercising Your Rights:</strong> To exercise any of these rights, please contact our Data Protection Officer at dpo@beautify.com. We respond to all requests within 30 days.</p>
                            </div>
                        </div>

                        <!-- Children's Privacy -->
                        <div class="policy-section" id="children">
                            <h2 class="text-2xl font-serif font-bold mb-6">8. Children's Privacy</h2>
                            <p class="mb-4">
                                Our Service does not address anyone under the age of 16 ("Children").
                            </p>
                            <p class="mb-4">
                                We do not knowingly collect personally identifiable information from anyone under the age of 16. If you are a parent or guardian and you are aware that your Child has provided us with Personal Data, please contact us. If we become aware that we have collected Personal Data from children without verification of parental consent, we take steps to remove that information from our servers.
                            </p>
                        </div>

                        <!-- Policy Changes -->
                        <div class="policy-section" id="changes">
                            <h2 class="text-2xl font-serif font-bold mb-6">9. Changes to This Policy</h2>
                            <p class="mb-4">
                                We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.
                            </p>
                            <p class="mb-4">
                                We will let you know via email and/or a prominent notice on our Service, prior to the change becoming effective and update the "effective date" at the top of this Privacy Policy.
                            </p>
                            <p>
                                You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.
                            </p>
                        </div>

                        <!-- Contact -->
                        <div class="policy-section" id="contact">
                            <h2 class="text-2xl font-serif font-bold mb-6">10. Contact Us</h2>
                            <p class="mb-8">
                                If you have any questions about this Privacy Policy, please contact us:
                            </p>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="contact-card bg-white p-6 border border-gray-100">
                                    <div class="update-badge">Recommended</div>
                                    <h3 class="text-xl font-bold mb-4">Email</h3>
                                    <p class="mb-4">
                                        For general privacy questions:
                                    </p>
                                    <a href="mailto:privacy@beautify.com" class="text-primary font-medium">privacy@beautify.com</a>
                                    <p class="mt-4">
                                        For data protection officer:
                                    </p>
                                    <a href="mailto:dpo@beautify.com" class="text-primary font-medium">dpo@beautify.com</a>
                                </div>

                                <div class="contact-card bg-white p-6 border border-gray-100">
                                    <h3 class="text-xl font-bold mb-4">Mail</h3>
                                    <p class="mb-4">
                                        Beautify Fashion Ltd.<br>
                                        Attn: Privacy Officer<br>
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
        const sections = document.querySelectorAll('.policy-section');
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