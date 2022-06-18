<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mini Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="AN Blog - Laravel Blog" />
    <meta property="og:title" content="AN Blog - Laravel Blog" />
    <meta property="og:description" content="AN Blog - Laravel Blog" />

    @include('frontend.layouts.head')
</head>

<body>

    <div class="site-wrap">

        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        @include('frontend.layouts.header')


        @yield('content')


        @include('frontend.layouts.footer')
    </div>

    @include('frontend.layouts.footer-scripts')
</body>

</html>
