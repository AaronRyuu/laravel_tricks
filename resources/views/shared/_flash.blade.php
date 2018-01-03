@if (session('notice'))
    <div class="am-alert am-alert-success">
        <div class="am-container">
            {{ session('notice') }}
        </div>
    </div>
@endif

@if (session('alert'))
    <div class="am-alert am-alert-danger">
        <div class="am-container">
            {{ session('alert') }}
        </div>
    </div>
@endif
