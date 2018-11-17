@if($errors->any())
    @component('components.alert-danger')
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    @endcomponent
@endif