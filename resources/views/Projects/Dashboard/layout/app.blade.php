<!doctype html>
@include('Projects.Sass.dir')
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  @include('Projects.Sass.css')

    <!-- Main + direction stylesheet -->
    <link rel="stylesheet" href="{{ asset('Projects/Dashboard/css/style.css') }}">

    @if (in_array(app()->getLocale(), ['en', 'tr'], true))
        <!-- Main + direction stylesheet LTR -->
        <link id="directionCss" rel="stylesheet" href="{{ asset('Projects/Dashboard/css/style-ltr.css') }}">
    @elseif(app()->getLocale() == 'ar')
        <!-- Main + direction stylesheet RTL -->
        <link id="directionCss" rel="stylesheet" href="{{ asset('Projects/Dashboard/css/style-rtl.css') }}">
    @endif
    @yield('css')

</head>
<body>

<div class="app-shell">
  @include('Projects.Dashboard.include.sidebar')

  <div class="sidebar-overlay" id="sidebarOverlay"></div>

  <div class="app-content" id="appContent">

    @include('Projects.Dashboard.include.topbar')
    

    <main class="main-content container-fluid">

      @yield('content')

      

    </main>

    <footer class="dashboard-footer">
      <span>© 2026 AdminPro</span>
      <span>Built with Bootstrap 5.3.8</span>
    </footer>
  </div>
</div>

@include('Projects.Sass.javascript')
<script src="{{ asset('Projects/Dashboard/js/javascript.js') }}"></script>
@yield('javascript')
</body>
</html>
