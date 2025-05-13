@extends('frontend.layout')

@section('content')
    <!-- Hero Section -->
    <section class="team-hero">
        <div class="hero-overlay"></div>
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="display-3 fw-bold text-white mb-4">Meet the Clonify Team</h1>
                    {{-- <p class=" text-white opacity-75">Driving innovation through collaboration</p> --}}
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="our-team-section py-5">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    {{-- <h5 class="text-primary mb-3">OUR TEAM</h5> --}}
                    {{-- <h1 class="display-3 fw-bold text-dark mb-3">Meet the Clonify Team</h1> --}}
                    <p class=" text-muted">
                        Alone we can do little, together we can do so much. Teamwork is the secret that makes common people achieve uncommon results.
                    </p>
                </div>
            </div>

            <div class="row g-4">
                @foreach($teamMembers as $member)
                <div class="col-md-6 col-lg-3">
                    <div class="our-team-card">
                        <div class="team-img-wrapper">
                            <img
                                src="{{ $member->photo ? Storage::url($member->photo) : asset('assets/images/team-default.png') }}"
                                alt="{{ $member->name }}"
                                class="img-fluid"
                                loading="lazy"
                            />
                            <div class="team-social-links">
                                @foreach($member->getActiveSocialLinks() as $platform => $url)
                                    <a href="{{ $url }}" target="_blank" class="social-link">
                                        <i class="fab fa-{{ $platform }}"></i>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="team-card-body">
                            <h4 class="mb-1">{{ $member->name }}</h4>
                            <p class="text-muted mb-2">{{ $member->role }}</p>
                            <p class="team-quote">{{ $member->description ?: 'Making a difference every day' }}</p>
                            <button class="btn btn-sm learn-btn view-details" 
                                    data-member-id="{{ $member->id }}">
                                View Profile
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Team Member Modal -->
    <div class="modal fade" id="teamMemberModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="row g-0">
                        <!-- Left Column - Image -->
                        <div class="col-md-5">
                            <div class="modal-img-wrapper h-100">
                                <img id="modalMemberImage" src="" alt="" class="img-fluid h-100 w-100 object-fit-cover">
                            </div>
                        </div>
                        
                        <!-- Right Column - Content -->
                        <div class="col-md-7">
                            <div class="p-4 p-lg-5">
                                <h3 id="modalMemberName" class="mb-2"></h3>
                                <p id="modalMemberRole" class="text-primary mb-4"></p>
                                
                                <div id="modalMemberBio" class="mb-4"></div>
                                
                                <div class="member-social-links mb-4">
                                    <h6 class="mb-3">Connect:</h6>
                                    <!-- Social links will be inserted here by JavaScript -->
                                </div>
                                
                                <div class="member-quote bg-light p-3 rounded mb-4">
                                    <i class="fas fa-quote-left text-primary me-2"></i>
                                    <span id="modalMemberQuote"></span>
                                </div>
                                
                                <div class="member-meta d-flex flex-wrap gap-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-sort-numeric-down me-2 text-muted"></i>
                                        <small class="text-muted">Display order: <span id="modalMemberOrder"></span></small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-circle me-2 text-success"></i>
                                        <small class="text-muted">Status: Active</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Team member modal functionality
    const viewButtons = document.querySelectorAll('.view-details');
    const modal = new bootstrap.Modal(document.getElementById('teamMemberModal'));
    
    viewButtons.forEach(button => {
        button.addEventListener('click', function() {
            const memberId = this.getAttribute('data-member-id');
            fetchMemberDetails(memberId);
        });
    });
    
    function fetchMemberDetails(memberId) {
        // In a real application, you would fetch this data via AJAX
        // For this example, we'll use data from the card
        
        const card = document.querySelector(`[data-member-id="${memberId}"]`).closest('.our-team-card');
        const name = card.querySelector('h4').textContent;
        const role = card.querySelector('.text-muted').textContent;
        const quote = card.querySelector('.team-quote').textContent;
        const imgSrc = card.querySelector('img').src;
        
        // Set modal content
        document.getElementById('modalMemberName').textContent = name;
        document.getElementById('modalMemberRole').textContent = role;
        document.getElementById('modalMemberQuote').textContent = quote;
        document.getElementById('modalMemberImage').src = imgSrc;
        document.getElementById('modalMemberImage').alt = name;
        
        // For demo purposes - in real app you'd get bio from AJAX
        document.getElementById('modalMemberBio').innerHTML = 
            `<p>This would be the detailed bio of ${name}, showing their background, experience, and role in the organization. In a real application, this would be pulled from the database.</p>`;
        
        // Add social links
        const socialLinksContainer = document.querySelector('.member-social-links');
        // Clear existing links except the heading
        while (socialLinksContainer.children.length > 1) {
            socialLinksContainer.removeChild(socialLinksContainer.lastChild);
        }
        
        // Get social links from the card (in real app, get from AJAX)
        const socialLinks = card.querySelectorAll('.social-link');
        socialLinks.forEach(link => {
            const clone = link.cloneNode(true);
            clone.classList.remove('social-link');
            clone.classList.add('btn', 'btn-outline-primary', 'me-2');
            socialLinksContainer.appendChild(clone);
        });
        
        // Show the modal
        modal.show();
    }
});
</script>
@endsection