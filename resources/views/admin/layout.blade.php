<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

</head>

<body>
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h5 class="sidebar-brand">Admin Portal</h5>
        </div>

        <div class="sidebar-menu">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                        href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-gauge"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/events*') ? 'active' : '' }}"
                        href="{{ route('admin.events.index') }}">
                        <i class="fas fa-calendar-days"></i>Events
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/team*') ? 'active' : '' }}" href="#">
                        <i class="fas fa-users"></i>Team
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/partners*') ? 'active' : '' }}" href="{{ route('admin.partners.index') }}">
                        <i class="fas fa-handshake"></i>Partners
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/blog*') ? 'active' : '' }}" href="{{ route('admin.blogs.index') }}">
                        <i class="fas fa-blog"></i>Blog
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/gallery*') ? 'active' : '' }}" href="#">
                        <i class="fas fa-images"></i>Gallery
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/stories*') ? 'active' : '' }}" href="{{ route('admin.stories.index') }}">
                        <i class="fas fa-book"></i>Stories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/newsletter*') ? 'active' : '' }}" href="#">
                        <i class="fas fa-envelope"></i>Newsletter
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}"
                        href="{{ route('admin.users.index') }}">
                        <i class="fas fa-users-cog"></i>Manage Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/settings*') ? 'active' : '' }}" href="#">
                        <i class="fas fa-gear"></i>Settings
                    </a>
                </li>
            </ul>
        </div>

        <div class="sidebar-footer">
            <a href="{{ route('admin.profile.edit') }}">
                <div class="user-profile mb-3">
                    <div class="user-avatar">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div>
                        <div class="text-white font-weight-medium">{{ Auth::user()->name }}</div>
                        <small class="text-white-50">{{ Auth::user()->email }}</small>
                    </div>
                </div>
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger w-100">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="content-wrapper">
        <div class="top-header">
            <button id="sidebarToggle" class="btn d-md-none">
                <i class="fas fa-bars"></i>
            </button>
            <h4 class="page-title">@yield('title')</h4>
            <div class="header-actions">
                @yield('actions')
            </div>
        </div>

        <div class="content-area">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Toggle sidebar on mobile
        $(document).ready(function() {
            $('#sidebarToggle').on('click', function() {
                $('#sidebar').toggleClass('active');
                $('.content-wrapper').toggleClass('sidebar-open');
            });
        });

        $(document).ready(function () {



$('.summernote').summernote({
    height: 400,   //set editable area's height
    codemirror: { // codemirror options
        theme: 'monokai'
    },
    callbacks: {
        onChange: function(contents, $editable) {
            
            let finalContenat =  iFrameFilterInSummernote(contents);

            // console.log(finalContenat)
            
            $(this).prev('textarea').val(finalContenat);
        }
    }
});
if($('.summernote').length > 0){
    $('.summernote').each(function(index,value){
        $(this).summernote('code', $(this).data('content'));
    });
}

});
    </script>
    <!-- jQuery (required for Summernote) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 4 Bundle JS (required for Summernote's popovers) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    @yield('scripts')
</body>

</html>
