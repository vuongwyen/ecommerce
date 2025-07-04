<div>
    <style>
        .hero-careers {
            background: linear-gradient(rgba(26, 26, 46, 0.85), rgba(26, 26, 46, 0.9)), url('https://images.unsplash.com/photo-1543269865-cbf427effbad?ixlib=rb-4.0.3&auto=format&fit=crop&w=1770&q=80');
            background-size: cover;
            background-position: center;
        }

        .value-card {
            transition: all 0.3s ease;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .value-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .job-card {
            transition: all 0.3s ease;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border-left: 4px solid #9C7CF6;
        }

        .testimonial-card {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            border-radius: 16px;
        }

        .benefit-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: rgba(156, 124, 246, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .benefit-item:hover .benefit-icon {
            background: #9C7CF6;
            transform: scale(1.1);
        }

        .benefit-item:hover .benefit-icon i {
            color: white;
        }

        .process-step {
            position: relative;
            padding: 30px;
            border-radius: 16px;
            text-align: center;
            z-index: 1;
        }

        .process-step:after {
            content: '';
            position: absolute;
            top: 50%;
            right: -60px;
            width: 60px;
            height: 2px;
            background: #9C7CF6;
            z-index: -1;
        }

        .process-step:last-child:after {
            display: none;
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

        @media (max-width: 768px) {
            .process-step:after {
                display: none;
            }
        }
    </style>
    <!-- Hero Section -->
    <section class="hero-careers py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-serif font-bold text-white mb-6">
                Shape the Future of Fashion
            </h1>
            <p class="text-xl text-white/90 max-w-3xl mx-auto mb-8">
                Join our passionate team of innovators, creators, and visionaries at Beautify. Together, we're redefining sustainable fashion.
            </p>
            <div class="flex justify-center space-x-4">
                <a href="#openings" class="px-8 py-3 bg-primary text-white font-medium rounded-lg hover:bg-purple-700 transition-colors">
                    View Open Positions
                </a>
                <a href="#culture" class="px-8 py-3 bg-white text-dark font-medium rounded-lg hover:bg-gray-100 transition-colors">
                    Our Culture
                </a>
            </div>
        </div>
    </section>

    <!-- Why Beautify -->
    <section id="culture" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-serif font-bold mb-4">Why Join Beautify?</h2>
                <p class="text-lg text-gray-600">
                    We're building more than a fashion brand - we're creating a movement for positive change in the industry.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="value-card bg-white p-8">
                    <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center mb-6">
                        <i class="fas fa-leaf text-3xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Purpose-Driven Work</h3>
                    <p class="text-gray-600">
                        Every role contributes to our mission of sustainable fashion. 87% of employees say they find deep meaning in their work at Beautify.
                    </p>
                </div>

                <div class="value-card bg-white p-8">
                    <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center mb-6">
                        <i class="fas fa-chart-line text-3xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Growth Opportunities</h3>
                    <p class="text-gray-600">
                        With our career development programs, 65% of leadership roles are filled by internal promotions each year.
                    </p>
                </div>

                <div class="value-card bg-white p-8">
                    <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center mb-6">
                        <i class="fas fa-users text-3xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Inclusive Culture</h3>
                    <p class="text-gray-600">
                        We celebrate diversity with team members from 32 countries speaking 18 languages. Our inclusive culture scores 94% in employee surveys.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Employee Spotlight -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-serif font-bold mb-4">Employee Spotlight</h2>
                <p class="text-lg text-gray-600">
                    Hear from our team members about their Beautify journey
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <div class="rounded-xl overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Employee spotlight" class="w-full h-auto">
                    </div>
                    <div class="absolute -bottom-6 -right-6 bg-primary text-white p-6 rounded-xl w-3/4">
                        <div class="flex items-center">
                            <div class="mr-4">
                                <h4 class="font-bold text-lg">Isabella Laurent</h4>
                                <p>Creative Director, 8 years at Beautify</p>
                            </div>
                            <div class="text-3xl">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <blockquote class="text-2xl font-serif text-gray-700 mb-8">
                        "Working at Beautify has allowed me to merge my passion for design with my commitment to sustainability. The creative freedom and support for innovation here are unparalleled."
                    </blockquote>
                    <p class="text-gray-600 mb-6">
                        Isabella joined Beautify as a junior designer and now leads our entire creative team. She pioneered our recycled materials program that has diverted 12 tons of waste from landfills.
                    </p>
                    <div class="flex items-center">
                        <a href="#" class="px-6 py-2 border-2 border-primary text-primary font-medium rounded-lg hover:bg-primary hover:text-white transition-colors">
                            View Creative Roles
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits -->
    <section class="py-20 bg-primary/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-serif font-bold mb-4">Employee Benefits</h2>
                <p class="text-lg text-gray-600">
                    We invest in our team's wellbeing, growth, and future
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="benefit-item text-center p-6">
                    <div class="benefit-icon mx-auto">
                        <i class="fas fa-heartbeat text-3xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Health & Wellness</h3>
                    <p class="text-gray-600">
                        Comprehensive medical, dental, and vision coverage. On-site yoga and meditation classes.
                    </p>
                </div>

                <div class="benefit-item text-center p-6">
                    <div class="benefit-icon mx-auto">
                        <i class="fas fa-graduation-cap text-3xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Learning & Development</h3>
                    <p class="text-gray-600">
                        $5,000 annual education stipend. Access to industry conferences and workshops.
                    </p>
                </div>

                <div class="benefit-item text-center p-6">
                    <div class="benefit-icon mx-auto">
                        <i class="fas fa-umbrella-beach text-3xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Time Off</h3>
                    <p class="text-gray-600">
                        Flexible PTO policy. Paid parental leave. 2-week company-wide winter break.
                    </p>
                </div>

                <div class="benefit-item text-center p-6">
                    <div class="benefit-icon mx-auto">
                        <i class="fas fa-tshirt text-3xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Fashion Perks</h3>
                    <p class="text-gray-600">
                        Seasonal clothing allowance. Employee discount. Sample sales.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Job Openings -->
    <section id="openings" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-serif font-bold mb-4">Current Openings</h2>
                <p class="text-lg text-gray-600">
                    Explore opportunities to join our growing team
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
                <div class="job-card bg-white p-8">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-xl font-bold">Senior Fashion Designer</h3>
                            <div class="flex items-center mt-2">
                                <span class="text-sm bg-primary/10 text-primary px-3 py-1 rounded-full mr-3">Design</span>
                                <span class="text-gray-500 text-sm"><i class="fas fa-map-marker-alt mr-1"></i> Paris, FR</span>
                            </div>
                        </div>
                        <span class="text-primary font-bold">Full-time</span>
                    </div>
                    <p class="text-gray-600 mb-6">
                        Lead seasonal collections with a focus on sustainable materials and innovative silhouettes. Minimum 7 years experience in luxury fashion.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500">Posted 3 days ago</span>
                        <a href="#" class="text-primary font-medium flex items-center">
                            Apply Now
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <div class="job-card bg-white p-8">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-xl font-bold">Sustainability Analyst</h3>
                            <div class="flex items-center mt-2">
                                <span class="text-sm bg-primary/10 text-primary px-3 py-1 rounded-full mr-3">Operations</span>
                                <span class="text-gray-500 text-sm"><i class="fas fa-map-marker-alt mr-1"></i> Remote</span>
                            </div>
                        </div>
                        <span class="text-primary font-bold">Full-time</span>
                    </div>
                    <p class="text-gray-600 mb-6">
                        Develop and implement sustainability metrics across our supply chain. Experience with LCA and ESG reporting required.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500">Posted 1 week ago</span>
                        <a href="#" class="text-primary font-medium flex items-center">
                            Apply Now
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <div class="job-card bg-white p-8">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-xl font-bold">E-commerce Manager</h3>
                            <div class="flex items-center mt-2">
                                <span class="text-sm bg-primary/10 text-primary px-3 py-1 rounded-full mr-3">Marketing</span>
                                <span class="text-gray-500 text-sm"><i class="fas fa-map-marker-alt mr-1"></i> New York, US</span>
                            </div>
                        </div>
                        <span class="text-primary font-bold">Full-time</span>
                    </div>
                    <p class="text-gray-600 mb-6">
                        Drive our global online sales strategy. Expertise in Shopify Plus and digital customer journey optimization.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500">Posted 5 days ago</span>
                        <a href="#" class="text-primary font-medium flex items-center">
                            Apply Now
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <div class="job-card bg-white p-8">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-xl font-bold">Visual Merchandiser</h3>
                            <div class="flex items-center mt-2">
                                <span class="text-sm bg-primary/10 text-primary px-3 py-1 rounded-full mr-3">Retail</span>
                                <span class="text-gray-500 text-sm"><i class="fas fa-map-marker-alt mr-1"></i> Milan, IT</span>
                            </div>
                        </div>
                        <span class="text-primary font-bold">Full-time</span>
                    </div>
                    <p class="text-gray-600 mb-6">
                        Create compelling in-store experiences across our European flagship locations. 5+ years luxury retail experience.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500">Posted 2 days ago</span>
                        <a href="#" class="text-primary font-medium flex items-center">
                            Apply Now
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <a href="#" class="px-8 py-3 border-2 border-primary text-primary font-medium rounded-lg hover:bg-primary hover:text-white transition-colors">
                    View All Positions
                </a>
            </div>
        </div>
    </section>

    <!-- Application Process -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-serif font-bold mb-4">Our Hiring Process</h2>
                <p class="text-lg text-gray-600">
                    Transparent steps to join the Beautify team
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="process-step bg-primary/5">
                    <div class="text-4xl font-serif font-bold text-primary mb-4">1</div>
                    <h3 class="text-xl font-bold mb-3">Application Review</h3>
                    <p class="text-gray-600">
                        Our talent team reviews your application within 5 business days
                    </p>
                </div>

                <div class="process-step bg-primary/5">
                    <div class="text-4xl font-serif font-bold text-primary mb-4">2</div>
                    <h3 class="text-xl font-bold mb-3">Initial Interview</h3>
                    <p class="text-gray-600">
                        30-minute video call with our HR team
                    </p>
                </div>

                <div class="process-step bg-primary/5">
                    <div class="text-4xl font-serif font-bold text-primary mb-4">3</div>
                    <h3 class="text-xl font-bold mb-3">Team Interviews</h3>
                    <p class="text-gray-600">
                        Meet with potential colleagues and hiring managers
                    </p>
                </div>

                <div class="process-step bg-primary/5">
                    <div class="text-4xl font-serif font-bold text-primary mb-4">4</div>
                    <h3 class="text-xl font-bold mb-3">Offer</h3>
                    <p class="text-gray-600">
                        Decision within 48 hours after final interview
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-primary">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-serif font-bold text-white mb-6">
                Ready to Create with Us?
            </h2>
            <p class="text-xl text-white/90 max-w-2xl mx-auto mb-8">
                Even if you don't see the perfect role today, join our talent community to stay updated on future opportunities at Beautify.
            </p>
            <div class="flex flex-col sm:flex-row gap-3 max-w-lg mx-auto">
                <input type="email" placeholder="Your email address" class="flex-1 px-5 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-white">
                <button class="px-8 py-3 bg-white text-primary font-semibold rounded-lg hover:bg-gray-100 transition-colors">
                    Join Talent Community
                </button>
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
    </script>
</div>