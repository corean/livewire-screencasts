<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Basics</title>

    {{--<script src="https://cdn.tailwindcss.com"></script>--}}
    {{--<script defer src="https://unpkg.com/@alpinejs/ui@3.13.2-beta.0/dist/cdn.min.js"></script>--}}
    {{--<link href="https://unpkg.com/@tailwindcss/forms@0.2.1/dist/forms.min.css" rel="stylesheet">--}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/ui@3.13.5-beta.0/dist/cdn.min.js"></script>
</head>
<body>
<main class="flex justify-center items-start pt-24 bg-slate-200 min-h-screen text-slate-800">
    {{ $slot }}
</main>
</body>
</html>