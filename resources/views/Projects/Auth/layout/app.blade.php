<!doctype html>
@include('Projects.Sass.dir')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>@yield('title')</title>

    @include('Projects.Sass.css')
    <!-- Auth Only -->
    <link rel="stylesheet" href="{{ asset('Projects/Auth/css/style.css') }}">
    @if (in_array(app()->getLocale(), ['en', 'tr'], true))
        <!-- Main + direction stylesheet LTR -->
        <link id="directionCss" rel="stylesheet" href="{{ asset('Projects/Auth/css/style-ltr.css') }}">
    @elseif(app()->getLocale() == 'ar')
        <!-- Main + direction stylesheet RTL -->
        <link id="directionCss" rel="stylesheet" href="{{ asset('Projects/Auth/css/style-rtl.css') }}">
    @endif
    @yield('css')
</head>

<body>

    <!-- Theme -->
    <button type="button" class="theme-toggle" id="themeToggle" title="Dark / Light Mode" aria-label="Dark / Light Mode">
        <i class="fa-solid fa-moon"></i>
    </button>

    <main class="auth-page">
        <div class="auth-container">
            <!-- Brand -->
            <a href="#" class="auth-brand">
                <span class="auth-brand-icon">
                    <i class="fa-solid fa-layer-group"></i>
                </span>
                <span class="auth-brand-name">AdminPro</span>
            </a>
            @yield('content')            
        </div>
    </main>

    @include('Projects.Sass.javascript')
    <script src="{{ asset('Projects/Auth/js/javascript.js') }}"></script>
    @yield('javascript')
</body>
</html>