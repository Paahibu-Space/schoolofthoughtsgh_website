<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Portal</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts - Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ Storage::url(setting('favicon')) }}" />
    <!-- Custom Admin Styles -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('styles')

    <style>
        :root {
            --primary-color: #4361ee;
            --primary-hover: #3a56d4;
            --secondary-color: #6c757d;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --warning-color: #f59e0b;
            --info-color: #3b82f6;
            --light-color: #f3f4f6;
            --dark-color: #1f2937;
            --sidebar-bg: #1e293b;
            --sidebar-active: #0f172a;
            --body-bg: #f9fafb;
            --card-bg: #ffffff;
            --card-border: #e5e7eb;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --text-light: #9ca3af;
            --sidebar-width: 280px;
            --header-height: 70px;
            --transition-speed: 0.3s;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--body-bg);
            color: var(--text-primary);
            transition: all var(--transition-speed);
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        #sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background-color: var(--sidebar-bg);
            color: #fff;
            transition: all var(--transition-speed);
            z-index: 1000;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }

        #sidebar.collapsed {
            width: 70px;
        }

        .sidebar-header {
            padding: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-brand {
            font-weight: 600;
            margin: 0;
            font-size: 1.25rem;
            color: white;
        }

        #sidebar.collapsed .sidebar-brand {
            display: none;
        }

        #sidebar.collapsed .toggle-text,
        #sidebar.collapsed .nav-link span {
            display: none;
        }

        .sidebar-menu {
            padding: 1.25rem 0;
            flex-grow: 1;
            overflow-y: auto;
        }

        .sidebar-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-item {
            margin-bottom: 0.25rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            color: rgba(255, 255, 255, 0.7);
            transition: all 0.2s ease;
            border-radius: 0.375rem;
            margin: 0 0.75rem;
            text-decoration: none;
        }

        .nav-link:hover, 
        .nav-link:focus {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .nav-link.active {
            color: #fff;
            background-color: var(--primary-color);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .nav-link i {
            width: 20px;
            margin-right: 10px;
            text-align: center;
        }
        
        .nav-link .fas.fa-chevron-down {
            font-size: 0.75rem;
            transition: transform 0.2s;
        }
        
        .nav-link[aria-expanded="true"] .fas.fa-chevron-down {
            transform: rotate(180deg);
        }

        #sidebar.collapsed .nav-link {
            padding: 0.75rem;
            justify-content: center;
        }

        #sidebar.collapsed .nav-link i {
            margin-right: 0;
        }
        
        #sidebar.collapsed .nav-link .fas.fa-chevron-down {
            display: none;
        }

        .sidebar-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .user-profile {
            display: flex;
            align-items: center;
            padding: 0.75rem 0;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background-color: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin-right: 12px;
        }

        #sidebar.collapsed .user-profile div:last-child,
        #sidebar.collapsed .logout-text {
            display: none;
        }

        /* Content Area Styles */
        .content-wrapper {
            margin-left: var(--sidebar-width);
            transition: margin var(--transition-speed);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .content-wrapper.expanded {
            margin-left: 70px;
        }

        .top-header {
            height: var(--header-height);
            background-color: var(--card-bg);
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .page-title {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .content-area {
            padding: 1.5rem;
            flex-grow: 1;
        }

        /* Card Styles */
        .card {
            background-color: var(--card-bg);
            border-radius: 0.5rem;
            border: 1px solid var(--card-border);
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            margin-bottom: 1.5rem;
            overflow: hidden;
        }

        .card-header {
            padding: 1.25rem 1.5rem;
            background-color: var(--card-bg);
            border-bottom: 1px solid var(--card-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-title {
            margin: 0;
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Button Styles */
        .btn {
            font-weight: 500;
            border-radius: 0.375rem;
            padding: 0.5rem 1rem;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
        }

        .btn-success {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }

        .btn-danger {
            background-color: var(--danger-color);
            border-color: var(--danger-color);
        }

        .btn-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            border-radius: 50%;
        }

        /* Table Styles */
        .table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }

        .table thead th {
            background-color: var(--light-color);
            font-weight: 600;
            padding: 0.75rem 1rem;
            color: var(--text-secondary);
            border-bottom: 1px solid var(--card-border);
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }

        .table tbody td {
            vertical-align: middle;
            padding: 1rem;
            border-bottom: 1px solid var(--card-border);
            color: var(--text-primary);
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Form Styles */
        .form-control,
        .form-select {
            border-radius: 0.375rem;
            border-color: var(--card-border);
            padding: 0.625rem 0.875rem;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.15);
        }

        .form-label {
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        /* Alert Styles */
        .alert {
            border-radius: 0.375rem;
            border: none;
            padding: 1rem 1.25rem;
        }

        .alert-success {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
        }

        .alert-danger {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger-color);
        }

        /* Accordion/Collapse Styles */
        .collapse-item {
            display: block;
            padding: 0.5rem 1rem 0.5rem 3rem;
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.2s ease;
            font-size: 0.875rem;
        }

        .collapse-item:hover,
        .collapse-item:focus {
            color: var(--primary-color);
            background-color: rgba(255, 255, 255, 0.05);
        }

        .collapse-item.active {
            color: var(--primary-color);
            background-color: rgba(67, 97, 238, 0.1);
        }

        .collapse-header {
            padding: 0.5rem 1rem;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* Media Queries for Responsive Layout */
        @media (max-width: 991.98px) {
            :root {
                --sidebar-width: 280px;
            }
            
            #sidebar {
                transform: translateX(-100%);
                width: var(--sidebar-width);
                position: fixed;
                top: 0;
                left: 0;
                height: 100%;
                z-index: 1050;
                overflow-y: auto;
            }

            #sidebar.active {
                transform: translateX(0);
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            }
            
            #sidebar.collapsed {
                width: var(--sidebar-width);
                transform: translateX(-100%);
            }
            
            #sidebar.collapsed.active {
                transform: translateX(0);
            }

            .content-wrapper {
                margin-left: 0;
                width: 100%;
            }

            .content-wrapper.sidebar-open {
                margin-left: 0;
            }
            
            /* Overlay when sidebar is active on mobile */
            .sidebar-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 1040;
                display: none;
            }
            
            .sidebar-overlay.active {
                display: block;
            }

            .top-header {
                padding: 0 1rem;
            }
            
            /* Hide desktop collapse button on mobile */
            #sidebarCollapseBtn {
                display: none !important;
            }
            
            /* Make sidebar toggle button more prominent */
            #sidebarToggle {
                width: 42px;
                height: 42px;
                font-size: 1.25rem;
                background-color: var(--light-color);
                border-radius: 0.375rem;
            }
        }
        
        /* Small devices (landscape phones) */
        @media (max-width: 767.98px) {
            .top-header {
                height: 60px;
            }
            
            .page-title {
                font-size: 1.1rem;
                max-width: 200px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            
            .content-area {
                padding: 1rem;
            }
            
            /* Adjust table for small screens */
            .table-responsive {
                border: 0;
            }
            
            /* Adjust form elements for small screens */
            .form-control, 
            .form-select, 
            .btn {
                font-size: 0.9rem;
            }
        }
        
        /* Extra small devices */
        @media (max-width: 575.98px) {
            :root {
                --sidebar-width: 100%;
            }
            
            .header-actions {
                gap: 0.5rem;
            }
            
            .card-header {
                padding: 1rem;
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
            
            .card-body {
                padding: 1rem;
            }
            
            /* Make sidebar take full width on extra small devices */
            #sidebar.active {
                width: 100%;
            }
        }

        /* Dropdown appearance improvement */
        .dropdown-menu {
            border-radius: 0.375rem;
            border: 1px solid var(--card-border);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 0.5rem 0;
        }

        .dropdown-item {
            padding: 0.5rem 1rem;
            color: var(--text-primary);
        }

        .dropdown-item:hover,
        .dropdown-item:focus {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary-color);
        }

        /* Toggle button for sidebar */
        #sidebarToggle {
            background-color: transparent;
            border: none;
            color: var(--text-secondary);
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 0.375rem;
            transition: all 0.2s ease;
        }

        #sidebarToggle:hover {
            background-color: var(--light-color);
            color: var(--text-primary);
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h5 class="sidebar-brand">
                <i class="fas fa-tachometer-alt me-2"></i>
                <span class="toggle-text">Admin Portal</span>
            </h5>
            <button id="sidebarCollapseBtn" class="d-none d-lg-block btn btn-sm btn-link text-white p-0">
                <i class="fas fa-chevron-left"></i>
            </button>
        </div>

        <div class="sidebar-menu">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                        href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-gauge"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/events*') ? 'active' : '' }}"
                        href="{{ route('admin.events.index') }}">
                        <i class="fas fa-calendar-days"></i>
                        <span>Events</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/team*') ? 'active' : '' }}"
                        href="{{ route('admin.team.index') }}">
                        <i class="fas fa-users"></i>
                        <span>Team</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/partners*') ? 'active' : '' }}"
                        href="{{ route('admin.partners.index') }}">
                        <i class="fas fa-handshake"></i>
                        <span>Partners</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/institutions*') ? 'active' : '' }}"
                        href="{{ route('admin.institutions.index') }}">
                        <i class="fas fa-building-columns"></i>
                        <span>Institutions Reached</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/blog*') ? 'active' : '' }}"
                        href="{{ route('admin.blogs.index') }}">
                        <i class="fas fa-blog"></i>
                        <span>Blog</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/newsletter*') ? 'active' : '' }}"
                        href="{{ route('admin.newsletter.index') }}">
                        <i class="fas fa-envelope"></i>
                        <span>Newsletter</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}"
                        href="{{ route('admin.users.index') }}">
                        <i class="fas fa-users-cog"></i>
                        <span>Manage Users</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/settings*') ? 'active' : 'collapsed' }}"
                        href="#collapseSettings" data-bs-toggle="collapse"
                        aria-expanded="{{ Request::is('admin/settings*') ? 'true' : 'false' }}">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Settings</span>
                        <i class="fas fa-chevron-down ms-auto"></i>
                    </a>

                    <div id="collapseSettings" class="collapse {{ Request::is('admin/settings*') ? 'show' : '' }}">
                        <div class="py-2 mt-1">
                            <a class="collapse-item {{ Request::is('admin/settings/about*') ? 'active' : '' }}"
                                href="{{ route('admin.settings.about') }}">
                                About Page
                            </a>
                            <a class="collapse-item {{ Request::is('admin/settings/website-settings*') ? 'active' : '' }}"
                                href="{{ route('admin.settings.website-settings.index') }}">
                                Website Settings
                            </a>
                            <a class="collapse-item {{ Request::is('admin/settings/website-settings*') ? 'active' : '' }}"
                                href="{{ route('admin.settings.email') }}">
                                Email Settings
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="sidebar-footer">
            <a href="{{ route('admin.profile.edit') }}" class="text-decoration-none">
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
                <button type="submit" class="btn btn-danger w-100 d-flex align-items-center justify-content-center gap-2">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="logout-text">Logout</span>
                </button>
            </form>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="content-wrapper">
        <div class="top-header">
            <div class="d-flex align-items-center">
                <button id="sidebarToggle" class="me-3">
                    <i class="fas fa-bars"></i>
                </button>
                <h4 class="page-title mb-0">@yield('title')</h4>
            </div>
            <div class="header-actions">
                {{-- <div class="dropdown me-2">
                    <button class="btn btn-light btn-icon" type="button" id="notificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            2
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown" style="width: 300px;">
                        <li><h6 class="dropdown-header">Notifications</h6></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="bg-primary text-white rounded-circle p-2" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="mb-0 fw-bold">New newsletter subscription</p>
                                    <p class="text-muted small mb-0">5 minutes ago</p>
                                </div>
                            </div>
                        </a></li>
                        <li><a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="bg-success text-white rounded-circle p-2" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="mb-0 fw-bold">New user registered</p>
                                    <p class="text-muted small mb-0">1 hour ago</p>
                                </div>
                            </div>
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-center text-primary" href="#">View all notifications</a></li>
                    </ul>
                </div> --}}
                @yield('actions')
            </div>
        </div>

        <div class="content-area">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle me-2"></i>
                        <div>{{ session('success') }}</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <div>{{ session('error') }}</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Create sidebar overlay div for mobile
            $('body').append('<div class="sidebar-overlay"></div>');
            
            // Toggle sidebar on mobile
            $('#sidebarToggle').on('click', function() {
                $('#sidebar').toggleClass('active');
                $('.sidebar-overlay').toggleClass('active');
                $('body').toggleClass('overflow-hidden');
            });
            
            // Close sidebar when clicking overlay
            $('.sidebar-overlay').on('click', function() {
                $('#sidebar').removeClass('active');
                $('.sidebar-overlay').removeClass('active');
                $('body').removeClass('overflow-hidden');
            });
            
            // Close sidebar on link click (mobile only)
            $('.nav-link').on('click', function() {
                if (window.innerWidth < 992) {
                    $('#sidebar').removeClass('active');
                    $('.sidebar-overlay').removeClass('active');
                    $('body').removeClass('overflow-hidden');
                }
            });
            
            // Collapse sidebar on desktop
            $('#sidebarCollapseBtn').on('click', function() {
                $('#sidebar').toggleClass('collapsed');
                $('.content-wrapper').toggleClass('expanded');
                
                // Toggle icon direction
                $(this).find('i').toggleClass('fa-chevron-left fa-chevron-right');
            });
            
            // Add active class to parent when dropdown item is active
            if ($('.collapse-item.active').length) {
                $('.collapse-item.active').closest('.collapse').addClass('show');
                $('.collapse-item.active').closest('.nav-item').find('.nav-link').removeClass('collapsed');
            }
            
            // Auto-close alerts after 5 seconds
            setTimeout(function() {
                $('.alert').alert('close');
            }, 5000);
            
            // Check window width and handle sidebar accordingly
            function checkWidth() {
                if (window.innerWidth < 992) {
                    $('#sidebar').removeClass('collapsed');
                    $('.content-wrapper').removeClass('expanded');
                }
            }
            
            // Run on load
            checkWidth();
            
            // Run on resize
            $(window).resize(function() {
                checkWidth();
            });
        });
    </script>

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>

    <script>
        // Initialize CKEditor if the element exists
        document.addEventListener('DOMContentLoaded', function() {
            const editorElement = document.querySelector('#content');
            if (editorElement) {
                ClassicEditor
                    .create(editorElement, {
                        simpleUpload: {
                            uploadUrl: '{{ route('admin.ckeditor.upload') }}',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        },
                        toolbar: {
                            items: [
                                'heading',
                                '|',
                                'bold',
                                'italic',
                                'link',
                                'bulletedList',
                                'numberedList',
                                '|',
                                'outdent',
                                'indent',
                                '|',
                                'imageUpload',
                                'blockQuote',
                                'insertTable',
                                'mediaEmbed',
                                'undo',
                                'redo'
                            ]
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        });
    </script>

    @yield('scripts')
    @stack('scripts')
</body>

</html>