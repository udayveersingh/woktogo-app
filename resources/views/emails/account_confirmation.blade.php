<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Account Confirmation</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 font-sans leading-normal tracking-normal">
    <div class="max-w-4xl mx-auto my-8 px-4 py-6 bg-white shadow-lg rounded-lg border border-gray-200">
        <h1>Welcome, {{ $user->name }}!</h1>
        <p>Thank you for registering with us. We're excited to have you on board.</p>
        <p>Click the link below to confirm your email address:</p>
        <p>
            <a class="bg-red px-5 text-xl font-bold text-white" href="{{ route('confirmEmail', ['user' => $user->id]) }}">Confirm Email Click Here >></a>
        </p>
    </div>
</body>

</html>