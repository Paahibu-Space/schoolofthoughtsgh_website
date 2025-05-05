@extends('frontend.layout')
@section('styles'
)
 <style>

 </style>
@endsection
@section('content')
<section>
    <div class="stories-container">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Latest Stories</h1>
            <div class="flex space-x-4">
                <a href="{{ route('frontend.stories') }}" class="learn-btn">
                    Featured Stories
                </a>
            </div>
        </div>
    
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($stories as $story)
            <div class="story-card">
                @if($story->image_path)
                <img src="{{ asset('storage/' . $story->image_path) }}" alt="{{ $story->title }}" class="story-image">
                @endif
                <div class="story-content">
                    <div class="story-meta">
                        <span>{{ $story->published_at->format('M d, Y') }}</span>
                        @if($story->is_featured)
                        <span class="featured-badge">Featured</span>
                        @endif
                    </div>
                    <h2 class="story-title">{{ $story->title }}</h2>
                    <p class="story-excerpt">{{ Str::limit(strip_tags($story->content), 150) }}</p>
                    <a href="{{ route('stories.show', $story->id) }}" class="learn-btn">
                        Read Story →
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12">
                <p class="text-gray-500 text-lg">No stories available yet. Check back later!</p>
            </div>
            @endforelse
        </div>
    
        <div class="pagination mt-12">
            {{ $stories->links() }}
        </div>
    </div>
</section>

@endsection