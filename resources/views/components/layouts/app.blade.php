<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        {{-- Public view title --}}
        <title>{{ $title ?? 'Welcome to OsamaGenius world' }}</title>
        
        {{-- Styles / Scripts --}}
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @else
            <style>
                
            </style>
        @endif

    </head>
    <body>

        {{-- Top Header --}}
        @if (Route::currentRouteName() === 'homepage')
            <header class="header fade-sections">
        @else
            <header class="small-header fade-sections">
        @endif

            {{-- Header Links --}}
            <nav class="navbar navbar-expand-lg navbar-dark">

                <div class="container">
                    {{-- Website Brand --}}
                    <h1 class="navbar-brand">OsamaGenius</h1>
        
                    {{-- Responsive Button --}}
                    <button
                        class="navbar-toggler"
                        data-bs-target="#OsamaGeniusLinks"
                        data-bs-toggle="collapse"
                        aria-label="OsamaGeniusLinks"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
        
                    @php
                        $links = [
                            'Home'       => 'homepage',
                            'About'      => 'about',
                            'My Works'   => 'works',
                        ];
                    @endphp

                    {{-- Responsive Links --}}
                    <div id="OsamaGeniusLinks" class="collapse navbar-collapse">

                        <ul class="navbar-nav ms-auto">
                            @foreach ($links as $name => $route)
                                <li class="nav-item">
                                    <a href="{{route($route)}}" class="nav-link @if(Route::currentRouteName() === $route) active @endif">{{$name}}</a>
                                </li>
                            @endforeach
                            @guest
                                <li class="nav-item">
                                    <a 
                                        href="{{route('login')}}" 
                                        class="nav-link @if(Route::currentRouteName() === 'login') active @endif"
                                    >
                                        Login
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a 
                                        href="{{route('register')}}" 
                                        class="nav-link @if(Route::currentRouteName() === 'register') active @endif"
                                    >
                                        Register
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Account</a>
                                </li>
                            @endguest
                        </ul>

                    </div>

                </div>

            </nav>
    
            {{-- Header Caption --}}
            <div class="container position-relative">

                <div class="caption position-absolute">
    
                    <h1 class="text-light">Osama Abdelrahman</h1>
                    <h2 class="text-light">Web Developer & Graphic Designer</h2>
                    
                    <div class="mt-3">
                        <button class="btn btn-outline-light btn-lg s-200 me-3">About Me</button>
                        <button class="btn btn-outline-light btn-lg s-200">My Works</button>
                    </div>
    
                </div>

            </div>
            
        </header>

        <main class="my-0 py-0">

            {{ $slot }}

        </main>
        
        {{-- Footer  --}}
        <footer class="footer bg-white shadow-sm py-5 fade-sections">

            <div class="container">

                {{-- Upper Footer Part, Overview & Links --}}
                <div class="row row-cols-1 row-cols-md-2 g-3 py-3">

                    {{-- OsamaGenius Footer Text --}}
                    <div class="col">
                        <h3>OsamaGenius</h3>
                        <p>
                            Build your elegant modern templates, motion graphics, photos
                            manipulation, coding, creates advertisements, boosters, and more
                            all in one place, <strong>OsamaGenius</strong> is your target just
                            gives me your problem.
                        </p>
                    </div>

                    {{-- Footer Links --}}
                    <div class="col">

                        <div class="row row-cols-2 g-3">

                            {{-- Hot Links --}}
                            <div class="col">
                                <h4>Hot Links</h4>
                                <ul class="list-unstyled">
                                    <li class="mb-1">
                                    <a class="text-decoration-none" href="index.html">Home</a>
                                    </li>
                                    <li class="mb-1">
                                    <a class="text-decoration-none" href="about.html">About</a>
                                    </li>
                                    <li class="mb-1">
                                    <a class="text-decoration-none" href="works.html">Galary</a>
                                    </li>
                                    <li>
                                    <a class="text-decoration-none" href="contact.html"
                                        >Contact Me</a
                                    >
                                    </li>
                                </ul>
                            </div>

                            {{-- Privacy & Security --}}
                            <div class="col">
                                <h4>Privacy & Security</h4>
                                <ul class="list-unstyled">
                                    <li>
                                    <a class="text-decoration-none" href="#">Privacy</a>
                                    </li>
                                </ul>
                            </div>

                        </div>

                    </div>

                </div>

                {{-- Center Footer Part, Contact me Form --}}
                <div class="row py-3">

                    {{-- Gap Left --}}
                    <div class="col-12 col-md-2 col-lg-3"></div>
                    
                    <!-- Contact Form -->
                    <div class="col-12 col-md-8 col-lg-6">
                        
                        {{-- Title Of Topic --}}
                        <div class="form-floating mb-3">
                            <input
                                type="text"
                                name="subject"
                                id="subject"
                                class="form-control"
                                placeholder="What is in your mind?"
                            />
                            <label for="subject">What is in your mind?</label>
                        </div>

                        {{-- User Email Account --}}
                        <div class="form-floating mb-3">
                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control"
                                placeholder="Example@gmail.com"
                            />
                            <label for="email">Example@gmail.com</label>
                        </div>
                        
                        {{-- Topic Description --}}
                        <div class="form-floating mb-3">
                            <textarea
                                class="form-control"
                                name="body"
                                id="body"
                                placeholder="Your description"
                            ></textarea>
                            <label for="body">Your description</label>
                        </div>
                        
                        {{-- Send Request Button --}}
                        <div class="text-end">
                            <button class="btn btn-outline-success w-25">
                                <i class="fas fa-location-arrow me-2"></i>
                                Send
                            </button>
                        </div>
                        
                    </div>

                    {{-- Gap Right --}}
                    <div class="col-12 col-md-2 col-lg-3"></div>
                    
                </div>

                {{-- Lower Footer Part, Copyrights & Years --}}
                <div class="row row-cols-1 row-cols-md-2 g-3 py-3">
                    
                    {{-- Copyrights --}}
                    <div class="col">
                        <div class="text-center text-md-start">
                            All rights reserved <strong>@Osama Abdelrahman</strong>
                        </div>
                    </div>
                    
                    {{-- Years --}}
                    <div class="col">
                        <div class="text-center text-md-end">
                            {{ date('Y') === '2025' ? date('Y') : '2025 - ' . date('Y') }}
                        </div>
                    </div>

                </div>

            </div>

        </footer>

        <script src="{{asset('js/genius.js')}}"></script>

    </body>
</html>
