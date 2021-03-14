<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Inspiration') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8e92148154.js" crossorigin="anonymous"></script>

</head>
<body>
    <div id="app" class="l-wrapper" v-cloak>
        <header class="l-header" id="header">

        <!-- フラッシュメッセージ -->
            @if(session('flash_message'))
                <flash-message id="flash" flash="{{ session('flash_message') }}"></flash-message>
            @endif

            <nav class="u-site__width p-header">
                <a class="navbar-brand" href="{{ url('/index') }}">
                    <h1 class="c-title__header p-header__title">{{ config('app.name', 'Inspiration') }}</h1>
                </a>

                    <!-- Right Side Of Navbar -->
                    <ul class="c-nav__item--wrapper">
                        <!-- Authentication Links -->
                        @guest
                            <li class="c-nav__item p-header__navItem">
                                <a class="c-btn c-btn--white p-header__btn" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="c-nav__item p-header__navItem">
                                    <a class="c-btn p-header__btn--signup" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                        <li class="c-nav__item p-header__navItem">
                            <a class="c-btn 
                            c-btn--white
                            p-header__btn" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            >{{ __('Logout') }}</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        <li class="c-nav__item p-header__navItem">
                            <a  class="c-btn p-header__btn--mypage" href="{{ route('mypage') }}"
                            >{{ __('My Page') }}</a>
                        </li>

                    @endguest
                </ul>

                <hamburger-menu @menu-click="menu = $event" v-cloak></hamburger-menu>

            </nav>

        </header>

        <transition name="menu">
            <profile-menu   v-if="menu"
                            img="{{session('icon_img')}}"
                            login="{{ route('login')}}"
                            name="{{session('name')}}"
                            register="{{ route('register')}}"
                            list="{{ url('all-ideas-list') }}"
                            noimg="{{ asset('images/default/icons/noimage_icon.jpg') }}"
                            mypage="{{url('mypage')}}"
                            profedit="{{route('profile.edit')}}"
                            postidea="{{url('post-idea/create')}}"
                            ideaslist="{{url('all-ideas-list')}}"
                            >
            </profile-menu>
        </transition>
