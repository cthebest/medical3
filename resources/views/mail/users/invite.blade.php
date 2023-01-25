@component('mail::message')

<h1>Hola {{ $user->name }}</h1>

<p>{{ $user->invite->name }} has sido invitado a unirte a {{ config('config.name') }}</p>

@component('mail::button', ['url' => url("join/$user->invite_token")])
    unirse {{ config('config.name') }}
@endcomponent

<p>Gracias, {{ config('config.name') }}</p>

@endcomponent
