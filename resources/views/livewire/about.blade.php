<div>
    <style>
        .hero-section {
            background: linear-gradient(rgba(26, 26, 46, 0.85), rgba(26, 26, 46, 0.9)), url('https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1770&q=80');
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

        .timeline-item {
            position: relative;
            padding-left: 30px;
            margin-bottom: 40px;
        }

        .timeline-item:before {
            content: '';
            position: absolute;
            left: 0;
            top: 8px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #9C7CF6;
        }

        .timeline-item:after {
            content: '';
            position: absolute;
            left: 7px;
            top: 24px;
            width: 2px;
            height: calc(100% + 24px);
            background: #9C7CF6;
        }

        .team-member {
            transition: all 0.3s ease;
        }

        .team-member:hover {
            transform: translateY(-5px);
        }

        .team-social {
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease;
        }

        .team-member:hover .team-social {
            opacity: 1;
            transform: translateY(0);
        }

        .testimonial-card {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            border-radius: 16px;
        }

        .stats-item {
            border-right: 1px solid rgba(156, 124, 246, 0.2);
        }

        .stats-item:last-child {
            border-right: none;
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
    </style>
    <!-- Hero Section -->
    <section class="hero-section py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-serif font-bold text-white mb-6">
                Our Story of Style and Sustainability
            </h1>
            <p class="text-xl text-white/90 max-w-3xl mx-auto mb-8">
                Since 2010, Beautify has been redefining fashion with ethically crafted, trend-setting designs that empower individuality.
            </p>
            <div class="flex justify-center space-x-4">
                <a href="#" class="px-8 py-3 bg-primary text-white font-medium rounded-lg hover:bg-purple-700 transition-colors">
                    Explore Collections
                </a>
                <a href="#values" class="px-8 py-3 bg-white text-dark font-medium rounded-lg hover:bg-gray-100 transition-colors">
                    Our Values
                </a>
            </div>
        </div>
    </section>

    <!-- Introduction -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-3xl font-serif font-bold mb-6">Redefining Fashion Since 2010</h2>
                    <p class="text-lg mb-6">
                        Beautify was founded with a simple yet powerful vision: to create fashion that doesn't compromise on style, quality, or ethics. What began as a small boutique in Paris has grown into an internationally recognized brand with a commitment to sustainable luxury.
                    </p>
                    <p class="text-lg mb-6">
                        Our journey started when our founder, Isabella Laurent, noticed a gap in the market for fashion-forward clothing that also prioritized environmental responsibility and fair labor practices. Today, Beautify stands as a testament to what can be achieved when passion meets purpose.
                    </p>
                    <div class="flex space-x-4">
                        <div class="bg-white p-6 rounded-xl shadow-sm">
                            <div class="text-4xl font-bold text-primary mb-2">13+</div>
                            <div class="font-medium">Years in Fashion</div>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-sm">
                            <div class="text-4xl font-bold text-primary mb-2">45+</div>
                            <div class="font-medium">Countries Served</div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="rounded-xl overflow-hidden h-80">
                        <img src="https://images.unsplash.com/photo-1523381294911-8d3cead13475?ixlib=rb-4.0.3&auto=format&fit=crop&w=1770&q=80" alt="Beautify store interior" class="w-full h-full object-cover">
                    </div>
                    <div class="rounded-xl overflow-hidden h-80 mt-12">
                        <img src="https://images.unsplash.com/photo-1605733513597-a8f8341084e6?ixlib=rb-4.0.3&auto=format&fit=crop&w=1770&q=80" alt="Beautify design team" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values -->
    <section id="values" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-serif font-bold mb-4">Our Core Values</h2>
                <p class="text-lg text-gray-600">
                    These principles guide every decision we make, from design to delivery
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="value-card bg-light p-8">
                    <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center mb-6">
                        <i class="fas fa-leaf text-3xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Sustainable Practices</h3>
                    <p class="text-gray-600 mb-4">
                        We prioritize eco-friendly materials, ethical manufacturing, and minimal waste production. 78% of our materials are now sustainably sourced.
                    </p>
                    <a href="#" class="text-primary font-medium flex items-center">
                        Learn more
                        <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>

                <div class="value-card bg-light p-8">
                    <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center mb-6">
                        <i class="fas fa-star text-3xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Quality Craftsmanship</h3>
                    <p class="text-gray-600 mb-4">
                        Each piece undergoes 12 quality checks. We partner with artisans who take pride in creating garments built to last beyond seasonal trends.
                    </p>
                    <a href="#" class="text-primary font-medium flex items-center">
                        Our process
                        <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>

                <div class="value-card bg-light p-8">
                    <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center mb-6">
                        <i class="fas fa-heart text-3xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Customer Empowerment</h3>
                    <p class="text-gray-600 mb-4">
                        Fashion should make you feel confident. Our designs celebrate diverse body types and personal styles, helping you express your authentic self.
                    </p>
                    <a href="#" class="text-primary font-medium flex items-center">
                        Style guides
                        <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-serif font-bold mb-4">Our Journey</h2>
                <p class="text-lg text-gray-600">
                    Milestones in Beautify's evolution as a leader in sustainable fashion
                </p>
            </div>
            <!-- Timeline -->
            <div>
                <!-- Item -->
                <div class="group relative flex gap-x-5">
                    <!-- Right Content -->
                    <div class="grow pb-8 group-last:pb-0">
                        <div class="timeline-item">
                            <div class="bg-white p-6 rounded-xl shadow-sm">
                                <div class="text-primary font-bold mb-2">2010</div>
                                <h3 class="text-xl font-bold mb-3">Beautify Founded in Paris</h3>
                                <p class="text-gray-600">
                                    Our first boutique opened in Le Marais district, introducing our signature blend of Parisian elegance and sustainable practices.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Right Content -->
                </div>
                <!-- End Item -->

                <!-- Item -->
                <div class="group relative flex gap-x-5">
                    <!-- Right Content -->
                    <div class="grow pb-8 group-last:pb-0">
                        <div class="timeline-item">
                            <div class="bg-white p-6 rounded-xl shadow-sm">
                                <div class="text-primary font-bold mb-2">2013</div>
                                <h3 class="text-xl font-bold mb-3">Sustainable Materials Initiative</h3>
                                <p class="text-gray-600">
                                    We committed to using only certified organic cotton and recycled materials, setting a new industry standard.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Right Content -->
                </div>
                <!-- End Item -->

                <!-- Item -->
                <div class="group relative flex gap-x-5">
                    <!-- Right Content -->
                    <div class="grow pb-8 group-last:pb-0">
                        <div class="timeline-item">
                            <div class="bg-white p-6 rounded-xl shadow-sm">
                                <div class="text-primary font-bold mb-2">2016</div>
                                <h3 class="text-xl font-bold mb-3">Global Expansion</h3>
                                <p class="text-gray-600">
                                    Opened flagship stores in New York, Tokyo, and Milan. Launched our e-commerce platform serving 45+ countries.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Right Content -->
                </div>
                <!-- End Item -->

                <!-- Item -->
                <div class="group relative flex gap-x-5">
                    <!-- Right Content -->
                    <div class="grow pb-8 group-last:pb-0">
                        <div class="timeline-item">
                            <div class="bg-white p-6 rounded-xl shadow-sm">
                                <div class="text-primary font-bold mb-2">2019</div>
                                <h3 class="text-xl font-bold mb-3">Carbon Neutral Certification</h3>
                                <p class="text-gray-600">
                                    Achieved carbon-neutral status across all operations and introduced our clothing recycling program.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Right Content -->
                </div>
                <!-- End Item -->

                <!-- Item -->
                <div class="group relative flex gap-x-5">
                    <!-- Right Content -->
                    <div class="grow pb-8 group-last:pb-0">
                        <div class="timeline-item">
                            <div class="bg-white p-6 rounded-xl shadow-sm">
                                <div class="text-primary font-bold mb-2">2023</div>
                                <h3 class="text-xl font-bold mb-3">Innovation Hub Launch</h3>
                                <p class="text-gray-600">
                                    Established our Sustainable Fashion Lab to develop new eco-friendly materials and production techniques.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Right Content -->
                </div>
                <!-- End Item -->
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-serif font-bold mb-4">Leadership Team</h2>
                <p class="text-lg text-gray-600">
                    The passionate individuals shaping Beautify's vision
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="team-member text-center">
                    <div class="relative rounded-xl overflow-hidden mb-6">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Isabella Laurent" class="w-full h-80 object-cover">
                        <div class="team-social absolute bottom-4 left-0 right-0 flex justify-center space-x-3">
                            <a href="#" class="w-9 h-9 rounded-full bg-white flex items-center justify-center text-primary">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="w-9 h-9 rounded-full bg-white flex items-center justify-center text-primary">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold">Isabella Laurent</h3>
                    <p class="text-primary">Founder & Creative Director</p>
                </div>

                <div class="team-member text-center">
                    <div class="relative rounded-xl overflow-hidden mb-6">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Marcus Chen" class="w-full h-80 object-cover">
                        <div class="team-social absolute bottom-4 left-0 right-0 flex justify-center space-x-3">
                            <a href="#" class="w-9 h-9 rounded-full bg-white flex items-center justify-center text-primary">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="w-9 h-9 rounded-full bg-white flex items-center justify-center text-primary">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold">Marcus Chen</h3>
                    <p class="text-primary">CEO & Sustainability Officer</p>
                </div>

                <div class="team-member text-center">
                    <div class="relative rounded-xl overflow-hidden mb-6">
                        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Sophie Dubois" class="w-full h-80 object-cover">
                        <div class="team-social absolute bottom-4 left-0 right-0 flex justify-center space-x-3">
                            <a href="#" class="w-9 h-9 rounded-full bg-white flex items-center justify-center text-primary">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="w-9 h-9 rounded-full bg-white flex items-center justify-center text-primary">
                                <i class="fab fa-pinterest-p"></i>
                            </a>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold">Sophie Dubois</h3>
                    <p class="text-primary">Head of Design</p>
                </div>

                <div class="team-member text-center">
                    <div class="relative rounded-xl overflow-hidden mb-6">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="David Okoro" class="w-full h-80 object-cover">
                        <div class="team-social absolute bottom-4 left-0 right-0 flex justify-center space-x-3">
                            <a href="#" class="w-9 h-9 rounded-full bg-white flex items-center justify-center text-primary">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="w-9 h-9 rounded-full bg-white flex items-center justify-center text-primary">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold">David Okoro</h3>
                    <p class="text-primary">Global Operations Director</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-primary text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="stats-item text-center py-4 bg-gradient-to-r from-purple-600 via-pink-600 to-orange-500 bg-clip-text text-transparent">
                    <div class="text-4xl font-bold mb-2">13+</div>
                    <div class="font-medium">Years of Excellence</div>
                </div>

                <div class="stats-item text-center py-4 bg-gradient-to-r from-purple-600 via-pink-600 to-orange-500 bg-clip-text text-transparent">
                    <div class="text-4xl font-bold mb-2">250+</div>
                    <div class="font-medium">Dedicated Team Members</div>
                </div>

                <div class="stats-item text-center py-4 bg-gradient-to-r from-purple-600 via-pink-600 to-orange-500 bg-clip-text text-transparent">
                    <div class="text-4xl font-bold mb-2">78%</div>
                    <div class="font-medium">Sustainable Materials</div>
                </div>

                <div class="text-center py-4 bg-gradient-to-r from-purple-600 via-pink-600 to-orange-500 bg-clip-text text-transparent">
                    <div class="text-4xl font-bold mb-2">1M+</div>
                    <div class="font-medium">Happy Customers Worldwide</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-serif font-bold mb-4">Customer Love</h2>
                <p class="text-lg text-gray-600">
                    What our community says about Beautify
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="testimonial-card bg-white p-8">
                    <div class="flex text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 mb-6">
                        "Beautify's commitment to sustainability without compromising style is unmatched. Their pieces are timeless and make me feel confident every time I wear them."
                    </p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="Emma Johnson">
                        </div>
                        <div>
                            <h4 class="font-bold">Emma Johnson</h4>
                            <p class="text-gray-500">Loyal Customer Since 2015</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card bg-white p-8">
                    <div class="flex text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 mb-6">
                        "As a fashion blogger, I've seen countless brands come and go. Beautify stands out for their ethical practices and consistently stunning collections."
                    </p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                            <img src="https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="Alex Martinez">
                        </div>
                        <div>
                            <h4 class="font-bold">Alex Martinez</h4>
                            <p class="text-gray-500">Fashion Influencer</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card bg-white p-8">
                    <div class="flex text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="text-gray-600 mb-6">
                        "The quality and attention to detail in every Beautify garment is exceptional. I appreciate their transparency about sourcing and manufacturing."
                    </p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                            <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="James Wilson">
                        </div>
                        <div>
                            <h4 class="font-bold">James Wilson</h4>
                            <p class="text-gray-500">Fashion Editor</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-primary">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-serif font-bold text-dark mb-6 ">
                Join the Beautify Movement
            </h2>
            <p class="text-xl text-dark/90 max-w-2xl mx-auto mb-8">
                Subscribe to our newsletter for exclusive content, early access to new collections, and sustainable fashion tips.
            </p>
            <div class="flex flex-col sm:flex-row gap-3 max-w-lg mx-auto">
                <input type="email" placeholder="Your email address" class="flex-1 px-5 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-dark">
                <button class="px-8 py-3 bg-dark text-primary font-semibold rounded-lg hover:bg-gray-100 transition-colors">
                    Subscribe
                </button>
            </div>
            <p class="text-dark/70 mt-4 text-sm">
                15% off your first order when you subscribe
            </p>
        </div>
    </section>

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