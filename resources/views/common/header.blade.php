<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Woktogo</title>
    @vite('resources/css/app.css')

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50 flex flex-col h-full">
    <div class="bg-secondary py-4 h-[63px] px-5 flex justify-between z-10">
        <a class="relative" href="/public"><img class="h-[55px]" src="{{ asset('images/logo.webp') }}" alt="" /></a>

        @auth
        <!-- Logout Button -->
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="bg-red-600 text-white font-semibold py-2 px-4 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                Logout
            </button>
        </form>
        @else
        <p class="text-gray-600">You are not logged in.</p>
        @endauth



        <div class="cursor-pointer text-white mt-4">
            <nav>
                <!--Hamburger menu icon svg to trigger the slide-in menu when clicked-->
                <div onclick="openNav()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18.853" height="12" viewBox="0 0 18.853 12">
                        <g id="Icon_feather-menu" data-name="Icon feather-menu" transform="translate(-4.5 -8)">
                            <path id="Path_3" data-name="Path 3" d="M4.5,18H23.353" transform="translate(0 -4)" fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="2" />
                            <path id="Path_4" data-name="Path 4" d="M4.5,9H23.353" transform="translate(0)" fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="2" />
                            <path id="Path_5" data-name="Path 5" d="M4.5,27H23.353" transform="translate(0 -8)" fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="2" />
                        </g>
                    </svg>
                </div>
                <!--background overlay element, it will close navbar when clicked-->
                <div onclick="exitNav()" id="sideBar" class="fixed top-0 right-0 bg-transparent w-0 h-full overflow-x-hidden duration-500 z-10">
                    <!--navigation menu box-->
                    <div id="sideNav" onclick="event.stopPropagation()" class="fixed top-0 right-0 bg-greenheader z-10 overflow-x-hidden duration-500 font-bold flex justify-center items-start h-full w-0 pt-24">
                        <!--exit icon, it will close navbar when clicked-->
                        <a href="javascript:void(0)" onclick="exitNav()" class="text-3xl absolute top-0 right-0 mr-3 mt-2">&times;</a>
                        <ul class="text-md sm:text-xl text-center text-nowrap space-y-5">
                            <li class="px-2 md:px-2 py-4 border-b-2 border-t-2 border-l border-r border-white rounded-xl"><a href="/my-account">Mijn account aanpassen</a></li>
                            <li class="px-2 md:px-2 py-4 border-b-2 border-t-2 border-l border-r border-white rounded-xl"><a href="/my-deals">Mijn deals</a></li>
                            <li class="px-2 md:px-2 py-4 border-b-2 border-t-2 border-l border-r border-white rounded-xl"><a href="/deal-info">Meer informatie</a></li>
                            <!-- <li class="px-2 py-4"><a href="#">Shop</a></li> -->
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>