@if(session('success'))
    @component('components.alert-success')
        {{ session('success') }}
    @endcomponent
@endif