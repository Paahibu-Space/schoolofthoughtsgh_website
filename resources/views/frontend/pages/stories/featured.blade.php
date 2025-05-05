@extends('frontend.layout')

@section('styles')

@endsection

@section('content')
<section class="featured-stories-section">
    <div class="stories-container">
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-gray-900">Featured Stories</h1>
            <p class="mt-2 text-lg text-gray-600">Our most compelling and noteworthy content</p>
        </div>
        
        <div class="space-y-8">
            @forelse($featuredStories as $story)
            <div class="featured-story-card">
                @if($story->image_path)
                <div class="featured-story-image">
                    <img src="{{ asset('storage/' . $story->image_path) }}" alt="{{ $story->title }}" class="w-full h-full object-cover">
                </div>
                @endif
                <div class="featured-story-details">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-sm text-gray-500">{{ $story->published_at->format('M d, Y') }}</span>
                        <span class="featured-badge">Featured</span>
                    </div>
                    <h2 class="story-title">{{ $story->title }}</h2>
                    <p class="story-excerpt">{{ Str::limit(strip_tags($story->content), 200) }}</p>
                    <a href="{{ route('stories.show', $story) }}" class="inline-block mt-4 text-blue-600 hover:text-blue-800 font-medium">
                        Read Full Story →
                    </a>
                </div>
            </div>
            @empty
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">No featured stories available at this time.</p>
            </div>
            @endforelse
        </div>
        
        <div class="mt-8 text-center">
            <a href="{{ route('stories.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                View All Stories
            </a>
        </div>
    </div>
</section>
@endsection