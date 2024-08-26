<!DOCTYPE html>
<html lang="en">
<head>
    @include('Backend.WebsiteAdmin.layout.header')
</head>
<body>

    <div class="main-wrapper">
        @include('Backend.WebsiteAdmin.layout.navbar')
        @include('Backend.WebsiteAdmin.layout.sidebar')
        @yield('content')
    </div>

    @include('Backend.WebsiteAdmin.layout.footer-bar')
    @include('Backend.WebsiteAdmin.layout.footer')
</body>
</html>
