@if(session('error'))
    @component('components.alert-danger')
        {{ session('error') }}
    @endcomponent
@endif