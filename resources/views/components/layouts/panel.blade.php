<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Contorl Panel Title --}}
    <title>{{ $title ? 'OsamaGenius: ' . $title : 'OsamaGenius: Dashboard' }}</title>

    {{-- Styles / Scripts --}}
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @else
        <style>

        </style>
    @endif

</head>

<body class="bg-light">

    <div class="wrapper">

        <div class="contant-wrapper h-full">

            @if (Route::currentRouteName() !== 'panel.login' && Route::currentRouteName() !== 'panel.auth.reset' && Route::currentRouteName() !== 'panel.auth.new')
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">

                    <div class="container">

                        <a class="navbar-brand" href="#">OsamaGenius</a>

                        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="collapsibleNavId">

                            @php
                                $links = [
                                    ['name' => 'Dashboard', 'route' => 'dashboard'],
                                    ['name' => 'Users', 'route' => 'users'],
                                    ['name' => 'About', 'route' => 'panel.about'],
                                    ['name' => 'Works', 'route' => 'panel.works'],
                                    ['name' => 'Skills', 'route' => 'panel.skills'],
                                    ['name' => 'Social Links', 'route' => 'panel.socials'],
                                ];
                            @endphp

                            <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                                @foreach ($links as $link)
                                    <li class="nav-item">
                                        <a class="nav-link @if (Route::currentRouteName() === $link['route']) active @endif"
                                            href="{{ route($link['route']) }}"
                                            @if ($link['name'] !== 'Dashboard') wire:navigate @endif>
                                            {{ $link['name'] }}
                                        </a>
                                    </li>
                                @endforeach
                                {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownId"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Experiences & Education</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownId">
                                    <a class="dropdown-item" href="#">Action 1</a>
                                    <a class="dropdown-item" href="#">Action 2</a>
                                </div>
                            </li> --}}
                            </ul>

                            {{-- <form class="d-flex my-2 my-lg-0">
                            <input class="form-control me-sm-2" type="text" placeholder="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form> --}}

                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"><i class="fas fa-search"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"><i class="fas fa-bell"></i></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-user"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                                        <a class="dropdown-item" href="{{route('panel.profile')}}">{{__('Profile')}}</a>
                                        <a class="dropdown-item" href="{{route('panel.logout')}}">{{__('Logout')}}</a>
                                    </div>
                                </li>
                            </ul>

                        </div>

                    </div>

                </nav>
            @endif

            <div class="position-relative">
                {{ $slot }}
            </div>

        </div>

        @if (Route::currentRouteName() !== 'panel.login' && Route::currentRouteName() !== 'panel.auth.reset' && Route::currentRouteName() !== 'panel.auth.new')
            <footer class="bg-white py-3">
                <div class="container">
                    <div class="row row-cols-1 row-cols-md-2 g-2">
                        <div class="col text-center text-md-start">All rights reseaved <a href="{{ route('homepage') }}"
                                target="_blank">@OsamaGenius</a></div>
                        <div class="col text-center text-md-end">
                            {{ date('Y') === '2025' ? date('Y') : '2024 - ' . date('Y') }}</div>
                    </div>
                </div>
            </footer>
        @endif

    </div>

</body>

</html>
