<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>KHJ - @yield('title')</title>
    <meta name="description" content="Externship Mission" />
    <link href="{{ asset('css/app_1.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app_2.css') }}" rel="stylesheet">
    <link rel="icon" href="https://img.icons8.com/material-rounded/24/000000/flower-doodle.png" />
</head>
<body class="t-leading-normal t-tracking-normal t-bg-[#F9F3F3]">
<div id="app">
    <!-- Nav -->
    <nav id="header" class="t-fixed t-w-full t-z-30 t-top-0 t-bg-white t-text-[#F25287]">
        <div class="t-container t-mx-auto t-flex t-flex-wrap t-items-center t-justify-between t-mt-0 t-py-2">
            <div class="t-pl-4 t-flex t-items-center t-text-3xl t-font-black">
                <a class="t-no-underline hover:t-text-[#F25287]" href="{{ route('home') }}">KHJ</a>
            </div>
            <div id="nav-content" class="t-w-full t-flex-grow t-flex t-items-center t-w-auto t-mt-2 t-mt-0 t-text-black t-p-4 t-p-0 t-z-20">
                <ul class="t-list-reset t-flex t-justify-end t-flex-1 t-items-center t-pt-2">
                    @guest
                        @if (\Illuminate\Support\Facades\Route::has('login'))
                            <li class="t-mr-3 {{ \Illuminate\Support\Str::startsWith(\Illuminate\Support\Facades\Route::currentRouteName(), 'login') ? 't-text-[#F25287]' : '' }}">
                                <a class="t-inline-block t-px-4 t-text-black t-font-bold t-no-underline hover:t-underline hover:t-text-[#F25287]" href="{{ route('login') }}">로그인</a>
                            </li>
                        @endif

                        @if (\Illuminate\Support\Facades\Route::has('register'))
                                <li class="t-mr-3 {{ \Illuminate\Support\Str::startsWith(\Illuminate\Support\Facades\Route::currentRouteName(), 'register') ? 't-text-[#F25287]' : '' }}">
                                <a class="t-inline-block t-px-4 t-text-black t-font-bold t-no-underline hover:t-underline hover:t-text-[#F25287]" href="{{ route('register') }}">가입</a>
                            </li>
                        @endif
                    @else
                        <li class="t-mr-3 {{ \Illuminate\Support\Str::startsWith(\Illuminate\Support\Facades\Route::currentRouteName(), 'logout') ? 't-text-[#F25287]' : '' }}">
                            <a href="{{ route('logout') }}" class="t-inline-block t-px-4 t-text-black t-font-bold t-no-underline hover:t-underline hover:t-text-[#F25287]">
                                {{ \Illuminate\Support\Facades\Auth::user()->name }}
                            </a>
                        </li>

                        <li class="t-mr-3 {{ \Illuminate\Support\Str::startsWith(\Illuminate\Support\Facades\Route::currentRouteName(), 'logout') ? 't-text-[#F25287]' : '' }}">
                            <a href="{{ route('logout') }}" class="t-inline-block t-px-4 t-text-black t-font-bold t-no-underline hover:t-underline hover:t-text-[#F25287]"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                로그아웃
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
        <hr class="t-border-b t-my-0 t-py-0" />
    </nav>

    <main class="t-pt-24">
        @yield('content')
    </main>
</div>
</body>
</html>
