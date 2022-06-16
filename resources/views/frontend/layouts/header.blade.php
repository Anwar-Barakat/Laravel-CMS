<header class="site-navbar" role="banner">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-12 search-form-wrap js-search-form">
                <form method="get" action="#">
                    <input type="text" id="s" class="form-control" placeholder="Search...">
                    <button class="search-btn" type="submit"><span class="icon-search"></span></button>
                </form>
            </div>

            <div class="col-4 site-logo">
                <a href="{{ route('frontend.home') }}" class="text-black h2 mb-0">AN Blog</a>
            </div>

            <div class="col-8 text-right">
                <nav class="site-navigation" role="navigation">
                    <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
                        <li><a href="{{ route('frontend.home') }}">Home</a></li>
                        <li><a href="{{ route('frontend.about.index') }}">About</a></li>
                        <li><a href="{{ route('frontend.contact-us.index') }}">Contact Us</a></li>

                        <li>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @php
                                    $categories = App\Models\Category::inRandomOrder()
                                        ->take(4)
                                        ->get();
                                @endphp
                                @foreach ($categories as $category)
                                    <a class="dropdown-item"
                                        href="{{ route('frontend.categories.show', $category->slug) }}">
                                        {{ $category->name }}
                                    </a>
                                @endforeach
                            </div>
                        </li>
                        <li><a href="">Posts</a></li>
                    </ul>
                </nav>
                <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span
                        class="icon-menu h3"></span></a>
            </div>
        </div>

    </div>
</header>
