<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Woktogo</title>
    @vite('resources/css/app.css')
    <style>
        .invalid-feedback {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h2>Support Request</h2>
    <ul class="text-md sm:text-xl text-center text-nowrap space-y-5">
        <li class="bg-primary px-2 md:px-2 py-4 border-b-2 border-t-2 border-l border-r border-white rounded-xl">
            <p><strong>Name:</strong> {{ $name }}</p>
        </li>
        <li class="bg-primary px-2 md:px-2 py-4 border-b-2 border-t-2 border-l border-r border-white rounded-xl"><strong>Email:</strong> {{ $email }}</li>
        <li class="bg-primary px-2 md:px-2 py-4 border-b-2 border-t-2 border-l border-r border-white rounded-xl"><strong>Message:</strong>{{}}</li>
    </ul>
</body>

</html>