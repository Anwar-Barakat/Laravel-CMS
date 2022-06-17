<div class="footer">
    <div class="copyright">
        @php
            $setting = App\Models\Setting::first();
        @endphp
        <p>
            {{ $setting->copyright }}
        </p>
    </div>
</div>
