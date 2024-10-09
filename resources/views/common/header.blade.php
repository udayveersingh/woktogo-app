<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Woktogo</title>

        @vite('resources/css/app.css')

    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50 flex flex-col h-full">
    <div class="bg-secondary py-4 h-[63px] px-5 flex justify-between z-10">
        <a class="relative" href="/"><img class="h-[55px]" src="{{ asset('images/logo.webp') }}" alt="" /></a>
        <div class="cursor-pointer">        
            <svg fill="#000000" height="28" width="28" id="Layer_1" data-name="Layer 1"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                <path id="Menu_Button" data-name="Menu Button" class="fill-white" d="M2,13V11H14v2ZM2,9V7H14V9ZM2,5V3H14V5Z"/>
            </svg>
        </div>
    </div>