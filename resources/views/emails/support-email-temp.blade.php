<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Wok to Go</title>

    @vite('resources/css/app.css')

    <style>
        .invalid-feedback {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans leading-normal tracking-normal">
    <!-- Centered container -->
    <div class="max-w-4xl mx-auto my-8 px-4 py-6 bg-white shadow-lg rounded-lg border border-gray-200">

        <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Contact Information</h1>

        <ul class="space-y-4">
            <li class="bg-indigo-100 px-4 py-4 border-b-2 border-t-2 border-gray-300 rounded-lg">
                <p class="text-lg text-gray-700"><strong>Name:</strong> {{ $name }}</p>
            </li>
            <li class="bg-indigo-100 px-4 py-4 border-b-2 border-gray-300 rounded-lg">
                <p class="text-lg text-gray-700"><strong>Email:</strong> {{ $email }}</p>
            </li>
            <li class="bg-indigo-100 px-4 py-4 border-b-2 border-gray-300 rounded-lg">
                <p class="text-lg text-gray-700"><strong>Message:</strong> {{ $message->getTextBody() ? $message->getTextBody() : $message->getHtmlBody() }}</p>
            </li>
        </ul>

        <!-- You can add any extra elements or buttons below -->
    </div>
</body>

</html>