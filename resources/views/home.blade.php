<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .nav-link.active {
            border-color: #3b82f6;
            color: #3b82f6;
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
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <h1 class="text-2xl font-bold text-gray-900">{{ config('app.name', 'Laravel') }}</h1>
                </div>
            </div>
        </header>

        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="flex flex-col md:flex-row gap-8">
                        @if(count($sections) > 0)
                        <div class="md:w-1/4 lg:w-1/5">
                            <div class="bg-white p-4 rounded-lg shadow sidebar-nav">
                                <h2 class="text-lg font-semibold mb-3 border-b pb-2">Daftar Isi</h2>
                                <nav class="flex flex-col space-y-2">
                                    @foreach($sections as $section)
                                        <a href="#section-{{ $section->id }}" 
                                           class="nav-link px-3 py-2 text-sm font-medium rounded-md border-l-4 border-transparent hover:text-blue-600 hover:border-blue-600 transition-all">
                                            {{ $section->title }}
                                        </a>
                                    @endforeach
                                </nav>
                            </div>
                        </div>
                        @endif
                        
                        <div class="{{ count($sections) > 0 ? 'md:w-3/4 lg:w-4/5' : 'w-full' }}">
                            @foreach($sections as $section)
                                <div id="section-{{ $section->id }}" class="bg-white overflow-hidden shadow-sm rounded-lg mb-6 scroll-mt-8">
                                    <div class="p-6 bg-white border-b border-gray-200">
                                        <h2 class="text-1xl font-semibold mb-4">{{ $section->title }}</h2>
                                        {{-- @if($section->description)
                                            <p class="text-gray-600 mb-6">{{ $section->description }}</p>
                                        @endif --}}
                                        
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
        
        <footer class="bg-white shadow mt-auto">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <p class="text-center text-gray-500">&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}</p>
            </div>
        </footer>
    </div>

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