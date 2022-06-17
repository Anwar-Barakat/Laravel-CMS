@php
$setting = App\Models\Setting::first();
@endphp
<div class="site-footer">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-4">
                <h3 class="footer-heading mb-4">About Us</h3>{{ $setting->bio }}</p>
            </div>
            <div class="col-md-3 ml-auto">
                <!-- <h3 class="footer-heading mb-4">Navigation</h3> -->
                <ul class="list-unstyled float-left mr-5">
                    <li><a href="javascript:void(0);" class="footer-heading">Categories</a></li>
                    @php
                        $footerCategories = App\Models\Category::inRandomOrder()
                            ->take(3)
                            ->get();
                    @endphp
                    @foreach ($footerCategories as $cat)
                        <li>
                            <a href="{{ route('frontend.categories.show', $cat->slug) }}" target="_blank">
                                {{ $cat->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <ul class="list-unstyled float-left">
                    <li><a href="javascript:void(0);" class="footer-heading">Tags</a></li>
                    @php
                        $footerTags = App\Models\Tag::inRandomOrder()
                            ->take(3)
                            ->get();
                    @endphp
                    @foreach ($footerTags as $cat)
                        <li>
                            <a href="" target="_blank">
                                {{ $cat->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4">


                <div>
                    <h3 class="footer-heading mb-4">Connect With Us</h3>
                    <p>
                        <a href="{{ $setting->facebook }}"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                        <a href="{{ $setting->email }}"><span class="icon-envelope p-2"></span></a>
                        <a href="{{ $setting->telegram }}"><span class="icon-telegram p-2"></span></a>
                        <a href="{{ $setting->github }}"><span class="icon-github p-2"></span></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <p>
                    {{ $setting->copyright }}
                </p>
            </div>
        </div>
    </div>
</div>
