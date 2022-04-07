<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Grape+Nuts&display=swap" rel="stylesheet">

    <title>{{$header}} - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
        <header style="background-color: #9772aa">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 style="font-family: 'Grape Nuts', cursive; color:azure">
                    {{ $header }}
                </h2>
            </div>
        </header>
        @endif

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                @if($errors->any())
                <div class="alert alert-secondary text-danger" align="center">
                    @foreach ($errors->all() as $error)
                    <span><i class="fa fa-times">&nbsp;&nbsp;</i>{{ $error }}</span><br>
                    @endforeach
                </div><br>
                @endif

                @if(session('success'))
                <div class="alert alert-success" align="center">
                    <span><i class="fa fa-check">&nbsp;&nbsp;</i> {{ session('success') }} </span>
                </div>
                @endif

                {{ $slot }}
            </div>
        </div>






    </div>

    @stack('modals')
    @isset($js)
    {{ $js }}
    @endisset

    @livewireScripts
</body>

</html>