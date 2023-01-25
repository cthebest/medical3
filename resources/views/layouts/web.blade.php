<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    @vite(['resources/sass/guest.scss', 'resources/js/app.js'])

    <script src="https://www.google.com/recaptcha/api.js?render=6LdyVygkAAAAANImiWdZA60--y-NzIfkF-SnhxMX"></script>
    <script>
        document.addEventListener('submit', function(e) {
            e.preventDefault();
            grecaptcha.ready(function() {
                grecaptcha.execute('6LdyVygkAAAAANImiWdZA60--y-NzIfkF-SnhxMX', {
                    action: 'submit'
                }).then(function(token) {
                    let form = e.target;
                    let input = document.createElement('input');
                    input.type='hidden';
                    input.name='g-recaptcha-response';
                    input.value=token;
                    form.appendChild(input);
                    form.submit();
                });
            });
        });
    </script>
</head>

<body class="h-screen">
    @livewire('menu')

    <div class="font-sans">
        @yield('content')
    </div>

    @livewire('footer')
</body>

</html>
