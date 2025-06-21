<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <style>
        /* Enhanced navbar styling */
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: #4e73df !important;
        }
        
        .navbar-brand:hover {
            color: #2e59d9 !important;
        }
        
        .nav-link {
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            transform: translateY(-1px);
        }
        
        .navbar {
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }
        
        /* Dark mode navbar styling */
        [data-bs-theme="dark"] .navbar {
            background-color: rgba(33, 37, 41, 0.95) !important;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        [data-bs-theme="dark"] .navbar-brand {
            color: #6f9ceb !important;
        }
        
        [data-bs-theme="dark"] .navbar-brand:hover {
            color: #8bb3f0 !important;
        }
        
        [data-bs-theme="dark"] .nav-link {
            color: rgba(255,255,255,0.9) !important;
        }
        
        [data-bs-theme="dark"] .dropdown-menu {
            background-color: #2c3034;
            border: 1px solid rgba(255,255,255,0.1);
        }
        
        [data-bs-theme="dark"] .dropdown-item {
            color: rgba(255,255,255,0.9);
        }
        
        [data-bs-theme="dark"] .dropdown-item:hover {
            background-color: #3a3f44;
            color: #fff;
        }

        [data-bs-theme="dark"] h1 {
            color: white !important;
        }
        
        /* User avatar placeholder */
        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(45deg, #4e73df, #36b9cc);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 14px;
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm" id="mainNavbar">
            <div class="container">
                <!-- Enhanced brand with icon -->
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <i class="fas fa-shield-alt me-2"></i>
                    {{ config('app.name', 'Phishy') }}
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Navigation -->
                    <ul class="navbar-nav ms-auto align-items-center">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <i class="fas fa-sign-in-alt me-1"></i>{{ __('Login') }}
                                    </a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <i class="fas fa-user-plus me-1"></i>{{ __('Register') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <!-- Dark mode toggle -->
                            <li class="nav-item me-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="darkModeSwitch">
                                    <label class="form-check-label" for="darkModeSwitch">
                                        <i class="fas fa-moon"></i>
                                    </label>
                                </div>
                            </li>
                            
                            <!-- User dropdown -->
                            <li class="nav-item dropdown z-index-n2">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                                    <div class="user-avatar">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </div>
                                    {{ Auth::user()->name }}
                                    @if(auth()->user()->hasRole('admin'))
                                        <span class="badge bg-danger ms-2">Admin</span>
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="dropdown-header">
                                        <small class="text-muted">{{ Auth::user()->email }}</small>
                                    </div>
                                    
                                    <div class="dropdown-divider"></div>
                                    
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i>{{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    <!-- Dark mode JavaScript -->
    <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const htmlElement = document.documentElement;
        const switchElement = document.getElementById('darkModeSwitch');
        const navbar = document.getElementById('mainNavbar');
        
        if (switchElement) {
            const currentTheme = localStorage.getItem('bsTheme') || 'light';
            htmlElement.setAttribute('data-bs-theme', currentTheme);
            switchElement.checked = currentTheme === 'dark';
            updateIcon(currentTheme);
            
            switchElement.addEventListener('change', function() {
                if (this.checked) {
                    htmlElement.setAttribute('data-bs-theme', 'dark');
                    localStorage.setItem('bsTheme', 'dark');
                    updateIcon('dark');
                } else {
                    htmlElement.setAttribute('data-bs-theme', 'light');
                    localStorage.setItem('bsTheme', 'light');
                    updateIcon('light');
                }
            });
            
            function updateIcon(theme) {
                const icon = switchElement.nextElementSibling.querySelector('i');
                if (theme === 'dark') {
                    icon.className = 'fas fa-sun';
                } else {
                    icon.className = 'fas fa-moon';
                }
            }
        }
    });
    </script>
</body>
</html>
