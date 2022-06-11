<script src="{{ asset('assets/backend/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/custom.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/dlabnav-init.js') }}"></script>

<!-- Chart sparkline plugin files -->
<script src="{{ asset('assets/backend/vendor/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/plugins-init/sparkline-init.js') }}"></script>

<!-- Chart Morris plugin files -->
<script src="{{ asset('assets/backend/vendor/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/morris/morris.min.js') }}"></script>

<!-- Init file -->
<script src="{{ asset('assets/backend/js/plugins-init/widgets-script-init.js') }}"></script>

<!-- Demo scripts -->
<script src="{{ asset('assets/backend/js/dashboard/dashboard.js') }}"></script>

<!-- Summernote -->
<script src="{{ asset('assets/backend/vendor/summernote/js/summernote.min.js') }}"></script>
<!-- Summernote init -->
<script src="{{ asset('assets/backend/js/plugins-init/summernote-init.js') }}"></script>

<!-- Svganimation scripts -->
<script src="{{ asset('assets/backend/vendor/svganimation/vivus.min.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/svganimation/svg.animation.js') }}"></script>


{{-- toastr --}}
{{-- toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if (Session::has('message'))
    <script>
        toastr.options = {
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "preventDuplicates": false,
        };
        var type = "{{ Session::get('alert-type', 'success') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    </script>
@endif


@yield('js')
