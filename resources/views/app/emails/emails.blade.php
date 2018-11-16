@php
    $data = date('d/m/Y H:i:s');
@endphp
<br>
<b>Nome:</b> {{ $contact['name'] }}
<br>
<b>Email:</b> {{ $contact['email'] }}
<br><br>
<b>Mensagem:</b><br>
{{ $contact['message'] }}
<br><br><br>
<hr>
<b>Data de envio:</b> {{ $data }}