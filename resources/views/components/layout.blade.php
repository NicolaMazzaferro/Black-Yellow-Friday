<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black Friday</title>
    <link rel="shortcut icon" href="./assets/img/favicon.ico" />
    <script src="https://kit.fontawesome.com/4b868b45f2.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <header>
        <x-navbar />
    </header>
    <main>
        <x-hero />
        {{ $slot }}
    </main>
    <footer>
        <x-footer />
    </footer>
    @livewireScripts
</body>
</html>
