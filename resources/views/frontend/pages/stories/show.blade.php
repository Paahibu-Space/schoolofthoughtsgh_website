@extends('frontend.layout')

@section('content')
    <div class="stories-container">
        <div class="single-story">
            @if ($story->image_path)
                <img src="{{ asset('storage/' . $story->image_path) }}" alt="{{ $story->title }}" class="single-story-image">
            @endif

            <div class="single-story-content">
                <div class="single-story-meta">
                    <div class="author-info">
                        @if ($story->author && $story->author->profile_photo_path)
                            <img src="{{ asset('storage/' . $story->author->profile_photo_path) }}"
                                alt="{{ $story->title }}}" alt="{{ $story->author->name }}" class="author-avatar">
                        @else
                            <div class="author-avatar bg-gray-300 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        @endif
                        <div>
                            <p class="author-name">{{ $story->author ? $story->author->name : 'Anonymous' }}</p>
                            {{-- <p class="publish-date">{{ $story->published_at->format('M d, Y') }}</p> --}}
                        </div>
                    </div>
                    @if ($story->is_featured)
                        <span class="featured-badge">Featured Story</span>
                    @endif
                </div>

                <h1 class="single-story-title">{{ $story->title }}</h1>

                <div class="single-story-body">
                    {!! $story->content !!}
                </div>

                <div class="mt-12 pt-6 border-t border-gray-200">
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-4">
                            <!-- Social sharing buttons -->
                            <button class="social-share-button" data-platform="twitter">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84">
                                    </path>
                                </svg>
                            </button>
                            <button class="social-share-button" data-platform="facebook">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z">
                                    </path>
                                </svg>
                            </button>
                            <button class="social-share-button" data-platform="linkedin">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <a href="{{ route('frontend.stories') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                            ← Back to Stories
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @if ($relatedStories->count())
            <div class="mt-12">
                <h2 class="text-2xl font-semibold text-gray-900 mb-6">You Might Also Like</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($relatedStories as $related)
                        <div class="story-card">
                            @if ($related->image_path)
                                <img src="{{ asset('storage/' . $related->image_path) }}" alt="{{ $related->title }}"
                                    class="story-image">
                            @endif
                            <div class="story-content">
                                <h3 class="story-title">{{ $related->title }}</h3>
                                <p class="story-excerpt">{{ Str::limit(strip_tags($related->content), 100) }}</p>
                                <a href="{{ route('stories.show', $related) }}"
                                    class="text-blue-600 hover:text-blue-800 font-medium">
                                    Read Story →
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const shareButtons = document.querySelectorAll('.social-share-button');

            shareButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const platform = this.getAttribute('data-platform');
                    const url = encodeURIComponent(window.location.href);
                    const title = encodeURIComponent(document.title);

                    let shareUrl;

                    switch (platform) {
                        case 'twitter':
                            shareUrl = `https://twitter.com/intent/tweet?url=${url}&text=${title}`;
                            break;
                        case 'facebook':
                            shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
                            break;
                        case 'linkedin':
                            shareUrl =
                                `https://www.linkedin.com/shareArticle?mini=true&url=${url}&title=${title}`;
                            break;
                    }

                    window.open(shareUrl, '_blank', 'width=600,height=400');
                });
            });
        });
    </script>
@endsection
