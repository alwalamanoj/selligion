<!DOCTYPE html>
<html lang="en">
<head>
    @include('Frontend.layout.header')
</head>
<body>
    @include('Frontend.layout.navbar')

    <div class="overflow-hidden section-content">
        @yield('content')
    </div>

    @include('Frontend.layout.footer-bar')
    @include('Frontend.layout.footer')
</body>
</html>
