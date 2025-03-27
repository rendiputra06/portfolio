<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .nav-link.active {
            border-left: 3px solid #0d6efd;
            color: #0d6efd !important;
            padding-left: calc(0.5rem - 3px);
        }
        html {
            scroll-behavior: smooth;
        }
        .sidebar-nav {
            position: sticky;
            top: 2rem;
            height: fit-content;
        }
    </style>
</head>
<body class="bg-light">
    <div class="min-vh-100 d-flex flex-column">
        <header class="bg-white shadow-sm">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center py-3">
                    <h1 class="h3 mb-0">{{ config('app.name', 'Laravel') }}</h1>
                </div>
            </div>
        </header>

        <main class="flex-grow-1">
            <div class="py-4">
                <div class="container">
                    <div class="row g-4">
                        @if(count($sections) > 0)
                        <div class="col-md-3">
                            <div class="bg-white p-3 rounded shadow-sm sidebar-nav">
                                <h2 class="h6 mb-3 pb-2 border-bottom">Daftar Isi</h2>
                                <nav class="nav flex-column">
                                    @foreach($sections as $section)
                                        <a href="#section-{{ $section->id }}" 
                                           class="nav-link text-dark mb-2 ps-3">
                                            {{ $section->title }}
                                        </a>
                                    @endforeach
                                </nav>
                            </div>
                        </div>
                        @endif
                        
                        <div class="{{ count($sections) > 0 ? 'col-md-9' : 'col-12' }}">
                            @foreach($sections as $section)
                                <div id="section-{{ $section->id }}" class="bg-white shadow-sm rounded mb-4 scroll-margin-top-4">
                                    <div class="p-4 border-bottom">
                                        <h2 class="h6 mb-3">{{ $section->title }}</h2>
                                        
                                        @if($section->content_type === 'App\\Models\\ProfileCard')
                                            @include('sections.profile_card', ['profileCard' => $section->content])
                                        @elseif($section->content_type === 'App\\Models\\TextDescription')
                                            @include('sections.text_description', ['textDescription' => $section->content])
                                        @elseif($section->content_type === 'App\\Models\\DataTable')
                                            @include('sections.data_table', ['dataTable' => $section->content])
                                        @elseif($section->content_type === 'App\\Models\\TagCollection')
                                            @include('sections.tag_collection', ['tagCollection' => $section->content])
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
        <footer class="bg-white shadow-sm mt-auto">
            <div class="container py-3">
                <p class="text-center text-muted mb-0">&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}</p>
            </div>
        </footer>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sections = document.querySelectorAll('[id^="section-"]');
            const navLinks = document.querySelectorAll('.nav-link');
            
            function setActiveLink() {
                let activeSection = null;
                const scrollPosition = window.scrollY + 100;
                
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.offsetHeight;
                    
                    if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                        activeSection = section.getAttribute('id');
                    }
                });
                
                navLinks.forEach(link => {
                    const href = link.getAttribute('href').substring(1);
                    if (href === activeSection) {
                        link.classList.add('active');
                    } else {
                        link.classList.remove('active');
                    }
                });
            }
            
            window.addEventListener('scroll', setActiveLink);
            setActiveLink();
        });
    </script>
</body>
</html> 