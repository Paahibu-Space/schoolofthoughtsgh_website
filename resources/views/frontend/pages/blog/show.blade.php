{{-- resources/views/blogs/show.blade.php --}}
@extends('frontend.layout')

@section('content')

<div class="bg-gray-50">
    <!-- Blog Header -->
    <section class="relative">
        @if($blog->image_path)
            <div class="w-full h-96 bg-cover bg-center" style="background-image: url('{{ Storage::url($blog->image_path) }}')">
                <div class="absolute inset-0 bg-opacity-40" style="background: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.7))"></div>
                <div class="container mx-auto px-4 h-full flex items-center relative z-10">
                    <div class="max-w-4xl">
                        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $blog->title }}</h1>
                        <div class="flex items-center text-white text-sm">
                            <span class="flex items-center">
                                <i class="far fa-calendar-alt mr-2"></i>
                                {{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}
                            </span>
                            @if($blog->is_featured)
                                <span class="ml-4 bg-yellow-400 text-gray-900 px-3 py-1 rounded-full text-xs font-medium">Featured</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-4xl">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $blog->title }}</h1>
                <div class="flex items-center text-white text-sm">
                    <span class="flex items-center">
                        <i class="far fa-calendar-alt mr-2"></i>
                        {{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}
                    </span>
                    @if($blog->is_featured)
                        <span class="ml-4 bg-yellow-400 text-gray-900 px-3 py-1 rounded-full text-xs font-medium">Featured</span>
                    @endif
                </div>
            </div>
        @else
            <div class="bg-indigo-600 py-16">
                <div class="container mx-auto px-4">
                    <div class="max-w-4xl mx-auto">
                        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $blog->title }}</h1>
                        <div class="flex items-center text-white text-sm">
                            <span class="flex items-center">
                                <i class="far fa-calendar-alt mr-2"></i>
                                {{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}
                            </span>
                            @if($blog->is_featured)
                                <span class="ml-4 bg-yellow-400 text-gray-900 px-3 py-1 rounded-full text-xs font-medium">Featured</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>

    <!-- Blog Content -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-lg shadow-md p-6 md:p-10">
                    <div class="prose max-w-none">
                        {!! $blog->content !!}
                    </div>
                    
                    <!-- Social Share -->
                    <div class="mt-10 pt-6 border-t border-gray-200">
                        <h4 class="text-lg font-medium mb-4">Share this article</h4>
                        <div class="flex space-x-4">
                            <a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="bg-blue-600 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-blue-700 transition">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($blog->title) }}" target="_blank" class="bg-blue-400 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-blue-500 transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($blog->title) }}" target="_blank" class="bg-blue-800 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-blue-900 transition">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="mailto:?subject={{ urlencode($blog->title) }}&body={{ urlencode(request()->url()) }}" class="bg-red-500 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-red-600 transition">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Related Posts -->
                @php
                    $relatedPosts = \App\Models\Blog::where('id', '!=', $blog->id)
                        ->latest()
                        ->take(3)
                        ->get();
                @endphp
                
                @if($relatedPosts->count() > 0)
                <div class="mt-12">
                    <h3 class="text-2xl font-bold mb-6">Related Articles</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        @foreach($relatedPosts as $relatedPost)
                        <div class="bg-white rounded-lg overflow-hidden shadow-md transition-transform duration-300 hover:-translate-y-2">
                            <a href="{{ route('frontend.blog.show', $relatedPost->id) }}">
                                @if($relatedPost->image_path)
                                    <img src="{{ asset('storage/' . $relatedPost->image_path) }}" alt="{{ $relatedPost->title }}" class="w-full h-48 object-cover">
                                @else
                                    <img src="/api/placeholder/800/500" alt="{{ $relatedPost->title }}" class="w-full h-48 object-cover">
                                @endif
                            </a>
                            <div class="p-6">
                                <div class="flex items-center text-sm text-gray-500 mb-2">
                                    <i class="far fa-calendar-alt mr-2"></i>
                                    <span>{{ $relatedPost->published_at ? $relatedPost->published_at->format('M d, Y') : $relatedPost->created_at->format('M d, Y') }}</span>
                                </div>
                                <h3 class="text-xl font-bold mb-3 text-gray-800">
                                    <a href="{{ route('frontend.blog.show', $relatedPost->id) }}" class="hover:text-indigo-600 transition">{{ $relatedPost->title }}</a>
                                </h3>
                                <a href="{{ route('frontend.blog.show', $relatedPost->id) }}" class="inline-block text-indigo-600 font-medium hover:text-indigo-800 transition">
                                    Read More <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                
                <!-- Comments Section -->
                {{-- <div class="mt-12 bg-white rounded-lg shadow-md p-6 md:p-10">
                    <h3 class="text-2xl font-bold mb-6">Comments</h3>
                    
                    <!-- Comment Form -->
                    <form action="{{ route('comments.store', $blog->id) }}" method="POST" class="mb-10">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 mb-2">Name</label>
                            <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="comment" class="block text-gray-700 mb-2">Comment</label>
                            <textarea id="comment" name="content" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required></textarea>
                        </div>
                        <button type="submit" class="bg-indigo-600 text-white py-2 px-6 rounded-lg font-medium hover:bg-indigo-700 transition">Submit Comment</button>
                    </form>
                    
                    <!-- Comments List -->
                    @if(isset($comments) && $comments->count() > 0)
                        <div class="space-y-6">
                            @foreach($comments as $comment)
                            <div class="border-b border-gray-200 pb-6 last:border-b-0">
                                <div class="flex items-center mb-2">
                                    <div class="h-10 w-10 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-medium">
                                        {{ substr($comment->name, 0, 1) }}
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="font-medium">{{ $comment->name }}</h4>
                                        <span class="text-sm text-gray-500">{{ $comment->created_at->format('M d, Y') }}</span>
                                    </div>
                                </div>
                                <p class="text-gray-700">{{ $comment->content }}</p>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <p class="text-gray-500">No comments yet. Be the first to comment!</p>
                        </div>
                    @endif
                </div> --}}
            </div>
        </div>
    </section>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush
@endsection