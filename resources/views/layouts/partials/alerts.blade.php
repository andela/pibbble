@if ( session()->has('info'))
    <div class="alert alert-info" role-"alert">
        {{ session()->get('info') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success" >
        {{ session('success') }}
    </div>
@endif
