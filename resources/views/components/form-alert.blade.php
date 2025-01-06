<div>
    @if (Session::get('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
    @endif
    @if (Session::get('warning'))
        <div class="alert alert-warning">
            {{ Session::get('warning') }}
        </div>
    @endif
    @if (Session::get('info'))
        <div class="alert alert-info">
            {{ Session::get('info') }}
        </div>
    @endif
    @if (Session::get('success'))
        <div class="alert alert-success">
            {!! Session::get('success') !!}
        </div>
    @endif
</div>
