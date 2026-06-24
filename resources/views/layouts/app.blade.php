    <!DOCTYPE html>
    <html>
    <head>
        <title>@yield('title')</title>
    </head>
    <body>

        <nav>
            <a href="/">Home</a>
            <a href="/dashboard">Dashboard</a>
        </nav>
        <hr>
        @yield('content')
        @yield('footer')
    </body>
    </html>