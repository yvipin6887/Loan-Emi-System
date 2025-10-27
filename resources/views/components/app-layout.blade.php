<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Loan EMI Admin' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">
    <x-header />

    <main class="flex justify-center items-center py-12">
        {{ $slot }}
    </main>
</body>
</html>
