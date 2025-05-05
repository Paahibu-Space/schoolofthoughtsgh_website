{{-- resources/views/blogs/index.blade.php --}}
@extends('frontend.layout')

@section('content')
<div class="bg-gray-50">
    <!-- Hero Section -->
    {{-- <section class="bg-indigo-600 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Our Blog</h1>
            <p class="text-xl max-w-2xl mx-auto">Discover the latest insights, tips, and stories from our team.</p>
        </div>
    </section> --}}
    <section class="events-hero">
        <div class="hero-overlay"></div>
        <div class="container h-100 z-1">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="display-3 fw-bold text-white mb-4">Our Blog</h1>
                    <p class="text-white">Discover the latest insights, tips, and stories from our team.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Blog Section (if there are featured blogs) -->
    @php
        $featuredBlogs = $blogs->where('is_featured', true)->take(2);
    @endphp
    
    @if($featuredBlogs->count() > 0)
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8 text-center">Featured Posts</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($featuredBlogs as $blog)
                <div class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:-translate-y-2">
                    <div class="relative">
                        @if($blog->image_path)
                            <img src="{{ asset('storage/' . $blog->image_path) }}" alt="{{ $blog->title }}" class="w-full h-64 object-cover">
                        @else
                            <img src="/api/placeholder/800/500" alt="{{ $blog->title }}" class="w-full h-64 object-cover">
                        @endif
                        <span class="featured-badge bg-yellow-400 text-gray-800 font-medium px-3 py-1 rounded-full text-sm">Featured</span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <i class="far fa-calendar-alt mr-2"></i>
                            <span>{{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}</span>
                        </div>
                        <h3 class="text-2xl font-bold mb-3 text-gray-800">{{ $blog->title }}</h3>
                        <p class="text-gray-600 blog-content mb-4">{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 150) }}</p>
                        <a href="{{ route('frontend.blog.show', $blog->id) }}" class="learn-btn inline-block text-indigo-600 font-medium hover:text-indigo-800 transition">
                            Read More <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Blog Listings Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8 text-center">Latest Articles</h2>
            
            <!-- Filter and Search -->
            <form action="{{ route('frontend.blogs') }}" method="GET" class="mb-8 flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <div class="inline-flex items-center rounded-md border border-gray-300 bg-white">
                        <button type="submit" name="filter" value="all" class="px-4 py-2 text-sm font-medium {{ request('filter') == 'all' || !request('filter') ? 'text-indigo-600' : 'text-gray-700' }} hover:bg-gray-50 focus:z-10">All</button>
                        <button type="submit" name="filter" value="featured" class="px-4 py-2 text-sm font-medium {{ request('filter') == 'featured' ? 'text-indigo-600' : 'text-gray-700' }} hover:bg-gray-50 focus:z-10">Featured</button>
                        <button type="submit" name="filter" value="recent" class="px-4 py-2 text-sm font-medium {{ request('filter') == 'recent' ? 'text-indigo-600' : 'text-gray-700' }} hover:bg-gray-50 focus:z-10">Recent</button>
                    </div>
                </div>
                <div class="relative">
                    <input type="text" 
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Search articles..." 
                           class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    <button type="submit" class="absolute left-3 top-2.5 text-gray-400">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            
            <!-- Blog Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($blogs as $blog)
                <div class="bg-white rounded-lg overflow-hidden shadow-md transition-transform duration-300 hover:-translate-y-2">
                    <a href="{{ route('frontend.blog.show', $blog->id) }}">
                        @if($blog->image_path)
                            <img src="{{ asset('storage/' . $blog->image_path) }}" alt="{{ $blog->title }}" class="w-full h-48 object-cover">
                        @else
                            <img src="/api/placeholder/800/500" alt="{{ $blog->title }}" class="w-full h-48 object-cover">
                        @endif
                    </a>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <i class="far fa-calendar-alt mr-2"></i>
                            <span>{{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800">
                            <a href="{{ route('frontend.blog.show', $blog->id) }}" class="hover:text-indigo-600 transition">{{ $blog->title }}</a>
                        </h3>
                        <p class="text-gray-600 blog-content mb-4">{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 120) }}</p>
                        <a href="{{ route('frontend.blog.show', $blog->id) }}" class="learn-btn inline-block text-indigo-600 font-medium hover:text-indigo-800 transition">
                            Read More <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12">
                    <div class="text-gray-500 text-xl">No blog posts found.</div>
                    <p class="mt-4 text-gray-600">Check back later for new content or try a different search.</p>
                </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                {{ $blogs->appends(request()->query())->links() }}
            </div>
        </div>
    </section>
</div>

<style>
    .blog-content {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }
    .featured-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 10;
    }
</style>
@endsection