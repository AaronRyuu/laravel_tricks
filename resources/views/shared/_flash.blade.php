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

@if (count($errors) > 0)
    <div class="am-alert am-alert-danger">
        <div class="am-container">
            <h2>Oops~ There's something wrong!</h2>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif