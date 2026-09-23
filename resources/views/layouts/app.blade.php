<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Community Service Internship Portal - Plaosan Village.">
    <title>@yield('title', 'KKN Plaosan Village - Community Service Portal')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Vite CSS -->
    @vite(['resources/css/app.css'])
    @yield('styles')
</head>
<body class="{{ $bodyClass ?? '' }}">

    <nav class="{{ request()->routeIs('home') ? 'transparent' : '' }}">
        <div class="logo">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 4px;"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 12 12 17 22 12"></polyline><polyline points="2 17 12 22 22 17"></polyline></svg>KKN <span>Plaosan</span>
        </div>
        
        <button class="mobile-menu-toggle" aria-label="Toggle Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div class="nav-links">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('projects') }}" class="{{ request()->routeIs('projects') ? 'active' : '' }}">Projects</a>
            <a href="{{ route('participants') }}" class="{{ request()->routeIs('participants') ? 'active' : '' }}">Participants</a>
            <a href="{{ route('downloads') }}" class="{{ request()->routeIs('downloads') ? 'active' : '' }}">Downloads</a>
            <a href="{{ route('report') }}" class="{{ request()->routeIs('report') ? 'active' : '' }}">Report</a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
            
            @auth
                <div class="user-dropdown" style="position: relative; display: inline-block; margin-left: 2.2rem;">
                    <button class="user-profile-btn" style="display: flex; align-items: center; justify-content: center; background: none; border: none; padding: 0; cursor: pointer; transition: all 0.3s ease; flex-shrink: 0; outline: none !important; box-shadow: none !important; appearance: none !important; -webkit-appearance: none !important; width: 36px; height: 36px; border-radius: 50%; overflow: hidden;">
                        <div style="width: 100%; height: 100%; background: var(--primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1rem; font-weight: 800; box-shadow: 0 4px 12px rgba(5, 150, 105, 0.3);">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                    </button>
                    <div class="dropdown-menu" style="position: absolute; top: calc(100% + 12px); right: 0; width: 260px; background: rgba(255, 255, 255, 0.98); backdrop-filter: blur(20px); border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.15); border: 1px solid rgba(0,0,0,0.05); padding: 0.8rem; opacity: 0; visibility: hidden; transform: translateY(10px); transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55); z-index: 1000;">
                        <div style="padding: 1.2rem; border-bottom: 1px solid #f1f5f9; margin-bottom: 0.5rem; text-align: center;">
                            <div style="width: 50px; height: 50px; background: var(--primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; margin: 0 auto 0.8rem; font-weight: 800;">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <p style="font-size: 1rem; color: var(--text-main); font-weight: 700; margin-bottom: 4px; line-height: 1.2;">{{ Auth::user()->name }}</p>
                            <p style="font-size: 0.8rem; color: var(--text-light); font-weight: 500;">NIM: {{ Auth::user()->nim }}</p>
                        </div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item" style="width: 100%; display: flex; align-items: center; gap: 12px; padding: 0.8rem 1rem; border-radius: 12px; border: none; background: transparent; color: #e11d48; cursor: pointer; transition: all 0.2s ease; font-weight: 600; font-size: 0.95rem; text-align: left;">
                                <div style="width: 32px; height: 32px; background: #fff1f2; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                </div>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary nav-auth-btn">Login</a>
            @endauth
        </div>
    </nav>

    <!-- Floating Social Sidebar -->
    <div class="floating-social-sidebar">
        <a href="https://www.instagram.com/institut_asia/" target="_blank" class="social-item ig" title="Instagram">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
        </a>
        <a href="https://www.youtube.com/@AsiaNesyen" target="_blank" class="social-item yt" title="YouTube">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.42a2.78 2.78 0 0 0-1.94 2C1 8.14 1 12 1 12s0 3.86.42 5.58a2.78 2.78 0 0 0 1.94 2C5.12 20 12 20 12 20s6.88 0 8.6-.42a2.78 2.78 0 0 0 1.94-2C23 15.86 23 12 23 12s0-3.86-.42-5.58z"></path><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"></polygon></svg>
        </a>
        <a href="https://www.tiktok.com/@asianesyen?_t=8iPaNLTVPqE&_r=1" target="_blank" class="social-item tt" title="TikTok">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5"></path></svg>
        </a>
    </div>

    <main>
        @yield('content')
    </main>



    <footer>
        <p>&copy; 2026 KKN Plaosan Village Team. Built for village progress. | <a href="{{ route('admin.reports.index') }}" style="color: var(--text-light); text-decoration: none; font-size: 0.85rem;">Admin Panel</a></p>
    </footer>

    @yield('modals')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Modal Logic (Global)
            document.querySelectorAll('.btn-read-more').forEach(btn => {
                btn.addEventListener('click', () => {
                    const modalId = btn.getAttribute('data-modal');
                    const modal = document.getElementById(modalId);
                    if(modal) {
                        modal.classList.add('active');
                        document.body.style.overflow = 'hidden';
                    }
                });
            });

            document.querySelectorAll('.close-modal').forEach(btn => {
                btn.addEventListener('click', () => {
                    const modalId = btn.getAttribute('data-modal');
                    document.getElementById(modalId).classList.remove('active');
                    document.body.style.overflow = '';
                });
            });

            document.querySelectorAll('.modal-overlay').forEach(overlay => {
                overlay.addEventListener('click', (e) => {
                    if (e.target === overlay) {
                        overlay.classList.remove('active');
                        document.body.style.overflow = '';
                    }
                });
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    document.querySelectorAll('.modal-overlay.active').forEach(m => {
                        m.classList.remove('active');
                        document.body.style.overflow = '';
                    });
                }
            });

            @yield('scripts')

            // Scroll Effect for Navbar
            const nav = document.querySelector('nav');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    nav.classList.add('scrolled');
                } else {
                    nav.classList.remove('scrolled');
                }
            });

            // Dropdown Toggle Logic
            const userProfileBtn = document.querySelector('.user-profile-btn');
            const dropdownMenu = document.querySelector('.dropdown-menu');

            if (userProfileBtn && dropdownMenu) {
                userProfileBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const isOpen = dropdownMenu.style.visibility === 'visible';
                    
                    if (isOpen) {
                        dropdownMenu.style.opacity = '0';
                        dropdownMenu.style.visibility = 'hidden';
                        dropdownMenu.style.transform = 'translateY(10px)';
                    } else {
                        dropdownMenu.style.opacity = '1';
                        dropdownMenu.style.visibility = 'visible';
                        dropdownMenu.style.transform = 'translateY(0)';
                    }
                });

                document.addEventListener('click', function() {
                    dropdownMenu.style.opacity = '0';
                    dropdownMenu.style.visibility = 'hidden';
                    dropdownMenu.style.transform = 'translateY(10px)';
                });
            }

            // Mobile Menu Toggle
            const menuToggle = document.querySelector('.mobile-menu-toggle');
            const navLinks = document.querySelector('.nav-links');

            if(menuToggle && navLinks) {
                menuToggle.addEventListener('click', () => {
                    menuToggle.classList.toggle('active');
                    navLinks.classList.toggle('active');
                });

                // Close menu when clicking a link
                navLinks.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', () => {
                        menuToggle.classList.remove('active');
                        navLinks.classList.remove('active');
                    });
                });
            }
        });
    </script>
</body>
</html>
