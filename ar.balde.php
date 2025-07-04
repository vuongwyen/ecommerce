@extends('layouts.app')

@section('title', 'Articles')
@section('meta_description', 'Browse our latest articles.')

@section('content')
<div>
    <style>
        .article-card {
            transition: all 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .category-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #4F46E5;
            color: white;
            font-size: 12px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 20px;
            z-index: 10;
        }

        .pagination .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            margin: 0 4px;
            color: #4F46E5;
            font-weight: 500;
        }

        .pagination .page-link:hover,
        .pagination .active .page-link {
            background: #4F46E5;
            color: white;
        }

        .author-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #E5E7EB;
        }

        .read-time {
            display: flex;
            align-items: center;
            color: #6B7280;
            font-size: 14px;
        }

        .read-time i {
            margin-right: 5px;
            color: #10B981;
        }
    </style>

    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-primary to-purple-600 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Insightful Articles</h1>
                <p class="text-xl text-purple-100 max-w-3xl mx-auto">
                    Explore our collection of thought-provoking articles written by industry experts and passionate writers.
                </p>
                <div class="mt-8 max-w-md mx-auto">
                    <div class="relative">
                        <input type="text" placeholder="Search articles..." class="w-full pl-12 pr-4 py-3 border border-white/30 bg-white/20 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-white placeholder-purple-200">
                        <i class="fas fa-search absolute left-4 top-3.5 text-purple-200"></i>
                        <button class="absolute right-2 top-2 bg-white text-primary px-4 py-1.5 rounded-md font-medium hover:bg-gray-100">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Articles Grid -->
            <div class="w-full lg:w-3/4">
                <!-- Filter Section -->
                <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                        <div>
                            <h2 class="text-2xl font-bold text-dark">Latest Articles</h2>
                            <p class="text-gray-600">Discover our most recent publications</p>
                        </div>

                        <div class="flex flex-wrap gap-3">
                            <div class="relative">
                                <select class="pl-10 pr-8 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                    <option>All Categories</option>
                                    <option>Technology</option>
                                    <option>Design</option>
                                    <option>Business</option>
                                    <option>Health</option>
                                </select>
                                <i class="fas fa-tag absolute left-3 top-3 text-gray-400"></i>
                            </div>

                            <div class="relative">
                                <select class="pl-10 pr-8 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                    <option>Newest First</option>
                                    <option>Most Popular</option>
                                    <option>Trending</option>
                                </select>
                                <i class="fas fa-sort absolute left-3 top-3 text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Articles Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                    @foreach ($articles as $article)
                    <div class="article-card bg-white">
                        <div class="relative">
                            <a href="{{ route('articles.show', $article->slug) }}">
                                <img src="{{ asset('storage/' . $article->featured_image) }}"
                                    alt="{{ $article->title }}"
                                    class="w-full h-56 object-cover">
                            </a>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="ml-3">
                                        <p class="font-medium text-gray-900">{{ $article->author->name ?? 'Unknown' }}</p>
                                        <p class="text-gray-500 text-sm">{{ $article->published_at ? $article->published_at->format('M d, Y') : '' }}</p>
                                    </div>
                                </div>
                                <div class="read-time">
                                    <i class="fas fa-clock"></i> 5 min read
                                </div>
                            </div>

                            <a href="{{ route('articles.show', $article->slug) }}" class="text-xl font-bold text-dark hover:text-primary mb-3 block">{{ $article->title }}</a>

                            <div class="flex justify-between items-center">
                                <div class="flex">
                                    <button class="w-9 h-9 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:bg-gray-50 mr-2">
                                        <i class="far fa-bookmark"></i>
                                    </button>
                                    <button class="w-9 h-9 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:bg-gray-50">
                                        <i class="far fa-share-square"></i>
                                    </button>
                                </div>
                                <a href="{{ route('articles.show', $article->slug) }}" class="text-primary font-medium flex items-center">
                                    Read More
                                    <i class="fas fa-arrow-right ml-2 text-sm"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    <div class="flex justify-center">
                        <nav class="pagination">
                            <ul class="flex">
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <span class="page-link">...</span>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">8</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="w-full lg:w-1/4">
                <div class="bg-white rounded-xl shadow-sm p-6 mb-6 sticky top-24">
                    <h3 class="font-bold text-lg mb-4">Popular Categories</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="flex justify-between items-center py-2 text-gray-700 hover:text-primary">
                                <span>Technology</span>
                                <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-full text-xs">24</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex justify-between items-center py-2 text-gray-700 hover:text-primary">
                                <span>Design</span>
                                <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-full text-xs">18</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex justify-between items-center py-2 text-gray-700 hover:text-primary">
                                <span>Business</span>
                                <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-full text-xs">15</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex justify-between items-center py-2 text-gray-700 hover:text-primary">
                                <span>Health & Wellness</span>
                                <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-full text-xs">12</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex justify-between items-center py-2 text-gray-700 hover:text-primary">
                                <span>Productivity</span>
                                <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-full text-xs">9</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                    <h3 class="font-bold text-lg mb-4">Featured Authors</h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="#" class="flex items-center space-x-3">
                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                    alt="Author"
                                    class="w-12 h-12 rounded-full object-cover">
                                <div>
                                    <h4 class="font-medium">Sarah Johnson</h4>
                                    <p class="text-gray-500 text-sm">Tech Journalist</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center space-x-3">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                    alt="Author"
                                    class="w-12 h-12 rounded-full object-cover">
                                <div>
                                    <h4 class="font-medium">Michael Chen</h4>
                                    <p class="text-gray-500 text-sm">Design Director</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center space-x-3">
                                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                    alt="Author"
                                    class="w-12 h-12 rounded-full object-cover">
                                <div>
                                    <h4 class="font-medium">Emma Rodriguez</h4>
                                    <p class="text-gray-500 text-sm">Business Analyst</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="bg-gradient-to-r from-primary to-purple-600 rounded-xl shadow-sm p-6 text-white">
                    <h3 class="font-bold text-lg mb-3">Subscribe to Our Newsletter</h3>
                    <p class="mb-4 text-purple-100">Get the latest articles delivered to your inbox weekly.</p>
                    <div class="space-y-3">
                        <input type="email" placeholder="Your email address" class="w-full px-4 py-3 border border-white/30 bg-white/20 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-white placeholder-purple-200">
                        <button class="w-full bg-white text-primary font-medium py-3 rounded-lg hover:bg-gray-100">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection